<?php
#CMS - CMS Made Simple
#(c)2004-2010 by Ted Kulp (ted@cmsmadesimple.org)
#Visit our homepage at: http://cmsmadesimple.org
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

/**
 * Content related functions.
 *
 * @package CMS
 * @license GPL
 */

/**
 * Include the content class definition
 */

/**
 * Class for static methods related to content
 *
 * @abstract
 * @since 0.8
 * @package CMS
 * @license GPL
 */
class ContentOperations
{
	/**
	 * @ignore
	 */
	protected function __construct() {}

	/**
	 * @ignore
	 */
	private $_quickfind;

	/**
	 * @ignore
	 */
	private $_content_types;

	/**
	 * @ignore
	 */
	private $_default_content_id;

	/**
	 * @ignore
	 */
	private static $_instance;

	/**
	 * @ignore
	 */
	private $_authorpages;

	/**
	 * @ignore
	 */
	private $_ownedpages;

	/**
	 * @ignore
	 */
	private $_last_modified;

	/**
	 * Return a reference to the only allowed instance of this singleton object
	 *
	 * @return ContentOperations
	 */
	public static function &get_instance()
	{
		if( !is_object( self::$_instance ) ) self::$_instance = new ContentOperations();
		return self::$_instance;
	}


	/**
	 * Return a content object for the currently requested page.
	 *
	 * @since 1.9
	 * @return getContentObject()
	 */
	public function getContentObject()
	{
		return cmsms()->get_content_object();
	}


	/**
	 * Given an array of content_type and seralized_content, reconstructs a
	 * content object.  It will handled loading the content type if it hasn't
	 * already been loaded.
	 *
	 * Expects an associative array with 2 elements:
	 *   content_type: string A content type name
	 *   serialized_content: string Serialized form data
	 *
	 * @see ContentBase::ListContentTypes
	 * @param  array $data
	 * @return ContentBase A content object derived from ContentBase
	 */
	public function &LoadContentFromSerializedData(&$data)
	{
		if( !isset($data['content_type']) && !isset($data['serialized_content']) ) return FALSE;

		$contenttype = 'content';
		if( isset($data['content_type']) ) $contenttype = $data['content_type'];

		$contentobj = $this->CreateNewContent($contenttype);
		$contentobj = unserialize($data['serialized_content']);
		return $contentobj;
	}


	/**
	 * Load a specific content type
	 *
	 * This method is called from the autoloader.  There is no need to call it internally
	 *
	 * @internal
	 * @access private
	 * @final
	 * @since 1.9
	 * @param mixed The type.  Either a string, or an instance of CmsContentTypePlaceHolder
	 */
	final public function LoadContentType($type)
	{
		if( is_object($type) && $type instanceof CmsContentTypePlaceHolder ) $type = $type->type;

		$ctph = $this->_get_content_type($type);
		if( is_object($ctph) ) {
			if( !class_exists( $ctph->class ) && file_exists( $ctph->filename ) ) include_once( $ctph->filename );
		}

		return $ctph;
	}

	/**
	 * Creates a new, empty content object of the given type.
	 *
	 * if the content type is registered with the system,
	 * and the class does not exist, the appropriate filename will be included
	 * and then, if possible a new object of the designated type will be
	 * instantiated.
	 *
	 * @param mixed $type The type.  Either a string, or an instance of CmsContentTypePlaceHolder
	 * @return ContentBase (A valid object derived from ContentBase)
	 */
	public function &CreateNewContent($type)
	{
		if( is_object($type) && $type instanceof CmsContentTypePlaceHolder ) $type = $type->type;
		$result = NULL;

		$ctph = $this->LoadContentType($type);
		if( is_object($ctph) && class_exists($ctph->class) ) $result = new $ctph->class;
		return $result;
	}


    /**
     * Given a content id, load and return the loaded content object.
     *
     * @param int $id The id of the content object to load
     * @param bool $loadprops Also load the properties of that content object. Defaults to false.
     * @return mixed The loaded content object. If nothing is found, returns FALSE.
     */
	function &LoadContentFromId($id,$loadprops=false)
	{
		if( cms_content_cache::content_exists($id) ) return cms_content_cache::get_content($id);

		$result = FALSE;
		$gCms = cmsms();
		$db = $gCms->GetDb();

		$query = "SELECT * FROM ".cms_db_prefix()."content WHERE content_id = ?";
		$row = $db->GetRow($query, array($id));
		if ($row) {
			$classtype = strtolower($row['type']);
			$contentobj = $this->CreateNewContent($classtype);
			if ($contentobj) {
				$contentobj->LoadFromData($row, $loadprops);
				cms_content_cache::add_content($id,$row['content_alias'],$contentobj);
				return $contentobj;
			}
		}
		return $result;
	}


