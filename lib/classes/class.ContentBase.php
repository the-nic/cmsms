<?php
# CMS - CMS Made Simple
# (c)2004 by Ted Kulp (tedkulp@users.sf.net)
# This project's homepage is: http://www.cmsmadesimple.org
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
#$Id: class.content.inc.php 6905 2011-02-20 22:23:40Z calguy1000 $

/**
 * @package CMS
 */

/**
 * @ignore
 */
define('CMS_CONTENT_HIDDEN_NAME','--------');

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
abstract class ContentBase
{
  /**
   * The unique ID identifier of the element
   * Integer
   *
   * @internal
   */
  protected $mId = -1;

  /**
   * The name of the element (like a filename)
   * String
   */
  protected $mName = '';

  /**
   * The type of content (page, url, etc..)
   * String
   *
   * @internal
   */
  protected $mType = '';

  /**
   * The owner of the content
   * Integer
   *
   * @internal
   */
  protected $mOwner = -1;

  /**
   * The properties part of the content. This is an object of the good type.
   * It should contain all treatments specific to this type of content
   *
   * @internal
   */
  protected $_props;

  /**
   * The ID of the parent, 0 if none
   * Integer
   */
  protected $mParentId = -2;

  /**
   * The old parent id... only used on update
   *
   * @internal
   */
  protected $mOldParentId = -1;

  /**
   * This is used too often to not be part of the base class
   *
   * @internal
   */
  protected $mTemplateId = -1;

  /**
   * The item order of the content in his level
   * Integer
   */
  protected $mItemOrder = -1;

  /**
   * The old item order... only used on update
   *
   * @internal
   */
  protected $mOldItemOrder = -1;

  /**
   * The metadata (head tags) fir this content
   *
   * @internal
   */
  protected $mMetadata = '';

  /**
   * @internal
   */
  protected $mTitleAttribute = '';

  /**
   * @internal
   */
  protected $mAccessKey = '';

  /**
   * @internal
   */
  protected $mTabIndex = '';

  /**
   * The full hierarchy of the content
   * String of the form : 1.4.3
   */
  protected $mHierarchy = '';

  /**
   * The full hierarchy of the content ids
   * String of the form : 1.4.3
   */
  protected $mIdHierarchy = '';

  /**
   * The full path through the hierarchy
   * String of the form : parent/parent/child
   *
   * @internal
   */
  protected $mHierarchyPath = '';

  /**
   * What should be displayed in a menu
   *
   * @internal
   */
  protected $mMenuText = '';

  /**
   * Is the content active ?
   * Integer : 0 / 1
   *
   * @internal
   */
  protected $mActive = false;

  /**
   * Alias of the content
   *
   * @internal
   */
  protected $mAlias;

  /**
   * Old Alias of the content
   *
   * @internal
   */
  protected $mOldAlias;

  /**
   * Cachable?
   *
   * @internal
   */
  protected $mCachable;

  /**
   * Secure?
   *
   * @internal
   */
  protected $mSecure = 0;

  /**
   * URL
   *
   * @internal
   */
  protected $mURL = '';

  /**
   * Does this content have a preview function?
   *
   * @internal
   */
  protected $mPreview = '';

  /**
   * Should it show up in the menu?
   *
   * @internal
   */
  protected $mShowInMenu = false;

  /**
   * Is this page the default?
   *
   * @internal
   */
  protected $mDefaultContent = false;
	
  /**
   * What type of markup is ths?  HTML is the default
   */
  protected $mMarkup = 'html';

  /**
   * Last user to modify this content
   *
   * @internal
   */
  protected $mLastModifiedBy = -1;

  /**
   * Creation date
   * Date
   *
   * @internal
   */
  protected $mCreationDate = '';

  /**
   * Modification date
   * Date
   *
   * @internal
   */
  protected $mModifiedDate = '';
    
  /**
   * Additional Editors Array
   *
   * @internal
   */
  protected $mAdditionalEditors;
	
  /*
   * state or meta information
   *
   * @internal
   */
  protected $mReadyForEdit;

  private $_attributes;
  private $_prop_defaults;
  private $_add_mode;
  private $_error;

  /************************************************************************/
  /* Constructor related													*/
  /************************************************************************/

  /**
   * Generic constructor. Runs the SetInitialValues fuction.
   */
  public function __construct()
  {
    $this->SetInitialValues();
    $this->SetProperties();
    $this->mReadyForEdit = false;
  }

  /**
   * Sets object to some sane initial values
   *
   * @internal
   */
  protected function SetInitialValues()
  {
    $this->mType = strtolower(get_class($this)) ;
  }

  /**
   * Subclasses should override this to set their property types using a lot
   * of mProperties.Add statements
   */
  protected function SetProperties()
  {
    $this->AddBaseProperty('title',1,1);
    $this->AddBaseProperty('menutext',2,1);
    $this->AddBaseProperty('alias',5);
    $this->AddBaseProperty('page_url',6);
    $this->AddBaseProperty('parent',7,1);
    $this->AddBaseProperty('active',8);
    $this->AddBaseProperty('showinmenu',9);
    $this->AddBaseProperty('secure',10);
    $this->AddBaseProperty('cachable',11);
    $this->AddContentProperty('target',12);
      
    $this->AddContentProperty('image',50);
    $this->AddContentProperty('thumbnail',50);
    $this->AddBaseProperty('titleattribute',55);
    $this->AddBaseProperty('accesskey',56);
    $this->AddBaseProperty('tabindex',57);
	  
    $this->AddContentProperty('extra1',80);
    $this->AddContentProperty('extra2',81);
    $this->AddContentProperty('extra3',82);
	  
    $this->AddBaseProperty('owner',90);
    $this->AddBaseProperty('additionaleditors',91);
  }

    
  /************************************************************************/
  /* Functions giving access to needed elements of the content			*/
  /************************************************************************/
  
  public function __clone()
  {
    $this->mId = -1;
    $this->mItemOrder = -1;
    $this->mOldItemOrder = -1;
    $this->mURL = '';
    $this->mAlias = '';
  }

  /**
   * Returns the ID
   */
  public function Id()
  {
    return $this->mId;
  }

  /**
   * Set the numeric id of the content item
   *
   * @param integer Integer id
   * @access private
   * @internal
   */
  public function SetId($id)
  {
    if( $id <= 0 ) return;
    $this->mId = $id;
    $this->DoReadyForEdit();
  }

  /**
   * Returns a friendly name for this content type
   *
   * @abstract
   * @return string
   */
  public function FriendlyName()
  {
    return '';
  }

  /**
   * Returns the Name
   *
   * @return string
   */
  public function Name()
  {
    return $this->mName;
  }

  /**
   * Set the the page name
   *
   * @param string The name.
   */
  public function SetName($name)
  {
    $this->DoReadyForEdit();
    $this->mName = $name;
  }

  /**
   * Returns the Alias
   *
   * @return string
   */
  public function Alias()
  {
    return $this->mAlias;
  }

  /**
   * Returns the Type
   *
   * @return string
   */
  public function Type()
  {
    return strtolower($this->mType);
  }

  /**
   * Set the page type
   *
   * @param string type
   * @abstract
   * @internal
   */
  protected function SetType($type)
  {
    $this->DoReadyForEdit();
    $this->mType = strtolower($type);
  }

  /**
   * Returns the Owner
   *
   * @return integer
   */
  public function Owner()
  {
    return $this->mOwner;
  }

