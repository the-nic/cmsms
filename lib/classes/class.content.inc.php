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
#$Id: class.content.inc.php 3384 2006-08-23 15:59:52Z dittmann $

/**
 * Generic content class.
 *
 * As for some treatment we don't need the extra properties of the content
 * we load them only when required. However, each function which makes use
 * of extra properties should first test if the properties object exist.
 *
 * @since		0.8
 * @package		CMS
 */

class ContentBase
{
    /**
     * The unique ID identifier of the element
     * Integer
     */
    var $mId;

    /**
     * The name of the element (like a filename)
     * String
     */
     var $mName;

    /**
     * The type of content (page, url, etc..)
     * String
     */
    var $mType;

    /**
     * The owner of the content
     * Integer
     */
    var $mOwner;

    /**
     * The properties part of the content. This is an object of the good type.
     * It should contain all treatments specific to this type of content
     */
     var $mProperties;
     
     var $mPropertiesLoaded;

    /**
     * The ID of the parent, 0 if none
     * Integer
     */
    var $mParentId;

    /**
     * The old parent id... only used on update
     */
    var $mOldParentId;

    /**
     * This is used too often to not be part of the base class
     */
    var $mTemplateId;

    /**
     * The item order of the content in his level
     * Integer
     */
    var $mItemOrder;

    /**
     * The old item order... only used on update
     */
    var $mOldItemOrder;

    /**
     * The metadata (head tags) fir this content
     */
    var $mMetadata;

    var $mTitleAttribute;
    var $mAccessKey;
    var $mTabIndex;

    /**
     * The full hierarchy of the content
     * String of the form : 1.4.3
     */
    var $mHierarchy;

    /**
     * The full hierarchy of the content ids
     * String of the form : 1.4.3
     */
    var $mIdHierarchy;

    /**
     * The full path through the hierarchy
     * String of the form : parent/parent/child
     */
    var $mHierarchyPath;

    /**
     * What should be displayed in a menu
     */
    var $mMenuText;

    /**
     * Is the content active ?
     * Integer : 0 / 1
     */
    var $mActive;

    /**
     * Alias of the content
     */
    var $mAlias;

    var $mOldAlias;

    /**
     * Cachable?
     */
    var $mCachable;

    /**
     * Does this content have a preview function?
     */
    var $mPreview;

    /**
     * Should it show up in the menu?
     */
    var $mShowInMenu;

    /**
     * Is this page the default?
     */
    var $mDefaultContent;
	
    /**
     * What type of markup is ths?  HTML is the default
     */
    var $mMarkup;

    /**
     * Last user to modify this content
     */
    var $mLastModifiedBy;

    /**
     * Creation date
     * Date
     */
    var $mCreationDate;

    /**
     * Modification date
     * Date
     */
    var $mModifiedDate;
    
    var $mAdditionalEditors;
	
    var $mReadyForEdit;
    /************************************************************************/
    /* Constructor related													*/
    /************************************************************************/

    /**
     * Generic constructor. Runs the SetInitialValues fuction.
     */
    function ContentBase()
    {
	$this->SetInitialValues();
	$this->SetProperties();
	$this->mPropertiesLoaded = false;
	$this->mReadyForEdit = false;
    }

    /**
     * Sets object to some sane initial values
     */
    function SetInitialValues()
    {
	$this->mId             = -1 ;
	$this->mName           = "" ;
	$this->mAlias          = "" ;
	$this->mOldAlias       = "" ;
	$this->mType           = strtolower(get_class($this)) ;
	$this->mOwner          = -1 ;
	$this->mProperties     = new ContentProperties();
	$this->mParentId       = -1 ;
	$this->mOldParentId    = -1 ;
	$this->mTemplateId     = -1 ;
	$this->mItemOrder      = -1 ;
	$this->mOldItemOrder   = -1 ;
	$this->mLastModifiedBy = -1 ;
	$this->mHierarchy      = "" ;
	$this->mIdHierarchy    = "" ;
	$this->mHierarchyPath  = "" ;
	$this->mMetadata       = "" ;
	$this->mTitleAttribute = "" ;
	$this->mAccessKey      = "" ;
	$this->mTabIndex       = "" ;
	$this->mActive         = false ;
	$this->mDefaultContent = false ;
	$this->mShowInMenu     = false ;
	$this->mCachable       = true;
	$this->mMenuText       = "" ;
	$this->mCreationDate   = "" ;
	$this->mModifiedDate   = "" ;
	$this->mPreview        = false ;
	$this->mMarkup         = 'html' ;
	$this->mChildCount     = 0;
	$this->mPropertiesLoaded = false;
    }

    /**
     * Subclasses should override this to set their property types using a lot
     * of mProperties.Add statements
     */
    function SetProperties()
    {
    }

    
    /************************************************************************/
    /* Functions giving access to needed elements of the content			*/
    /************************************************************************/

    /**
     * Returns the ID
     */
    function Id()
    {
	return $this->mId;
    }

    function SetId($id)
    {
	$this->DoReadyForEdit();
	$this->mId = $id;
    }

    /**
     * Returns a friendly name for this content type
     */
    function FriendlyName()
    {
	return '';
    }

    /**
     * Returns the Name
     */
    function Name()
    {
	return $this->mName;
    }

    function SetName($name)
    {
	$this->DoReadyForEdit();
	$this->mName = $name;
    }

    /**
     * Returns the Alias
     */
    function Alias()
    {
	return $this->mAlias;
    }

