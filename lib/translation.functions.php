<?php
#CMS - CMS Made Simple
#(c)2004 by Ted Kulp (wishy@users.sf.net)
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
#$Id: translation.functions.php 7429 2011-09-22 23:42:59Z calguy1000 $

/**
 * Translation functions/classes
 *
 * @package CMS
 */

/**
 * A function to attempt to find a language given browser settings
 *
 * @internal
 * @return string
 */
function cms_detect_browser_lang()
{
  $gCms = cmsms();
  $nls =& $gCms->nls;
  $curlang = '';

  # take a stab at figuring out the default language...
  # Figure out default language and set it if it exists
  if (isset($_SERVER["HTTP_ACCEPT_LANGUAGE"])) 
    {
      $alllang = $_SERVER["HTTP_ACCEPT_LANGUAGE"];
      if (strpos($alllang, ";") !== FALSE)
	$alllang = substr($alllang,0,strpos($alllang, ";"));
      $langs = explode(",", $alllang);
	  
      foreach ($langs as $onelang)
	{
	  // Check to see if lang exists...
	  if (isset($nls['language'][$onelang]))
	    {
	      $curlang = $onelang;
	      break;
	    }
#Check to see if alias exists...
	  if (isset($nls['alias'][$onelang]))
	    {
	      $alias = $nls['alias'][$onelang];
	      if (isset($nls['language'][$alias]))
		{
		  $curlang = $alias;
		  break;
		}
	    }
	}
    }

  return $curlang;
}

/** 
 * A function to initialize the nls array
 *
 * @internal
 * @return void
 */
function cms_initialize_nls()
{
	#Read in all current languages...
  $gCms = cmsms();
	$nls =& $gCms->nls;

	if( !is_array($nls) || count($nls) == 0 )
	{
		$nls = array();
		$dir = cms_join_path($gCms->config['root_path'],$gCms->config['admin_dir'],'/lang');
		$handle = opendir($dir);
		while ($handle && false !== ($file = readdir($handle))) {
			if (is_file("$dir/$file") && strpos($file, "nls.php") != 0) {
				include("$dir/$file");
			}
		}
		closedir($handle);
	}
}

/**
 * A function to temporarily set the current admin language
 *
 * @since 1.10
 * @internal
 * @return boolean
 */
function cms_set_admin_language($new_lang = '')
{
  $gCms = cmsms();
  $nls =& $gCms->nls;

  if( $new_lang == '' ) 
    {
      cms_utils::set_app_data('cms_admin_lang','');
      return TRUE;
    }
  if( isset($nls['language'][$new_lang]) || isset($nls['alias'][$new_lang]) )
    {
      cms_utils::set_app_data('cms_admin_lang',$new_lang);
      return TRUE;
    }
  return FALSE;
}

/**
 * A function to return the current admin language
 *
 * @internal
 * @return string
 */
function cms_admin_current_language()
{
  $gCms = cmsms();
  $nls =& $gCms->nls;
  $lang = array();
  $current_language = '';

  cms_initialize_nls();

  if( cms_utils::get_app_data('cms_admin_lang') != '' )
    {
      $current_language = cms_utils::get_app_data('cms_admin_lang');
    }
  else
    {
      $uid = get_userid(false);
      if( $uid )
	{
	  // user is logged in (this is after the admin login)
	  // get his preference.
	  $current_language = get_preference(get_userid(false),'default_cms_language');
	  if( $current_language == '' || 
	      (!isset($nls['language'][$current_language]) && !isset($nls['alias'][$current_language])) )
	    {
	      // preferred lang doesn't exist
	      $current_language = '';
	    }
	}
      
      if ($current_language == '')
	{
	  // still nothing, see if we can get something from the browser.
	  $current_language = cms_detect_browser_lang();
	}
    }

  if (isset($_POST['change_cms_lang']) && isset($_POST['default_cms_lang']) )
    {
      // a hack to handle the editpref case of the user changing his language
      // this is needed because the lang stuff is included before the preference may
      // actually be set.
      $a1 = basename(trim($_POST['change_cms_lang']));
      $a2 = basename(trim($_POST['default_cms_lang']));
      if( $a1 == $a2 && 
	  (isset($nls['language'][$a1]) || isset($nls['alias'][$a1])) )
	{
	  $current_language = $a1;
	}
    }

  // if it's still not set, this will use the 
  // current locale.. maybe we should hardcode to en_US ??
  return $current_language;
}


