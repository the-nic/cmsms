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

//Set the module name -- should be the name of the class
define("MODULE_NAME", "News");

//Define module variables
$cmsmodules[MODULE_NAME]['Author'] = "Ted Kulp <tedkulp@users.sf.net>";
$cmsmodules[MODULE_NAME]['Version'] = "1.0";
$cmsmodules[MODULE_NAME]['ContentModule'] = "1";
$cmsmodules[MODULE_NAME]['PluginModule'] = "1";

class News extends cmsmodule {

	function install($cms) {
		//This function should install the database functions and do other basic init stuff for first time use.
		$db = $cms->db;
		$dict = NewDataDictionary($cms->db);
		$flds = "
			news_id I KEY,
			news_title C(255),
			news_data X,
			news_date T,
			create_date T,
			modified_date T
		";
		$taboptarray = array('mysql' => 'TYPE=MyISAM');
		$sqlarray = $dict->CreateTableSQL($cms->config->db_prefix."module_news", $flds, $taboptarray);
		$dict->ExecuteSQLArray($sqlarray);

		$db->CreateSequence($cms->config->db_prefix."module_news_seq");

		create_permission($cms, 'Modify News', 'Modify News');

		#Throw in a test for now
		$new_id = $db->GenID($cms->config->db_prefix."module_news_seq");
		$query = "INSERT INTO ".$cms->config->db_prefix."module_news (news_id, news_title, news_data, news_date, create_date, modified_date) VALUES ($new_id, 'News Module Installed', 'The news module was installed.  Exciting.', ".$db->DBTimeStamp(time()).", ".$db->DBTimeStamp(time()).", ".$db->DBTimeStamp(time()).")";
		$result = $db->Execute($query);
	}

	function uninstall($cms) {
		//This function should uninstall database tables and generally cleanup.
		$db = $cms->db;
		$dict = NewDataDictionary($cms->db);
		$sqlarray = $dict->DropTableSQL($cms->config->db_prefix."module_news");
		$dict->ExecuteSQLArray($sqlarray);

		$db->DropSequence($cms->config->db_prefix."module_news_seq");

		remove_permission($cms, 'Modify News');
	}

	function execute($cms, $id, $params) {
		//This is the entryway into the module.  All requests from CMS will come through here.
		$db = $cms->db;
		$query = "SELECT news_id, news_title, news_data, news_date FROM ".$cms->config->db_prefix."module_news ORDER BY news_date desc";
		if (isset($params["number"])) {
			$dbresult = $db->SelectLimit($query, $params["number"]);
		} else {
			$dbresult = $db->Execute($query);
		}
		if ($dbresult && $dbresult->RowCount()) {
			while ($row = $dbresult->FetchRow()) {
				echo "<div class=\"module_news\">";
				echo date("F j, Y, g:i a", $db->UnixTimeStamp($row['news_date']))."<br />";
				echo $row["news_title"]."<br />";
				echo $row["news_data"];
				echo "</div>";
			}
		}
	}

	function executeadmin($cms,$id) {

		if (isset($_POST[$id."action"]) || isset($_GET[$id."action"])) {
			$moduleaction = $_POST[$id."action"] . $_GET[$id."action"];
			include_once(dirname(__FILE__)."/adminform.php");
		} else {
			$db = $cms->db;
			$query = "SELECT news_id, news_title, news_data, news_date FROM ".$cms->config->db_prefix."module_news ORDER BY news_date desc";
			$dbresult = $db->Execute($query);
			if ($dbresult && $dbresult->RowCount()) {
				echo "<table cellspacing=\"0\" class=\"admintable\">\n";
				echo "<tr>\n";
				echo "<td>Title</td>\n";
				echo "<td width=\"20%\">Posting Date</td>\n";
				echo "<td width=\"10%\">&nbsp;</td>\n";
				echo "<td width=\"10%\">&nbsp;</td>\n";
				echo "</tr>\n";
				$rowclass="row1";
				while ($row = $dbresult->FetchRow()) {
					echo "<tr class=\"$rowclass\">\n";
					echo "<td>".$row["news_title"]."</td>\n";
					echo "<td>".$row["news_date"]."</td>\n";
					echo "<td>".create_module_admin_link("News",$id,array("action"=>"edit","news_id"=>$row["news_id"]),"Edit")."</td>\n";
					echo "<td>".create_module_admin_link("News",$id,array("action"=>"delete","news_id"=>$row["news_id"]),"Delete", "Are you sure you want to delete?")."</td>\n";
					echo "</tr>\n";
					($rowclass=="row1"?$rowclass="row2":$rowclass="row1");
				}
				echo "</table>\n";
				echo "<div class=\"button\">".create_module_admin_link("News",$id,array("action"=>"add"),"Add News Item")."</div>";
			}
		}
	}
}

$cmsmodules[MODULE_NAME]['Instance'] = new News;

# vim:ts=4 sw=4 noet
?>
