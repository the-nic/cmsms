<?php // -*- mode:php; tab-width:4; indent-tabs-mode:t;  -*-
#CMS - CMS Made Simple
#(c)2004-2008 by Ted Kulp (ted@cmsmadesimple.org)
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
#
#$Id$

/**
 * Page related functions.  Generally these are functions not necessarily
 * related to content, but more to the underlying mechanisms of the system.
 *
 * @package CMS
 */
/**
 * Checks to see if the user is logged in.   If not, redirects the browser
 * to the admin login.
 *
 * @since 0.1
 * @param string no_redirect - If true, then don't redirect if not logged in
 * @return bool If they're logged in, true.  If not logged in, false. 
 */
function check_login($no_redirect = false)
{
	return CmsLogin::check_login($no_redirect);
}

/**
 * Gets the userid of the currently logged in user.
 *
 * @returns If they're logged in, the user id.  If not logged in, false.
 * @since 0.1
 */
function get_userid($check = true)
{
	return CmsLogin::get_userid($check);
}

/**
 * Regenerates the user session information from a userid.  This is basically used
 * so that if the session expires, but the cookie still remains (site is left along
 * for 20+ minutes with no interaction), the user won't have to relogin to regenerate
 * the details.
 *
 * @since 0.5
 */
function generate_user_object($userid)
{
	return CmsLogin::generate_user_object($userid);
}

/**
 * Put an event into the audit (admin) log.  This should be
 * done on most admin events for consistency.
 *
 * @since 0.3
 */
function audit($itemid, $itemname, $action)
{
	global $gCms;
	$db = $gCms->GetDb();

	$userid = 0;
	$username = '';

	if (isset($_SESSION["cmsms_user_id"]))
	{
		$userid = $_SESSION["cmsms_user_id"];
	}
	else
	{
	    if (isset($_SESSION['login_user_id']))
	    {
		$userid = $_SESSION['login_user_id'];
		$username = $_SESSION['login_user_username'];
	    }
	}

	if (isset($_SESSION["cms_admin_username"]))
	{
		$username = $_SESSION["cms_admin_username"];
	}

	if (!isset($userid) || $userid == "") {
		$userid = 0;
	}

	$query = "INSERT INTO ".cms_db_prefix()."adminlog (timestamp, user_id, username, item_id, item_name, action) VALUES (?,?,?,?,?,?)";
	$db->Execute($query,array(time(),$userid,$username,$itemid,$itemname,$action));
}

function load_all_preferences($userid)
{
	global $gCms;
	$db = cms_db();
	
	$variables = array();

	$query = 'SELECT preference, value FROM '.cms_db_prefix().'userprefs WHERE user_id = ?';
	$result = &$db->Execute($query, array($userid));

	while ($result && !$result->EOF)
	{
		$variables[$result->fields['preference']] = $result->fields['value'];
		$result->MoveNext();
	}

	if ($result) $result->Close();
	
	return $variables;
}

/**
 * Gets the given preference for the given userid.
 *
 * @since 0.3
 */
function get_preference($userid, $prefname, $default='')
{
	global $gCms;
	$db = cms_db();

	$userprefs = $gCms->userprefs;
	$result = $default;

	if (!isset($userprefs))
	{
		$userprefs = load_all_preferences($userid);
		$gCms->userprefs = $userprefs;
	}

	if (isset($userprefs[$prefname]))
	{
		$result = $userprefs[$prefname];
	}

	return $result;
}

/**
 * Sets the given perference for the given userid with the given value.
 *
 * @since 0.3
 */
function set_preference($userid, $prefname, $value)
{
	$doinsert = true;

	global $gCms;
	$db =& $gCms->GetDb();

	$userprefs = &$gCms->userprefs;
	$userprefs[$prefname] = $value;

	$query = "SELECT value from ".cms_db_prefix()."userprefs WHERE user_id = ? AND preference = ?";
	$result = $db->Execute($query, array($userid, $prefname));

	if ($result && $result->RecordCount() > 0)
	{
		$doinsert = false;
	}
	
	if ($result) $result->Close();

	if ($doinsert)
	{
		$query = "INSERT INTO ".cms_db_prefix()."userprefs (user_id, preference, value) VALUES (?,?,?)";
		$db->Execute($query, array($userid, $prefname, $value));
	}
	else
	{
		$query = "UPDATE ".cms_db_prefix()."userprefs SET value = ? WHERE user_id = ? AND preference = ?";
		$db->Execute($query, array($value, $userid, $prefname));
	}
}

/**
 * Returns the stylesheet for the given templateid.  Returns a hash with encoding and stylesheet entries.
 *
 * @since 0.1
 */