    /**
     * Returns the Type
     */
    function Type()
    {
	return strtolower($this->mType);
    }

    function SetType($type)
    {
	$this->DoReadyForEdit();
	$this->mType = strtolower($type);
    }

    /**
     * Returns the Owner
     */
    function Owner()
    {
	return $this->mOwner;
    }

    function SetOwner($owner)
    {
	$this->DoReadyForEdit();
	$this->mOwner = $owner;
    }

    /**
     * Returns the Metadata
     */
    function Metadata()
    {
	return $this->mMetadata;
    }

    function SetMetadata($metadata)
    {
	$this->DoReadyForEdit();
	$this->mMetadata = $metadata;
    }

    function TabIndex()
    {
	return $this->mTabIndex;
    }

    function SetTabIndex($tabindex)
    {
	$this->DoReadyForEdit();
	$this->mTabIndex = $tabindex;
    }

    function TitleAttribute()
    {
	return $this->mTitleAttribute;
    }

    function GetCreationDate()
    {
	return $this->mCreationDate;
    }
	
    function GetModifiedDate()
    {
	return $this->mModifiedDate;
    }

    function SetTitleAttribute($titleattribute)
    {
	$this->DoReadyForEdit();
	$this->mTitleAttribute = $titleattribute;
    }

    function AccessKey()
    {
	return $this->mAccessKey;
    }

    function SetAccessKey($accesskey)
    {
	$this->DoReadyForEdit();
	$this->mAccessKey = $accesskey;
    }

    /**
     * Returns the ParentId
     */
    function ParentId()
    {
	return $this->mParentId;
    }

    function SetParentId($parentid)
    {
	$this->DoReadyForEdit();
	$this->mParentId = $parentid;
    }

    function OldParentId()
    {
	return $this->mOldParentId;
    }

    function SetOldParentId($parentid)
    {
	$this->DoReadyForEdit();
	$this->mOldParentId = $parentid;
    }

    function TemplateId()
    {
	return $this->mTemplateId;
    }

    function SetTemplateId($templateid)
    {
	$this->DoReadyForEdit();
	$this->mTemplateId = $templateid;
    }

    /**
     * Returns the ItemOrder
     */
    function ItemOrder()
    {
	return $this->mItemOrder;
    }

    function SetItemOrder($itemorder)
    {
	$this->DoReadyForEdit();
	$this->mItemOrder = $itemorder;
    }

    function OldItemOrder()
    {
	return $this->mOldItemOrder;
    }

    function SetOldItemOrder($itemorder)
    {
	$this->DoReadyForEdit();
	$this->mOldItemOrder = $itemorder;
    }

    /**
     * Returns the Hierarchy
     */
    function Hierarchy()
    {
		global $gCms;
		$contentops =& $gCms->GetContentOperations();
		return $contentops->CreateFriendlyHierarchyPosition($this->mHierarchy);
    }

    function SetHierarchy($hierarchy)
    {
	$this->DoReadyForEdit();
	$this->mHierarchy = $hierarchy;
    }

    /**
     * Returns the Hierarchy
     */
    function IdHierarchy()
    {
	return $this->mIdHierarchy;
    }

    function SetIdHierarchy($idhierarchy)
    {
	$this->DoReadyForEdit();
	$this->mIdHierarchy = $idhierarchy;
    }

    /**
     * Returns the Hierarchy
     */
    function HierarchyPath()
    {
	return $this->mHierarchyPath;
    }

    function SetHierarchyPath($hierarchypath)
    {
	$this->DoReadyForEdit();
	$this->mHierarchyPath = $hierarchypath;
    }

    /**
     * Returns the Active state
     */
    function Active()
    {
	return $this->mActive;
    }

    function SetActive($active)
    {
	$this->DoReadyForEdit();
	$this->mActive = $active;
    }

    /**
     * Returns whether it should show in the menu
     */
    function ShowInMenu()
    {
	return $this->mShowInMenu;
    }

    function SetShowInMenu($showinmenu)
    {
        $this->DoReadyForEdit();
	$this->mShowInMenu = $showinmenu;
    }

    /**
     * Returns if the page is the default
     */
    function DefaultContent()
    {
	return $this->mDefaultContent;
    }

    function SetDefaultContent($defaultcontent)
    {
	$this->DoReadyForEdit();
	$this->mDefaultContent = $defaultcontent;
    }

    function Cachable()
    {
	return $this->mCachable;
    }

    function SetCachable($cachable)
    {
	$this->DoReadyForEdit();
	$this->mCachable = $cachable;
    }
	
	function Markup()
	{
		return $this->mMarkup;
	}

	function SetMarkup($markup)
	{
		$this->DoReadyForEdit();
		$this->mMarkup = $markup;
	}

	function LastModifiedBy()
	{
		return $this->mLastModifiedBy;
	}

	function SetLastModifiedBy($lastmodifiedby)
	{
		$this->DoReadyForEdit();
		$this->mLastModifiedBy = $lastmodifiedby;
	}
	
