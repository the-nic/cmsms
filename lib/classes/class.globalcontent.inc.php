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
 * Generic html blob class. This can be used for any logged in blob or blob related function.
 *
 * @since		0.6
 * @package		CMS
 */
class GlobalContent
{
	var $id;
	var $name;
	var $content;
	var $owner;
	var $modified_date;

	function GlobalContent()
	{
		$this->SetInitialValues();
	}

	function SetInitialValues()
	{
		$this->id = -1;
		$this->name = '';
		$this->content = '';
		$this->owner = -1;
		$this->modified_date = -1;
	}

	function Id()
	{
		return $this->id;
	}

	function Name()
	{
		return $this->name;
	}

	function Save()
	{
		$result = false;
		
		global $gCms;
		$gcbops =& $gCms->GetGlobalContentOperations();
		
		if ($this->id > -1)
		{
			$result = $gcbops->UpdateHtmlBlob($this);
		}
		else
		{
			$newid = $gcbops->InsertHtmlBlob($this);
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
		
		global $gCms;
		$gcbops =& $gCms->GetGlobalContentOperations();

		if ($this->id > -1)
		{
			$result = $gcbops->DeleteHtmlBlobByID($this->id);
			if ($result)
			{
				$this->SetInitialValues();
			}
		}

		return $result;
	}

	function IsOwner($user_id)
	{
		$result = false;
		
		global $gCms;
		$gcbops =& $gCms->GetGlobalContentOperations();

		if ($this->id > -1)
		{
			$result = $gcbops->CheckOwnership($this->id, $user_id);
		}

		return $result;
	}

	function IsAuthor($user_id)
	{
		$result = false;
		
		global $gCms;
		$gcbops =& $gCms->GetGlobalContentOperations();

		if ($this->id > -1)
		{
			$result = $gcbops->CheckAuthorship($this->id, $user_id);
		}

		return $result;
	}

	function ClearAuthors()
	{
		$result = false;
		
		global $gCms;
		$gcbops =& $gCms->GetGlobalContentOperations();

		if ($this->id > -1)
		{
			$gcbops->ClearAdditionalEditors($this->id);
			$result = true;
		}

		return $result;
	}

	function AddAuthor($user_id)
	{
		$result = false;
		
		global $gCms;
		$gcbops =& $gCms->GetGlobalContentOperations();

		if ($this->id > -1)
		{
			$gcbops->InsertAdditionalEditors($this->id, $user_id);
			$result = true;
		}

		return $result;
	}
}

class HtmlBlob extends GlobalContent
{
}

# vim:ts=4 sw=4 noet
?>
