<?php
#CMS - CMS Made Simple
#(c)2004-2006 by Ted Kulp (ted@cmsmadesimple.org)
#This project's homepage is: http://cmsmadesimple.org
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

function smarty_function_html_input($params, &$smarty)
{
	echo '<input type="text"';
	if (isset($params['id']))
		echo ' id="'.$params['id'].'"';
	else if (isset($params['html_id']))
		echo ' id="'.$params['html_id'].'"';
	if (isset($params['name']))
		echo ' name="'.$params['name'].'"';
	if (isset($params['size']))
		echo ' size="'.$params['size'].'"';
	if (isset($params['maxlength']))
		echo ' maxlength="'.$params['maxlength'].'"';
	if (isset($params['class']))
		echo ' class="'.$params['class'].'"';
	if (isset($params['value'])) {
		if (isset($params['useentities']) && $params['useentities'] == 'true') {
			echo ' value="'.cms_htmlentities($params['value']).'"';
		}
		else {
			echo ' value="'.$params['value'].'"';
		}
	}
	echo ' />';
}

?>