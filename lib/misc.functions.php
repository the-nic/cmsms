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
#
#$Id$

/**
 * Misc functions
 *
 * @package CMS
 */


 
/**
 * Redirects to relative URL on the current site
 *
 * @author http://www.edoceo.com/
 * @since 0.1
 * @param string The url to redirect to
 * @return void
 */
function redirect($to, $noappend=false)
{
  $_SERVER['PHP_SELF'] = null;

  $schema = $_SERVER['SERVER_PORT'] == '443' ? 'https' : 'http';
  $host = strlen($_SERVER['HTTP_HOST'])?$_SERVER['HTTP_HOST']:$_SERVER['SERVER_NAME'];

  $components = parse_url($to);
  if(count($components) > 0) {
    $to =  (isset($components['scheme']) && startswith($components['scheme'], 'http') ? $components['scheme'] : $schema) . '://';
    $to .= isset($components['host']) ? $components['host'] : $host;
    $to .= isset($components['port']) ? ':' . $components['port'] : '';
    if(isset($components['path'])) {
      if(in_array(substr($components['path'],0,1),array('\\','/'))) {
	//Path is absolute, just append.
	$to .= $components['path'];
      }
      //Path is relative, append current directory first.
      else if (isset($_SERVER['PHP_SELF']) && !is_null($_SERVER['PHP_SELF'])) { //Apache
	$to .= (strlen(dirname($_SERVER['PHP_SELF'])) > 1 ?  dirname($_SERVER['PHP_SELF']).'/' : '/') . $components['path'];
      }
      else if (isset($_SERVER['REQUEST_URI']) && !is_null($_SERVER['REQUEST_URI'])) { //Lighttpd
	if (endswith($_SERVER['REQUEST_URI'], '/'))
	  $to .= (strlen($_SERVER['REQUEST_URI']) > 1 ? $_SERVER['REQUEST_URI'] : '/') . $components['path'];
	else
	  $to .= (strlen(dirname($_SERVER['REQUEST_URI'])) > 1 ? dirname($_SERVER['REQUEST_URI']).'/' : '/') . $components['path'];
      }
    }
    $to .= isset($components['query']) ? '?' . $components['query'] : '';
    $to .= isset($components['fragment']) ? '#' . $components['fragment'] : '';
  }
  else {
    $to = $schema."://".$host."/".$to;
  }

  session_write_close();

  $debug = false;
  if( class_exists('CmsApp') ) {
    $config = cmsms()->GetConfig();
    $debug = $config['debug'];
  }

  if (headers_sent() && !$debug) {
    // use javascript instead
    echo '<script type="text/javascript">
          <!--location.replace("'.$to.'"); // -->
          </script>
          <noscript>
          <meta http-equiv="Refresh" content="0;URL='.$to.'">
          </noscript>';
    exit;
  }
  else {
    if ( $debug ) {
      echo "Debug is on.  Redirecting disabled...  Please click this link to continue.<br />";
      echo "<a href=\"".$to."\">".$to."</a><br />";
      echo '<div id="DebugFooter">';
      foreach (cmsms()->get_errors() as $error) {
	echo $error;
      }
      echo '</div> <!-- end DebugFooter -->';
      exit();
    }
    else {
      header("Location: $to");
      exit();
    }
  }
}



/**
 * Given a page ID or an alias, redirect to it
 * Retrieves the URL of the specified page, and performs a redirect
 *
 * @param mixed An integer page id or a string page alias.
 * @return void
 */
function redirect_to_alias($alias)
{
  $manager = cmsms()->GetHierarchyManager();
  $node = $manager->sureGetNodeByAlias($alias);
  if( !$node ) {
	// put mention into the admin log
    audit('','Core','Attempt to redirect to invalid alias: '.$alias);
    return;
  }
  $content = $node->GetContent();
  if (!is_object($content)) {
    audit('','Core','Attempt to redirect to invalid alias: '.$alias);
    return;
  }
  if ($content->GetURL() != '') {
    redirect($content->GetURL());
  }
}



/**
 * Calculate the difference in seconds between two microtime() values
 *
 * @since 0.3
 * @param string Microtime value A
 * @param string Microtime value B
 * @return integer The difference.
 */
function microtime_diff($a, $b) 
{
  list($a_dec, $a_sec) = explode(" ", $a);
  list($b_dec, $b_sec) = explode(" ", $b);
  return $b_sec - $a_sec + $b_dec - $a_dec;
}



/**
 * Joins a path together using proper directory separators
 * Taken from: http://www.php.net/manual/en/ref.dir.php
 *
 * This method accepts a variable number of string arguments.
 *
 * @since 0.14
 * @return string
 */
function cms_join_path()
{
  $args = func_get_args();
  return implode(DIRECTORY_SEPARATOR,$args);
}



/**
 * Return the global cmsms() object
 *
 * @since 1.7
 * @return object
 */
function &cmsms()
{
   return CmsApp::get_instance();
}



/**
 * A method to perform HTML entity conversion on a string
 *
 * @see htmlentities
 * @param string The input string
 * @param string A flag indicating how quotes should be handled (see htmlentities) (ignored)
 * @param string The input character set (ignored)
 * @param boolean A flag indicating wether single quotes should be converted to entities.
 * @return string the converted string.
 */
function cms_htmlentities($val, $param=ENT_QUOTES, $charset="UTF-8", $convert_single_quotes = false)
{
  if ($val == "") return "";

  $val = str_replace( "&#032;", " ", $val );
  $val = str_replace( "&"            , "&amp;"         , $val );
  $val = str_replace( "<!--"         , "&#60;&#33;--"  , $val );
  $val = str_replace( "-->"          , "--&#62;"       , $val );
  $val = preg_replace( "/<script/i"  , "&#60;script"   , $val );
  $val = str_replace( ">"            , "&gt;"          , $val );
  $val = str_replace( "<"            , "&lt;"          , $val );
  $val = str_replace( "\""           , "&quot;"        , $val );
  $val = preg_replace( "/\\$/"      , "&#036;"        , $val );
  $val = str_replace( "!"            , "&#33;"         , $val );
  $val = str_replace( "'"            , "&#39;"         , $val );

  if ($convert_single_quotes) {
    $val = str_replace("\\'", "&apos;", $val);
    $val = str_replace("'", "&apos;", $val);
  }

  return $val;
}


