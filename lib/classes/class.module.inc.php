<?php
# CMS - CMS Made Simple
# (c)2004-6 by Ted Kulp (ted@cmsmadesimple.org)
# This project's homepage is: http://cmsmadesimple.org
#
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# BUT withOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.	See the
# GNU General Public License for more details.
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA	02111-1307	USA
#
#$Id: class.module.inc.php 5921 2009-08-20 16:05:12Z calguy1000 $

/**
 * Base module class.
 *
 * All modules should inherit and extend this class with their functionality.
 *
 * @since		0.9
 * @package		CMS
 */
class CMSModule
{
	/**
	 * ------------------------------------------------------------------
	 * Initialization Functions and parameters
	 * ------------------------------------------------------------------
	 */
	var $cms;
	var $config;
	var $curlang;
	var $langhash;
	var $params;
	var $wysiwygactive;
	var $syntaxactive;
	var $error;
	var $modinstall;
	var $modtemplates;
	var $modlang;
	var $modform;
	var $modredirect;
	var $modmisc;
	var $param_map;
	var $restrict_unknown_params;
	var $smarty;

	function CMSModule()
	{
		global $gCms;
		
		$this->cms =& $gCms;
		$this->config =& $gCms->GetConfig();

		global $CMS_ADMIN_PAGE;
		global $CMS_MODULE_PAGE;
		if (isset($CMS_ADMIN_PAGE))
		{
			$this->curlang = '';
		}
		else
		{
		  $this->curlang = get_site_preference('frontendlang','');
		  if (isset($config['locale']) && $config['locale'] != '') {
		      $this->curlang = $config['locale'];
		    }
		  if( $this->curlang == '' ) {
		    $this->curlang = 'en_US';
		  }
		}
		$this->langhash = array();
		$this->params = array();
		$this->param_map = array();
		$this->restrict_unknown_params = false;
		$this->wysiwygactive = false;
		$this->error = '';
		
		$this->params[] = array(
					'name' => 'lang',
					'default' => 'en_US',
					'help' => lang('langparam'),
					'optional' => true);

		#$smarty = new CMSModuleSmarty($config, $this->GetName());
		$this->smarty = &$gCms->GetSmarty();

		if( !isset($CMS_ADMIN_PAGE) || isset($CMS_MODULE_PAGE) )
		  {
		    $this->SetParameterType('assign',CLEAN_STRING);
		    $this->SetParameterType('module',CLEAN_STRING);
		    $this->SetParameterType('lang',CLEAN_STRING);
		    $this->SetParameterType('returnid',CLEAN_INT);
		    $this->SetParameterType('action',CLEAN_STRING);
		    $this->SetParameterType('showtemplate',CLEAN_STRING);
		    $this->SetParameterType('inline',CLEAN_INT);
		    $this->SetParameters();
		  }
		
		$this->modinstall = false;
		$this->modtemplates = false;
		$this->modlang = false;
		$this->modform = false;
		$this->modredirect = false;
		$this->modmisc = false;
	}
	
	function LoadTemplateMethods()
	{
		if (!$this->modtemplates)
		{
			require_once(cms_join_path(dirname(__FILE__), 'module_support', 'modtemplates.inc.php'));
			$this->modtemplates = true;
		}
	}
	
	function LoadLangMethods()
	{
		if (!$this->modlang)
		{
			require_once(cms_join_path(dirname(__FILE__), 'module_support', 'modlang.inc.php'));
			$this->modlang = true;
		}
	}
	
	function LoadFormMethods()
	{
		if (!$this->modform)
		{
			require_once(cms_join_path(dirname(__FILE__), 'module_support', 'modform.inc.php'));
			$this->modform = true;
		}
	}
	
	function LoadRedirectMethods()
	{
		if (!$this->modredirect)
		{
			require_once(cms_join_path(dirname(__FILE__), 'module_support', 'modredirect.inc.php'));
			$this->modredirect = true;
		}
	}
	
	function LoadMiscMethods()
	{
		if (!$this->modmisc)
		{
			require_once(cms_join_path(dirname(__FILE__), 'module_support', 'modmisc.inc.php'));
			$this->modmisc = true;
		}
	}

	/**
	 * ------------------------------------------------------------------
	 * Plugin Functions.
	 * ------------------------------------------------------------------
	 */

	/**
	 * Callback function for module plugins
	 * this function should not be overridden
	 */
	function function_plugin($params,&$smarty)
	{
	  $params['module'] = $this->GetName();
	  return cms_module_plugin($params,$smarty);
	}

	/**
	 * Register a plugin to smarty with the
	 * name of the module.  This method should be called
	 * from the module constructor, or from the SetParameters
	 * method.
	 */
	function RegisterModulePlugin()
	{
	  global $gCms;

	  $smarty =& $gCms->GetSmarty();
	  $smarty->register_function($this->GetName(),
				   array($this,'function_plugin'));
	}

	/**
	 * ------------------------------------------------------------------
	 * Basic Functions.	 Name and Version MUST be overridden.
	 * ------------------------------------------------------------------
	 */

	/**
	 * Returns a sufficient about page for a module
	 */
	function GetAbout()
	{
		$this->LoadMiscMethods();
		return cms_module_GetAbout($this);
	}

	/**
	 * Returns a sufficient help page for a module
	 * this function should not be overridden
	 */
	function GetHelpPage()
	{
		$this->LoadMiscMethods();
		return cms_module_GetHelpPage($this);
	}

	/**
	 * Returns the name of the module
	 */
	function GetName()
	{
		return 'unset';
	}

	/**
	 * Returns the full path of the module directory.
	 */
	function GetModulePath()
	{
		if (is_subclass_of($this, 'CMSModule'))
		{
			return cms_join_path($this->config['root_path'], 'modules' , $this->GetName());
		}
		else
		{
			return dirname(__FILE__);
		}
	}

	/**
	 * Returns a translatable name of the module.  For modulues who's names can
	 * probably be translated into another language (like News)
	 */
	function GetFriendlyName()
	{
		return $this->GetName();
	}

	/**
	 * Returns the version of the module
	 */
	function GetVersion()
	{
		return '0.0.0.1';
	}

	/**
	 * Returns the minimum version necessary to run this version of the module.
	 */
	function MinimumCMSVersion()
	{
		global $CMS_VERSION;
		return $CMS_VERSION;
	}

	/**
	 * Returns the maximum version necessary to run this version of the module.
	 */
	function MaximumCMSVersion()
	{
		global $CMS_VERSION;
		return $CMS_VERSION;
	}

	/**
	 * Returns the help for the module
	 *
	 * @param string Optional language that the admin is using.	 If that language
	 * is not defined, use en_US.
	 */
	function GetHelp($lang = 'en_US')
	{
		return '';
	}

	/**
	 * Returns XHTML that nees to go between the <head> tags
	 */
	function GetHeaderHTML()
	{
	  return '';
	}

	/**
	 * Use this method to prevent the admin interface from outputting header, footer,
	 * theme, etc, so your module can output files directly to the administrator.
	 * Do this by returning true.
	 *
	 */
	function SuppressAdminOutput(&$request)
	{
		return false;
	}

	/**
	 * Register a route to use for pretty url parsing
	 *
	 * @param string Route to register
	 * @param array Defaults for parameters that might not be included in the url
	 */
	function RegisterRoute($routeregex, $defaults = array())
	{
		global $gCms;
		$route =& new CmsRoute();
		$route->module = $this->GetName();
		$route->defaults = $defaults;
		$route->regex = $routeregex;
		$routes =& $gCms->variables['routes'];
		$routes[] =& $route;
	}

	/**
	 * Returns a list of parameters and their help strings in a hash.  This is generally
	 * used internally.
	 */
	function GetParameters()
	{
	  if( count($this->params) == 1 && $this->params[0]['name'] == 'lang' )
	    {
	      // quick hack to load parameters if they are not already loaded.
	      $this->SetParameters();
	    }
	  return $this->params;
	}

	/**
	 * Setup your parameters here.  It doesn't have to be here, but it makes the
	 * code more legible.
	 */
	function SetParameters()
	{
	}

	function RestrictUnknownParams($flag = true)
	{
	  $this->restrict_unknown_params = $flag;
	}

	function SetParameterType($param, $type)
	{
	  switch($type)
	    {
	    case CLEAN_INT:
	    case CLEAN_FLOAT:
	    case CLEAN_NONE:
	    case CLEAN_STRING:
	      $this->param_map[trim($param)] = $type;
	      break;
	    default:
	      trigger_error('Attempt to set invalid parameter type');
	      break;
	    }
	}

	function CreateParameter($param, $defaultval='', $helpstring='', $optional=true)
	{
		//was: array_unshift(
		array_push($this->params, array(
			'name' => $param,
			'default' => $defaultval,
			'help' => $helpstring,
			'optional' => $optional
		));
	}

	/**
	 * Returns a short description of the module
	 *
	 * @param string Optional language that the admin is using.	 If that language
	 * is not defined, use en_US.
	 */
	function GetDescription($lang = 'en_US')
	{
		return '';
	}

	/**
	 * Returns a description of what the admin link does.
	 *
	 * @param string Optional language that the admin is using.	 If that language
	 * is not defined, use en_US.
	 */
	function GetAdminDescription($lang = 'en_US')
	{
		return '';
	}

