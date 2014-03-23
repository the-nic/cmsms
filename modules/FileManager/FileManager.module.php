<?php
# FileManager. A plugin for CMS - CMS Made Simple
# Copyright (c) 2006-12 by Morten Poulsen <morten@poulsen.org>
#
#CMS - CMS Made Simple
#(c)2004 by Ted Kulp (wishy@users.sf.net)
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
include_once(dirname(__FILE__)."/fileinfo.php");

final class FileManager extends CMSModule {

  function GetName() { return 'FileManager'; }
  function LazyLoadFrontend() { return TRUE; }
  function GetChangeLog() { return $this->ProcessTemplate('changelog.tpl'); }
  function GetHeaderHTML() { return $this->_output_header_javascript(); }
  function GetFriendlyName() { return $this->Lang('friendlyname'); }
  function GetVersion() { return '1.5'; }
  function GetHelp() { return $this->Lang('help'); }
  function GetAuthor() { return 'Morten Poulsen (Silmarillion)'; }
  function GetAuthorEmail() { return 'morten@poulsen.org'; }
  function IsPluginModule() { return true; }
  function HasAdmin() { return true; }
  function IsAdminOnly() { return false; }
  function GetAdminSection() { return 'content'; }
  function GetAdminDescription() { return $this->Lang('moddescription'); }
  function MinimumCMSVersion() { return "1.11=alpha0"; }
  function InstallPostMessage() { return $this->Lang('postinstall'); }
  function UninstallPostMessage() { return $this->Lang('uninstalled'); }
  function UninstallPreMessage() { return $this->Lang('really_uninstall'); }
  function GetEventDescription($name) { return $this->Lang('eventdesc_'.$name);	}
  function GetEventHelp($name) { return $this->Lang('eventhelp_'.$name); }
  function VisibleToAdminUser() { return $this->AccessAllowed(); }
  function AccessAllowed() { return $this->CheckPermission("Modify Files"); }
  public function AdvancedAccessAllowed() { return $this->CheckPermission('Use FileManager Advanced',0); }

  function GetFileIcon($extension,$isdir=false) {
    if (empty($extension)) $extension = '---'; // hardcode extension to something.
    if ($extension[0]==".") $extension=substr($extension,1);
    $config = cmsms()->GetConfig();
    $iconsize=$this->GetPreference("iconsize","32px");
    //for valid xhtml
    $iconsizeHeight=str_replace("px","",$iconsize);
    //end
    if ($extension[0]=='.') $extension=substr($extension, 1);

    $result="";
    if ($isdir) {
      $result="<img height=\"".$iconsizeHeight."\" style=\"border:0;\" src=\"".$config["root_url"]."/modules/FileManager/icons/themes/default/extensions/".$iconsize."/dir.png\" ".
	"alt=\"directory\" ".
	"align=\"middle\" />";
      return $result;
    }

    if (file_exists($config["root_path"]."/modules/FileManager/icons/themes/default/extensions/".$iconsize."/".strtolower($extension).".png")) {
      $result="<img height='".$iconsizeHeight."' style='border:0;' src='".$config["root_url"]."/modules/FileManager/icons/themes/default/extensions/".$iconsize."/".strtolower($extension).".png' ".
	"alt='".$extension."-file' ".
	"align='middle' />";
    } else {
      $result="<img height='".$iconsizeHeight."' style='border:0;' src='".$config["root_url"]."/modules/FileManager/icons/themes/default/extensions/".$iconsize."/0.png' ".
	"alt=".$extension."-file' ".
	"align='middle' />";
    }
    return $result;
  }

  protected function Slash($str,$str2="",$str3="") {
    if ($str=="") return $str2;
    if ($str2=="") return $str;
    if ($str[strlen($str)-1]!="/") {
      if ($str2[0]!="/") {
	return $str."/".$str2;
      } else {
	return $str.$str2;
      }
    } else {
      if ($str2[0]!="/") {
	return $str.$str2;
      } else {
	return $str.substr($str2,1); //trim away one of the slashes
      }
    }
    //Three strings not supported yet...
    return "Error in Slash-function. Please report";
  }

  function GetPermissions($path,$file) {
    $config = cmsms()->GetConfig();
    $realpath=$this->Slash($config["root_path"],$path);
    $statinfo=stat($this->Slash($realpath,$file));
    return $statinfo["mode"];
  }

  function GetMode($path,$file) {
    $config = cmsms()->GetConfig();
    $realpath=$this->Slash($config["root_path"],$path);
    $statinfo=stat($this->Slash($realpath,$file));
    return filemanager_util::format_permissions($statinfo["mode"]);
  }

  function GetModeWin($path,$file) {
    $config = cmsms()->GetConfig();
    $realpath=$this->Slash($config["root_path"],$path);
    $realpath=$this->Slash($realpath,$file);
    if (is_writable($realpath)) {
      return "777";
    } else {
      return "444";
    }
  }

