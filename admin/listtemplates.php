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
#
#$Id$

$CMS_ADMIN_PAGE=1;

require_once("../include.php");
require_once("../lib/classes/class.template.inc.php");

check_login();

include_once("header.php");

if (isset($_GET["message"])) {
	echo '<div class="pagemcontainer"><p class="pagemessage">'.$_GET["message"].'</p></div>';
}

?>

<div class="pagecontainer">
	<div class="pageoverflow">

<?php

	$userid	= get_userid();
	$add = check_permission($userid, 'Add Templates');
	$edit = check_permission($userid, 'Modify Templates');
	$all = check_permission($userid, 'Modify Any Page');
	$remove	= check_permission($userid, 'Remove Templates');

	if ($all && isset($_GET["action"]) && $_GET["action"] == "setallcontent") {
		if (isset($_GET["template_id"])) {
			$query = "UPDATE ".cms_db_prefix()."content SET template_id = ".$_GET["template_id"];
			$result = $db->Execute($query);
			if ($result) {
				$query = "UPDATE ".cms_db_prefix()."content SET modified_date = '".$db->DBTimeStamp(time()) . "'";
				$db->Execute($query);
				echo '<p>All Pages Modified!</p>';
			} else {
				echo '<p class="error">Error updating pages</p>';
			}
		}
	}

	if (isset($_GET['setdefault']))
	{
		$templatelist = TemplateOperations::LoadTemplates();
		foreach ($templatelist as $onetemplate)
		{
			if ($onetemplate->id == $_GET['setdefault'])
			{
				$onetemplate->default = 1;
				$onetemplate->Save();
			}
			else
			{
				$onetemplate->default = 0;
				$onetemplate->Save();
			}
		}
	}

	if (isset($_GET['setactive']) || isset($_GET['setinactive']))
	{
		$theid = '';
		if (isset($_GET['setactive']))
		{
			$theid = $_GET['setactive'];
		}
		if (isset($_GET['setinactive']))
		{
			$theid = $_GET['setinactive'];
		}
		$thetemplate = TemplateOperations::LoadTemplateByID($theid);
		if (isset($thetemplate))
		{
			if (isset($_GET['setactive']))
			{
				$thetemplate->active = 1;
				$thetemplate->Save();
			}
			if (isset($_GET['setinactive']))
			{
				$thetemplate->active = 0;
				$thetemplate->Save();
			}
		}
	}

	$templatelist = TemplateOperations::LoadTemplates();
	
	$page = 1;
	if (isset($_GET['page']))$page = $_GET['page'];
	$limit = 20;
	if (count($templatelist) > $limit)
	{
		echo "<p class=\"pageshowrows\">".pagination($page, count($templatelist), $limit)."</p>";
	}
	echo '<p class="pageheader">'.lang('currenttemplates').'</p></div>';
	if ($templatelist && count($templatelist) > 0) {

		echo '<table cellspacing="0" class="pagetable">';
		echo '<thead>';
		echo "<tr>\n";
		echo '<th class="pagew50">'.lang('template').'</th>';
		echo "<th class=\"pagepos\">".lang('default')."</th>\n";
		echo "<th class=\"pagepos\">".lang('active')."</th>\n";
		if ($edit)
			echo "<th class=\"pagepos\">&nbsp;</th>\n";
		echo "<th class=\"pageicon\">&nbsp;</th>\n";
		if ($add)
			echo "<th class=\"pageicon\">&nbsp;</th>\n";
		if ($remove)
			echo "<th class=\"pageicon\">&nbsp;</th>\n";
		if ($all)
			echo "<th class=\"pageicon\">&nbsp;</th>\n";

		echo "</tr>\n";
		echo '</thead>';
		echo '<tbody>';

		$currow = "row1";
		$counter=0;

		foreach ($templatelist as $onetemplate)
		{
			// construct true/false button images
            $image_true = "<a href=\"listtemplates.php?setinactive=".$onetemplate->id."\">".$themeObject->DisplayImage('icons/system/true.gif', lang('true'),'','','systemicon')."</a>";
            $image_false = "<a href=\"listtemplates.php?setactive=".$onetemplate->id."\">".$themeObject->DisplayImage('icons/system/false.gif', lang('false'),'','','systemicon')."</a>";
			$default_true =$themeObject->DisplayImage('icons/system/true.gif', lang('true'),'','','systemicon');
			$default_false ="<a href=\"listtemplates.php?setdefault=".$onetemplate->id."\">".$themeObject->DisplayImage('icons/system/false.gif', lang('false'),'','','systemicon')."</a>";

			if ($counter < $page*$limit && $counter >= ($page*$limit)-$limit) {
  			    echo "<tr class=\"$currow\" onmouseover=\"this.className='".$currow.'hover'."';\" onmouseout=\"this.className='".$currow."';\">\n";
				echo "<td><a href=\"edittemplate.php?template_id=".$onetemplate->id."\">".$onetemplate->name."</a></td>\n";
				echo "<td class=\"pagepos\">".($onetemplate->default == 1?$default_true:$default_false)."</td>\n";
				echo "<td class=\"pagepos\">".($onetemplate->active == 1?$image_true:$image_false)."</td>\n";

				# set template to all content
				if ($all)
					echo "<td class=\"pagepos\"><a href=\"listtemplates.php?action=setallcontent&amp;template_id=".$onetemplate->id."\" onclick=\"return confirm('".lang('setallcontentconfirm')."');\">".lang('setallcontent')."</a></td>\n";

				# view css association
				echo "<td><a href=\"listcssassoc.php?type=template&amp;id=".$onetemplate->id."\">";
                echo $themeObject->DisplayImage('icons/system/css.gif', lang('attachstylesheets'),'','','systemicon');
                echo "</a></td>\n";

				# add new template
				if ($add)
				    {
					echo "<td><a href=\"copytemplate.php?template_id=".$onetemplate->id."&amp;template_name=".$onetemplate->name."\">";
                    echo $themeObject->DisplayImage('icons/system/copy.gif', lang('copy'),'','','systemicon');
                    echo "</a></td>\n";
                    }

				# edit template
				if ($edit)
				    {
					echo "<td><a href=\"edittemplate.php?template_id=".$onetemplate->id."\">";
                    echo $themeObject->DisplayImage('icons/system/edit.gif', lang('edit'),'','','systemicon');
                    echo "</a></td>\n";
                    }

				# remove template
				if ($remove)
				    {
					echo "<td><a href=\"deletetemplate.php?template_id=".$onetemplate->id."\" onclick=\"return confirm('".lang('deleteconfirm')."');\">";
                    echo $themeObject->DisplayImage('icons/system/delete.gif', lang('delete'),'','','systemicon');
                    echo "</a></td>\n";
        }
				echo "</tr>\n";

				($currow=="row1"?$currow="row2":$currow="row1");

			}
			$counter++;
		}

		echo '</tbody>';
		echo "</table>\n";

	}

if ($add) {
?>
	<div class="pageoptions">
		<p class="pageoptions">
			<a href="addtemplate.php">
				<?php 
					echo $themeObject->DisplayImage('icons/system/newobject.gif', lang('addtemplate'),'','','systemicon').'</a>';
					echo ' <a class="pageoptions" href="addtemplate.php">'.lang("addtemplate");
				?>
			</a>
		</p>		
	</div>
</div>
<p class="pageback"><a class="pageback" href="<?php echo $themeObject->BackUrl(); ?>">&#171; <?php echo lang('back')?></a></p>

<?php
}

include_once("footer.php");

# vim:ts=4 sw=4 noet
?>