    /**
     * Given a content alias, load and return the loaded content object.
     *
     * @param int $alias The alias of the content object to load
     * @param bool $only_active If true, only return the object if it's active flag is true. Defaults to false.
     * @return ContentBase The loaded content object. If nothing is found, returns NULL.
     */
	function &LoadContentFromAlias($alias, $only_active = false)
	{
		if( cms_content_cache::content_exists($alias) ) return cms_content_cache::get_content($alias);

		$gCms = cmsms();
		$db = $gCms->GetDb();

		$row = '';
		if (is_numeric($alias) && strpos($alias,'.') === FALSE && strpos($alias,',') === FALSE) {
			$query = "SELECT * FROM ".cms_db_prefix()."content WHERE content_id = ?";
			if ($only_active == true) $query .= " AND active = 1";
			$row = $db->GetRow($query, array($alias));
		}
		else {
			$query = "SELECT * FROM ".cms_db_prefix()."content WHERE content_alias = ?";
			if ($only_active == true) $query .= " AND active = 1";
			$row = $db->GetRow($query, array($alias));
		}

		if ($row) {
			// Make sure the type exists.  If so, instantiate and load
			if (in_array($row['type'], array_keys($this->ListContentTypes()))) {
				$classtype = strtolower($row['type']);
				$contentobj = $this->CreateNewContent($classtype);
				$contentobj->LoadFromData($row, TRUE);
				cms_content_cache::add_content($row['content_id'],$row['content_alias'],$contentobj);
				return $contentobj;
			}
			else {
				$tmp = NULL;
				return $tmp;
			}
		}
		else {
			$tmp = NULL;
			return $tmp;
		}
	}


	/**
	 * Returns the id of the content marked as default.
	 *
	 * @return int The id of the default content page
	 */
	function GetDefaultContent()
	{
		if( $this->_default_content_id ) return $this->_default_content_id;

		$gCms = cmsms();
		$db = $gCms->GetDb();
		$result = -1;

		$query = "SELECT content_id FROM ".cms_db_prefix()."content WHERE default_content = 1";
		$row = $db->GetRow($query);
		if ($row) {
			$result = $row['content_id'];
		}
		else {
			// Just get something...
			$query = "SELECT content_id FROM ".cms_db_prefix()."content";
			$row = $db->GetRow($query);
			if ($row) $result = $row['content_id'];
		}

		$this->_default_content_id = $result;
		return $result;
	}


	/**
	 * Load standard CMS content types
	 *
	 * This internal method looks through the contenttypes directory
	 * and loads the placeholders for them.
	 *
	 * @since 1.9
	 * @access private
	 * @internal
	 */
	private function _get_std_content_types()
	{
		$result = array();
		$dir = dirname(__FILE__).'/contenttypes';
		$files = glob($dir.'/*.inc.php');
		if( is_array($files) ) {
			foreach( $files as $one ) {
				$obj = new CmsContentTypePlaceHolder();
				$class = basename($one,'.inc.php');
				$type  = strtolower($class);

				$obj->class = $class;
				$obj->type = strtolower($class);
				$obj->filename = $one;
				$obj->loaded = false;
				if( $obj->type == 'link' ) {
					// cough... big hack... cough.
					$obj->friendlyname_key = 'contenttype_redirlink';
				}
				else {
					$obj->friendlyname_key = 'contenttype_'.$obj->type;
				}
				$result[$type] = $obj;
			}
		}

		return $result;
	}


	/**
	 * @ignore
	 */
	private function _get_content_types()
	{
		if( !is_array($this->_content_types) ) {
			// get the standard ones.
			$this->_content_types = $this->_get_std_content_types();

			// get the list of modules that have content types.
			// and load them.  content types from modules are
			// registered in the constructor.
			$module_list = ModuleOperations::get_instance()->get_modules_with_capability(CmsCoreCapabilities::CONTENT_TYPES);
			if( is_array($module_list) && count($module_list) ) {
				foreach( $module_list as $module_name ) {
					cms_utils::get_module($module_name);
				}
			}
		}

		return $this->_content_types;
	}


	/**
	 * Function to return a content type given it's name
	 *
	 * @since 1.9
	 * @access private
	 * @internal
	 * @param string The content type name
	 * @return CmsContentTypePlaceHolder placeholder object.
	 */
	private function _get_content_type($name)
	{
		$name = strtolower($name);
		$this->_get_content_types();
		if( is_array($this->_content_types) ) {
			if( isset($this->_content_types[$name]) && $this->_content_types[$name] instanceof CmsContentTypePlaceHolder ) {
				return $this->_content_types[$name];
			}
		}
	}


	/**
	 * Register a new content type
	 *
	 * @since 1.9
	 * @param CmsContentTypePlaceHolder Reference to placeholder object
	 */
	public function register_content_type(CmsContentTypePlaceHolder& $obj)
	{
		$this->_get_content_types();
		if( isset($this->_content_types[$obj->type]) ) return FALSE;

		$this->_content_types[$obj->type] = $obj;
		return TRUE;
	}