	function SetAlias($alias)
	{
		$this->DoReadyForEdit();
		global $gCms;

		$tolower = false;

		if ($alias == '')
		{
			$alias = trim($this->mMenuText);
			if ($alias == '')
			{
			    $alias = trim($this->mName);
			}
			
			$tolower = true;
			$alias = munge_string_to_url($alias, $tolower);
			// Make sure auto-generated new alias is not already in use on a different page, if it does, add "-2" to the alias
			global $gCms;
			$contentops =& $gCms->GetContentOperations();
			$error = $contentops->CheckAliasError($alias);
			if ($error !== FALSE)
			{
				if (FALSE == empty($alias))
				{
					$alias_num_add = 2;
					// If a '-2' version of the alias already exists
					// Check the '-3' version etc.
					while ($contentops->CheckAliasError($alias.'-'.$alias_num_add) !== FALSE)
					{
						$alias_num_add++;
					}
					$alias .= '-'.$alias_num_add;
				}
				else
				{
					$alias = '';
				}
			}
		}

		$this->mAlias = munge_string_to_url($alias, $tolower);
	} 
	
    /**
     * Returns the menu text for this content
     */
	function MenuText()
	{
		return $this->mMenuText;
	}

	function SetMenuText($menutext)
	{
		$this->DoReadyForEdit();
		$this->mMenuText = $menutext;
	}

    /**
     * Returns number of immediate child-content items of this content
     */
	function ChildCount()
	{
		return $this->mChildCount;
	}

    /**
     * Returns the properties
     */
	function Properties()
	{
		debug_buffer('properties called');
		if ($this->mPropertiesLoaded == false)
		{
			$this->mProperties->Load($this->mId);
			$this->mPropertiesLoaded = true;
		}
		return $this->mProperties;
	}

	function HasProperty($name)
	{
		return $this->mProperties->HasProperty($name);
	}

	function GetPropertyValue($name)
	{
		if ($this->mProperties->HasProperty($name))
		{
			if ($this->mPropertiesLoaded == false)
			{
				$this->mProperties->Load($this->mId);
				$this->mPropertiesLoaded = true;
			}
			return $this->mProperties->GetValue($name);
		}
		return '';
	}
    
	function SetPropertyValue($name, $value)
	{
		debug_buffer('setpropertyvalue called');
		$this->DoReadyForEdit();
		if ($this->mPropertiesLoaded == false)
		{
			$this->mProperties->Load($this->mId);
			$this->mPropertiesLoaded = true;
		}
		$this->mProperties->SetValue($name, $value);
	}
	
    /**
     * Function content types to use to say whether or not they should show
     * up in lists where parents of content are set.  This will default to true,
     * but should be used in cases like Separator where you don't want it to 
     * have any children.
     * 
     * @since 0.11
     */
    function WantsChildren()
    {
	return true;
    }

    function GetAdditionalContentBlocks()
    {
    }

    /**
     * Should this link be used in various places where a link is the only
     * useful output?  (Like next/previous links in cms_selflink, for example)
     */
    function HasUsableLink()
    {
	return true;
    }

    /************************************************************************/
    /* The rest																*/
    /************************************************************************/

    /**
     * This is a callback function to handle any things that might need to be done before content is
     * edited.
     */
    function ReadyForEdit()
    {
    }

	function DoReadyForEdit()
	{
		if ($this->mReadyForEdit == false)
		{
			$this->ReadyForEdit();
			$this->mReadyForEdit = true;
		}
	}

    /**
     * Load the content of the object from an ID
     *
     * @param $id		the ID of the element
     * @param $loadProperties	whether to load or not the properties
     *
     * @returns bool		If it fails, the object comes back to initial values and returns FALSE
     *				If everything goes well, it returns TRUE
     */
	function LoadFromId($id, $loadProperties = false)
	{
		global $gCms, $config, $sql_queries, $debug_errors;
		$db = &$gCms->GetDb();

		$result = false;

		if (-1 < $id)
		{
			$query = "SELECT * FROM ".cms_db_prefix()."content WHERE content_id = ?";
			$row =& $db->Execute($query, array($id));

			if ($row && !$row->EOF)
			{
				$this->mId                         = $row->fields["content_id"];
				$this->mName                       = $row->fields["content_name"];
				$this->mAlias                      = $row->fields["content_alias"];
				$this->mOldAlias                   = $row->fields["content_alias"];
				$this->mType                       = strtolower($row->fields["type"]);
				$this->mOwner                      = $row->fields["owner_id"];
				#$this->mProperties                = new ContentProperties();
				$this->mParentId                   = $row->fields["parent_id"];
				$this->mOldParentId                = $row->fields["parent_id"];
				$this->mTemplateId                 = $row->fields["template_id"];
				$this->mItemOrder                  = $row->fields["item_order"];
				$this->mOldItemOrder               = $row->fields["item_order"];
				$this->mMetadata                   = $row->fields['metadata'];
				$this->mHierarchy                  = $row->fields["hierarchy"];
				$this->mIdHierarchy                = $row->fields["id_hierarchy"];
				$this->mHierarchyPath              = $row->fields["hierarchy_path"];
				$this->mProperties->mPropertyNames = explode(',',$row->fields["prop_names"]);
				$this->mMenuText                   = $row->fields['menu_text'];
				$this->mMarkup                     = $row->fields['markup'];
				$this->mTitleAttribute             = $row->fields['titleattribute'];
				$this->mAccessKey                  = $row->fields['accesskey'];
				$this->mTabIndex                   = $row->fields['tabindex'];
				$this->mActive                     = ($row->fields["active"] == 1          ? true : false);
				$this->mDefaultContent             = ($row->fields["default_content"] == 1 ? true : false);
				$this->mShowInMenu                 = ($row->fields["show_in_menu"] == 1    ? true : false);
				$this->mCachable                   = ($row->fields["cachable"] == 1        ? true : false);
				$this->mLastModifiedBy             = $row->fields["last_modified_by"];
				$this->mCreationDate               = $row->fields["create_date"];
				$this->mModifiedDate               = $row->fields["modified_date"];

				$result = true;
			}
			else
			{
				if (true == $config["debug"])
				{
					# :TODO: Translate the error message
					$debug_errors .= "<p>Could not retrieve content from db</p>\n";
				}
			}

			if ($row) $row->Close();

			if ($result && $loadProperties)
			{
				if ($this->mPropertiesLoaded == false)
				{
					debug_buffer("load from id is loading properties");
					$this->mProperties->Load($this->mId);
					$this->mPropertiesLoaded = true;
				}

				if (NULL == $this->mProperties)
				{
					$result = false;

					# debug mode
					if (true == $config["debug"])
					{
						# :TODO: Translate the error message
						$debug_errors .= "<p>Could not load properties for content</p>\n";
					}
				}
			}

			if (false == $result)
			{
				$this->SetInitialValues();
			}
		}
		else
		{
			# debug mode
			if ($config["debug"] == true)
			{
				# :TODO: Translate the error message
				$debug_errors .= "<p>The id wasn't valid : $id</p>\n";
			}
		}

		$this->Load();

		return $result;
	}