  function GetModeTable($id,$permissions) {
    $this->smarty->assign('ownertext', $this->Lang("owner"));
    $this->smarty->assign('groupstext', $this->Lang("group"));
    $this->smarty->assign('otherstext', $this->Lang("others"));

    $ownerr="0"; if ($permissions & 0400) $ownerr="1";
    $this->smarty->assign('ownerr', $this->CreateInputCheckbox($id,"ownerr","1",$ownerr));

    $ownerw="0"; if ($permissions & 0200) $ownerw="1";
    $this->smarty->assign('ownerw', $this->CreateInputCheckbox($id,"ownerw","1",$ownerw));

    $ownerx="0"; if ($permissions & 0100) $ownerx="1";
    $this->smarty->assign('ownerx', $this->CreateInputCheckbox($id,"ownerx","1",$ownerx));

    $groupr="0"; if ($permissions & 0040) $groupr="1";
    $this->smarty->assign('groupr', $this->CreateInputCheckbox($id,"groupr","1",$groupr));

    $groupw="0"; if ($permissions & 0020) $groupw="1";
    $this->smarty->assign('groupw', $this->CreateInputCheckbox($id,"groupw","1",$groupw));

    $groupx="0"; if ($permissions & 0010) $groupx="1";
    $this->smarty->assign('groupx', $this->CreateInputCheckbox($id,"groupx","1",$groupx));

    $othersr="0"; if ($permissions & 0004) $othersr="1";
    $this->smarty->assign('othersr', $this->CreateInputCheckbox($id,"othersr","1",$othersr));

    $othersw="0"; if ($permissions & 0002) $othersw="1";
    $this->smarty->assign('othersw', $this->CreateInputCheckbox($id,"othersw","1",$othersw));

    $othersx="0"; if ($permissions & 0001) $othersx="1";
    $this->smarty->assign('othersx', $this->CreateInputCheckbox($id,"othersx","1",$othersx));

    return $this->ProcessTemplate('modetable.tpl');
  }

  function GetModeFromTable($params) {
    $owner=0;
    if (isset($params["ownerr"])) $owner+=4;
    if (isset($params["ownerw"])) $owner+=2;
    if (isset($params["ownerx"])) $owner+=1;
    $group=0;
    if (isset($params["groupr"])) $group+=4;
    if (isset($params["groupw"])) $group+=2;
    if (isset($params["groupx"])) $group+=1;
    $others=0;
    if (isset($params["othersr"])) $others+=4;
    if (isset($params["othersw"])) $others+=2;
    if (isset($params["othersx"])) $others+=1;
    return $owner.$group.$others;
  }

  function GetThumbnailLink($file,$path) {
    $gCms = cmsms();

    $config = $gCms->GetConfig();
    $advancedmode = filemanager_utils::check_advanced_mode();
    $basedir = $config['root_path'];
    $baseurl = $config->smart_root_url();

    $filepath=$basedir.'/'.$path;
    $url=$baseurl.'/'.$path;
    $image="";
    $imagepath=$this->Slashes($filepath."/thumb_".$file["name"]);

    if (file_exists($imagepath)) {
      $imageurl=$url.'/thumb_'.$file["name"];
      $image="<img src=\"".$imageurl."\" alt=\"".$file["name"]."\" title=\"".$file["name"]."\" />";
      $result="<a href=\"".$file["url"]."\" target=\"_blank\">";
      $result.=$image;
      $result.="</a>";
      return $result;
    }
  }

  function WinSlashes($url) {
    return str_replace("/","\\",$url);
  }

  function Slashes($url) {
    $result=str_replace("\\","/",$url);
    $result=str_replace("//","/",$result);
    return $result;
  }

  protected function _output_header_javascript()
  {
    $out = '';
    $urlpath = $this->GetModuleURLPath()."/js";
    $jsfiles = array('jquery-file-upload/jquery.iframe-transport.js');
    $jsfiles[] = 'jquery-file-upload/jquery.fileupload.js';
    $jsfiles[] = 'jqueryrotate/jQueryRotate-2.2.min.js';
    $jsfiles[] = 'jrac/jquery.jrac.js';

    $fmt = '<script type="text/javascript" src="%s/%s"></script>';
    foreach( $jsfiles as $one ) {
      $out .= sprintf($fmt,$urlpath,$one)."\n";
    }

    $fmt = '<link rel="stylesheet" type="text/css" href="%s/%s"/>';
    $cssfiles = array('jrac/style.jrac.css');
    foreach( $cssfiles as $one ) {
      $out .= sprintf($fmt,$urlpath,$one);
    }

    return $out;
  }

  protected function encodefilename($filename) {
    return str_replace("==","",base64_encode($filename));
  }

  protected function decodefilename($encodedfilename) {
    return base64_decode($encodedfilename."==");
  }
} // end of class
?>