/**
 * A method to convert a string into UTF-8 entities
 *
 * @internal
 * @deprecated
 * @param string Input string
 * @return string
 * Rolf: used in admin/listmodules.php
 */
function cms_utf8entities($val)
{
  if ($val == "") {
    return "";
  }
  $val = str_replace( "&#032;", " ", $val );
  $val = str_replace( "&"  , "\u0026" , $val );
  $val = str_replace( ">"  , "\u003E" , $val );
  $val = str_replace( "<"  , "\u003C" , $val );

  $val = str_replace( "\"" , "\u0022" , $val );
  $val = str_replace( "!"  , "\u0021" , $val );
  $val = str_replace( "'"  , "\u0027" , $val );

  return $val;
}



/**
 * A function to put a backtrace into the generated log file.
 * 
 * @see debug_to_log, debug_bt
 * @return void
 * Rolf: Looks like not used
 */
function debug_bt_to_log()
{
  if( cmsms()->config['debug_to_log'] || check_login(TRUE) ) {
    $bt=debug_backtrace();
    $file = $bt[0]['file'];
    $line = $bt[0]['line'];

    $out = array();
    $out[] = "Backtrace in $file on line $line";

    $bt = array_reverse($bt);
    foreach($bt as $trace) {
      if( $trace['function'] == 'debug_bt_to_log' ) continue;

      $file = '';
      $line = '';
      if( isset($trace['file']) ) {
	$file = $trace['file'];
	$line = $trace['line'];
      }
      $function = $trace['function'];
      $str = "$function";
      if( $file ) {
	$str .= " at $file:$line";
      }
      $out[] = $str;
    }

    $filename = TMP_CACHE_LOCATION . '/debug.log';
    foreach ($out as $txt) {
      error_log($txt . "\n", 3, $filename);
    }
  }
}



/**
 * A function to generate a backtrace in a readable format.
 *
 * @return void
 * Rolf: looks like not used
 */
function debug_bt()
{
    $bt=debug_backtrace();
    $file = $bt[0]['file'];
    $line = $bt[0]['line'];

    echo "\n\n<p><b>Backtrace in $file on line $line</b></p>\n";

    $bt = array_reverse($bt);
    echo "<pre><dl>\n";
    foreach($bt as $trace) {
      $file = $trace['file'];
      $line = $trace['line'];
      $function = $trace['function'];
      $args = implode(',', $trace['args']);
      echo "
        <dt><b>$function</b>($args) </dt>
        <dd>$file on line $line</dd>
		";
    }
    echo "</dl></pre>\n";
}



/**
* Debug function to display $var nicely in html.
*
* @param mixed $var
* @param string $title (optional)
* @param boolean $echo_to_screen (optional)
* @return string
*/
function debug_display($var, $title="", $echo_to_screen = true, $use_html = true)
{
  $variables =& cmsms()->variables;

  $starttime = microtime();
  if (isset($variables['starttime']))
    $starttime = $variables['starttime'];
  else
    $variables['starttime'] = $starttime;

  $titleText = "Debug: ";
  if($title) {
    $titleText = "Debug display of '$title':";
  }
  $titleText .= '(' . microtime_diff($starttime,microtime()) . ')';

  if (function_exists('memory_get_usage')) {
    $titleText .= ' - (usage: '.memory_get_usage().')';
  }

  $memory_peak = (function_exists('memory_get_peak_usage')?memory_get_peak_usage():'');
  if( $memory_peak ) {
    $titleText .= ' - (peak: '.$memory_peak.')';
  }

  ob_start();
  if ($use_html) {
    echo "<div><b>$titleText</b>\n";
  }
  else {
    echo "$titleText\n";
  }

  if(FALSE == empty($var)) {
    if ($use_html) echo '<pre>';
    if(is_array($var)) {
      echo "Number of elements: " . count($var) . "\n";
      print_r($var);
    }
    elseif(is_object($var)) {
      print_r($var);
    }
    elseif(is_string($var)) {
      if( $use_html ) {
	print_r(htmlentities(str_replace("\t", '  ', $var)));
      }
      else {
	print_r($var);
      }
    }
    elseif(is_bool($var)) {
      echo $var === true ? 'true' : 'false';
    }
    else {
      print_r($var);
    }
    if ($use_html) echo '</pre>';
  }
  if ($use_html) echo "</div>\n";

  $output = ob_get_contents();
  ob_end_clean();

  if($echo_to_screen) echo $output;
  return $output;
}



/**
 * Display $var nicely only if $config["debug"] is set
 *
 * @param mixed $var
 * @param string $title
 */
function debug_output($var, $title="")
{
  if(cmsms()->config["debug"] == true) {
    debug_display($var, $title, true);
  }

}



/**
 * Debug function to output debug information about a variable in a formatted matter
 * to a debug file.
 *
 * @param mixed data to display
 * @param string Optional title.
 */
function debug_to_log($var, $title='',$filename = '')
{
  // only output to the debug log if the config entry says to, or we're logged in to the admin.
  if( cmsms()->config['debug_to_log'] || check_login(TRUE) ) {
    if( $filename == '' ) {
      $filename = TMP_CACHE_LOCATION . '/debug.log';
      if( filemtime($filename) < (time() - 24 * 3600) ) @unlink($filename);
    }
    $errlines = explode("\n",debug_display($var, $title, false, false));
    foreach ($errlines as $txt) {
      error_log($txt . "\n", 3, $filename);
    }
  }
}



/**
 * Display $var nicely to the cmsms()->errors array if $config['debug'] is set
 *
 * @param mixed $var
 * @param string $title
 */
function debug_buffer($var, $title="")
{
  $config = cmsms()->GetConfig();
  if($config["debug"] == true) {
    cmsms()->add_error(debug_display($var, $title, false, true));
  }
}



/**
 * Debug an sql command
 *
 * @internal
 * @param string SQL query
 * @param boolean (unused)
 * Rolf: only used in lib/adodb.functions.php
 */
function debug_sql($str, $newline = false)
{
  $config = cmsms()->GetConfig();
  if($config["debug"] == true) {
    cmsms()->add_error(debug_display($str, '', false, true));
  }
}




