<?php
#(c)2004 by Ted Kulp (wishy@users.sf.net)
#This project's homepage is: http://cmsmadesimple.sf.net
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
 * Global class for easy access to all important variables.
 *
 * @package CMS
 */

/**
 * Simple global object to hold references to other objects
 *
 * Global object that holds references to various data sctructures
 * needed by classes/functions in CMS.  Initialized in include.php
 * as $gCms for use in every page.
 *
 * @since 0.5
 */
class CmsApplication extends CmsObject
{
	/**
	 * Config object - hash containing variables from config.php
	 */
	var $config;

	/**
	 * Database object - adodb reference to the current database
	 */
	var $db;

	/**
	 * Variables object - various objects and strings needing to be passed 
	 */
	var $variables;

	/**
	 * Modules object - holds references to all registered modules
	 */
	var $cmsmodules;

	/**
	 * System Modules - a list (hardcoded) of all system modules
	 */
	var $cmssystemmodules;

	/**
	 * Plugins object - holds list of all registered plugins 
	 */
	var $cmsplugins;

	/**
	 * User Plugins object - holds list and function pointers of all registered user plugins
	 */
	var $userplugins;

	/**
	 * BBCode object - for use in bbcode parsing
	 */
	var $bbcodeparser;

	/**
	 * Site Preferences object - holds all current site preferences so they're only loaded once
	 */
	public static $siteprefs;

	/**
	 * User Preferences object - holds user preferences as they're loaded so they're only loaded once
	 */
	var $userprefs;

	/**
	 * Smarty object - holds reference to the current smarty object -- will not be set in the admin
	 */
	var $smarty;

	/**
	 * Internal error array - So functions/modules can store up debug info and spit it all out at once
	 */
	var $errors;

	/**
     * nls array - This holds all of the nls information for different languages
	 */
	var $nls;

	/**
     * template cache array - If something's called LoadTemplateByID, we keep a copy around
	 */
	var $TemplateCache;

	/**
     * template cache array - If something's called LoadTemplateByID, we keep a copy around
	 */
	var $StylesheetCache;

	/**
     * html blob cache array - If something's called LoadHtmlBlobByID, we keep a copy around
	 */
	var $HtmlBlobCache;
	
	static private $instance = NULL;

	/**
	 * Constructor
	 */
	function __construct()
	{
		$this->cmssystemmodules = 
		  array( 'FileManager','nuSOAP', 'MenuManager', 'ModuleManager', 'Search', 'CMSMailer', 'News', 'MicroTiny', 'SimplePrinting', 'ThemeManager' );
		$this->modules = array();
		$this->errors = array();
		$this->nls = array();
		$this->TemplateCache = array();
		$this->StylesheetCache = array();
		$this->variables['content-type'] = 'text/html';
		$this->variables['modulenum'] = 1;
		$this->variables['routes'] = array();
		
		#Setup hash for storing all modules and plugins
		$this->cmsmodules          = array();
		$this->userplugins         = array();
		$this->userpluginfunctions = array();
		$this->cmsplugins          = array();
		$this->siteprefs           = array();
		
		$this->config              = CmsConfig::get_instance();
		
		register_shutdown_function(array(&$this, 'dbshutdown'));
	}
	
	/**
	 * Returns an instnace of the CmsApplication singleton.  Most 
	 * people can generally use cmsms() instead of this, but they 
	 * both do the same thing.
	 *
	 * @return CmsApplication The singleton CmsApplication instance
	 * @author Ted Kulp
	 **/
	static public function get_instance()
	{
		if (self::$instance == NULL)
		{
			self::$instance = new CmsApplication();
		}
		return self::$instance;
	}

	function & GetDb()
	{
		return CmsDatabase::get_instance();
	}

	function & GetConfig()
	{
        return CmsConfig::get_instance();
	}
	
	function & GetModuleLoader()
	{
        if (!isset($this->moduleloader))
		{
			require_once(cms_join_path(dirname(__FILE__), 'class.moduleloader.inc.php'));
			$moduleloader = new ModuleLoader();
			$this->moduleloader = &$moduleloader;
		}

		return $this->moduleloader;
	}
	
