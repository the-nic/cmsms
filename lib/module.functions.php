<?php
#CMS - CMS Made Simple
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
 * Module related functions
 *
 * @package CMS
 */

/**
 * Function to load all modules.
 *
 * This function loads all modules and then figures out which modules are installed
 * and active.
 *
 * @since 0.4
 */
function load_modules() {
	global $gCms;
	$db = $gCms->db;
	$cmsmodules = &$gCms->modules;

	$dir = dirname(dirname(__FILE__))."/modules";
	$ls = dir($dir);
	while (($file = $ls->read()) != "") {
		if (is_dir("$dir/$file") && (strpos($file, ".") === false || strpos($file, ".") != 0)) {
			if (is_file("$dir/$file/cmsmodule.php")) {
				include_once("$dir/$file/cmsmodule.php");
			}
		}
	}

	#Figger out what modules are active and/or installed
	if (isset($db))
	{
		$query = "SELECT * FROM ".cms_db_prefix()."modules";
		$result = $db->Execute($query);
		if ($result)
		{
			while ($row = $result->FetchRow())
			{
				if (isset($row['module_name']))
				{
					$modulename = $row['module_name'];
					if (isset($modulename) && isset($cmsmodules[$modulename]))
					{
						$cmsmodules[$modulename]['Installed'] = true;
						$cmsmodules[$modulename]['Active'] = $row['active'];
						if ($row['active'] == '1')
						{
							#Try generating a content class for this module
							cms_mapi_create_module_content_class($modulename);
						}
					}
				}
			}
		}
	}
}

/**
 * Registers a module with the system.  This needs to be done
 * before any module functions can be registered.
 *
 * @since 0.4
 */
function cms_mapi_register_module($name, $author, $version, $minimum_version='')
{
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (!isset($cmsmodules[$name]))
	{
		$cmsmodules[$name] = array();
		$cmsmodules[$name]['Author'] = $author;
		$cmsmodules[$name]['Version'] = $version;
		$cmsmodules[$name]['Installed'] = false; 
		$cmsmodules[$name]['Active'] = false; 
		$cmsmodules[$name]['enable_wysiwyg'] = false;
	}
}

/**
 * Registers a module as a content module.
 *
 * Tells CMS that this module will be used as a content
 * module.  This would mean that it would show up in the
 * content type list and should (though it's not required)
 * to have an executeuser function.
 *
 * @since 0.4
 */
function cms_mapi_register_content_module($name)
{
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$name]))
	{
		$cmsmodules[$name]['content_module'] = true;
		$cmsmodules[$name]['content_module_created'] = false;
	}
}

/**
 * Registers the module to be used a as a plugin.
 *
 * Tells CMS that this module should be able to be
 * used in a plugin.  It will now be able to be used in
 * templates and content as {cms_module module="name"}.
 *
 * @since 0.4
 */
function cms_mapi_register_plugin_module($name)
{
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$name]))
	{
		$cmsmodules[$name]['plugin_module'] = true;
	}
}

/**
 * Register a module as a dependency.
 *
 * This function will register a dependency on another module for this
 * one.  It checks for existence and proper versions.
 *
 * @since 0.8
 */
function cms_mapi_register_dependency($name, $depname, $minimum_version)
{
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$name]))
	{
		$cmsmodules[$name]['dependency'][$depname] = $minimum_version;
	}
}

/**
 * Registers the module's help function
 *
 * This function should echo out help html.  It should show
 * basics of what the module if for and how to use it.  This
 * will be displayed on the module list in the admin.
 *
 * Passes $gCms as a parameter to the function.
 *
 * @since 0.5
 */
function cms_mapi_register_help_function($name, $function)
{
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$name]))
	{
		$cmsmodules[$name]['help_function'] = $function;
	}
}

/**
 * Registers the module's about function
 *
 * This function should echo out about html.  It should at least
 * show the version number, the author, and if possible, a change
 * history.  Any other credits or necessary license messages would
 * go here as well.
 *
 * @since 0.5
 */
function cms_mapi_register_about_function($name, $function)
{
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$name]))
	{
		$cmsmodules[$name]['about_function'] = $function;
	}
}

/**
 * Registers the module's install function
 *
 * The registered function should setup any necessary tables,
 * sequences, etc.
 *
 * Passes $gCms as a parameter.
 *
 * @since 0.4
 */
function cms_mapi_register_install_function($name, $function) {
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$name])) {
		$cmsmodules[$name]['install_function'] = $function;
	}
}

/**
 * Registers the module's upgrade function
 *
 * The registered function should do any necessary upgrade procedures.
 *
 * Passes $gCms, the old version and the new version as parameters.
 *
 * @since 0.5
 */
function cms_mapi_register_upgrade_function($name, $function, $autoupgrade = false) {
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$name])) {
		$cmsmodules[$name]['upgrade_function'] = $function;
		if ($autoupgrade == true)
		{
			$cmsmodules[$name]['auto_upgrade_function'] = $function;
		}
	}
}

