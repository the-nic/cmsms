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
#$Id: editcontent.php 7911 2012-04-17 18:43:31Z calguy1000 $

$CMS_ADMIN_PAGE=1;

require_once("../include.php");
$urlext='?'.CMS_SECURE_PARAM_NAME.'='.$_SESSION[CMS_USER_KEY];

check_login();
$userid = get_userid();

include_once("../lib/classes/class.admintheme.inc.php");

$dateformat = get_preference(get_userid(),'date_format_string','%x %X');

define('XAJAX_DEFAULT_CHAR_ENCODING', $config['admin_encoding']);
require_once(dirname(dirname(__FILE__)) . '/lib/xajax/xajax_core/xajax.inc.php');
require_once(dirname(__FILE__).'/editcontent_extra.php');

$error = FALSE;

$content_id = "";
if (isset($_REQUEST["content_id"])) $content_id = $_REQUEST["content_id"];

$pagelist_id = "1";
if (isset($_REQUEST["page"])) $pagelist_id = $_REQUEST["page"];

$submit = false;
if (isset($_POST["submitbutton"])) $submit = true;

$apply = false;
if (isset($_POST["apply"])) $apply = true;

$ajax = false;
if (isset($_POST['ajax']) && $_POST['ajax']) $ajax = true;

$xajax = new xajax();
$xajax->configure('requestURI',$config['admin_url'].'/editcontent.php?'.CMS_SECURE_PARAM_NAME.'='.$_SESSION[CMS_USER_KEY].'&content_id='.$content_id);
$xajax->register(XAJAX_FUNCTION,'ajaxpreview');
$xajax->processRequest();
$headtext = $xajax->getJavascript('../lib/xajax')."\n";

if (isset($_POST["cancel"]))
{
	redirect("listcontent.php".$urlext);
}


if ($apply)
{
	$CMS_EXCLUDE_FROM_RECENT=1;
}


#Get a list of content types and pick a default if necessary
$gCms = cmsms();
$contentops =& $gCms->GetContentOperations();
$existingtypes = $contentops->ListContentTypes(false,true);

#Get current userid and make sure they have permission to add something
$userid = get_userid();
$access = check_ownership($userid, $content_id) || check_permission($userid, 'Modify Any Page') ||
	check_permission($userid, 'Manage All Content');
$adminaccess = $access;
if (!$access)
{
	$access = check_authorship($userid, $content_id);
}

if ($access)
{
  // get the content object.
  $contentobj = "";
  $content_type = 'content'; // default content type.

  if( !is_object($contentobj) && $content_id != -1 )
    {
      // load the content object from the database.
      $contentobj = $contentops->LoadContentFromId($content_id);
      $content_type = $contentobj->Type();
    }

  if( isset($_POST['content_type']) )
    {
      $content_type = $_POST['content_type'];
    }

  // validate the content type we want...
  if( isset($existingtypes) && count($existingtypes) > 0 && in_array($content_type,array_keys($existingtypes)) )
    {
      // woot, it's a valid content type
    }
  else
    {
      redirect("listcontent.php".$urlext."&page=".$pagelist_id.'&error=error_contenttype');
    }

  try {
    if( $content_id != -1 && strtolower(get_class($contentobj)) != strtolower($content_type) )
      {
	// content type change...
	// this also updates the content object with the POST params.
	copycontentobj($contentobj, $content_type);
      }
    else if( strtoupper($_SERVER['REQUEST_METHOD']) == 'POST' )
      {
	// we posted... so update the content object.
	updatecontentobj($contentobj);
      }

    cms_utils::set_app_data('editing_content',$contentobj);
  }
  catch( CmsEditContentException $e ) {
    $error = $e->getMessage();
  }
      

  if ($submit || $apply)
    {
      try {
	// Fill contentobj with parameters
	// $contentobj->SetProperties();  // calguy should not be necessary
	$contentobj->FillParams($_POST,true);
	$error = $contentobj->ValidateData();
	
	if ($error === FALSE)
	  {
	    $contentobj->SetLastModifiedBy(get_userid());
	    $contentobj->Save();
	    $contentops =& $gCms->GetContentOperations();
	    $contentops->SetAllHierarchyPositions();
	    // put mention into the admin log
	    audit($contentobj->Id(), 'Content Item: '.$contentobj->Name(), 'Edited');
	    if ($submit)
	      {
		redirect("listcontent.php".$urlext."&page=".$pagelist_id.'&message=contentupdated');
	      }
	  }
      }
      catch( CmsEditContentException $e ) {
	$error = $e->getMessage();
      }
	
      if ($ajax)
	{
	  header('Content-Type: text/xml');
	  print '<?xml version="1.0" encoding="UTF-8"?>';
	  print '<EditContent>';
	  if ($error !== false)
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
	      print '<Details><![CDATA[' . lang('contentupdated') . ']]></Details>';
	    }
	  print '</EditContent>';
	  exit;
	}
    }
}