	function & GetModuleOperations()
	{
        if (!isset($this->moduleoperations))
		{
			require_once(cms_join_path(dirname(__FILE__), 'class.moduleoperations.inc.php'));
			$moduleoperations = new ModuleOperations();
			$this->moduleoperations = &$moduleoperations;
		}

		return $this->moduleoperations;
	}
	
	function & GetUserOperations()
	{
        if (!isset($this->useroperations))
		{
			require_once(cms_join_path(dirname(__FILE__), 'class.useroperations.inc.php'));
			$useroperations = new UserOperations();
			$this->useroperations = &$useroperations;
		}

		return $this->useroperations;
	}
	
	function & GetContentOperations()
	{
        if (!isset($this->contentoperations))
		{
			debug_buffer('', 'Load Content Operations');
			//require_once(cms_join_path(dirname(__FILE__), 'class.contentoperations.inc.php'));
			$contentoperations = new CmsContentOperations();
			$this->contentoperations = &$contentoperations;
			debug_buffer('', 'End Load Content Operations');
		}

		return $this->contentoperations;
	}
	
	function & GetBookmarkOperations()
	{
        if (!isset($this->bookmarkoperations))
		{
			require_once(cms_join_path(dirname(__FILE__), 'class.bookmarkoperations.inc.php'));
			$bookmarkoperations = new BookmarkOperations();
			$this->bookmarkoperations = &$bookmarkoperations;
		}

		return $this->bookmarkoperations;
	}
	
	function & GetTemplateOperations()
	{
        if (!isset($this->templateoperations))
		{
			require_once(cms_join_path(dirname(__FILE__), 'class.templateoperations.inc.php'));
			$templateoperations = new TemplateOperations();
			$this->templateoperations = &$templateoperations;
		}

		return $this->templateoperations;
	}
	
	function & GetStylesheetOperations()
	{
        if (!isset($this->stylesheetoperations))
		{
			require_once(cms_join_path(dirname(__FILE__), 'class.stylesheetoperations.inc.php'));
			$stylesheetoperations = new StylesheetOperations();
			$this->stylesheetoperations = &$stylesheetoperations;
		}

		return $this->stylesheetoperations;
	}
	
	function & GetGroupOperations()
	{
        if (!isset($this->groupoperations))
		{
			require_once(cms_join_path(dirname(__FILE__), 'class.groupoperations.inc.php'));
			$groupoperations = new GroupOperations();
			$this->groupoperations = &$groupoperations;
		}

		return $this->groupoperations;
	}
	
	function & GetGlobalContentOperations()
	{
        if (!isset($this->globalcontentoperations))
		{
			require_once(cms_join_path(dirname(__FILE__), 'class.globalcontentoperations.inc.php'));
			$globalcontentoperations = new GlobalContentOperations();
			$this->globalcontentoperations = &$globalcontentoperations;
		}

		return $this->globalcontentoperations;
	}
	
	function & GetUserTagOperations()
	{
        if (!isset($this->usertagoperations))
		{
			require_once(cms_join_path(dirname(__FILE__), 'class.usertagoperations.inc.php'));
			$usertagoperations = new UserTagOperations();
			$this->usertagoperations = &$usertagoperations;
		}

		return $this->usertagoperations;
	}
	
	function & GetPageInfoOperations()
	{
        if (!isset($this->pageinfooperations))
		{
			require_once(cms_join_path(dirname(__FILE__), 'class.pageinfo.inc.php'));
			$pageinfooperations = new PageInfoOperations();
			$this->pageinfooperations = &$pageinfooperations;
		}

		return $this->pageinfooperations;
	}

	public static function GetSmarty()
	{
		//Check to see if it hasn't been
		//instantiated yet.  If not, connect
		//and return it
		/*
		$gCms = CmsApplication::get_instance();
		
		if (!isset($gCms->smarty))
		{
			$conf = cms_config();

			if (!defined('SMARTY_DIR'))
			{
				define('SMARTY_DIR', cms_join_path(ROOT_DIR, 'lib', 'smarty') . DIRECTORY_SEPARATOR);
			}

			#Setup global smarty object
			$gCms->smarty = new CmsSmarty($conf);
		}

		return $gCms->smarty;
		*/
		return CmsSmarty::get_instance();
	}