	/**
	 * Returns whether this module should only be loaded from the admin
	 */
	function IsAdminOnly()
	{
		return false;
	}

	/**
	 * Returns the changelog for the module
	 */
	function GetChangeLog()
	{
		return '';
	}

	/**
	 * Returns the name of the author
	 */
	function GetAuthor()
	{
		return '';
	}

	/**
	 * Returns the email address of the author
	 */
	function GetAuthorEmail()
	{
		return '';
	}

	/**
	 * ------------------------------------------------------------------
	 * Reference functions
	 * ------------------------------------------------------------------
	 */

	/**
	 * Returns the cms->config object as a reference
	 */
	function & GetConfig()
	{
		global $gCms;
		$config = &$gCms->GetConfig();
		return $config;
	}

	/**
	 * Returns the cms->db object as a reference
	 */
	function & GetDb()
	{
		global $gCms;
		$db = &$gCms->GetDb();
		return $db;
	}

	/**
	 * Returns the cms->variables as a reference
	 */
	function & GetVariables()
	{
		return $this->cms->variables;
	}

	/**
	 * ------------------------------------------------------------------
	 * Content Block Related Functions
	 * ------------------------------------------------------------------
	 */
	
	/**
	 * Does this module support a content block type or more
	 */
	function HasContentBlocks()
	{
	  return FALSE;
	}

	/**
	 * Base function for getting content blocks
	 */
	function GetContentBlockInputBase($blockname,$type,$value = '',$params = array())
	{
	  if( empty($blockname) || empty($type) )
	    {
	      return FALSE;
	    }

	  $id = $blockname.'_'.$type;
	  @ob_start();
	  $tmp = $this->GetContentBlockInput($id,$type,'',$blockname,$value,$params);
	  $tmp = @ob_get_contents();
	  @ob_end_clean();
	  return $tmp;
	}

	/**
	 * Get an input field for a specific content block type
	 */
	function GetContentBlockInput($id,$type,$returnid,$blockName,$value,$params)
	{
	  $filename = dirname(dirname(dirname(__FILE__))) . '/modules/'.$this->GetName().'/contentblock.'.$type.'.php';
	  if( !@is_file($filename) ) return FALSE;

	  global $gCms;
	  $db =& $gCms->GetDb();
	  $config =& $gCms->GetConfig();
	  $smarty =& $gCms->GetSmarty();

	  include($filename);
	}


	/**
	 * ------------------------------------------------------------------
	 * Content Type Related Functions
	 * ------------------------------------------------------------------
	 */

	/**
	 * Does this module support a custom content type?
	 */
	function HasContentType()
	{
		return FALSE;
	}
	
	function RegisterContentType($name, $file, $friendlyname = '')
	{
		global $gCms;
		$contenttypes =& $gCms->contenttypes;
		if (!isset($contenttypes[strtolower($name)]))
		{
			$obj =& new CmsContentTypePlaceholder();
			$obj->type = strtolower($name);
			$obj->filename = $file;
			$obj->loaded = false;
			$obj->friendlyname = ($friendlyname != '' ? $friendlyname : $name);
			$contenttypes[strtolower($name)] =& $obj;
		}
	}

	/**
	 * Return an instance of the new content type
	 */
	function GetContentTypeInstance()
	{
		return FALSE;
	}

	function IsExclusive()
	{
		return FALSE;
	}

	/**
	 * ------------------------------------------------------------------
	 * Installation Related Functions
	 * ------------------------------------------------------------------
	 */

	/**
	 * Function that will get called as module is installed. This function should
	 * do any initialization functions including creating database tables. It
	 * should return a string message if there is a failure. Returning nothing (FALSE)
	 * will allow the install procedure to proceed.
	 */
	function Install()
	{
		$filename = dirname(dirname(dirname(__FILE__))) . '/modules/'.$this->GetName().'/method.install.php';
		if (@is_file($filename))
		{
			{
				global $gCms;
				$db =& $gCms->GetDb();
				$config =& $gCms->GetConfig();
				$smarty =& $gCms->GetSmarty();

				include($filename);
			}
		}
		else
		{
			return FALSE;
		}
	}

	/**
	 * Display a message after a successful installation of the module.
	 */
	function InstallPostMessage()
	{
		return FALSE;
	}

	/**
	 * Function that will get called as module is uninstalled. This function should
	 * remove any database tables that it uses and perform any other cleanup duties.
	 * It should return a string message if there is a failure. Returning nothing
	 * (FALSE) will allow the uninstall procedure to proceed.
	 */
	function Uninstall()
	{
		$filename = dirname(dirname(dirname(__FILE__))) . '/modules/'.$this->GetName().'/method.uninstall.php';
		if (@is_file($filename))
		{
		  global $gCms;
		  $db =& $gCms->GetDb();
		  $config =& $gCms->GetConfig();
		  $smarty =& $gCms->GetSmarty();
		  
		  include($filename);
		}
		else
		{
			return FALSE;
		}
	}

	/**
	 * Display a message and a Yes/No dialog before doing an uninstall.	 Returning noting
	 * (FALSE) will go right to the uninstall.
	 */
	function UninstallPreMessage()
	{
		return FALSE;
	}

	/**
	 * Display a message after a successful uninstall of the module.
	 */
	function UninstallPostMessage()
	{
		return FALSE;
	}

	/**
	 * Function to perform any upgrade procedures. This is mostly used to for
	 * updating databsae tables, but can do other duties as well. It should
	 * return a string message if there is a failure. Returning nothing (FALSE)
	 * will allow the upgrade procedure to proceed. Upgrades should have a path
	 * so that they can be upgraded from more than one version back.  While not
	 * a requirement, it makes life easy for your users.
	 *
	 * @param string The version we are upgrading from
	 * @param string The version we are upgrading to
	 */
	function Upgrade($oldversion, $newversion)
	{
		$filename = dirname(dirname(dirname(__FILE__))) . '/modules/'.$this->GetName().'/method.upgrade.php';
		if (@is_file($filename))
		{
			{
				global $gCms;
				$db =& $gCms->GetDb();
				$config =& $gCms->GetConfig();
				$smarty =& $gCms->GetSmarty();

				include($filename);
			}
		}
	}

	/**
	 * Returns whether or not modules should be autoupgraded while upgrading
	 * CMS versions.  Generally only useful for modules included with the CMS
	 * base install, but there could be a situation down the road where we have
	 * different distributions with different modules included in them.	 Defaults
	 * to TRUE, as there is not many reasons to not allow it.
	 */
	function AllowAutoInstall()
	{
		return TRUE;
	}

	/**
	 * Returns whether or not modules should be autoupgraded while upgrading
	 * CMS versions.  Generally only useful for modules included with the CMS
	 * base install, but there could be a situation down the road where we have
	 * different distributions with different modules included in them.	 Defaults
	 * to TRUE, as there is not many reasons to not allow it.
	 */
	function AllowAutoUpgrade()
	{
		return TRUE;
	}

	/**
	 * Returns a list of dependencies and minimum versions that this module
	 * requires. It should return an hash, eg.
	 * return array('somemodule'=>'1.0', 'othermodule'=>'1.1');
	 */
	function GetDependencies()
	{
		return array();
	}

	/**
	 * Checks to see if currently installed modules depend on this module.	This is
	 * used by the plugins.php page to make sure that a module can't be uninstalled
	 * before any modules depending on it are uninstalled first.
	 */
	function CheckForDependents()
	{
		global $gCms;
		$db =& $gCms->GetDb();

		$result = false;

		$query = "SELECT child_module FROM ".cms_db_prefix()."module_deps WHERE parent_module = ? LIMIT 1";
		$tmp = $db->GetOne($query,array($this->GetName()));
		if( $tmp ) 
		  {
		    $result = true;
		  }

		return $result;
	}


	/**
	 * Creates an xml data package from the module directory.
	 */
	function CreateXMLPackage( &$message, &$filecount )
	{
		global $gCms;
		$modops =& $gCms->GetModuleOperations();
		return $modops->CreateXmlPackage($this, $message, $filecount);
	}


	/**
	 * Return true if there is an admin for the module.	 Returns false by
	 * default.
	 */
	function HasAdmin()
	{
		return false;
	}

	/**
	 * Should we use output buffering in the admin for this module?
	 */
	function HasAdminBuffering()
	{
		return true;
	}

	/**
	 * Returns which admin section this module belongs to.
	 * this is used to place the module in the appropriate admin navigation
	 * section. Valid options are currently:
	 *
	 * content, layout, files, usersgroups, extensions, preferences, admin
	 *
	 */
	function GetAdminSection()
	{
		return 'extensions';
	}

	/**
	 * Returns true or false, depending on whether the user has the
	 * right permissions to see the module in their Admin menus.
	 *
	 * Defaults to true.
	 */
	function VisibleToAdminUser()
	{
	  return true;
	}

	/**
	 * Returns true if the module should be treated as a content module.
	 * Returns false by default.
	 */
	function IsContentModule()
	{
		return false;
	}

	/**
	 * Returns true if the module should be treated as a plugin module (like
	 * {cms_module module='name'}.	Returns false by default.
	 */
	function IsPluginModule()
	{
		return false;
	}

	/**
	 * Returns true if the module acts as a soap server
	 */
	function IsSoapModule()
	{
		return false;
	}