/**
* Return $value if it's set and same basic type as $default_value,
*			otherwise return $default_value. Note. Also will trim($value)
*			if $value is not numeric.
*
* @param string $value
* @param mixed $default_value
* @deprecated
* @return mixed
* Rolf: only used in this file
*/
function _get_value_with_default($value, $default_value = '', $session_key = '')
{
  if($session_key != '') {
    if(isset($_SESSION['default_values'][$session_key])) {
      $default_value = $_SESSION['default_values'][$session_key];
    }
  }

  // set our return value to the default initially and overwrite with $value if we like it.
  $return_value = $default_value;

  if(isset($value)) {
    if(is_array($value)) {
      // $value is an array - validate each element.
      $return_value = array();
      foreach($value as $element) {
	$return_value[] = _get_value_with_default($element, $default_value);
      }
    }
    else {
      if(is_numeric($default_value)) {
	if(is_numeric($value)) {
	  $return_value = $value;
	}
      }
      else {
	$return_value = trim($value);
      }
    }
  }

  if($session_key != '') {
    $_SESSION['default_values'][$session_key] = $return_value;
  }

  return $return_value;
}



/**
 * Retrieve the $value from the $parameters array checking for
 * $parameters[$value] and $params[$id.$value]. Returns $default
 * if $value is not in $params array.
 * Note: This function will also trim() string values.
 *
 * @param array $parameters
 * @param string $value
 * @param mixed $default_value
 * @param string $session_key
 * @return mixed
 * Rolf: looks like not used
 */
function get_parameter_value($parameters, $value, $default_value = '', $session_key = '')
{
  if($session_key != '') {
    if(isset($_SESSION['parameter_values'][$session_key])) {
      $default_value = $_SESSION['parameter_values'][$session_key];
    }
  }

  // set our return value to the default initially and overwrite with $value if we like it.
  $return_value = $default_value;
  if(isset($parameters[$value])) {
    if(is_bool($default_value)) {
      // want a boolean return_value
      if(isset($parameters[$value])) {
	$return_value = (boolean)$parameters[$value];
      }
    }
    else {
      // is $default_value a number?
      $is_number = false;
      if(is_numeric($default_value)) {
	$is_number = true;
      }

      if(is_array($parameters[$value])) {
	// $parameters[$value] is an array - validate each element.
	$return_value = array();
	foreach($parameters[$value] as $element) {
	  $return_value[] = _get_value_with_default($element, $default_value);
	}
      }
      else {
	if(is_numeric($default_value)) {
	  // default value is a number, we only like $parameters[$value] if it's a number too.
	  if(is_numeric($parameters[$value])) {
	    $return_value = $parameters[$value];
	  }
	}
	elseif(is_string($default_value)) {
	  $return_value = trim($parameters[$value]);
	}
	else {
	  $return_value = $parameters[$value];
	}
      }
    }
  }

  if($session_key != '') {
    $_SESSION['parameter_values'][$session_key] = $return_value;
  }

  return $return_value;
}



/**
 * A method to remove a permission from the database.
 *
 * @internal
 * @access private
 * @param string The permission name
 * @deprecated
 */
function cms_mapi_remove_permission($permission_name)
{
  try {
    $perm = CmsPermission::load($permission_name);
    $perm->delete();
  }
  catch( Exception $e ) {
  }
}



/**
 * A method to add a permission to the CMSMS permissions table
 *
 * @internal
 * @access private
 * @param unknown (ignored)
 * @param string  The permission name
 * @param string  The permission human readable text.
 * @deprecated
 */
function cms_mapi_create_permission($cms, $permission_name, $permission_text)
{
  try {
    $perm = new CmsPermission();
    $perm->originator = 'Other';
    $perm->name = $permission_name;
    $perm->text = $permission_text;
    $perm->save();
    return true;
  }
  catch( Exception $e ) {
    return false;
  }
}



/**
 * Check the permissions of a directory recursively to make sure that
 * we have write permission to all files
 *
 * @param  string  Start directory.
 * @return boolean
 */
function is_directory_writable( $path )
{
  if ( substr ( $path , strlen ( $path ) - 1 ) != '/' ) {
    $path .= '/' ;
  }

  $result = true;
  if( $handle = @opendir( $path ) ) {
    while( false !== ( $file = readdir( $handle ) ) ) {
      if( $file == '.' || $file == '..' ) {
	continue;
      }

      $p = $path.$file;

      if( !@is_writable( $p ) ) {
	return false;
      }

      if( @is_dir( $p ) ) {
	$result = is_directory_writable( $p );
	if( !$result ) {
	  return false;
	}
      }
    }
    @closedir( $handle );
  }
  else {
    return false;
  }

  return true;
}



/**
 * Return an array containing a list of files in a directory
 * performs a recursive search
 *
 * @internal
 * @param  string    Start Path.
 * @param  array     Array of regular expressions indicating files to exclude.
 * @param  int       How deep to browse (-1=unlimited)
 * @param  string    "FULL"|"DIRS"|"FILES"
 * @param  d         for internal use only
 * @return  array
**/
function get_recursive_file_list ( $path , $excludes, $maxdepth = -1 , $mode = "FULL" , $d = 0 )
{
  $fn = function( $file, $excludes ) {
    // strip the path from the file
    if( empty($excludes) ) return false;
    foreach( $excludes as $excl ) {
      if( @preg_match( "/".$excl."/i", basename($file) ) ) {
	return true;
      }
    }
    return false;
  };

  if ( substr ( $path , strlen ( $path ) - 1 ) != '/' ) { $path .= '/' ; }
  $dirlist = array () ;
  if ( $mode != "FILES" ) { $dirlist[] = $path ; }
  if ( $handle = opendir ( $path ) ) {
    while ( false !== ( $file = readdir ( $handle ) ) ) {
      if( $file == '.' || $file == '..' ) continue;
      if( $fn( $file, $excludes ) ) continue;

      $file = $path . $file ;
      if ( ! @is_dir ( $file ) ) { if ( $mode != "DIRS" ) { $dirlist[] = $file ; } }
      elseif ( $d >=0 && ($d < $maxdepth || $maxdepth < 0) ) {
	$result = get_recursive_file_list ( $file . '/' , $excludes, $maxdepth , $mode , $d + 1 ) ;
	$dirlist = array_merge ( $dirlist , $result ) ;
      }
    }
    closedir ( $handle ) ;
  }
  if ( $d == 0 ) { natcasesort ( $dirlist ) ; }
  return ( $dirlist ) ;
}


