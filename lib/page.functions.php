<?php

function check_login(&$config) {
	if (!isset($_SESSION["user_id"])) {
		redirect($config->root_url."/admin/login.php");
	}
}

function get_userid() {
	if (isset($_SESSION["user_id"])) {
		return $_SESSION["user_id"];
	}
}

function check_permission(&$config, $userid, $permname) {
	$check = false;

	$db = new DB($config);

	$query = "SELECT * FROM ".$config->db_prefix."user_groups ug INNER JOIN ".$config->db_prefix."group_perms gp ON gp.group_id = ug.group_id INNER JOIN ".$config->db_prefix."permissions p ON p.permission_id = gp.permission_id WHERE ug.user_id = ".$userid." AND permission_name = '".$permname."'";
	$result = $db->query($query);

	if (mysql_num_rows($result) > 0) {
		$check = true;
	}

	$db->close();


	return $check;
}

function check_ownership(&$config, $userid, $pagename, $pageid = "") {
	$check = false;

	$db = new DB($config);

	$query = "";
	if ($pageid == "") {
		$query = "SELECT * FROM ".$config->db_prefix."pages WHERE owner = ".$userid." AND page_url = '".$pagename."'";
	} else {
		$query = "SELECT * FROM ".$config->db_prefix."pages WHERE owner = ".$userid." AND page_id = ".$pageid;
	}
	$result = $db->query($query);

	if (mysql_num_rows($result) > 0) {
		$check = true;
	}

	$db->close();
	return $check;
}

function get_stylesheet(&$config, $templateid) {

	$css = "";

	$db = new DB($config);
	$query = "SELECT stylesheet FROM ".$config->db_prefix."templates WHERE template_id = ".$templateid;
	$result = $db->query($query);

	if (mysql_num_rows($result) > 0) {
		$line = mysql_fetch_array($result, MYSQL_ASSOC);
		$css = $line[stylesheet];
	}
	$db->close();

	return $css;
}

function & strip_slashes(&$str) {

	if(is_array($str)) {
		while(list($key, $val) = each($str)) {
			$str[$key] = strip_slashes($val);
		}
	}
	else {
		$str = stripslashes($str);
	}

	return $str;
}

# vim:ts=4 sw=4 noet
?>
