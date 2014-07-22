<?php
#CMS - CMS Made Simple
#(c)2004 by Ted Kulp (wishy@users.sf.net)
#This projects homepage is: http://www.cmsmadesimple.org
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

require_once("../include.php");
$urlext='?'.CMS_SECURE_PARAM_NAME.'='.$_SESSION[CMS_USER_KEY];

check_login();
$userid = get_userid();
if( isset($_SESSION['cms_passthru']) ) {
    $_REQUEST = array_merge($_REQUEST,$_SESSION['cms_passthru']);
    unset($_SESSION['cms_passthru']);
}

$gCms = cmsms();
$smarty = $gCms->GetSmarty();
$smarty->assign('date_format_string',get_preference($userid,'date_format_string','%x %X'));

try {
    $id = 'm1_';
    $module = '';
    $action = 'defaultadmin';
    $suppressOutput = false;
    if (isset($_REQUEST['module'])) $module = $_REQUEST['module'];
    if (isset($_REQUEST['action'])) $action = $_REQUEST['action'];
    if (isset($_REQUEST['id'])) {
        $id = $_REQUEST['id'];
    }
    elseif (isset($_REQUEST['mact'])) {
        $ary = explode(',', cms_htmlentities($_REQUEST['mact']), 4);
        $module = (isset($ary[0])?$ary[0]:'');
        $id = (isset($ary[1])?$ary[1]:'m1_');
        $action = (isset($ary[2])?$ary[2]:'');
    }

    if( !$module ) {
        trigger_error('Module action specified, but could not determine the module.');
        redirect("index.php".$urlext);
    }

    $modinst = ModuleOperations::get_instance()->get_module_instance($module);
    if( !$modinst ) {
        trigger_error('Module '.$module.' not found in memory. This could indicate that the module is in need of upgrade or that there are other problems');
        redirect("index.php".$urlext);
    }

    if( get_preference($userid,'use_wysiwyg') == '1' && $modinst->IsWYSIWYG() ) {
        $htmlarea_flag = "true";
        $htmlarea_replaceall = true;
    }

    $USE_THEME = true;
    if (isset($_REQUEST[$id . 'disable_buffer']) || isset($_REQUEST['disable_buffer']) ) {
        $USE_THEME = false;
    }
    else if( isset($_REQUEST[$id . 'disable_theme']) || isset($_REQUEST['disable_theme']) ) {
        $USE_THEME = false;
    }
    if( isset($_REQUEST['showtemplate']) && ($_REQUEST['showtemplate'] == 'false')) {
        // for simplicity and compatibility with the frontend.
        $USE_THEME = false;
    }
    if( $modinst->SuppressAdminOutput($_REQUEST) != false || isset($_REQUEST['suppressoutput']) ) {
        $USE_THEME = false;
    }

    $params = GetModuleParameters($id);
    if( $USE_THEME ) {
        @ob_start();
        echo  $modinst->DoActionBase($action, $id, $params);
        $content = @ob_get_contents();
        @ob_end_clean();

        cms_admin_sendheaders();
        $txt = $modinst->GetHeaderHTML();
        if( $txt !== false ) $headtext = $txt; // headtext is a global

        if (FALSE == empty($params['module_message'])) echo $themeObject->ShowMessage($params['module_message']);
        if (FALSE == empty($params['module_error'])) echo $themeObject->ShowErrors($params['module_error']);
        include_once("header.php");

        echo '<div class="pagecontainer">';
        echo '<div class="pageoverflow">';
        echo $themeObject->ShowHeader($modinst->GetFriendlyName(), '', '', 'both').'</div>';
        echo $content;
        echo '</div>';
        echo '<p class="pageback"><a class="pageback" href="'.$themeObject->BackUrl().'">&#171; '.lang('back').'</a></p>';
        include_once("footer.php");
    }
    else {
        echo $modinst->DoActionBase($action, $id, $params);
    }
}
catch( Exception $e ) {
    // handle uncaught exception
    $handlers = ob_list_handlers();
    for ($cnt = 0; $cnt < sizeof($handlers); $cnt++) { ob_end_clean(); }
    echo $smarty->errorConsole($e);
    return;
}

# vim:ts=4 sw=4 noet
?>