function get_stylesheet($template_id, $media_type = '')
{
	$result = array();
	$css = "";

	global $gCms;
	$db = cms_db();
	$templateops = $gCms->GetTemplateOperations();

	$templateobj = FALSE;

	#Grab template id and make sure it's actually "somewhat" valid
	if (isset($template_id) && is_numeric($template_id) && $template_id > -1)
	{
		#Ok, it's valid, let's load the bugger
		$templateobj =& $templateops->LoadTemplateById($template_id);
	}

	#If it's valid after loading, then start the process...
	if ($templateobj !== FALSE && ($templateobj->active == '1' || $templateobj->active == TRUE) )
	{
		#Grab the encoding
		$result['encoding'] = CmsResponse::get_encoding();

		#Load in the "standard" template CSS if media type is empty
		if ($media_type == '')
		{
			if (isset($templateobj->stylesheet) && $templateobj->stylesheet != '')
			{
				$css .= $templateobj->stylesheet;
			}
		}

		#Handle "advanced" CSS Management
		$cssquery = "SELECT css_text FROM ".cms_db_prefix()."css c, ".cms_db_prefix()."css_assoc ca
			WHERE	id		= assoc_css_id
			AND		assoc_type	= 'template'
			AND		assoc_to_id = ?
			AND		c.media_type = ? ORDER BY ca.create_date";
		$cssresult =& $db->Execute($cssquery, array($template_id, $media_type));

		while ($cssresult && $cssline = $cssresult->FetchRow())
		{
			$css .= "\n".$cssline['css_text']."\n";
		}
		
		if ($cssresult) $cssresult->Close();
	}
	else
	{
		$result['nostylesheet'] = true;
		$result['encoding'] = CmsResponse::get_encoding();
	}

	#$css = preg_replace("/[\r\n]/", "", $css); //hack for tinymce
	$result['stylesheet'] = $css;

	return $result;
}

function get_stylesheet_media_types($template_id)
{
	$result = array();

	global $gCms;
	$db =& $gCms->GetDb();
	$templateops =& $gCms->GetTemplateOperations();

	$templateobj = FALSE;

	#Grab template id and make sure it's actually "somewhat" valid
	if (isset($template_id) && is_numeric($template_id) && $template_id > -1)
	{
		#Ok, it's valid, let's load the bugger
		$templateobj = $templateops->LoadTemplateById($template_id);
		if (isset($templateobj->stylesheet) && $templateobj->stylesheet != '')
		{
			$result[] = '';
		}
	}

	#If it's valid after loading, then start the process...
	if ($templateobj !== FALSE && ($templateobj->active == '1' || $templateobj->active == TRUE) )
	{
		#Handle "advanced" CSS Management
		$cssquery = "SELECT DISTINCT media_type FROM ".cms_db_prefix()."css c, ".cms_db_prefix()."css_assoc
			WHERE	id		= assoc_css_id
			AND		assoc_type	= 'template'
			AND		assoc_to_id = ?";
		$cssresult = &$db->Execute($cssquery, array($template_id));

		while ($cssresult && !$cssresult->EOF)
		{
			if (!in_array($cssresult->fields['media_type'], $result))
				$result[] =& $cssresult->fields['media_type'];
			$cssresult->MoveNext();
		}
		
		if ($cssresult) $cssresult->Close();
	}

	return $result;
}

/**
 * Strips slashes from an array of values.
 */
function & stripslashes_deep(&$value) 
{ 
        if (is_array($value)) 
        { 
                $value = array_map('stripslashes_deep', $value); 
        } 
        elseif (!empty($value) && is_string($value)) 
        { 
                $value = stripslashes($value); 
        } 
        return $value;
}
	
