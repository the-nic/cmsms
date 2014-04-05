<?php
#CMS - CMS Made Simple
#(c)2004 by Ted Kulp (ted@cmsmadesimple.org)
#Visit our homepage at: http://www.cmsmadesimple.org
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

class microtiny_utils
{

  /**
   * Constructor
   *
   * @since 1.0
   */
  private function __construct() { }

  /**
   * Module API wrapper function
   *
   * @internal
   */
  public static function WYSIWYGGenerateHeader($selector=null, $cssname='')
  {
      static $first_time = true;

      // Check if we are in object instance
      $config = cms_utils::get_config();
      $mod = cms_utils::get_module('MicroTiny');
      if(!is_object($mod)) throw new CmsLogicException('Could not find the microtiny module...');

      $frontend = cmsms()->is_frontend_request();
      $languageid = self::GetLanguageId($frontend);
      $mtime = time() - 300; // by defaul cache for 5 minutes ??

      // get the latest modification time of this cssname
      // if fn does not exist or is older than the modification time, save the config.
      if( $cssname ) {
          try {
              $css = CmsLayoutStylesheet::load($cssname);
              $mtime = $css->get_modified();
          }
          catch( Exception $e ) {
              // couldn't load the stylesheet for some reason.
              $cssname = null;
          }
      }

      // if this is an action for MicroTiny disable caching.
      $smarty = cmsms()->GetSmarty();
      $module = $smarty->get_template_vars('actionmodule');
      if( $module == $mod->GetName() ) $mtime = time() + 60;

      // also disable caching if told to by the config.php
      if( isset($config['mt_disable_cache']) && cms_to_bool($config['mt_disable_cache']) ) $mtime = time()+60;

      $output = '';
      if( $first_time ) {
          // only once per request.
          $first_time = FALSE;
          $output .= '<script type="text/javascript" src="'.$config->smart_root_url().'/modules/MicroTiny/lib/js/tinymce/tinymce.min.js"></script>';
      }

      $fn = cms_join_path(PUBLIC_CACHE_LOCATION,'mt_'.md5(__DIR__.session_id().$frontend.$selector.$cssname.$languageid).'.js');
      if( !file_exists($fn) || filemtime($fn) < $mtime ) {
          // we have to generate an mt config js file.
          self::_save_static_config($fn,$frontend,$selector,$cssname,$languageid);
      }

      //$configurl = $config->smart_root_url().'/tmp/cache/'.$fn.'?t='.time();
      $configurl = $config->smart_root_url().'/tmp/cache/'.basename($fn);
      $output.='<script type="text/javascript" src="'.$configurl.'" defer="defer"></script>';

      return $output;
  }

  private static function _save_static_config($fn, $frontend=false, $selector, $css_name = '', $languageid='')
  {
    if( !$fn ) return;
    $configcontent = self::_generate_config($frontend, $selector, $css_name, $languageid);
    $res = file_put_contents($fn,$configcontent);
    if( !$res ) throw new CmsFileSystemException('Problem writing data to '.$fn);
  }

  /**
   * Generate a tinymce initialization file.
   *
   * @since 1.0
   * @param boolean Frontend true/false
   * @param string Templateid
   * @param string A2 Languageid
   * @return string
   */
  private static function _generate_config($frontend=false, $selector = null, $css_name = null, $languageid="en")
  {
    $mod = cms_utils::get_module('MicroTiny');
    $config = cms_utils::get_config();
    $smarty = cmsms()->GetSmarty();
    $smarty->assign('MicroTiny',$mod);
    $smarty->clear_assign('mt_profile');
    $smarty->clear_assign('mt_selector');
    $smarty->assign('mt_actionid','m1_');
    $smarty->assign('isfrontend',$frontend);
    $smarty->assign('languageid',$languageid);
    if( $selector ) $smarty->assign('mt_selector',$selector);

    try {
      $profile = null;
      if( $frontend ) {
	$profile = microtiny_profile::load(MicroTiny::PROFILE_FRONTEND);
      }
      else {
	$profile = microtiny_profile::load(MicroTiny::PROFILE_ADMIN);
      }

      $smarty->assign('mt_profile',$profile);
      $stylesheet = (int)$profile['dfltstylesheet'];
      if( $stylesheet < 1 ) $stylesheet = null;
      if( $profile['allowcssoverride'] && $css_name ) $stylesheet = $css_name;
      if( $stylesheet ) $smarty->assign('mt_cssname',$stylesheet);
    }
    catch( Exception $e ) {
      // oops, we gots a problem.
      die($e->Getmessage());
    }

    $result = $mod->ProcessTemplate('tinymce_config.js');
    return $result;
  }

  /**
   * Convert users current language to something tinymce can prolly understand (hopefully).
   *
   * @since 1.0
   * @return string
   */
  private static function GetLanguageId() {
    $mylang = CmsNlsOperations::get_current_language();
    if ($mylang=="") return "en"; //Lang setting "No default selected"
    $shortlang = substr($mylang,0,2);

    $mod = cms_utils::get_module('MicroTiny');
    $dir = $mod->GetModulePath().'/lib/js/tinymce/langs';
    $langs = array();
    {
        $files = glob($dir.'/*.js');
        if( is_array($files) && count($files) ) {
            foreach( $files as $one ) {
                $one = basename($one);
                $one = substr($one,0,-3);
                $langs[] = $one;
            }
        }
    }

    if( in_array($mylang,$langs) ) return $mylang;
    if( in_array($shortlang,$langs) ) return $shortlang;
    return 'en';
  }

  /**
   * Get an img tag for a thumbnail file if one exists.
   *
   * @since 1.0
   * @param string $file
   * @param string $path
   * @param string $url
   * @return string
   */
  public static function GetThumbnailFile($file,$path,$url)
  {
    $image='';
    $imagepath = self::Slashes($path."/thumb_".$file);
    $imageurl = self::Slashes($url."/thumb_".$file);
    if (!file_exists($imagepath)) {
      $image='';
    } else {
      $image="<img src='".$imageurl."' alt='".$file."' title='".$file."' />";
    }
    return $image;
  }

  /**
   * Fix Slashes
   *
   * @since 1.0
   * @return string
   */
  private static function Slashes($url)
  {
    $result=str_replace("\\","/",$url);
    return $result;
  }

} // end of class

#
# EOF
#
?>