	/**
	 * Returns true if the module may support lazy loading in the front end
	 */
	function SupportsLazyLoading()
	{
	  return false;
	}

	/**
	 * ------------------------------------------------------------------
	 * Login Related Functions
	 * ------------------------------------------------------------------
	 */

	/**
	 * Called after a successful login.	 It sends the user object.
	 *
	 * @param User The user that just logged in
	 */
	function LoginPost(&$user)
	{
	}

	/**
	 * Called after a successful logout.
	 */
	function LogoutPost()
	{
	}

	/**
	 * ------------------------------------------------------------------
	 * User Related Functions
	 * ------------------------------------------------------------------
	 */

	/**
	 * Called before a user is added to the database.  Sends the user object.
	 *
	 * @param User The user that was just created
	 */
	function AddUserPre(&$user)
	{
	}

	/**
	 * Called after a user is added to the database.  Sends the user object.
	 *
	 * @param User The user that was just created
	 */
	function AddUserPost(&$user)
	{
	}

	/**
	 * Called before a user is saved to the database.  Sends the user object.
	 *
	 * @param User The user that was just edited
	 */
	function EditUserPre(&$user)
	{
	}

	/**
	 * Called after a user is saved to the database.  Sends the user object.
	 *
	 * @param User The user that was just edited
	 */
	function EditUserPost(&$user)
	{
	}

	/**
	 * Called before a user is deleted from the database.  Sends the user object.
	 *
	 * @param User The user that was just deleted
	 */
	function DeleteUserPre(&$user)
	{
	}

	/**
	 * Called after a user is deleted from the database.  Sends the user object.
	 *
	 * @param User The user that was just deleted
	 */
	function DeleteUserPost(&$user)
	{
	}

	/**
	 * ------------------------------------------------------------------
	 * Group Related Functions
	 * ------------------------------------------------------------------
	 */

	/**
	 * Called before a group is added to the database.	Sends the group object.
	 *
	 * @param Group The group that was just created
	 */
	function AddGroupPre(&$group)
	{
	}

	/**
	 * Called after a group is added to the database.  Sends the group object.
	 *
	 * @param Group The group that was just created
	 */
	function AddGroupPost(&$group)
	{
	}

	/**
	 * Called before a group is saved to the database.	Sends the group object.
	 *
	 * @param Group The group that was just edited
	 */
	function EditGroupPre(&$group)
	{
	}

	/**
	 * Called after a group is saved to the database.  Sends the group object.
	 *
	 * @param Group The group that was just edited
	 */
	function EditGroupPost(&$group)
	{
	}

	/**
	 * Called before a group is deleted from the database.	Sends the group object.
	 *
	 * @param Group The group that was just deleted
	 */
	function DeleteGroupPre(&$group)
	{
	}

	/**
	 * Called after a group is deleted from the database.  Sends the group object.
	 *
	 * @param Group The group that was just deleted
	 */
	function DeleteGroupPost(&$group)
	{
	}

	/**
	 * ------------------------------------------------------------------
	 * Template Related Functions
	 * ------------------------------------------------------------------
	 */

	/**
	 * Called before a template is added to the database.  Sends the template
	 * object.
	 *
	 * @param Template The template that was just created
	 */
	function AddTemplatePre(&$template)
	{
	}

	/**
	 * Called after a template is added to the database.  Sends the template
	 * object.
	 *
	 * @param Template The template that was just created
	 */
	function AddTemplatePost(&$template)
	{
	}

	/**
	 * Called before a template is saved to the database.  Sends the template
	 * object.
	 *
	 * @param Template The template that was just edited
	 */
	function EditTemplatePre(&$template)
	{
	}

	/**
	 * Called after a template is saved to the database.  Sends the template
	 * object.
	 *
	 * @param Template The template that was just edited
	 */
	function EditTemplatePost(&$template)
	{
	}

	/**
	 * Called before a template is deleted from the database.  Sends the template
	 * object.
	 *
	 * @param Template The template that was just deleted
	 */
	function DeleteTemplatePre(&$template)
	{
	}

	/**
	 * Called after a template is deleted from the database.  Sends the template
	 * object.
	 *
	 * @param Template The template that was just deleted
	 */
	function DeleteTemplatePost(&$template)
	{
	}

	function TemplatePreCompile(&$template)
	{
	}

	function TemplatePostCompile(&$template)
	{
	}

	/**
	 * ------------------------------------------------------------------
	 * General Content Related Functions
	 * ------------------------------------------------------------------
	 */

	function ContentEditPre(&$content)
	{
	}

	function ContentEditPost(&$content)
	{
	}

	function ContentDeletePre(&$content)
	{
	}

	function ContentDeletePost(&$content)
	{
	}

	/**
	 * ------------------------------------------------------------------
	 * Stylesheet Related Functions
	 * ------------------------------------------------------------------
	 */

	/**
	 * Called before a Stylesheet is added to the database.	 Sends the stylesheet
	 * object.
	 *
	 * @param Stylesheet The stylesheet that was just created
	 */
	function AddStylesheetPre(&$stylesheet)
	{
	}

	/**
	 * Called after a stylesheet is added to the database.	Sends the stylesheet
	 * object.
	 *
	 * @param Stylesheet The stylesheet that was just created
	 */
	function AddStylesheetPost(&$stylesheet)
	{
	}

	/**
	 * Called before a stylesheet is saved to the database.	 Sends the stylesheet
	 * object.
	 *
	 * @param stylesheet The stylesheet that was just edited
	 */
	function EditStylesheetPre(&$stylesheet)
	{
	}

	/**
	 * Called after a stylesheet is saved to the database.	Sends the stylesheet
	 * object.
	 *
	 * @param stylesheet The stylesheet that was just edited
	 */
	function EditStylesheetPost(&$stylesheet)
	{
	}

	/**
	 * Called before a stylesheet is deleted from the database.	 Sends the stylesheet
	 * object.
	 *
	 * @param stylesheet The stylesheet that was just deleted
	 */
	function DeleteStylesheetPre(&$stylesheet)
	{
	}

	/**
	 * Called after a stylesheet is deleted from the database.	Sends the stylesheet
	 * object.
	 *
	 * @param stylesheet The stylesheet that was just deleted
	 */
	function DeleteStylesheetPost(&$stylesheet)
	{
	}

	/**
	 * ------------------------------------------------------------------
	 * HTML Blob Related Functions
	 * ------------------------------------------------------------------
	 */

	/**
	 * Called before an HTML blob is added to the database.	 Sends the html blob
	 * object.
	 *
	 * @param HtmlBlob The HTML blob that was just created
	 */
	function AddHtmlBlobPre(&$htmlblob)
	{
	}

	/**
	 * Called after an HTML blob is added to the database.	Sends the html blob
	 * object.
	 *
	 * @param HtmlBlob The HTML blob that was just created
	 */
	function AddHtmlBlobPost(&$htmlblob)
	{
	}

	/**
	 * Called before an HTML blob is saved to the database.	 Sends the html blob
	 * object.
	 *
	 * @param HtmlBlob The HTML blob that was just edited
	 */
	function EditHtmlBlobPre(&$htmlblob)
	{
	}

	/**
	 * Called after an HTML blob is saved to the database.	Sends the html blob
	 * object.
	 *
	 * @param HtmlBlob The HTML blob that was just edited
	 */
	function EditHtmlBlobPost(&$htmlblob)
	{
	}

	/**
	 * Called before an HTML blob is deleted from the database.	 Sends the html
	 * blob object.
	 *
	 * @param HtmlBlob The HTML blob that was just deleted
	 */
	function DeleteHtmlBlobPre(&$htmlblob)
	{
	}

	/**
	 * Called after an HTML blob is deleted from the database.	Sends the html
	 * blob object.
	 *
	 * @param HtmlBlob The HTML blob that was just deleted
	 */
	function DeleteHtmlBlobPost(&$htmlblob)
	{
	}

	function GlobalContentPreCompile(&$gc)
	{
	}

	function GlobalContentPostCompile(&$gc)
	{
	}


	/**
	 * ------------------------------------------------------------------
	 * Content Related Functions
	 * ------------------------------------------------------------------
	 */

	/**
	 * Called with the content of the template before it's sent to smarty
	 * for processing.
	 *
	 * Deprecated:	This isn't called anymore.
	 *
	 * @param string The template text
	 */
	function ContentTemplate(&$template)
	{
	}

	/**
	 * Called with the content of the stylesheet before it is pasted into the
	 * template.
	 *
	 * @param string The stylesheet text
	 */
	function ContentStylesheet(&$stylesheet)
	{
	}

	/**
	 * Called with the title before it is pasted into the template.
	 *
	 * Deprecated:	This isn't called anymore.
	 *
	 * @param string The title text
	 */
	function ContentTitle(&$title)
	{
	}

	/**
	 * Called with the content data before it is pasted into the template.
	 *
	 * Deprecated:	This isn't called anymore.	Use ContentPreCompile.
	 *
	 * @param string The content text
	 */
	function ContentData(&$content)
	{
	}

	/**
	 * Called with the content of the html blob before it is pasted into the
	 * template (but after content is pasted in)
	 *
	 * Deprecated:	This isn't called anymore.	Use GlobalContentPreCompile.
	 *
	 * @param string The html blob text
	 */
	function ContentHtmlBlob(&$htmlblob)
	{
	}