  /**
   * Set the page owner.
   * No validation is performed.
   *
   * @param integer Owner's user id
   */
  public function SetOwner($owner)
  {
    if( $owner <= 0 ) return;
    $this->DoReadyForEdit();
    $this->mOwner = $owner;
  }

  /**
   * Returns the Metadata
   *
   * @return string
   */
  public function Metadata()
  {
    return $this->mMetadata;
  }

  /**
   * Content object handles the alias
   *
   * @return boolean
   */
  public function HandlesAlias()
  {
    return false;
  }

  /**
   * Set the page metadata
   * 
   * @param string The metadata
   */
  public function SetMetadata($metadata)
  {
    $this->DoReadyForEdit();
    $this->mMetadata = $metadata;
  }

  /**
   * Return the page tabindex value
   *
   * @return integer
   */
  public function TabIndex()
  {
    return $this->mTabIndex;
  }

  /**
   * Set the page tabindex value
   *
   * @param integer tabindex
   */
  public function SetTabIndex($tabindex)
  {
    $this->DoReadyForEdit();
    $this->mTabIndex = $tabindex;
  }

  /**
   * Return the page title attribute
   *
   * @return string
   */
  public function TitleAttribute()
  {
    return $this->mTitleAttribute;
  }

  /**
   * Retrieve the creation date of this content object.
   *
   * @return int Unix Timestamp of the creation date
   */
  public function GetCreationDate()
  {
    return strtotime($this->mCreationDate);
  }

  /**
   * Retrieve the date of the last modification of this content object.
   *
   * @return int Unix Timestamp of the modification date.
   */
  public function GetModifiedDate()
  {
    return strtotime($this->mModifiedDate);
  }


  /**
   * Set the title attribute of the page
   *
   * @param string The title attribute
   */
  public function SetTitleAttribute($titleattribute)
  {
    $this->DoReadyForEdit();
    $this->mTitleAttribute = $titleattribute;
  }

  /**
   * Get the access key (for accessibility) for this page.
   *
   * @return string
   */
  public function AccessKey()
  {
    return $this->mAccessKey;
  }

  /**
   * Set the access key (for accessibility) for this page
   *
   * @param string Access Key
   */
  public function SetAccessKey($accesskey)
  {
    $this->DoReadyForEdit();
    $this->mAccessKey = $accesskey;
  }

  /**
   * Returns the id of this pages parent.
   *
   * @return int -1 if this page has no parent.  Positive integer otherwise.
   */
  public function ParentId()
  {
    return $this->mParentId;
  }

  /**
   * Sets the parent of this page.
   *
   * @param int The numeric page parent id.  Use -1 for no parent.
   */
  public function SetParentId($parentid)
  {
    $this->DoReadyForEdit();
    $this->mParentId = $parentid;
  }

  /**
   * Retrieve the 'old parent id' for this page.
   * This may return a value if the page's parent has changed or the page has been copied.
   *
   * @deprecated
   * @internal
   * @return integer
   */
   public function OldParentId()
   {
     return $this->mOldParentId;
   }

   /**
    * Sets the OldParentId value for this page
    * This may be necessary when changin page ownership or copying a page
    *
    * @deprecated
    * @internal
    * @param int ParentID ... -1 indicates no parent.
    */
   public function SetOldParentId($parentid)
   {
     $this->DoReadyForEdit();
     $this->mOldParentId = $parentid;
   }

   /**
    * Return the id of the page template associated with this content page.
    *
    * @return integer.
    */
   public function TemplateId()
   {
     return $this->mTemplateId;
   }

   /**
    * Set the id of the page template associated with this content page.
    *
    * @param integer
    */
   public function SetTemplateId($templateid)
   {
     $this->DoReadyForEdit();
     $this->mTemplateId = $templateid;
   }

   /**
    * Returns the ItemOrder
    * The ItemOrder is used to specify the order of this page within the parent.
    *
    * @return int
    */
   public function ItemOrder()
   {
     return $this->mItemOrder;
   }

   /**
    * Sets the ItemOrder
    * The ItemOrder is used to specify the order of this page within the parent.
    *
    * @internal
    * @param int the itemorder.
    */
   public function SetItemOrder($itemorder)
   {
     $this->DoReadyForEdit();
     $this->mItemOrder = $itemorder;
   }

   /**
    * Return the old item order.
    *
    * @deprecated
    * @internal
    * @return int
    */
   public function OldItemOrder()
   {
     return $this->mOldItemOrder;
   }

   /**
    * Sets the old item order.
    *
    * @deprecated
    * @internal
    * @param int The item order.
    */
   public function SetOldItemOrder($itemorder)
   {
     $this->DoReadyForEdit();
     $this->mOldItemOrder = $itemorder;
   }

   /**
    * Returns the Hierarchy
    *
    * @return string
    */
   public function Hierarchy()
   {
      $gCms = cmsms();
      $contentops = $gCms->GetContentOperations();
      return $contentops->CreateFriendlyHierarchyPosition($this->mHierarchy);
   }

   /**
    * Sets the Hierarchy
    *
    * @internal
    * @param string
    */
   public function SetHierarchy($hierarchy)
   {
     $this->DoReadyForEdit();
     $this->mHierarchy = $hierarchy;
   }

   /**
    * Returns the Id Hierarchy
    *
    * @return string
    */
   public function IdHierarchy()
   {
     return $this->mIdHierarchy;
   }


   /**
    * Sets the Id Hierarchy
    *
    * @internal
    * @param string
    */
   public function SetIdHierarchy($idhierarchy)
   {
     $this->DoReadyForEdit();
     $this->mIdHierarchy = $idhierarchy;
   }


   /**
    * Returns the Hierarchy Path
    *
    * @return string
    */
   public function HierarchyPath()
   {
     return $this->mHierarchyPath;
   }


   /**
    * Sets the Hierarchy Path
    *
    * @internal
    * @param string
    */
   public function SetHierarchyPath($hierarchypath)
   {
     $this->DoReadyForEdit();
     $this->mHierarchyPath = $hierarchypath;
   }
   

   /**
    * Returns the Active state
    *
    * @return boolean
    */
   public function Active()
   {
     return $this->mActive;
   }


   /**
    * Sets this page as active
    *
    * @param boolean
    */
   public function SetActive($active)
   {
     $this->DoReadyForEdit();
     $this->mActive = $active;
   }


   /**
    * Returns whether preview should be available for this content type
    *
    * @abstract
    * @return boolean
    */
   public function HasPreview()
   {
     return (bool) $this->mPreview;
   }


   /**
    * Returns whether it should show in the menu
    *
    * @return boolean
    */
   public function ShowInMenu()
   {
     return $this->mShowInMenu;
   }


   /**
    * Sets whether this page should be shown in menus
    *
    * @param boolean
    */
   public function SetShowInMenu($showinmenu)
   {
     $this->DoReadyForEdit();
     $this->mShowInMenu = $showinmenu;
   }


   /**
    * Returns if the page is the default
    *
    * @return boolean
    */
   public function DefaultContent()
   {
     return $this->mDefaultContent;
   }

   /**
    * Sets if this page should be considered the default
    * Note: does not modify the flags for any other content page.
    *
    * @param boolean
    */
   public function SetDefaultContent($defaultcontent)
   {
     $this->DoReadyForEdit();
     $this->mDefaultContent = $defaultcontent;
   }


   /**
    * Return wether this page is cachable
    *
    * @return boolean
    */
   public function Cachable()
   {
     return $this->mCachable;
   }


