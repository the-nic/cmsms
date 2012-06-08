<?php
#CMS - CMS Made Simple
#(c)2004-2012 by Ted Kulp (wishy@users.sf.net)
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

function smarty_function_cms_lang_info($params, &$template)
{
  $smarty = $template->smarty;

  $lang = CmsNlsOperations::get_current_language();
  if( isset($params['lang']) ) {
    $lang = trim($params['lang']);
  }
  $info = CmsNlsOperations::get_language_info($lang);
  if( !$info ) return;

  if( isset($params['assign']) )
    {
      $smarty->assign($params['assign'],$info);
      return;
    }
  return $info;
}

?>