	/**
     * Returns a hash of valid content types (classes that extend ContentBase)
     * The key is the name of the class that would be saved into the database.  The
     * value would be the text returned by the type's FriendlyName() method.
	 *
	 * @param bool $byclassname optionally return keys as class names.
	 * @param bool $allowed optionally trim the list of content types that are allowed by the site preference.
	 * @param bool $system return only system content types.
	 * @return array List of content types registered in the system.
	 */
	function ListContentTypes($byclassname = false,$allowed = false,$system = FALSE)
	{
		$disallowed_a = array();
		$tmp = get_site_preference('disallowed_contenttypes');
		if( $tmp ) $disallowed_a = explode(',',$tmp);

		$this->_get_content_types();
		$types = $this->_content_types;
		if ( isset($types) ) {
			$result = array();
			foreach( $types as $obj ) {
				global $CMS_ADMIN_PAGE;
				if( !isset($obj->friendlyname) && isset($obj->friendlyname_key) && isset($CMS_ADMIN_PAGE) ) {
					$txt = lang($obj->friendlyname_key);
					$obj->friendlyname = $txt;
				}
				if( !$allowed || count($disallowed_a) == 0 || !in_array($obj->type,$disallowed_a) ) {
					if( $byclassname ) {
						$result[$obj->class] = $obj->friendlyname;
					}
					else {
						$result[$obj->type] = $obj->friendlyname;
					}
				}
			}
			return $result;
		}
	}


    /**
     * Updates the hierarchy position of one item
	 *
	 * @param int $contentid The content id to update
     */
	private function _SetHierarchyPosition($contentid)
	{
		$gCms = cmsms();
		$db = $gCms->GetDb();

		$current_hierarchy_position = '';
		$current_id_hierarchy_position = '';
		$current_hierarchy_path = '';
		$current_parent_id = $contentid;
		$count = 0;

		while ($current_parent_id > -1) {
			$query = "SELECT item_order, parent_id, content_alias FROM ".cms_db_prefix()."content WHERE content_id = ?";
			$row = $db->GetRow($query, array($current_parent_id));
			if ($row) {
				$current_hierarchy_position = str_pad($row['item_order'], 5, '0', STR_PAD_LEFT) . "." . $current_hierarchy_position;
				$current_id_hierarchy_position = $current_parent_id . '.' . $current_id_hierarchy_position;
				$current_hierarchy_path = $row['content_alias'] . '/' . $current_hierarchy_path;
				$current_parent_id = $row['parent_id'];
				$count++;
			}
			else {
				$current_parent_id = -1;
			}
		}

		if (strlen($current_hierarchy_position) > 0) {
			$current_hierarchy_position = substr($current_hierarchy_position, 0, strlen($current_hierarchy_position) - 1);
		}
		if (strlen($current_id_hierarchy_position) > 0) {
			$current_id_hierarchy_position = substr($current_id_hierarchy_position, 0, strlen($current_id_hierarchy_position) - 1);
		}
		if (strlen($current_hierarchy_path) > 0) {
			$current_hierarchy_path = substr($current_hierarchy_path, 0, strlen($current_hierarchy_path) - 1);
		}

		$query = "SELECT prop_name FROM ".cms_db_prefix()."content_props WHERE content_id = ?";
		$prop_name_array = $db->GetCol($query, array($contentid));

		debug_buffer(array($current_hierarchy_position, $current_id_hierarchy_position, implode(',', $prop_name_array), $contentid));

		$query = "UPDATE ".cms_db_prefix()."content SET hierarchy = ?, id_hierarchy = ?, hierarchy_path = ?, prop_names = ? WHERE content_id = ?";
		$db->Execute($query, array($current_hierarchy_position, $current_id_hierarchy_position, $current_hierarchy_path, implode(',', $prop_name_array), $contentid));

		cms_content_cache::clear();
	}


	/**
	 * Updates the hierarchy position of all content items.
	 * This is an expensive operation on the database, but must be called once
	 * each time one or more content pages are updated if positions have changed in
	 * the page structure.
	 */
	function SetAllHierarchyPositions()
	{
		$db = cmsms()->GetDb();

		$query = "SELECT content_id FROM ".cms_db_prefix()."content";
		$dbresult = $db->GetCol($query);

		foreach( $dbresult as $one ) {
		    $this->_SetHierarchyPosition($one);
		}

		cmsms()->clear_cached_files();
	}


	/**
	 * Get the date of last content modification
	 *
	 * @since 2.0
	 * @return unix timestamp representing the last time a content page was modified.
	 */
	function GetLastContentModification()
	{
		if( $this->_last_modified <= 0 ) {
			$db = cmsms()->GetDb();
			$query = 'SELECT modified_date FROM '.cms_db_prefix().'content ORDER BY modified_date DESC';
			$val = $db->GetOne($query);
			$this->_last_modified = $db->UnixTimeStamp($val);
		}
		$last_modified_b = cms_cache_handler::get_instance()->get('lastmodified');
		return max($this->_last_modified,$last_modified_b);
	}

	/**
	 * Set the last modified date of content so that on the next request the content cache will be loaded from the database
	 *
	 * @internal
	 * @access private
	 */
	public function SetContentModified()
	{
		cms_cache_handler::get_instance()->set('lastmodified',time());
	}

