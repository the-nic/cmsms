<?php
# CMS - CMS Made Simple
# (c)2004 by Ted Kulp (tedkulp@users.sf.net)
# This project's homepage is: http://cmsmadesimple.org
#
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# BUT withOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
#
#$Id$

class Content extends ContentBase
{	
	function __construct()
	{
		parent::__construct();
	}
	
    function FriendlyName()
    {
		return 'Content';
    }

    function SetProperties()
    {
		$this->AddProperty('string', 'content');

		#Turn on preview
		$this->preview = true;
    }

    function GetTabDefinitions()
    {
		return array('Basic', 'Advanced');
		#return array();
    }

	function FillParams($params)
	{
		global $gCms;
		$config = $gCms->config;

		if (isset($params))
		{
			$parameters = array('content_en');

			//pick up the template id before we do parameters
			if (isset($params['template_id']))
			{
				if ($this->template_id != $params['template_id'])
				{
					$this->addtContentBlocksLoaded = false;
				}
				$this->template_id = $params['template_id'];
			}

			// add additional content blocks
			$this->GetAdditionalContentBlocks();
			foreach($this->additionalContentBlocks as $blockName => $blockNameId)
			{
				$parameters[] = $blockNameId['id'];
			}

			foreach ($parameters as $oneparam)
			{
				if (isset($params[$oneparam]))
				{
					$this->SetPropertyValue($oneparam, $params[$oneparam]);
				}
			}
			if (isset($params['title']))
			{
				$this->mName = $params['title'];
			}
			if (isset($params['metadata']))
			{
				$this->mMetadata = $params['metadata'];
			}
			if (isset($params['accesskey']))
			{
				$this->mAccessKey = $params['accesskey'];
			}
			if (isset($params['titleattribute']))
			{
				$this->mTitleAttribute = $params['titleattribute'];
			}
			if (isset($params['tabindex']))
			{
				$this->mTabIndex = $params['tabindex'];
			}
			if (isset($params['menutext']))
			{
				$this->mMenuText = $params['menutext'];
			}
			if (isset($params['alias']))
			{
				$this->SetAlias(trim($params['alias']));
			}
			if (isset($params['parent_id']))
			{
				if ($this->mParentId != $params['parent_id'])
				{
					$this->mHierarchy = '';
					$this->mItemOrder = -1;
				}
				$this->mParentId = $params['parent_id'];
			}
			if (isset($params['active']))
			{
				$this->mActive = true;
			}
			else
			{
				$this->mActive = false;
			}
			if (isset($params['showinmenu']))
			{
				$this->mShowInMenu = true;
			}
			else
			{
				$this->mShowInMenu = false;
			}
			if (isset($params['cachable']))
			{
				$this->mCachable = true;
			}
			else
			{
				$this->mCachable = false;
			}
		}
	}

    function Show($param = 'content_en')
    {
		return $this->GetPropertyValue($param);
    }

    function IsDefaultPossible()
    {
		return TRUE;
    }

    function TabNames()
    {
		return array(lang('main'), lang('options'));
    }