   /**
    * Set wether this page is cachable
    *
    * @param boolean
    */
    public function SetCachable($cachable)
    {
	$this->DoReadyForEdit();
	$this->mCachable = $cachable;
    }


   /**
    * Return wether this page should be accessed via a secure protocol.
    * The secure flag effectsw wether the ssl protocol and appropriate config entries are used when generating urls to this page.
    *
    * @return boolean
    */
    public function Secure()
    {
      return $this->mSecure;
    }


   /**
    * Set wether this page should be accessed via a secure protocol.
    * The secure flag effectsw wether the ssl protocol and appropriate config entries are used when generating urls to this page.
    *
    * @return boolean
    */
    public function SetSecure($secure)
    {
	$this->DoReadyForEdit();
	$this->mSecure = $secure;
    }
	
    
    /**
     * Return the page url (if any) associated with this content page.
     * Note: some content types do not support page urls.
     *
     * @return string
     */
    public function URL()
    {
      return $this->mURL;
    }

    /**
     * Set the page url (if any) associated with this content page.
     * Note: some content types do not support page urls.
     * The url should be relative to the root url.  i.e: /some/path/to/the/page
     *
     * @param string
     */
    public function SetURL($url)
    {
      $this->DoReadyForEdit();
      $this->mURL = $url;
    }

    /**
     * Return the markup for this page. usually xhtml or html.
     * 
     * @deprecated
     * @return string
     */
    public function Markup()
    {
      return $this->mMarkup;
    }

    /**
     * Set the markup for this page. usually xhtml or html.
     * 
     * @deprecated
     * @param string
     */
    public function SetMarkup($markup)
    {
      $this->DoReadyForEdit();
      $this->mMarkup = $markup;
    }

    /**
     * Return the last modified date for this item
     * This is usually set on save.
     * 
     * @return Date
     */
    public function LastModifiedBy()
    {
      return $this->mLastModifiedBy;
    }

    /**
     * Set the last modified date for this item
     * This is usually set on save.
     * 
     * @param Date
     */
    public function SetLastModifiedBy($lastmodifiedby)
    {
      $this->DoReadyForEdit();
      $this->mLastModifiedBy = $lastmodifiedby;
    }

    /**
     * Indicates wether this content type requires an alias
     *
     * @abstract
     * @return boolean
     */
    public function RequiresAlias()
    {
      return TRUE;
    }

    /**
     * Indicates wether this content type is viewable (i.e: can be rendered)
     * some content types (like redirection links) are not viewable.
     *
     * @abstract
     * @return boolean
     */
    public function IsViewable()
    {
      return TRUE;
    }


