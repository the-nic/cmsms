<?php
#CMS - CMS Made Simple
#(c)2004 by Ted Kulp (wishy@users.sf.net)
#This project's homepage is: http://cmsmadesimple.sf.net
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

$CMS_ADMIN_PAGE=1;

require_once("../include.php");

if (isset($_POST["cancel"]))
{
	redirect("listcontent.php");
	return;
}

check_login();

$error = "";

$submit = false;
if (isset($_POST["submitbutton"])) $submit = true;

#Get a list of content types and pick a default if necessary
$existingtypes = ContentManager::ListContentTypes();
$content_type = "";
if (isset($_POST["content_type"]))
{
	$content_type = $_POST["content_type"];
}
else
{
	if (isset($existingtypes) && count($existingtypes) > 0)
	{
		$content_type = $existingtypes[0];
	}
	else
	{
		$error = "<p>No content types loaded!</p>";	
	}
}

$contentobj = "";
if (isset($_POST["serialized_content"]))
{
	$contentobj = unserialize(base64_decode($_POST["serialized_content"]));
	if (get_class($contentobj) != $content_type)
	{
		#Fill up the existing object with values in form
		#Create new object
		#Copy important fields to new object
		#Put new object on top of old on

		$contentobj->FillParams($_POST);
		$tmpobj = new $content_type;
		$tmpobj->mName = $contentobj->mName;
		$tmpobj->mMenuText = $contentobj->mMenuText;
		$tmpobj->mTemplateId = $contentobj->mTemplateId;
		$tmpobj->mAlias = $contentobj->mAlias;
		$tmpobj->mOwner = $contentobj->mOwner;
		$tmpobj->mActive = $contentobj->mActive;
		$contentobj = $tmpobj;
	}
}
else
{
	$contentobj = new $content_type;
	$contentobj->mActive = true;
}


#Get current userid and make sure they have permission to add something
$userid = get_userid();
$access = check_permission($userid, 'Add Content');

if ($access)
{
	if ($submit)
	{
		#Fill contentobj with parameters
		$contentobj->FillParams($_POST);
		$contentobj->Save();
		ContentManager::SetAllHierarchyPositions();
		audit($contentobj->Id(), $contentobj->Name(), 'Added Content');
		redirect("listcontent.php");
		return;
	}
}

include_once("header.php");

#Get a list of content_types and build the dropdown to select one
$typesdropdown = '<select name="content_type" onchange="document.addform.submit()" class="standard">';
foreach ($existingtypes as $onetype)
{
	$typesdropdown .= "<option value=\"$onetype\"";
	if ($onetype == $content_type)
	{
		$typesdropdown .= " selected ";
	}
	$typesdropdown .= ">".ucfirst($onetype)."</option>";
}
$typesdropdown .= "</select>";

?>

<form method="post" action="addcontent.php" name="addform" id="addform">

<h3><?php echo lang('addcontent')?></h3>

<div class="adminform">

<table width="100%" border="0" cellpadding="0" cellspacing="0" summary="">
	<tr>
		<td><?php echo lang('contenttype') ?>:</td>
		<td><?php echo $typesdropdown ?></td>
	</tr>
	<?php
		#Make sure the edit method exists in our contentobj
		#If so, run it
		if (in_array('edit', get_class_methods($contentobj)))
		{
			echo $contentobj->Edit();
		}
	?>
</table>

<?php if (isset($contentobj->mPreview) && $contentobj->mPreview == true) { ?>
<input type="submit" name="preview" value="<?php echo lang('preview')?>" class="button" onmouseover="this.className='buttonHover'" onmouseout="this.className='button'">
<?php } ?>
<input type="submit" name="submitbutton" value="<?php echo lang('submit')?>" class="button" onmouseover="this.className='buttonHover'" onmouseout="this.className='button'">
<input type="submit" name="cancel" value="<?php echo lang('cancel')?>" class="button" onmouseover="this.className='buttonHover'" onmouseout="this.className='button'">

</div> <!--end adminform-->

<input type="hidden" name="serialized_content" value="<?php echo base64_encode(serialize($contentobj)) ?>">

</form>

<?php

include_once("footer.php");

# vim:ts=4 sw=4 noet
?>