	/**
	 * Called before the pasted together template/content/html blobs/etc are
	 * sent to smarty for processing.
	 *
	 * Deprecated:	Not useful anymore, since it's all handled separately now
	 *
	 * @param string The prerendered text
	 */
	function ContentPreRender(&$content)
	{
	}

	/**
	 * Called before the content is sent off to smarty for processing.	Basically
	 * overlaps with ContentPreRender, but it makes more sense to be named
	 * PreCompile.
	 *
	 * @param string The precompiled text
	 */
	function ContentPreCompile(&$content)
	{
	}

	/**
	 * Called right after smarty is done processing and ready to head off to the
	 * cache.  Does the same as PostRenderNonCached, but with a better name.
	 *
	 * @param string The postcompiled text
	 */
	function ContentPostCompile(&$content)
	{
	}

	/**
	 * This serves no purpose anymore.	Template, content and html blobs are
	 * never pushed together at any point and cached.
	 *
	 * Deprecated
	 *
	 * @param string The postrendered text
	 */
	function ContentPostRenderNonCached(&$content)
	{
	}

	/**
	 * Called after content is sent to smarty for processing and right before
	 * display.	 Cached content will still call this function before display,
	 * but it is called EVERY time a page is requested.
	 *
	 * @param string The postrendered text
	 */
	function ContentPostRender(&$content)
	{
	}

	/**
	 * Called before any smarty "template" (content blocks/content tempaltes/modules)
	 * gets pushed off for compilation.
	 * (new in 0.12)
	 *
	 * @param string The precompiled text
	 */
	function SmartyPreCompile(&$content)
	{
	}

	/**
	 * Called after any smarty "template" (content blocks/content tempaltes/modules)
	 * is done being compiled by smarty, but before caching.
	 * (new in 0.12)
	 *
	 * @param string The precompiled text
	 */
	function SmartyPostCompile(&$content)
	{
	}

  /**
	 * ------------------------------------------------------------------
	 * Module capabilities, a new way of checking what a module can do
	 * ------------------------------------------------------------------
	 */
	
  /**
	 * Returns true if the modules thinks it has the capability specified
	 *
	 * @param an id specifying which capability to check for, could be "wysiwyg" etc.
	 * @param associative array further params to get more detailed info about the capabilities. Should be syncronized with other modules of same type
	 */
  function HasCapability($capability, $params=array())
  {
    return false;
  }
	
	/**
	 * ------------------------------------------------------------------
	 * Syntax Highlighter Related Functions
	 * ------------------------------------------------------------------
	 */

	/**
	 * Returns true if this module should be treated as a Syntax Highlighting module. It
	 * returns false be default.
	 */
	function IsSyntaxHighlighter()
	{
		return false;
	}
	
	/**
	 * Returns true if this SyntaxHighlighter should be considered active, eventhough it's
	 * not the choice of the user. Used for forcing a wysiwyg.
	 * returns false be default.
	 */
	function SyntaxActive()
	{
		return $this->syntaxactive;
	}

	/**
	 * Returns content destined for the <form> tag.	 It's useful if javascript is
	 * needed for the onsubmit of the form.
	 */
	function SyntaxPageForm()
	{
		return '';
	}

	/**
	 * This is a function that would be called before a form is submitted.
	 * Generally, a dropdown box or something similar that would force a submit
	 * of the form via javascript should put this in their onchange line as well
	 * so that the SyntaxHighlighter can do any cleanups before the actual form submission
	 * takes place.
	 */
	 function SyntaxPageFormSubmit()
	 {
		return '';
	 }

	 /**
	  * Returns header code specific to this SyntaxHighlighter
	  *
	  * @param string The html-code of the page before replacing SyntaxHighlighter-stuff
	  */
	  function SyntaxGenerateHeader($htmlresult='')
	  {
		return '';
	  }

	 /**
	  * Returns body code specific to this SyntaxHighlighter
	  */
	  function SyntaxGenerateBody()
	  {
		return '';
	  }

	/**
	 * Returns the textarea specific for this WYSIWYG.
	 *
	 * @param string HTML name of the textarea
	 * @param string the language which the content should be highlighted as
	 * @param int Number of columns wide that the textarea should be
	 * @param int Number of rows long that the textarea should be
	 * @param string Encoding of the content
	 * @param string Content to show in the textarea
	 * @param string Stylesheet for content, if available
	 */
	  function SyntaxTextarea($name='textarea',$syntax='html',$columns='80',$rows='15',$encoding='',$content='',$stylesheet='',$addtext='')
	{
		$this->syntaxactive=true;
		return '<textarea name="'.$name.'" cols="'.$columns.'" rows="'.$rows.'" '.$addtext.' >'.$content.'</textarea>';
	}

	/**
	 * Returns whether or not this module should show in any module lists generated by a WYSIWYG.
	 */
	function ShowInSyntaxList()
	{
		return true;
	}
	
	
	
	/**
	 * ------------------------------------------------------------------
	 * WYSIWYG Related Functions
	 * ------------------------------------------------------------------
	 */

	/**
	 * Returns true if this module should be treated as a WYSIWYG module. It
	 * returns false be default.
	 */
	function IsWYSIWYG()
	{
		return false;
	}

	/**
	 * Returns true if this wysiwyg should be considered active, eventhough it's
	 * not the choice of the user. Used for forcing a wysiwyg.
	 * returns false be default.
	 */
	function WYSIWYGActive()
	{
		return $this->wysiwygactive;
	}

	/**
	 * Returns content destined for the <form> tag.	 It's useful if javascript is
	 * needed for the onsubmit of the form.
	 */
	function WYSIWYGPageForm()
	{
		return '';
	}

	/**
	 * This is a function that would be called before a form is submitted.
	 * Generally, a dropdown box or something similar that would force a submit
	 * of the form via javascript should put this in their onchange line as well
	 * so that the WYSIWYG can do any cleanups before the actual form submission
	 * takes place.
	 */
	 function WYSIWYGPageFormSubmit()
	 {
		return '';
	 }

	 /**
	  * Returns header code specific to this WYSIWYG
	  *
	  * @param string The html-code of the page before replacing WYSIWYG-stuff
	  */
	  function WYSIWYGGenerateHeader($htmlresult='')
	  {
		return '';
	  }

	 /**
	  * Returns body code specific to this WYSIWYG
	  */
	  function WYSIWYGGenerateBody()
	  {
		return '';
	  }

	/**
	 * Returns the textarea specific for this WYSIWYG.
	 *
	 * @param string HTML name of the textarea
	 * @param int Number of columns wide that the textarea should be
	 * @param int Number of rows long that the textarea should be
	 * @param string Encoding of the content
	 * @param string Content to show in the textarea
	 * @param string Stylesheet for content, if available
	 */
	  function WYSIWYGTextarea($name='textarea',$columns='80',$rows='15',$encoding='',$content='',$stylesheet='',$addtext='')
	{
		$this->wysiwygactive=true;
		return '<textarea name="'.$name.'" cols="'.$columns.'" rows="'.$rows.'" '.$addtext.' >'.$content.'</textarea>';
	}

	/**
	 * Returns whether or not this module should show in any module lists generated by a WYSIWYG.
	 */
	function ShowInWYSIWYG()
	{
		return true;
	}

	/**
	 * ------------------------------------------------------------------
	 * Navigation Related Functions
	 * ------------------------------------------------------------------
	 */

	/**
	 * Used for navigation between "pages" of a module.	 Forms and links should
	 * pass an action with them so that the module will know what to do next.
	 * By default, DoAction will be passed 'default' and 'defaultadmin',
	 * depending on where the module was called from.  If being used as a module
	 * or content type, 'default' will be passed.  If the module was selected
	 * from the list on the admin menu, then 'defaultadmin' will be passed.
	 *
	 * @param string Name of the action to perform
	 * @param string The ID of the module
	 * @param string The parameters targeted for this module
	 */
	function DoAction($name, $id, $params, $returnid='')
	{
		if ($name != '')
		{
			$filename = dirname(dirname(dirname(__FILE__))) . '/modules/'.$this->GetName().'/action.' . $name . '.php';
			if (@is_file($filename))
			{
				{
					global $gCms;
					$db =& $gCms->GetDb();
					$config =& $gCms->GetConfig();
					$smarty =& $gCms->GetSmarty();

					include($filename);

				}
			}
		}
	}

	function DoActionBase($name, $id, $params, $returnid='')
	{
	  if( $returnid != '' )
	    {
	      if( !$this->restrict_unknown_params && 
		  get_site_preference('allowparamcheckwarnings',0))
		{
		  trigger_error('WARNING: '.$this->GetName().' is not properly cleaning input params.',E_USER_WARNING);
		}
	      // used to try to avert XSS flaws, this will
	      // clean as many parameters as possible according
	      // to a map specified with the SetParameterType metods.
	      $params = cleanParamHash($this->GetName(),$params,$this->param_map,
				       !$this->restrict_unknown_params);
	    }

	  if (isset($params['lang']))
	    {
	      $this->curlang = $params['lang'];
	      $this->langhash = array();
	    }
	  if( !isset($params['action']) )
	    {
	      $params['action'] = $name;
	    }
	  $params['action'] = cms_htmlentities($params['action']);
	  $returnid = cms_htmlentities($returnid);
	  $id = cms_htmlentities($id);
	  $name = cms_htmlentities($name);
	  $output = $this->DoAction($name, $id, $params, $returnid);

	  if( isset($params['assign']) )
	    {
	      global $gCms;
	      $smarty =& $gCms->GetSmarty();
	      $smarty->assign(cms_htmlentities($params['assign']),$output);
	      return;
	    }
	  return $output;
	}


