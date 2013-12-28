<?php
#CMS - CMS Made Simple
#(c)2004 by Ted Kulp (ted@cmsmadesimple.org)
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

class microtiny_utils 
{

  static private $_theme_id;

  /**
   * Constructor
   *
   * @since 1.0
   */	
  public function __construct() { }

  /**
   * Module API wrapper function
   *
   * @since 1.0
   * @return string
   */		
  static public function WYSIWYGGenerateHeader($htmlresult='', $junk=false) 
  {
    // Check if we are in object instance
    $mod = cms_utils::get_module('MicroTiny');
    if(!is_object($mod)) throw new CmsLogicException('Could not find the microtiny module...');

    $frontend = cmsms()->is_frontend_request();
    $languageid = self::GetLanguageId($frontend);

    $fn = self::SaveStaticConfig($frontend,'',$languageid);

    $config = cms_utils::get_config();
    $output = '';
    $output .= '<script type="text/javascript" src="'.$config->smart_root_url().'/modules/MicroTiny/tinymce/tinymce.min.js"></script>';
    $configurl = $config->smart_root_url().'/tmp/cache/'.$fn.'?t='.time();
    $output.='<script type="text/javascript" src="'.$configurl.'" defer="defer"></script>';

    return $output;
  }	

  /**
   * Save Static configuration
   *
   * This function generates the microtiny initialization js file and returns its filename.
   *
   * @since 1.0
   * @param boolean $frontend	
   * @param string $templateid	
   * @param string $languageid	
   * @return string
   * @deleteme
   */		
  private static function SaveStaticConfig($frontend=false, $themeid='', $languageid='') 
  { 
    $configcontent = self::GenerateConfig($frontend, $themeid, $languageid);
    $fn = cms_join_path(PUBLIC_CACHE_LOCATION,'mt_'.md5(session_id().$frontend.$themeid.$languageid).'.js');
    $res = file_put_contents($fn,$configcontent);
    if( !$res ) return;
    return basename($fn);
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
  static private function GenerateConfig($frontend=false, $themeid="", $languageid="en") 
  {
    $mod = cms_utils::get_module('MicroTiny');

    // Init
    $config = cms_utils::get_config();	

    $smarty = cmsms()->GetSmarty();
    $smarty->assign('resize',($mod->GetPreference('allow_resize',1))?'true':'false');
    $smarty->assign('statusbar',($mod->GetPreference('show_statusbar',1))?'true':'false');
    $smarty->assign('isfrontend',$frontend);
    $smarty->assign('themeid',$themeid);
    $smarty->assign('languageid',$languageid);

    $result = $mod->ProcessTemplate('tinymce_config.tpl');
    return $result;
  }

  /**
   * Generates TinyMCE Entry object
   *
   * @since 1.0
   * @param string $menu
   * @param string $entry
   * @return string
   */	
  public static function AddEntry($menu,$entry) 
  {
    // Check if we are in object instance
    $mod = cms_utils::get_module('MicroTiny');
    if(!is_object($mod)) return false; // TODO: some error?

    // Init
    $config = cms_utils::get_config();
    $link="";
    $result="";

    $menutext=$entry->Hierarchy()." ".$entry->MenuText();
    if (strlen($menutext)>30) {
      $menutext=htmlspecialchars(substr($menutext,0,30),ENT_QUOTES)." &#133;";
    } else {
      $menutext=htmlspecialchars($menutext,ENT_QUOTES);
    }
    $result.=" ".$menu.".add({title : '".$menutext."', onclick : function() {
      var sel=tinyMCE.activeEditor.selection.getContent();
      if (sel=='') sel='".htmlspecialchars($entry->MenuText(),ENT_QUOTES)."';";
    $href="'".$entry->Alias()."'";
    $result.="tinyMCE.activeEditor.execCommand('mceInsertContent', false, \"<a href=\\\"{cms_selflink href=".$href."}\\\">\"+sel+\"</a>\");";
    $result.="}});";
    return $result;
  }

  /**
   * Generates TinyMCE sub object
   *
   * @since 1.0
   * @param string $menu
   * @param string $entry
   * @param string $result // Stikki: why?
   * @return string
   */	
  private static function AddSub($menu,$entry,&$result) {
    $menutext=$entry->Hierarchy()." ".$entry->MenuText();
    if (strlen($menutext)>30) {
      $menutext=htmlspecialchars(substr($menutext,0,30),ENT_QUOTES)." &#133;";
    } else {
      $menutext=htmlspecialchars($menutext,ENT_QUOTES);
    }

    $newmenu=$menu."m";
    $result.=" var ".$newmenu." = ".$menu.".addMenu({title : '".$menutext."'});";
    if ($entry->Type()!="sectionheader") {
      $result.= self::AddEntry($newmenu,$entry);
      $result.=" ".$newmenu.".addSeparator();";
    }
    return $newmenu;
  }

  /**
   * Get CMSLinker for TinyMCE
   *
   * @since 1.0
   * @return string
   */		
  private static function GetCMSLinker() 
  {
    $mod = cms_utils::get_module('MicroTiny');
    $result="";
    $config = cms_utils::get_config();
    $result.="//Creates a new plugin class and a custom listbox
      tinymce.create('tinymce.plugins.CMSLinkerPlugin', {
      createControl: function(n, cm) {
      switch (n) {
      case 'cmslinker':
	var c = cm.createMenuButton('cmslinker', {
	title : '".$mod->Lang("cmsmslinker")."',image : '".$config->smart_root_url()."/modules/MicroTiny/images/cmsmslink.gif',
	icons : false
      });
     c.onRenderMenu.add(function(c, m) {
    ";

    $content_ops = cmsms()->GetContentOperations();
    $content_array=$content_ops->GetAllContent();

    $level=0;
    $menu="m";
    foreach ($content_array as $one) {
      if ($one->Active()!=1) continue;
      if ($one->FriendlyName() == 'Separator') continue;
      $thislevel=substr_count($one->Hierarchy(),".");
      if ($thislevel<$level) {
	$menu=substr($menu,($level-$thislevel));
	$level-=($level-$thislevel);
      }
      if ($one->ChildCount()>0) {
	$menu = self::AddSub($menu,$one,$result);
	$level++;
      } else {
	$result .= self::AddEntry($menu,$one);
      }
    }
    $result.="}); 
      // Return the new menu button instance
      return c;
      }
      return null;
      }
    });

    // Register plugin with a short name
    tinymce.PluginManager.add('cmslinker', tinymce.plugins.CMSLinkerPlugin);";
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
    $mylang = substr($mylang,0,2);
		
    switch ($mylang) {			
    case "tw" : return strtolower($mylang);
    default : return $mylang;
    }
  }

  /**
   * Get Thumbnail File
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
  static private function Slashes($url) 
  {
    $result=str_replace("\\","/",$url);
    return $result;
  }	

} // end of class

#
# EOF
#
?>