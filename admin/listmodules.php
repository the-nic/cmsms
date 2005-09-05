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
$LOAD_ALL_MODULES=1;

require_once("../include.php");

check_login();

$module = "";
if (isset($_GET["module"])) $module = $_GET["module"];

$plugin = "";
if (isset($_GET["plugin"])) $plugin = $_GET["plugin"];

$action = "";
if (isset($_GET["action"])) $action = $_GET["action"];

$userid = get_userid();
$access = check_permission($userid, "Modify Modules");

$smarty = new Smarty_CMS($gCms->config);

include_once("header.php");

if ($access)
{
	if ($action == "install")
	{
		if (isset($gCms->modules[$module]))
		{
			$modinstance = $gCms->modules[$module]['object'];
			$result = $modinstance->Install();

			#now insert a record
			if (!isset($result) || $result === FALSE)
			{
				$query = "INSERT INTO ".cms_db_prefix()."modules (module_name, version, status, active) VALUES (".$db->qstr($module).",".$db->qstr($modinstance->GetVersion()).",'installed',1)";
				$db->Execute($query);
				
				#and insert any dependancies
				if (count($modinstance->GetDependencies()) > 0) #Check for any deps
				{
					#Now check to see if we can satisfy any deps
					foreach ($modinstance->GetDependencies() as $onedepkey=>$onedepvalue)
					{
						$query = "INSERT INTO ".cms_db_prefix()."module_deps (parent_module, child_module, minimum_version, create_date, modified_date) VALUES (?,?,?,?,?)";
						$db->Execute($query, array($onedepkey, $module, $onedepvalue, $db->DBTimeStamp(time()), $db->DBTimeStamp(time())));
					}
				}

				#and show the installpost if necessary...
				if ($modinstance->InstallPostMessage() != FALSE)
				{
					@ob_start();
					echo $modinstance->InstallPostMessage();
					$content = @ob_get_contents();
					@ob_end_clean();
					echo '<div class="pagecontainer">';
					echo '<p class="pageheader">'.lang('moduleinstallmessage', array($module)).'</p>';					
					echo $content;
					echo "</div>";
					echo '<p class="pageback"><a class="pageback" href="listmodules.php">&#171; '.lang('back').'</a></p>';					
					include_once("footer.php");
					exit;
					
				}

			}
			else
			{
				//TODO: Echo error
			}
		}
		
		redirect("listmodules.php");
	}

	if ($action == 'upgrade')
	{
		if (isset($gCms->modules[$module]))
		{
			$modinstance = $gCms->modules[$module]['object'];
			$result = $modinstance->Upgrade($_GET['oldversion'], $_GET['newversion']);

			#now insert a record

			if (!isset($result) || $result === FALSE)
			{
				$query = "UPDATE ".cms_db_prefix()."modules SET version = ? WHERE module_name = ?";
				$db->Execute($query,array($_GET['newversion'],$module));
			}
			else
			{
				//TODO: Echo error
			}
		}

		redirect("listmodules.php");
	}

	if ($action == "uninstall")
	{
		if (isset($gCms->modules[$module]))
		{
			$modinstance = $gCms->modules[$module]['object'];
			$result = $modinstance->Uninstall();

			#now insert a record
			if (!isset($result) || $result === FALSE)
			{
				#now delete the record
				$query = "DELETE FROM ".cms_db_prefix()."modules WHERE module_name = ?";
				$db->Execute($query, array($module));
				
				#delete any dependencies
				$query = "DELETE FROM ".cms_db_prefix()."module_deps WHERE child_module = ?";
				$db->Execute($query, array($module));

				#and show the uninstallpost if necessary...
				if ($modinstance->UninstallPostMessage() != FALSE)
				{
					@ob_start();
					echo $modinstance->UninstallPostMessage();
					$content = @ob_get_contents();
					@ob_end_clean();
					echo '<div class="pagecontainer">';
					echo '<p class="pageheader">'.lang('moduleuninstallmessage', array($module)).'</p>';					
					echo $content;
					echo "</div>";
					echo '<p class="pageback"><a class="pageback" href="listmodules.php">&#171; '.lang('back').'</a></p>';
					include_once("footer.php");
					exit;
				}
			}
			else
			{
				//TODO: Echo error
			}
		}
		
		redirect("listmodules.php");
	}

	if ($action == "settrue")
	{
		$query = "UPDATE ".cms_db_prefix()."modules SET active = 1 WHERE module_name = ?";
		$db->Execute($query, array($module));
		redirect("listmodules.php");
	}

	if ($action == "setfalse")
	{
		$query = "UPDATE ".cms_db_prefix()."modules SET active = 0 WHERE module_name = ?";
		$db->Execute($query, array($module));
		redirect("listmodules.php");
	}
}

include_once("header.php");

