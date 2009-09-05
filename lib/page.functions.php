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
#$Id: page.functions.php 5753 2009-05-23 16:29:06Z calguy1000 $

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
 * @returns If they're logged in, true.  If not logged in, false. 
 */
function check_login($no_redirect = false)
{
	global $gCms;
	$config =& $gCms->GetConfig();

	//Handle a current login if one is in queue in the SESSION
	if (isset($_SESSION['login_user_id']))
	{
		debug_buffer("Found login_user_id.  Going to generate the user object.");
		generate_user_object($_SESSION['login_user_id']);
		unset($_SESSION['login_user_id']);
	}

	if (isset($_SESSION['login_cms_language']))
	{
		debug_buffer('Setting language to: ' . $_SESSION['login_cms_language']);
		setcookie('cms_language', $_SESSION['login_cms_language']);
		unset($_SESSION['login_cms_language']);
	}

	if (!isset($_SESSION["cms_admin_user_id"]))
	{
		debug_buffer('No session found.  Now check for cookies');
		if (isset($_COOKIE["cms_admin_user_id"]) && isset($_COOKIE["cms_passhash"]))
		{
			debug_buffer('Cookies found, do a passhash check');
			if (check_passhash($_COOKIE["cms_admin_user_id"], $_COOKIE["cms_passhash"]))
			{
				debug_buffer('passhash check succeeded...  creating session object');
				generate_user_object($_COOKIE["cms_admin_user_id"]);
			}
			else
			{
				debug_buffer('passhash check failed...  redirect to login');
				$_SESSION["redirect_url"] = $_SERVER["REQUEST_URI"];
				if (false == $no_redirect)
				  {
				    redirect($config["root_url"]."/".$config['admin_dir']."/login.php");
				  }
				return false;
			}
		}
		else
		{
			debug_buffer('No cookies found.  Redirect to login.');
			$_SESSION["redirect_url"] = $_SERVER["REQUEST_URI"];
			if (false == $no_redirect)
			  {
			    redirect($config["root_url"]."/".$config['admin_dir']."/login.php");
			  }
			return false;
		}
	}

	debug_buffer('Session found.  Moving on...');

	global $CMS_ADMIN_PAGE;
	if( ($config['debug'] === false) && isset($CMS_ADMIN_PAGE) )
	  {
	    if( !isset($_SESSION[CMS_USER_KEY]) )
	      {
		// it's not in the session, try to grab something from cookies
		if( isset($_COOKIE[CMS_SECURE_PARAM_NAME]) )
		  {
		    $_SESSION[CMS_USER_KEY] = $_COOKIE[CMS_SECURE_PARAM_NAME];
		  }
	      }

	    // now we've got to check the request
	    // and make sure it matches the session key
	    if( !isset($_SESSION[CMS_USER_KEY]) || 
		!isset($_GET[CMS_SECURE_PARAM_NAME]) ||
                !isset($_POST[CMS_SECURE_PARAM_NAME]) )
	      {
		$v = '<no$!tgonna!$happen>';
		if( isset($_GET[CMS_SECURE_PARAM_NAME]) )
		  {
		    $v = $_GET[CMS_SECURE_PARAM_NAME];
		  }
		else if( isset($_POST[CMS_SECURE_PARAM_NAME]) )
		  {
		    $v = $_POST[CMS_SECURE_PARAM_NAME];
		  }

		if( $v != $_SESSION[CMS_USER_KEY] && !isset($config['stupidly_ignore_xss_vulnerability']) )
		  {
		    debug_buffer('Session key mismatch problem... redirect to login');
		    if (false == $no_redirect)
		      {
			redirect($config["root_url"]."/".$config['admin_dir']."/login.php");
		      }
		    return false;
		  }
	      }
	  }
	return true;
}

/**
 * Gets the userid of the currently logged in user.
 *
 * @returns If they're logged in, the user id.  If not logged in, false.
 * @since 0.1
 */
function get_userid($check = true)
{
	if ($check)
	{
		check_login(); //It'll redirect out to login if it fails
	}

	if (isset($_SESSION["cms_admin_user_id"]))
	{
		return $_SESSION["cms_admin_user_id"];
	}
	else
	{
		return false;
	}
}

