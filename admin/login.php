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

$error = "";

if ($_POST["username"] && $_POST["password"]) {

	$username = $_POST["username"];
	$password = $_POST["password"];

	$query = "SELECT * FROM ".$config->db_prefix."users WHERE username = ".$dbnew->qstr($username)." and password = ".$dbnew->qstr(md5($password));
	$result = $dbnew->Execute($query);

	$line = $result->FetchRow();

	if (isset($line["user_id"])) {
		setcookie("cms_admin_user_id", $line["user_id"]);
		$_SESSION["cms_admin_user_id"] = $line["user_id"];	
		$_SESSION["cms_admin_username"] = $line["username"];	
		audit($config, $_SESSION["cms_admin_user_id"], $_SESSION["cms_admin_username"], -1, "", 'User Login');
		redirect("index.php");
		return;
	}
	else {
		$error .= "<p>".$gettext->gettext("Username or Password incorrect!")."</p>";
	}

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<title></title>

<link rel="stylesheet" type="text/css" href="style.css" />

</head>

<body>

<div class="login">

<?

	if ($error != "") {
		echo "<div class=\"loginerror\">".$error."</div>";
	}

?>

<form method="post" action="login.php" id="login" name="login">

<img src="../images/cmslogo.png" border="0" id="loginlogo" alt="CMS Made Simple"/>

<table border=0 id="table">
	<tr>
		<td align="right"><?=$gettext->gettext("Username")?>:</td>
		<td><input type="text" id="username" name="username" value="<?echo $_POST["username"]?>" size="15"/></td>
	</tr>
	<tr>
		<td align="right"><?=$gettext->gettext("Password")?>:</td>
		<td><input type="password" id="password" name="password" size="15" /></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" value="<?=$gettext->gettext("Submit")?>" /></td>
	</tr>
</table>
</form>

</div>

<script language="javascript">
<!--
	document.login.username.focus();
//-->
</script>

</body>
</html>
<?php
# vim:ts=4 sw=4 noet
?>