  /**
	 * Returns the xhtml equivalent of a tooltip help link.
	 *
	 * @param string The help text to be shown on mouse over
	 * @param string The text to be shown as the link, default to a simple question mark
   * @param string Forces another width of the popupbox than the one set in admin css
   * @param string An alternative classname for the a-link of the tooltip
	 */
  
  function CreateTooltip($helptext, $linktext="?", $forcewidth="", $classname="admin-tooltip admin-tooltip-box", $href="")
  {
    $result='<a class="'.$classname.'"';
    if ($href!='') $result.=' href="'.$href.'"';
    $result.='>'.$linktext.'<span';
    if ($forcewidth!="" && is_numeric($forcewidth)) $result.=' style="width:'.$forcewidth.'px"';
    $result.='>'.htmlentities($helptext)."</span></a>\n";
    return $result;
  }

  /**
	 * Returns the xhtml equivalent of a tooltip-enabled href link	 This is basically a nice little wrapper
	 * to make sure that id's are placed in names and also that it's xhtml compliant.
	 *
	 * @param string The id given to the module on execution
	 * @param string The action that this form should do when the link is clicked
	 * @param string The id to eventually return to when the module is finished it's task
	 * @param string The text that will have to be clicked to follow the link
   * @param string The helptext to be shown as tooltip-popup
	 * @param string An array of params that should be inlucded in the URL of the link.	 These should be in a $key=>$value format.
	 */

  function CreateTooltipLink($id, $action, $returnid, $contents, $tooltiptext, $params=array())
  {
    return $this->CreateTooltip($tooltiptext,$contents,"","admin-tooltip",$this->CreateLink($id,$action,$returnid,"admin-tooltip",$params,"",true) );
  }

   /**
	 * Returns the xhtml equivalent of an fieldset and legend.  This is basically a nice little wrapper
	 * to make sure that id's are placed in names and also that it's xhtml compliant.
	 *
	 * @param string The id given to the module on execution (not really used yet, but might be later)
	 * @param string The html name of the textbox (not really used yet, but might be later on)
	 * @param string The legend_text for this fieldset, if applicaple
	 * @param string Any additional text that should be added into the tag when rendered
	 * @param string Any additional text that should be added into the legend tag when rendered
	 */
	function CreateFieldsetStart( $id, $name, $legend_text='', $addtext='', $addtext_legend='' )
	{
		$this->LoadFormMethods();
		return cms_module_CreateFieldsetStart($this, $id, $name, $legend_text, $addtext, $addtext_legend);
	}

	/**
	* Returns the end of the fieldset in a  form.  This is basically just a wrapper around </form>, but
	* could be extended later on down the road.  It's here mainly for consistency.
	*/
	function CreateFieldsetEnd()
	{
		return '</fieldset>'."\n";
	}


	/**
	 * Returns the start of a module form, optimized for frontend use
	 *
	 * @param string The id given to the module on execution
	 * @param string The id to eventually return to when the module is finished it's task
	 * @param string The action that this form should do when the form is submitted
	 * @param string Method to use for the form tag.  Defaults to 'post'
	 * @param string Optional enctype to use, Good for situations where files are being uploaded
	 * @param boolean A flag to determine if actions should be handled inline (no moduleinterface.php -- only works for frontend)
	 * @param string Text to append to the end of the id and name of the form
	 * @param array Extra parameters to pass along when the form is submitted
	 */
	function CreateFrontendFormStart($id,$returnid,$action='default',$method='post',
					 $enctype='',$inline=true,$idsuffix='',$params=array())
	{
	  return $this->CreateFormStart($id,$action,$returnid,$method,$enctype,$inline,$idsuffix,$params);
	}


	/**
	 * Returns the start of a module form
	 *
	 * @param string The id given to the module on execution
	 * @param string The action that this form should do when the form is submitted
	 * @param string The id to eventually return to when the module is finished it's task
	 * @param string Method to use for the form tag.  Defaults to 'post'
	 * @param string Optional enctype to use, Good for situations where files are being uploaded
	 * @param boolean A flag to determine if actions should be handled inline (no moduleinterface.php -- only works for frontend)
	 * @param string Text to append to the end of the id and name of the form
	 * @param array Extra parameters to pass along when the form is submitted
	 * @param string Text to append to the <form>-statement, for instanse for javascript-validation code
	 */
	function CreateFormStart($id, $action='default', $returnid='', $method='post', $enctype='', $inline=false, $idsuffix='', $params = array(), $extra='')
	{
		$this->LoadFormMethods();
		return cms_module_CreateFormStart($this, $id, $action, $returnid, $method, $enctype, $inline, $idsuffix, $params, $extra);
	}

	/**
	 * Returns the end of the a module form.  This is basically just a wrapper around </form>, but
	 * could be extended later on down the road.  It's here mainly for consistency.
	 */
	function CreateFormEnd()
	{
		return '</form>'."\n";
	}

	/**
	 * Returns the xhtml equivalent of an input textbox.  This is basically a nice little wrapper
	 * to make sure that id's are placed in names and also that it's xhtml compliant.
	 *
	 * @param string The id given to the module on execution
	 * @param string The html name of the textbox
	 * @param string The predefined value of the textbox, if any
	 * @param string The number of columns wide the textbox should be displayed
	 * @param string The maximum number of characters that should be allowed to be entered
	 * @param string Any additional text that should be added into the tag when rendered
	 */
	function CreateInputText($id, $name, $value='', $size='10', $maxlength='255', $addttext='')
	{
		$this->LoadFormMethods();
		return cms_module_CreateInputText($this, $id, $name, $value, $size, $maxlength, $addttext);
	}

        /**
         * Returns the xhtml equivalent of an label for input field.  This is basically a nice little wrapper
         * to make sure that id's are placed in names and also that it's xhtml compliant.
         *
         * @param string The id given to the module on execution
         * @param string The html name of the input field this label is associated to
         * @param string The text in the label
         * @param string Any additional text that should be added into the tag when rendered
         */
        function CreateLabelForInput($id, $name, $labeltext='', $addttext='')
        {
	        $this->LoadFormMethods();
	        return cms_module_CreateLabelForInput($this, $id, $name, $labeltext, $addttext);
        }

	/**
	 * Returns the xhtml equivalent of an input textbox with label.  This is basically a nice little wrapper
	 * to make sure that id's are placed in names and also that it's xhtml compliant.
	 *
	 * @param string The id given to the module on execution
	 * @param string The html name of the textbox
	 * @param string The predefined value of the textbox, if any
	 * @param string The number of columns wide the textbox should be displayed
	 * @param string The maximum number of characters that should be allowed to be entered
	 * @param string Any additional text that should be added into the tag when rendered
	 * @param string The text for label 
	 * @param string Any additional text that should be added into the tag when rendered
	 */
	function CreateInputTextWithLabel($id, $name, $value='', $size='10', $maxlength='255', $addttext='', $label='', $labeladdtext='')
	{
		$this->LoadFormMethods();
		return cms_module_CreateInputTextWithLabel($this, $id, $name, $value, $size, $maxlength, $addttext, $label, $labeladdtext);
	}

	/**
	 * Returns the xhtml equivalent of a file-selector field.  This is basically a nice little wrapper
	 * to make sure that id's are placed in names and also that it's xhtml compliant.
	 *
	 * @param string The id given to the module on execution
	 * @param string The html name of the textbox
	 * @param string The MIME-type to be accepted, default is all
	 * @param string The number of columns wide the textbox should be displayed
	 * @param string Any additional text that should be added into the tag when rendered
	 */
	function CreateInputFile($id, $name, $accept='', $size='10',$addttext='')
	{
		$this->LoadFormMethods();
		return cms_module_CreateInputFile($this, $id, $name, $accept, $size, $addttext);
	}

	/**
	 * Returns the xhtml equivalent of an input password-box.  This is basically a nice little wrapper
	 * to make sure that id's are placed in names and also that it's xhtml compliant.
	 *
	 * @param string The id given to the module on execution
	 * @param string The html name of the textbox
	 * @param string The predefined value of the textbox, if any
	 * @param string The number of columns wide the textbox should be displayed
	 * @param string The maximum number of characters that should be allowed to be entered
	 * @param string Any additional text that should be added into the tag when rendered
	 */
	function CreateInputPassword($id, $name, $value='', $size='10', $maxlength='255', $addttext='')
	{
		$this->LoadFormMethods();
		return cms_module_CreateInputPassword($this, $id, $name, $value, $size, $maxlength, $addttext);
	}

	/**
	 * Returns the xhtml equivalent of a hidden field.	This is basically a nice little wrapper
	 * to make sure that id's are placed in names and also that it's xhtml compliant.
	 *
	 * @param string The id given to the module on execution
	 * @param string The html name of the hidden field
	 * @param string The predefined value of the field, if any
	 * @param string Any additional text that should be added into the tag when rendered
	 */
	function CreateInputHidden($id, $name, $value='', $addttext='')
	{
		$this->LoadFormMethods();
		return cms_module_CreateInputHidden($this, $id, $name, $value, $addttext);
	}

