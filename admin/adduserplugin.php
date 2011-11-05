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
#$Id: adduserplugin.php 7396 2011-09-15 12:57:25Z rolf1 $

$CMS_ADMIN_PAGE=1;

require_once("../include.php");
$urlext='?'.CMS_SECURE_PARAM_NAME.'='.$_SESSION[CMS_USER_KEY];

check_login();

$error = array();

$plugin_name= "";
if (isset($_POST["plugin_name"])) $plugin_name = $_POST["plugin_name"];

$code= "";
if (isset($_POST["code"])) $code = $_POST["code"];

$description = "";
if (isset($_POST["description"])) $description = $_POST["description"];

if (isset($_POST["cancel"])) {
	redirect("listusertags.php".$urlext);
	return;
}

$userid = get_userid();
$access = check_permission($userid, 'Modify User-defined Tags');

$use_javasyntax = false;
if (get_preference($userid, 'use_javasyntax') == "1") $use_javasyntax = true;

$gCms = cmsms();
$db = $gCms->GetDb();

if ($access) {
	if (isset($_POST["addplugin"])) {

		$validinfo = true;
		if ($plugin_name == "") {
			$error[] = lang('nofieldgiven',array(lang('name')));
			$validinfo = false;
		}
		elseif(preg_match('<^[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*$>', $plugin_name) == 0)
		{
			$error[] = lang('error_udt_name_chars');
			$validinfo = false;
		}
		else
		{
		  if( UserTagOperations::get_instance()->SmartyTagExists($plugin_name) )
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
			$error[] = lang('nofieldgiven',array(lang('code')));
			$validinfo = false;
		}
		else if (strrpos($code, '{') !== FALSE)
		{
			$lastopenbrace = strrpos($code, '{');
			$lastclosebrace = strrpos($code, '}');
			if ($lastopenbrace > $lastclosebrace)
			{
				$error[] = lang('invalidcode');
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
				ob_end_clean();
			}
		}

		if ($validinfo) {
		
			$new_usertag_id = $db->GenID(cms_db_prefix()."userplugins_seq");		
			Events::SendEvent('Core', 'AddUserDefinedTagPre', array('id' => $new_usertag_id, 'name' => &$plugin_name, 'code' => &$code));
			
			$query = "INSERT INTO ".cms_db_prefix()."userplugins (userplugin_id, userplugin_name, code, description, create_date, modified_date) VALUES ($new_usertag_id, ".$db->qstr($plugin_name).", 
					".$db->qstr($code).", ".$db->qstr($description).", ".$db->DBTimeStamp(time()).", ".$db->DBTimeStamp(time()).")";
			$result = $db->Execute($query);
			
			if ($result) {
			
				Events::SendEvent('Core', 'AddUserDefinedTagPost', array('id' => $new_usertag_id, 'name' => &$plugin_name, 'code' => &$code));
				// put mention into the admin log
				audit($new_usertag_id, 'User Defined Tag: '.$plugin_name, 'Added');
				redirect("listusertags.php".$urlext."&message=usertagadded");
				return;
			}
			else {
			  $error[] = lang('errorinsertingtag').' '.$db->ErrorMsg();
			}
		}
	}
}

include_once("header.php");

if (!$access) {
	echo '<div class=\"pageerrorcontainer\"><p class="pageerror">'.lang('noaccessto', array(lang('addusertag'))).'</p></div>';
}
else {
    if (FALSE == empty($error)) {
        echo $themeObject->ShowErrors($error);
    }
?>

<div class="pagecontainer">
	<?php echo $themeObject->ShowHeader('addusertag'); ?>
	<form enctype="multipart/form-data" action="adduserplugin.php" method="post">
        <div>
          <input type="hidden" name="<?php echo CMS_SECURE_PARAM_NAME ?>" value="<?php echo $_SESSION[CMS_USER_KEY] ?>" />
        </div>
		<div class="pageoverflow">
			<p class="pagetext">*<?php echo lang('name')?>:</p>
			<p class="pageinput">
				<input type="text" name="plugin_name" maxlength="255" value="<?php echo $plugin_name?>" />
			</p>
		</div>
		<div class="pageoverflow">
			<p class="pagetext">*<?php echo lang('code')?></p>
			<p class="pageinput">
			<?php echo create_textarea(false, $code, 'code', 'pagebigtextarea', 'code', '', '', '80', '15','','php')?>
			<!--  <textarea class="pagetextarea" name="code" rows="" cols=""><_?php echo $code ?></textarea>-->
			</p>
		</div>
		<div class="pageoverflow">
			<p class="pagetext"><?php echo lang('description')?></p>
			<p class="pageinput"><?php echo create_textarea(false, $description, 'description', 'pagebigtextarea', 'description', '', '', '80', '15')?></p>
		</div>			
					
		
		<div class="pageoverflow">
			<p class="pagetext">&nbsp;</p>
			<p class="pageinput">
				<input type="hidden" name="addplugin" value="true" />
				<input type="submit" value="<?php echo lang('submit')?>" class="pagebutton" />
				<input type="submit" name="cancel" value="<?php echo lang('cancel')?>" class="pagebutton" />
			</p>
		</div>
	</form>
</div>

<?php
}
echo '<p class="pageback"><a class="pageback" href="'.$themeObject->BackUrl().'">&#171; '.lang('back').'</a></p>';
include_once("footer.php");

# vim:ts=4 sw=4 noet
?>