	/**
	 * Loads a set of content objects into the cached tree.
	 *
	 * @param bool $loadcontent If false, only create the nodes in the tree, don't load the content objects
	 * @return cms_content_tree The cached tree of content
	 */
	function &GetAllContentAsHierarchy($loadcontent = false)
	{
		debug_buffer('', 'starting tree');

		$gCms = cmsms();
		$db = $gCms->GetDb();
		$tree = null;
		$loadedcache = false;
		if( ($tmp = cms_cache_handler::get_instance()->get('contentcache')) ) {
			list($mtime,$data) = unserialize($tmp);
			if( $mtime > $this->GetLastContentModification() ) {
				if( get_class($data) == 'cms_content_tree' ) {
					$tree = $data;
					$loadedcache = true;
				}
			}
		}

		if (!$loadedcache) {
			debug_buffer('', 'Start loading content tree from database and serializing');
			$query = 'SELECT content_id,parent_id,item_order,content_alias FROM '.cms_db_prefix().'content ORDER BY hierarchy ASC';
			$nodes = $db->GetArray($query);
			$tree = cms_tree_operations::load_from_list($nodes);
			$data = serialize(array(time(),$tree));
			cms_cache_handler::get_instance()->set('contentcache',$data);
			debug_buffer('', 'End content loading tree from database and serializing');
		}

		if( $loadcontent ) $this->LoadChildren(-1, true, true);

		debug_buffer('', 'ending tree');
		return $tree;
	}


	/**
	 * Load All content in thedatabase into memory
	 * Use with caution this can chew up alot of memory on larger sites.
	 *
	 * @param bool $loadprops Load extended content properties or just the page structure and basic properties
	 * @param bool $inactive  Load inactive pages as well
	 * @param bool $showinmenu Load pages marked as show in menu
	 */
	public function LoadAllContent($loadprops = FALSE,$inactive = FALSE,$showinmenu = FALSE)
	{
		static $_loaded = 0;
		if( $_loaded == 1 ) return;
		$_loaded = 1;

		$db = cmsms()->GetDb();

		$expr = array();
		$parms = array();
		if( !$inactive ) {
			$expr[] = 'active = ?';
			$parms[] = 1;
		}
		if( $showinmenu ) {
			$expr[] = 'show_in_menu = ?';
			$parms[] = 1;
		}

		$loaded_ids = cms_content_cache::get_loaded_page_ids();
		if( is_array($loaded_ids) && count($loaded_ids) ) {
			$expr[] = 'content_id NOT IN ('.implode(',',$loaded_ids).')';
		}

		$query = 'SELECT * FROM '.cms_db_prefix().'content FORCE INDEX ('.cms_db_prefix().'index_content_by_idhier) WHERE ';
		$query .= implode(' AND ',$expr);
		$dbr = $db->Execute($query,$parms);

		if( $loadprops ) {
		    $child_ids = array();
			while( !$dbr->EOF() ) {
				$child_ids[] = $dbr->fields['content_id'];
				$dbr->MoveNext();
			}
			$dbr->MoveFirst();

			$tmp = null;
			if( count($child_ids) ) {
				// get all the properties for the child_ids
				$query = 'SELECT * FROM '.cms_db_prefix().'content_props WHERE content_id IN ('.implode(',',$child_ids).') ORDER BY content_id';
				$tmp = $db->GetArray($query);
			}

		    // re-organize the tmp data into a hash of arrays of properties for each content id.
		    if( $tmp ) {
				$contentprops = array();
				for( $i = 0; $i < count($tmp); $i++ ) {
					$content_id = $tmp[$i]['content_id'];
					if( in_array($content_id,$child_ids) ) {
						if( !isset($contentprops[$content_id]) ) $contentprops[$content_id] = array();
						$contentprops[$content_id][] = $tmp[$i];
					}
				}
				unset($tmp);
			}
		}

		// build the content objects
		while( !$dbr->EOF() ) {
		    $row = $dbr->fields;
		    $id = $row['content_id'];

		    if (!in_array($row['type'], array_keys($this->ListContentTypes()))) continue;
		    $contentobj = $this->CreateNewContent($row['type']);

		    if ($contentobj) {
				$contentobj->LoadFromData($row, false);
				if( $loadprops && $contentprops && isset($contentprops[$id]) ) {
					// load the properties from local cache.
					$props = $contentprops[$id];
					foreach( $props as $oneprop ) {
						$contentobj->SetPropertyValueNoLoad($oneprop['prop_name'],$oneprop['content']);
					}
				}

				// cache the content objects
				cms_content_cache::add_content($id,$contentobj->Alias(),$contentobj);
			}
			$dbr->MoveNext();
		}
		$dbr->Close();
	}