/**
 * A function to recursively delete all files and folders in a directory
 * synonymous with rm -r
 *
 * @param string The directory name
 * @return boolean
 */
function recursive_delete( $dirname )
{
  // all subdirectories and contents:
  if(is_dir($dirname))$dir_handle=opendir($dirname);
  while($file=readdir($dir_handle)) {
    if($file!="." && $file!="..") {
      if(!is_dir($dirname."/".$file)) {
	if( !@unlink ($dirname."/".$file) ) {
	  closedir( $dir_handle );
	  return false;
	}
      }
      else {
	recursive_delete($dirname."/".$file);
      }
    }
  }
  closedir($dir_handle);
  if( ! @rmdir($dirname) ) {
    return false;
  }
  return true;
}



/**
 * A function to recursively chmod all files and folders in a directory
 *
 * @see chmod
 * @param string The start location
 * @param integer The mode
 * Rolf: only used in admin/listmodules.php
 */
function chmod_r( $path, $mode )
{
  if( !is_dir( $path ) ) return chmod( $path, $mode );

  $dh = @opendir( $path );
  if( !$dh ) return FALSE;

  while( $file = readdir( $dh ) ) {
    if( $file == '.' || $file == '..' ) continue;

    $p = $path.DIRECTORY_SEPARATOR.$file;
    if( is_dir( $p ) ) {
      if( !@chmod_r( $p, $mode ) ) {
	closedir( $dh );
	return false;
      }
    }
    else if( !is_link( $p ) ) {
      if( !@chmod( $p, $mode ) ) {
	closedir( $dh );
	return false;
      }
    }
  }
  @closedir( $dh );
  return @chmod( $path, $mode );
}



/**
 * A convenience function to test wether one string starts with another
 *
 * i.e:  startswith('The Quick Brown Fox','The');
 *
 * @param string The string to test against
 * @param string The search string
 * @return boolean
 */
function startswith( $str, $sub )
{
  return ( substr( $str, 0, strlen( $sub ) ) == $sub );
}



/**
 * Similar to the startswith method, this function tests with string A ends with string B
 *
 * i.e: endswith('The Quick Brown Fox','Fox');
 *
 * @param string The string to test against
 * @param string The search string
 * @return boolean
 */
function endswith( $str, $sub )
{
  return ( substr( $str, strlen( $str ) - strlen( $sub ) ) == $sub );
}



/**
 * convert a human readable string into something that is suitable for use in URLS
 * because many browsers don't support UTF-8 characters in URLS
 *
 * @internal
 * @param string String to convert
 * @param boolean indicates whether output string should be converted to lower case
 * @param boolean indicates wether slashes should be allowed in the input.
 * @return string
 */
function munge_string_to_url($alias, $tolower = false, $withslash = false)
{
  // replacement.php is encoded utf-8 and must be the first modification of alias
  include(dirname(__FILE__) . '/replacement.php');
  $alias = str_replace($toreplace, $replacement, $alias);

  // lowercase only on empty aliases
  if ($tolower == true) {
    $alias = strtolower($alias);
  }

  $expr = '/[^a-z0-9-_]+/i';
  if( $withslash ) {
    $expr = '/[^a-z0-9-_\/]+/i';
  }
  $alias = preg_replace($expr,'-',$alias);

  for( $i = 0; $i < 5; $i++ ) {
    $tmp = str_replace('--','-',$alias);
    if( $tmp == $alias ) break;
    $alias = $tmp;
  }
  $alias = trim($alias, '-');
  $alias = trim($alias);

  return $alias;
}


/*
 * Sanitize input to prevent against XSS and other nasty stuff.
 * Taken from cakephp (http://cakephp.org)
 * Licensed under the MIT License
 * 
 * @internal
 * @param string input
 * @return string
 */
function cleanValue($val) {
  if ($val == "") {
    return $val;
  }
  //Replace odd spaces with safe ones
  $val = str_replace(" ", " ", $val);
  $val = str_replace(chr(0xCA), "", $val);
  //Encode any HTML to entities (including \n --> <br />)
  $val = _cleanHtml($val);
  //Double-check special chars and remove carriage returns
  //For increased SQL security
  $val = preg_replace("/\\\$/", "$", $val);
  $val = preg_replace("/\r/", "", $val);
  $val = str_replace("!", "!", $val);
  $val = str_replace("'", "'", $val);
  //Allow unicode (?)
  $val = preg_replace("/&amp;#([0-9]+);/s", "&#\\1;", $val);
  //Add slashes for SQL
  //$val = $this->sql($val);
  //Swap user-inputted backslashes (?)
  $val = preg_replace("/\\\(?!&amp;#|\?#)/", "\\", $val);
  return $val;
}



/*
 * Method to sanitize incoming html.
 * Take from cakephp (http://cakephp.org)
 * Licensed under the MIT License
 *
 * @ignore
 * @internal
 * @param string Input HTML code.
 * @param boolean Wether HTML tags should be removed.
 * @return string
 * Rolf: only used in this file
 */
function _cleanHtml($string, $remove = false) {
  if ($remove) {
    $string = strip_tags($string);
  } else {
    $patterns = array("/\&/", "/%/", "/</", "/>/", '/"/', "/'/", "/\(/", "/\)/", "/\+/", "/-/");
    $replacements = array("&amp;", "&#37;", "&lt;", "&gt;", "&quot;", "&#39;", "&#40;", "&#41;", "&#43;", "&#45;");
    $string = preg_replace($patterns, $replacements, $string);
  }
  return $string;
}

define('CLEAN_INT','CLEAN_INT');
define('CLEAN_FLOAT','CLEAN_FLOAT');
define('CLEAN_NONE','CLEAN_NONE');
define('CLEAN_STRING','CLEAN_STRING');
define('CLEAN_REGEXP','regexp:');
define('CLEAN_FILE','CLEAN_FILE');
define('CLEANED_FILENAME','BAD_FILE');