/**
 * Registers the module's uninstall function
 *
 * The registered function should clean up anything that was setup
 * in the install function.  This includes any tables, sequences, etc.
 *
 * Passes $gCms as a parameter.
 *
 * @since 0.4
 */
function cms_mapi_register_uninstall_function($name, $function) {
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$name])) {
		$cmsmodules[$name]['uninstall_function'] = $function;
	}
}

/**
 * Registers the module's execute function
 *
 * The registered function is what is shown if either the
 * it is included as a content module or if has been used as a
 * plugin.
 *
 * Passes $gCms, the masking id and the extra passed parameters
 * to the function.
 *
 * @since 0.4
 */
function cms_mapi_register_execute_function($name, $function) {
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$name])) {
		$cmsmodules[$name]['execute_function'] = $function;
	}
}

/**
 * Registers the module's executeuser function
 *
 * The registered function is what is shown if the module
 * needs a page that is not really a content page.  i.e. a full
 * page form for input.
 *
 * Passes $gCms, the masking id, the calling page id and the extra
 * passed parameters to the function.
 *
 * @since 0.4
 */
function cms_mapi_register_executeuser_function($name, $function) {
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$name])) {
		$cmsmodules[$name]['execute_user_function'] = $function;
	}
}

/**
 * Register's the modules' executeadmin function
 *
 * This is the function that is called from the admin section.
 *
 * Passes $gCms and the masking id as parameters to the function.
 *
 * @since 0.4
 */
function cms_mapi_register_executeadmin_function($name, $function) {
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$name])) {
		$cmsmodules[$name]['execute_admin_function'] = $function;
	}
}

/**
 * Unregisters the module and it's functions.  Not usually needed.
 *
 * @since 0.4
 */
function cms_mapi_unregister_module($name) {
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$name])) {
		unset($cmsmodules[$name]);
	}
}

/**********************************************************
*Login/Logout Callbacks
**********************************************************/

/**
 * Registers a function to be called after a successful login.
 *
 * Passes $gCms and a user object to the function.
 *
 * @since 0.7.3
 */
function cms_mapi_register_login_post_function($name, $function)
{
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$name]))
	{
		$cmsmodules[$name]['login_post_function'] = $function;
	}
}

/**
 * Registers a function to be called after a successful logout.
 *
 * Passes $gCms to the function.
 *
 * @since 0.7.3
 */
function cms_mapi_register_logout_post_function($name, $function)
{
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$name]))
	{
		$cmsmodules[$name]['logout_post_function'] = $function;
	}
}

/**********************************************************
*Add/Edit User Callbacks
**********************************************************/

/**
 * Registers a function to be called before a successful user addition.
 *
 * Passes $gCms and a user object to the function.
 *
 * @since 0.7.3
 */
function cms_mapi_register_adduser_pre_function($name, $function)
{
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$name]))
	{
		$cmsmodules[$name]['adduser_pre_function'] = $function;
	}
}

/**
 * Registers a function to be called after a successful user addition.
 *
 * Passes $gCms and a user object to the function.
 *
 * @since 0.7.3
 */
function cms_mapi_register_adduser_post_function($name, $function)
{
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$name]))
	{
		$cmsmodules[$name]['adduser_post_function'] = $function;
	}
}

/**
 * Registers a function to be called before a successful user edit.
 *
 * Passes $gCms and a user object to the function.
 *
 * @since 0.7.3
 */
function cms_mapi_register_edituser_pre_function($name, $function)
{
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$name]))
	{
		$cmsmodules[$name]['edituser_pre_function'] = $function;
	}
}

/**
 * Registers a function to be called after a successful user edit.
 *
 * Passes $gCms and a user object to the function.
 *
 * @since 0.7.3
 */
function cms_mapi_register_edituser_post_function($name, $function)
{
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$name]))
	{
		$cmsmodules[$name]['edituser_post_function'] = $function;
	}
}

/**********************************************************
*Add/Edit Group Callbacks
**********************************************************/

/**
 * Registers a function to be called before a successful group addition.
 *
 * Passes $gCms and a group object to the function.
 *
 * @since 0.7.3
 */
function cms_mapi_register_addgroup_pre_function($name, $function)
{
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$name]))
	{
		$cmsmodules[$name]['addgroup_pre_function'] = $function;
	}
}

/**
 * Registers a function to be called after a successful group addition.
 *
 * Passes $gCms and a group object to the function.
 *
 * @since 0.7.3
 */
function cms_mapi_register_addgroup_post_function($name, $function)
{
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$name]))
	{
		$cmsmodules[$name]['addgroup_post_function'] = $function;
	}
}

/**
 * Registers a function to be called before a successful group edit.
 *
 * Passes $gCms and a group object to the function.
 *
 * @since 0.7.3
 */