	/**
	 * Loads additional, active children into a given tree object
	 *
	 * @param int $id The parent of the content objects to load into the tree
	 * @param bool $loadprops If true, load the properties of all loaded content objects
	 * @param bool $all If true, load all content objects, even inactive ones.
	 * @param array   $explicit_ids (optional) array of explicit content ids to load
	 * @author Ted Kulp
	 */
	function LoadChildren($id, $loadprops = false, $all = false, $explicit_ids = array() )
	{
		$gCms = cmsms();
		$db = $gCms->GetDb();

		$contentrows = null;
		if( is_array($explicit_ids) && count($explicit_ids) ) {
			$loaded_ids = cms_content_cache::get_loaded_page_ids();
			if( is_array($loaded_ids) && count($loaded_ids) ) {
				$tmp = array();
				foreach( $explicit_ids as $one ) {
					if( in_array($one,$loaded_ids) ) continue;
					$tmp[] = $one;
				}
				if( count($tmp) == 0 ) return;
				$explicit_ids = $tmp;
			}

			$expr = 'content_id IN ('.implode(',',$explicit_ids).')';
			if( !$all ) $expr .= ' AND active = 1';

			// note, this is mysql specific...
			$query = 'SELECT * FROM '.cms_db_prefix().'content FORCE INDEX ('.cms_db_prefix().'index_content_by_idhier) WHERE '.$expr.' ORDER BY hierarchy';
			$contentrows = $db->GetArray($query);
		}
		else {
			if( !$id ) $id = -1;
			// get the content rows
			$query = "SELECT * FROM ".cms_db_prefix()."content WHERE parent_id = ? AND active = 1 ORDER BY hierarchy";
			if( $all ) $query = "SELECT * FROM ".cms_db_prefix()."content WHERE parent_id = ? ORDER BY hierarchy";
			$contentrows = $db->GetArray($query, array($id));
		}

		// get the content ids from the returned data
		$contentprops = null;
		if( $loadprops ) {
		    $child_ids = array();
		    for( $i = 0; $i < count($contentrows); $i++ ) {
				$child_ids[] = $contentrows[$i]['content_id'];
			}

			$tmp = null;
			if( count($child_ids) ) {
				// get all the properties for the child_ids
				$query = 'SELECT * FROM '.cms_db_prefix().'content_props WHERE content_id IN ('.implode(',',$child_ids).') ORDER BY content_id';
				$tmp = $db->GetArray($query);
			}

		    // re-organize the tmp data into a hash of arrays of properties for each content id.
		    if( $tmp ) {
				$contentprops = array();
				for( $i = 0; $i < count($tmp); $i++ ) {
					$content_id = $tmp[$i]['content_id'];
					if( in_array($content_id,$child_ids) ) {
						if( !isset($contentprops[$content_id]) ) $contentprops[$content_id] = array();
						$contentprops[$content_id][] = $tmp[$i];
					}
				}
				unset($tmp);
			}
		}

		// build the content objects
		for( $i = 0; $i < count($contentrows); $i++ ) {
		    $row = $contentrows[$i];
		    $id = $row['content_id'];

		    if (!in_array($row['type'], array_keys($this->ListContentTypes()))) continue;
		    $contentobj = $this->CreateNewContent($row['type']);

		    if ($contentobj) {
				$contentobj->LoadFromData($row, false);
				if( $loadprops && $contentprops && isset($contentprops[$id]) ) {
					// load the properties from local cache.
					$props = $contentprops[$id];
					foreach( $props as $oneprop ) {
						$contentobj->SetPropertyValueNoLoad($oneprop['prop_name'],$oneprop['content']);
					}
				}

				// cache the content objects
				cms_content_cache::add_content($id,$contentobj->Alias(),$contentobj);
				$contentobj = null;
				unset($contentobj);
			}
		}

		unset($contentrows);
		unset($contentprops);
	}

	/**
	 * Sets the default content to the given id
	 *
	 * @param int $id The id to set as default
	 * @author Ted Kulp
	 */
	function SetDefaultContent($id)
	{
		$gCms = cmsms();
		$db = $gCms->GetDb();
		$query = "SELECT content_id FROM ".cms_db_prefix()."content WHERE default_content=1";
		$old_id = $db->GetOne($query);
		if (isset($old_id)) {
			$one = $this->LoadContentFromId($old_id);
			$one->SetDefaultContent(false);
			$one->Save();
		}
		$one = $this->LoadContentFromId($id);
		$one->SetDefaultContent(true);
		$one->Save();
	}


	/**
	 * Returns an array of all content objects in the system, active or not.
	 *
	 * Caution:  it is entirely possible that this method (and other similar methods of loading content) will result in a memory outage
	 * if there are large amounts of content objects AND/OR large amounts of content properties.  Use with caution.
	 *
	 * @param bool $loadprops Not implemented
	 * @return array The array of content objects
	 */
	function &GetAllContent($loadprops=true)
	{
		debug_buffer('get all content...');
		$gCms = cmsms();
		$tree = $gCms->GetHierarchyManager();
		$list = $tree->getFlatList();

		$this->LoadAllContent($loadprops);
		$output = array();
		foreach( $list as &$one ) {
			$tmp = $one->GetContent(false,true,true);
			if( is_object($tmp) ) $output[] = $tmp;
		}

		debug_buffer('end get all content...');
		return $output;
	}