/**
 * Temporarily override the current frontend language
 *
 * @string lang, the language to set.  If empty, the system will be restored to the default frontend language.
 */
function cms_set_frontend_language($lang = '')
{
  $gCms = cmsms();
  if( empty($lang) )
    {
      unset($gCms->variables['cms_frontend_cur_language']);
    }
  else if( isset($gCms->nls['language'][$lang]) || isset($gCms->nls['alias'][$lang]) )
    {
      // todo: check here if the language exists.
      $gCms->variables['cms_frontend_cur_language'] = $lang;
    }
}


/**
 * A function to return the current frontend language
 *
 * @internal
 * @return string
 */
function cms_frontend_current_language()
{
  cms_initialize_nls();

  $gCms = cmsms();
  if( isset($gCms->variables['cms_frontend_cur_language']) )
    {
      return $gCms->variables['cms_frontend_cur_language'];
    }

  $curlang = get_site_preference('frontendlang','');
  if( $curlang == '' ) {
    $curlang = 'en_US';
  }

  return $curlang;
}


/**
 * A function to return the current language for the current request
 *
 * @internal
 * @return string
 */
function cms_current_language()
{
  global $CMS_ADMIN_PAGE;
  global $CMS_STYLESHEET;
  global $CMS_INSTALL_PAGE;

  if (isset($CMS_ADMIN_PAGE) || isset($CMS_STYLESHEET) || isset($CMS_INSTALL_PAGE))
    {
      return cms_admin_current_language();
    }
  return cms_frontend_current_language();
}



/**
 * Load a lang file for a specific realm.
 *
 * @since 1.8
 * @internal
 * @param string The realm
 * @param string An optional base directory
 * @param boolean Indicates that the language is indicated by the directory name
 * @param boolean Indicates that the lang file has a sub array for the realm.
 * @param string  The alternate language to load.  If not specified the current language will be used.
 * @return void
 */
function cms_load_lang_realm($realm,$basedir = '',$filename = '',$lang_is_dir = 0,$has_realm = 0, $is_custom = 0, $cur_lang = '')
{
  $gCms = cmsms();
  if( empty($cur_lang) )
    {
      $cur_lang = cms_current_language();
    }

  $all_langs = cms_utils::get_app_data('cms_loaded_realms');
  if( $all_langs == '' )
    {
      // nothing loaded.
      $all_langs = array();
    }
  if( !isset($all_langs[$cur_lang]) )
    {
      $all_langs[$cur_lang] = array();
    }
  
  if( empty($realm) ) return fALSE;
  if( isset($all_langs[$cur_lang][$realm]) ) return; // already loaded.
  
  if( empty($basedir) )
    {
      $basedir = cms_join_path($gCms->config['root_path'],'lib','lang',$realm);
    }
  if( empty($filename) )
    {
      $filename = 'en_US.php';
    }


  // load the default (en_US) file first.
  $fn = cms_join_path($basedir,$filename);
  if( $lang_is_dir )
    {
      $fn = cms_join_path($basedir,'en_US',$filename);
    }
  if( !file_exists($fn) ) return FALSE;
  {
    $lang = array();
    if( !$has_realm )
      {
	// the lang file doesn't create a realm array
	if( isset($all_langs[$cur_lang][$realm]) )
	  {
	    $lang = $all_langs[$cur_lang][$realm];
	  }
	include($fn);
	$all_langs[$cur_lang][$realm] = $lang;
      }
    else
      {
	// the lang file defines the realm array itself.
	$lang = array();
	include($fn);
	foreach( array_keys($lang) as $t_realm )
	  {
	    if( !is_array($lang[$t_realm]) ) continue;
	    $all_langs[$cur_lang][$t_realm] = $lang[$t_realm];
	  }
      }
    unset($lang);
    if( !isset($all_langs[$cur_lang][$realm]) ) return FALSE;
  }
  
  // now load the lang file itself.
  if( $cur_lang != 'en_US' )
    {
      $t_lang = basename($cur_lang);
      $fn = cms_join_path($basedir,'ext',$t_lang.'.php');
      if( $lang_is_dir && ! $is_custom)
	{
	  $fn = cms_join_path($basedir,'ext',$t_lang,$filename);
	}
      else if ($lang_is_dir && $is_custom)
	{
	  $fn = cms_join_path($basedir,$t_lang,$filename);
	}
      if( @file_exists($fn) )
	{
	  $lang = array();
	  if( !$has_realm )
	    {
	      // the lang file doesn't create a realm array
	      include($fn);
	      if( !isset($all_langs[$cur_lang][$realm]) )
		{
		  $all_langs[$cur_lang][$realm] = $lang;
		}
	      else
		{
		  $all_langs[$cur_lang][$realm] = array_merge($all_langs[$cur_lang][$realm],$lang);
		}
	    }
	  else
	    {
	      // the lang file defines the realm array itself.
	      include($fn);
	      foreach( array_keys($lang) as $t_realm )
		{
		  if( !is_array($lang[$t_realm]) ) continue;
		  $all_langs[$cur_lang][$t_realm] = array_merge($all_langs[$cur_lang][$t_realm],$lang[$t_realm]);
		}
	    }
	  unset($lang);
	  if( !isset($all_langs[$cur_lang][$realm]) ) return FALSE;
	}
    }

  cms_utils::set_app_data('cms_loaded_realms',$all_langs);
  return TRUE;
}