function cms_mapi_register_editgroup_pre_function($name, $function)
{
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$name]))
	{
		$cmsmodules[$name]['editgroup_pre_function'] = $function;
	}
}

/**
 * Registers a function to be called after a successful group edit.
 *
 * Passes $gCms and a group object to the function.
 *
 * @since 0.7.3
 */
function cms_mapi_register_editgroup_post_function($name, $function)
{
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$name]))
	{
		$cmsmodules[$name]['editgroup_post_function'] = $function;
	}
}

/**********************************************************
*Add/Edit HTML Blob Callbacks
**********************************************************/

/**
 * Registers a function to be called before a successful htmlblob addition.
 *
 * Passes $gCms and a htmlblob object to the function.
 *
 * @since 0.7.3
 */
function cms_mapi_register_addhtmlblob_pre_function($name, $function)
{
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$name]))
	{
		$cmsmodules[$name]['addhtmlblob_pre_function'] = $function;
	}
}

/**
 * Registers a function to be called after a successful htmlblob addition.
 *
 * Passes $gCms and a htmlblob object to the function.
 *
 * @since 0.7.3
 */
function cms_mapi_register_addhtmlblob_post_function($name, $function)
{
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$name]))
	{
		$cmsmodules[$name]['addhtmlblob_post_function'] = $function;
	}
}

/**
 * Registers a function to be called before a successful htmlblob edit.
 *
 * Passes $gCms and a htmlblob object to the function.
 *
 * @since 0.7.3
 */
function cms_mapi_register_edithtmlblob_pre_function($name, $function)
{
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$name]))
	{
		$cmsmodules[$name]['edithtmlblob_pre_function'] = $function;
	}
}

/**
 * Registers a function to be called after a successful htmlblob edit.
 *
 * Passes $gCms and a htmlblob object to the function.
 *
 * @since 0.7.3
 */
function cms_mapi_register_edithtmlblob_post_function($name, $function)
{
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$name]))
	{
		$cmsmodules[$name]['edithtmlblob_post_function'] = $function;
	}
}

/**********************************************************
*Add/Edit Template Callbacks
**********************************************************/

/**
 * Registers a function to be called before a successful template addition.
 *
 * Passes $gCms and a template object to the function.
 *
 * @since 0.7.3
 */
function cms_mapi_register_addtemplate_pre_function($name, $function)
{
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$name]))
	{
		$cmsmodules[$name]['addtemplate_pre_function'] = $function;
	}
}

/**
 * Registers a function to be called after a successful template addition.
 *
 * Passes $gCms and a template object to the function.
 *
 * @since 0.7.3
 */
function cms_mapi_register_addtemplate_post_function($name, $function)
{
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$name]))
	{
		$cmsmodules[$name]['addtemplate_post_function'] = $function;
	}
}

/**
 * Registers a function to be called before a successful template edit.
 *
 * Passes $gCms and a template object to the function.
 *
 * @since 0.7.3
 */
function cms_mapi_register_edittemplate_pre_function($name, $function)
{
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$name]))
	{
		$cmsmodules[$name]['edittemplate_pre_function'] = $function;
	}
}

/**
 * Registers a function to be called after a successful template edit.
 *
 * Passes $gCms and a template object to the function.
 *
 * @since 0.7.3
 */
function cms_mapi_register_edittemplate_post_function($name, $function)
{
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$name]))
	{
		$cmsmodules[$name]['edittemplate_post_function'] = $function;
	}
}

/**
 * Registers a function to be called for a content SetProperties()
 * function.
 *
 * Passes no parameters to the function.
 *
 * @since 0.8
 */
function cms_mapi_register_content_module_set_properties_function($name, $function)
{
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$name]))
	{
		$cmsmodules[$name]['content_module_set_properties'] = $function;
	}
}

/**
 * Registers a function to be called for a content FillParams($params)
 * function.
 *
 * Passes the $params array to the function.
 *
 * @since 0.8
 */
function cms_mapi_register_content_module_fill_params_function($name, $function)
{
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$name]))
	{
		$cmsmodules[$name]['content_module_fill_params'] = $function;
	}
}

/**
 * Registers a function to be called for a content ValidateData()
 * function.
 *
 * Passes the $params array to the function.
 *
 * @since 0.8
 */
function cms_mapi_register_content_module_validate_data_function($name, $function)
{
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$name]))
	{
		$cmsmodules[$name]['content_module_validate_data'] = $function;
	}
}

/**
 * Registers a function to be called for a content Show()
 * function.
 *
 * Passes no parameters to the function.
 *
 * @since 0.8
 */
function cms_mapi_register_content_module_show_function($name, $function)
{
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$name]))
	{
		$cmsmodules[$name]['content_module_show'] = $function;
	}
}

/**
 * Registers a function to be called for a content Edit()
 * function.
 *
 * Passes no parameters to the function.
 *
 * @since 0.8
 */
function cms_mapi_register_content_module_edit_function($name, $function)
{
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$name]))
	{
		$cmsmodules[$name]['content_module_edit'] = $function;
	}
}

