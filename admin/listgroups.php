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
$CMS_TOP_MENU='usersgroups';
$CMS_ADMIN_TITLE='currentgroups';

require_once("../include.php");
require_once("../lib/classes/class.group.inc.php");

check_login();

include_once("header.php");

?>
<h3><?php echo lang('currentgroups')?></h3>

<p><a href="topusers.php"><?php echo lang('back')?></a></p>

<?php

	$userid = get_userid();
	$perm = check_permission($userid, 'Modify Permissions');
	$assign = check_permission($userid, 'Modify Group Assignments');
	$edit = check_permission($userid, 'Modify Groups');
	$remove = check_permission($userid, 'Remove Groups');

	#$query = "SELECT group_id, group_name, active FROM ".cms_db_prefix()."groups ORDER BY group_id";
	#$result = $db->Execute($query);

	$grouplist = GroupOperations::LoadGroups();

	$page = 1;
	if (isset($_GET['page']))$page = $_GET['page'];
	$limit = 20;
	if (count($grouplist) > $limit)
	{
		echo "<div align=\"right\" class=\"clearbox\">".pagination($page, count($grouplist), $limit)."</div>";
	}

	if (count($grouplist) > 0) {

		echo "<table cellspacing=\"0\" class=\"AdminTable\" style=\"width: 500px;\">\n";
		echo '<thead>';
		echo "<tr>\n";
		echo "<th width=\"60%\">".lang('name')."</th>\n";
		echo "<th align=\"center\">".lang('active')."</th>\n";
		if ($perm)
			echo "<th width=\"7%\" align=\"center\">&nbsp;</th>\n";
		if ($assign)
			echo "<th width=\"7%\" align=\"center\">&nbsp;</th>\n";
		if ($edit)
			echo "<th width=\"16\">&nbsp;</th>\n";
		if ($remove)
			echo "<th width=\"16\">&nbsp;</th>\n";
		echo "</tr>\n";
		echo '</thead>';
		echo '<tbody>';

		$currow = "row1";

		// construct true/false button images
        $image_true = $themeObject->DisplayImage('true.gif', lang('true'));
        $image_false = $themeObject->DisplayImage('false.gif', lang('false'));
        $image_groupassign = $themeObject->DisplayImage('groupassign.gif', lang('assignments'));
        $image_permissions = $themeObject->DisplayImage('permissions.gif', lang('permissions'));

		$counter=0;
		foreach ($grouplist as $onegroup){
			if ($counter < $page*$limit && $counter >= ($page*$limit)-$limit) {
				echo "<tr class=\"$currow\">\n";
				echo "<td><a href=\"editgroup.php?group_id=".$onegroup->id."\">".$onegroup->name."</a></td>\n";
				echo "<td align=\"center\">".($onegroup->active == 1?$image_true:$image_false)."</td>\n";
				if ($perm)
					echo "<td align=\"center\"><a href=\"changegroupperm.php?group_id=".$onegroup->id."\">".$image_permissions."</a></td>\n";
				if ($assign)
					echo "<td align=\"center\"><a href=\"changegroupassign.php?group_id=".$onegroup->id."\">".$image_groupassign."</a></td>\n";
				if ($edit)
				    {
					echo "<td width=\"16\"><a href=\"editgroup.php?group_id=".$onegroup->id."\">";
                    echo $themeObject->DisplayImage('edit.gif', lang('edit'));
                    echo "</a></td>\n";
                    }
				if ($remove)
				    {
					echo "<td width=\"16\"><a href=\"deletegroup.php?group_id=".$onegroup->id."\" onclick=\"return confirm('".lang('deleteconfirm')."');\">";
                    echo $themeObject->DisplayImage('delete.gif', lang('delete'));
                    echo "</a></td>\n";
                    }
				echo "</tr>\n";

				($currow == "row1"?$currow="row2":$currow="row1");
			}
			$counter++;
		}

		echo '</tbody>';
		echo "</table>\n";

	}

if (check_permission($userid, 'Add Groups')) {
?>

<div class="button"><a href="addgroup.php"><?php echo lang('addgroup')?></a></div><br />

<?php
}

include_once("footer.php");

# vim:ts=4 sw=4 noet
?>