/**
 * A method to return a translation for a specific string in a specific realm.
 * called with the realm first, followed by the key, this method will attempt
 * to load the specific realm data if necessary before doing translation.
 *
 * This method accepts a variable number of arguments.  Any arguments after
 * the realm and the key are passed to the key via vsprintf
 *
 * i.e: lang_by_realm('tasks','my_string');
 *
 * @since 1.8
 * @param string The realm
 * @param string The lang key
 * @return string
 */
function lang_by_realm()
{
  $gCms = cmsms();
  $name = '';
  $realm = 'admin';
  $params = array();
  $result = '';

  $num = func_num_args();
  if( $num == 0 ) return '';

  $name = func_get_arg(0);
  if( $num > 1 )
    {
      $realm = func_get_arg(1);
      
      if( $num > 2 && is_array(func_get_arg(2)) )
	{
	  $params = func_get_arg(2);
	}
      else if( $num > 2 )
	{
	  $params = array_slice(func_get_args(), 2);
	}
    }

  // we now have a name, a realm, and possible additonal arguments.
  cms_load_lang_realm($realm);
  $all_langs = cms_utils::get_app_data('cms_loaded_realms');
  $cur_lang = cms_current_language();

  // do processing.
  if( is_array($all_langs) && isset($all_langs[$cur_lang]) && isset($all_langs[$cur_lang][$realm]) && isset($all_langs[$cur_lang][$realm][$name]) )
    {
      $lang = $all_langs[$cur_lang];
      if (count($params))
	{
	  $result = vsprintf($lang[$realm][$name], $params);
	}
      else
	{
	  $result = $lang[$realm][$name];
	}
    }
  else
    {
      $result = "--Add Me - $name --";
    }

  // conversion.
  if (isset($gCms->config['admin_encoding']) && isset($gCms->variables['convertclass']))
    {
      if (strcasecmp(get_encoding('', false),$gCms->config['admin_encoding']) )
	{
	  $class =& $gCms->variables['convertclass'];
	  $result = $class->Convert($result, get_encoding('', false), $gCms->config['admin_encoding']);
	}
    }

  return $result;

}

/**
 * Temporarily allow accessing admin realm from within a frontend action.
 */
function allow_admin_lang($flag = TRUE)
{
  cms_utils::set_app_data('__allow_admin_realm__',$flag);
  if( !$flag )
    {
      global $lang;
      if( isset($lang['admin']) ) unset($lang['admin']);
    }
}

/**
 * Return a translated string for the default 'admin' realm.
 * This function is merely a wrapper around the lang_by_realm function
 * that assumes the realm is 'admin'.
 *
 * This method will throw a notice if it is called from a frontend request
 *
 * @param string The key to translate
 * @return string
 */
