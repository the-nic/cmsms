<?php

require_once("../config.php");

$title = "";
if (isset($_POST["title"])) $title = $_POST["title"];

$url = "";
if (isset($_POST["url"])) $url = $_POST["url"];

$content = "";
if (isset($_POST["content"])) $content = $_POST["content"];

$menutext = "";
if (isset($_POST["menutext"])) $menutext = $_POST["menutext"];

$active = 1;
if (!isset($_POST["active"]) && isset($_POST["editcontent"])) $active = 0;

$showinmenu = 1;
if (!isset($_POST["showinmenu"]) && isset($_POST["showinmenu"])) $showinmenu = 0;

$page_id = -1;
if (isset($_POST["page_id"])) $page_id = $_POST["page_id"];
else if (isset($_GET["page_id"])) $page_id = $_GET["page_id"];

$section_id = -1;
if (isset($_POST["section_id"])) $section_id = $_POST["section_id"];

$template_id = -1;
if (isset($_POST["template_id"])) $template_id = $_POST["template_id"];

if (isset($_POST["cancel"])) {
	redirect("listcontent.php");
	return;
}

$db = new DB($config);

if (isset($_POST["editcontent"])) {

	$query = "UPDATE pages SET page_title='".mysql_escape_string($title)."', page_url='".mysql_escape_string($url)."', page_content='".mysql_escape_string($content)."', section_id=$section_id, template_id=$template_id, owner=1, show_in_menu=$showinmenu, menu_text='".mysql_escape_string($menutext)."', active=$active, modified_date = now() WHERE page_id = $page_id";
	$result = $db->query($query);

	if (mysql_affected_rows() > -1) {
		$db->close();
		redirect("listcontent.php");
		return;
	}
	else {
		echo "Error updating content";
		echo "<pre>query: $query</pre>";
	}
	mysql_free_result($result);

}
else if ($page_id != -1) {


	$query = "SELECT * from pages WHERE page_id = " . $page_id;
	$result = $db->query($query);
	
	$row = mysql_fetch_array($result, MYSQL_ASSOC);

	$title = $row["page_title"];
	$url = $row["page_url"];
	$content = $row["page_content"];
	$section_id = $row["section_id"];
	$template_id = $row["template_id"];
	$active = $row["active"];
	$showinmenu = $row["show_in_menu"];
	$menutext = $row["menu_text"];

	mysql_free_result($result);

}

$query = "SELECT section_id, section_name FROM sections ORDER BY section_id";
$result = $db->query($query);

$dropdown = "<select name=\"section_id\">";

while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $dropdown .= "<option value=\"".$row["section_id"]."\"";
        if ($row["section_id"] == $section_id) {
                $dropdown .= "selected";
        }
        $dropdown .= ">".$row["section_name"]."</option>";
}

$dropdown .= "</select>";

mysql_free_result($result);

$query = "SELECT template_id, template_name FROM templates ORDER BY template_id";
$result = $db->query($query);

$dropdown2 = "<select name=\"template_id\">";

while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $dropdown2 .= "<option value=\"".$row["template_id"]."\"";
        if ($row["template_id"] == $template_id) {
                $dropdown2 .= "selected";
        }
        $dropdown2 .= ">".$row["template_name"]."</option>";
}

$dropdown2 .= "</select>";

mysql_free_result($result);
$db->close();

?>

<form method="post" action="editcontent.php">

<div class="adminform">

<h3>Edit Content</h3>

<table border="0">

	<tr>
		<td>Title:</td>
		<td><input type="text" name="title" maxlength="255" value="<?=$title?>" /></td>
	</tr>
	<tr>
		<td>URL:</td>
		<td><input type="text" name="url" maxlength="255" value="<?=$url?>" /></td>
	</tr>
	<tr>
		<td>Content:</td>
		<td><textarea name="content" cols="90" rows="18"><?=$content?></textarea></td>
	</tr>
	<tr>
		<td>Section:</td>
		<td><?=$dropdown?></td>
	</tr>
	<tr>
		<td>Template:</td>
		<td><?=$dropdown2?></td>
	</tr>
	<tr>
		<td>Menu Text:</td>
		<td><input type="text" name="menutext" maxlength="25" value="<?=$menutext?>" /></td>
	</tr>
	<tr>
		<td>Show in Menu:</td>
		<td><input type="checkbox" name="showinmenu" <?=($showinmenu == 1?"checked":"")?> /></td>
	</tr>
	<tr>
		<td>Active:</td>
		<td><input type="checkbox" name="active" <?=($active == 1?"checked":"")?> /></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input type="hidden" name="page_id" value="<?=$page_id?>" /><input type="hidden" name="editcontent" value="true" /><input type="submit" value="Submit" /><input type="submit" name="cancel" value="Cancel"></td>
	</tr>

</table>

</div>

</form>