    /**
     * Set the page alias for this content page.  
     * If an empty alias is supplied, and depending upon the doAutoAliasIfEnabled flag, and config entries
     * a suitable alias may be calculated from other data in the page object
     * This method relies on the menutext and the name of the content page already being set.
     *
     * @param string The alias
     * @param boolean Wether an alias should be calculated or not.
     */
    public function SetAlias($alias, $doAutoAliasIfEnabled = true)
    {
      $this->DoReadyForEdit();
      $gCms = cmsms();
      $config = $gCms->GetConfig();

      $tolower = false;

      if ($alias == '' && $doAutoAliasIfEnabled && $config['auto_alias_content'] == true)
	{
	  $alias = trim($this->mMenuText);
	  if ($alias == '')
	    {
	      $alias = trim($this->mName);
	    }
			
	  $tolower = true;
	  $alias = munge_string_to_url($alias, $tolower);
	  // Make sure auto-generated new alias is not already in use on a different page, if it does, add "-2" to the alias
	  $contentops = $gCms->GetContentOperations();
	  $error = $contentops->CheckAliasError($alias, $this->Id());
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
     * Returns the menu text for this content page
     *
     * @return string
     */
    public function MenuText()
    {
      return $this->mMenuText;
    }

    /**
     * Sets the menu text for this content page
     *
     * @param string
     */
    public function SetMenuText($menutext)
    {
      $this->DoReadyForEdit();
      $this->mMenuText = $menutext;
    }

    /**
     * Returns number of immediate child-content items of this content
     *
     * @return integer
     */
    public function ChildCount()
    {
      $hm = cmsms()->GetHierarchyManager();
      $node = $hm->getNodeById($this->mId);
      if( $node )
	{
	  return $node->count_children();
	}
    }

    /**
     * Returns the properties
     *
     * @return array
     */
    public function Properties()
    {
      return $this->_props;
    }

    /**
     * Test wether this content page has the named property
     * Properties will be loaded from the database if necessary.
     *
     * @return boolean
     */
    public function HasProperty($name)
    {
      if( !is_array($this->_props) ) {
	$this->_load_properties();
      }
      if( !is_array($this->_props) ) {
	return FALSE;
      }
      return in_array($name,array_keys($this->_props));
    }

    
    /**
     * Get the value for the named property
     *
     * @return mixed String value, or null if the property does not exist.
     */
    public function GetPropertyValue($name)
    {
      if( $this->HasProperty($name) )
	{
	  return $this->_props[$name];
	}
    }
    
    
    private function _load_properties()
    {
      if( $this->mId <= 0 ) return FALSE;

      $this->_props = array();
      $db = cmsms()->GetDb();
      $query = 'SELECT * FROM '.cms_db_prefix().'content_props WHERE content_id = ?';
      $dbr = $db->Execute($query,array($this->mId));
      while( $dbr && !$dbr->EOF )
	{
	  $row = $dbr->fields;
	  $this->_props[$row['prop_name']] = $row['content'];
	  $dbr->MoveNext();
	}
      return TRUE;
    }

    private function _save_properties()
    {
      if( $this->mId <= 0 ) return FALSE;
      if( !is_array($this->_props) || count($this->_props) == 0 ) return FALSE;
	    
      $db = cmsms()->GetDb();
      $query = 'SELECT prop_name FROM '.cms_db_prefix().'content_props WHERE content_id = ?';
      $gotprops = $db->GetCol($query,array($this->mId));

      $now = $db->DbTimeStamp(time());
      $iquery = 'INSERT INTO '.cms_db_prefix()."content_props
                    (content_id,type,prop_name,content,modified_date)
                    VALUES (?,?,?,?,$now)";
      $uquery = 'UPDATE '.cms_db_prefix()."content_props SET content = ?, modified_date = $now WHERE content_id = ? AND prop_name = ?";
	  
      foreach( $this->_props as $key => $value )
	{
	  if( in_array($key,$gotprops) )
	    {
	      // update
	      $dbr = $db->Execute($uquery,array($value,$this->mId,$key));
	    }
	  else
	    {
	      // insert
	      $dbr = $db->Execute($iquery,array($this->mId,'string',$key,$value));
	    }
	}
      return TRUE;
    }

    /**
     * Set the value of a the named property.
     * This method will load properties for this content page if necessary.
     *
     * @param string The property name
     * @param string  The property value.
     */
    public function SetPropertyValue($name, $value)
    {
      if( !is_array($this->_props) ) $this->_props = array();
	  
      $this->_props[$name] = $value;
      if( !is_array($this->_props) ) $this->_load_properties();
      $this->_props[$name] = $value;
    }
	
    /**
     * Set the value of a the named property.
     * This method will not load properties
     *
     * @param string The property name
     * @param string  The property value.
     */
    public function SetPropertyValueNoLoad($name,$value)
    {
      if( !is_array($this->_props) ) $this->_props = array();
      $this->_props[$name] = $value;
    }

    /**
     * Function content types to use to say whether or not they should show
     * up in lists where parents of content are set.  This will default to true,
     * but should be used in cases like Separator where you don't want it to 
     * have any children.
     * 
     * @since 0.11
     * @return boolean
     */
    public function WantsChildren()
    {
      return true;
    }

    /**
     * Should this link be used in various places where a link is the only
     * useful output?  (Like next/previous links in cms_selflink, for example)
     *
     * @abstract
     * @return boolean
     */
    public function HasUsableLink()
    {
      return true;
    }

    /**
     * Is this content type copyable ?
     *
     * @abstract
     * @return boolean
     */
    public function IsCopyable()
    {
      return FALSE;
    }

    /**
     * Indicates wether this is a system page type.
     *
     * @return boolean
     */
    public function IsSystemPage()
    {
      return FALSE;
    }

    /************************************************************************/
    /* The rest																*/
    /************************************************************************/

    /**
     * This is a callback function to handle any things that might need to be done before the content page is edited.
     * edited.
     *
     * @abstract
     * @return void
     */
    public function ReadyForEdit()
    {
    }

    /**
     * A method that sets the content page into a 'ready for edit stage';
     *
     * @return void
     */
    protected function DoReadyForEdit()
    {
      if ($this->mReadyForEdit == false)
	{
	  $this->ReadyForEdit();
	  $this->mReadyForEdit = true;
	}
    }
    
    /**
     * Load the content of the object from an ID
     * This method modifies the current object.
     *
     * @param $id		the ID of the element
     * @param $loadProperties	whether to load or not the properties
     *
     * @returns bool		If it fails, the object comes back to initial values and returns FALSE
     *				If everything goes well, it returns TRUE
     */
    public function LoadFromId($id, $loadProperties = false)
    {
      $gCms = cmsms();
      global $debug_errors;
      $db = $gCms->GetDb();
      $config = $gCms->GetConfig();
	  
      $result = false;

      if (-1 < $id)
	{
	  $query = "SELECT * FROM ".cms_db_prefix()."content WHERE content_id = ?";
	  $row = $db->Execute($query, array($id));

	  if ($row && !$row->EOF)
	    {
	      $this->mId                         = $row->fields["content_id"];
	      $this->mName                       = $row->fields["content_name"];
	      $this->mAlias                      = $row->fields["content_alias"];
	      $this->mOldAlias                   = $row->fields["content_alias"];
	      $this->mType                       = strtolower($row->fields["type"]);
	      $this->mOwner                      = $row->fields["owner_id"];
	      $this->mParentId                   = $row->fields["parent_id"];
	      $this->mOldParentId                = $row->fields["parent_id"];
	      $this->mTemplateId                 = $row->fields["template_id"];
	      $this->mItemOrder                  = $row->fields["item_order"];
	      $this->mOldItemOrder               = $row->fields["item_order"];
	      $this->mMetadata                   = $row->fields['metadata'];
	      $this->mHierarchy                  = $row->fields["hierarchy"];
	      $this->mIdHierarchy                = $row->fields["id_hierarchy"];
	      $this->mHierarchyPath              = $row->fields["hierarchy_path"];
	      $this->mMenuText                   = $row->fields['menu_text'];
	      $this->mMarkup                     = $row->fields['markup'];
	      $this->mTitleAttribute             = $row->fields['titleattribute'];
	      $this->mAccessKey                  = $row->fields['accesskey'];
	      $this->mTabIndex                   = $row->fields['tabindex'];
	      $this->mActive                     = ($row->fields["active"] == 1          ? true : false);
	      $this->mDefaultContent             = ($row->fields["default_content"] == 1 ? true : false);
	      $this->mShowInMenu                 = ($row->fields["show_in_menu"] == 1    ? true : false);
	      $this->mCachable                   = ($row->fields["cachable"] == 1        ? true : false);
	      $this->mSecure                     = $row->fields['secure'];
	      $this->mURL                        = $row->fields['page_url'];
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
	      if( !is_array($this->_props) ) $this->_load_properties();

	      if (!is_array($this->_props) )
		{
		  $result = false;
			      
		  // debug mode
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
	  // debug mode
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
     * This method modifies the current object.
     *
     * There is no check on the data provided, because this is the job of
     * ValidateData
     *
     * @returns	bool		If it fails, the object comes back to initial values and returns FALSE
     *				If everything goes well, it returns TRUE
     */
    function LoadFromData(&$data, $loadProperties = false)
    {
      $result = true;
      $this->mId                         = $data["content_id"];
      $this->mName                       = $data["content_name"];
      $this->mAlias                      = $data["content_alias"];
      $this->mOldAlias                   = $data["content_alias"];
      $this->mType                       = strtolower($data["type"]);
      $this->mOwner                      = $data["owner_id"];
      $this->mParentId                   = $data["parent_id"];
      $this->mOldParentId                = $data["parent_id"];
      $this->mTemplateId                 = $data["template_id"];
      $this->mItemOrder                  = $data["item_order"];
      $this->mOldItemOrder               = $data["item_order"];
      $this->mMetadata                   = $data['metadata'];
      $this->mHierarchy                  = $data["hierarchy"];
      $this->mIdHierarchy                = $data["id_hierarchy"];
      $this->mHierarchyPath              = $data["hierarchy_path"];
      $this->mMenuText                   = $data['menu_text'];
      $this->mMarkup                     = $data['markup'];
      $this->mTitleAttribute             = $data['titleattribute'];
      $this->mAccessKey                  = $data['accesskey'];
      $this->mTabIndex                   = $data['tabindex'];
      $this->mDefaultContent             = ($data["default_content"] == 1 ? true : false);
      $this->mActive                     = ($data["active"] == 1          ? true : false);
      $this->mShowInMenu                 = ($data["show_in_menu"] == 1    ? true : false);
      $this->mCachable                   = ($data["cachable"] == 1        ? true : false);
      if( isset($data['secure']) )
	$this->mSecure                   = $data["secure"];
      if( isset($data['page_url']) )
	$this->mURL                      = $data["page_url"];
      $this->mLastModifiedBy             = $data["last_modified_by"];
      $this->mCreationDate               = $data["create_date"];
      $this->mModifiedDate               = $data["modified_date"];

      if ($loadProperties == true)
	{
	  $this->_load_properties();

	  if (!is_array($this->_props) )
	    {
	      $result = false;
		      
	      global $debug_errors;
	      $gCms = cmsms();
	      $config = $gCms->GetConfig();
	      // debug mode
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
     * is called right after the content is loaded from the database.
     *
     */
    protected function Load()
    {
    }

    /**
     * Save or update the content
     *
     * @todo This function should return something (or throw an exception)
     */
    function Save()
    {
      Events::SendEvent('Core', 'ContentEditPre', array('content' => &$this));

      if( !is_array($this->_props) )
	{
	  debug_buffer('save is loading properties');
	  $this->_load_properties();
	}

      if (-1 < $this->mId)
	{
	  $this->Update();
	}
      else
	{
	  $this->Insert();
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
     *
     * @todo this function should return something, or throw an exception.
     */
    protected function Update()
    {
      $gCms = cmsms();
      global $debug_errors;
      $db = $gCms->GetDb();
      $config = $gCms->GetConfig();

      $result = false;

#Figure out the item_order (if necessary)
      if ($this->mItemOrder < 1)
	{
	  $query = "SELECT ".$db->IfNull('max(item_order)','0')." as new_order FROM ".cms_db_prefix()."content WHERE parent_id = ?";
	  $row = $db->GetRow($query,array($this->mParentId));

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

      $query = "UPDATE ".cms_db_prefix()."content SET content_name = ?, owner_id = ?, type = ?, template_id = ?, parent_id = ?, active = ?, default_content = ?, show_in_menu = ?, cachable = ?, secure = ?, page_url = ?, menu_text = ?, content_alias = ?, metadata = ?, titleattribute = ?, accesskey = ?, tabindex = ?, modified_date = ?, item_order = ?, markup = ?, last_modified_by = ? WHERE content_id = ?";
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
					     $this->mSecure,
					     $this->mURL,
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

      if( is_array($this->_props) && count($this->_props) )
	{
	  // :TODO: There might be some error checking there
	  $this->_save_properties();
	}
      else
	{
	  if (true == $config["debug"])
	    {
	      # :TODO: Translate the error message
	      $debug_errors .= "<p>Error updating : the content has no properties</p>\n";
	    }
	}

      cms_route_manager::del_static('','__CONTENT__',$this->mId);
      if( $this->mURL != '' )
	{
	  $route = CmsRoute::new_builder($this->mURL,'__CONTENT__',$this->mId,null,TRUE);;
	  cms_route_manager::add_static($route);
	}
    }

    /**
     * Insert the content in the db
     *
     * @todo this function should return something
     */
    # :TODO: This function should return something
    # :TODO: Take care bout hierarchy here, it has no value !
    # :TODO: Figure out proper item_order
    protected function Insert()
    {
      $gCms = cmsms();
      global $debug_errors;
      $db = $gCms->GetDb();
      $config = $gCms->GetConfig();

      $result = false;

#Figure out the item_order
      if ($this->mItemOrder < 1)
	{
	  $query = "SELECT max(item_order) as new_order FROM ".cms_db_prefix()."content WHERE parent_id = ?";
	  $row = $db->Getrow($query, array($this->mParentId));

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

      $query = "INSERT INTO ".$config["db_prefix"]."content (content_id, content_name, content_alias, type, owner_id, parent_id, template_id, item_order, hierarchy, id_hierarchy, active, default_content, show_in_menu, cachable, secure, page_url, menu_text, markup, metadata, titleattribute, accesskey, tabindex, last_modified_by, create_date, modified_date) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

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
					     $this->mSecure,
					     $this->mURL,
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
	  die($db->sql.'<br/>'.$db->ErrorMsg());
	  if ($config["debug"] == true)
	    {
	      # :TODO: Translate the error message
	      $debug_errors .= "<p>Error inserting content</p>\n";
	    }
	}

      if (is_array($this->_props) && count($this->_props))
	{
	  // :TODO: There might be some error checking there
	  debug_buffer('save from ' . __LINE__);
	  $this->_save_properties();
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

      if( $this->mURL != '' )
	{
	  $route = CmsRoute::new_builder($this->mURL,'__CONTENT__',$this->mId,'',TRUE);
	  cms_route_manager::add_static($route);
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
    public function ValidateData()
    {
      $errors = array();

      if ($this->mParentId < -1) 
	{
	  $errors[] = lang('invalidparent');
	  $result = false;
	}
	  
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
		
      if (!$this->HandlesAlias())
	{
	  if ($this->mAlias != $this->mOldAlias || ($this->mAlias == '' && $this->RequiresAlias()) ) 
	    {
	      $gCms = cmsms();
	      $contentops = $gCms->GetContentOperations();
	      $error = $contentops->CheckAliasError($this->mAlias, $this->mId);
	      if ($error !== FALSE)
		{
		  $errors[]= $error;
		  $result = false;
		}
	    }
	}

      $auto_type = content_assistant::auto_create_url();
      if( $this->mURL == '' && get_site_preference('content_autocreate_urls') )
	{
	  // create a valid url.
	  if( !$this->DefaultContent() )
	    {
	      if( get_site_preference('content_autocreate_flaturls',0) )
		{
		  // the default url is the alias... but not synced to the alias.
		  $this->mURL = $this->mAlias;
		}
	      else
		{
		  // if it don't explicitly say 'flat' we're creating a hierarchical url.
		  $gCms = cmsms();
		  $tree = $gCms->GetHierarchyManager();
		  $node = $tree->find_by_tag('id',$this->ParentId());
		  $stack = array($this->mAlias);
		  $parent_url = '';
		  $count = 0;
		  while( $node )
		    {
		      $tmp_content = $node->GetContent();
		      if( $tmp_content )
			{
			  $tmp = $tmp_content->URL();
			  if( $tmp != '' && $count == 0 )
			    {
			      // try to build the url out of the parent url.
			      $parent_url = $tmp;
			      break;
			    }
			  array_unshift($stack,$tmp_content->Alias());
			}
		      $node = $node->GetParent();
		      $count++;
		    }

		  if( $parent_url != '' )
		    {
		      // woot, we got a prent url.
		      $this->mURL = $parent_url.'/'.$this->mAlias;
		    }
		  else
		    {
		      $this->mURL = implode('/',$stack);
		    }
		}
	    }
	}
      if( $this->mURL == '' && get_site_preference('content_mandatory_urls') && !$this->mDefaultContent )
	{
	  // page url is empty and mandatory
	  $errors[] = lang('content_mandatory_urls');
	}
      else if( $this->mURL != '' )
	{
	  // page url is not empty, check for validity.
	  $this->mURL = strtolower(trim($this->mURL," /\t\r\n\0\x08")); // silently delete bad chars. and convert to lowercase.
	  if( $this->mURL != '' && !content_assistant::is_valid_url($this->mURL,$this->mId) )
	    {
	      // and validate the URL.
	      $errors[] = lang('invalid_url2');
	    }
	}

      return (count($errors) > 0?$errors:FALSE);
    }

    /**
     * Delete the current content object from the database.
     *
     * @todo this function should return something, or throw an exception
     */
    function Delete()
    {
      $gCms = cmsms();
      global $debug_errors;
      $config = $gCms->GetConfig();
      Events::SendEvent('Core', 'ContentDeletePre', array('content' => &$this));
      $db = $gCms->GetDb();
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

	  // Fix the item_order if necessary
	  $query = "UPDATE ".cms_db_prefix()."content SET item_order = item_order - 1 WHERE parent_id = ? AND item_order > ?";
	  $result = $db->Execute($query,array($this->ParentId(),$this->ItemOrder()));

	  $cachefilename = TMP_CACHE_LOCATION . '/contentcache.php';
	  @unlink($cachefilename);

	  // DELETE properties
	  $query = 'DELETE FROM '.cms_db_prefix().'content_props WHERE content_id = ?';
	  $result = $db->Execute($query,array($this->mId));
	  $this->_props = null;

	  // Delete additional editors.
	  $query = 'DELETE FROM '.cms_db_prefix().'additional_users WHERE content_id = ?';
	  $result = $db->Execute($query,array($this->mId));
	  $this->mAdditionalEditors = null;

	  // Delete route
	  if( $this->mURL != '' )
	    {
	      cms_route_manager::del_static($this->mURL);
	    }
	}

      Events::SendEvent('Core', 'ContentDeletePost', array('content' => &$this));
    }

    /**
     * Function for the subclass to parse out data for it's parameters (usually from $_POST)
     * This method is typically called from an editor form to allow modifying the content object from 
     * form input fields.
     *
     * @abstract
     * @return void
     */
    public function FillParams($params,$editing = false)
    {
      // content property parameters
      $parameters = array('extra1','extra2','extra3','image','thumbnail');
      foreach ($parameters as $oneparam)
	{
	  if (isset($params[$oneparam]))
	    {
	      $this->SetPropertyValue($oneparam, $params[$oneparam]);
	    }
	}

      // go through the list of base parameters
      // setting them from params
      
      // title
      if (isset($params['title']))
	{
	  $this->mName = $params['title'];
	}

      // menu text
      if (isset($params['menutext']))
	{
	  $this->mMenuText = $params['menutext'];
	}

      // parent id
      if( isset($params['parent_id']) )
	{
	  if ($this->mParentId != $params['parent_id'])
	    {
	      $this->mHierarchy = '';
	      $this->mItemOrder = -1;
	    }
	  $this->mParentId = $params['parent_id'];
	}

      // active
      if (isset($params['active']))
	{
	  $this->mActive = $params['active'];
	  if( $this->DefaultContent() )
	    {
	      $this->mActive = 1;
	    }
	}
      
      // show in menu
      if (isset($params['showinmenu']))
	{
	  $this->mShowInMenu = $params['showinmenu'];
	}

      // alias
      $tmp = '';
      if( isset($params['alias']) )
	{
	  $tmp = trim($params['alias']);
	}
      if( !$editing || isset($params['alias']) )
	{
	  // the alias param may not exist (depending upon permissions)
	  // this method will set the alias to the supplied value if it is set
	  // or auto-generate one, when adding a new page.
	  $this->SetAlias($tmp);
	}

      // target
      if (isset($params['target']))
	{
	  $val = $params['target'];
	  if( $val == '---' )
	    {
	      $val = '';
	    }
	  $this->SetPropertyValue('target', $val);
	} 

      // title attribute
      if (isset($params['titleattribute']))
	{
	  $this->mTitleAttribute = $params['titleattribute'];
	}

      // accesskey
      if (isset($params['accesskey']))
	{
	  $this->mAccessKey = $params['accesskey'];
	}

      // tab index
      if (isset($params['tabindex']))
	{
	  $this->mTabIndex = $params['tabindex'];
	}

      // cachable
      if (isset($params['cachable']))
	{
	  $this->mCachable = $params['cachable'];
	}
      else
	{
	  $this->_handleRemovedBaseProperty('cachable','mCachable');
	}

      // secure
      if (isset($params['secure']))
	{
	  $this->mSecure = $params['secure'];
	}
      else
	{
	  $this->_handleRemovedBaseProperty('secure','mSecure');
	}

      // url
      if (isset($params['page_url']))
	{
	  $this->mURL = $params['page_url'];
	}
      else
	{
	  $this->_handleRemovedBaseProperty('page_url','mURL');
	}

      // owner
      if (isset($params["ownerid"]))
	{
	  $this->SetOwner($params["ownerid"]);
	}
	 
      // additional editors
      if (isset($params["additional_editors"]))
	{
	  $addtarray = array();
	  if( is_array($params['additional_editors']) )
	    {
	      foreach ($params["additional_editors"] as $addt_user_id)
		{
		  $addtarray[] = $addt_user_id;
		}
	    }
	  $this->SetAdditionalEditors($addtarray);
	}
    }

    /**
     * A function to get the internally generated URL for this content type.
     * This method may be overridden by content types.
     *
     * @param boolean if true, and mod_rewrite is enabled, build a URL suitable for mod_rewrite.
     * @return string
     */
    public function GetURL($rewrite = true)
    {
      $gCms = cmsms();
      $config = $gCms->GetConfig();
      $url = "";
      $alias = ($this->mAlias != ''?$this->mAlias:$this->mId);

      $base_url = $config['root_url'];
      if( $this->Secure() )
	{
	  if( isset($config['ssl_url']) )
	    {
	      $base_url = $config['ssl_url'];
	    }
	  else
	    {
	      $base_url = str_replace('http://','https://',$base_url);
	    }
	}

      /* use root_url for default content */
      if($this->mDefaultContent) {
	$url =  $base_url . '/';
	return $url;
      }

      if ($config["url_rewriting"] == 'mod_rewrite' && $rewrite == true)
	{
	  $str = $this->HierarchyPath();
	  if( $this->mURL != '')
	    {
	      // we have a url path
	      $str = $this->mURL;
	    }
	  $url = $base_url. '/' . $str . (isset($config['page_extension'])?$config['page_extension']:'.html');
	}
      else if (isset($_SERVER['PHP_SELF']) && $config['url_rewriting'] == 'internal' && $rewrite == true)
	{
	  $str = $this->HierarchyPath();
	  if( $this->mURL != '')
	    {
	      // we have a url path
	      $str = $this->mURL;
	    }
	  $url = $base_url . '/index.php/' . $str . (isset($config['page_extension'])?$config['page_extension']:'.html');
	}
      else
	{
	  $url = $base_url . '/index.php?' . $config['query_var'] . '=' . $alias;
	}
      return $url;
    }


    /**
     * Show the content
     *
     * @abstract
     * @param string An optional property name to display.
     */
    public function Show($param = '')
    {
    }
	
    /**
     * Used from a page that allows content editing. This method the list of distinct sections
     * that devides up the various logical sections that this content type supports for editing.
     *
     * @abstract
     * @return array List of tab name strings.
     */
    public function TabNames()
    {
        return array();
    }

    /** 
     * Used from within a page that allows editing content this method returns the input fields for
     * the various fields that can be edited.
     *
     * @abstract
     * @param boolean Wether we are adding a new content page, or editing an existing content page.
     * @param int     The tab index.
     * @param boolean unused??
     */
    public function EditAsArray($adding = false, $tab = 0, $showadmin = false)
    {
	# :TODO:
	return array(array('Error','Edit Not Defined!'));
    }


    /**
     * Show Help
# disabled to see if its used.
    public function Help()
    {
    	# :TODO:
    	return "<tr><td>Help Not Defined</td></tr>";
    }
     */

    /**
     * Method to indicate wether the current page has children.
     *
     * @param boolean should we test only for active children.
     * @return booelan
     */
    public function HasChildren($activeonly = false)
    {
      $hm = cmsms()->GetHierarchyManager();
      $node = $hm->getNodeById($this->mId);
      if( !$node->has_children() ) return false;
      if( $activeonly == false) return true;

      $children = $node->get_children();
      if( $children )
	{
	  for( $i = 0; $i < count($children); $i++ )
	    {
	      $content = $children[$i]->getContent();
	      if( $content->Active() ) return true;
	    }
	}

      return false;
    }

    /**
     * Return a list of additional editors
     * Note: in the returned array, group id's are specified as negative integers.
     *
     * @return mixed  Array of uids and group ids, or null
     */
    public function GetAdditionalEditors()
    {
      if (!isset($this->mAdditionalEditors))
	{
	  $gCms = cmsms();
	  $db = $gCms->GetDb();

	  $this->mAdditionalEditors = array();

	  $query = "SELECT user_id FROM ".cms_db_prefix()."additional_users WHERE content_id = ?";
	  $dbresult = $db->Execute($query,array($this->mId));

	  while ($dbresult && !$dbresult->EOF)
	    {
	      $this->mAdditionalEditors[] = $dbresult->fields['user_id'];
	      $dbresult->MoveNext();
	    }

	  if ($dbresult) $dbresult->Close();
	}
      return $this->mAdditionalEditors;
    }

    /**
     * Set the list of additional editors
     * Note: in the provided array, group id's are specified as negative integers.
     *
     * @param mixed  Array of uids and group ids, or null
     */
    public function SetAdditionalEditors($editorarray)
    {
      $this->mAdditionalEditors = $editorarray;
    }

    static public function GetAdditionalEditorInput($addteditors,$owner_id = -1)
    {
      $ret[] = lang('additionaleditors');
      $text = '<input name="additional_editors" type="hidden" value=""/>';
      $text .= '<select name="additional_editors[]" multiple="multiple" size="5">';

      $gCms = cmsms();
      $userops = $gCms->GetUserOperations();
      $groupops = $gCms->GetGroupOperations();
      $allusers = $userops->LoadUsers();
      $allgroups = $groupops->LoadGroups();
      foreach ($allgroups as $onegroup)
	{
	  if( $onegroup->id == 1 ) continue;
	  $val = $onegroup->id*-1;
	  $text .= '<option value="'.$val.'"';
	  if( in_array($val,$addteditors) )
	    {
	      $text .= ' selected="selected"';
	    }
	  $text .= '>'.lang('group').': '.$onegroup->name."</option>";
		   
	}

      foreach ($allusers as $oneuser)
	{
	  if ($oneuser->id != $owner_id && $oneuser->id != 1)
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


    /**
     * Provides an input element to display the list of additional editors.
     * This method is usually called from within this object.
     *
     * @param mixed An optional array of additional editor id's (group ids specified with negative values)
     * @return string The input element.
     */
    public function ShowAdditionalEditors($addteditors = '')
    {
      $ret = array();
      if( $addteditors == '' )
	{
	  $addteditors = $this->GetAdditionalEditors();
	}
      return self::GetAdditionalEditorInput($addteditors,$this->Owner());
    }

    /**
     * Indicates wether this content type can be the default page for a CMSMS website
     *
     * @abstract
     * @returns boolean
     */
    public function IsDefaultPossible()
    {
      return FALSE;
    }

    /**
     * Set a flag indicating that we are adding a new content object and not editing an existing one
     * This is usually called from a script that provides the ability to add content objects.
     */
    public function SetAddMode($flag = true)
    {
      $this->_add_mode = $flag;
    }

    /* private */
    private function _handleRemovedBaseProperty($name,$member)
    {
      if( !is_array($this->_attributes) ) return FALSE;
      if( !in_array($name,$this->_attributes) )
	{
	  if( isset($this->_prop_defaults[$name]) )
	    {
	      $this->$member = $this->_prop_defaults[$name];
	      return TRUE;
	    }
	}
      return FALSE;
    }

    /**
     * @deprecated 
     */
    public function AddExtraProperty($name,$type = 'string')
    {
      return; // debug
    }

    /**
     * Remove a property from the known property list.
     * Specify a default value to use if the property is called.
     *
     * @param string The property name
     * @param string The default value.
     */
    protected function RemoveProperty($name,$dflt)
    {
      if( !is_array($this->_attributes) ) return;
      $tmp = array();
      for( $i = 0; $i < count($this->_attributes); $i++ )
	{
	  if( is_array($this->_attributes[$i]) && $this->_attributes[$i][0] == $name )
	    {
	      continue;
	    }
	  $tmp[] = $this->_attributes[$i];
	}
      $this->_attributes = $tmp;
      $this->_prop_defaults[$name] = $dflt;
    }

    /*
     * Add a property that is directly associtated with a field in the content table.
     *
     * @param string The property name
     * @param integer The priority
     * @param boolean Whether this field is required for this content type
     * @param string  (optional) unused.
     */
    protected function AddBaseProperty($name,$priority,$is_required = 0,$type = 'string')
    {
      if( !is_array($this->_attributes) )
	{
	  $this->_attributes = array();
	}

      $this->_attributes[] = array($name,$priority,$is_required);
    }

    /*
     * Alias for AddBaseProperty
     */
    protected function AddContentProperty($name,$priority,$is_required = 0,$type = 'string')
    {
      return $this->AddBaseProperty($name,$priority,$is_required,$type);
    }


    /*
     * Given a string, see if it's a known property name.
     *
     * @param string The property name
     * @return boolean
     */
    protected function is_known_property($str)
    {
      $tmp = array();
      foreach( $this->_attributes as $one )
	{
	  $tmp[] = $one[0];
	}
	  
      return in_array($str,$tmp);
    }

    /*
     * Given the list of registered properties, cross reference with our
     * basic attributes list, and figure out which ones should be displayed
     *
     * @return array of input elements of attributes that can be edited for this form.
     */
    protected function display_attributes($adding,$negative = 0)
    {
      // get our required attributes
      $basic_attributes = array();
      foreach( $this->_attributes as $one )
	{
	  if( $one[2] == 1 ) $basic_attributes[] = $one;
	}

      // merge in preferred basic attributes
      $tmp = get_site_preference('basic_attributes');
      if( !empty($tmp) )
	{
	  $tmp = explode(',',$tmp);
	  foreach( $tmp as $basic )
	    {
	      $found = NULL;
	      foreach( $this->_attributes as $one )
		{
		  if( $one[0] == $basic ) {
		    $found = $one;
		    break;
		  }
		}
	      if( $found )
		{
		  $basic_attributes[] = $found;
		}
	    }
	}

      $attrs = $basic_attributes;
      if( $negative )
	{
	  // build a new list of all properties... except those in the basic_attributes
	  $attrs = array();
	  foreach( $this->_attributes as $one )
	    {
	      $found = 0;
	      foreach( $basic_attributes as $basic )
		{
		  if( $basic[0] == $one[0] )
		    {
		      $found = 1;
		    }
		}

	      if( !$found )
		{
		  $attrs[] = $one;
		}
	    }
	}

      // remove any duplicates
      $tmp = array();
      foreach( $attrs as $one )
	{
	  $found = 0;
	  foreach( $tmp as $t1 )
	    {
	      if( $one[0] == $t1[0] )
		{
		  $found = 1;
		  break;
		}
	    }
	  if( !$found )
	    {
	      $tmp[] = $one;
	    }
	}
      $attrs = $tmp;

      // sort the attributes on the 2nd element...
      $fn = create_function('$a,$b','if( $a[1] < $b[1] ) return -1; else if( $a[1] == $b[1] ) return 0; else return $b;');
      usort($attrs,$fn);

      $tmp = $this->display_admin_attributes($attrs,$adding);
      return $tmp;
    }

    /* private */
    private function display_admin_attributes($attributelist,$adding)
    {
      // sort the attributes

      $ret = array();
      foreach( $attributelist as $one )
	{
	  $tmp = $this->display_single_element($one[0],$adding);
	  if( is_array($tmp) )
	    {
	      $ret[] = $tmp;
	    }
	}
      return $ret;
    }

    /**
     * A method to display a single input element for an object basic, or extended property.
     *
     * @abstract
     * @param string The property name
     * @param boolean Wether or not we are in add or edit mode.
     * @return array consisting of two elements.  A label, and the input element.
     */
    protected function display_single_element($one,$adding)
    {
      $gCms = cmsms();
      $config = $gCms->GetConfig();

      switch( $one )
	{
	case 'cachable':
	  return array('<label for="in_cachable">'.lang('cachable').':</label>',
		       '<input type="hidden" name="cachable" value="0"/><input id="in_cachable" class="pagecheckbox" type="checkbox" value="1" name="cachable"'.($this->mCachable?' checked="checked"':'').' />',lang('help_page_cachable'));
	  break;
	
	case 'title':
	  {
	    return array('<label for="in_title">*'.lang('title').'</label>:','<input type="text" id="in_title" name="title" value="'.cms_htmlentities($this->mName).'" />');
	  }
	  break;
	      
	case 'menutext':
	  {
	    return array('<label for="in_menutext">*'.lang('menutext').'</label>:','<input type="text" name="menutext" id="in_menutext" value="'.cms_htmlentities($this->mMenuText).'" />');
	  }
	  break;
	      
	case 'parent':
	  {
	    $contentops = $gCms->GetContentOperations();
	    $tmp = $contentops->CreateHierarchyDropdown($this->mId, $this->mParentId, 'parent_id', 0, 1, 0, 1,get_site_preference('listcontent_showtitle',true) );
	    if( empty($tmp) && !check_permission(get_userid(),'Manage All Content') )
	      return array('','<input type="hidden" name="parent_id" value="'.$this->mParentId.'" />');
	    if( !empty($tmp) ) return array('<label for="parent_id">'.lang('parent').'</label>:',$tmp);
	  }
	  break;

	case 'active':
	  if( !$this->DefaultContent() )
	    {
	      return array('<label for="id_active">'.lang('active').'</label>:','<input type="hidden" name="active" value="0"/><input class="pagecheckbox" type="checkbox" name="active" id="id_active" value="1"'.($this->mActive?' checked="checked"':'').' />');
	    }
	  break;
	      
	case 'showinmenu':
	  return array('<label for="showinmenu">'.lang('showinmenu').'</label>:','<input type="hidden" name="showinmenu" value="0"/><input class="pagecheckbox" type="checkbox" value="1" name="showinmenu" id="showinmenu"'.($this->mShowInMenu?' checked="checked"':'').' />');
	  break;
	      
	case 'target':
	  {
	    $text = '<option value="---">'.lang('none').'</option>';
	    $text .= '<option value="_blank"'.($this->GetPropertyValue('target')=='_blank'?' selected="selected"':'').'>_blank</option>';
	    $text .= '<option value="_parent"'.($this->GetPropertyValue('target')=='_parent'?' selected="selected"':'').'>_parent</option>';
	    $text .= '<option value="_self"'.($this->GetPropertyValue('target')=='_self'?' selected="selected"':'').'>_self</option>';
	    $text .= '<option value="_top"'.($this->GetPropertyValue('target')=='_top'?' selected="selected"':'').'>_top</option>';
	    return array('<label for="target">'.lang('target').'</label>:','<select name="target" id="target">'.$text.'</select>',
			 lang('info_target'));
		
	  }
	  break;
	      
	case 'alias':
	  return array('<label for="alias">'.lang('pagealias').'</label>:','<input type="text" name="alias" id="alias" value="'.$this->mAlias.'" />',lang('help_page_alias'));
	  break;
	      
	case 'secure':
	  {
	    $opt = '';
	    if( $this->mSecure )
	      {
		$opt = ' checked="checked"';
	      }
	    $str  = '<input type="hidden" name="secure" value="0"/>';
	    $str .= '<input type="checkbox" name="secure" id="secure" value="1"'.$opt.'/>';
	    return array('<label for="secure">'.lang('secure_page').'</label>:',$str);
	  }
	  break;

	case 'page_url':
	  if( !$this->DefaultContent() )
	    {
	      $str = '<input type="text" name="page_url" id="page_url" value="'.$this->mURL.'" size="50" maxlength="255"/>';
	      $prompt = '<label for="page_url">'.lang('page_url').'</label>:';
	      if( get_site_preference('content_mandatory_urls',0) )
		{
		  $prompt = '*'.$prompt;
		}
	      return array($prompt,$str,lang('help_page_url'));
	    }
	  break;

	case 'image':
	  {
	    $dir = cms_join_path($config['image_uploads_path'],get_site_preference('content_imagefield_path'));
	    $data = $this->GetPropertyValue('image');
	    $dropdown = create_file_dropdown('image',$dir,$data,'jpg,jpeg,png,gif','',true,'','thumb_',1,1);
	    if( !$dropdown ) return;
	    return array('<label for="image">'.lang('image').'</label>:',$dropdown);
	  }
	  break;
	      
	case 'thumbnail':
	  {
	    $dir = cms_join_path($config['image_uploads_path'],get_site_preference('content_thumbnailfield_path'));
	    $data = $this->GetPropertyValue('thumbnail');
	    $dropdown = create_file_dropdown('thumbnail',$dir,$data,'jpg,jpeg,png,gif','',true,'','thumb_',0,1);
	    if( !$dropdown ) return FALSE;
	    return array('<label for="thumbnail">'.lang('thumbnail').'</label>:',$dropdown);
	  }
	  break;
	      
	case 'titleattribute':
	  {
	    return array('<label for="titleattribute">'.lang('titleattribute').'</label>:','<input type="text" name="titleattribute" id="titleattribute" maxlength="255" size="80" value="'.cms_htmlentities($this->mTitleAttribute).'" />');
	  }
	  break;
	      
	case 'accesskey':
	  {
	    return array('<label for="accesskey">'.lang('accesskey').'</label>:','<input type="text" name="accesskey" id="accesskey" maxlength="5" value="'.cms_htmlentities($this->mAccessKey).'" />');
	  }
	  break;

	case 'tabindex':
	  {
	    return array('<label for="tabindex">'.lang('tabindex').'</label>:','<input type="text" name="tabindex" id="tabindex" maxlength="5" value="'.cms_htmlentities($this->mTabIndex).'" />');
	  }
	  break;
	      
	case 'extra1':
	  {
	    return array('<label for="extra1">'.lang('extra1').'</label>:','<input type="text" name="extra1" id="extra1" maxlength="255" size="80" value="'.cms_htmlentities($this->GetPropertyValue('extra1')).'" />');
	  }
	  break;
	      
	case 'extra2':
	  {
	    return array('<label for="extra2">'.lang('extra2').'</label>:','<input type="text" name="extra2" id="extra2" maxlength="255" size="80" value="'.cms_htmlentities($this->GetPropertyValue('extra2')).'" />');
	  }
	  break;
	      
	case 'extra3':
	  {
	    return array('<label for="extra3">'.lang('extra3').'</label>:','<input type="text" name="extra3" id="extra3" maxlength="255" size="80" value="'.cms_htmlentities($this->GetPropertyValue('extra3')).'" />');
	  }
	  break;

	case 'owner':
	  {
	    $showadmin = check_ownership(get_userid(), $this->Id());
	    $userops = $gCms->GetUserOperations();
	    if (!$adding && ($showadmin || check_permission(get_userid(),'Manage All Content')) )
	      {
		return array('<label for="owner">'.lang('owner').'</label>:', $userops->GenerateDropdown($this->Owner()));
	      }
	  }
	  break;

	case 'additionaleditors':
	  {
	    // do owner/additional-editor stuff
	    if( $adding || check_ownership(get_userid(),$this->Id()) || check_permission(get_userid(),'Manage All Content'))
	      {
		return $this->ShowAdditionalEditors();
	      }
	  }
	  break;

	default:
	  stack_trace();
	  die('unknown property '.$one);
	}
    }

    protected function SetError($str)
    {
      // we don't need this being serialized.
      cms_utils::set_app_data('content_error',$str);
    }

    public function GetError()
    {
      $str = cms_utils::get_app_data('content_error');
      return $str;
    }
}
?>