	/**
	 * Create a hierarchical ordered dropdown of all the content objects in the system for use
	 * in the admin and various modules.  If $current or $parent variables are passed, care is taken
	 * to make sure that children which could cause a loop are hidden, in cases of when you're creating
	 * a dropdown for changing a content object's parent.
	 *
	 * @param string $current The currently selected content object.  If none is given, we show all items.
	 * @param string $parent The parent of the currently selected content object. If none is given, we show all items.
	 * @param string $name The html name of the dropdown
	 * @param bool $allowcurrent Overrides the logic if $current and/or $parent are passed. Defaults to false.
	 * @param bool $use_perms If true, checks authorship permissions on pages and only shows those the current
	 *                user has access to.
	 * @param bool $ignore_current Ignores the value of $current totally by not marking any items as invalid.
	 * @param bool $allow_all If true, show all items, even if the content object
	 *                           doesn't have a valid link. Defaults to false.
	 * @param bool $use_name if true use Name() else use MenuText() Defaults to using the system preference.
	 * @return string The html dropdown of the hierarchy
	 */
	function CreateHierarchyDropdown($current = '', $parent = '', $name = 'parent_id', $allowcurrent = 0,
									 $use_perms = 0, $ignore_current = 0, $allow_all = false, $use_name = null)
	{
		static $count = 0;
		$count++;
		$id = 'cms_hierdropdown'.$count;
		$value = $parent;

		$out = "<input type=\"text\" title=\"".lang('title_hierselect')."\" name=\"{$name}\" id=\"{$id}\" class=\"cms_hierdropdown\" value=\"{$value}\" size=\"50\" maxlength=\"50\"/>";
		$opts = array();
		//$opts['value'] = $parent;
		$opts['current'] = $current;
		$opts['parent'] = $parent;
		$opts['allowcurrent'] = ($allowcurrent)?'true':'false';
		$opts['use_perms'] = ($use_perms)?'true':'false';
		$opts['ignore_current'] = ($ignore_current)?'true':'false';
		$opts['allow_all'] = ($allow_all)?'true':'false';
		$opts['use_name'] = ($use_name)?'true':'false';
		$str = '{';
		foreach($opts as $key => $val) {
			if( $val == '' ) continue;
			$str .= $key.': '.$val.',';
		}
		$str = substr($str,0,-1).'}';
		$out .= "<script type=\"text/javascript\">$(function(){ $('#$id').hierselector($str) });</script>";
		return $out;
	}
// 	function CreateHierarchyDropdown($current = '', $parent = '', $name = 'parent_id', $allowcurrent = 0,
// 									 $use_perms = 0, $ignore_current = 0, $allow_all = false, $use_name = null)
// 	{
// 		$result = '';
// 		$userid = -1;

// 		if( is_null($use_name) ) {
// 			$use_name = get_site_preference('listcontent_showtitle',true);
// 		}

// 		$allcontent = $this->GetAllContent(false);
// 		if ($allcontent !== FALSE && count($allcontent) > 0) {
// 			if( $use_perms ) {
// 			    $userid = get_userid();
// 			}
// 			if( ($userid > 0 && check_permission($userid,'Manage All Content')) ||
// 			    $userid == -1 || $parent == -1 ) {
// 			    $result .= '<option value="-1">'.lang('none').'</option>';
// 			}
// 			$curhierarchy = '';

// 			foreach ($allcontent as $one) {
// 				if( !is_object($one) ) continue;
// 				$value = $one->Id();
// 				if ($value == $current) {
// 					// Grab hierarchy just in case we need to check children
// 					// (which will always be after)
// 					$curhierarchy = $one->Hierarchy();

// 					if( !$allowcurrent ) {
// 						// Then jump out.  We don't want ourselves in the list.
// 						continue;
// 					}
// 					$value = -1;
// 			    }

// 				// If it doesn't have a valid link...
// 				// don't include it.
// 				if( !$allow_all && !$one->HasUsableLink() ) {
// 					continue;
// 			    }

// 				// If it's a child of the current, we don't want to show it as it
// 				// could cause a deadlock.
// 				if (!$allowcurrent && $curhierarchy != '' &&
// 					strstr($one->Hierarchy() . '.', $curhierarchy . '.') == $one->Hierarchy() . '.') {
// 					continue;
// 			    }

// 				// If we have a valid userid... only include pages where this user
// 				// has write access... or is an admin user... or has appropriate permission.
// 				if( $userid > 0 && $one->Id() != $parent) {
// 					if( !check_permission($userid,'Manage All Content') && !check_authorship($userid,$one->Id()) ) {
// 						continue;
// 					}
// 			    }

// 				// Don't include content types that do not want children either...
// 				if (!$one->WantsChildren()) continue;
// 			    $result .= '<option value="'.$value.'"';

// 			    // Select current parent if it exists
// 			    if ($one->Id() == $parent) {
// 					$result .= ' selected="selected"';
// 				}
// 			    $txt=$use_name?$one->Name():$one->MenuText();
// 			    if( ($value == -1) && ($ignore_current == 0) ) {
// 					$result .= '>'.$one->Hierarchy().'. - '.$txt.' ('.lang('invalid').')</option>';
// 				}
// 			    else {
// 					$result .= '>'.$one->Hierarchy().'. - '.$txt.'</option>';
// 				}
// 			}
// 		}

// 		if( !empty($result) ) {
// 			$result = '<select name="'.$name.'" id="'.$name.'">'.$result.'</select>';
// 		}

// 		return $result;
// 	}


