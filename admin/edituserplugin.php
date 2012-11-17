<?php
#CMS - CMS Made Simple
#(c)2004 by Ted Kulp (wishy@users.sf.net)
#This project's homepage is: http://www.cmsmadesimple.org
#
#This program is free software; you can redistribute it and/or modify
#it under the terms of the GNU General Public License as published by
#the Free Software Foundation; either version 2 of the License, or
#(at your option) any later version.
#
#This program is distributed in the hope that it will be useful,
#but WITHOUT ANY WARRANTY; without even the implied warranty of
#MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#GNU General Public License for more details.
#You should have received a copy of the GNU General Public License
#along with this program; if not, write to the Free Software
#Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
#
#$Id: edituserplugin.php 7461 2011-10-19 23:23:23Z Stikki $

$CMS_ADMIN_PAGE=1;

require_once("../include.php");
$urlext='?'.CMS_SECURE_PARAM_NAME.'='.$_SESSION[CMS_USER_KEY];

check_login();
$gCms = cmsms();
$db = $gCms->GetDb();

$error = array();

$userplugin_id = "";
if (isset($_POST["userplugin_id"])) $userplugin_id = (int)$_POST["userplugin_id"];
 else if (isset($_GET["userplugin_id"])) $userplugin_id = (int)$_GET["userplugin_id"];

$plugin_name= "";
if (isset($_POST["plugin_name"])) $plugin_name = $_POST["plugin_name"];

$orig_plugin_name = "";
if (isset($_POST["origpluginname"])) $orig_plugin_name = $_POST["origpluginname"];

$code= "";
if (isset($_POST["code"])) $code = $_POST["code"];

$description= "";
if (isset($_POST["description"])) $description = $_POST["description"];

if (isset($_POST["cancel"])) {
	redirect("listusertags.php".$urlext);
	return;
}

$userid = get_userid();
$access = check_permission($userid, 'Modify User-defined Tags');


$ajax = false;
if (isset($_POST['ajax']) && $_POST['ajax']) $ajax = true;

if ($access) {
  if (isset($_POST["editplugin"])) {
    
    $CMS_EXCLUDE_FROM_RECENT = 1;
    $validinfo = true;
    if ($plugin_name == "") {
      $error[] = lang('nofieldgiven', array(lang('editusertag')));
      $validinfo = false;
    }
    elseif(preg_match('<^[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*$>', $plugin_name) == 0)
      {
	$error[] = lang('error_udt_name_chars');
	$validinfo = false;
      }
    else
      {
	if( $plugin_name != $orig_plugin_name && UserTagOperations::get_instance()->UserTagExists($plugin_name) )
	  {
	    $error[] = lang('usertagexists');
	    $validinfo = false;
	  }
      }
		// Make sure no spaces are put into plugin name.
		$without_spaces = str_replace(' ', '', $plugin_name);
		if ($plugin_name != $without_spaces)
		{
			$error[] = lang('error_udt_name_whitespace');
			$validinfo = false;
		}
		if ($code == "") {
			$error[] = lang('nofieldgiven', array(lang('code')));
			$validinfo = false;
		}
		else if (strrpos($code, '{') !== FALSE)
		{
			$lastopenbrace = strrpos($code, '{');
			$lastclosebrace = strrpos($code, '}');
			if ($lastopenbrace > $lastclosebrace)
			{
				$error[] = lang('invalidcode');
                                $error[] = lang('invalidcode_brace_missing');
				$validinfo = false;
			}
		}
		
		if ($validinfo)
		{
			srand();
			ob_start();
			if (eval('function testfunction'.rand().'() {'.$code."\n}") === FALSE)
			{
				$error[] = lang('invalidcode');
                                //catch the error
                                //eval('function testfunction'.rand().'() {'.$code.'}');
                                $buffer = ob_get_clean();
                                //add error
                                $error[] = preg_replace('/<br \/>/', '', $buffer ); 
				$validinfo = false;
			}
			else
			{
				ob_get_clean();
			}
		}

		if ($validinfo) {
		
			// Send event EditUserDefinedTagPre
			Events::SendEvent('Core', 'EditUserDefinedTagPre', array('id' => $userplugin_id, 'name' => &$plugin_name, 'code' => &$code));
			
			// Update database
			$query = "UPDATE ".cms_db_prefix()."userplugins SET userplugin_name = ".$db->qstr($plugin_name).", code = ".$db->qstr($code).", 
					description = ".$db->qstr($description).", modified_date = ".$db->DBTimeStamp(time())." WHERE userplugin_id = ". (int)$userplugin_id;
			$result = $db->Execute($query);
			
			if ($result) {
			
				// Send event EditUserDefinedTagPost & put mention to Admin Log
				Events::SendEvent('Core', 'EditUserDefinedTagPost', array('id' => $userplugin_id, 'name' => &$plugin_name, 'code' => &$code));
				// put mention into the admin log
				audit($userplugin_id, 'User Defined Tag: '.$plugin_name, 'Edited');

				if( !isset( $_POST['apply'] ) )
				  {
				    redirect("listusertags.php".$urlext."&message=usertagupdated");
				    return;
				  }
			}
			else {
				$error[] = lang('errorupdatingusertag');
			}
		}

		// Check if we need ajax output
		if ($ajax)
		{
			header('Content-Type: text/xml');
			print '<?xml version="1.0" encoding="UTF-8"?>';
			print '<EditUserPlugin>';
			if (sizeof($error))
			{
				print '<Response>Error</Response>';
				print '<Details><![CDATA[';
				if (!is_array($error))
				{
					$error = array($error);
				}
				print '<li>' . join('</li><li>', $error) . '</li>';
				print ']]></Details>';
			}
			else
			{
				print '<Response>Success</Response>';
				print '<Details><![CDATA[' . lang('usertagupdated') . ']]></Details>';
			}
			print '</EditUserPlugin>';
			exit;
		}
	}
	else if ($userplugin_id != -1) {

	  $row = UserTagOperations::get_instance()->GetUserTag($userplugin_id);

	  $plugin_name = $row["userplugin_name"];
	  $orig_plugin_name = $plugin_name;
	  $code = $row['code'];
	  $description = $row['description'];
	}
}
if (strlen($plugin_name)>0)
    {
    $CMS_ADMIN_SUBTITLE = $plugin_name;
    }