/**
 * A function to test if permissions, and php configuration is setup correctly
 * to allow an administrator to upload files to CMSMS
 *
 * @internal
 * @return boolean
 */
function can_admin_upload()
{
  # first, check to see if safe mode is enabled
  # if it is, then check to see the owner of the index.php, moduleinterface.php
  # and the uploads and modules directory.  if they all match, then we
  # can upload files.
  # if safe mode is off, then we just have to check the permissions.
  $file_index = cmsms()->config['root_path'].DIRECTORY_SEPARATOR.'index.php';
  $file_moduleinterface = cmsms()->config['root_path'].DIRECTORY_SEPARATOR.
    cmsms()->config['admin_dir'].DIRECTORY_SEPARATOR.'moduleinterface.php';
  $dir_uploads = cmsms()->config['uploads_path'];
  $dir_modules = cmsms()->config['root_path'].DIRECTORY_SEPARATOR.'modules';

  $stat_index = @stat($file_index);
  $stat_moduleinterface = @stat($file_moduleinterface);
  $stat_uploads = @stat($dir_uploads);
  $stat_modules = @stat($dir_modules);

  $my_uid = @getmyuid();

  if( $my_uid === FALSE || $stat_index == FALSE ||
      $stat_moduleinterface == FALSE || $stat_uploads == FALSE ||
      $stat_modules == FALSE ) {
    // couldn't get some necessary information.
    return FALSE;
  }

  $safe_mode = ini_get_boolean('safe_mode');
  if( $safe_mode ) {
    // we're in safe mode.
    if( ($stat_moduleinterface[4] != $stat_modules[4]) ||
	($stat_moduleinterface[4] != $stat_uploads[4]) ||
	($my_uid != $stat_moduleinterface[4]) ) {
      // owners don't match
      return FALSE;
    }
  }

  // now check to see if we can write to the directories
  if( !is_writable( $dir_modules ) ) {
    return FALSE;
  }
  if( !is_writable( $dir_uploads ) ) {
    return FALSE;
  }

  // It all worked.
  return TRUE;
}


/**
 * A convenience function to return a boolean variable given a php ini key that represents a boolean
 *
 * @param string  The php ini key
 * @return integer
 * Rolf: only used in admin/header.php
 */
function ini_get_boolean($str)
{
  $val1 = ini_get($str);
  $val2 = strtolower($val1);

  $ret = 0;
  if( $val2 == 1 || $val2 == '1' || $val2 == 'yes' || $val2 == 'true' || $val2 == 'on' )
     $ret = 1;
  return $ret;
}


/**
 * Another convenience function to output a human readable function stack trace
 *
 * @return void
 */
function stack_trace()
{
  $stack = debug_backtrace();
  foreach( $stack as $elem ) {
    if( $elem['function'] == 'stack_trace' ) continue;
    if( isset($elem['file'])  ) {
      echo $elem['file'].':'.$elem['line'].' - '.$elem['function'].'<br/>';
    }
    else {
      echo ' - '.$elem['function'].'<br/>';
    }
  }
}


/** 
 * A wrapper around move_uploaded_file that attempts to ensure permissions on uploaded
 * files are set correctly.
 *
 * @param string The temporary file specification
 * @param string The destination file specification
 * @return boolean.
 */
function cms_move_uploaded_file( $tmpfile, $destination )
{
   $config = cmsms()->GetConfig();

   if( !@move_uploaded_file( $tmpfile, $destination ) )
   {
      return false;
   }

   @chmod($destination,octdec($config['default_upload_permission']));
   return true;
}


/**
 * A function to test wether an IP address matches a list of expressions
 * Credits to J.Adams <jna@retins.net>
 *
 * Expressions can be of the form
 *   xxx.xxx.xxx.xxx        (exact)
 *   xxx.xxx.xxx.[yyy-zzz]  (range)
 *   xxx.xxx.xxx.xxx/nn    (nn = # bits, cisco style -- i.e. /24 = class C)
 *
 * @param string IP address to test
 * @param array  Array of match expressions
 * @return boolean
 * Rolf: only used in lib/content.functions.php
 */
function cms_ipmatches($ip,$checklist)
{
  if( !function_exists('__testip') ) {
  function __testip($range,$ip)
  {
    $result = 1;

    // IP Pattern Matcher
    // J.Adams <jna@retina.net>
    //
    // Matches:
    //
    // xxx.xxx.xxx.xxx        (exact)
    // xxx.xxx.xxx.[yyy-zzz]  (range)
    // xxx.xxx.xxx.xxx/nn    (nn = # bits, cisco style -- i.e. /24 = class C)
    //
    // Does not match:
    // xxx.xxx.xxx.xx[yyy-zzz]  (range, partial octets not supported)

    $regs = array();
    if (preg_match("/([0-9]+)\.([0-9]+)\.([0-9]+)\.([0-9]+)\/([0-9]+)/",$range,$regs)) {
      // perform a mask match
      $ipl = ip2long($ip);
      $rangel = ip2long($regs[1] . "." . $regs[2] . "." . $regs[3] . "." . $regs[4]);

      $maskl = 0;

      for ($i = 0; $i< 31; $i++) {
	if ($i < $regs[5]-1) {
	  $maskl = $maskl + pow(2,(30-$i));
	}
      }

      if (($maskl & $rangel) == ($maskl & $ipl)) {
	return 1;
      } else {
	return 0;
      }
    } else {
      // range based
      $maskocts = explode('.',$range);
      $ipocts = explode('.',$ip);

      if( count($maskocts) != count($ipocts) && count($maskocts) != 4 ) {
	return 0;
      }

      // perform a range match
      for ($i=0; $i<4; $i++) {
	if (preg_match("/\[([0-9]+)\-([0-9]+)\]/",$maskocts[$i],$regs)) {
	  if ( ($ipocts[$i] > $regs[2]) || ($ipocts[$i] < $regs[1])) {
	    $result = 0;
	  }
	}
	else
	  {
	    if ($maskocts[$i] <> $ipocts[$i]) {
	      $result = 0;
	    }
	  }
      }
    }
    return $result;
  } // __testip
  } // if

  if( !is_array($checklist) ) {
    $checklist = explode(',',$checklist);
  }
  foreach( $checklist as $one ) {
    if( __testip(trim($one),$ip) ) return TRUE;
  }
  return FALSE;
}


