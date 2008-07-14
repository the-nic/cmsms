<?php
#CMS - CMS Made Simple
#(c)2004 by Ted Kulp (tedkulp@users.sf.net)
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
#$Id: class.group.inc.php 3360 2006-08-22 01:39:33Z wishy $

/**
 * Generic group class. This can be used for any logged in group or group related function.
 *
 * @since		0.9
 * @package		CMS
 */

class Group
{
	var $id;
	var $name;
	var $active;

	function Group()
	{
		$this->SetInitialValues();
	}

	function SetInitialValues()
	{
		$this->id = -1;
		$this->name = '';
		$this->active = false;
	}

	function Save()
	{
		$result = false;
		
		global $gCms;
		$groupops =& $gCms->GetGroupOperations();
		
		if ($this->id > -1)
		{
			$result = $groupops->UpdateGroup($this);
		}
		else
		{
			$newid = $groupops->InsertGroup($this);
			if ($newid > -1)
			{
				$this->id = $newid;
				$result = true;
			}

		}

		return $result;
	}

	function Delete()
	{
		$result = false;

		if ($this->id > -1)
		{
			global $gCms;
			$groupops =& $gCms->GetGroupOperations();
			$result = $groupops->DeleteGroupByID($this->id);
			if ($result)
			{
				$this->SetInitialValues();
			}
		}

		return $result;
	}
}

# vim:ts=4 sw=4 noet
?>