$addlScriptSubmit = '';
$syntaxmodule = get_preference(get_userid(FALSE),'syntaxhighlighter');
if( $syntaxmodule && ($module = ModuleOperations::get_instance()->get_module_instance($syntaxmodule)) )
  {
    if( $module->IsSyntaxHighlighter() && $module->SyntaxActive() )
      {
	die($module->GetName());
	$addlScriptSubmit .= $module->SyntaxPageFormSubmit();
      }
  }
$closestr = cms_html_entity_decode(lang('close'));
$headtext = <<<EOSCRIPT
<script type="text/javascript">
  // <![CDATA[
jQuery(document).ready(function(){  
  jQuery('input[name=apply]').click(function(){
	$addlScriptSubmit
	jQuery('#Edit_UserPlugin_Result').html('');

    var data = jQuery('#Edit_UserPlugin').find('input:not([type=submit]), select, textarea').serializeArray();
    data.push({ 'name': 'ajax', 'value': 1});
    data.push({ 'name': 'apply', 'value': 1 });

    jQuery.post('{$_SERVER['REQUEST_URI']}',data,function(resultdata,text)
	{
	     var resp = jQuery(resultdata).find('Response').text();
	     var details = jQuery(resultdata).find('Details').text();
		 var htmlShow = '';
		 if (resp == 'Success')
		 {
			htmlShow = '<div class="pagemcontainer"><p class="pagemessage">' + details + '<\/p><\/div>';
			jQuery('input[name=cancel]').fadeOut();
			jQuery('input[name=cancel]').attr('value','{$closestr}');
			jQuery('input[name=cancel]').fadeIn();
		 }
		 else
		 {
			htmlShow = '<div class="pageerrorcontainer"><ul class="pageerror">';
			htmlShow += details;
			htmlShow += '<\/ul><\/div>';
		 }
		 jQuery('#Edit_UserPlugin_Result').html( htmlShow );
	},'xml');
	return false;
  });
});
 // ]]>
</script>
EOSCRIPT;

include_once("header.php");

// AJAX result container is below the apply buttons, in this case (no top apply button)

if (!$access) {
	echo '<div class="pageerrorcontainer"><p class="pageerror">'.lang('noaccessto', array(lang('addusertag'))).'</p></div>';
}
else {
	if (FALSE == empty($error)) {
		echo $themeObject->ShowErrors($error);		
	}

?>

<div class="pagecontainer">
	<?php echo $themeObject->ShowHeader('editusertag'); ?>
		<form id="Edit_UserPlugin" enctype="multipart/form-data" action="edituserplugin.php" method="post">
		   <div>
		   <input type="hidden" name="<?php echo CMS_SECURE_PARAM_NAME ?>" value="<?php echo $_SESSION[CMS_USER_KEY] ?>" />
		   </div>
			<div class="pageoverflow">
				<p class="pagetext">*<?php echo lang('name')?>:</p>
				<div class="pageinput"><input type="text" id="plugin_name" name="plugin_name" maxlength="255" value="<?php echo $plugin_name?>" /></div>
			</div>
			<div class="pageoverflow">
				<p class="pagetext">*<?php echo lang('code')?></p>
				<div class="pageinput"><?php echo create_textarea(false, $code, 'code', 'pagebigtextarea', 'code', '', '', '80', '15','','php')?></div>
			</div>
			<div class="pageoverflow">
				<p class="pagetext"><?php echo lang('description')?></p>
				<div class="pageinput"><?php echo create_textarea(false, $description, 'description', 'pagebigtextarea', 'description', '', '', '80', '15')?></div>
			</div>			
			
			<div class="pageoverflow">
				<p class="pagetext">&nbsp;</p>
				<div class="pageinput">
						<input type="hidden" name="userplugin_id" value="<?php echo $userplugin_id?>" />
						<input type="hidden" id="origpluginname" name="origpluginname" value="<?php echo $orig_plugin_name?>" />
						<input type="hidden" name="editplugin" value="true" />
						<input type="submit" value="<?php echo lang('submit')?>" class="pagebutton" />
						<input type="submit" name="cancel" value="<?php echo lang('cancel')?>" class="pagebutton" />
						<input type="submit" name="apply" value="<?php echo lang('apply')?>" class="pagebutton" />

				</div>
			</div>
		</form>
</div>
<?php
}
print '<div id="Edit_UserPlugin_Result"></div>';
echo '<p class="pageback"><a class="pageback" href="'.$themeObject->BackUrl().'">&#171; '.lang('back').'</a></p>';
include_once("footer.php");

# vim:ts=4 sw=4 noet
?>