/**
 * Registers a function to be called for a content GetURL()
 * function.
 *
 * Passes no parameters to the function.
 *
 * @since 0.8
 */
function cms_mapi_register_content_module_get_url_function($name, $function)
{
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$name]))
	{
		$cmsmodules[$name]['content_module_get_url'] = $function;
	}
}

/**********************************************************
*Content Callbacks
**********************************************************/

/**
 * Registers a function to be called with content before it is sent to
 * smarty for processing.  These changes will possibly cache.
 *
 * Passes $cms and a string of content as parameters to the function.
 *
 * @since 0.8
 */
function cms_mapi_register_content_prerender_function($name, $function)
{
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$name]))
	{
		$cmsmodules[$name]['content_prerender_function'] = $function;
	}
}

/**
 * Registers a function to be called with the template before it is
 * has any tags replaced.  These changes will possibly cache.
 *
 * Passes $cms and a string of the template as parameters to the
 * function.
 *
 * @since 0.8
 */
function cms_mapi_register_content_template_function($name, $function)
{
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$name]))
	{
		$cmsmodules[$name]['content_template_function'] = $function;
	}
}

/**
 * Registers a function to be called with the stylesheet text before it
 * is merged into the template.  These changes will possibly cache.
 *
 * Passes $cms and a string of the stylesheet as parameters to the
 * function.
 *
 * @since 0.8
 */
function cms_mapi_register_content_stylesheet_function($name, $function)
{
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$name]))
	{
		$cmsmodules[$name]['content_stylesheet_function'] = $function;
	}
}

/**
 * Registers a function to be called with the title text before it
 * is merged into the template.  These changes will possibly cache.
 *
 * Passes $cms and a string of the title as parameters to the
 * function.
 *
 * @since 0.8
 */
function cms_mapi_register_content_title_function($name, $function)
{
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$name]))
	{
		$cmsmodules[$name]['content_title_function'] = $function;
	}
}

/**
 * Registers a function to be called with the content data before it
 * is merged into the template.  These changes will possibly cache.
 *
 * Passes $cms and a string of the title as parameters to the
 * function.
 *
 * @since 0.8
 */
function cms_mapi_register_content_data_function($name, $function)
{
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$name]))
	{
		$cmsmodules[$name]['content_data_function'] = $function;
	}
}

/**
 * Registers a function to be called with the htmlblob text before it
 * is merged into the template.  These changes will possibly cache.
 *
 * Passes $cms and a string of the htmlblob as parameters to the
 * function.
 *
 * @since 0.8
 */
function cms_mapi_register_content_htmlblob_function($name, $function)
{
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$name]))
	{
		$cmsmodules[$name]['content_htmlblob_function'] = $function;
	}
}

/**
 * Registers a function to be called with content after it is sent to
 * smarty for processing.  Changes will never cache.
 *
 * Passes $cms and a string of content as parameters to the function.
 *
 * @since 0.8
 */
function cms_mapi_register_content_postrender_function($name, $function)
{
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$name]))
	{
		$cmsmodules[$name]['content_postrender_function'] = $function;
	}
}

/**********************************************************
*WYSIWYG Callbacks
**********************************************************/

/**
 * Enables the WYSIWYG for this module on all textareas
 *
 * @since 0.5
 */
function cms_mapi_enable_wysiwyg($name)
{
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$name]))
	{
		$cmsmodules[$name]['enable_wysiwyg'] = true;
	}
}

/**
 * Registers this module as a WYSIWYG module
 *
 * @since 0.8
 */
function cms_mapi_register_wysiwyg_module($name)
{
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$name]))
	{
		$cmsmodules[$name]['wysiwyg_module'] = true;
	}
}

/**
 * Registers this module's WYSIWYG header function
 *
 * @since 0.8
 */
function cms_mapi_register_wysiwyg_page_header_function($name, $function)
{
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$name]))
	{
		$cmsmodules[$name]['wysiwyg_header_function'] = $function;
	}
}

/**
 * Registers this module's WYSIWYG body function
 *
 * @since 0.8
 */
function cms_mapi_register_wysiwyg_page_body_function($name, $function)
{
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$name]))
	{
		$cmsmodules[$name]['wysiwyg_body_function'] = $function;
	}
}

/**
 * Registers a function that will product output destined for that
 * pages <form> tag.  Useful for javascript needed to be done on submit
 * and such.
 *
 * @since 0.8
 */
function cms_mapi_register_wysiwyg_page_form_function($name, $function)
{
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$name]))
	{
		$cmsmodules[$name]['wysiwyg_form_function'] = $function;
	}
}

/**
 * This is a function that would be called before a form is submitted.  Generally, a dropdown
 * box or something similar that would force a submit of the form via javascript should put this
 * in their onchange line as well so that the WYSIWYG can do any cleanups before the actual form
 * submission takes place.
 *
 * @since 0.8
 */
