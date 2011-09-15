<?php
#CMS - CMS Made Simple
#(c)2004 by Ted Kulp (wishy@users.sf.net)
#This project's homepage is: http://www.cmsmadesimple.org
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

function smarty_cms_postfilter_postcompilefunc($tpl_output, &$smarty)
{
	$result = explode(':', $smarty->_current_file);
	if (count($result) > 1)
	{
		switch ($result[0])
		{
		case 'stylesheet':
		  Events::SendEvent('Core','StylesheetPostCompile',array('stylesheet'=>&$tpl_output));
		  break;

			case "content":
				Events::SendEvent('Core', 'ContentPostCompile', array('content' => &$tpl_output));
				break;

			case "template":
				Events::SendEvent('Core', 'TemplatePostCompile', array('template' => &$tpl_output));
				break;

			case "globalcontent":
				Events::SendEvent('Core', 'GlobalContentPostCompile', array('global_content' => &$tpl_output));
				break;

			default:
				break;
		}

	}

	Events::SendEvent('Core', 'SmartyPostCompile', array('content' => &$tpl_output));

	return $tpl_output;
}
?>