	/**
	 * Returns the xhtml equivalent of a checkbox.	This is basically a nice little wrapper
	 * to make sure that id's are placed in names and also that it's xhtml compliant.
	 *
	 * @param string The id given to the module on execution
	 * @param string The html name of the checkbox
	 * @param string The value returned from the input if selected
	 * @param string The current value. If equal to $value the checkbox is selected 
	 * @param string Any additional text that should be added into the tag when rendered
	 */
	function CreateInputCheckbox($id, $name, $value='', $selectedvalue='', $addttext='')
	{
		$this->LoadFormMethods();
		return cms_module_CreateInputCheckbox($this, $id, $name, $value, $selectedvalue, $addttext);
	}


	/**
	 * Returns the xhtml equivalent of a submit button.	 This is basically a nice little wrapper
	 * to make sure that id's are placed in names and also that it's xhtml compliant.
	 *
	 * @param string The id given to the module on execution
	 * @param string The html name of the button
	 * @param string The predefined value of the button, if any
	 * @param string Any additional text that should be added into the tag when rendered
	 * @param string Use an image instead of a regular button
	 */
	function CreateInputSubmit($id, $name, $value='', $addttext='', $image='', $confirmtext='')
	{
		$this->LoadFormMethods();
		return cms_module_CreateInputSubmit($this, $id, $name, $value, $addttext, $image, $confirmtext);
	}

	/**
	 * Returns the xhtml equivalent of a reset button.	This is basically a nice little wrapper
	 * to make sure that id's are placed in names and also that it's xhtml compliant.
	 *
	 * @param string The id given to the module on execution
	 * @param string The html name of the button
	 * @param string The predefined value of the button, if any
	 * @param string Any additional text that should be added into the tag when rendered
	 */
	function CreateInputReset($id, $name, $value='Reset', $addttext='')
	{
		$this->LoadFormMethods();
		return cms_module_CreateInputReset($this, $id, $name, $value, $addttext);
	 }

	/**
	 * Returns the xhtml equivalent of a file upload input.	 This is basically a nice little wrapper
	 * to make sure that id's are placed in names and also that it's xhtml compliant.
	 *
	 * @param string The id given to the module on execution
	 * @param string The html name of the input
	 * @param string Any additional text that should be added into the tag when rendered
	 */
	function CreateFileUploadInput($id, $name, $addttext='',$size='10', $maxlength='255')
	{
		$this->LoadFormMethods();
		return cms_module_CreateFileUploadInput($this, $id, $name, $addttext, $size, $maxlength);
	}


	/**
	 * Returns the xhtml equivalent of a dropdown list.	 This is basically a nice little wrapper
	 * to make sure that id's are placed in names and also that it is xhtml compliant.
	 *
	 * @param string The id given to the module on execution
	 * @param string The html name of the dropdown list
	 * @param string An array of items to put into the dropdown list... they should be $key=>$value pairs
	 * @param string The default selected index of the dropdown list.  Setting to -1 will result in the first choice being selected
	 * @param string The default selected value of the dropdown list.  Setting to '' will result in the first choice being selected
	 * @param string Any additional text that should be added into the tag when rendered
	 */
	function CreateInputDropdown($id, $name, $items, $selectedindex=-1, $selectedvalue='', $addttext='')
	{
		$this->LoadFormMethods();
		return cms_module_CreateInputDropdown($this, $id, $name, $items, $selectedindex, $selectedvalue, $addttext);
	}

	/**
	 * Returns the xhtml equivalent of a multi-select list.	 This is basically a nice little wrapper
	 * to make sure that id's are placed in names and also that it is xhtml compliant.
	 *
	 * @param string The id given to the module on execution
	 * @param string The html name of the select list
	 * @param string An array of items to put into the list... they should be $key=>$value pairs
	 * @param string An array of items in the list that should default to selected.
	 * @param string The number of rows to be visible in the list (before scrolling).
	 * @param string Any additional text that should be added into the tag when rendered
	 * @param boolean indicates wether multiple selections are allowed (defaults to true)
	 */
	function CreateInputSelectList($id, $name, $items, $selecteditems=array(), $size=3, $addttext='', $multiple = true)
	{
		$this->LoadFormMethods();
		return cms_module_CreateInputSelectList($this, $id, $name, $items, $selecteditems, $size, $addttext, $multiple);
	}

	/**
	 * Returns the xhtml equivalent of a set of radio buttons.	This is basically a nice little wrapper
	 * to make sure that id's are placed in names and also that it is xhtml compliant.
	 *
	 * @param string The id given to the module on execution
	 * @param string The html name of the radio group
	 * @param string An array of items to create as radio buttons... they should be $key=>$value pairs
	 * @param string The default selected index of the radio group.	 Setting to -1 will result in the first choice being selected
	 * @param string Any additional text that should be added into the tag when rendered
	 * @param string A delimiter to throw between each radio button, e.g., a <br /> tag or something for formatting
	 */
	function CreateInputRadioGroup($id, $name, $items, $selectedvalue='', $addttext='', $delimiter='')
	{
		$this->LoadFormMethods();
		return cms_module_CreateInputRadioGroup($this, $id, $name, $items, $selectedvalue, $addttext, $delimiter);
	}

	/**
	 * Returns the xhtml equivalent of a textarea.	Also takes WYSIWYG preference into consideration if it's called from the admin side.
	 *
	 * @param bool Should we try to create a WYSIWYG for this textarea?
	 * @param string The id given to the module on execution
	 * @param string The text to display in the textarea's content
	 * @param string The html name of the textarea
	 * @param string The CSS class to associate this textarea to
	 * @param string The html id to give to this textarea
	 * @param string The encoding to use for the content
	 * @param string The text of the stylesheet associated to this content.	 Only used for certain WYSIWYGs
	 * @param string The number of characters wide (columns) the resulting textarea should be
	 * @param string The number of characters high (rows) the resulting textarea should be
	 * @param string The wysiwyg-system to be forced even if the user has chosen another one
	 * @param string The language the content should be syntaxhightlighted as
	 */
	function CreateTextArea($enablewysiwyg, $id, $text, $name, $classname='', $htmlid='', $encoding='', $stylesheet='', $cols='80', $rows='15',$forcewysiwyg='',$wantedsyntax='',$addtext='')
	{
	  return create_textarea($enablewysiwyg, $text, $id.$name, $classname, $htmlid, $encoding, $stylesheet, $cols, $rows,$forcewysiwyg,$wantedsyntax,$addtext);
	}


	/**
	 * Returns the xhtml equivalent of a textarea.	Also takes Syntax hilighter preference 
         * into consideration if it's called from the admin side.
	 *
	 * @param string The id given to the module on execution
	 * @param string The text to display in the textarea's content
	 * @param string The html name of the textarea
	 * @param string The CSS class to associate this textarea to
	 * @param string The html id to give to this textarea
	 * @param string The encoding to use for the content
	 * @param string The text of the stylesheet associated to this content.	 Only used for certain WYSIWYGs
	 * @param string The number of characters wide (columns) the resulting textarea should be
	 * @param string The number of characters high (rows) the resulting textarea should be
	 * @param string Additional text for the text area tag.
	 */
	function CreateSyntaxArea($id,$text,$name,$classname='',$htmlid='',$encoding='',
				  $stylesheet='',$cols='80',$rows='15',$addtext='')
	{
	  return create_textarea(false,$text,$id.$name,$classname,$htmlid, $encoding, $stylesheet,
				 $cols,$rows,'','html',$addtext);
	}

	/**
	 * Returns the xhtml equivalent of an href link	 This is basically a nice little wrapper
	 * to make sure that id's are placed in names and also that it's xhtml compliant.
	 *
	 * @param string The id given to the module on execution
	 * @param string The id to eventually return to when the module is finished it's task
	 * @param string The action that this form should do when the link is clicked
	 * @param string The text that will have to be clicked to follow the link
	 * @param string An array of params that should be inlucded in the URL of the link.	 These should be in a $key=>$value format.
	 * @param string Text to display in a javascript warning box.  If they click no, the link is not followed by the browser.
	 * @param boolean A flag to determine if only the href section should be returned
	 * @param boolean A flag to determine if actions should be handled inline (no moduleinterface.php -- only works for frontend)
	 * @param string Any additional text that should be added into the tag when rendered
	 */
	function CreateFrontendLink( $id, $returnid, $action, $contents='', $params=array(), $warn_message='',
					 $onlyhref=false, $inline=true, $addtext='', $targetcontentonly=false, $prettyurl='' )
	{
	  return $this->CreateLink( $id, $action, $returnid, $contents, $params, $warn_message, $onlyhref,
					$inline, $addtext, $targetcontentonly, $prettyurl );
	}

