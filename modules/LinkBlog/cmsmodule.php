<?php
#Linkblog - a module for CMS - CMS Made Simple
#Copyright (c) 2004 by Greg Froese <heavy_g@users.sf.net>
#
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

//Set the module name -- should be the name of the class
$module_name = "LinkBlog";

//Load functions
require_once(dirname(__FILE__)."/modulefunctions.php");

//Register Module
cms_mapi_register_module($module_name, "Greg Froese <heavy_g@users.sf.net>", "1.5");

//Register module to work as a plugin (cms_module)
cms_mapi_register_plugin_module($module_name);

//Register callback functions
cms_mapi_register_install_function($module_name, 'linkblog_module_install');
cms_mapi_register_uninstall_function($module_name, 'linkblog_module_uninstall');
cms_mapi_register_execute_function($module_name, 'linkblog_module_execute');
cms_mapi_register_executeuser_function($module_name, 'linkblog_module_executeuser');
cms_mapi_register_executeadmin_function($module_name, 'linkblog_module_executeadmin');
cms_mapi_register_help_function($module_name, 'linkblog_module_help');
cms_mapi_register_about_function($module_name, 'linkblog_module_about');
cms_mapi_register_upgrade_function($module_name, 'linkblog_module_upgrade', true);
# vim:ts=4 sw=4 noet
?>
