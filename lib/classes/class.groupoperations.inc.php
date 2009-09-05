<?php
#CMS - CMS Made Simple
#(c)2004-6 by Ted Kulp (ted@cmsmadesimple.org)
#This project's homepage is: http://cmsmadesimple.org
#
#This program is free software; you can redistribute it and/or modify
#it under the terms of the GNU General Public License as published by
#the Free Software Foundation; either version 2 of the License, or
#(at your option) any later version.
#
#This program is distributed in the hope that it will be useful,
#BUT withOUT ANY WARRANTY; without even the implied warranty of
#MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#GNU General Public License for more details.
#You should have received a copy of the GNU General Public License
#along with this program; if not, write to the Free Software
#Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
#
#$Id$

/**
 * Class for doing group related functions.  Maybe of the Group object functions are just wrappers around these.
 *
 * @since		0.6
 * @package		CMS
 */

include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'class.group.inc.php');

class GroupOperations
{
	function LoadGroups()
	{
		global $gCms;
		$db = &$gCms->GetDb();

		$result = array();

		$query = "SELECT group_id, group_name, active FROM ".cms_db_prefix()."groups ORDER BY group_id";
		$dbresult = $db->Execute($query);

		while ($dbresult && $row = $dbresult->FetchRow())
		{
			$onegroup = new Group();
			$onegroup->id = $row['group_id'];
			$onegroup->name = $row['group_name'];
			$onegroup->active = $row['active'];
			$result[] = $onegroup;
		}

		return $result;
	}

	function & LoadGroupByID($id)
	{

		$result = false;

		global $gCms;
		$db = &$gCms->GetDb();

		$query = "SELECT group_id, group_name, active FROM ".cms_db_prefix()."groups WHERE group_id = ? ORDER BY group_id";
		$dbresult = $db->Execute($query, array($id));

		while ($dbresult && $row = $dbresult->FetchRow())
		{
			$onegroup = new Group();
			$onegroup->id = $row['group_id'];
			$onegroup->name = $row['group_name'];
			$onegroup->active = $row['active'];
			$result = $onegroup;
		}

		return $result;
	}

	function InsertGroup($group)
	{
		$result = -1; 

		global $gCms;
		$db = &$gCms->GetDb();

		$query = 'SELECT group_id FROM '.cms_db_prefix().'groups WHERE group_name = ?';
		$tmp = $db->GetOne($query,array($group->name));
		if( $tmp )
		  {
		    return $result;
		  }

		$new_group_id = $db->GenID(cms_db_prefix()."groups_seq");
		$time = $db->DBTimeStamp(time());
		$query = "INSERT INTO ".cms_db_prefix()."groups (group_id, group_name, active, create_date, modified_date) VALUES (?,?,?,".$time.", ".$time.")";
		$dbresult = $db->Execute($query, array($new_group_id, $group->name, $group->active));
		if ($dbresult !== false)
		{
			$result = $new_group_id;
		}

		return $result;
	}

	function UpdateGroup($group)
	{
		$result = false; 

		global $gCms;
		$db = &$gCms->GetDb();

		$query = 'SELECT group_id FROM '.cms_db_prefix().'groups WHERE group_name = ? AND group_id != ?';
		$tmp = $db->GetOne($query,array($group->name,$group->id));
		if( $tmp )
		  {
		    return $result;
		  }

		$time = $db->DBTimeStamp(time());
		$query = "UPDATE ".cms_db_prefix()."groups SET group_name = ?, active = ?, modified_date = ".$time." WHERE group_id = ?";
		$dbresult = $db->Execute($query, array($group->name, $group->active, $group->id));
		if ($dbresult !== false)
		{
			$result = true;
		}

		return $result;
	}

	function DeleteGroupByID($id)
	{
		$result = false;

		global $gCms;
		$db = &$gCms->GetDb();

		$query = 'DELETE FROM '.cms_db_prefix().'user_groups where group_id = ?';
		$dbresult = $db->Execute($query, array($id));

		$query = "DELETE FROM ".cms_db_prefix()."group_perms where group_id = ?";
		$dbresult = $db->Execute($query, array($id));

		$query = "DELETE FROM ".cms_db_prefix()."groups where group_id = ?";
		$dbresult = $db->Execute($query, array($id));

		if ($dbresult !== false)
		{
			$result = true;
		}

		return $result;
	}
}

?>