	/**
	 * Returns the xhtml equivalent of an href link	 This is basically a nice little wrapper
	 * to make sure that id's are placed in names and also that it's xhtml compliant.
	 *
	 * @param string The id given to the module on execution
	 * @param string The action that this form should do when the link is clicked
	 * @param string The id to eventually return to when the module is finished it's task
	 * @param string The text that will have to be clicked to follow the link
	 * @param string An array of params that should be inlucded in the URL of the link.	 These should be in a $key=>$value format.
	 * @param string Text to display in a javascript warning box.  If they click no, the link is not followed by the browser.
	 * @param boolean A flag to determine if only the href section should be returned
	 * @param boolean A flag to determine if actions should be handled inline (no moduleinterface.php -- only works for frontend)
	 * @param string Any additional text that should be added into the tag when rendered
	 */
	function CreateLink($id, $action, $returnid='', $contents='', $params=array(), $warn_message='', $onlyhref=false, $inline=false, $addttext='', $targetcontentonly=false, $prettyurl='')
	{
		$this->LoadFormMethods();
		return cms_module_CreateLink($this, $id, $action, $returnid, $contents, $params, $warn_message, $onlyhref, $inline, $addttext, $targetcontentonly, $prettyurl);
	}

	/**
	* Returns the xhtml equivalent of an href link for content links.	This is basically a nice
	* little wrapper to make sure that we go back to where we want and that it's xhtml complient
	*
	* @param string the page id of the page we want to direct to
	*/
	function CreateContentLink($pageid, $contents='')
	{
		$this->LoadFormMethods();
		return cms_module_CreateContentLink($this, $pageid, $contents);
	}


	/**
	 * Returns the xhtml equivalent of an href link for Content links.	This is basically a nice little wrapper
	 * to make sure that we go back to where we want to and that it's xhtml compliant.
	 *
	 * @param string The id given to the module on execution
	 * @param string The id to return to when the module is finished it's task
	 * @param string The text that will have to be clicked to follow the link
	 * @param string An array of params that should be inlucded in the URL of the link.	 These should be in a $key=>$value format.
	 * @param boolean A flag to determine if only the href section should be returned
	 */
	function CreateReturnLink($id, $returnid, $contents='', $params=array(), $onlyhref=false)
	{
		$this->LoadFormMethods();
		return cms_module_CreateReturnLink($this, $id, $returnid, $contents, $params, $onlyhref);
	}


	/**
	 * Redirects the user to another action of the module.
	 * This function is optimized for frontend use.
	 *
	 * @param string The id given to the module on execution
	 * @param string The action that this form should do when the form is submitted
	 * @param string The id to eventually return to when the module is finished it's task
	 * @param string An array of params that should be inlucded in the URL of the link.	 These should be in a $key=>$value format.
	 * @param boolean A flag to determine if actions should be handled inline (no moduleinterface.php -- only works for frontend)
	 */
	function RedirectForFrontEnd($id, $returnid, $action, $params = array(), $inline = true )
	{
	  return $this->Redirect($id, $action, $returnid, $params, $inline );
	}

	/**
	 * Redirects the user to another action of the module.
	 *
	 * @param string The id given to the module on execution
	 * @param string The action that this form should do when the form is submitted
	 * @param string The id to eventually return to when the module is finished it's task
	 * @param string An array of params that should be inlucded in the URL of the link.	 These should be in a $key=>$value format.
	 * @param boolean A flag to determine if actions should be handled inline (no moduleinterface.php -- only works for frontend)
	 */
	function Redirect($id, $action, $returnid='', $params=array(), $inline=false)
	{
		$this->LoadRedirectMethods();
		return cms_module_Redirect($this, $id, $action, $returnid, $params, $inline);
	}

	/**
	 * Redirects the user to a content page outside of the module.	The passed around returnid is
	 * frequently used for this so that the user will return back to the page from which they first
	 * entered the module.
	 *
	 * @param string Content id to redirect to.
	 */
	function RedirectContent($id)
	{
	  redirect_to_alias($id);
	}

	/**
	 * ------------------------------------------------------------------
	 * Intermodule Functions
	 * ------------------------------------------------------------------
	 */

	function &GetModuleInstance($module)
	{
		global $gCms;

		if (isset($gCms->modules[$module]) &&
			$gCms->modules[$module]['installed'] == true &&
			$gCms->modules[$module]['active'] == true)
		{
			return $gCms->modules[$module]['object'];
		}
		// Fix only variable references should be returned by reference
		$tmp = FALSE;
		return $tmp;
	}

  /**
	 * Returns an array of modulenames with the specified capability
	 * and which are installed and enabled, of course
	 *
   * @param an id specifying which capability to check for, could be "wysiwyg" etc.
	 * @param associative array further params to get more detailed info about the capabilities. Should be syncronized with other modules of same type
	*/
  function GetModulesWithCapability($capability, $params=array())
	{
		global $gCms;
    $result=array();
    foreach ($gCms->modules as $module=>$values)
    {
		  if ($gCms->modules[$module]['installed'] == true &&
			  $gCms->modules[$module]['active'] == true &&
        $gCms->modules[$module]['object']->HasCapability($capability,$params))
		  {
			  $result[]=$module;
		  }
    }
    return $result;
	}

	/**
	 * ------------------------------------------------------------------
	 * Language Functions
	 * ------------------------------------------------------------------
	 */

	/**
	 * Sets the default language (usually en_US) for the module.  There
	 * should be at least a language file for this language if the Lang()
	 * function is used at all.
	 */
	function DefaultLanguage()
	{
		return 'en_US';
	}

	/**
	 * Returns the corresponding translated string for the id given.
	 *
	 * @param string Id of the string to lookup and return
	 * @param array Corresponding params for string that require replacement.
	 *		  These params use the vsprintf command and it's style of replacement.
	 */
	function Lang()
	{
		$this->LoadLangMethods();

		//Push $this onto front of array
		$args = func_get_args();
		array_unshift($args,'');
		$args[0] = &$this;

		return call_user_func_array('cms_module_Lang', $args);
	}

	/**
	 * ------------------------------------------------------------------
	 * Template/Smarty Functions
	 * ------------------------------------------------------------------
	 */

	function ListTemplates($modulename = '')
	{
		$this->LoadTemplateMethods();
		return cms_module_ListTemplates($this, $modulename);
	}

	/**
	 * Returns a database saved template.  This should be used for admin functions only, as it doesn't
	 * follow any smarty caching rules.
	 */
	function GetTemplate($tpl_name, $modulename = '')
	{
		$this->LoadTemplateMethods();
		return cms_module_GetTemplate($this, $tpl_name, $modulename);
	}

	/**
	 * Returns contents of the template that resides in modules/ModuleName/templates/{template_name}.tpl
	 * Code adapted from the Guestbook module
	 */
	function GetTemplateFromFile($template_name)
	{
		$this->LoadTemplateMethods();
		return cms_module_GetTemplateFromFile($this, $template_name);
	}

	function SetTemplate($tpl_name, $content, $modulename = '')
	{
		$this->LoadTemplateMethods();
		return cms_module_SetTemplate($this, $tpl_name, $content, $modulename);
	}

	function DeleteTemplate($tpl_name = '', $modulename = '')
	{
		$this->LoadTemplateMethods();
		return cms_module_DeleteTemplate($this, $tpl_name, $modulename);
	}

	function IsFileTemplateCached($tpl_name, $designation = '', $timestamp = '', $cacheid = '')
	{
		$this->LoadTemplateMethods();
		return cms_module_IsFileTemplateCached($this, $tpl_name, $designation, $timestamp, $cacheid);
	}

	function ProcessTemplate($tpl_name, $designation = '', $cache = false, $cacheid = '')
	{
		$this->LoadTemplateMethods();
		return cms_module_ProcessTemplate($this, $tpl_name, $designation, $cache = false, $cacheid);
	}

	function IsDatabaseTemplateCached($tpl_name, $designation = '', $timestamp = '')
	{
		$this->LoadTemplateMethods();
		return cms_module_IsDatabaseTemplateCached($this, $tpl_name, $designation, $timestamp);
	}

	/**
	 * Given a template in a variable, this method processes it through smarty
	 * note, there is no caching involved.
	 */
	function ProcessTemplateFromData( $data )
	{
		$this->LoadTemplateMethods();
		return cms_module_ProcessTemplateFromData($this, $data);
	}

	function ProcessTemplateFromDatabase($tpl_name, $designation = '', $cache = false, $modulename = '')
	{
		$this->LoadTemplateMethods();
		return cms_module_ProcessTemplateFromDatabase($this, $tpl_name, $designation, $cache, $modulename);
	}

	function ListUserTags()
	{
		global $gCms;
		$usertagops =& $gCms->GetUserTagOperations();
		return $usertagops->ListUserTags();
	}

	function CallUserTag($name, $params = array())
	{
		global $gCms;
		$usertagops =& $gCms->GetUserTagOperations();
		return $usertagops->CallUserTag($name, $params);
	}

	/**
	 * ------------------------------------------------------------------
	 * Tab Functions
	 * ------------------------------------------------------------------
	 */
	function StartTabHeaders()
	{
		return '<div id="page_tabs">';
	}

	function SetTabHeader($tabid,$title,$active=false)
	{
		$a="";
		if (TRUE == $active)
		{
			$a=" class='active'";
			$this->mActiveTab = $tabid;
		}
	  return '<div id="'.$tabid.'"'.$a.'>'.$title.'</div>';
	}

	function EndTabHeaders()
	{
		return "</div><!-- EndTabHeaders -->";
	}

	function StartTabContent()
	{
		return '<div class="clearb"></div><div id="page_content">';
	}