function create_textarea($enablewysiwyg, $text, $name, $classname='', $id='', $encoding='', $stylesheet='', $width='80', $height='15',$forcewysiwyg='',$wantedsyntax='')
{
	global $gCms;
	$result = '';

	if ($enablewysiwyg == true)
	{
		reset($gCms->modules);
		while (list($key) = each($gCms->modules))
		{
			$value =& $gCms->modules[$key];
			if ($gCms->modules[$key]['installed'] == true && //is the module installed?
				$gCms->modules[$key]['active'] == true &&			 //us the module active?
				$gCms->modules[$key]['object']->is_wysiwyg())   //is it a wysiwyg module?
			{
				if ($forcewysiwyg=='') {
					//get_preference(get_userid(), 'wysiwyg')!="" && //not needed as it won't match the wisiwyg anyway
					if ($gCms->modules[$key]['object']->get_name()==get_preference(get_userid(false), 'wysiwyg')) {
						$result=$gCms->modules[$key]['object']->wysiwyg_textarea($name,$width,$height,$encoding,$text,$stylesheet);
					}
				} else {
					if ($gCms->modules[$key]['object']->get_name()==$forcewysiwyg) {
						$result=$gCms->modules[$key]['object']->wysiwyg_textarea($name,$width,$height,$encoding,$text,$stylesheet);
					}
				}
			}
		}
	}
	
  if (($result=="") && ($wantedsyntax!=''))
	{	  
		reset($gCms->modules);
		while (list($key) = each($gCms->modules))
		{
			$value =& $gCms->modules[$key];
			if ($gCms->modules[$key]['installed'] == true && //is the module installed?
				$gCms->modules[$key]['active'] == true &&			 //us the module active?
				$gCms->modules[$key]['object']->IsSyntaxHighlighter())   //is it a syntaxhighlighter module module?
			{
				if ($forcewysiwyg=='') {
					//get_preference(get_userid(), 'wysiwyg')!="" && //not needed as it won't match the wisiwyg anyway
					if ($gCms->modules[$key]['object']->GetName()==get_preference(get_userid(false), 'syntaxhighlighter')) {
						$result=$gCms->modules[$key]['object']->SyntaxTextarea($name,$wantedsyntax,$width,$height,$encoding,$text);
					}
				} else {
					if ($gCms->modules[$key]['object']->GetName()==$forcewysiwyg) {
						$result=$gCms->modules[$key]['object']->SyntaxTextarea($name,$wantedsyntax,$width,$height,$encoding,$text);
					}
				}
			}
		}
	}

	if ($result == '')
	{
		$result = '<textarea name="'.$name.'" cols="'.$width.'" rows="'.$height.'"';
		if ($classname != '')
		{
			$result .= ' class="'.$classname.'"';
		}
		if ($id != '')
		{
			$result .= ' id="'.$id.'"';
		}
		$result .= '>'.cms_htmlentities($text,ENT_NOQUOTES,CmsResponse::get_encoding()).'</textarea>';
	}

	return $result;
}

/*
 * Displays the login form (frontend)
 */
function display_login_form()
{
	return '<form method=post action="'.$_SERVER['PHP_SELF'].'">'.
	'Name: <input type="text" name="login_name"><br>'.
	'Password: <input type="password" name="login_password"><br>'.
	'<input type="submit">'.
	'</form>';
}

/**
 * Creates a string containing links to all the pages.
 * @param page - the current page to display
 * @param totalrows - the amount of items being listed
 * @param limit - the amount of items to list per page
 * @return a string containing links to all the pages (ex. next 1,2 prev)
 */
 function pagination($page, $totalrows, $limit)
 {
	$page_string = "";
	$from = ($page * $limit) - $limit;
	$numofpages = $totalrows / $limit;
	if ($numofpages > 1)
	{
		if($page != 1)
		{
			$pageprev = $page-1;
			$page_string .= "<a href=\"".$_SERVER['PHP_SELF']."?page=$pageprev\">".lang('previous')."</a>&nbsp;";
		}
		else
		{
			$page_string .= lang('previous')." ";
		}
		for($i = 1; $i <= $numofpages; $i++)
		{
			if($i == $page)
			{
				$page_string .= $i."&nbsp;";
			}
			else
			{
				$page_string .= "<a href=\"".$_SERVER['PHP_SELF']."?page=$i\">$i</a>&nbsp;";
			}
		}

		if(($totalrows % $limit) != 0)
		{
			if($i == $page)
			{
				$page_string .= $i."&nbsp;";
			}
			else
			{
				$page_string .= "<a href=\"".$_SERVER['PHP_SELF']."?page=$i\">$i</a>&nbsp;";
			}
		}

		if(($totalrows - ($limit * $page)) > 0)
		{
			$pagenext = $page+1;
			$page_string .= "<a href=\"".$_SERVER['PHP_SELF']."?page=$pagenext\">".lang('next')."</a>";
		}
		else
		{
			$page_string .= lang('next')." ";
		}
	}
	return $page_string;
 }


function wysiwyg_form_submit()
{
	global $gCms;
	$result = '';

	$userid = get_userid(false);
    if( $userid != '' ) 
    {
	    $wysiwyg = get_preference($userid, 'wysiwyg');
    }

	if (isset($wysiwyg) && $wysiwyg != '')
	{
		#Perform the content title callback
		reset($gCms->modules);
		while (list($key) = each($gCms->modules))
		{
			$value =&  $gCms->modules[$key];
			if ($gCms->modules[$key]['installed'] == true &&
				$gCms->modules[$key]['active'] == true)
			{
				@ob_start();
				$gCms->modules[$key]['object']->WYSIWYGPageFormSubmit();
				$result = @ob_get_contents();
				@ob_end_clean();
			}
		}
	}

	return $result;
}

# vim:ts=4 sw=4 noet
?>