	/**
	 * Gets the content id of the page marked as default
	 *
	 * @return int The id of the default page. false if not found.
	 */
	function GetDefaultPageID()
	{
		return $this->GetDefaultContent();
	}


	/**
	 * Returns the content id given a valid content alias.
	 *
	 * @param string $alias The alias to query
	 * @return int The resulting id.  null if not found.
	 */
	function GetPageIDFromAlias( $alias )
	{
		$hm = cmsms()->GetHierarchyManager();
		return $hm->sureGetNodeByAlias($alias);
	}


	/**
	 * Returns the content id given a valid hierarchical position.
	 *
	 * @param string $position The position to query
	 * @return int The resulting id.  false if not found.
	 */
	function GetPageIDFromHierarchy($position)
	{
		$gCms = cmsms();
		$db = $gCms->GetDb();

		$query = "SELECT content_id FROM ".cms_db_prefix()."content WHERE hierarchy = ?";
		$row = $db->GetRow($query, array($this->CreateUnfriendlyHierarchyPosition($position)));

		if (!$row) {
			return false;
		}
		return $row['content_id'];
	}


	/**
	 * Returns the content alias given a valid content id.
	 *
	 * @param int $id The content id to query
	 * @return string The resulting content alias.  false if not found.
	 */
	function GetPageAliasFromID( $id )
	{
		$hm = cmsms()->GetHierarchyManager();
		$node = $hm->getNodeById();
		if( $node ) return $node->getTag('alias');
	}


	/**
	 * Checks to see if a content alias is valid and not in use.
	 *
	 * @param string $alias The content alias to check
	 * @param string $content_id The id of the current page, for used alias checks on existing pages
	 * @return string The error, if any.  If there is no error, returns FALSE.
	 */
	function CheckAliasError($alias, $content_id = -1)
	{

		$error = FALSE;
		$tmp = munge_string_to_url($alias,TRUE);
		if( $tmp != $alias ) {
			$error = lang('invalidalias');
		}
		else {
			$params = array($alias);
			$query = "SELECT content_id FROM ".cms_db_prefix()."content WHERE content_alias = ?";
			if ($content_id > -1) {
				$query .= " AND content_id != ?";
				$params[] = $content_id;
			}
			$db = cmsms()->GetDb();
			$row = $db->GetRow($query, $params);

			if ($row) $error = lang('aliasalreadyused');
		}

		return $error;
	}

	/**
	 * Converts a friendly hierarchy (1.1.1) to an unfriendly hierarchy (00001.00001.00001) for
	 * use in the database.
	 *
	 * @param string $position The hierarchy position to convert
	 * @return string The unfriendly version of the hierarchy string
	 */
	function CreateFriendlyHierarchyPosition($position)
	{
		#Change padded numbers back into user-friendly values
		$tmp = '';
		$levels = preg_split('/\./', $position);

		foreach ($levels as $onelevel) {
			$tmp .= ltrim($onelevel, '0') . '.';
		}
		$tmp = rtrim($tmp, '.');
		return $tmp;
	}

	/**
	 * Converts an unfriendly hierarchy (00001.00001.00001) to a friendly hierarchy (1.1.1) for
	 * use in the database.
	 *
	 * @param string $position The hierarchy position to convert
	 * @return string The friendly version of the hierarchy string
	 */
	function CreateUnfriendlyHierarchyPosition($position)
	{
		#Change user-friendly values into padded numbers
		$tmp = '';
		$levels = preg_split('/\./', $position);

		foreach ($levels as $onelevel) {
			$tmp .= str_pad($onelevel, 5, '0', STR_PAD_LEFT) . '.';
		}
		$tmp = rtrim($tmp, '.');
		return $tmp;
	}

	/**
	 * Check if the supplied page id is a parent of the specified base page (or the current page)
	 *
	 * @since 2.0
	 * @author Robert Campbell <calguy1000@hotmail.com>
	 * @param int $test_id Page ID to test
	 * @param int $base_id (optional) Page ID to act as the base page.  The current page is used if not specified.
	 * @return bool
	 */
	public function CheckParentage($test_id,$base_id = null)
	{
		$gCms = cmsms();
		if( !$base_id ) $base_id = $gCms->get_content_id();
		$base_id = (int)$base_id;
		if( $base_id < 1 ) return FALSE;

		$hm = $gCms->GetHierarchyManager();
		$node = $hm->find_by_tag('id',$base_id);
		while( $node ) {
			if( $node->get_tag('id') == $test_id ) return TRUE;
			$node = $node->get_parent();
		}
		return FALSE;
	}

