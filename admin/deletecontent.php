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

$page_id = -1;
if (isset($_GET["page_id"])) {

	$page_id = $_GET["page_id"];
	$userid = get_userid();
	$access = check_permission($config, $userid, 'Remove Content');

	if ($access)  {

		$order = 1;
		$section_id = 1;
		$title = "";

        $query = "SELECT default_page FROM ".$config->db_prefix."pages WHERE page_id = $page_id";
        $result = $dbnew->Execute($query);
        $row = $result->FetchRow();
        if (isset($row["default_page"]) && $row["default_page"] == 1) {
			redirect("listcontent.php?message=".$gettext->gettext("Cannot delete default page.  Please set another page as default first."));
			exit;
        }

		#Grab necessary info for fixing the item_order
		$query = "SELECT page_title, item_order, section_id FROM ".$config->db_prefix."pages WHERE page_id = $page_id";
		$result = $dbnew->Execute($query);
		$row = $result->FetchRow();
		if (isset($row["item_order"])) {
			$order = $row["item_order"];	
		}
		if (isset($row["section_id"])) {
			$section_id = $row["section_id"];	
		}
		if (isset($row["page_title"])) {
			$title = $row["page_title"];	
		}
		#Remove the page
		$query = "DELETE FROM ".$config->db_prefix."pages where page_id = $page_id";
		$result = $dbnew->Execute($query);
		$query = "DELETE FROM ".$config->db_prefix."additional_users where page_id = $page_id";
		$result = $dbnew->Execute($query);
		#Fix the item_order if necessary
		$query = "UPDATE ".$config->db_prefix."pages SET item_order = item_order - 1 WHERE section_id = $section_id AND item_order > $order";
		$result = $dbnew->Execute($query);
		#This is so pages will not cache the menu changes
		$query = "UPDATE ".$config->db_prefix."templates SET modified_date = now()";
		$dbnew->Execute($query);
		audit($config, $_SESSION["cms_admin_user_id"], $_SESSION["cms_admin_username"], $page_id, $title, 'Deleted Content');
	}
}

redirect("listcontent.php");

# vim:ts=4 sw=4 noet
?>
