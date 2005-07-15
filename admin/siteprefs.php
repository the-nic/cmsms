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
$CMS_TOP_MENU='admin';
$CMS_ADMIN_TITLE='preferences';

require_once("../include.php");

check_login();

$error = "";
$message = "";

$enablecustom404 = "0";
if (isset($_POST["enablecustom404"])) $enablecustom404 = "1";

$custom404 = "<p>Page not found<//p>";
if (isset($_POST["custom404"])) $custom404 = $_POST["custom404"];

$custom404template = "-1";
if (isset($_POST["custom404template"])) $custom404template = $_POST["custom404template"];

$enablesitedownmessage = "0";
if (isset($_POST["enablesitedownmessage"])) $enablesitedownmessage = "1";

$sitedownmessage = "<p>Site is current down.  Check back later.</p>";
if (isset($_POST["sitedownmessage"])) $sitedownmessage = $_POST["sitedownmessage"];

$sitedownmessagetemplate = "-1";
if (isset($_POST["sitedownmessagetemplate"])) $sitedownmessagetemplate = $_POST["sitedownmessagetemplate"];

#$useadvancedcss = "1";
#if (isset($_POST["useadvancedcss"])) $useadvancedcss = $_POST["useadvancedcss"];

// ADDED
$logintheme = "default";
if (isset($_POST["logintheme"])) $logintheme = $_POST["logintheme"];
// STOP


$userid = get_userid();
$access = check_permission($userid, 'Modify Site Preferences');

$use_javasyntax = false;
if (get_preference($userid, 'use_javasyntax') == "1")$use_javasyntax = true;

if (isset($_POST["cancel"])) {
	redirect("index.php");
	return;
}

if (isset($_POST['clearcache']))
{
	$smarty = new Smarty_CMS($config);
	$smarty->clear_all_cache();
	$smarty->clear_compiled_tpl();
	$message .= lang('cachecleared');
}
else if (isset($_POST["editsiteprefs"]))
{
	if ($access)
	{
		set_site_preference('enablecustom404', $enablecustom404);
		set_site_preference('custom404', $custom404);
		set_site_preference('custom404template', $custom404template);
		set_site_preference('enablesitedownmessage', $enablesitedownmessage);
		set_site_preference('sitedownmessage', $sitedownmessage);
		#set_site_preference('sitedownmessagetemplate', $sitedownmessagetemplate);
		#set_site_preference('useadvancedcss', $useadvancedcss);
		set_site_preference('logintheme', $logintheme);
		audit(-1, '', 'Edited Site Preferences');
		//redirect("siteprefs.php");
		//return;
		$message .= lang('prefsupdated');
	}
	else
	{
		$error .= "<li>".lang('noaccessto', array('Modify Site Permissions'))."</li>";
	}
} else if (!isset($_POST["submit"])) {
	$enablecustom404 = get_site_preference('enablecustom404');
	$custom404 = get_site_preference('custom404');
	$custom404template = get_site_preference('custom404template');
	$enablesitedownmessage = get_site_preference('enablesitedownmessage');
	$sitedownmessage = get_site_preference('sitedownmessage');
	#$sitedownmessagetemplate = get_site_preference('sitedownmessagetemplate');
	#$useadvancedcss = get_site_preference('useadvancedcss');
	$logintheme = get_site_preference('logintheme', 'default');
}

$templates = array();
$templates['-1'] = 'None';

$query = "SELECT * FROM ".cms_db_prefix()."templates ORDER BY template_name";
$result = $db->Execute($query);

if ($result && $result->RowCount() > 0)
{
	while ($row = $result->FetchRow())
	{
		$templates[$row['template_id']] = $row['template_name'];
	}
}

include_once("header.php");

if ($error != "") {
	echo "<div class=\"pageerrorcontainer\"><ul class=\"error\">".$error."</ul></div>";	
}
if ($message != "") {
	echo '<div class="pagemcontainer"><p class="pagemessage">'.$message.'</p></div>';
}
?>

