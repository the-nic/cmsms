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

$CMS_ADMIN_PAGE=1;

require_once("../include.php");

check_login($config);

$error = "";

$use_wysiwyg = "1";
if (isset($_POST["use_wysiwyg"])) $use_wysiwyg = $_POST["use_wysiwyg"];

$userid = get_userid();

if (isset($_POST["cancel"])) {
	redirect("index.php");
	return;
}

if (isset($_POST["edituserprefs"])) {
	set_preference($config, $userid, 'use_wysiwyg', $use_wysiwyg);
	audit($config, $_SESSION["cms_admin_user_id"], $_SESSION["cms_admin_username"], -1, '', 'Edited User Preferences');
	redirect("index.php");
	return;
} else if (!isset($_POST["submit"])) {
	$use_wysiwyg = get_preference($config, $userid, 'use_wysiwyg');
}

include_once("header.php");

if ($error != "") {
	echo "<ul class=\"error\">".$error."</ul>";
}

?>

<form method="post" action="editprefs.php">

<div class="adminform">

<h3><?=$gettext->gettext("Edit User Preferences")?></h3>

<table border="0">

	<tr>
		<td><?=$gettext->gettext("Use WYSIWYG Editor for Content?")?>:</td>
		<td>
			<select name="use_wysiwyg">
				<option value="1" <?= ($use_wysiwyg=="1"?"selected":"") ?>>True</option>
				<option value="0" <?= ($use_wysiwyg=="0"?"selected":"") ?>>False</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input type="hidden" name="edituserprefs" value="true" /><input type="submit" name="submit" value="<?=$gettext->gettext("Submit")?>" /><input type="submit" name="cancel" value="<?=$gettext->gettext("Cancel")?>" /></td>
	</tr>

</table>

</div>

</form>

<?php

include_once("footer.php");

# vim:ts=4 sw=4 noet
?>
