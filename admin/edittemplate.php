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

require_once("../include.php");
require_once("../lib/classes/class.template.inc.php");

check_login();

$error = "";

$template = "";
if (isset($_POST["template"])) $template = $_POST["template"];

$orig_template = "";
if (isset($_POST["orig_template"])) $orig_template = $_POST["orig_template"];

$content = "";
if (isset($_POST["content"])) $content = $_POST["content"];

$stylesheet = "";
if (isset($_POST["stylesheet"])) $stylesheet = $_POST["stylesheet"];

$encoding = "";
if (isset($_POST["encoding"])) $encoding = $_POST["encoding"];

$active = 1;
if (!isset($_POST["active"]) && isset($_POST["edittemplate"])) $active = 0;

$preview = false;
if (isset($_POST["preview"])) $preview = true;

$apply = false;
if (isset($_POST["apply"])) $apply = true;

$template_id = -1;
if (isset($_POST["template_id"])) $template_id = $_POST["template_id"];
else if (isset($_GET["template_id"])) $template_id = $_GET["template_id"];

if (isset($_POST["cancel"])) {
	redirect("listtemplates.php");
	return;
}

if ($preview || $apply)
    {
    	$CMS_EXCLUDE_FROM_RECENT=1;
    }

$userid = get_userid();
$access = check_permission($userid, 'Modify Templates');

$use_javasyntax = false;
if (get_preference($userid, 'use_javasyntax') == "1")$use_javasyntax = true;

if ($access)
{
	if (isset($_POST["edittemplate"]) && !$preview)
	{
		$validinfo = true;
		if ($template == "")
		{
			$error .= "<li>".lang('nofieldgiven', array(lang('name')))."</li>";
			$validinfo = false;
		}
		else if ($template != $orig_template)
		{
			$query = "SELECT template_id from ".cms_db_prefix()."templates WHERE template_name = " . $db->qstr($template);
			$result = $db->Execute($query);

			if ($result && $result->RowCount() > 0)
			{
				$error .= "<li>".lang('errortemplateinuse')."</li>";
				$validinfo = false;
			}
		}
		if ($content == "")
		{
			$error .= "<li>".lang('nofieldgiven', array(lang('content')))."</li>";
			$validinfo = false;
		}

		if ($validinfo)
		{
			$onetemplate = TemplateOperations::LoadTemplateByID($template_id);
			$onetemplate->name = $template;
			$onetemplate->content = $content;
			$onetemplate->stylesheet = $stylesheet;
			$onetemplate->encoding = $encoding;
			$onetemplate->active = $active;

			#Perform the edittemplate_pre callback
			foreach($gCms->modules as $key=>$value)
			{
				if ($gCms->modules[$key]['installed'] == true &&
					$gCms->modules[$key]['active'] == true)
				{
					$gCms->modules[$key]['object']->EditTemplatePre($onetemplate);
				}
			}

			$result = $onetemplate->save();

			if ($result)
			{
				#Perform the edittemplate_post callback
				foreach($gCms->modules as $key=>$value)
				{
					if ($gCms->modules[$key]['installed'] == true &&
						$gCms->modules[$key]['active'] == true)
					{
						$gCms->modules[$key]['object']->EditTemplatePost($onetemplate);
					}
				}

				if (!$apply)
				{
					audit($template_id, $onetemplate->name, 'Edited Template');
					redirect("listtemplates.php");
				}
			}
			else
			{
				$error .= "<li>".lang('errorupdatingtemplate')."</li>";
			}
		}
	}
	else if ($template_id != -1 && !$preview)
	{
		$onetemplate = TemplateOperations::LoadTemplateByID($template_id);
		$template = $onetemplate->name;
		$orig_template = $onetemplate->name;
		$content = $onetemplate->content;
		$stylesheet = $onetemplate->stylesheet;
		$encoding = $onetemplate->encoding;
		$active = $onetemplate->active;
	}
}

if (strlen($template) > 0)
    {
    $CMS_ADMIN_SUBTITLE = $template;
    }
include_once("header.php");