/**
 * @author	Dominic Sayers <dominic_sayers@hotmail.com>
 * @copyright	2009 Dominic Sayers
 * @license	http://www.opensource.org/licenses/cpal_1.0 Common Public Attribution License Version 1.0 (CPAL) license
 * @link	http://www.dominicsayers.com/isemail
 * @version	1.9 - Minor modifications to make it compatible with PHPLint
 * @return boolean
 * @param string  $email
 * @param boolean $checkDNS
*/
function is_email( $email, $checkDNS=false ) {
	// Check that $email is a valid address. Read the following RFCs to understand the constraints:
	// 	(http://tools.ietf.org/html/rfc5322)
	// 	(http://tools.ietf.org/html/rfc3696)
	// 	(http://tools.ietf.org/html/rfc5321)
	// 	(http://tools.ietf.org/html/rfc4291#section-2.2)
	// 	(http://tools.ietf.org/html/rfc1123#section-2.1)

	// the upper limit on address lengths should normally be considered to be 256
	// 	(http://www.rfc-editor.org/errata_search.php?rfc=3696)
	// 	NB I think John Klensin is misreading RFC 5321 and the the limit should actually be 254
	// 	However, I will stick to the published number until it is changed.
	//
	// The maximum total length of a reverse-path or forward-path is 256
	// characters (including the punctuation and element separators)
	// 	(http://tools.ietf.org/html/rfc5321#section-4.5.3.1.3)
	$emailLength = strlen($email);
	if ($emailLength > 256)	return false;	// Too long

	// Contemporary email addresses consist of a "local part" separated from
	// a "domain part" (a fully-qualified domain name) by an at-sign ("@").
	// 	(http://tools.ietf.org/html/rfc3696#section-3)
	$atIndex = strrpos($email,'@');

	if ($atIndex === false) return false;	// No at-sign
	if ($atIndex === 0) return false;	// No local part
	if ($atIndex === $emailLength) return false;	// No domain part

	// Sanitize comments
	// - remove nested comments, quotes and dots in comments
	// - remove parentheses and dots from quoted strings
	$braceDepth	= 0;
	$inQuote	= false;
	$escapeThisChar	= false;

	for ($i = 0; $i < $emailLength; ++$i) {
		$char = $email[$i];
		$replaceChar = false;

		if ($char === '\\') {
			$escapeThisChar = !$escapeThisChar;	// Escape the next character?
		} else {
			switch ($char) {
			case '(':
				if ($escapeThisChar) {
					$replaceChar = true;
				} else {
					if ($inQuote) {
						$replaceChar = true;
					} else {
						if ($braceDepth++ > 0) $replaceChar = true;	// Increment brace depth
					}
				}

				break;
			case ')':
				if ($escapeThisChar) {
					$replaceChar = true;
				} else {
					if ($inQuote) {
						$replaceChar = true;
					} else {
						if (--$braceDepth > 0) $replaceChar = true;	// Decrement brace depth
						if ($braceDepth < 0) $braceDepth = 0;
					}
				}

				break;
			case '"':
				if ($escapeThisChar) {
					$replaceChar = true;
				} else {
					if ($braceDepth === 0) {
						$inQuote = !$inQuote;	// Are we inside a quoted string?
					} else {
						$replaceChar = true;
					}
				}

				break;
			case '.':	// Dots don't help us either
				if ($escapeThisChar) {
					$replaceChar = true;
				} else {
					if ($braceDepth > 0) $replaceChar = true;
				}

				break;
			default:
			}

			$escapeThisChar = false;
			if ($replaceChar) $email[$i] = 'x';	// Replace the offending character with something harmless
		}
	}

	$localPart	= substr($email, 0, $atIndex);
	$domain		= substr($email, $atIndex + 1);
	$FWS		= "(?:(?:(?:[ \\t]*(?:\\r\\n))?[ \\t]+)|(?:[ \\t]+(?:(?:\\r\\n)[ \\t]+)*))";	// Folding white space
	// Let's check the local part for RFC compliance...
	//
	// local-part      =       dot-atom / quoted-string / obs-local-part
	// obs-local-part  =       word *("." word)
	// 	(http://tools.ietf.org/html/rfc5322#section-3.4.1)
	//
	// Problem: need to distinguish between "first.last" and "first"."last"
	// (i.e. one element or two). And I suck at regexes.
	$dotArray = preg_split('/\\.(?=(?:[^\\"]*\\"[^\\"]*\\")*(?![^\\"]*\\"))/m', $localPart);
	$partLength	= 0;

	foreach ($dotArray as $element) {
		// Remove any leading or trailing FWS
		$element = preg_replace("/^$FWS|$FWS\$/", '', $element);

		// Then we need to remove all valid comments (i.e. those at the start or end of the element
		$elementLength = strlen($element);

		if ($element[0] === '(') {
			$indexBrace = strpos($element, ')');
			if ($indexBrace !== false) {
				if (preg_match('/(?<!\\\\)[\\(\\)]/', substr($element, 1, $indexBrace - 1)) > 0) {
					return false;	// Illegal characters in comment
				}
				$element = substr($element, $indexBrace + 1, $elementLength - $indexBrace - 1);
				$elementLength = strlen($element);
			}
		}

		if ($element[$elementLength - 1] === ')') {
			$indexBrace = strrpos($element, '(');
			if ($indexBrace !== false) {
				if (preg_match('/(?<!\\\\)(?:[\\(\\)])/', substr($element, $indexBrace + 1, $elementLength - $indexBrace - 2)) > 0) {
					return false;	// Illegal characters in comment
				}
				$element = substr($element, 0, $indexBrace);
				$elementLength = strlen($element);
			}
		}

		// Remove any leading or trailing FWS around the element (inside any comments)
		$element = preg_replace("/^$FWS|$FWS\$/", '', $element);

		// What's left counts towards the maximum length for this part
		if ($partLength > 0) $partLength++;	// for the dot
		$partLength += strlen($element);

		// Each dot-delimited component can be an atom or a quoted string
		// (because of the obs-local-part provision)
		if (preg_match('/^"(?:.)*"$/s', $element) > 0) {
			// Quoted-string tests:
			//
			// Remove any FWS
			$element = preg_replace("/(?<!\\\\)$FWS/", '', $element);
			// My regex skillz aren't up to distinguishing between \" \\" \\\" \\\\" etc.
			// So remove all \\ from the string first...
			$element = preg_replace('/\\\\\\\\/', ' ', $element);
			if (preg_match('/(?<!\\\\|^)["\\r\\n\\x00](?!$)|\\\\"$|""/', $element) > 0)	return false;	// ", CR, LF and NUL must be escaped, "" is too short
		} else {
			// Unquoted string tests:
			//
			// Period (".") may...appear, but may not be used to start or end the
			// local part, nor may two or more consecutive periods appear.
			// 	(http://tools.ietf.org/html/rfc3696#section-3)
			//
			// A zero-length element implies a period at the beginning or end of the
			// local part, or two periods together. Either way it's not allowed.
			if ($element === '') return false;	// Dots in wrong place

			// Any ASCII graphic (printing) character other than the
			// at-sign ("@"), backslash, double quote, comma, or square brackets may
			// appear without quoting.  If any of that list of excluded characters
			// are to appear, they must be quoted
			// 	(http://tools.ietf.org/html/rfc3696#section-3)
			//
			// Any excluded characters? i.e. 0x00-0x20, (, ), <, >, [, ], :, ;, @, \, comma, period, "
			if (preg_match('/[\\x00-\\x20\\(\\)<>\\[\\]:;@\\\\,\\."]/', $element) > 0) return false;	// These characters must be in a quoted string
		}
	}

	if ($partLength > 64) return false;	// Local part must be 64 characters or less

	// Now let's check the domain part...
	// The domain name can also be replaced by an IP address in square brackets
	// 	(http://tools.ietf.org/html/rfc3696#section-3)
	// 	(http://tools.ietf.org/html/rfc5321#section-4.1.3)
	// 	(http://tools.ietf.org/html/rfc4291#section-2.2)
	if (preg_match('/^\\[(.)+]$/', $domain) === 1) {
		// It's an address-literal
		$addressLiteral = substr($domain, 1, strlen($domain) - 2);
		$matchesIP = array();

		// Extract IPv4 part from the end of the address-literal (if there is one)
		if (preg_match('/\\b(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/', $addressLiteral, $matchesIP) > 0) {
			$index = strrpos($addressLiteral, $matchesIP[0]);

			if ($index === 0) {
				// Nothing there except a valid IPv4 address, so...
				return true;
			} else {
				// Assume it's an attempt at a mixed address (IPv6 + IPv4)
				if ($addressLiteral[$index - 1] !== ':') return false;	// Character preceding IPv4 address must be ':'
				if (substr($addressLiteral, 0, 5) !== 'IPv6:') return false;	// RFC5321 section 4.1.3
				$IPv6 = substr($addressLiteral, 5, ($index ===7) ? 2 : $index - 6);
				$groupMax = 6;
			}
		} else {
			// It must be an attempt at pure IPv6
			if (substr($addressLiteral, 0, 5) !== 'IPv6:') return false;	// RFC5321 section 4.1.3
			$IPv6 = substr($addressLiteral, 5);
			$groupMax = 8;
		}

		$groupCount	= preg_match_all('/^[0-9a-fA-F]{0,4}|\\:[0-9a-fA-F]{0,4}|(.)/', $IPv6, $matchesIP);
		$index = strpos($IPv6,'::');

		if ($index === false) {
			// We need exactly the right number of groups
			if ($groupCount !== $groupMax) return false;	// RFC5321 section 4.1.3
		} else {
			if ($index !== strrpos($IPv6,'::')) return false;	// More than one '::'
			$groupMax = ($index === 0 || $index === (strlen($IPv6) - 2)) ? $groupMax : $groupMax - 1;
			if ($groupCount > $groupMax) return false;	// Too many IPv6 groups in address
		}

		// Check for unmatched characters
		array_multisort($matchesIP[1], SORT_DESC);
		if ($matchesIP[1][0] !== '') return false;	// Illegal characters in address

		// It's a valid IPv6 address, so...
		return true;
	} else {
		// It's a domain name...

		// The syntax of a legal Internet host name was specified in RFC-952
		// One aspect of host name syntax is hereby changed: the
		// restriction on the first character is relaxed to allow either a
		// letter or a digit.
		// 	(http://tools.ietf.org/html/rfc1123#section-2.1)
		//
		// NB RFC 1123 updates RFC 1035, but this is not currently apparent from reading RFC 1035.
		//
		// Most common applications, including email and the Web, will generally not
		// permit...escaped strings
		// 	(http://tools.ietf.org/html/rfc3696#section-2)
		//
		// the better strategy has now become to make the "at least one period" test,
		// to verify LDH conformance (including verification that the apparent TLD name
		// is not all-numeric)
		// 	(http://tools.ietf.org/html/rfc3696#section-2)
		//
		// Characters outside the set of alphabetic characters, digits, and hyphen MUST NOT appear in domain name
		// labels for SMTP clients or servers
		// 	(http://tools.ietf.org/html/rfc5321#section-4.1.2)
		//
		// RFC5321 precludes the use of a trailing dot in a domain name for SMTP purposes
		// 	(http://tools.ietf.org/html/rfc5321#section-4.1.2)
		$dotArray = preg_split('/\\.(?=(?:[^\\"]*\\"[^\\"]*\\")*(?![^\\"]*\\"))/m', $domain);
		$partLength = 0;
		if (count($dotArray) === 1) return false;	// Mail host can't be a TLD

		foreach ($dotArray as $element) {
			// Remove any leading or trailing FWS
			$element = preg_replace("/^$FWS|$FWS\$/", '', $element);

			// Then we need to remove all valid comments (i.e. those at the start or end of the element
			$elementLength = strlen($element);

			if ($element[0] === '(') {
				$indexBrace = strpos($element, ')');
				if ($indexBrace !== false) {
					if (preg_match('/(?<!\\\\)[\\(\\)]/', substr($element, 1, $indexBrace - 1)) > 0) {
						return false;	// Illegal characters in comment
					}
					$element = substr($element, $indexBrace + 1, $elementLength - $indexBrace - 1);
					$elementLength = strlen($element);
				}
			}

			if ($element[$elementLength - 1] === ')') {
				$indexBrace = strrpos($element, '(');
				if ($indexBrace !== false) {
					if (preg_match('/(?<!\\\\)(?:[\\(\\)])/', substr($element, $indexBrace + 1, $elementLength - $indexBrace - 2)) > 0) {
						return false;	// Illegal characters in comment
					}
					$element = substr($element, 0, $indexBrace);
					$elementLength = strlen($element);
				}
			}

			// Remove any leading or trailing FWS around the element (inside any comments)
			$element = preg_replace("/^$FWS|$FWS\$/", '', $element);

			// What's left counts towards the maximum length for this part
			if ($partLength > 0) $partLength++;	// for the dot
			$partLength += strlen($element);

			// The DNS defines domain name syntax very generally -- a
			// string of labels each containing up to 63 8-bit octets,
			// separated by dots, and with a maximum total of 255
			// octets.
			// 	(http://tools.ietf.org/html/rfc1123#section-6.1.3.5)
			if ($elementLength > 63) return false;	// Label must be 63 characters or less

			// Each dot-delimited component must be atext
			// A zero-length element implies a period at the beginning or end of the
			// local part, or two periods together. Either way it's not allowed.
			if ($elementLength === 0) return false;	// Dots in wrong place

			// Any ASCII graphic (printing) character other than the
			// at-sign ("@"), backslash, double quote, comma, or square brackets may
			// appear without quoting.  If any of that list of excluded characters
			// are to appear, they must be quoted
			// 	(http://tools.ietf.org/html/rfc3696#section-3)
			//
			// If the hyphen is used, it is not permitted to appear at
			// either the beginning or end of a label.
			// 	(http://tools.ietf.org/html/rfc3696#section-2)
			//
			// Any excluded characters? i.e. 0x00-0x20, (, ), <, >, [, ], :, ;, @, \, comma, period, "
			//if (preg_match('/[\\x00-\\x20\\(\\)<>\\[\\]:;@\\\\,\\."]|^-|-$/', $element) > 0) {
			if (preg_match('/[\\x00-\\x20\\(\\)<>\\[\\]:;@\\\\,\\."]$/', $element) > 0) {
				return false;
			}
		}

		if ($partLength > 255) return false;	// Local part must be 64 characters or less
		if (preg_match('/^[0-9]+$/', $element) > 0)	return false;	// TLD can't be all-numeric

		// Check DNS?
		if ($checkDNS && function_exists('checkdnsrr')) {
			if (!(checkdnsrr($domain, 'A') || checkdnsrr($domain, 'MX'))) {
				return false;	// Domain doesn't actually exist
			}
		}
	}

	// Eliminate all other factors, and the one which remains must be the truth.
	// (Sherlock Holmes, The Sign of Four)
	return true;
}