	/**
	 * Grab URLs from the content table and register them with the route manager.
	 *
	 * @since 1.9
	 * @author Robert Campbell <calguy1000@hotmail.com>
	 * @internal
	 * @access private
	 */
	public function register_routes()
	{
		$gCms = cmsms();
 		$db = $gCms->GetDb();

		$query = 'SELECT content_id,page_url FROM '.cms_db_prefix().'content
                   WHERE active = 1 AND default_content = 0 AND page_url != \'\'';
		$data = $db->GetArray($query);
 		if( is_array($data) ) {
 			foreach( $data as $onerow ) {
 				$route = new CmsRoute($onerow['page_url'],$onerow['content_id'],'',TRUE);
				cms_route_manager::register($route);
			}
		}
	}

	/**
	 * Return a list of pages that the user is owner of.
	 *
	 * @since 2.0
	 * @author Robert Campbell <calguy1000@hotmail.com>
	 * @param int $userid The userid
	 * @return array Array of integer page id's
	 */
	public function GetOwnedPages($userid)
	{
		if( !is_array($this->_ownedpages) ) {
			$this->_ownedpages = array();

			$db = cmsms()->GetDb();
			$query = 'SELECT content_id FROM '.cms_db_prefix().'content WHERE owner_id = ? ORDER BY hierarchy';
			$tmp = $db->GetCol($query,array($userid));
			$data = array();
			for( $i = 0; $i < count($tmp); $i++ ) {
				if( $tmp[$i] > 0 ) $data[] = $tmp[$i];
			}

			if( count($data) ) $this->_ownedpages = $data;
		}
		return $this->_ownedpages;
	}

	/**
	 * Test if the user specified owns the specified page
	 *
	 * @param int $userid
	 * @param int $pageid
	 * @return bool
	 */
	public function CheckPageOwnership($userid,$pageid)
	{
		$pagelist = $this->GetOwnedPages($userid);
		return in_array($pageid,$pagelist);
	}

	/**
	 * Return a list of pages that the user has edit access to.
	 *
	 * @since 2.0
	 * @author Robert Campbell <calguy1000@hotmail.com>
	 * @param int $userid The userid
	 * @return array Array of page id's
	 */
	public function GetPageAccessForUser($userid)
	{
		if( !is_array($this->_authorpages) ) {
			$this->_authorpages = array();
			$data = $this->GetOwnedPages($userid);

			// Get all of the pages this user has access to.
			$groups = UserOperations::get_instance()->GetMemberGroups($userid);
			$list = array($userid);
			if( is_array($groups) && count($groups) ) {
				foreach( $groups as $group ) {
					$list[] = $group * -1;
				}
			}

			$db = cmsms()->GetDb();
			$query = "SELECT A.content_id FROM ".cms_db_prefix()."additional_users A
                      LEFT JOIN ".cms_db_prefix().'content B ON A.content_id = B.content_id
                      WHERE A.user_id IN ('.implode(',',$list).')
                      ORDER BY B.hierarchy';
			$tmp = $db->GetCol($query);
			for( $i = 0; $i < count($tmp); $i++ ) {
				if( $tmp[$i] > 0 && !in_array($tmp[$i],$data) ) $data[] = $tmp[$i];
			}

			if( count($data) ) asort($data);
			$this->_authorpages = $data;
		}
		return $this->_authorpages;
	}

	/**
	 * Check if the specified user has the ability to edit the specified page id
	 *
	 * @param int $userid
	 * @param int $contentid
	 * @return bool
	 */
	public function CheckPageAuthorship($userid,$contentid)
	{
		$author_pages = $this->GetPageAccessForUser($userid);
		return in_array($contentid,$author_pages);
	}

	/**
	 * Test if the specified user account has edit access to all of the peers of the specified page id
	 *
	 * @param int $userid
	 * @param int $contentid
	 * @return bool
	 */
	public function CheckPeerAuthorship($userid,$contentid)
	{
		if( check_permission($userid,'Manage All Content') ) return TRUE;

		$access = $this->GetPageAccessForUser($userid);
		if( !is_array($access) || count($access) == 0 ) return FALSE;

		$node = $this->quickfind_node_by_id($contentid);
		if( !$node ) return FALSE;
		$parent = $node->get_parent();
		if( !$parent ) return FALSE;

		$peers = $parent->get_children();
		if( is_array($peers) && count($peers) ) {
			for( $i = 0; $i < count($peers); $i++ ) {
				if( !in_array($peers[$i]->get_tag('id'),$access) ) return FALSE;
			}
		}
		return TRUE;
	}

	/**
	 * A convenience function to find a hierarchy node given the page id
	 *
	 * @param int $id The page id
	 * @return cms_content_tree
	 */
	public function quickfind_node_by_id($id)
	{
		if( !is_array($this->_quickfind) ) {
			$hm = cmsms()->GetHierarchyManager();
			$tmp = $hm->getFlatList();
			$this->_quickfind = array();
			if( is_array($tmp) && count($tmp) ) $this->_quickfind = $tmp;
		}

		if( isset($this->_quickfind[$id]) ) return $this->_quickfind[$id];
	}
}

/**
 * A simple alias for the ContentOperations class
 * @package CMS
 * @ignore
 */
class ContentManager extends ContentOperations
{
}

?>