function check_passhash($userid, $checksum)
{
	$check = false;

	global $gCms;
	$db =& $gCms->GetDb();
	$config =& $gCms->GetConfig();

	$userops =& $gCms->GetUserOperations();
	$oneuser =& $userops->LoadUserByID($userid);

	if ($oneuser && (string)$checksum != '' && $checksum == md5(md5($config['root_path'] . '--' . $oneuser->password)))
	{
		$check = true;
	}

	return $check;
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
	global $gCms;
	$db =& $gCms->GetDb();
	$config =& $gCms->GetConfig();

	$userops =& $gCms->GetUserOperations();
	$oneuser =& $userops->LoadUserByID($userid);

	if ($oneuser)
	{
		$_SESSION['cms_admin_user_id'] = $userid;
		$_SESSION['cms_admin_username'] = $oneuser->username;
		setcookie('cms_admin_user_id', $oneuser->id);
		setcookie('cms_passhash', md5(md5($config['root_path'] . '--' . $oneuser->password)));
		//setcookie(CMS_SECURE_PARAM_NAME, '', time() - 3600);
	}
}

function send_recovery_email($username)
{
	global $gCms;
	$config =& $gCms->GetConfig();
	$userops =& $gCms->GetUserOperations();
	$user = $userops->LoadUserByUsername($username);
	
	//Grab CMSMailer -- *cough* hack
	$obj = null;
	if (isset($gCms->modules['CMSMailer']) &&
		$gCms->modules['CMSMailer']['installed'] == true &&
		$gCms->modules['CMSMailer']['active'] == true)
	{
		$obj = $gCms->modules['CMSMailer']['object'];
	}
	
	if ($obj == null)
	{
		return false;
	}
	
	$obj->AddAddress($user->email, $firstname . ' ' . $lastname);
	$obj->SetSubject(lang('lostpwemailsubject',$gCms->siteprefs['sitename']));
	
	$url = $config['root_url'] . '/' . $config['admin_dir'] . '/login.php?recoverme=' . md5(md5($config['root_path'] . '--' . $user->username . md5($user->password)));
	$body = lang('lostpwemail',$gCms->siteprefs['sitename'], $user->username, $url);
	
	$obj->SetBody($body);
	
	return $obj->Send();
}

function find_recovery_user($hash)
{
	global $gCms;
	$config =& $gCms->GetConfig();
	$userops =& $gCms->GetUserOperations();
	
	foreach ($userops->LoadUsers() as $user)
	{
		if ($hash == md5(md5($config['root_path'] . '--' . $user->username . md5($user->password))))
		{
			return $user;
		}
	}
	
	return null;
}

/**
 * Loads all permissions for a particular user into a global variable so we don't hit the db for every one.
 *
 * @since 0.8
 */
function load_all_permissions($userid)
{
	global $gCms;
	$db = &$gCms->GetDb();
	$variables = &$gCms->variables;

	$perms = array();

	$query = "SELECT DISTINCT permission_name FROM ".cms_db_prefix()."user_groups ug INNER JOIN ".cms_db_prefix()."group_perms gp ON gp.group_id = ug.group_id INNER JOIN ".cms_db_prefix()."permissions p ON p.permission_id = gp.permission_id INNER JOIN ".cms_db_prefix()."groups gr ON gr.group_id = ug.group_id WHERE ug.user_id = ? AND gr.active = 1";
	$result = &$db->Execute($query, array($userid));
	while ($result && !$result->EOF)
	{
		$perms[] =& $result->fields['permission_name'];
		$result->MoveNext();
	}
	
	if ($result) $result->Close();

	$variables['userperms'] = $perms;
}

/**
 * Checks to see that the given userid has access to
 * the given permission.
 *
 * @returns mixed If they have perimission, true.  If they do not, false.
 * @since 0.1
 */
