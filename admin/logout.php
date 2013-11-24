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
#$Id$

$CMS_ADMIN_PAGE=1;

require_once("../include.php");

if( is_sitedown() ) {
	// TODO Rolf
	echo "FYI website is still set offline!";
	header("Location: ".$config['admin_url']."/siteprefs.php?".CMS_SECURE_PARAM_NAME.'='.$_SESSION[CMS_USER_KEY]);
	return;
}

$userid = "";
if( isset($_SESSION['cms_admin_user_id'])) {
	$userid = $_SESSION['cms_admin_user_id'];
}

$username= "";
if( isset($_SESSION['login_user_username'])) {
	$username = $_SESSION['login_user_username'];
}

#Now call the event
Events::SendEvent('Core', 'LogoutPost');

$_SESSION['logout_user_now'] = "1";
// put mention into the admin log
audit($userid, "Admin Username: ".$username, 'Logged Out');

redirect("login.php");

# vim:ts=4 sw=4 noet
?>