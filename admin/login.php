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
#$Id$

$CMS_ADMIN_PAGE=1;

require_once("../include.php");
require_once("../lib/classes/class.user.inc.php");

$error = "";

if (isset($_POST["logincancel"]))
{
	redirect($config["root_url"].'/index.php', true);
}

if (isset($_POST["username"]) && isset($_POST["password"])) {

	$username = "";
	if (isset($_POST["username"])) $username = $_POST["username"];

	$password = "";
	if (isset($_POST["password"])) $password = $_POST["password"];

	$oneuser = UserOperations::LoadUserByUsername($username, $password, true, true);

	if ($username != "" && $password != "" && $oneuser && isset($_POST["loginsubmit"]))
	{
		generate_user_object($oneuser->id);
		$default_cms_lang = get_preference($oneuser->id, 'default_cms_language');
		if ($default_cms_lang != '')
		{
			setcookie('cms_language', $default_cms_lang);
		}
		audit(-1, '', 'User Login');

		#Perform the login_post callback
		foreach($gCms->modules as $key=>$value)
		{
			if ($gCms->modules[$key]['installed'] == true &&
				$gCms->modules[$key]['active'] == true)
			{
				$gCms->modules[$key]['object']->LoginPost($oneuser);
			}
		}

		if (isset($_SESSION["redirect_url"]))
		{
			if (isset($gCms->config) and $gCms->config['debug'] == true)
			{
				echo "Debug is on.  Redirecting disabled...  Please click this link to continue.<br />";
				echo "<a href=\"".$_SESSION["redirect_url"]."\">".$_SESSION["redirect_url"]."</a><br />";
				global $sql_queries;
				if (isset($sql_queries))
				{
					echo $sql_queries;
				}
			}
			else
			{
				echo ('<html><head><title>Logging in... please wait</title><meta http-equiv="refresh" content="1; url='.$_SESSION["redirect_url"].'"></head><body>Logging in and redirecting to <a href="'.$_SESSION["redirect_url"].'">'.$_SESSION["redirect_url"].'</a>, one moment please...</body></html>');
			}
			unset($_SESSION["redirect_url"]);
		}
		else
		{
			if (isset($config) and $config['debug'] == true)
			{
				echo "Debug is on.  Redirecting disabled...  Please click this link to continue.<br />";
				echo "<a href=\"index.php\">index.php</a><br />";
				global $sql_queries;
				if (isset($sql_queries))
				{
					echo $sql_queries;
				}
			}
			else
			{
				echo ('<html><head><title>Logging in... please wait</title><meta http-equiv="refresh" content="1; url=./index.php"></head><body>Logging in and redirecting to <a href="./index.php">index.php</a>, one moment please...</body></html>');
			}
		}
		return;
		#redirect("index.php");
	}
	else if (isset($_POST["loginsubmit"])) { //No error if changing languages
		$error .= "<p>".lang('usernameincorrect')."</p>";
	}

}

// Language shizzle
//header("Content-Encoding: " . get_encoding());
header("Content-Language: " . $current_language);
header("Content-Type: text/html; charset=" . get_encoding());

//CHANGED
$theme=get_site_preference('logintheme', 'default');
//echo "theme:$theme";
if (file_exists(dirname(__FILE__)."/themes/$theme/login.php")) {
	include(dirname(__FILE__)."/themes/$theme/login.php");
} else {
	include(dirname(__FILE__)."/themes/default/login.php");
}
//STOP
?>

<?php
	if (isset($gCms->config) and $gCms->config['debug'] == true)
	{
		global $sql_queries;
		if (isset($sql_queries))
		{
			echo $sql_queries;
		}
	}
# vim:ts=4 sw=4 noet
?>