function cms_mapi_register_wysiwyg_page_form_submit_function($name, $function)
{
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$name]))
	{
		$cmsmodules[$name]['wysiwyg_form_submit_function'] = $function;
	}
}

/**
 * Registers this module's WYSIWYG textbox function
 *
 * @since 0.8
 */
function cms_mapi_register_wysiwyg_page_textbox_function($name, $function)
{
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$name]))
	{
		$cmsmodules[$name]['wysiwyg_textbox_function'] = $function;
	}
}

/**********************************************************
*Intra-Module Callbacks
**********************************************************/

function cms_mapi_check_for_module($name)
{
	$result = false;

	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$module]) && $cmsmodules[$module]['Installed'] == true && $cmsmodules[$module]['Active'] == true)
	{
		$result = true;
	}
	return $result;
}

function cms_mapi_register_intermodule_function($module, $name, $function_pointer)
{
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$module]))
	{
		$cmsmodules[$module]['intermodule_function'][$name] = $function_pointer;
	}
}

function cms_mapi_call_intermodule_function($module, $name, $array)
{
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$module]) && $cmsmodules[$module]['Installed'] == true && $cmsmodules[$module]['Active'] == true)
	{
		if (isset($cmsmodules[$module]['intermodule_function'][$name]))
		{
			return call_user_func_array($cmsmodules[$module]['intermodule_function'][$name], array($array));
		}
	}
}

function cms_mapi_check_intermodule_function_exists($module, $name)
{
	$result = false;

	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (isset($cmsmodules[$module]) && $cmsmodules[$module]['Installed'] == true && $cmsmodules[$module]['Active'] == true)
	{
		if (isset($cmsmodules[$module]['intermodule_function'][$name]))
		{
			$result = true;
		}
	}
	return $result;
}

/**
 * Create's a new permission for use by the module.
 *
 * @since 0.4
 */
function cms_mapi_create_permission($cms, $permission_name, $permission_text) {

	$db = $cms->db;

	$query = "SELECT permission_id FROM ".cms_db_prefix()."permissions WHERE permission_name =" . $db->qstr($permission_name); 
	$result = $db->Execute($query);

	if ($result && $result->RowCount() < 1) {

		$new_id = $db->GenID(cms_db_prefix()."permissions_seq");
		$query = "INSERT INTO ".cms_db_prefix()."permissions (permission_id, permission_name, permission_text, create_date, modified_date) VALUES ($new_id, ".$db->qstr($permission_name).",".$db->qstr($permission_text).",'".$db->DBTimeStamp(time())."','".$db->DBTimeStamp(time())."')";
		$db->Execute($query);
	}
}

/**
 * Checks a permission against the currently logged in user.
 *
 * @since 0.4
 */
function cms_mapi_check_permission($cms, $permission_name) {

	$userid = get_userid();
	return check_permission($userid, $permission_name);
}

/** 
 * Removes a permission from the system.  If recreated, the
 * permission would have to be set to all groups again.
 *
 * @since 0.4
 */
function cms_mapi_remove_permission($cms, $permission_name) {

	$db = $cms->db;

	$query = "SELECT permission_id FROM ".cms_db_prefix()."permissions WHERE permission_name = " . $db->qstr($permission_name); 
	$result = $db->Execute($query);

	if ($result && $result->RowCount() > 0) {

		$row = $result->FetchRow();
		$id = $row["permission_id"];

		$query = "DELETE FROM ".cms_db_prefix()."group_perms WHERE permission_id = $id";
		$db->Execute($query);

		$query = "DELETE FROM ".cms_db_prefix()."permissions WHERE permission_id = $id";
		$db->Execute($query);
	}
}

/**
 * Returns a module preference if it exists.
 *
 * @since 0.8
 */
function cms_mapi_get_preference($module, $preference_name, $defaultvalue='')
{
	return get_site_preference($module . "_mapi_pref_" . $preference_name, $defaultvalue);
}

/**
 * Sets a module preference.
 *
 * @since 0.8
 */
function cms_mapi_set_preference($module, $preference_name, $value)
{
	return set_site_preference($module . "_mapi_pref_" . $preference_name, $value);
}

/**
 * Adds a message to be displayed on next invocation the Plugin Management page.  These
 * messages are stored in the Session.
 *
 * @since 0.8
 */
function cms_mapi_add_message($message)
{
	global $gCms;
	$cmsmodules = &$gCms->modules;
	if (!isset($_SESSION['modules_messages']))
	{
		$_SESSION['modules_messages'] = array();
	}
	array_push($_SESSION['modules_messages'], $message); 
}

/**
 * Put an event into the audit (admin) log.  This should be
 * done on most admin events for consistency.
 *
 * @since 0.4
 */
function cms_mapi_audit($cms, $itemid, $itemname, $action)
{
	$userid = get_userid();
	$username = $_SESSION["cms_admin_username"];
	audit($userid, $username, $itemid, $itemname, $action);
}