function check_permission($userid, $permname)
{
	$check = false;

	global $gCms;
	$userops =& $gCms->GetUserOperations();
	$adminuser = $userops->UserInGroup($userid,1);

	if (!isset($gCms->variables['userperms']))
	{
		load_all_permissions($userid);
	}

	if (isset($gCms->variables['userperms']))
	{
		if (in_array($permname, $gCms->variables['userperms']) || 
		    $adminuser || ($userid == 1) )
		{
			$check = true;
		}
	}

	return $check;
}

/**
 * Checks that the given userid is the owner of the given contentid.
 *
 * @returns mixed If they have ownership, true.  If they do not, false.
 * @since 0.1
 */
function check_ownership($userid, $contentid = '', $strict = false)
{
	$check = false;
	global $gCms;

	$userops =& $gCms->GetUserOperations();
	$adminuser = $userops->UserInGroup($userid,1);
	if( $adminuser ) return true;

	if (!isset($gCms->variables['ownerpages']))
	{
		$db =& $gCms->GetDb();

		$variables = &$gCms->variables;
		$variables['ownerpages'] = array();

		$query = "SELECT content_id FROM ".cms_db_prefix()."content WHERE owner_id = ?";
		$result = &$db->Execute($query, array($userid));

		while ($result && !$result->EOF)
		{
			$variables['ownerpages'][] =& $result->fields['content_id'];
			$result->MoveNext();
		}
		
		if ($result) $result->Close();
	}

	if (isset($gCms->variables['ownerpages']))
	{
		if (in_array($contentid, $gCms->variables['ownerpages']))
		{
			$check = true;
		}
	}

	return $check;
}

/**
 * Checks that the given userid has access to modify the given
 * pageid.  This would mean that they were set as additional
 * authors/editors by the owner.
 *
 * @returns mixed If they have authorship, true.  If they do not, false.
 * @since 0.2
 */
function check_authorship($userid, $contentid = '')
{
	$check = false;
	global $gCms;

	if (!isset($gCms->variables['authorpages']))
	{
	  author_pages($userid);
	}

	if (isset($gCms->variables['authorpages']))
	{
	  if (in_array($contentid, $gCms->variables['authorpages']))
	    {
	      $check = true;
	    }
	}

	return $check;
}

/**
 * Prepares an array with the list of the pages $userid is an author of
 *
 * @returns an array in whose elements are the IDs of the pages
 * @since 0.11
 */
function author_pages($userid)
{
	global $gCms;
	$db =& $gCms->GetDb();
	$userops =& $gCms->GetUserOperations();
        $variables = &$gCms->variables;
	if (!isset($variables['authorpages']))
	{
		$db = &$gCms->GetDb();
		$variables['authorpages'] = array();
		
		// Get all of the pages this user owns
		$query = "SELECT content_id FROM ".cms_db_prefix()."content WHERE owner_id = ?";
		$result =& $db->Execute($query, array($userid));
		
		while ($result && !$result->EOF)
		{
			$variables['authorpages'][] =& $result->fields['content_id'];
			$result->MoveNext();
		}
		
		if ($result) $result->Close();

		// Get all of the pages this user has access to.
		$query = "SELECT user_id,content_id FROM ".cms_db_prefix()."additional_users";
		$result = &$db->Execute($query);

		while ($result && !$result->EOF)
		{
		  $uid = $result->fields['user_id'];
		  $content_id = $result->fields['content_id'];
		  if( $uid == $userid )
		    {
		      $variables['authorpages'][] = $content_id;
		    }
		  else if( $uid < 0 )
		    {
		      $gid = $uid * -1;
		      if( $userops->UserInGroup($userid,$gid) )
			{
			  $variables['authorpages'][] = $content_id;
			}
		    }
		  $result->MoveNext();
		}
		
		if ($result) $result->Close();
	}

	return $variables['authorpages'];
}

/**
 * Quickly checks that the given userid has access to modify the given
 * pageid.  This would mean that they were set as additional
 * authors/editors by the owner.
 *
 * @returns mixed If they have authorship, true.  If they do not, false.
 * @since 0.11
 */