if (strlen($contentobj->Name()) > 0)
{
	$CMS_ADMIN_SUBTITLE = $contentobj->Name();
}

// Detect if a WYSIWYG is in use, and grab its form submit action
$addlScriptSubmit = '';
$modobj = cms_utils::get_wysiwyg_module();
if( $modobj )
{
  $addlScriptSubmit .= $modobj->WYSIWYGPageFormSubmit();
}

$closestr = cms_html_entity_decode(lang('close'));
$cancelstr = cms_html_entity_decode(lang('confirmcancel'));
$headtext .= <<<EOSCRIPT
<script type="text/javascript">
// <![CDATA[
jQuery(document).ready(function(){ 
  jQuery('[name=cancel]').click(function(){
    var tmp = jQuery(this).val();
    if( tmp == '{$closestr}' )
      {
	return true;
      }
    else
      {
	return confirm('{$cancelstr}');
      }
  });
  jQuery('[name=apply]').live('click',function(){
    $addlScriptSubmit
    var data = jQuery('#Edit_Content').find('input:not([type=submit]), select, textarea').serializeArray();
    data.push({ 'name': 'ajax', 'value': 1});
    data.push({ 'name': 'apply', 'value': 1 });
    jQuery.post('{$_SERVER['REQUEST_URI']}',data,function(resultdata,text){
       var event = jQuery.Event('cms_ajax_apply');
       event.response = jQuery(resultdata).find('Response').text();
       event.details = jQuery(resultdata).find('Details').text();
       event.close = '{$closestr}';
       jQuery('body').trigger(event);
    },'xml');
    return false;
  });
  jQuery('body').on('cms_ajax_apply',function(e){
    var htmlShow = '';
    if( e.response == 'Success' )
      {
	// here we could fire a custom event, give the details and let something else handle it.
	htmlShow = '<div class="pagemcontainer"><p class="pagemessage">' + e.details + '<\/p><\/div>';
	jQuery('[name=cancel]').fadeOut();
	jQuery('[name=cancel]').attr('value','{$closestr}');
	jQuery('[name=cancel]').fadeIn();
      }
    else
      {
	htmlShow = '<div class="pageerrorcontainer"><ul class="pageerror">';
	htmlShow += e.details;
	htmlShow += '<\/ul><\/div>';
      }
    jQuery('#Edit_Content_Result').html(htmlShow);
  });
});
// ]]>
</script>
EOSCRIPT;
include_once("header.php");

// AJAX result container
print '<div id="Edit_Content_Result"></div>';

$tmpfname = '';