    /**
     * Load the content of the object from an array
     *
     * There is no check on the data provided, because this is the job of
     * ValidateData
     *
     * @returns	bool		If it fails, the object comes back to initial values and returns FALSE
     *				If everything goes well, it returns TRUE
     */
	function LoadFromData($data, $loadProperties = false)
	{
		global $config, $debug_errors;

		$result = true;

		$this->mId                         = $data["content_id"];
		$this->mName                       = $data["content_name"];
		$this->mAlias                      = $data["content_alias"];
		$this->mOldAlias                   = $data["content_alias"];
		$this->mType                       = strtolower($data["type"]);
		$this->mOwner                      = $data["owner_id"];
		#$this->mProperties                = new ContentProperties();
		$this->mParentId                   = $data["parent_id"];
		$this->mOldParentId                = $data["parent_id"];
		$this->mTemplateId                 = $data["template_id"];
		$this->mItemOrder                  = $data["item_order"];
		$this->mOldItemOrder               = $data["item_order"];
		$this->mMetadata                   = $data['metadata'];
		$this->mHierarchy                  = $data["hierarchy"];
		$this->mIdHierarchy                = $data["id_hierarchy"];
		$this->mHierarchyPath              = $data["hierarchy_path"];
		$this->mProperties->mPropertyNames = explode(',',$data["prop_names"]);
		$this->mMenuText                   = $data['menu_text'];
		$this->mMarkup                     = $data['markup'];
		$this->mTitleAttribute             = $data['titleattribute'];
		$this->mAccessKey                  = $data['accesskey'];
		$this->mTabIndex                   = $data['tabindex'];
		$this->mDefaultContent             = ($data["default_content"] == 1 ? true : false);
		$this->mActive                     = ($data["active"] == 1          ? true : false);
		$this->mShowInMenu                 = ($data["show_in_menu"] == 1    ? true : false);
		$this->mCachable                   = ($data["cachable"] == 1        ? true : false);
		$this->mLastModifiedBy             = $data["last_modified_by"];
		$this->mCreationDate               = $data["create_date"];
		$this->mModifiedDate               = $data["modified_date"];

		if ($loadProperties == true)
		{
			#$this->mProperties = ContentManager::LoadPropertiesFromData(strtolower($this->mType), $data);
			if ($this->mPropertiesLoaded == false)
			{
				debug_buffer("load from data is loading properties");
				$this->mProperties->Load($this->mId);
				$this->mPropertiesLoaded = true;
			}

			if (NULL == $this->mProperties)
			{
				$result = false;

				# debug mode
				if (true == $config["debug"])
				{
					# :TODO: Translate the error message
					$debug_errors .= "<p>Could not load properties for content</p>\n";
				}
			}
		}

		if (false == $result)
		{
			$this->SetInitialValues();
		}

		$this->Load();

		return $result;
	}

    /**
     * Callback function for content types to use to preload content or other things if necessary.  This
     * is called right after the properties are loaded.
     */
    function Load()
    {
    }

    /**
     * Save or update the content
     */
    # :TODO: This function should return something
	function Save()
	{
		global $gCms;
		foreach($gCms->modules as $key=>$value)
		{
			if ($gCms->modules[$key]['installed'] == true &&
			$gCms->modules[$key]['active'] == true)
			{
				$gCms->modules[$key]['object']->ContentEditPre($this);
			}
		}

		Events::SendEvent('Core', 'ContentEditPre', array('content' => &$this));

		if ($this->mPropertiesLoaded == false)
		{
			debug_buffer('save is loading properties');
			$this->mProperties->Load($this->mId);
			$this->mPropertiesLoaded = true;
		}

		if (-1 < $this->mId)
		{
			$this->Update();
		}
		else
		{
			$this->Insert();
		}

		foreach($gCms->modules as $key=>$value)
		{		
			if ($gCms->modules[$key]['installed'] == true &&
			$gCms->modules[$key]['active'] == true)
			{
				$gCms->modules[$key]['object']->ContentEditPost($this);
			}
		}

		Events::SendEvent('Core', 'ContentEditPost', array('content' => &$this));
	}

