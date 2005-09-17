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

function smarty_cms_function_breadcrumbs($params, &$smarty)
{
	global $gCms; 

	$thispage = $gCms->variables['content_id'];

	$trail = "";

	#Check if user has specified a delimiter, otherwise use default
	if (isset($params['delimiter']))
	{
		$delimiter = $params['delimiter'];
	}
	else
	{
		$delimiter = "&gt;&gt;";
	}

	#Check if user has requested an initial delimiter
	if (isset($params['initial']))
	{
		if ($params['initial'] == "1")
		{
			$trail .= $delimiter . " ";
		}
	}

	#Make an array for all pages
	$allcontent = array();

	#Load current content
	$onecontent = ContentManager::LoadContentFromId($thispage, false);

	#Check if user has requested the list to start with a specific page
	if (isset($params['root']))
	{
		if (($onecontent == FALSE) || (strtolower($onecontent->Alias()) != strtolower($params['root'])))
		{
			$rootcontent = ContentManager::LoadContentFromAlias($params['root'], false);
			if ($rootcontent)
			{
				$trail .= '<a href="' . $rootcontent->getURL() . '"';
				if (isset($params['classid']))
				{
						$trail .= ' class="' . $params['classid'] . '"';
				}
				$trail .= '>';
				$trail .= ($rootcontent->MenuText()!=''?$rootcontent->MenuText():$rootcontent->Name());
				$trail .= '</a> ' . $delimiter . ' ';
			}
		}
	}

	if ($onecontent !== FALSE)
	{
		array_push($allcontent, $onecontent);

		#Grab all parents and put them into the array as well
		while ($onecontent->ParentId() > 0)
		{
			$onecontent = ContentManager::LoadContentFromId($onecontent->ParentId(), false);
			// tdh add / modify next 5 lines
			if (isset($params['root']))
			{
				if (strtolower($onecontent->Alias()) != strtolower($params['root']))
				{
					array_push($allcontent, $onecontent);
				}
			}
			else
			{
				array_push($allcontent, $onecontent);
			}
		}

		#Pull them one by one in reverse order to construct a breadcrumb list
		while ($onecontent = array_pop($allcontent))
		{
			if ($onecontent->Id() != $thispage && $onecontent->Type() != 'seperator')
			{
                                if (($onecontent->getURL() != "") && ($onecontent->Type() != 'sectionheader')) {
                                        $trail .= '<a href="' . $onecontent->getURL() . '"';
                                        if (isset($params['classid'])) {
                                                $trail .= ' class="' . $params['classid'] . '"';
                                        }
                                        $trail .= '>';
                                        $trail .= ($onecontent->MenuText()!=''?$onecontent->MenuText():$onecontent->Name());
                                        $trail .= '</a> ' . $delimiter . ' ';
                                } else {
                                        if (isset($params['classid'])) {
                                                $trail .= '<span class="' . $params['classid'] . '">';
                                        }
                                        $trail .= ($onecontent->MenuText()!=''?$onecontent->MenuText():$onecontent->Name());
                                        if (isset($params['classid'])) {
                                                $trail .= '</span>';
                                        }
                                        $trail .= ' ' . $delimiter . ' ';
                                }
			} else {
                                if (isset($params['currentclassid'])) {
                                        $trail .= '<span class="' . $params['currentclassid'] . '">';
                                } else {
                                        $trail .= '<strong>';
                                }
                                $trail .= ($onecontent->MenuText()!=''?$onecontent->MenuText():$onecontent->Name());
                                if (isset($params['currentclassid'])) {
                                        $trail .= '</span>';
                                } else {
                                        $trail .= '</strong>';
                                }
			}
		}
	} else {
                if (isset($params['currentclassid'])) {
                        $trail .= '<span class="' . $params['currentclassid'] . '">';
                } else {
                        $trail .= '<strong>';
                }
                $trail .= 'No pages';
                if (isset($params['currentclassid'])) {
                        $trail .= '</span>';
                } else {
                        $trail .= '</strong>';
                }
	}

	return $trail;
}

function smarty_cms_help_function_breadcrumbs() {
// tdh added the classid help text
?>
<h3>What does this do?</h3>
<p>Prints a breadcrumb trail .</p>
<h3>How do I use it?</h3>
<p>Just insert the tag into your template/page like: <code>{breadcrumbs}</code></p>
<h3>What parameters does it take?</h3>
<p>
<ul>
<li><em>(optional)</em> <tt>delimiter</tt> - Text to seperate entries in the list (default "&gt;&gt;").</li>
<li><em>(optional)</em> <tt>initial</tt> - 1/0 If set to 1 start the breadcrumbs with a delimiter (default 0).</li>
<li><em>(optional)</em> <tt>root</tt> - Page alias of a page you want to always appear as the first page in
    the list. Can be used to make a page (e.g. the front page) appear to be the root of everything even though it is not.</li>
<li><em>(optional)</em> <tt>classid</tt> - The CSS class for the non current page names, i.e. the first n-1 pages in the list. If the name is a link it is added to the &lt;a href&gt; tags, otherwise it is added to the &lt;span&gt; tags.</li>
<li><em>(optional)</em> <tt>currentclassid</tt> - The CSS class for the &lt;span&gt; tag surrounding the current page name.</li>
</ul>
</p>
<?php
}

function smarty_cms_about_function_breadcrumbs() {
?>
<p>Author: Marcus Deglos &lt;<a href="mailto:md@zioncore.com">md@zioncore.com</a>&gt;</p>
<p>Version: 1.4</p>
<p>
Change History:<br/>
1.1 - Modified to use new content rewrite (wishy)<br />
1.2 - Added parameters: delimiter, initial, and root (arl)<br />
1.3 - Added parameter: classid (tdh / perl4ever)<br />
1.4 - Added parameter currentclassid and fixed some bugs (arl)<br />
</p>
<?php
}
# vim:ts=4 sw=4 noet
?>