if (!$access)
{
	echo "<div class=\"pageerrorcontainer\"><p class=\"pageerror\">".lang('noaccessto',array(lang('editpage')))."</p></div>";
}
else
{
	#Get a list of content_types and build the dropdown to select one
	$typesdropdown = '<select name="content_type" id="content_type" onchange="document.Edit_Content.submit()" class="standard">';
	$cur_content_type = '';
	foreach ($existingtypes as $onetype => $onetypename )
	{
	  if( $onetype == 'errorpage' && !check_permission($userid,'Manage All Content') ) 
	    {
	      continue;
	    }

	  $typesdropdown .= '<option value="' . $onetype . '"';
	  if ($onetype == $content_type)
	    {
	      $typesdropdown .= ' selected="selected" ';
	      $cur_content_type = $onetype;
	    }
	  $typesdropdown .= ">".$onetypename."</option>";
	}
	$typesdropdown .= "</select>";

	$tabnames = $contentobj->TabNames();

	if( !$error )
	  {
	    $error = $contentobj->GetError();
	  }
	if (FALSE == empty($error))
	  {
	    echo $themeObject->ShowErrors($error);
	  }

	$numberoftabs = count($tabnames);
	$tab_contents_array = array();
	for ($currenttab = 0; $currenttab < $numberoftabs; $currenttab++)
	  {
	    $contentarray = $contentobj->EditAsArray(false, $currenttab, $adminaccess);
	    $tab_contents_array[$currenttab] = $contentarray;
	  }

?>

<div class="pagecontainer pageoverflow">
	<?php
	echo $themeObject->ShowHeader('editcontent');
	?>
	<div id="page_tabs" style="width:100%;">
		<?php
		$count = 0;

		#We have preview, but no tabs
		if (count($tabnames) == 0)
		{
			?>
			<div id="editab0"><?php echo lang('content')?></div>
			<?php
		}
		else
		{
			foreach ($tabnames as $onetab)
			{
				?>
				<div id="editab<?php echo $count?>"><?php echo $onetab?></div>
				<?php
				$count++;
			}
		}
		
		#Make a preview tab
		if ($contentobj->HasPreview())
		{
			echo '<div id="edittabpreview"'.($tmpfname!=''?' class="active"':'').' onclick="##INLINESUBMITSTUFFGOESHERE##xajax_ajaxpreview(xajax.getFormValues(\'Edit_Content\')); return false;">'.lang('preview').'</div>';
		}

		?>
	</div>
	<div style="clear: both;"></div>
	<form method="post" name="Edit_Content" id="Edit_Content" action="editcontent.php<?php if (isset($content_id) && isset($pagelist_id)) echo "?content_id=$content_id&amp;page=$pagelist_id";?>" enctype="multipart/form-data" ##FORMSUBMITSTUFFGOESHERE##>
<div>
  <input type="hidden" name="<?php echo CMS_SECURE_PARAM_NAME ?>" value="<?php echo $_SESSION[CMS_USER_KEY] ?>" />
  <input type="hidden" id="serialized_content" name="serialized_content" value="<?php echo SerializeObject($contentobj); ?>" />
  <input type="hidden" name="content_id" value="<?php echo $content_id?>" />
  <input type="hidden" name="page" value="<?php echo $pagelist_id; ?>" />
  <input type="hidden" name="orig_content_type" value="<?php echo $cur_content_type ?>" />
</div>
<div id="page_content">
<?php
$submit_buttons = '<div class="pageoverflow">
<p class="pagetext">&nbsp;</p>
<p class="pageinput">
 <input type="submit" name="submitbutton" value="'.lang('submit').'" class="pagebutton" title="'.lang('submitdescription').'" />';
$submit_buttons .= ' <input type="submit" name="cancel" value="'.lang('cancel').'" class="pagebutton" title="'.lang('canceldescription').'" />';
$submit_buttons .= ' <input type="submit" name="apply" value="'.lang('apply').'" class="pagebutton" title="'.lang('applydescription').'" />';
 if( $contentobj->IsViewable() && $contentobj->Active() ) {
   $submit_buttons .= ' <a rel="external" href="'.$contentobj->GetURL().'">'.$themeObject->DisplayImage('icons/system/view.gif',lang('view_page'),'','','systemicon').'</a>';
 }
$submit_buttons .= '</p></div>';

//echo $submit_buttons;
		$showtabs = 1;
		if ($numberoftabs == 0)
		{
			$numberoftabs = 1;
			$showtabs = 1;
		}

		for ($currenttab = 0; $currenttab < $numberoftabs; $currenttab++)
		{
			if ($showtabs == 1)
			{
				?><div id="editab<?php echo $currenttab ?>_c"><?php
			}
			if ($currenttab == 0)
			{
				echo $submit_buttons;
				?>
				<div class="pageoverflow">
					<div class="pagetext"><label for="content_type"><?php echo lang('contenttype'); ?></label>:</div>
					<div class="pageinput"><?php echo $typesdropdown; ?></div>
				</div>
				<?php
			}

			if( isset($tab_contents_array[$currenttab]) )
			  {
			    $contentarray =& $tab_contents_array[$currenttab];
			    for($i=0;$i<count($contentarray);$i++)
			      {
				if( !is_array($contentarray[$i]) ) continue;
				?>
				<div class="pageoverflow">
					<div class="pagetext"><?php echo $contentarray[$i][0]; ?></div>
					<div class="pageinput">
				     <?php echo $contentarray[$i][1]; if( isset($contentarray[$i][2]) ) { echo '<br/>'.$contentarray[$i][2]; } ?>
					</div>
				</div>
				<?php
			      }
			  }
            
			?>
			<div style="clear: both;"></div>
		</div>
		<?php
		}
		if ($contentobj->HasPreview())
		{
			echo '<div class="pageoverflow"><div id="edittabpreview_c"'.($tmpfname!=''?' class="active"':'').'>';
				?>
			  <div class="pagewarning"><?php echo lang('info_preview_notice') ?></div>
			  <iframe name="previewframe" class="preview" id="previewframe"<?php if ($tmpfname != '') { ?> src="<?php echo "{$config['root_url']}/index.php?{$config['query_var']}=__CMS_PREVIEW_PAGE__"; } ?>></iframe>
				<?php
			echo '</div></div>';
			echo '<div style="clear: both;"></div>';
		}
		echo $submit_buttons;
		?>
	</div>
	</form>
</div>

<?php

}

echo '<p class="pageback"><a class="pageback" href="'.$themeObject->BackUrl().'">&#171; '.lang('back').'</a></p>';

include_once("footer.php");

# vim:ts=4 sw=4 noet
?>