    /**
     * Update the content
     * We can notice, that only a few things are updated
     * We do not care about hierarchy for example. This is because hierarchy,
     * order or parents management is the job of the content manager.
     * Remember that a content is like a file, and a file don't know where it is
     * on the disk, it only knows its own content. It's the same here.
     */
    # :TODO: This function should return something
	function Update()
	{
		global $gCms, $config, $sql_queries, $debug_errors;
		$db = &$gCms->GetDb();

		$result = false;

		#Figure out the item_order (if necessary)
		if ($this->mItemOrder < 1)
		{
			$query = "SELECT ".$db->IfNull('max(item_order)','0')." as new_order FROM ".cms_db_prefix()."content WHERE parent_id = ?";
			$row = &$db->GetRow($query,array($this->mParentId));

			if ($row)
			{
				if ($row['new_order'] < 1)
				{
					$this->mItemOrder = 1;
				}
				else
				{
					$this->mItemOrder = $row['new_order'] + 1;
				}
			}
		}

		$this->mModifiedDate = trim($db->DBTimeStamp(time()), "'");

		$query = "UPDATE ".cms_db_prefix()."content SET content_name = ?, owner_id = ?, type = ?, template_id = ?, parent_id = ?, active = ?, default_content = ?, show_in_menu = ?, cachable = ?, menu_text = ?, content_alias = ?, metadata = ?, titleattribute = ?, accesskey = ?, tabindex = ?, modified_date = ?, item_order = ?, markup = ?, last_modified_by = ? WHERE content_id = ?";
		$dbresult = $db->Execute($query, array(
			$this->mName,
			$this->mOwner,
			strtolower($this->mType),
			$this->mTemplateId,
			$this->mParentId,
			($this->mActive == true         ? 1 : 0),
			($this->mDefaultContent == true ? 1 : 0),
			($this->mShowInMenu == true     ? 1 : 0),
			($this->mCachable == true       ? 1 : 0),
			$this->mMenuText,
			$this->mAlias,
			$this->mMetadata,
			$this->mTitleAttribute,
			$this->mAccessKey,
			$this->mTabIndex,
			$this->mModifiedDate,
			$this->mItemOrder,
			$this->mMarkup,
			$this->mLastModifiedBy,
			$this->mId
			));

		if (!$dbresult)
		{
			if (true == $config["debug"])
			{
				# :TODO: Translate the error message
				$debug_errors .= "<p>Error updating content</p>\n";
			}
		}

		if ($this->mOldParentId != $this->mParentId)
		{
			#Fix the item_order if necessary
			$query = "UPDATE ".cms_db_prefix()."content SET item_order = item_order - 1 WHERE parent_id = ? AND item_order > ?";
			$result = $db->Execute($query, array($this->mOldParentId,$this->mOldItemOrder));

			$this->mOldParentId = $this->mParentId;
			$this->mOldItemOrder = $this->mItemOrder;
		}

		if (isset($this->mAdditionalEditors))
		{
			$query = "DELETE FROM ".cms_db_prefix()."additional_users WHERE content_id = ?";
			$db->Execute($query, array($this->Id()));

			foreach ($this->mAdditionalEditors as $oneeditor)
			{
				$new_addt_id = $db->GenID(cms_db_prefix()."additional_users_seq");
				$query = "INSERT INTO ".cms_db_prefix()."additional_users (additional_users_id, user_id, content_id) VALUES (?,?,?)";
				$db->Execute($query, array($new_addt_id, $oneeditor, $this->Id()));
			}
		}

		if (NULL != $this->mProperties)
		{
			# :TODO: There might be some error checking there
			debug_buffer('save from ' . __LINE__);
			$this->mProperties->Save($this->mId);
		}
		else
		{
			if (true == $config["debug"])
			{
				# :TODO: Translate the error message
				$debug_errors .= "<p>Error updating : the content has no properties</p>\n";
			}
		}
	}

    /**
     * Insert the content in the db
     */
    # :TODO: This function should return something
    # :TODO: Take care bout hierarchy here, it has no value !
    # :TODO: Figure out proper item_order
	function Insert()
	{
		global $gCms, $config, $sql_queries, $debug_errors;
		$db = &$gCms->GetDb();

		$result = false;

		#Figure out the item_order
		if ($this->mItemOrder < 1)
		{
			$query = "SELECT max(item_order) as new_order FROM ".cms_db_prefix()."content WHERE parent_id = ?";
			$row = &$db->Getrow($query, array($this->mParentId));

			if ($row)
			{
				if ($row['new_order'] < 1)
				{
					$this->mItemOrder = 1;
				}
				else
				{
					$this->mItemOrder = $row['new_order'] + 1;
				}
			}
		}

		$newid = $db->GenID(cms_db_prefix()."content_seq");
		$this->mId = $newid;

		$this->mModifiedDate = $this->mCreationDate = trim($db->DBTimeStamp(time()), "'");

		$query = "INSERT INTO ".$config["db_prefix"]."content (content_id, content_name, content_alias, type, owner_id, parent_id, template_id, item_order, hierarchy, id_hierarchy, active, default_content, show_in_menu, cachable, menu_text, markup, metadata, titleattribute, accesskey, tabindex, last_modified_by, create_date, modified_date) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

		$dbresult = $db->Execute($query, array(
			$newid,
			$this->mName,
			$this->mAlias,
			strtolower($this->mType),
			$this->mOwner,
			$this->mParentId,
			$this->mTemplateId,
			$this->mItemOrder,
			$this->mHierarchy,
			$this->mIdHierarchy,
			($this->mActive == true         ? 1 : 0),
			($this->mDefaultContent == true ? 1 : 0),
			($this->mShowInMenu == true     ? 1 : 0),
			($this->mCachable == true       ? 1 : 0),
			$this->mMenuText,
			$this->mMarkup,
			$this->mMetadata,
			$this->mTitleAttribute,
			$this->mAccessKey,
			$this->mTabIndex,
			$this->mLastModifiedBy,
			$this->mModifiedDate,
			$this->mCreationDate
			));

		if (! $dbresult)
		{
			if ($config["debug"] == true)
			{
				# :TODO: Translate the error message
				$debug_errors .= "<p>Error inserting content</p>\n";
			}
		}

		if (NULL != $this->mProperties)
		{
			# :TODO: There might be some error checking there
			debug_buffer('save from ' . __LINE__);
			$this->mProperties->Save($newid);
		}
		else
		{
			if (true == $config["debug"])
			{
				# :TODO: Translate the error message
				$debug_errors .= "<p>Error inserting : the content has no properties</p>\n";
			}
		}
		if (isset($this->mAdditionalEditors))
		{
			foreach ($this->mAdditionalEditors as $oneeditor)
			{
				$new_addt_id = $db->GenID(cms_db_prefix()."additional_users_seq");
				$query = "INSERT INTO ".cms_db_prefix()."additional_users (additional_users_id, user_id, content_id) VALUES (?,?,?)";
				$db->Execute($query, array($new_addt_id, $oneeditor, $this->Id()));
			}
		}
	}