	function EditAsArray($adding = false, $tab = 0, $showadmin = false)
	{
		global $gCms;

		$config = $gCms->GetConfig();
		$templateops =& $gCms->GetTemplateOperations();
		$ret = array();
		$stylesheet = '';
		if ($this->template_id > 0)
		{
			$stylesheet = '../stylesheet.php?templateid='.$this->template_id;
		}
		else
		{
			$defaulttemplate = $templateops->LoadDefaultTemplate();
			if (isset($defaulttemplate))
			{
				$this->template_id = $defaulttemplate->id;
				$stylesheet = '../stylesheet.php?templateid='.$this->template_id;
			}
		}
		if ($tab == 0)
		{
			$ret[]= array(lang('title').':','<input type="text" name="title" value="'.cms_htmlentities($this->name).'" />');
			$ret[]= array(lang('menutext').':','<input type="text" name="menutext" value="'.cms_htmlentities($this->menu_text).'" />');
			if (check_permission(get_userid(), 'Modify Page Structure') || ($adding == true && check_permission(get_userid(), 'Add Pages')))
			{
				$contentops =& $gCms->GetContentOperations();
				$ret[]= array(lang('parent').':',$contentops->CreateHierarchyDropdown($this->id, $this->parent_id));
			}
			$additionalcall = '';
			foreach($gCms->modules as $key=>$value)
			{
				if (get_preference(get_userid(), 'wysiwyg')!="" && 
				$gCms->modules[$key]['installed'] == true &&
				$gCms->modules[$key]['active'] == true &&
				$gCms->modules[$key]['object']->IsWYSIWYG() &&
				$gCms->modules[$key]['object']->GetName()==get_preference(get_userid(), 'wysiwyg'))
				{
					$additionalcall = $gCms->modules[$key]['object']->WYSIWYGPageFormSubmit();
				}
			}

			$ret[]= array(lang('template').':', $templateops->TemplateDropdown('template_id', $this->template_id, 'onchange="document.contentform.submit()"'));
			$ret[]= array(lang('content').':',create_textarea(true, $this->GetPropertyValue('content'), 'content_en', '', 'content_en', '', $stylesheet));

			// add additional content blocks if required
			$this->GetAdditionalContentBlocks(); // this is needed as this is the first time we get a call to our class when editing.
			foreach($this->additionalContentBlocks as $blockName => $blockNameId)
			{
				if ($blockNameId['oneline'] == 'true')
				{
					$ret[]= array(ucwords($blockName).':','<input type="text" name="'.$blockNameId['id'].'" value="'.$this->GetPropertyValue($blockNameId['id']).'" />');
				}
				else
				{
					$ret[]= array(ucwords($blockName).':',create_textarea(($blockNameId['usewysiwyg'] == 'false'?false:true), $this->GetPropertyValue($blockNameId['id']), $blockNameId['id'], '', $blockNameId['id'], '', $stylesheet));
				}
			}
		}
		if ($tab == 1)
		{
			$ret[]= array(lang('active').':','<input class="pagecheckbox" type="checkbox" name="active"'.($this->active?' checked="checked"':'').' />');
			$ret[]= array(lang('showinmenu').':','<input class="pagecheckbox" type="checkbox" name="showinmenu"'.($this->show_in_menu?' checked="checked"':'').' />');
			$ret[]= array(lang('cachable').':','<input class="pagecheckbox" type="checkbox" name="cachable"'.($this->cachable?' checked="checked"':'').' />');
			$ret[]= array(lang('pagealias').':','<input type="text" tiname="alias" value="'.$this->alias.'" />');
			$ret[]= array(lang('metadata').':',create_textarea(false, $this->metadata, 'metadata', 'pagesmalltextarea', 'metadata', '', '', '80', '6'));

			$ret[]= array(lang('titleattribute').':','<input type="text" name="titleattribute" maxlength="255" size="80" value="'.cms_htmlentities($this->title_attribute).'" />');
			$ret[]= array(lang('tabindex').':','<input type="text" name="tabindex" maxlength="10" value="'.cms_htmlentities($this->tab_index).'" />');
			$ret[]= array(lang('accesskey').':','<input type="text" name="accesskey" maxlength="5" value="'.cms_htmlentities($this->access_key).'" />');

			if (!$adding && $showadmin)
			{
				$userops =& $gCms->GetUserOperations();
				$ret[]= array(lang('owner').':', $userops->GenerateDropdown($this->owner_id));
			}

			if ($adding || $showadmin)
			{
				$ret[]= $this->ShowAdditionalEditors();
			}
		}
		return $ret;
	}

	function ValidateData()
	{
		$errors = array();

		if ($this->mName == '')
		{
			if ($this->mMenuText != '')
			{
				$this->mName = $this->mMenuText;
			}
			else
			{
				$errors[]= lang('nofieldgiven',array(lang('title')));
				$result = false;
			}
		}

		if ($this->mMenuText == '')
		{
			if ($this->mName != '')
			{
				$this->mMenuText = $this->mName;
			}
			else
			{
				$errors[]=lang('nofieldgiven',array(lang('menutext')));
				$result = false;
			}
		}

		if ($this->mAlias != $this->mOldAlias || $this->mAlias == '') #Should only be empty if auto alias is false
		{
			global $gCms;
			$contentops =& $gCms->GetContentOperations();
			$error = $contentops->CheckAliasError($this->mAlias, $this->mId);
			if ($error !== FALSE)
			{
				$errors[]= $error;
				$result = false;
			}
		}

		if ($this->template_id == '')
		{
			$errors[]= lang('nofieldgiven',array(lang('template')));
			$result = false;
		}

		if ($this->GetPropertyValue('content_en') == '')
		{
			$errors[]= lang('nofieldgiven',array(lang('content')));
			$result = false;
		}

		return (count($errors) > 0?$errors:FALSE);
	}
}

Content::register_orm_class('Content');

# vim:ts=4 sw=4 noet
?>
