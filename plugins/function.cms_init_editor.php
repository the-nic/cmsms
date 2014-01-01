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

function smarty_function_cms_init_editor($params, &$template)
{
  $smarty = $template->smarty;

  $wysiwygs = CmsFormUtils::get_requested_wysiwyg_modules();
  if( !is_array($wysiwygs) || count($wysiwygs) == 0 ) return;

  
  $mod = ModuleOperations::get_instance()->GetWYSIWYGModule();
  if( !is_object($mod) ) return;

  // get the output
  $output = $mod->WYSIWYGGenerateHeader();
  if( !$output ) return;

  if( isset($params['assign']) ) {
    $smarty->assign(trim($params['assign']).$output);
    return;
  }
  return $output;
}

function smarty_cms_about_function_cms_init_editor()
{
?>
	<p>Author: Robert Campbell&lt;calguy1000@cmsmadesimple.org&gt;</p>
	
	<p>Change History:</p>
	<ul>
		<li>None</li>
	</ul>
<?php
}
?>