/**
 * Creates a link to call an executeuser function.
 *
 * @since 0.4
 */
function cms_mapi_create_user_link($module, $id, $page_id, $params, $text, $warn_message="")
{
	$val = "<a href=\"moduleinterface.php?module=$module&amp;return_id=$page_id&amp;id=$id";
	foreach ($params as $key=>$value)
	{
		$val .= "&amp;$id$key=$value";
	}
	$val .= "\"";
	if ($warn_message !== "")
	{
		$val .= " onclick=\"return confirm('$warn_message');\"";
	}
	$val .= ">$text</a>";
	return $val;
}

/**
 * Creates a link to call an executeadmin function.
 *
 * @since 0.4
 */
function cms_mapi_create_admin_link($module, $id, $params, $text, $warn_message="")
{
	$val = "<a href=\"moduleinterface.php?module=$module";
	foreach ($params as $key=>$value)
	{
		$val .= "&amp;$id$key=$value";
	}
	$val .= "\"";
	if ($warn_message !== "")
	{
		$val .= " onclick=\"return confirm('$warn_message');\"";
	}
	$val .= ">$text</a>";
	return $val;

}

/**
 * Creates a new user form.  This should be used in the executeuser function to
 * start any forms.  This way, necessary variables are set without any work by
 * the module writer.
 *
 * @since 0.4
 */
function cms_mapi_create_user_form_start($module, $id, $return_id, $method="post", $form_extra="", $enctype='')
{
	$text = "<form name=\"".$id."_moduleform\" method=\"$method\" action=\"moduleinterface.php\"" .$form_extra;
	if ($enctype != '')
	{
		$text .= ' enctype="'.$enctype.'"';
	}
	$text .= "><input type=\"hidden\" name=\"module\" value=\"$module\" /><input type=\"hidden\" name=\"return_id\" value=\"$return_id\" /><input type=\"hidden\" name=\"id\" value=\"$id\" />\n";
	return $text;
}

/**
 * Closes a user form.  Doesn't do much now, but could be user for more
 * in the future.
 *
 * @since 0.4
 */
function cms_mapi_create_user_form_end()
{
	return "</form>\n";
}

/**
 * Creates a new admin form.  This should be used in the executemadin function to
 * start any forms.  This way, necessary variables are set without any work by
 * the module writer.
 *
 * @since 0.4
 */
function cms_mapi_create_admin_form_start($module, $id, $method="post", $enctype='')
{
	$text = "<form name=\"".$id."moduleform\" method=\"$method\" action=\"moduleinterface.php\"";
	if ($enctype != '')
	{
		$text .= ' enctype="'.$enctype.'"';
	}
	$text .= "><input type=\"hidden\" name=\"module\" value=\"$module\" />\n";
	return $text;
}

/**
 * Closes an admin form.  Doesn't do much now, but could be user for more
 * in the future.
 *
 * @since 0.4
 */
function cms_mapi_create_admin_form_end()
{
	return "</form>\n";
}

/**
 * Used to redirect back to a content page from an executeuser function
 *
 * @since 0.4
 */
function cms_mapi_redirect_user_by_pageid($page_id)
{
	redirect("index.php?page=$page_id");
}

/**
 * Used to create a link back to a content page from an executeuser function
 *
 * @since 0.5
 */
function cms_mapi_create_content_link_by_page_id($page_id, $link_text)
{
	global $gCms;
	$config = &$gCms->config;
	return "<a href=\"".$config["root_url"]."/index.php?page=$page_id\">$link_text</a>\n";
}

function cms_mapi_check_for_dependents($parent)
{
	global $gCms;
	$db = $gCms->db;
	
	$result = false;
	
	$query = "SELECT * FROM ".cms_db_prefix()."module_deps WHERE parent_module = ?";
	$dbresult = $db->Execute($query, array($parent));
	
	if ($dbresult && $dbresult->RowCount() > 0)
	{
		$result = true;
	}
	
	return $result;
}

