<?php // -*- mode:php; tab-width:4; indent-tabs-mode:t; c-basic-offset:4; -*-
#CMS - CMS Made Simple
#(c)2004-2012 by Ted Kulp (wishy@users.sf.net)
#This project's homepage is: http://www.cmsmadesimple.org
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
#$Id: content.functions.php 6863 2011-01-18 02:34:48Z calguy1000 $

/**
 * @package CMS
 */

/**
 * A simple class for handling layout templates as a resource.
 *
 * @package CMS
 * @author Robert Campbell
 * @internal
 * @ignore
 * @copyright Copyright (c) 2012, Robert Campbell <calguy1000@cmsmadesimple.org>
 * @since 1.12
 */
class CmsTemplateResource extends CMS_Fixed_Resource_Custom
{
	private $_section;

	public function __construct($section = '')
	{
		if( in_array($section,array('top','head','body')) ) $this->_section = $section;
	}

	protected function buildUniqueResourceName(Smarty $smarty,$resource_name)
	{
		return parent::buildUniqueResourceName($smarty,$resource_name).'--'.$this->_section;
	}

	private function &get_template($name)
	{
		return CmsLayoutTemplate::load($name);
	}

	protected function fetch($name,&$source,&$mtime)
	{
		if( is_sitedown() && cmsms()->is_frontend_request() ) {
			$source = '';
			$mtime = time();
			if( $this->_section == 'body' ) {
				header('HTTP/1.0 503 Service Unavailable');
				header('Status: 503 Service Unavailable');
				$source = get_site_preference('sitedownmessage');
			}
			return;
		}

		if( $name == 'notemplate' ) {
			$source = '{content}';
			$mtime = time(); // never cache...
			return;
		}
		else if( startswith($name,'appdata;') ) {
			$name = substr($name,8);
			$source = cms_utils::get_app_data($name);
			$mtime = time();
			return;
		}

		$source = '';
		$mtime = null;

		$tpl = $this->get_template($name);
		if( !is_object($tpl) ) return;

		switch( $this->_section ) {
		case 'top':
			$mtime = $tpl->get_modified();
			$pos1 = stripos($tpl->get_content(),'<head');
			$pos2 = stripos($tpl->get_content(),'<header');
			if( $pos1 === FALSE || $pos1 == $pos2 ) return;
			$source = substr($tpl->get_content(),0,$pos1);
			return;

		case 'head':
			$mtime = $tpl->get_modified();
			$pos1 = stripos($tpl->get_content(),'<head');
			$pos1a = stripos($tpl->get_content(),'<header');
			$pos2 = stripos($tpl->get_content(),'</head>');
			if( $pos1 === FALSE || $pos1 == $pos1a || $pos2 === FALSE ) return;
			$source = substr($tpl->get_content(),$pos1,$pos2-$pos1+7);
			return;

		case 'body':
			$mtime = $tpl->get_modified();
			$pos = stripos($tpl->get_content(),'</head>');
			if( $pos !== FALSE ) {
				$source = substr($tpl->get_content(),$pos+7);
			}
			else {
				$source = $tpl->get_content();
			}
			return;

		default:
			$source = $tpl->get_content();
			$mtime = $tpl->get_modified();
			return;
		}
	}

	public static function page_type_lang_callback($key)
	{
		if( $key == '__CORE__' ) return 'Core';
		return lang($key);
	}

	public static function reset_page_type_defaults()
	{
		$config = cmsms()->GetConfig();
		$file = cms_join_path($config['admin_path'],'templates','orig_new_template.tpl');
		$contents = '';
		if( is_file($file) ) {
			$contents = @file_get_contents($file);
		}
		return $contents;
	}

} // end of class

#
# EOF
#
# vim:ts=4 sw=4 noet
?>