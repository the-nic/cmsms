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

/**
 * This file respect the PHP Coding Standards : http://alltasks.net/code/php_coding_standard.html
 *
 * @author		calexico@cmsmadesimple.org
 * @revision	0.1
 * @created		28/09/2004
 * @modified	09/10/2004
 *
 */

/**
 * Generic content class.
 *
 * As for some treatment we don't need the extra properties of the content
 * we load them only when required. However, each function which makes use
 * of extra properties should first test if the properties object exist.
 *
 * @since		svn
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

	/**
	 * The ID of the parent, 0 if none
	 * Integer
	 */
	var $mParentId;

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
	 * The full hierarchy of the content
	 * String of the form : 1.4.3
	 */
	var $mHierarchy;

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
	 * Creation date
	 * Date
	 */
	var $mCreationDate;

	/**
	 * Modification date
	 * Date
	 */
	var $mModifiedDate;

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
	}

	/**
	 * Sets object to some sane initial values
	 */
	function SetInitialValues()
	{
		$this->mId				= -1 ;
		$this->mName			= "" ;
		$this->mAlias			= "" ;
		$this->mType			= get_class($this) ;
		$this->mOwner			= -1 ;
		$this->mProperties		= new ContentProperties();
		$this->mParentId		= -1 ;
		$this->mTemplateId		= -1 ;
		$this->mItemOrder		= -1 ;
		$this->mHierarchy		= "" ;
		$this->mActive			= false ;
		$this->mDefaultContent	= false ;
		$this->mShowInMenu		= false ;
		$this->mMenuText		= "" ;
		$this->mCreationDate	= "" ;
		$this->mModifiedDate	= "" ;
		$this->mPreview         = false ;
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

	/**
	 * Returns the Name
	 */
	function Name()
	{
		return $this->mName;
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
		return $this->mType;
	}

	/**
	 * Returns the Owner
	 */
	function Owner()
	{
		return $this->mOwner;
	}

	/**
	 * Returns the ParentId
	 */
	function ParentId()
	{
		return $this->mParentId;
	}

	function TemplateId()
	{
		return $this->mTemplateId;
	}

	/**
	 * Returns the ItemOrder
	 */
	function ItemOrder()
	{
		return $this->mItemOrder;
	}

	/**
	 * Returns the Hierarchy
	 */
	function Hierarchy()
	{
		return $this->mHierarchy;
	}

	/**
	 * Returns the Active state
	 */
	function Active()
	{
		return $this->mActive;
	}

	/**
	 * Returns whether it should show in the menu
	 */
	function ShowInMenu()
	{
		return $this->mShowInMenu;
	}

	/**
	 * Returns if the page is the default
	 */
	function DefaultContent()
	{
		return $this->mDefaultContent;
	}

	/**
	 * Returns the menu text for this content
	 */
	function MenuText()
	{
		return $this->mMenuText;
	}

	/**
	 * Returns the properties
	 */
	function Properties()
	{
		return $this->mProperties;
	}

	function GetPropertyValue($name)
	{
		return $this->mProperties->GetValue($name);
	}

	/************************************************************************/
	/* The rest																*/
	/************************************************************************/

	/**
	 * Load the content of the object from an ID
	 *
	 * @param $id				the ID of the element
	 * @param $loadProperties	whether to load or not the properties
	 *
	 * @returns					If it fails, the object comes back to initial values and returns FALSE
	 *							If everything goes well, it returns TRUE
	 */
	function LoadFromId($id, $loadProperties = false)
	{
		global $gCms, $config, $sql_queries, $debug_errors;
		$db = &$gCms->db;
		
		$result = false;

		if (-1 < $id)
		{
			$query		= "SELECT * FROM ".cms_db_prefix()."content WHERE content_id = ?";
			$dbresult	= $db->Execute($query, array($id));

			if ($dbresult && (1 == $dbresult->RowCount()))
			{
				$row = $dbresult->FetchRow();

				$this->mId				= $row["content_id"];
				$this->mName			= $row["content_name"];
				$this->mAlias			= $row["content_alias"];
				$this->mType			= $row["type"];
				$this->mOwner			= $row["owner_id"];
				#$this->mProperties		= new ContentProperties();
				$this->mParentId		= $row["parent_id"];
				$this->mTemplateId		= $row["template_id"];
				$this->mItemOrder		= $row["item_order"];
				$this->mHierarchy		= $row["hierarchy"];
				$this->mMenuText		= $row['menu_text'];
				$this->mActive			= ($row["active"] == 1?true:false);
				$this->mDefaultContent	= ($row["default_content"] == 1?true:false);
				$this->mShowInMenu		= ($row["show_in_menu"] == 1?true:false);
				$this->mCreationDate	= $row["create_date"];
				$this->mModifiedDate	= $row["modified_date"];

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

			if ($result && $loadProperties)
			{
				$this->mProperties->Load($this->mId);

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

		return $result;
	}

	/**
	 * Load the content of the object from an array
	 *
	 * There is no check on the data provided, because this is the job of
	 * ValidateData
	 *
	 * @returns					If it fails, the object comes back to initial values and returns FALSE
	 *							If everything goes well, it returns TRUE
	 */
	function LoadFromData($data, $loadProperties = false)
	{
		global $config, $debug_errors;
		
		$result = true;

		$this->mId				= $data["content_id"];
		$this->mName			= $data["content_name"];
		$this->mAlias			= $data["content_alias"];
		$this->mType			= $data["type"];
		$this->mOwner			= $data["owner_id"];
		#$this->mProperties		= new ContentProperties(); 
		$this->mParentId		= $data["parent_id"];
		$this->mTemplateId		= $data["template_id"];
		$this->mItemOrder		= $data["item_order"];
		$this->mHierarchy		= $data["hierarchy"];
		$this->mMenuText		= $data['menu_text'];
		$this->mDefaultContent	= ($data["default_content"] == 1?true:false);
		$this->mActive			= ($data["active"] == 1?true:false);
		$this->mShowInMenu		= ($data["show_in_menu"] == 1?true:false);
		$this->mCreationDate	= $data["create_date"];
		$this->mModifiedDate	= $data["modified_date"];

		if ($loadProperties)
		{
			#$this->mProperties = ContentOperations::LoadPropertiesFromData($this->mType, $data);
			$this->mProperties->Load($this->mId);

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

		return $result;
	}

	/**
	 * Save or update the content
	 */
	# :TODO: This function should return something
	function Save()
	{
		if (-1 < $this->mId)
		{
			$this->Update();
		}
		else
		{
			$this->Insert();
		}
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
		$db = &$gCms->db;
		
		$result = false;

		$query = "UPDATE ".cms_db_prefix()."content SET content_name = ?, owner_id = ?, type = ?, template_id = ?, parent_id = ?, active = ?, default_content = ?, show_in_menu = ?, menu_text = ?, content_alias = ?, modified_date = ? WHERE content_id = ?";

		$dbresult = $db->Execute($query, array(
			$this->mName,
			$this->mOwner,
			$this->mType,
			$this->mTemplateId,
			$this->mParentId,
			($this->mActive==true?1:0),
			($this->mDefaultContent==true?1:0),
			($this->mShowInMenu==true?1:0),
			$this->mMenuText,
			$this->mAlias,
			$db->DBTimeStamp(time()),
			$this->mId
			));

		if (! $dbresult)
		{
			if (true == $config["debug"])
			{
				# :TODO: Translate the error message
				$debug_errors .= "<p>Error updating content</p>\n";
			}
		}

		if (NULL != $this->mProperties)
		{
			# :TODO: There might be some error checking there
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
		$db = &$gCms->db;
		
		$result = false;

		#Figure out the item_order
		if ($this->mItemOrder < 1)
		{
			$query = "SELECT max(item_order) as new_order FROM ".cms_db_prefix()."content WHERE parent_id = ".$this->mParentId;
			$dbresult = $db->Execute($query);

			if ($dbresult && (1 == $dbresult->RowCount()))
			{
				$row = $dbresult->FetchRow();
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

		$query = "INSERT INTO ".$config["db_prefix"]."content (content_id, content_name, content_alias, type, owner_id, parent_id, template_id, item_order, hierarchy, active, default_content, show_in_menu, menu_text, create_date, modified_date) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

		$dbresult = $db->Execute($query, array(
			$newid,
			$this->mName,
			$this->mAlias,
			$this->mType,
			$this->mOwner,
			$this->mParentId,
			$this->mTemplateId,
			$this->mItemOrder,
			$this->mHierarchy,
			($this->mActive==true?1:0),
			($this->mDefaultContent==true?1:0),
			($this->mShowInMenu==true?1:0),
			$this->mMenuText,
			$db->DBTimeStamp(time()),
			$db->DBTimeStamp(time())
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
	}

	/**
	 * Test if the array given contains valid data for the object
	 * This function is used to check that no compulsory argument
	 * has been forgotten by the user
	 *
	 * We do not check the Id because there can be no Id (new content)
	 * That's up to Save to check this.
	 *
	 * @returns	TRUE if data is ok, and an array of invalid parameters else
	 */
	function ValidateData()
	{
		$result = true;
		$errors = array();

		# :TODO: translate all strings
		
		if (0 >= strlen($this->mName))
		{
			# :TODO: Translate the error message
			array_push($errors, "Name not valid");
			$result = false;
		}
		if (! ContentOperations::CheckType($this->mType))
		{
			# :TODO: Translate the error message
			array_push($errors, "Type not valid");
			$result = false;
		}
		if (0 >= $this->mOwner)
		{
			# :TODO: Translate the error message
			array_push($errors, "Owner not valid");
			$result = false;
		}
		if (0 > $this->mParentId)
		{
			# :TODO: Translate the error message
			array_push($errors, "Parent not valid");
			$result = false;
		}
		if (0 >= strlen($this->mHierarchy))
		{
			# :TODO: Translate the error message
			array_push($errors, "Hierarchy not valid");
			$result = false;
		}
		if (NULL == $this->mProperties)
		{
			# :TODO: Translate the error message
			array_push($errors, "No properties !");
			$result = false;
		}
		else
		{
			$resultprop = $this->mProperties.ValidateData();
			$result = ($result) ? $resultprop : $result ;
		}

		return ($result) ? $result : $errors;
	}

	/**
	 * Delete the content
	 */
	# :TODO: This function should return something
	function Delete()
	{
		global $gCms, $config, $sql_queries, $debug_errors;
		$db = &$gCms->db;
		
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
			$query		= "DELETE FROM ".cms_db_prefix()."content WHERE content_id = ?";
			$dbresult	= $db->Execute($query, array($this->mId));

			if (! $dbresult)
			{
				if (true == $config["debug"])
				{
					# :TODO: Translate the error message
					$debug_errors .= "<p>Error deleting content</p>\n";
				}
			}

			#Fix the item_order if necessary
			$query = "UPDATE ".cms_db_prefix()."content SET item_order = item_order - 1 WHERE parent_id = ".$this->ParentId()." AND item_order > ".$this->ItemOrder();
			$result = $db->Execute($query);

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
	function GetURL()
	{
	}

	/**
	 * Show the content
	 */
	function Show()
	{
		# :TODO:
		return "<tr><td>Show Not Defined</td></tr>";
	}

	/**
	 * Show the Edit interface
	 */
	function Edit()
	{
		# :TODO:
		return "<tr><td>Edit Not Defined</td></tr>";
	}

	/**
	 * Show the Advanced Edit interface
	 */
	function AdvancedEdit()
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
		$db = &$gCms->db;
		
		$result = false;

		$query = "SELECT content_id FROM ".cms_db_prefix()."content WHERE parent_id = ".$this->mId;
		$dbresult = $db->Execute($query);

		if ($dbresult && $dbresult->RowCount() > 0)
		{
			$result = true;
		}

		return $result;
	}
}

class ContentProperties
{
	var $mPropertyTypes;
	var $mPropertyValues;

	/**
	 * Generic constructor. Runs the SetInitialValues fuction.
	 */
	function ContentProperties()
	{
		$this->SetInitialValues();
	}

	/**
	 * Sets object to some sane initial values
	 */
	function SetInitialValues()
	{
		$this->mPropertyTypes = array(); 
		$this->mPropertyValues = array(); 
	}

	function Add($type, $name)
	{
		if (!isset($this->mPropertyValues[$name]))
		{
			$this->mPropertyTypes[$name] = $type;
			$this->mPropertyValues[$name] = "";
		}
	}

	function GetValue($name)
	{
		if (isset($this->mPropertyValues[$name]))
		{
			return $this->mPropertyValues[$name];
		}
	}

	function SetValue($name, $value)
	{
		if (isset($this->mPropertyValues[$name]))
		{
			$this->mPropertyValues[$name] = $value;
		}
	}

	function Show()
	{
	}

	function Load($content_id)
	{
		global $gCms, $config, $sql_queries, $debug_errors;
		$db = &$gCms->db;

		$query		= "SELECT * FROM ".cms_db_prefix()."content_props WHERE content_id = ?";
		$dbresult	= $db->Execute($query, array($content_id));

		if ($dbresult && $dbresult->RowCount() > 0)
		{
			while ($row = $dbresult->FetchRow())
			{
				$prop_name = $row['prop_name'];
				if (isset($this->mPropertyValues[$prop_name]))
				{
					$this->mPropertyTypes[$prop_name] = $row['type'];
					$this->mPropertyValues[$prop_name] = $row['content'];
				}
			}
		}
	}

	function Save($content_id)
	{
		global $gCms, $config, $sql_queries, $debug_errors;
		$db = &$gCms->db;

		$query = "DELETE FROM ".cms_db_prefix()."content_props WHERE content_id = ?";
		$dbresult = $db->Execute($query, array($content_id));

		foreach ($this->mPropertyValues as $key=>$value)
		{
			$query = "INSERT INTO ".cms_db_prefix()."content_props (content_id, type, prop_name, param1, param2, param3, content) VALUES (?,?,?,?,?,?,?)";

			$dbresult = $db->Execute($query, array(
				$content_id,
				$this->mPropertyTypes[$key],
				$key,
				'',
				'',
				'',
				$this->mPropertyValues[$key],
				));

			# debug mode
			if (true == $config["debug"])
			{
				$sql_queries .= "<p>$query</p>\n";
			}

			if (! $dbresult)
			{
				if (true == $config["debug"])
				{
					# :TODO: Translate the error message
					$debug_errors .= "<p>Error updating content property</p>\n";
				}
			}
		}
	}

	function Delete($content_id)
	{
		global $gCms, $config, $sql_queries, $debug_errors;
		$db = &$gCms->db;

		$query = "DELETE FROM ".cms_db_prefix()."content_props WHERE content_id = ?";
		$db->Execute($query, array($content_id));
	}
}

class ContentManager
{
	/**
	 * Determine proper type of object, load it and return it
	 */
	function LoadContentFromId($id)
	{
		global $gCms;
		$db = &$gCms->db;

		$query = "SELECT * FROM ".cms_db_prefix()."content WHERE content_id = ?";
		$dbresult = $db->Execute($query, array($id));
		if ($dbresult && $dbresult->RowCount() > 0)
		{
			$row = $dbresult->FetchRow();

			#Make sure the type exists.  If so, instantiate and load
			if (in_array($row['type'], ContentManager::ListContentTypes()))
			{
				$contentobj = new $row['type'];
				$contentobj->LoadFromData($row,true);
				return $contentobj;
			}
			else
			{
				return FALSE;
			}
		}
		else
		{
			return FALSE;
		}
	}

	function LoadContentFromAlias($alias, $only_active = false)
	{
		global $gCms;
		$db = &$gCms->db;

		$dbresult = '';
		$tpl_name = '';

		if (is_numeric($tpl_name) && strpos($tpl_name,'.') === FALSE && strpos($tpl_name,',') === FALSE) //Fix for postgres
		{
			$query = "SELECT * FROM ".cms_db_prefix()."content WHERE content_id = ? OR content_alias = ?";
			if ($only_active == true)
			{
				$query .= " AND active = 1";
			}
			$dbresult = $db->Execute($query, array($alias,$alias));
		}
		else
		{
			$query = "SELECT * FROM ".cms_db_prefix()."content WHERE content_id = ?";
			if ($only_active == true)
			{
				$query .= " AND active = 1";
			}
			$dbresult = $db->Execute($query, array($alias));
		}

		if ($dbresult && $dbresult->RowCount() > 0)
		{
			$row = $dbresult->FetchRow();

			#Make sure the type exists.  If so, instantiate and load
			if (in_array($row['type'], ContentManager::ListContentTypes()))
			{
				$contentobj = new $row['type'];
				$contentobj->LoadFromData($row,true);
				return $contentobj;
			}
			else
			{
				return FALSE;
			}
		}
		else
		{
			return FALSE;
		}
	}

	/**
	 * Display content
	 */
	function DisplayContent($content)
	{
		//This should be straight forward, since the content will pretty much determine how it is displayed
		$content->Show();
	}

	/**
	 * Determine if content should be loaded from cache
	 */
	function IsCached($id)
	{
	}

	function GetDefaultContent()
	{
		global $gCms;
		$db = &$gCms->db;

		$result = -1;

		$query = "SELECT content_id FROM ".cms_db_prefix()."content WHERE default_content = 1";
		$dbresult = $db->Execute($query);
		if ($dbresult && $dbresult->RowCount() > 0)
		{
			$row = $dbresult->FetchRow();
			$result = $row['content_id'];
		}
		else
		{
			#Just get something...
			$query = "SELECT content_id FROM ".cms_db_prefix()."content";
			$dbresult = $db->Execute($query);
			if ($dbresult && $dbresult->RowCount() > 0)
			{
				$row = $dbresult->FetchRow();
				$result = $row['content_id'];
			}
		}

		return $result;
	}

	/**
	 * Returns a list of valid content types (classes that extend ContentBase)
	 */
	function ListContentTypes()
	{
		$result = array();

		foreach (get_declared_classes() as $oneclass)
		{
			if (get_parent_class($oneclass) == 'contentbase')
			{
				array_push($result, $oneclass);
			}
		}

		return $result;
	}

	/**
	 * Updates the hierarchy position of one item
	 */
	function SetHierarchyPosition($contentid)
	{
		global $gCms;
		$db = $gCms->db;

		$current_hierarchy_position = "";
		$current_parent_id = $contentid;
		$count = 0;

		while ($current_parent_id > -1)
		{
			$query = "SELECT item_order, parent_id FROM ".cms_db_prefix()."content WHERE content_id = ?";
			$dbresult = $db->Execute($query, array($current_parent_id));
			if ($dbresult && $dbresult->RowCount())
			{
				$row = $dbresult->FetchRow();
				$current_hierarchy_position = $row['item_order'] . "." . $current_hierarchy_position;
				$current_parent_id = $row['parent_id'];
				$count++;
			}
			else
			{
				$current_parent_id = 0;
			}
		}

		if (strlen($current_hierarchy_position) > 0)
		{
			$current_hierarchy_position = substr($current_hierarchy_position, 0, strlen($current_hierarchy_position) - 1);
		}

		$query = "UPDATE ".cms_db_prefix()."content SET hierarchy = ? WHERE content_id = ?";
		$db->Execute($query, array($current_hierarchy_position, $contentid));
	}

	/**
	 * Updates the hierarchy position of all items
	 */
	function SetAllHierarchyPositions()
	{
		global $gCms;
		$db = $gCms->db;

		$query = "SELECT content_id FROM ".cms_db_prefix()."content";
		$dbresult = $db->Execute($query);

		if ($dbresult && $dbresult->RowCount() > 0)
		{
			while ($row = $dbresult->FetchRow())
			{
				ContentManager::SetHierarchyPosition($row['content_id']);
			}
		}
	}

	function GetAllContent()
	{
		global $gCms;
		$db = $gCms->db;

		$result = array();

		$query = "SELECT * FROM ".cms_db_prefix()."content ORDER BY hierarchy";
		$dbresult = $db->Execute($query);

		if ($dbresult && $dbresult->RowCount() > 0)
		{
			while ($row = $dbresult->FetchRow())
			{
				#Make sure the type exists.  If so, instantiate and load
				if (in_array($row['type'], ContentManager::ListContentTypes()))
				{
					$contentobj = new $row['type'];
					$contentobj->LoadFromData($row, true);
					array_push($result, $contentobj);
				}
			}
		}

		return $result;
	}
}

# vim:ts=4 sw=4 noet
?>