<div class="pagecontainer">
	<p class="pageheader"><?php echo lang("siteprefs")?></p>
	<form id="siteprefform" method="post" action="siteprefs.php">
		<div class="pageoverflow">
			<p class="pagetext"><?php echo lang('clearcache') ?>:</p>
			<p class="pageinput">
				<input class="pagebutton" onmouseover="this.className='pagebuttonhover'" onmouseout="this.className='pagebutton'" type="submit" name="clearcache" value="<?php echo lang('clear') ?>" />
			</p>
		</div>
		<div class="pageoverflow">
			<p class="pagetext"><?php echo lang('enablecustom404') ?>:</p>
			<p class="pageinput"><input class="pagenb" type="checkbox" name="enablecustom404" <?php if ($enablecustom404 == "1") echo "checked=\"checked\""?> /></p>
		</div>
		<div class="pageoverflow">
			<p class="pagetext"><?php echo lang('custom404')?>:</p>
			<p class="pageinput"><textarea class="pagetextarea" name="custom404" cols="" rows=""><?php echo $custom404?></textarea></p>
		</div>
		<div class="pageoverflow">
			<p class="pagetext"><?php echo lang('template')?>:</p>
			<p class="pageinput">
				<select name="custom404template">
				<?php
					foreach ($templates as $key=>$value)
					{
						echo "<option value=\"".$key."\"";
						if ($key == $custom404template)
						{
							echo " selected=\"selected\"";
						}
						echo ">".$value."</option>";
					}
				?>
				</select>
			</p>
		</div>
		<div class="pageoverflow">
			<p class="pagetext"><?php echo lang('enablesitedown')?>:</p>
			<p class="pageinput"><input class="pagenb" type="checkbox" name="enablesitedownmessage" <?php if ($enablesitedownmessage == "1") echo "checked=\"checked\""?> /></p>
		</div>
		<div class="pageoverflow">
			<p class="pagetext"><?php echo lang('sitedownmessage')?>:</p>
			<p class="pageinput"><textarea class="pagetextarea" name="sitedownmessage" cols="" rows=""><?php echo $sitedownmessage?></textarea></p>
		</div>
		<!--
		<div class="pageoverflow">
			<p class="pagetext"><?php echo lang('template')?>:</p>
			<p class="pageinput">
			<select>
			<?php
				foreach ($templates as $key=>$value)
				{
					echo "<option value=\"".$key."\"";
					if ($key == $sitedownmessagetemplate)
					{
						echo " selected=\"selected\"";
					}
					echo ">".$value."</option>";
				}
			?>
			</select>
			</p>
		</div>
		-->
  <?php
	if ($dir=opendir(dirname(__FILE__)."/themes/")) { //Does the themedir exist at all, it should...
	?>
	<div class="pageoverflow">
		<p class="pagetext"><?php echo lang('admintheme') ?>:</p>
		<p class="pageinput">
		<select name="logintheme">
			<?php
			  while (($file = readdir($dir)) !== false) {
				  	if (is_dir("themes/".$file) && ($file[0]!='.')) {
			?>
		  		<option value="<?php echo $file?>"<?php echo (get_site_preference('logintheme', 'default')==$file?" selected=\"selected\"":"")?>><?php echo $file?></option>				  
				  <?php
		  	}
		  }
				?>				
			</select>
		</p>
	</div>
	<?php }?>
	
	
	<?php if ($access) { ?>
	<div class="pageoverflow">
		<p class="pagetext">&nbsp;</p>
		<p class="pageinput">
			<input type="hidden" name="editsiteprefs" value="true" />
			<input type="submit" name="submit" value="<?php echo lang('submit')?>" class="pagebutton" onmouseover="this.className='pagebuttonhover'" onmouseout="this.className='pagebutton'" />
			<input type="submit" name="cancel" value="<?php echo lang('cancel')?>" class="pagebutton" onmouseover="this.className='pagebuttonhover'" onmouseout="this.className='pagebutton'" />
		</p>
	</div>
	<?php } ?>
	</form>
</div>

<?php
echo '<p class="pageback"><a class="pageback" href="'.$themeObject->BackUrl().'">&#171; '.lang('back').'</a></p>';
include_once("footer.php");

# vim:ts=4 sw=4 noet
?>
