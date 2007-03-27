<?php
#CMS - CMS Made Simple
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
#
#$Id: index.php 3788 2007-02-15 21:26:05Z calguy1000 $

$CMS_ADMIN_PAGE=1;
$CMS_TOP_MENU='main';
$CMS_ADMIN_TITLE='adminhome';
$CMS_ADMIN_TITLE='mainmenu';
$CMS_EXCLUDE_FROM_RECENT=1;

require_once("../include.php");

check_login();

global $gCms;
$db =& $gCms->GetDb();

include_once("header.php");
$themeObject->DisplayDashboardCallout(dirname(dirname(__FILE__)).'/install');
$themeObject->DisplayDashboardCallout(TMP_CACHE_LOCATION . '/SITEDOWN', lang('sitedownwarning', TMP_CACHE_LOCATION . '/SITEDOWN'));

// Display a warning if safe mode is enabled
if( ini_get('safe_mode') )
  {
    echo '<div class="pageerrorcontainer"><div class="pageoverflow"><p class="pageerror">'.lang('warning_safe_mode').'</p></div></div>';
  }

// Display a warning if CMSMS needs upgrading
$current_version = $CMS_SCHEMA_VERSION;
$query = "SELECT version from ".cms_db_prefix()."version";
$row = $db->GetRow($query);
if ($row)
{
	$current_version = $row["version"];
}
if ($current_version < $CMS_SCHEMA_VERSION)
{
	echo '<div class="pageerrorcontainer"><div class="pageoverflow"><p class="pageerror"><em><strong>Warning:</strong></em> CMSMS is in need of an upgrade.</p><p>You are now running schema version '.$current_version." and you need to be upgraded to version ".$CMS_SCHEMA_VERSION.'.</p><p>Please click the following link: <a href="'.$config['root_url'].'/install/upgrade.php">Start upgrade process</a>.</p></div></div>';
}
$themeObject->ShowShortcuts();
$themeObject->DisplaySectionMenuDivStart();
$themeObject->DisplayAllSectionPages();
$themeObject->DisplaySectionMenuDivEnd();
include_once("footer.php");

# vim:ts=4 sw=4 noet
?>