    /**
     * Test if the array given contains valid data for the object
     * This function is used to check that no compulsory argument
     * has been forgotten by the user
     *
     * We do not check the Id because there can be no Id (new content)
     * That's up to Save to check this.
     *
     * @returns	FALSE if data is ok, and an array of invalid parameters else
     */
	function ValidateData()
	{
		return FALSE;
	}

    /**
     * Delete the content
     */
    # :TODO: This function should return something
	function Delete()
	{
		global $gCms, $config, $sql_queries, $debug_errors;

		foreach($gCms->modules as $key=>$value)
		{
			if ($gCms->modules[$key]['installed'] == true &&
			$gCms->modules[$key]['active'] == true)
			{
				$gCms->modules[$key]['object']->ContentDeletePre($this);
			}
		}

		Events::SendEvent('Core', 'ContentDeletePre', array('content' => &$this));

		$db = &$gCms->GetDb();

		$result = false;

		if (-1 > $this->mId)
		{
			if (true == $config["debug"])
			{
				# :TODO: Translate the error message
				$debug_errors .= "<p>Could not delete content : invalid Id</p>\n";
			}
		}
		else
		{
			$query = "DELETE FROM ".cms_db_prefix()."content WHERE content_id = ?";
			$dbresult = $db->Execute($query, array($this->mId));

			if (! $dbresult)
			{
				if (true == $config["debug"])
				{
					# :TODO: Translate the error message
					$debug_errors .= "<p>Error deleting content</p>\n";
				}
			}

			#Fix the item_order if necessary
			$query = "UPDATE ".cms_db_prefix()."content SET item_order = item_order - 1 WHERE parent_id = ? AND item_order > ?";
			$result = $db->Execute($query,array($this->ParentId(),$this->ItemOrder()));

			#Remove the cross references
			remove_cross_references($this->mId, 'content');

			$cachefilename = TMP_CACHE_LOCATION . '/contentcache.php';
			@unlink($cachefilename);

			if (NULL != $this->mProperties)
			{
				# :TODO: There might be some error checking there
				$this->mProperties->Delete($this->mId);
			}
			else
			{
				if (true == $config["debug"])
				{
					# :TODO: Translate the error message
					$debug_errors .= "<p>Error deleting : the content has no properties</p>\n";
				}
			}
		}

		foreach($gCms->modules as $key=>$value)
		{
			if ($gCms->modules[$key]['installed'] == true &&
			$gCms->modules[$key]['active'] == true)
			{
				$gCms->modules[$key]['object']->ContentDeletePost($this);
			}
		}

		Events::SendEvent('Core', 'ContentDeletePost', array('content' => &$this));
	}

    /**
     * Function for the subclass to parse out data for it's parameters (usually from $_POST)
     */
    function FillParams($params)
    {
    }

    /**
     * Function for content types to override to set their proper generated URL
     */
    function GetURL($rewrite = true)
    {
	global $gCms;
	$config = &$gCms->GetConfig();
	$url = "";
	$alias = ($this->mAlias != ''?$this->mAlias:$this->mId);
	if ($config["assume_mod_rewrite"] && $rewrite == true)
	{
	    if ($config['use_hierarchy'] == true)
	    {
		$url = $config['root_url']. '/' . $this->HierarchyPath() . (isset($config['page_extension'])?$config['page_extension']:'.html');
	    }
	    else
	    {
		$url = $config['root_url']. '/' . $alias . (isset($config['page_extension'])?$config['page_extension']:'.html');
	    }
	}
	else
	{
	    if (isset($_SERVER['PHP_SELF']) && $config['internal_pretty_urls'] == true)
	    {
		if ($config['use_hierarchy'] == true)
		{
		    $url = $config['root_url'] . '/index.php/' . $this->HierarchyPath() . (isset($config['page_extension'])?$config['page_extension']:'.html');
		}
		else
		{
		    $url = $config['root_url'] . '/index.php/' . $alias . (isset($config['page_extension'])?$config['page_extension']:'.html');
		}
	    }
	    else
	    {
		$url = $config['root_url'] . '/index.php?' . $config['query_var'] . '=' . $alias;
	    }
	}
		return $url;
    }