	function EndTabContent()
	{
		return '</div> <!-- EndTabContent -->';
	}

	function StartTab($tabid, $params = array())
	{
		if (FALSE == empty($this->mActiveTab) && $tabid == $this->mActiveTab && FALSE == empty($params['tab_message'])) {
			$message = $this->ShowMessage($this->Lang($params['tab_message']));
		} else {
			$message = '';
		}
		return '<div id="' . strtolower(str_replace(' ', '_', $tabid)) . '_c">'.$message;
	}

	function EndTab()
	{
		return '</div> <!-- EndTab -->';
	}

	/**
	 * ------------------------------------------------------------------
	 * Other Functions
	 * ------------------------------------------------------------------
	 */

	 /**
	  *
	  * Module can spit out extra CSS for the admin side
	  *
	  */
	function AdminStyle()
	{
	  return '';
	}

	/**
	 * Set the content-type header.
	 *
	 * @param string Value to set the content-type header too
	 */
	function SetContentType($contenttype)
	{
		$variables = &$this->cms->variables;
		$variables['content-type'] = $contenttype;
	}

	/**
	 * Put an event into the audit (admin) log.	 This should be
	 * done on most admin events for consistency.
	 */
	function Audit($itemid, $itemname, $action)
	{
		#$userid = get_userid();
		#$username = $_SESSION["cms_admin_username"];
		audit($itemid,$itemname,$action);
	}

	/**
	 * Create's a new permission for use by the module.
	 *
	 * @param string Name of the permission to create
	 * @param string Description of the permission
	 */
	function CreatePermission($permission_name, $permission_text)
	{
		global $gCms;
		$db =& $gCms->GetDB();

		$query = "SELECT permission_id FROM ".cms_db_prefix()."permissions WHERE permission_name = ?";
		$count = $db->GetOne($query, array($permission_name));

		if (intval($count) == 0)
		{
			$new_id = $db->GenID(cms_db_prefix()."permissions_seq");
			$time = $db->DBTimeStamp(time());
			$query = "INSERT INTO ".cms_db_prefix()."permissions (permission_id, permission_name, permission_text, create_date, modified_date) VALUES (?,?,?,".$time.",".$time.")";
			$db->Execute($query, array($new_id, $permission_name, $permission_text));
		}
	}

	/**
	 * Checks a permission against the currently logged in user.
	 *
	 * @param string The name of the permission to check against the current user
	 */
	function CheckPermission($permission_name)
	{
		$userid = get_userid(false);
		return check_permission($userid, $permission_name);
	}

	/**
	 * Removes a permission from the system.  If recreated, the
	 * permission would have to be set to all groups again.
	 *
	 * @param string The name of the permission to remove
	 */
	function RemovePermission($permission_name)
	{
	  cms_mapi_remove_permission($permission_name);
	}

	/**
	 * Returns a module preference if it exists.
	 *
	 * @param string The name of the preference to check
	 * @param string The default value, just in case it doesn't exist
	 */
	function GetPreference($preference_name, $defaultvalue='')
	{
		return get_site_preference($this->GetName() . "_mapi_pref_" . $preference_name, $defaultvalue);
	}

	/**
	 * Sets a module preference.
	 *
	 * @param string The name of the preference to set
	 * @param string The value to set it to
	 */
	function SetPreference($preference_name, $value)
	{
	  return set_site_preference($this->GetName() . "_mapi_pref_" . $preference_name, $value);
	}

	/**
	 * Removes a module preference.  If no preference name
	 * is specified, removes all module preferences.
	 *
	 * @param string The name of the preference to remove
	 */
	function RemovePreference($preference_name='')
	{
	  if( $preference_name == '' )
	    {
	      return remove_site_preference($this->GetName()."_mapi_pref_",true);
	    }
	  return remove_site_preference($this->GetName() . "_mapi_pref_" . $preference_name);
	}

	/**
	 * Creates a string containing links to all the pages.
	 * @param string The id given to the module on execution
	 * @param string The action that this form should do when the form is submitted
	 * @param string The id to eventually return to when the module is finished it's task
	 * @param string the current page to display
	 * @param string the amount of items being listed
	 * @param string the amount of items to list per page
	 * @param boolean A flag to determine if actions should be handled inline (no moduleinterface.php -- only works for frontend)
	 */
	function CreatePagination($id, $action, $returnid, $page, $totalrows, $limit, $inline=false)
	{
		$this->LoadMiscMethods();
		return cms_module_CreatePagination($this, $id, $action, $returnid, $page, $totalrows, $limit, $inline);
	}

    /**
     * ShowMessage
     * Returns a formatted page status message
     *
     * @param message - Message to be shown
     */
    function ShowMessage($message)
    {
		global $gCms;
		if (isset($gCms->variables['admintheme']))
		{
			$admintheme =& $gCms->variables['admintheme']; //php4 friendly
			return $admintheme->ShowMessage($message);
		}
		return '';
	}

    /**
     * ShowErrors
     * Outputs errors in a nice error box with a troubleshooting link to the wiki
     *
     * @param errors - array or string of errors to be shown
     */
    function ShowErrors($errors)
    {
        global $gCms;
        if (isset($gCms->variables['admintheme']))
        {
            $admintheme =& $gCms->variables['admintheme']; //php4 friendly
            return $admintheme->ShowErrors($errors);
        }
        return '';
    }

	/**
	 * ------------------------------------------------------------------
	 * Event Handler Related functions
	 * ------------------------------------------------------------------
	 */


	/**
	* Add an event handler for a module event
	*
	* @param string $modulename      The name of the module sending the event
	* @param string $eventname       The name of the event
	* @param boolean $removable      Can this event be removed from the list?
	*
	* @returns mixed If successful, true.  If it fails, false.
	*/
	function AddEventHandler( $modulename, $eventname, $removable = true )
	{
		Events::AddEventHandler( $modulename, $eventname, false, $this->GetName(), $removable );
	}


	/**
	 * Inform the system about a new event that can be generated
	 *
	 * @param string The name of the event
	 *
	 * @returns nothing
	 */
	function CreateEvent( $eventname )
	{
		Events::CreateEvent($this->GetName(), $eventname);
	}


	/**
	 * Handle an event triggered by another module
	 * This method must be over-ridden if this module is capable of handling events.
	 * of any type.
	 *
	 * @param string The name of the originating module
	 * @param string The name of the event
	 * @param array  Array of parameters provided with the event.
	 *
	 * @returns boolean
	 */
	function DoEvent( $originator, $eventname, &$params )
	{
		if ($originator != '' && $eventname != '')
		{
			$filename = dirname(dirname(dirname(__FILE__))) . '/modules/'.$this->GetName().'/event.' 
			. $originator . "." . $eventname . '.php';

			if (@is_file($filename))
			{
				{
					global $gCms;
					$db =& $gCms->GetDb();
					$config =& $gCms->GetConfig();
					$smarty =& $gCms->GetSmarty();

					include($filename);

				}
			}
		}
	}


	/**
	 * Get a (langified) description for an event this module created.
	 * This method must be over-ridden if this module created any events.
	 *
	 * @param string The name of the event
	 *
	 * @returns text string
	 */
	function GetEventDescription( $eventname )
	{
		return "";
	}


	/**
	 * Get a (langified) descriptionof the details about when an event is
	 * created, and the parameters that are attached with it.
	 * This method must be over-ridden if this module created any events.
	 *
	 * @param string The name of the event
	 */
	function GetEventHelp( $eventname )
	{
		return "";
	}


	/**
	 * A callback indicating if this module has a DoEvent method to
	 * handle incoming events.
         */
	function HandlesEvents()
	{
		return false;
	}

	/**
	 * Remove an event from the CMS system
	 * This function removes all handlers to the event, and completely removes
	 * all references to this event from the database
	 *
	 * Note, only events created by this module can be removed.
	 *
	 * @param string The name of the event
	 *
	 * @returns nothing
	 */
	function RemoveEvent( $eventname )
	{
		Events::RemoveEvent($this->GetName(), $eventname);
	}

	/**
	 * Remove an event from the CMS system
	 * This function removes all handlers to the event, and completely removes
	 * all references to this event from the database
	 *
	 * Note, only events created by this module can be removed.
	 *
	 * @param string The name of the event
	 *
	 * @returns nothing
	 */
	function RemoveEventHandler( $modulename, $eventname )
	{
		Events::RemoveEventHandler($modulename, $eventname, false, $this->GetName());
	}


	/**
	 * Trigger an event.
	 * This function will call all registered event handlers for the event
	 *
	 * @param string The name of the event
	 * @param array  The parameters associated with this event.
	 *
	 * @returns nothing
	 */
	function SendEvent( $eventname, $params )
	{
		Events::SendEvent($this->GetName(), $eventname, $params);
	}
	
	/**
	 * Returns the output the module wants displayed in the dashboard
	 * 
	 * @returns dashboard-content
	 */
	function GetDashboardOutput() 
        {
	  return '';
	}


	/**
	 * Returns the output the module wants displayed in the notification area
	 * 
	 * @returns a stdClass object with two properties.... priority (1->3)... and
	 * html, which indicates the text to display for the Notification.
	 */
	function GetNotificationOutput($priority=2) 
        {
	  return '';
	}

}


# vim:ts=4 sw=4 noet
?>
