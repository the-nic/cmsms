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

/**
 * Entry point for all non-admin pages
 *
 * @package CMS
 */
$starttime = microtime();

@ob_start();

if (!file_exists("config.php") || filesize("config.php") == 0) {
    require_once("lib/misc.functions.php");
    redirect("install.php");
    exit;
} ## if
if (isset($_GET["deleteinstall"]) && $_GET["deleteinstall"] == "true") {
    @unlink("install.php");
} ## if

if (file_exists("config.php") && file_exists("install.php")) {
    echo "You cannot start CMS until you remove the install.php<br>\n";
    if (isset($_GET["deleteinstall"]) && $_GET["deleteinstall"] == "true") {
        echo "Looks like you tried to have CMS delete the install file but that was not sucessful.  You will have to remove it manually before you can continue<br>\n";
        exit;
    } ## if
    echo "Click <a href=\"index.php?deleteinstall=true\">here</a> to have CMS try to delete it for you.  If successful you will see the CMS main page<br>\n";
    exit;
} ## if

require_once("include.php"); #Makes gCms object

$smarty = new Smarty_CMS($config);

$page = "";

if (isset($config["query_var"]) && $config["query_var"] != "" && isset($_GET[$config["query_var"]]))
{
	$page = $_GET[$config["query_var"]];
}
else if (isset($_SERVER["PATH_INFO"]))
{
	$page = $_SERVER["PATH_INFO"];
}
else if (isset($_SERVER["QUERY_STRING"]))
{
	$page = $_SERVER["QUERY_STRING"];
}

if ($page == "") {
	$page = db_get_default_page();
}

($smarty->is_cached('db:'.$page)?$cached="":$cached="not ");

$old_error_handler = set_error_handler("ErrorHandler404");
$html = $smarty->fetch('db:'.$page) . "\n";
set_error_handler($old_error_handler);

echo $html;
@ob_flush();

$endtime = microtime();

echo "<!-- Generated in ".microtime_diff($starttime,$endtime)." seconds by CMS Made Simple $CMS_VERSION (".$cached."cached)-->\n";
echo "<!-- Generated by CMS Made Simple -- Released under the GPL -- http://cmsmadesimple.org -->\n";

# vim:ts=4 sw=4 noet
?>
