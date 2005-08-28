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

function smarty_cms_function_cms_selflink($params, &$smarty) {

	global $gCms;
	$db = $gCms->db;
	$config = $gCms->config;

	if (isset($params['page']))
	{
		$page = $params['page'];

		# check if the page exists in the db
		$content = ContentManager::LoadContentFromAlias($page);
		if ($content !== FALSE)
		{
			$pageid = $content->Id();
			$alias = $content->Alias();
			$url = $content->GetUrl();
		}
	}
	
	if (isset($alias) && $alias != "") {
		if ($config["assume_mod_rewrite"]) 
			$url = $config["root_url"]."/".$alias.$config["page_extension"];
		else 
			$url = $config["root_url"]."/index.php?".$config["query_var"]."=".$alias;
	} else if (isset ($pageid)) {
		if ($config["assume_mod_rewrite"])
			$url = $config["root_url"]."/".$pageid.$config["page_extension"];
		else 
			$url = $config["root_url"]."/index.php?".$config["query_var"]."=".$pageid;
	} else {
		$url="";
	}

	if ($url != '') {
		$result = '';
		$anchor = '';
		if (isset($params['anchor'])) {
			$anchor .= '#'.$params['anchor'];
		}
		$result .= '<a href="'.$url.$anchor.'"';

		if (isset($params['target'])) {
			$result .= ' target="'.$params['target'].'"';
		}
		if (isset($params['id'])) {
			$result .= ' id="'.$params['id'].'"';
		}
		if (isset($params['class'])) {
			$result .= ' class="'.$params['class'].'"';
		}
		$result .= '>';
		
		if (isset($params['text']))	{
			$result .= $params['text'];
		} else {
			$result .= $params['page'];
		}

		$result .= '</a>';
	}
	else {
		$result .= "<!-- Not a valid cms_selflink -->".$params['text'];
	}
	
	return $result;
}

function smarty_cms_help_function_cms_selflink() {
	?>
	<h3>What does this do?</h3>
	<p>Creates a link to another cms content page inside your template or content.</p>
	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template/page like: <code>{cms_selflink page="1"}</code></p>
	<h3>What parameters does it take?</h3>
	<p>
	<ul>
		<li><tt>page</tt> - Page ID or alias to link to.</li>
		<li><em>(optional)</em> <tt>text</tt> - Text to show for the link.  If not given, the page variable is used instead.</li>
		<li><em>(optional)</em> <tt>anchor</tt> - Will make the link go to a particular anchor on the target page.</li>
		<li><em>(optional)</em> <tt>target</tt> - Optional target for the a link to point to.  Useful for frame and javascript situations.</li>
		<li><em>(optional}</em> <tt>class</tt> - Optional class for the a tag.
		<li><em>(optional}</em> <tt>id</tt> - Optional id for the a tag.
	</ul>
	</p>

	<?php
}

function smarty_cms_about_function_cms_selflink() {
	?>
	<p>Author: Ted Kulp &lt;tedkulp@users.sf.net&gt;</p>
	<p>Version: 1.1</p>
	<p>
	Change History:<br/>
	1.1 - Changed to new content system<br />
	1.0 - Initial release
	</p>
	<?php
}

# vim:ts=4 sw=4 noet
?>