function cms_mapi_create_module_content_class($key)
{
	global $gCms;
	$allmodules = $gCms->modules;

	if (isset($allmodules[$key]['content_module_created']) && $allmodules[$key]['content_module_created'] == FALSE)
	{
		$classtext = '';

		$classtext .= 'class ' . $key . ' extends ContentBase { ';

		if (isset($allmodules[$key]['content_module_set_properties']))
		{
			$classtext .= 'function SetProperties() { ' . $allmodules[$key]['content_module_set_properties'] . '($this); } ';
		}
		if (isset($allmodules[$key]['content_module_fill_params']))
		{
			$classtext .= 'function FillParams($params) { ' . $allmodules[$key]['content_module_fill_params'] . '($this, $params); } ';
		}
		if (isset($allmodules[$key]['content_module_validate_data']))
		{
			$classtext .= 'function ValidateData() { ' . $allmodules[$key]['content_module_validate_data'] . '($this); } ';
		}
		if (isset($allmodules[$key]['content_module_show']))
		{
			#This does some tricks to make sure that all output is captured
			$classtext .= 'function Show() {';
			$classtext .= '@ob_start();';
			$classtext .= 'echo ' . $allmodules[$key]['content_module_show'] . '($this);';
			$classtext .= '$result = @ob_get_contents();';
			$classtext .= '@ob_end_clean();';
			$classtext .= 'return $result;';
			$classtext .= '}';
		}
		if (isset($allmodules[$key]['content_module_edit']))
		{
			#Same here...
			$classtext .= 'function Edit() {';
			$classtext .= '@ob_start();';
			$classtext .= 'echo ' . $allmodules[$key]['content_module_edit'] . '($this);';
			$classtext .= '$result = @ob_get_contents();';
			$classtext .= '@ob_end_clean();';
			$classtext .= 'return $result;';
			$classtext .= '}';
		}
		if (isset($allmodules[$key]['content_module_get_url']))
		{
			$classtext .= 'function GetURL() { return ' . $allmodules[$key]['content_module_get_url'] . '($this); } ';
		}

		$classtext .= '}';

		eval($classtext);

		$allmodules[$key]['content_module_created'] = true;
	}
}

/**
 * Creates a string containing links to all the pages.
 * @param page - the current page to display
 * @param totalrows - the amount of items being listed
 * @param limit - the amount of items to list per page
 * @return a string containing links to all the pages (ex. next 1,2 prev)
 */
function cms_mapi_admin_pagination($module, $id, $page, $totalrows, $limit)
{
    $link="<a href=\"moduleinterface.php?module=$module&".$id."page=";
    $page_string = "";
    $from = ($page * $limit) - $limit;
    $numofpages = floor($totalrows / $limit);
    if( $numofpages * $limit < $totalrows )
    {
      $numofpages++;
    }

    if ($numofpages > 1)
    {
        if($page != 1)
        {
            $pageprev = $page-1;
            $page_string .= $link.$pageprev."\">".lang('previous')."</a>&nbsp;";
        }
        else
        {
            $page_string .= lang('previous')." ";
        }
        for($i = 1; $i <= $numofpages; $i++)
        {
            if($i == $page)
            {
                 $page_string .= $i."&nbsp;";
            }
            else
            {
                 $page_string .= $link.$i."\">$i</a>&nbsp;";
            }
        }
        if(($totalrows - ($limit * $page)) > 0)
        {
            $pagenext = $page+1;
            $page_string .= $link.$pagenext."\">".lang('next')."</a>";
        }
        else
        {
            $page_string .= lang('next')." ";
        }
    }
    return $page_string;
 }

 

require_once(dirname(dirname(__FILE__)).'/lib/smarty/Smarty.class.php');

class Smarty_ModuleInterface extends Smarty {

	function Smarty_ModuleInterface(&$config)
	{
		$this->Smarty();

		global $gCms;
		$config = &$gCms->config;

		$this->template_dir = $config["root_path"].'/tmp/templates/';
		$this->compile_dir = $config["root_path"].'/tmp/templates_c/';
		$this->config_dir = $config["root_path"].'/tmp/configs/';
		$this->cache_dir = $config["root_path"].'/tmp/cache/';
		$this->plugins_dir = array($config["root_path"].'/lib/smarty/plugins/',$config["root_path"].'/plugins/');

		$this->compile_check = true;
		$this->caching = false;
		$this->assign('app_name','CMS');
		$this->debugging = false;
		$this->force_compile = true;
		$this->cache_plugins = false;

		#Load all CMS plugins as non-cacheable
		$dir = dirname(dirname(__FILE__))."/plugins";
		$ls = dir($dir);
		while (($file = $ls->read()) != "") {
			if (is_file("$dir/$file") && (strpos($file, ".") === false || strpos($file, ".") != 0)) {
				if (preg_match("/^(.*?)\.(.*?)\.php/", $file, $matches)) {
					$filename = $this->_get_plugin_filepath($matches[1], $matches[2]);
					if (strpos($filename, 'function') !== false)
					{
						require_once $filename;
						$this->register_function($matches[2], "smarty_cms_function_" . $matches[2], $this->cache_plugins);
					}
					else if (strpos($filename, 'compiler') !== false)
					{
						require_once $filename;
						$this->register_compiler_function($matches[2], "smarty_cms_compiler_" . $matches[2], $this->cache_plugins);
					}
					else if (strpos($filename, 'prefilter') !== false)
					{
						require_once $filename;
						$this->register_prefilter($matches[2], "smarty_cms_prefilter_" . $matches[2]);
					}
					else if (strpos($filename, 'modifier') !== false)
					{
						require_once $filename;
						$this->register_modifier($matches[2], "smarty_cms_modifier_" . $matches[2]);
					}
				}
			}
		}

		$this->register_resource("module", array(&$this, "module_get_template",
						       "module_get_timestamp",
						       "module_get_secure",
						       "module_get_trusted"));
	}