function lang()
{
  // uses the default admin realm.
  $gCms = cmsms();
  $nls =& $gCms->nls;

  $dir = cms_join_path($gCms->config['root_path'],$gCms->config['admin_dir'],'lang');
  $customdir = cms_join_path($gCms->config['root_path'],$gCms->config['admin_dir'],'custom','lang');
  
  cms_load_lang_realm('admin',$dir,'admin.inc.php',1,1);
  cms_load_lang_realm('admin',$customdir,'admin.inc.php',1,1,1);			

  $name = '';
  $params = array();
  $realm = 'admin';
  
  if (func_num_args() > 0)
    {
      $name = func_get_arg(0);
      if (func_num_args() == 2 && is_array(func_get_arg(1)))
	{
	  $params = func_get_arg(1);
	}
      else if (func_num_args() > 1)
	{
	  $params = array_slice(func_get_args(), 1);
	}
    }
  else
    {
      return '';
    }
  
  // quick test to see if we are on the frontend or admin.
  global $CMS_ADMIN_PAGE;
  global $CMS_STYLESHEET;
  global $CMS_INSTALL_PAGE;
  
  $flag = cms_utils::get_app_data('__allow_admin_realm__');
  if (!isset($CMS_ADMIN_PAGE) && !isset($CMS_STYLESHEET) && !isset($CMS_INSTALL_PAGE) && !$flag )
    {
      trigger_error('Attempt to load admin realm from non admin action');
      return '';
    }
  
  // todo:
  return lang_by_realm($name,'admin',$params);
}


/**
 * A method to return a translation for a specific string in a specific realm.
 * called with the realm first, followed by the key, this method will attempt
 * to load the specific realm data if necessary before doing translation.
 *
 * This method accepts a variable number of arguments.  Any arguments after
 * the realm and the key are passed to the key via vsprintf
 *
 * i.e: lang_by_realm('tasks','my_string');
 *
 * @since 1.8
 * @param string The realm
 * @param string The lang key
 * @return string
 */
function lang_by_realm_en()
{
  $gCms = cmsms();
  global $lang;

  $name = '';
  $realm = 'admin';
  $params = array();
  $result = '';

  $num = func_num_args();
  if( $num == 0 ) return '';

  $name = func_get_arg(0);
  if( $num > 1 )
    {
      $realm = func_get_arg(1);
      
      if( $num > 2 && is_array(func_get_arg(2)) )
	{
	  $params = func_get_arg(2);
	}
      else if( $num > 2 )
	{
	  $params = array_slice(func_get_args(), 2);
	}
    }

  // we now have a name, a realm, and possible additonal arguments.
  if( !isset($lang[$realm]) )
    {
      $saved_lang = $lang;
      $lang = array();
      cms_load_lang_realm($realm,NULL,NULL,NULL,NULL,NULL,'en_US');
    }

  // do processing.
  if (isset($lang[$realm][$name]))
    {
      if (count($params))
	{
	  $result = vsprintf($lang[$realm][$name], $params);
	}
      else
	{
	  $result = $lang[$realm][$name];
	}
    }
  else
    {
      $result = "--Add Me - $name --";
    }

  // conversion.
  if (isset($gCms->config['admin_encoding']) && isset($gCms->variables['convertclass']))
    {
      if (strcasecmp(get_encoding('', false),$gCms->config['admin_encoding']) )
	{
	  $class =& $gCms->variables['convertclass'];
	  $result = $class->Convert($result, get_encoding('', false), $gCms->config['admin_encoding']);
	}
    }
  $lang = $saved_lang;
  return $result;

}
/**
 * Return a translated string for the default 'admin' realm.
 * This function is merely a wrapper around the lang_by_realm function
 * that assumes the realm is 'admin'.
 *
 * This method will throw a notice if it is called from a frontend request
 *
 * @param string The key to translate
 * @return string
 */