function quick_check_authorship($contentid, $hispages)
{
	$check = false;

	if (in_array($contentid, $hispages))
	{
		$check = true;
	}

	return $check;
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
	$db =& $gCms->GetDb();

	$userid = 0;
	$username = '';

	if (isset($_SESSION["cms_admin_user_id"]))
	{
		$userid = $_SESSION["cms_admin_user_id"];
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

/**
 * Loads a cache of site preferences so we only have to do it once.
 *
 * @since 0.6
 */
function load_site_preferences()
{
	$value = "";

	global $gCms;
	$db = &$gCms->GetDb();
	$siteprefs = &$gCms->siteprefs;

	if ($db)
	{
		$query = "SELECT sitepref_name, sitepref_value from ".cms_db_prefix()."siteprefs";
		$result = &$db->Execute($query);

		while ($result && !$result->EOF)
		{
			$siteprefs[$result->fields['sitepref_name']] = $result->fields['sitepref_value'];
			$result->MoveNext();
		}
		
		if ($result) $result->Close();
	}

	return $value;
}

/**
 * Gets the given site prefernce
 *
 * @since 0.6
 */
function get_site_preference($prefname, $defaultvalue = '') {

	$value = $defaultvalue;

	global $gCms;
	$siteprefs =& $gCms->siteprefs;
	
	if (count($siteprefs) == 0)
	{
		load_site_preferences();
	}

	if (isset($siteprefs[$prefname]))
	{
		$value = $siteprefs[$prefname];
	}

	return $value;
}

/**
 * Removes the given site preference
 *
 * @param string Preference name to remove
 */
function remove_site_preference($prefname,$uselike=false)
{
	global $gCms;
	$db =& $gCms->GetDb();
$db->debug = true;
	$siteprefs = &$gCms->siteprefs;

	$query = "DELETE from ".cms_db_prefix()."siteprefs WHERE sitepref_name = ?";
	if( $uselike == true )
	  {
	    $query = "DELETE from ".cms_db_prefix()."siteprefs WHERE sitepref_name LIKE ?";
		$prefname .= '%';
	  }
	$result = $db->Execute($query, array($prefname));

	if (isset($siteprefs[$prefname]))
	{
		unset($siteprefs[$prefname]);
	}
	
	if ($result) $result->Close();
}

/**
 * Sets the given site perference with the given value.
 *
 * @since 0.6
 */
function set_site_preference($prefname, $value)
{
	$doinsert = true;

	global $gCms;
	$db =& $gCms->GetDb();

	$siteprefs = &$gCms->siteprefs;

	$query = "SELECT sitepref_value from ".cms_db_prefix()."siteprefs WHERE sitepref_name = ".$db->qstr($prefname);
	$result = $db->Execute($query);

	if ($result && $result->RecordCount() > 0)
	{
		$doinsert = false;
	}
	
	if ($result) $result->Close();

	if ($doinsert)
	{
		$query = "INSERT INTO ".cms_db_prefix()."siteprefs (sitepref_name, sitepref_value) VALUES (".$db->qstr($prefname).", ".$db->qstr($value).")";
		$db->Execute($query);
	}
	else
	{
		$query = "UPDATE ".cms_db_prefix()."siteprefs SET sitepref_value = ".$db->qstr($value)." WHERE sitepref_name = ".$db->qstr($prefname);
		$db->Execute($query);
	}
	$siteprefs[$prefname] = $value;
}

function load_all_preferences($userid)
{
	global $gCms;
	$db = &$gCms->GetDb();
	$variables = &$gCms->userprefs;

	$query = 'SELECT preference, value FROM '.cms_db_prefix().'userprefs WHERE user_id = ?';
	$result = &$db->Execute($query, array($userid));

	while ($result && !$result->EOF)
	{
		$variables[$result->fields['preference']] = $result->fields['value'];
		$result->MoveNext();
	}
	
	if ($result) $result->Close();
}

/**
 * Gets the given preference for the given userid.
 *
 * @since 0.3
 */
function get_preference($userid, $prefname, $default='')
{
	global $gCms;
	$db =& $gCms->GetDb();

	$result = '';

	if (!isset($gCms->userprefs))
	{
		load_all_preferences($userid);
	}

	$userprefs = &$gCms->userprefs;
	if (isset($gCms->userprefs))
	{
		if (isset($userprefs[$prefname]))
		{
			$result = $userprefs[$prefname];
		}
		else
		{
			$result = $default;
		}
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

	if (!isset($gCms->userprefs))
	{
		load_all_preferences($userid);
	}


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
	$db =& $gCms->GetDb();
	$templateops =& $gCms->GetTemplateOperations();

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
		if ($templateobj->encoding !== FALSE && $templateobj->encoding != '')
		{
			$result['encoding'] = $templateobj->encoding;
		}
		else
		{
			$result['encoding'] = get_encoding();
		}

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
			WHERE	css_id		= assoc_css_id
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
		$result['encoding'] = get_encoding();
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
			WHERE	css_id		= assoc_css_id
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
	
function create_textarea($enablewysiwyg, $text, $name, $classname='', $id='', $encoding='', $stylesheet='', $width='80', $height='15',$forcewysiwyg='',$wantedsyntax='',$addtext='')
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
				$gCms->modules[$key]['object']->IsWYSIWYG())   //is it a wysiwyg module?
			{
			  
				if ($forcewysiwyg=='') {
				  
				  if (get_userid(false)==false) {

				    //echo "admin";
					  //get_preference(get_userid(), 'wysiwyg')!="" && //not needed as it won't match the wisiwyg anyway					  
				    if ($gCms->modules[$key]['object']->GetName()==get_site_preference('frontendwysiwyg')) {
				      
				      $result=$gCms->modules[$key]['object']->WYSIWYGTextarea($name,$width,$height,$encoding,$text,$stylesheet,$addtext);
					  }					  
				  } else {
				    
				    if ($gCms->modules[$key]['object']->GetName()==get_preference(get_userid(false), 'wysiwyg')) {
				      $result=$gCms->modules[$key]['object']->WYSIWYGTextarea($name,$width,$height,$encoding,$text,$stylesheet,$addtext);
					  }
				  }	 
				} else {
					if ($gCms->modules[$key]['object']->GetName()==$forcewysiwyg) {
					  $result=$gCms->modules[$key]['object']->WYSIWYGTextarea($name,$width,$height,$encoding,$text,$stylesheet,$addtext);
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
					  $result=$gCms->modules[$key]['object']->SyntaxTextarea($name,$wantedsyntax,$width,$height,$encoding,$text,$addtext);
					}
				} else {
					if ($gCms->modules[$key]['object']->GetName()==$forcewysiwyg) {
					  $result=$gCms->modules[$key]['object']->SyntaxTextarea($name,$wantedsyntax,$width,$height,$encoding,$text,$addtext);
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
		if( !empty( $addtext ) )
		  {
		    $result .= ' '.$addtext;
		  }

		$result .= '>'.cms_htmlentities($text,ENT_NOQUOTES,get_encoding($encoding)).'</textarea>';
	}

	return $result;
}

/*
 * creates a textarea that does syntax highlighting on the source code.
 * The following also needs to be added to the <form> tag for submit to work.
 * if($use_javasyntax){echo 'onSubmit="textarea_submit(
 * this, \'custom404,sitedown\');"';}
 */
/*
OBSOLETE!!!

function textarea_highlight($use_javasyntax, $text, $name, $class_name="syntaxHighlight", $syntax_type="HTML (Complex)", $id="", $encoding='')
{
    if ($use_javasyntax)
	{
        $text = ereg_replace("\r\n", "<CMSNewLine>", $text);
        $text = ereg_replace("\r", "<CMSNewLine>", $text);
        $text = cms_htmlentities(ereg_replace("\n", "<CMSNewLine>", $text));

        // possible values for syntaxType are: Java, C/C++, LaTeX, SQL,
        // Java Properties, HTML (Simple), HTML (Complex)

        $output = '<applet name="CMSSyntaxHighlight"
            code="org.CMSMadeSimple.Syntax.Editor.class" width="100%">
                <param name="cache_option" VALUE="Plugin">
                <param name="cache_archive" VALUE="SyntaxHighlight.jar">
                <param name="cache_version" VALUE="612.0.0.0">
                <param name="content" value="'.$text.'">
                <param name="syntaxType" value="'.$syntax_type.'">
                Sorry, the syntax highlighted textarea will not work with your
                browser. Please use a different browser or turn off syntax
                highlighting under user preferences.
            </applet>
            <input type="hidden" name="'.$name.'" value="">';

    }
	else
	{
        $output = '<textarea name="'.$name.'" cols="80" rows="24"
            class="'.$class_name.'"';
        if ($id<>"")
            $output.=' id="'.$id.'"';
        $output.='>'.cms_htmlentities($text,ENT_NOQUOTES,get_encoding($encoding)).'</textarea>';
    }

    return $output;
}
*/
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
   $urlext='?'.CMS_SECURE_PARAM_NAME.'='.$_SESSION[CMS_USER_KEY];
	$page_string = "";
	$from = ($page * $limit) - $limit;
	$numofpages = (int)($totalrows / $limit);
	if( ($totalrows % $limit) != 0 ) ++$numofpages;
	if ($numofpages > 1)
	{
		if($page != 1)
		{
			$pageprev = $page-1;
			$page_string .= '<a href="'.$_SERVER['PHP_SELF'].$urlext.'&amp;page=1">'.lang('first').'</a>&nbsp;';
			$page_string .= "<a href=\"".$_SERVER['PHP_SELF'].$urlext."&amp;page=$pageprev\">".lang('previous')."</a>&nbsp;";
		}
		else
		{
			$page_string .= lang('first')." ";
			$page_string .= lang('previous')." ";
		}

		$page_string .= '&nbsp;'.lang('page')."&nbsp;$page&nbsp;".lang('of')."&nbsp;$numofpages&nbsp;";
		// links to individual pages
// 		for($i = 1; $i <= $numofpages; $i++)
// 		{
// 			if($i == $page)
// 			{
// 				$page_string .= $i."&nbsp;";
// 			}
// 			else
// 			{
// 				$page_string .= "<a href=\"".$_SERVER['PHP_SELF']."?page=$i\">$i</a>&nbsp;";
// 			}
// 		}

// 		if(($totalrows % $limit) != 0)
// 		{
// 			if($i == $page)
// 			{
// 				$page_string .= $i."&nbsp;";
// 			}
// 			else
// 			{
// 				$page_string .= "<a href=\"".$_SERVER['PHP_SELF']."?page=$i\">$i</a>&nbsp;";
// 			}
// 		}

		if(($totalrows - ($limit * $page)) > 0)
		{
			$pagenext = $page+1;
			$page_string .= "<a href=\"".$_SERVER['PHP_SELF'].$urlext."&amp;page=$pagenext\">".lang('next')."</a>&nbsp;";
			$page_string .= '<a href="'.$_SERVER['PHP_SELF'].$urlext.'&amp;page='.$numofpages.'">'.lang('last').'</a>';
		}
		else
		{
			$page_string .= lang('next')." ";
			$page_string .= lang('last')." ";
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

/**
 * Returns the currently configured database prefix.
 *
 * @since 0.4
 */
function cms_db_prefix() {
  global $gCms;
  $config =& $gCms->GetConfig();
  return $config["db_prefix"];
}

function create_file_dropdown($name,$dir,$value,$allowed_extensions,$optprefix='',$allownone=false,$extratext='',
			      $fileprefix='',$excludefiles=1)
{
  $files = array();
  $files = get_matching_files($dir,$allowed_extensions,true,true,$fileprefix,$excludefiles);
  if( $files === false ) return false;
  $out = "<select name=\"{$name}\" {$extratext}>\n";
  if( $allownone )
    {
      $txt = '';
      if( empty($value) )
	{
	  $txt = 'selected="selected"';
	}
      $out .= "  <option value=\"-1\" $txt>--- ".lang('none')." ---</option>\n";
    }

  foreach( $files as $file )
    {
      $txt = '';
      $opt = $file;
      if( !empty($optprefix) )
	{
	  $opt = $optprefix.'/'.$file;
	}
      if( $opt == $value )
	{
	  $txt = 'selected="selected"';
	}
      $out .= "  <option value=\"{$opt}\" {$txt}>{$file}</option>\n";
    }
  $out .= "</select>";
  return $out;
}

# vim:ts=4 sw=4 noet
?>