/**
 * A convenience method to output the secure param tag that is used on all admin links
 *
 * @internal
 * @access private
 * @return string
 * Rolf: only used in admin/imagefiles.php
 */
function get_secure_param()
{
  $urlext = '?';
  $str = strtolower(ini_get('session.use_cookies'));
  if( $str == '0' || $str == 'off' ) {
    $urlext .= htmlspecialchars(SID).'&';
  }
  $urlext .= CMS_SECURE_PARAM_NAME.'='.$_SESSION[CMS_USER_KEY];
  return $urlext;
}



/**
 * A simple function to convert a string to a boolean
 * accepts, 'y','yes','true',1 as TRUE (case insensitive) all other values represent FALSE.
 *
 * @param string
 * Rolf: only used in lib/classes/contenttypes/Content.inc.php
 */
function cms_to_bool($str)
{
  if( is_numeric($str) ) {
    return ((int)$str != 0)?TRUE:FALSE;
  }

  $str = strtolower($str);
  if( $str == '1' || $str == 'y' || $str == 'yes' || $str == 'true' ) return TRUE;
  return FALSE;
}



/**
 *
 */
function cms_get_jquery($exclude = '',$ssl = false,$cdn = false,$append = '',$custom_root='')
{
  $config = cms_config::get_instance();
  $scripts = array();
  $basePath=$custom_root!=''?trim($custom_root,'/'):($ssl?$config['ssl_url']:$config['root_url']);
  
  // Scripts to include
  $scripts['jquery.min.js'] = '<script type="text/javascript" src="'.($cdn?'https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js':$basePath.'/lib/jquery/js/jquery-1.7.2.min.js').'"></script>'."\n";
  $scripts['jquery-ui.min.js'] = '<script type="text/javascript" src="'.($cdn?'https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/jquery-ui.min.js':$basePath.'/lib/jquery/js/jquery-ui-1.8.21.custom.min.js').'"></script>'."\n";
  $scripts['jquery.ui.nestedSortable.js'] = '<script type="text/javascript" src="'.$basePath.'/lib/jquery/js/jquery.ui.nestedSortable-1.3.4.js"></script>'."\n";
  $scripts['jquery.json.min.js'] = '<script type="text/javascript" src="'.$basePath.'/lib/jquery/js/jquery.json-2.3.min.js"></script>'."\n";
  
  // Check if we need exclude some script
  if(!empty($exclude)) {
    
    $exclude_list = explode(",", trim(str_replace(' ','',$exclude)));
    foreach($exclude_list as $one) {
      if ($one == 'jquery-1.6.2.min.js') {
          $one = 'jquery.min.js';
      }
      if ($one == 'jquery-ui-1.8.14.min.js') {
          $one = 'jquery-ui.min.js';
      }
      if ($one == 'jquery.json-2.2.js') {
          $one = 'jquery.json.min.js';
      }
      if ($one == 'jquery.ui.nestedSortable-1.3.4.js') {
          $one = 'jquery.ui.nestedSortable.js';
      }
      
      unset($scripts[$one]);
    }		
  }
  // let them add scripts to the end ie: a jQuery plugin
  if(!empty($append)) {
    $append_list = explode(",", trim(str_replace(' ','',$append)));
    foreach($append_list as $key => $item) {
      $scripts['user_'+$key]='<script type="text/javascript" src="'.($item).'"></script>'."\n";;
    }		
  }
  // Output

  $output = '';
  foreach($scripts as $script) {
    $output .= $script;		
  }
  return $output;
}
	
# vim:ts=4 sw=4 noet
?>