    /*
    function MakeHierarchyURL($ext='')
    {
	global $gCms;
	$hm =& $gCms->GetHierarchyManager();

	$path = '/' . $this->Alias();

	$node =& $hm->getNodeById($this->ParentId());
	if(isset($node))
	{
	    $content =& $node->GetContent();
	    if (isset($content))
	    {
		$path = '/' . $content->HierarchyPath();
	    }
	}

	$result = $path;

	if ($ext != '')
	    $result = $path . $ext;

	return $result;
    }
    */

    /**
     * Show the content
     */
    function Show($param = '')
    {
	# :TODO:
	return "<tr><td>Show Not Defined</td></tr>";
    }
	
    /**
    * allow the content module to handle custom tags. Typically used for parameters in {content} tags
    */
    function ContentPreRender($tpl_source)
    {
	return $tpl_source;
    }

    /**
     * Returns a list of tab names that should be used when adding or editing this type of content
     */
    function GetTabDefinitions()
    {
	return array();
    }
	
    /**
     * Returns the tab names used in the add and edit content page.  If it's an empty array, then
     * the tabs won't show at all.
     */
    function TabNames()
    {
        return array();
    }

    /**
     * Show the Alternate Edit interface
     */
    function EditAsArray($adding = false, $tab = 0, $showadmin = false)
    {
	# :TODO:
	return array(array('Error','Edit Not Defined!'));
    }

    /**
     * Show the Edit interface
     */
    function Edit($adding = false, $tab = 0, $showadmin = false)
    {
        $text = '';
        $val = $this->EditAsArray($adding, $tab, $showadmin);
        foreach ($val as $thisRow)
	{
            $text .= '<tr><th>'.$thisRow[0].'</th><td>'.$thisRow[1].'</td></tr>';
            $text .= "\n";
	}
	return $text;
    }

    /**
     * Show the Advanced Edit interface
     */
    function AdvancedEdit($adding = false)
    {
	# :TODO:
	return "<tr><td>Advanced Edit Not Defined</td></tr>";
    }

    /**
     * Show Help
     */
    function Help()
    {
    	# :TODO:
    	return "<tr><td>Help Not Defined</td></tr>";
    }

    /**
     * Does this have children?
     */
	function HasChildren()
	{
		global $gCms, $config, $sql_queries, $debug_errors;
		$db = &$gCms->GetDb();

		$result = false;

		$query = "SELECT content_id FROM ".cms_db_prefix()."content WHERE parent_id = ?";
		$row = &$db->GetRow($query, array($this->mId));

		if ($row)
		{
			$result = true;
		}

		return $result;
	}

	function GetAdditionalEditors()
	{
		if (!isset($this->mAdditionalEditors))
		{
			global $gCms;
			$db = &$gCms->GetDb();

			$this->mAdditionalEditors = array();

			$query = "SELECT user_id FROM ".cms_db_prefix()."additional_users WHERE content_id = ?";
			$dbresult = &$db->Execute($query,array($this->mId));

			while ($dbresult && !$dbresult->EOF)
			{
				$this->mAdditionalEditors[] = $dbresult->fields['user_id'];
				$dbresult->MoveNext();
			}

			if ($dbresult) $dbresult->Close();
		}
		return $this->mAdditionalEditors;
	}

	function SetAdditionalEditors($editorarray)
	{
		$this->mAdditionalEditors = $editorarray;
	}

	function ShowAdditionalEditors()
	{
		$ret = array();

		$ret[] = lang('additionaleditors');
		$text = '<select name="additional_editors[]" multiple="multiple" size="5">';

		global $gCms;
		$userops =& $gCms->GetUserOperations();
		$allusers =& $userops->LoadUsers();
		$addteditors = $this->GetAdditionalEditors();
		foreach ($allusers as $oneuser)
		{
			if ($oneuser->id != $this->Owner())
			{
				$text .= '<option value="'.$oneuser->id.'"';
				if (in_array($oneuser->id, $addteditors))
				{
					$text .= ' selected="selected"';
				}
				$text .= '>'.$oneuser->username.'</option>';
			}
		}

		$text .= '</select>';
		$ret[] = $text;
		return $ret;
	}

	function IsDefaultPossible()
	{
		return FALSE;
	}
}

/**
 * Class to represent content properties.  These are pretty much
 * separate beings that get used by a content object instance.
 *
 * @since		0.8
 * @package		CMS
 */
class ContentProperties
{
    var $mPropertyNames;
    var $mPropertyTypes;
    var $mPropertyValues;
     
    /**
     * The (content type specific) allowed properties of the content.
    */
    var $mAllowedPropertyNames;

    /**
     * Generic constructor. Runs the SetInitialValues fuction.
     */
	function ContentProperties()
	{
		$this->SetInitialValues();
		$this->SetAllowedPropertyNames(NULL);
	}

    /**
     * Sets object to some sane initial values
     */
	function SetInitialValues()
	{
		$this->mPropertyNames = array();
		$this->mPropertyTypes = array();
		$this->mPropertyValues = array();
	}

	function HasProperty($name)
	{
		#debug_buffer($this->mPropertyNames);
		if (!isset($this->mPropertyNames))
		$this->mPropertyNames = array();
		return in_array($name, $this->mPropertyNames);
	}

