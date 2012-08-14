<?php
#CMS - CMS Made Simple
#(c)2004 by Ted Kulp (wishy@users.sf.net)
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
#$Id: deleteuser.php 7396 2011-09-15 12:57:25Z rolf1 $

$CMS_ADMIN_PAGE=1;

require_once("../include.php");
$urlext='?'.CMS_SECURE_PARAM_NAME.'='.$_SESSION[CMS_USER_KEY];

check_login();
$cur_userid = get_userid();

$dodelete = true;

$user_id = -1;
if (isset($_GET["user_id"]))
{
	$user_id = $_GET["user_id"];
	$user_name = "";
	$userid = get_userid();
	$access = check_permission($userid, 'Remove Users');

	if ($access && $user_id != $cur_userid)
	{
	  $gCms = cmsms();
	  $userops = $gCms->GetUserOperations();
	  $oneuser = $userops->LoadUserByID($user_id);
	  $user_name = $oneuser->username;
	  $ownercount = $userops->CountPageOwnershipByID($user_id);

		if ($ownercount > 0)
		{
			$dodelete = false;
		}

		if ($dodelete)
		{
			Events::SendEvent('Core', 'DeleteUserPre', array('user' => &$oneuser));

			cms_userprefs::remove_for_user($user_id);
			$oneuser->Delete();

			Events::SendEvent('Core', 'DeleteUserPost', array('user' => &$oneuser));

			// put mention into the admin log
			audit($user_id, 'Admin Username: '.$user_name, 'Deleted');
		}
	}
}

if ($dodelete == true)
{
	redirect("listusers.php".$urlext);
}
else
{
	redirect("listusers.php".$urlext."&message=".lang('erroruserinuse'));
}

# vim:ts=4 sw=4 noet
?>
