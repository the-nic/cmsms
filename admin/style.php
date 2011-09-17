<?php

$CMS_ADMIN_PAGE = TRUE;
$CMS_STYLESHEET = TRUE;
if(isset($_SERVER['HTTP_USER_AGENT']) && preg_match('/MSIE/', $_SERVER['HTTP_USER_AGENT']))
  {
    @ini_set( 'zlib.output_compression','Off' );
  }
header("Content-type: text/css");
//$LOAD_ALL_MODULES = 1;
require_once("../include.php");
//require_once("../lib/classes/class.user.inc.php");
$theme=get_preference(get_userid(),"admintheme");
$style="style";

$gCms = cmsms();
if (isset($gCms->nls['direction']) && $gCms->nls['direction'] == 'rtl')
  {
    $style.="-rtl";
  }

if (isset($_GET['ie']))
  {
    $style.="_ie";
  }
$style .= ".css";
if (file_exists(dirname(__FILE__)."/themes/".$theme."/css/".$style))
  {
    cms_readfile(dirname(__FILE__)."/themes/".$theme."/css/".$style);
  }
else if (file_exists(dirname(__FILE__)."/themes/default/css/".$style))
  {
    cms_readfile(dirname(__FILE__)."/themes/default/css/".$style);
  }

$allmodules = ModuleOperations::get_instance()->GetLoadedModules();
if( is_array($allmodules) && count($allmodules) )
  {
    foreach( $allmodules as $key => &$object )
      {
	if( $object->HasAdmin() )
	  {
	    echo $object->AdminStyle();
	  }
      }
  }
# vim:ts=4 sw=4 noet
?>