if (!$access)
{
	echo "<div class=\"pageerrorcontainer\"><p class=\"pageerror\">".lang('noaccessto', array(lang('edittemplate')))."</p></div>";
}
else
{
	if ($error != "")
	{
		echo "<div class=\"pageerrorcontainer\"><ul class=\"pageerror\">".$error."</ul></div>";	
	}

	if ($preview)
	{
		$data["title"] = "TITLE HERE";
		$data["content"] = "Test Content";
		#$data["template_id"] = $template_id;
		$data["stylesheet"] = $stylesheet;
		$data["encoding"] = $encoding;
		$data["template"] = $content;

		# add linked CSS if any
		$cssquery = "SELECT css_text FROM ".cms_db_prefix()."css, ".cms_db_prefix()."css_assoc
			WHERE	css_id		= assoc_css_id
			AND		assoc_type	= 'template'
			AND		assoc_to_id = '$template_id'";
		$cssresult = $db->Execute($cssquery);
		if ($cssresult && $cssresult->RowCount() > 0)
		{
			while ($cssline = $cssresult->FetchRow())
			{
				$data["stylesheet"] .= "\n".$cssline['css_text']."\n";
			}
		}

		$tmpfname = '';
		if (is_writable($config["previews_path"]))
		{
			$tmpfname = tempnam($config["previews_path"], "cmspreview");
		}
		else
		{
			$tmpfname = tempnam(TMP_CACHE_LOCATION, "cmspreview");
		}
		$handle = fopen($tmpfname, "w");
		fwrite($handle, serialize($data));
		fclose($handle);

?>
<div class="pagecontainer">
	<p class="pageheader"><?php echo lang('preview')?></p>
	<iframe class="preview" name="preview" src="<?php echo $config["root_url"]?>/preview.php?tmpfile=<?php echo urlencode(basename($tmpfname))?>"></iframe>
</div>
<?php

	}
?>

<div class="pagecontainer">
	<p class="pageheader"><?php echo lang('edittemplate')?></p>
	<form method="post" action="edittemplate.php">
		<div class="pageoverflow">
			<p class="pagetext"><?php echo lang('name')?>:</p>
			<p class="pageinput"><input type="text" name="template" maxlength="25" value="<?php echo $template?>" /></p>
		</div>
		<div class="pageoverflow">
			<p class="pagetext"><?php echo lang('content')?>:</p>
			<p class="pageinput"><?php echo create_textarea(false, $content, 'content', 'pagetextarea', 'content', $encoding)?>
		</div>
		<div class="pageoverflow">
			<p class="pagetext"><?php echo lang('stylesheet')?>:</p>
			<p class="pageinput"><?php echo create_textarea(false, $stylesheet, 'stylesheet', 'pagetextarea', '', $encoding)?></p>
		</div>
		<div class="pageoverflow">
			<p class="pagetext"><?php echo lang('active')?>:</p>
			<p class="pageinput"><input class="pagecheckbox" type="checkbox" name="active" <?php echo ($active == 1?"checked=\"checked\"":"") ?> /></p>
		</div>
		<div class="pageoverflow">
			<p class="pagetext"><?php echo lang('encoding')?>:</p>
			<p class="pageinput"><?php echo create_encoding_dropdown('encoding', $encoding) ?></p>
		</div>
		<div class="pageoverflow">
			<p class="pagetext">&nbsp;</p>
			<p class="pageinput">
				<input type="hidden" name="orig_template" value="<?php echo $orig_template?>" />
				<input type="hidden" name="template_id" value="<?php echo $template_id?>" />
				<input type="hidden" name="edittemplate" value="true" />
				<input type="submit" name="preview" value="<?php echo lang('preview')?>" class="button" onmouseover="this.className='buttonHover'" onmouseout="this.className='button'" />
				<input type="submit" value="<?php echo lang('submit')?>" class="pagebutton" onmouseover="this.className='pagebuttonhover'" onmouseout="this.className='pagebutton'" />
				<input type="submit" name="apply" value="<?php echo lang('apply')?>" class="pagebutton" onmouseover="this.className='pagebuttonhover'" onmouseout="this.className='pagebutton'" />
				<input type="submit" name="cancel" value="<?php echo lang('cancel')?>" class="pagebutton" onmouseover="this.className='pagebuttonhover'" onmouseout="this.className='pagebutton'" />
			</p>
		</div>
	</form>
</div>

<?php

}

echo '<p class="pageback"><a class="pageback" href="'.$themeObject->BackUrl().'">&#171; '.lang('back').'</a></p>';

include_once("footer.php");

# vim:ts=4 sw=4 noet
?>