	public static function GetHierarchyManager()
	{
		//Check to see if it hasn't been
		//instantiated yet.  If not, connect
		//and return it
		/*
        if (!isset($this->hrinstance))
		{
			debug_buffer('', 'Start Loading Hierarchy Manager');
			#require_once(dirname(__FILE__).'/class.contenthierarchymanager.inc.php');

			#Setup global smarty object
			$contentops =& $this->GetContentOperations();
			$this->hrinstance =& $contentops->GetAllContentAsHierarchy(false, array());
			debug_buffer('', 'End Loading Hierarchy Manager');
		}

        return $this->hrinstance;
		*/
		return CmsPageTree::get_instance();
	}
	
	/**
	 * Loads a cache of site preferences so we only have to do it once.
	 *
	 * @since 0.6
	 */
	public static function load_site_preferences()
	{
		$db = cms_db();
		
		$result = array();
		
		if ($db->IsConnected())
		{
			$query = "SELECT sitepref_name, sitepref_value from {siteprefs}";
			$dbresult = $db->Execute($query);

			while ($dbresult && !$dbresult->EOF)
			{
				$result[$dbresult->fields['sitepref_name']] = $dbresult->fields['sitepref_value'];
				$dbresult->MoveNext();
			}

			if ($dbresult) $dbresult->Close();
		}

		return $result;
	}
	
	/**
	 * Gets the given site prefernce
	 *
	 * @since 0.6
	 */
	public static function get_preference($prefname, $defaultvalue = '')
	{
		$value = $defaultvalue;

		if (count(self::$siteprefs) == 0)
		{
			self::$siteprefs = CmsCache::get_instance()->call('CmsApplication::load_site_preferences');
		}

		if (isset(self::$siteprefs[$prefname]))
		{
			$value = self::$siteprefs[$prefname];
		}

		return $value;
	}

	/**
	 * Removes the given site preference
	 *
	 * @param string Preference name to remove
	 */
	public static function remove_preference($prefname)
	{
		$db = cms_db();

		$query = "DELETE from ".cms_db_prefix()."siteprefs WHERE sitepref_name = ?";
		$result = $db->Execute($query, array($prefname));

		if (isset(self::$siteprefs[$prefname]))
		{
			unset(self::$siteprefs[$prefname]);
		}

		if ($result) $result->Close();
		CmsCache::clear();
	}

	/**
	 * Sets the given site perference with the given value.
	 *
	 * @since 0.6
	 */
	public static function set_preference($prefname, $value)
	{
		$doinsert = true;

		$db = cms_db();

		$query = "SELECT sitepref_value from ".cms_db_prefix()."siteprefs WHERE sitepref_name = ".$db->qstr($prefname);
		$result = $db->Execute($query);

		if ($result && $result->RecordCount() > 0)
		{
			$doinsert = false;
		}

		if ($result) $result->Close();

		if ($doinsert)
		{
			$query = "INSERT INTO ".cms_db_prefix()."siteprefs (sitepref_name, sitepref_value) VALUES (".$db->qstr($prefname).", ".$db->qstr($value).")";
			$db->Execute($query);
		}
		else
		{
			$query = "UPDATE ".cms_db_prefix()."siteprefs SET sitepref_value = ".$db->qstr($value)." WHERE sitepref_name = ".$db->qstr($prefname);
			$db->Execute($query);
		}
		self::$siteprefs[$prefname] = $value;
		CmsCache::clear();
	}
	
	public static function is_sitedown()
	{
		if (self::get_preference('enablesitedownmessage', '0') !== '1')
			return FALSE;
		
		$excludes = self::get_preference('sitedownexcludes','');
		
		if (!isset($_SERVER['REMOTE_ADDR']))
			return TRUE;
		
		if (empty($excludes))
			return TRUE;

		$ret = cms_ipmatches($_SERVER['REMOTE_ADDR'], $excludes);
		
		if ($ret)
			return FALSE;
		
		return TRUE;
	}

	function dbshutdown()
	{
		CmsDatabase::close();
	}
}

# vim:ts=4 sw=4 noet
?>