function lang_en()
{
  // uses the default admin realm.
	$gCms = cmsms();
	global $lang;
	$nls =& $gCms->nls;

	$dir = cms_join_path($gCms->config['root_path'],$gCms->config['admin_dir'],'lang');
	$customdir = cms_join_path($gCms->config['root_path'],$gCms->config['admin_dir'],'custom','lang');
	
	$saved_lang = $lang;
	$lang = array();
	if( !isset($lang['admin']) )
	  {
	    cms_load_lang_realm('admin',$dir,'admin.inc.php',1,1,0,'en_US');
	    cms_load_lang_realm('admin',$customdir,'admin.inc.php',1,1,1,'en_US');			
	  }
	$name = '';
	$params = array();
	$realm = 'admin';

	if (func_num_args() > 0)
	{
		$name = func_get_arg(0);
		if (func_num_args() == 2 && is_array(func_get_arg(1)))
		{
			$params = func_get_arg(1);
		}
		else if (func_num_args() > 1)
		{
			$params = array_slice(func_get_args(), 1);
		}
	}
	else
	{
		return '';
	}

	// quick test to see if we are on the frontend or admin.
	global $CMS_ADMIN_PAGE;
	global $CMS_STYLESHEET;
	global $CMS_INSTALL_PAGE;

	if (!isset($CMS_ADMIN_PAGE) && !isset($CMS_STYLESHEET) && !isset($CMS_INSTALL_PAGE))
	  {
	    trigger_error('Attempt to load admin realm from non admin action');
	    return '';
	  }

	// todo:
	$result = lang_by_realm($name,'admin',$params);
	$lang = $saved_lang;
	return $result;
}

function get_encoding($charset='', $defaultoverrides=true)
{
	global $current_language;
	$gCms = cmsms();
	$variables =& $gCms->variables;
	$config = $gCms->GetConfig();
	$nls =& $gCms->nls;

	if ($charset != '')
	{
		return $charset;
	}
        else if (isset($variables['current_encoding']) && $variables['current_encoding'] != "" )
        {
	  return $variables['current_encoding'];
        }
	else if (isset($config['default_encoding']) && $config['default_encoding'] != "" && $defaultoverrides == true)
	{
		return $config['default_encoding'];
	}
	else if (isset($nls['encoding'][$current_language]))
	{
		return $nls['encoding'][$current_language];
	}
	else
	{
		return "UTF-8"; //can't hurt
	}
}


/**
 * Set the current encoding
 *
 * @internal
 * @access private
 */
function set_encoding($charset)
{
  $gCms = cmsms();
  $variables =& $gCms->variables;
  
  if( $charset == '' ) 
    {
      if( isset($variables['current_encoding']) )
	unset($variables['current_encoding']);
      return;
    }
  $variables['current_encoding'] =  $charset;
}

/**
 * Test wether a string is valid UTF-8
 *
 * @internal
 * @param string The string to test
 * @return boolean
 */
function is_utf8($string)
{
   // From http://w3.org/International/questions/qa-forms-utf-8.html
   return preg_match('%^(?:
         [\x09\x0A\x0D\x20-\x7E]            # ASCII
       | [\xC2-\xDF][\x80-\xBF]            # non-overlong 2-byte
       |  \xE0[\xA0-\xBF][\x80-\xBF]        # excluding overlongs
       | [\xE1-\xEC\xEE\xEF][\x80-\xBF]{2}  # straight 3-byte
       |  \xED[\x80-\x9F][\x80-\xBF]        # excluding surrogates
       |  \xF0[\x90-\xBF][\x80-\xBF]{2}    # planes 1-3
       | [\xF1-\xF3][\x80-\xBF]{3}          # planes 4-15
       |  \xF4[\x80-\x8F][\x80-\xBF]{2}    # plane 16
   )*$%xs', $string);
   
} // function is_utf8


function get_language_list($allow_none = true)
{
  $tmp = array();
  if( $allow_none )
    {
      $tmp = array(''=>lang('nodefault'));
    }

  $gCms = cmsms();
  $config = $gCms->GetConfig();
  $nls = $gCms->nls;
  asort($nls["language"]);
  foreach( $nls['language'] as $key=>$value )
    {
      if( is_dir($config['root_path'].'/'.$config['admin_dir'].'/lang/ext/'.$key) ||
	  is_dir($config['root_path'].'/'.$config['admin_dir'].'/lang/'.$key) ||
	  file_exists($config['root_path'].'/'.$config['admin_dir'].'/lang/'.$key.'/admin.inc.php') )
	{
	  if( isset($nls['englishlang'][$key]) )
	    {
	      $value .= ' ('.$nls['englishlang'][$key].')';
	    }
	  $tmp[$key] = $value;
	}
    }

  return $tmp;
}

# vim:ts=4 sw=4 noet
?>
