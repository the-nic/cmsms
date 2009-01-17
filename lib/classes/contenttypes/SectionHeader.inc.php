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
#$Id: SectionHeader.inc.php 5276 2008-11-27 18:47:43Z calguy1000 $

class SectionHeader extends ContentBase
{

    function SectionHeader() {
        $this->ContentBase();
        $this->mProperties->SetAllowedPropertyNames(array('extra1','extra2','extra3',
							  'image','thumbnail'));
    }

    function FriendlyName()
    {
      return lang('contenttype_sectionheader');
    }

    function SetProperties()
    {
	$this->mProperties->Add('string', 'extra1'); 
	$this->mProperties->Add('string', 'extra2'); 
	$this->mProperties->Add('string', 'extra3'); 
	$this->mProperties->Add('string', 'image'); 
	$this->mProperties->Add('string', 'thumbnail'); 

	#Turn off caching
	$this->mCachable = false;
    }

    function HasUsableLink()
    {
	return false;
    }

    function FillParams($params)
    {
	if (isset($params))
	{
	  if( isset($params['extra1']) )
	    {
	      $this->SetPropertyValue('extra1',trim($params['extra1']));
	    }
	  if( isset($params['extra2']) )
	    {
	      $this->SetPropertyValue('extra2',trim($params['extra2']));
	    }
	  if( isset($params['extra3']) )
	    {
	      $this->SetPropertyValue('extra3',trim($params['extra3']));
	    }
	  if( isset($params['image']) )
	    {
	      $this->SetPropertyValue('image',trim($params['image']));
	    }
	  if( isset($params['thumbnail']) )
	    {
	      $this->SetPropertyValue('thumbnail',trim($params['thumbnail']));
	    }
	    if (isset($params['title']))
	    {
		$this->mName = $params['title'];
	    }
	    if (isset($params['menutext']))
	    {
		$this->mMenuText = $params['menutext'];
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
	    if (isset($params['alias']))
	    {
		$this->SetAlias($params['alias']);
	    }
	}
    }

    function ValidateData()
    {
	$result = true;
	$errors = array();
	
	if ($this->mName == '')
	{
	    $errors[]= lang('nofieldgiven',array(lang('title')));
	    $result = false;
	}

	if ($this->mMenuText == '')
	{
	    $errors[]= lang('nofieldgiven',array(lang('menutext')));
	    $result = false;
	}

	return (count($errors) > 0?$errors:FALSE);
    }

    function Show()
    {
    }

    function EditAsArray($adding = false, $tab = 0, $showadmin = false)
    {
	global $gCms;
	
	$ret = array();

	$ret[]= array(lang('title').':','<input type="text" name="title" value="'.cms_htmlentities($this->mName).'" />');
	$ret[]= array(lang('menutext').':','<input type="text" name="menutext" value="'.cms_htmlentities($this->mMenuText).'" />');
	$ret[]= array(lang('pagealias').':','<input type="text" name="alias" value="'.$this->mAlias.'" />');
    if (check_permission(get_userid(), 'Modify Page Structure') || ($adding == true && check_permission(get_userid(), 'Add Pages')))
    {
		$contentops =& $gCms->GetContentOperations();
    	$ret[]= array(lang('parent').':', $contentops->CreateHierarchyDropdown($this->mId, $this->mParentId));
    }

      global $gCms;
      $config =& $gCms->GetConfig();
      $dir = $config['image_uploads_path'];
      $data = $this->GetPropertyValue('image');
      $dropdown = create_file_dropdown('image',$dir,$data,'jpg,jpeg,png,gif','',true,'','thumb_');
      $ret[] = array(lang('image').':',$dropdown);
      
      $data = $this->GetPropertyValue('thumbnail');
      $dropdown = create_file_dropdown('thumbnail',$dir,$data,'jpg,jpeg,png,gif','',true,'','thumb_',0);
      $ret[] = array(lang('thumbnail').':',$dropdown);

	$ret[]= array(lang('active').':','<input type="checkbox" name="active"'.($this->mActive?' checked="checked"':'').' />') ;
	$ret[]= array(lang('showinmenu').':','<input type="checkbox" name="showinmenu"'.($this->mShowInMenu?' checked="checked"':'').' />');
	$ret[]= array(lang('extra1').':','<input type="text" name="extra1" maxlength="255" size="80" value="'.cms_htmlentities($this->GetPropertyValue('extra1')).'" />');
	$ret[]= array(lang('extra2').':','<input type="text" name="extra2" maxlength="255" size="80" value="'.cms_htmlentities($this->GetPropertyValue('extra2')).'" />');
	$ret[]= array(lang('extra3').':','<input type="text" name="extra3" maxlength="255" size="80" value="'.cms_htmlentities($this->GetPropertyValue('extra3')).'" />');

	if (!$adding && $showadmin)
	{
		$userops =& $gCms->GetUserOperations();
	    $ret[]= array(lang('owner').':', $userops->GenerateDropdown($this->Owner()));
	}

	if ($adding || $showadmin)
	{
	  if( $adding )
	    {
	      $addeditors = get_site_preference('additional_editors','');
	      $addteditors = explode(",",$addeditors);
	      $ret[]= $this->ShowAdditionalEditors($addteditors);
	    }
	  else
	    {
	      $ret[]= $this->ShowAdditionalEditors();
	    }
	}

	return $ret;
    }

    function GetURL($rewrite = true)
    {
	return '#';
    }
}

# vim:ts=4 sw=4 noet
?>