if ($action == "showmoduleabout")
{
	if (isset($gCms->modules[$module]['object']))
	{
		echo '<div class="pagecontainer">';
		echo '<p class="pageheader">'.lang('moduleabout', array($module)).'</p>';
		if ($gCms->modules[$module]['object']->GetAuthor() != '')
		{
			echo "<br />".lang('author').": " . $gCms->modules[$module]['object']->GetAuthor();
			if ($gCms->modules[$module]['object']->GetAuthorEmail() != '')
			{
				echo ' &lt;' . $gCms->modules[$module]['object']->GetAuthorEmail() . '&gt;';
			}
			echo "<br />";
		}
		echo "<br />".lang('version').": " .$gCms->modules[$module]['object']->GetVersion() . "<br />";

		if ($gCms->modules[$module]['object']->GetChangeLog() != '')
		{
			echo "<br />".lang('changehistory').":<br />";
			echo $gCms->modules[$module]['object']->GetChangeLog() . '<br />';
		}
		echo "</div>";
	}
	echo '<p class="pageback"><a class="pageback" href="listmodules.php">&#171; '.lang('back').'</a></p>';
}
else if ($action == "showmodulehelp")
{
	if (isset($gCms->modules[$module]['object']))
	{
		echo '<div class="pagecontainer">';
		echo '<p class="pageheader">'.lang('modulehelp', array($module)).'</p>';
		@ob_start();
		echo $gCms->modules[$module]['object']->GetHelp();
		$content = @ob_get_contents();
		@ob_end_clean();
		echo $content;
		$paramarray = $gCms->modules[$module]['object']->GetParameters();
		if (count($paramarray) > 0)
		{
			echo '<h3>'.lang('parameters').'</h3>';
			echo '<ul>';
			foreach ($paramarray as $oneparam)
			{
				echo '<li>';
				if ($oneparam['optional'] == true)
				{
					echo '<em>(optional)</em> ';
				}
				echo $oneparam['name'].'="'.$oneparam['default'].'" - '.$oneparam['help'].'</li>';
			}
			echo '</ul>';
		}
		echo "</div>";
	}
	echo '<p class="pageback"><a class="pageback" href="listmodules.php">&#171; '.lang('back').'</a></p>';
}
else if ($action == 'missingdeps')
{
	echo '<div class="pagecontainer">';
	echo '<p class="pageheader">'.lang('depsformodule', array($module)).'</p>';
	echo '<table cellspacing="0" class="AdminTable">';
	echo '<thead>';
	echo '<tr><th>'.lang('name').'</th><th>'.lang('minimumversion').'</th><th>'.lang('installed').'</th></tr>';
	echo '</thead>';
	echo '<tbody>';

	if (isset($gCms->modules[$module]))
	{
		$modinstance = $gCms->modules[$module]['object'];
		if (count($modinstance->GetDependencies()) > 0) #Check for any deps
		{
			$curclass = 'row1';
			#Now check to see if we can satisfy any deps
			debug_buffer($modinstance->GetDependencies(), 'deps in module');
			foreach ($modinstance->GetDependencies() as $onedepkey=>$onedepvalue)
			{
				echo '<tr class="'.$curclass.'"><td>'.$onedepkey.'</td><td>'.$onedepvalue.'</td><td>';

				$havedep = false;

				if (isset($gCms->modules[$onedepkey]) && 
					$gCms->modules[$onedepkey]['installed'] == true &&
					$gCms->modules[$onedepkey]['active'] == true &&
					version_compare($gCms->modules[$onedepkey]['Version'], $onedepvalue) > -1)
				{
					$havedep = true;
				}

				echo lang(($havedep?'true':'false'));
				echo '</td></tr>';
				($curclass=="row1"?$curclass="row2":$curclass="row1");
			}
		}
	}

	echo '</tbody>';
	echo '</table>';
	echo '</div>';
	echo '<p class="pageback"><a class="pageback" href="listmodules.php">&#171; '.lang('back').'</a></p>';
	}
	else
	{

		if ($action != "" && !$access) {
			echo "<p class=\"error\">".lang('needpermissionto', array('Modify Modules'))."</p>";
		}

		if (count($gCms->modules) > 0) {

			$query = "SELECT * from ".cms_db_prefix()."modules";
			$result = $db->Execute($query);
			while ($row = $result->FetchRow()) {
				$dbm[$row['module_name']]['Status'] = $row['status'];
				$dbm[$row['module_name']]['Version'] = $row['version'];
				$dbm[$row['module_name']]['Active'] = $row['active'];
			}

			?>

	<div class="pagecontainer">
		<div class="pageoverflow">
		<?php

		if (isset($_SESSION['modules_messages']) && count($_SESSION['modules_messages']) > 0)
		{
			echo '<ul class="messages">';
			foreach ($_SESSION['modules_messages'] as $onemessage)
			{
				echo "<li>" . $onemessage . "</li>";
			}
			echo "</ul>";
			unset($_SESSION['modules_messages']);
		}

		?>

	<?php echo '<p class="pageheader">'.lang('modules').'</p></div>'; ?>
	<table cellspacing="0" class="pagetable">
		<thead>
		<tr>
			<th><?php echo lang('name')?></th>
			<th><?php echo lang('version')?></th>
			<th><?php echo lang('status')?></th>
			<th class="pagepos"><?php echo lang('active')?></th>
			<th><?php echo lang('action')?></th>
			<th><?php echo lang('help')?></th>
			<th><?php echo lang('about')?></th>
		</tr>
		</thead>
		<tbody>

<?php

		$curclass = "row1";
		// construct true/false button images
        $image_true = $themeObject->DisplayImage('icons/system/true.gif', lang('true'),'','','systemicon');
        $image_false = $themeObject->DisplayImage('icons/system/false.gif', lang('false'),'','','systemicon');

		foreach($gCms->modules as $key=>$value)
		{
			$modinstance = $value['object'];

			echo "<tr class=\"".$curclass."\" onmouseover=\"this.className='".$curclass.'hover'."';\" onmouseout=\"this.className='".$curclass."';\">\n";
			echo "<td>$key</td>\n";
            if (!isset($dbm[$key])) #Not installed, lets put up the install button
            {
                $brokendeps = 0;

				$dependencies = $modinstance->GetDependencies();

				if (count($dependencies) > 0) #Check for any deps
				{
					#Now check to see if we can satisfy any deps
					foreach ($dependencies as $onedepkey=>$onedepvalue)
					{
						if (!isset($gCms->modules[$onedepkey]) ||
							$gCms->modules[$onedepkey]['installed'] != true ||
							$gCms->modules[$onedepkey]['active'] != true ||
							version_compare($gCms->modules[$onedepkey]['object']->GetVersion(), $onedepvalue) < 0)
						{
							$brokendeps++;
						}
					}
				}

                echo "<td>".$modinstance->GetVersion()."</td>";
				echo "<td>".lang('notinstalled')."</td>";

                if ($brokendeps > 0)
                {
                	echo "<td>&nbsp;</td>";
                	echo '<td><a href="listmodules.php?action=missingdeps&amp;module='.$key.'">'.lang('missingdependency').'</a></td>';
                }
                else
                {
                	echo "<td>&nbsp;</td>";
                    echo "<td><a href=\"listmodules.php?action=install&amp;module=".$key."\">".lang('install')."</a></td>";
                }
            }
			else if (version_compare($modinstance->GetVersion(), $dbm[$key]['Version']) == 1) #Check for an upgrade
			{
				echo "<td>".$dbm[$key]['Version']."</td>";
				echo "<td>".lang('needupgrade')."</td>";
				echo "<td class=\"pagepos\">".($dbm[$key]['Active']==="1"?"<a href='listmodules.php?action=setfalse&amp;module=".$key."'>".$image_true."</a>":"<a href='listmodules.php?action=settrue&amp;module=".$key."'>".$image_false."</a>")."</td>";
				echo "<td><a href=\"listmodules.php?action=upgrade&amp;module=".$key."&amp;oldversion=".$dbm[$key]['Version']."&amp;newversion=".$modinstance->GetVersion()."\" onclick=\"return confirm('".lang('upgradeconfirm')."');\">".lang('upgrade')."</a></td>";
			}
			else #Must be installed
			{
				echo "<td>".$dbm[$key]['Version']."</td>";
				echo "<td>".lang('installed')."</td>";
				#Can't be removed if it has a dependency...
				if (!$modinstance->CheckForDependents())
				{
					echo "<td class=\"pagepos\">".($dbm[$key]['Active']==="1"?"<a href='listmodules.php?action=setfalse&amp;module=".$key."'>".$image_true."</a>":"<a href='listmodules.php?action=settrue&amp;module=".$key."'>".$image_false."</a>")."</td>";
					echo "<td><a href=\"listmodules.php?action=uninstall&amp;module=".$key."\" onclick=\"return confirm('".($modinstance->UninstallPreMessage() !== FALSE?$modinstance->UninstallPreMessage():lang('uninstallconfirm'))."');\">".lang('uninstall')."</a></td>";
				}
				else
				{
					echo "<td>".($dbm[$key]['Active']==="1"?$image_true:"<a href='listmodules.php?action=settrue&amp;module=".$key."'>".$image_false."</a>")."</td>";
					echo "<td>".lang('hasdependents')."</td>";
				}
			}

			//Is there help?
			if ($modinstance->GetHelp() != '')
			{
				echo "<td><a href=\"listmodules.php?action=showmodulehelp&amp;module=".$key."\">".lang('help')."</a></td>";
			}
			else
			{
				echo "<td>&nbsp;</td>";
			}

			//About is constructed from other details now
			echo "<td><a href=\"listmodules.php?action=showmoduleabout&amp;module=".$key."\">".lang('about')."</a></td>";
		
			echo "</tr>\n";

			($curclass=="row1"?$curclass="row2":$curclass="row1");
		}

	?>

	</tbody>
</table>

	<?php
	echo '</div>';
	}
	echo '<p class="pageback"><a class="pageback" href="'.$themeObject->BackUrl().'">&#171; '.lang('back').'</a></p>';
}



include_once("footer.php");

# vim:ts=4 sw=4 noet
?>
