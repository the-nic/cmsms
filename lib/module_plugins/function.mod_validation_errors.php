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

function smarty_function_mod_validation_errors($params, &$smarty)
{
	$module =& $smarty->get_template_vars('cms_mapi_module');
	$id = $smarty->get_template_vars('cms_mapi_id');
	$return_id = $smarty->get_template_vars('cms_mapi_return_id');

	if (isset($params['for']) && is_object($params['for']))
	{
		if (isset($params['for']->validation_errors) &&
			is_array($params['for']->validation_errors) &&
			count($params['for']->validation_errors) > 0)
		{
			echo '<div class="pageerrorcontainer pageoverflow"><p class="pageerror">';
			echo '<ul class="pageerror">';
			foreach ($params['for']->validation_errors as $err)
			{
				echo '<li>' . $err . '</li>';
			}
			echo '</ul>';
			echo '</p></div>';
		}
	}
}

?>