	function module_get_template ($tpl_name, &$tpl_source, &$smarty_obj)
	{

		global $gCms;
		$config = $gCms->config;
		$db = $gCms->db;
		$cmsmodules = $gCms->modules;

		$query = "SELECT t.template_id, t.stylesheet, t.template_content, p.hierarchy, p.content_id FROM ".cms_db_prefix()."content p INNER JOIN ".cms_db_prefix()."templates t ON p.template_id = t.template_id WHERE p.content_id = ?";
		$result = $db->Execute($query, array($tpl_name));

		if ($result && $result->RowCount()) {

			if ($smarty_obj->showtemplate == true)
			{
				$line = $result->FetchRow();

				$tpl_source = $line['template_content'];

				#Perform the content template callback
				foreach($gCms->modules as $key=>$value)
				{
					if (isset($gCms->modules[$key]['content_template_function']) &&
						$gCms->modules[$key]['Installed'] == true &&
						$gCms->modules[$key]['Active'] == true)
					{
						call_user_func_array($gCms->modules[$key]['content_template_function'], array(&$gCms, &$tpl_source));
					}
				}

				#$content = $line['page_content'];
				$title = $line['title'];

				#Perform the content title callback
				foreach($gCms->modules as $key=>$value)
				{
					if (isset($gCms->modules[$key]['content_title_function']) &&
						$gCms->modules[$key]['Installed'] == true &&
						$gCms->modules[$key]['Active'] == true)
					{
						call_user_func_array($gCms->modules[$key]['content_title_function'], array(&$gCms, &$title));
					}
				}

				$template_id = $line['template_id'];

				$gCms->variables['content_id'] = $line['content_id'];
				$gCms->variables['page'] = $line['content_id'];
				$gCms->variables['page_id'] = $line['content_id'];

				$gCms->variables['page_name'] = $tpl_name;
				$gCms->variables['position'] = $line['hierarchy'];

				$stylesheet = '<link rel="stylesheet" type="text/css" href="stylesheet.php?templateid='.$template_id.'" />';

				$tpl_source = ereg_replace("\{stylesheet\}", $stylesheet, $tpl_source);
				$tpl_source = ereg_replace("\{title\}", $title, $tpl_source);

				#So no one can do anything nasty
				if (!(isset($config["use_smarty_php_tags"]) && $config["use_smarty_php_tags"] == true)) {
					$tpl_source = ereg_replace("\{\/?php\}", "", $tpl_source);
				}
			}
			
			#Run the execute_user function and replace {content} with it's output 
			if (isset($gCms->modules[$smarty_obj->module]))
			{
				@ob_start();
				#call_user_func_array($gCms->modules[$smarty_obj->module]['execute_admin_function'], array($gCms,"module_".$module."_"));
				$id = $smarty_obj->id;
				$params = array();
				foreach ($_REQUEST as $key=>$value)
				{
					if (strpos($key, $id) !== FALSE && strpos($key, $id) == 0)
					{
						$key = str_replace($id, '', $key);
						$params[$key] = $value;
					}
				}
				echo $gCms->modules[$smarty_obj->module]['object']->DoAction((isset($_REQUEST[$id.'action'])?$_REQUEST[$id.'action']:'default'), $id, $params, $gCms->variables['page']);
				$modoutput = @ob_get_contents();
				@ob_end_clean();
				if ($smarty_obj->showtemplate == true)
				{
					#Perform the content data callback
					foreach($gCms->modules as $key=>$value)
					{
						if (isset($gCms->modules[$key]['content_data_function']) &&
							$gCms->modules[$key]['Installed'] == true &&
							$gCms->modules[$key]['Active'] == true)
						{
							call_user_func_array($gCms->modules[$key]['content_data_function'], array(&$gCms, &$modoutput));
						}
					}

					$tpl_source = ereg_replace("\{content\}", $modoutput, $tpl_source);
				}
				else
				{
					$tpl_source = $modoutput;
				}
			}

			#Do html_blobs
			$tpl_source = preg_replace_callback("|\{html_blob name=[\'\"]?(.*?)[\'\"]?\}|", "html_blob_regex_callback", $tpl_source);

			#Perform the content prerender callback
			foreach($gCms->modules as $key=>$value)
			{
				$gCms->modules[$key]['object']->ContentPreRender($tpl_source);
			}
			

			return true;
		}
		else {
			return false;
		}
	}

	function module_get_timestamp($tpl_name, &$tpl_timestamp, &$smarty_obj)
	{
		$tpl_timestamp = time();
		return true;
	}

	function module_get_secure($tpl_name, &$smarty_obj)
	{
		// assume all templates are secure
		return true;
	}

	function module_get_trusted($tpl_name, &$smarty_obj)
	{
		// not used for templates
	}
}

# vim:ts=4 sw=4 noet
?>
