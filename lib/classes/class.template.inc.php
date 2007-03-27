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
#$Id: class.template.inc.php 3362 2006-08-22 09:55:33Z wishy $

/**
 * Generic template class. This can be used for any template or template related function.
 *
 * @since		0.6
 * @package		CMS
 */
class Template
{
	var $id;
	var $name;
	var $content;
	var $stylesheet;
	var $encoding;
	var $active;
	var $default;

	function Template()
	{
		$this->SetInitialValues();
	}

	function SetInitialValues()
	{
		$this->id = -1;
		$this->name = '';
		$this->content = '';
		$this->stylesheet = '';
		$this->encoding = '';
		$this->active = false;
		$this->default = false;
	}

	function Id()
	{
		return $this->id;
	}

	function Name()
	{
		return $this->name;
	}

	function UsageCount()
	{
		global $gCms;
		$templateops =& $gCms->GetTemplateOperations();
		if ($this->id > -1)
			return $templateops->UsageCount($this->id);
		else
			return 0;
	}

	function Save()
	{
		$result = false;
		
		global $gCms;
		$templateops =& $gCms->GetTemplateOperations();
		
		if ($this->id > -1)
		{
			$result = $templateops->UpdateTemplate($this);
		}
		else
		{
			$newid = $templateops->InsertTemplate($this);
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
			$templateops =& $gCms->GetTemplateOperations();
			$result = $templateops->DeleteTemplateByID($this->id);
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
