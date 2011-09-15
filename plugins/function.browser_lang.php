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

function smarty_cms_function_browser_lang($params, &$smarty)
{
  $default = 'en';

  //
  // get the default language
  //
  if( isset($params['default']) )
    {
      $default = strtolower(substr($params['default'],0,2));
    }

  // 
  // get the accepted languages
  //
  if( !isset($params['accepted']) )
    {
      return $default;
    }
  $tmp = trim($params['accepted']);
  $tmp = trim($tmp,',');
  $tmp2 = explode(',',$tmp);
  if( !is_array($accepted) || count($accepted) == 0 )
    {
      return $default;
    }
  $accepted = array();
  for( $i = 0; $i < count($tmp2); $i++ )
    {
      if( strlen($tmp2[$i]) < 2 ) continue;
      $accepted[] = strtolower(substr($tmp2[$i],0,2));
    }

  //
  // process the accepted languages and the default
  // makes sure the array is unique, and that the default
  // is listed first.
  //
  $accepted = array_merge(array($default),$accepted);
  $accepted = array_unique($accepted);

  // 
  // now process browser language.
  //
  $res = $default;
  if (isset($_SERVER["HTTP_ACCEPT_LANGUAGE"])) 
    {
      $alllang = $_SERVER["HTTP_ACCEPT_LANGUAGE"];
      if (strpos($alllang, ";") !== FALSE)
	$alllang = substr($alllang,0,strpos($alllang, ";"));
      $langs = explode(",", $alllang);

      if( is_array($langs) && count($langs) )
	{
	  foreach( $langs as $one )
	    {
	      if( in_array($one,$accepted) )
		{
		  $res = $one;
		  break;
		}
	    }
	}
    }

  if( isset($params['assign']) )
    {
      $smarty->assign(trim($params['assign']),$res);
      return;
    }
  
  return $res;
}


function smarty_cms_help_function_browser_lang()
{
 echo lang('help_function_browser_lang');
}


function smarty_cms_about_function_browser_lang()
{
?>
  <p>Author: Robert Campbell &lt;calguy1000@cmsmadesimple.org&gt;</p>
  <p>Version: 1.0</p>
  <p>
  Change History:<br/>
  <ul>
   <li>Version 1.0 written for CMSMS 1.9</li>
  </ul>
  </p>
<?php
}