	function Add($type, $name, $defaultvalue='')
	{
		//Handle names separately
		if (!in_array($name, $this->mPropertyNames))
		{
			$this->mPropertyNames[] = $name;
		}
		if (!array_key_exists($name, $this->mPropertyValues))
		{
			$this->mPropertyTypes[$name] = $type;
			$this->mPropertyValues[$name] = $defaultvalue;
		}
	}

	function GetValue($name)
	{
		if (in_array($name, $this->mPropertyNames))
		{
			if (count($this->mPropertyValues) > 0)
			{
				if (array_key_exists($name, $this->mPropertyValues))
				{
					return $this->mPropertyValues[$name];
				}
			}
		}
	}

	function SetValue($name, $value)
	{
		if (count($this->mPropertyValues) > 0)
		{
			if (in_array($name, $this->mPropertyNames))
			{
				$this->mPropertyValues[$name] = $value;
			}
		}
	}

	function Load($content_id)
	{
		debug_buffer('load properties called');
		if (count($this->mPropertyNames) > 0)
		{
			global $gCms, $config, $sql_queries, $debug_errors;
			$db = &$gCms->GetDb();

			$query = "SELECT * FROM ".cms_db_prefix()."content_props WHERE content_id = ?";
			$dbresult = &$db->Execute($query, array($content_id));

			while ($dbresult && !$dbresult->EOF)
			{
				$prop_name = $dbresult->fields['prop_name'];
//				if ($this->GetAllowedPropertyNames() == NULL || in_array($prop_name, $this->GetAllowedPropertyNames()))
//				{
					if (!in_array($prop_name, $this->mPropertyNames))
					{
						$this->mPropertyNames[] = $prop_name;
					}
					$this->mPropertyTypes[$prop_name] = $dbresult->fields['type'];
					$this->mPropertyValues[$prop_name] = $dbresult->fields['content'];
//				}
				$dbresult->MoveNext();
			}
			
			if ($dbresult) $dbresult->Close();
		}
	}

	function Save($content_id)
	{
		if (count($this->mPropertyValues) > 0)
		{
			global $gCms, $config, $sql_queries, $debug_errors;
			
			$db        =& $gCms->GetDb();
			$concat    =  '';
			$timestamp =  $db->DBTimeStamp(time());

			$insquery = "
				INSERT INTO ".cms_db_prefix()."content_props 
				(
					content_id, 
					type, 
					prop_name, 
					param1, 
					param2, 
					param3, 
					content,
					modified_date
				) 
					VALUES 
				(
					?,?,?,'','','',?,$timestamp
				)
			";

			foreach ($this->mPropertyValues as $key=>$value)
			{
//				if ($this->GetAllowedPropertyNames() == NULL || in_array($key, $this->GetAllowedPropertyNames()))
//				{
					$delquery = "DELETE FROM ".cms_db_prefix()."content_props WHERE content_id = '$content_id' AND prop_name = '$key'";
					$dbresult = $db->Execute($delquery);
					
					$sql_vars = array(
						$content_id,
						$this->mPropertyTypes[$key],
						$key,
						$this->mPropertyValues[$key]
					);
					$dbresult = $db->Execute($insquery, $sql_vars);

					$concat .= $this->mPropertyValues[$key];

					# debug mode
					if (true == $config["debug"])
					{
						$sql_queries .= "<p>$delquery</p>\n<p>$insquery</p>\n";
					}

					if (! $dbresult)
					{
						if (true == $config["debug"])
						{
							# :TODO: Translate the error message
							$debug_errors .= "<p>Error updating content property</p>\n";
						}
					}
//				}
			}

			if ($concat != '')
			{
				do_cross_reference($content_id, 'content', $concat);
			}
		}
	}

    function Delete($content_id)
    {
	if (count($this->mPropertyValues) > 0)
	{
	    global $gCms, $config, $sql_queries, $debug_errors;
	    $db = &$gCms->GetDb();

	    $query = "DELETE FROM ".cms_db_prefix()."content_props WHERE content_id = ?";
	    $db->Execute($query, array($content_id));
	}
    }

    /**
     * Subclasses should fill this array with strings containing the name of
     * the allowed property
     * @param array
    */
    function SetAllowedPropertyNames($array)
    {
        $this->mAllowedPropertyNames = $array;
    }
    
    /**
     * Subclasses should fill this array with strings containing the name of
     * the allowed property
     * @return array
    */
    function GetAllowedPropertyNames()
    {
        return $this->mAllowedPropertyNames;
    }

} // end of class ContentProperties

/**
 * Class that module defined content types must extend.
 *
 * @since		0.9
 * @package		CMS
 */
class CMSModuleContentType extends ContentBase
{
	//What module do I belong to?  (needed for things like Lang to work right)
	function ModuleName()
	{
		return '';
	}

	function Lang($name, $params=array())
	{
		global $gCms;
		$cmsmodules = &$gCms->modules;
		if (array_key_exists($this->ModuleName(), $cmsmodules))
		{
			return $cmsmodules[$this->ModuleName()]['object']->Lang($name, $params);
		}
		else
		{
			return 'ModuleName() not defined properly';
		}
	}

	/*
	* Returns the instance of the module this content type belongs to
	*
	*/
	function GetModuleInstance() 
	{
		global $gCms;
		$cmsmodules = &$gCms->modules;
		if (array_key_exists($this->ModuleName(), $cmsmodules))
		{
			return $cmsmodules[$this->ModuleName()]['object'];
		}
		else
		{
			return 'ModuleName() not defined properly';
		}
	}
}

# vim:ts=4 sw=4 noet
?>
