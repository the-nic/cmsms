<?php
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
#but WITHOUT ANY WARRANthe TY; without even the implied warranty of
#MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#GNU General Public License for more details.
#You should have received a copy of the GNU General Public License
#along with this program; if not, write to the Free Software
#Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
#
#$Id$

$CMS_ADMIN_PAGE=1;
$CMS_MODULE_PAGE=1;

$orig_memory = (function_exists('memory_get_usage')?memory_get_usage():0);
$starttime = microtime();

require_once("../include.php");
debug_buffer("original memory is ".$orig_memory);
$urlext='?'.CMS_SECURE_PARAM_NAME.'='.$_SESSION[CMS_USER_KEY];

check_login();
$userid = get_userid();
if( isset($_SESSION['cms_passthru']) ) {
  $_REQUEST = array_merge($_REQUEST,$_SESSION['cms_passthru']);
  unset($_SESSION['cms_passthru']);
}

$smarty = cmsms()->GetSmarty();
$smarty->assign('date_format_string',cms_userprefs::get_for_user($userid,'date_format_string','%x %X'));

$id = 'm1_';
$module = '';
$action = 'defaultadmin';
$suppressOutput = false;
if (isset($_REQUEST['mact'])) {
  $ary = explode(',', cms_htmlentities($_REQUEST['mact']), 4);
  $module = (isset($ary[0])?$ary[0]:'');
  $id = (isset($ary[1])?$ary[1]:'m1_');
  $action = (isset($ary[2])?$ary[2]:'');
}

$modinst = ModuleOperations::get_instance()->get_module_instance($module);
if( !$modinst ) {
  trigger_error('Module '.$module.' not found in memory. This could indicate that the module is in need of upgrade or that there are other problems');
  redirect('index.php'.$urlext);
}

$themeObject = cms_utils::get_theme_object();
$themeObject->set_action_module($module);

$USE_THEME = true;
$USE_OUTPUT_BUFFERING = true;
if (isset($_REQUEST[$id . 'disable_buffer']) || isset($_REQUEST['disable_buffer']) ) {
  $USE_OUTPUT_BUFFERING = false;
  $USE_THEME = false;
}
else if( isset($_REQUEST[$id . 'disable_theme']) || isset($_REQUEST['disable_theme']) ) {
  $USE_THEME = false;
}

if( isset($_REQUEST['showtemplate']) && ($_REQUEST['showtemplate'] == 'false')) {
  // for simplicity and compatibility with the frontend.
  $USE_THEME = false;
  $USE_OUTPUT_BUFFERING = false;
}

cms_admin_sendheaders();
$txt = $modinst->GetHeaderHTML();
if( $txt !== false ) $headtext = $txt;

if( $modinst->SuppressAdminOutput($_REQUEST) != false || isset($_REQUEST['suppressoutput']) ) {
  $suppressOutput = true;
}
else {
  include_once("header.php");
}

$params = ModuleOperations::get_instance()->GetModuleParameters($id);
if( !isset($USE_THEME) || $USE_THEME != false ) {
  if (FALSE == empty($params['module_message'])) echo $themeObject->ShowMessage($params['module_message']);
  if (FALSE == empty($params['module_error'])) echo $themeObject->ShowErrors($params['module_error']);
  if (!$suppressOutput) {
    echo '<div class="pagecontainer">';
    echo '<div class="pageoverflow">';
    $title = $themeObject->get_active_title();
    if( !$title ) $title = $modinst->GetFriendlyName();
    echo $themeObject->ShowHeader($title, '', '', 'both').'</div>';
  }
}
if( $USE_OUTPUT_BUFFERING ) @ob_start();

echo $modinst->DoActionBase($action, $id, $params);

if( $USE_OUTPUT_BUFFERING ) {
  $content = @ob_get_contents();
  @ob_end_clean();
  echo $content;
}

if( !isset($USE_THEME) || $USE_THEME != false ) {
  if (!$suppressOutput) {
    echo '</div>';
    include_once("footer.php");
  }
 }

?>