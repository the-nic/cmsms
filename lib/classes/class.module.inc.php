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

/**
 * Base module class.
 *
 * All modules should inherit and extend this class with their functionality.
 *
 * @since		0.9
 * @package		CMS
 */
class CMSModule extends ModuleOperations
{
	/**
	 * ------------------------------------------------------------------
	 * Basic Functions.  Name and Version MUST be overridden.
	 * ------------------------------------------------------------------
	 */

	/**
	 * Returns the name of the module
	 */
	function GetName()
	{
		return 'unset';
	}

	/**
	 * Returns the version of the module
	 */
	function GetVersion()
	{
		return '0.0.0.1';
	}

	/**
	 * Returns the help for the module
	 *
	 * @param string Optional language that the admin is using.  If that language
	 * is not defined, use en_US.
	 */
	function GetHelp($lang = 'en_US')
	{
		return '';
	}

	/**
	 * Returns a short description of the module
	 *
	 * @param string Optional language that the admin is using.  If that language
	 * is not defined, use en_US.
	 */
	function GetDescription($lang = 'en_US')
	{
		return '';
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
	function GetAuthorName()
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
		return FALSE;
	}

	/**
	 * Function to perform any upgrade procedures. This is mostly used to for
	 * updating databsae tables, but can do other duties as well. It should
	 * return a string message if there is a failure. Returning nothing (FALSE)
	 * will allow the upgrade procedure to proceed. Upgrades should have a path
	 * so that they can be upgraded from more than one version back.  While not
	 * a requirement, it makes like easy for your users.
	 *
	 * @param string The version we are upgrading from
	 * @param string The version we are upgrading to
	 */
	function Upgrade($oldversion, $newversion)
	{
		return FALSE;
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
	 * Return true if there is an admin for the module.  Returns false by
	 * default.
	 */
	function HasAdmin()
	{
		return false;
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
	 * {cms_module module='name'}.  Returns false by default.
	 */
	function IsPluginModule()
	{
		return false;
	}

	/**
	 * ------------------------------------------------------------------
	 * Login Related Functions
	 * ------------------------------------------------------------------
	 */
	
	/**
	 * Called after a successful login.  It sends the user object.
	 *
	 * @param User The user that just logged in
	 */
	function LoginPost(&$user)
	{
	}

	/**
	 * Called after a successful logout.  It sends the user object.
	 *
	 * @param User The user that just logged in
	 */
	function LogoutPost(&$user)
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
	 * ------------------------------------------------------------------
	 * Group Related Functions
	 * ------------------------------------------------------------------
	 */

	/**
	 * Called before a group is added to the database.  Sends the group object.
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
	 * Called before a group is saved to the database.  Sends the group object.
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
	 * ------------------------------------------------------------------
	 * HTML Blob Related Functions
	 * ------------------------------------------------------------------
	 */

	/**
	 * Called before an HTML blob is added to the database.  Sends the html blob
	 * object.
	 *
	 * @param HtmlBlob The HTML blob that was just created
	 */
	function AddHtmlBlobPre(&$htmlblob)
	{
	}

	/**
	 * Called after an HTML blob is added to the database.  Sends the html blob
	 * object.
	 *
	 * @param HtmlBlob The HTML blob that was just created
	 */
	function AddHtmlBlobPost(&$htmlblob)
	{
	}

	/**
	 * Called before an HTML blob is saved to the database.  Sends the html blob
	 * object.
	 *
	 * @param HtmlBlob The HTML blob that was just edited
	 */
	function EditHtmlBlobPre(&$htmlblob)
	{
	}

	/**
	 * Called after an HTML blob is saved to the database.  Sends the html blob
	 * object.
	 *
	 * @param HtmlBlob The HTML blob that was just edited 
	 */
	function EditHtmlBlobPost(&$htmlblob)
	{
	}

	/**
	 * ------------------------------------------------------------------
	 * Content Related Functions
	 * ------------------------------------------------------------------
	 */
	
	/**
	 * Called with the content of the template before content, html blobs, etc
	 * are pasted in.
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
	 * @param string The title text
	 */
	function ContentTitle(&$title)
	{
	}

	/**
	 * Called with the content data before it is pasted into the template.
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
	 * @param string The html blob text
	 */
	function ContentHtmlBlob(&$htmlblob)
	{
	}

	/**
	 * Called before the pasted together template/content/html blobs/etc are
	 * sent to smarty for processing.
	 *
	 * @param string The prerendered text
	 */
	function ContentPreRender(&$content)
	{
	}

	/**
	 * Called after content is sent to smarty for processing and right before
	 * display.  Cached content will still call this function before display.
	 *
	 * @param string The postrendered text
	 */
	function ContentPostRender(&$content)
	{
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
	 * Returns content destined for the <form> tag.  It's useful if javascript is
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
	 * Returns the textarea specific for this WYSIWYG.
	 *
	 * @param string HTML name of the textarea
	 * @param int Number of columns wide that the textarea should be
	 * @param int Number of rows long that the textarea should be
	 * @param string Encoding of the content
	 * @param string Content to show in the textarea
	 * @param string Stylesheet for content, if available
	 */
	function WYSIWYGTextarea($name='textarea',$columns='80',$rows='15',$encoding='',$content='',$stylesheet='')
	{
		return '<textarea name="'.$name.'" cols="'.$columns.'" rows="'.$rows.'">'.$content.'</textarea>';
	}

	/**
	 * ------------------------------------------------------------------
	 * Navigation Related Functions
	 * ------------------------------------------------------------------
	 */

	/**
	 * Used for navigation between "pages" of a module.  Forms and links should
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
	function DoAction($name, $id, $parameters)
	{
		return '';
	}
}

/**
 * "Static" module functions for internal use and module development.  CMSModule
 * extends this so that it has internal access to the functions.
 *
 * @since		0.9
 * @package		CMS
 */
class ModuleOperations
{
}

# vim:ts=4 sw=4 noet
?>
