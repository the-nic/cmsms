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

require_once(dirname(__FILE__)."/include.php");

$templateid = "";
$stripbackground = false;
if (isset($_GET["templateid"])) $templateid = $_GET["templateid"];
if (isset($_GET["stripbackground"])) $stripbackground = true;

$result = get_stylesheet($templateid);

$css = $result['stylesheet']; 

#Perform the content stylesheet callback
foreach($gCms->modules as $key=>$value)
{
	#Perform the content postrender callback
	foreach($gCms->modules as $key=>$value)
	{
		if ($gCms->modules[$key]['installed'] == true &&
			$gCms->modules[$key]['active'] == true)
		{
			$gCms->modules[$key]['object']->ContentStylesheet($css);
		}
	}

}

#header("Content-Language: " . $current_language);
header("Content-Type: text/css; charset=" . $result['encoding']);

if ($stripbackground)
{
	#$css = preg_replace('/(\w*?background-color.*?\:\w*?).*?(;.*?)/', '', $css);
	$css = preg_replace('/(\w*?background-color.*?\:\w*?).*?(;.*?)/', '\\1transparent\\2', $css);
}

echo $css;

# vim:ts=4 sw=4 noet
?>
