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
 */
function redirect($to, $noappend=false)
{
	global $gCms;
	$config = $gCms->config;

	$schema = $_SERVER['SERVER_PORT'] == '443' ? 'https' : 'http';
	$host = strlen($_SERVER['HTTP_HOST'])?$_SERVER['HTTP_HOST']:$_SERVER['SERVER_NAME'];
	if (ini_get("session.use_trans_sid") != "0" && $noappend == false)
	{
		$to = $to."?".session_name()."=".session_id();
	}
	if (headers_sent())
	{
		// use javascript instead
		echo '<script type="text/javascript">
			<!--
				location.replace("'.$url.'");
			// -->
			</script>
			<noscript>
				<meta http-equiv="Refresh" content="0;URL='.$url.'">
			</noscript>';
		exit;

	}
	else
	{
		if (isset($config) and $config['debug'] == true)
		{
			echo "Debug is on.  Redirecting disabled...  Please click this link to continue.<br />";
			echo "<a href=\"".$to."\">".$to."</a><br />";
			global $sql_queries;
			if (isset($sql_queries))
			{
				echo $sql_queries;
			}
			exit();
		}
		else
		{
			header("Location: $to");
			exit();
		}
	}
}

/**
 * Shows the difference in seconds between two microtime() values
 *
 * @since 0.3
 */
function microtime_diff($a, $b) {
	list($a_dec, $a_sec) = explode(" ", $a);
	list($b_dec, $b_sec) = explode(" ", $b);
	return $b_sec - $a_sec + $b_dec - $a_dec;
}

/**
 * Shows a very close approximation of an Apache generated 404 error.
 *
 * Shows a very close approximation of an Apache generated 404 error.
 * It also sends the actual header along as well, so that generic
 * browser error pages (like what IE does) will be displayed.
 *
 * @since 0.3
 */
function ErrorHandler404($errno, $errmsg, $filename, $linenum, $vars)
{
	if ($errno == E_USER_WARNING) {
		@ob_end_clean();
		header("HTTP/1.0 404 Not Found");
		echo '<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
<html><head>
<title>404 Not Found</title>
</head><body>
<h1>Not Found</h1>
<p>The requested URL was not found on this server.</p>
</body></html>';
		exit();
	}
}

/**
 * Simple template parser
 *
 * @since 0.6.1
 */

	function parse_template ($template, $tpl_array, $warn=0)
	{
		while ( list ($key,$val) = each ($tpl_array) )
		{
			if (!(empty($key)))
			{
				if(gettype($val) != "string")
				{
					settype($val,"string");
				}
				$template = eregi_replace('\{' . $key . '\}',$val,$template);
			}
		}

		if(!$warn)
		{
			// Silently remove anything not already found

			$template = ereg_replace('\{[A-Z0-9_]+\}', "", $template);
		}
		else
		{
			// Warn about unresolved template variables
			if (ereg('\{[A-Z0-9_]+\}',$template))
			{
				$unknown = split("\n",$template);
				while (list ($Element,$Line) = each($unknown) )
				{
					$UnkVar = $Line;
					if(!(empty($UnkVar)))
					{
						$this->show_unknowns($UnkVar);
					}
				}
			}
		}
		return $template;

	}	// end parse_template();

function cms_htmlentities($string, $param=ENT_QUOTES, $charset="UTF-8")
{
	$result = "";
	#$result = htmlentities($string, $param, $charset);
	$result = my_htmlentities($string);
	return $result;
}

/**
 * Enter description here...
 *
 * @param unknown $val
 * @param integer $quote_style
 * @return unknown
 * 
 * $quote_style may be one of:
 *     ENT_COMPAT   : Will convert double-quotes and leave single-quotes alone. 
 *     ENT_QUOTES   : Will convert both double and single quotes. 
 *     ENT_NOQUOTES : Will leave both double and single quotes unconverted. 
 */
function my_htmlentities($val)
{
	if ($val == "")
	{
		return "";
	}
	$val = str_replace( "&#032;", " ", $val ); 

	//Remove sneaky spaces 
	// $val = str_replace( chr(0xCA), "", $val );   

	$val = str_replace( "&"            , "&amp;"         , $val ); 
	$val = str_replace( "<!--"         , "&#60;&#33;--"  , $val ); 
	$val = str_replace( "-->"          , "--&#62;"       , $val ); 
	$val = preg_replace( "/<script/i"  , "&#60;script"   , $val ); 
	$val = str_replace( ">"            , "&gt;"          , $val ); 
	$val = str_replace( "<"            , "&lt;"          , $val ); 
	
	
	//$val = str_replace( "\""           , "&quot;"        , $val ); 

	// Uncomment it if you need to convert literal newlines 
	//$val = preg_replace( "/\n/"        , "<br>"          , $val ); 

	$val = preg_replace( "/\\$/"      , "&#036;"        , $val ); 

	// Uncomment it if you need to remove literal carriage returns 
	//$val = preg_replace( "/\r/"        , ""              , $val ); 

	$val = str_replace( "!"            , "&#33;"         , $val ); 
	$val = str_replace( "'"            , "&#39;"         , $val ); 
	 
	// Uncomment if you need to convert unicode chars 
	//$val = preg_replace("/&#([0-9]+);/s", "&#\1;", $val ); 

	// Strip slashes if not already done so. 

	//if ( get_magic_quotes_gpc() ) 
	//{ 
	//	$val = stripslashes($val); 
	//} 

	// Swop user inputted backslashes 

	//$val = preg_replace( "/\(?!&#|?#)/", "&#092;", $val );

	return $val;
}


//Taken from http://www.webmasterworld.com/forum88/164.htm
function nl2pnbr( $text )
{
	// Use \n for newline on all systems
	$text = preg_replace("/(\r\n|\n|\r)/", "\n", $text);

	// Only allow two newlines in a row.
	$text = preg_replace("/\n\n+/", "\n\n", $text);

	// Put <p>..</p> around paragraphs
	$text = preg_replace('/\n?(.+?)(\n\n|\z)/s', "<p>$1</p>", $text);

	// Convert newlines not preceded by </p> to a <br /> tag
	$text = preg_replace('|(?<!</p>)\s*\n|', "<br />", $text);

	return $text;
}

/**
* Debug function to display $var nicely in html.
* 
* @param mixed $var
* @param string $title (optional)
* @param boolean $echo_to_screen (optional)
* @return string
*/
function debug_display($var, $title="", $echo_to_screen = true)
{
	$titleText = "Debug: ";
	if($title)
	{
		$titleText = "Debug display of '$title':";
	}

	ob_start();
	echo "<p><b>$titleText</b><pre>\n";
	if(is_array($var))
	{
		echo "Number of elements: " . count($var) . "\n";
		print_r($var);
	}
	elseif(is_object($var))
	{
		print_r($var);
	}
	elseif(is_string($var))
	{
		print_r(htmlentities(str_replace("\t", '  ', $var)));
	}
	elseif(is_bool($var))
	{
		echo $var === true ? 'true' : 'false';
	}
	else
	{
		print_r($var);
	}

	echo "</pre></p>\n";
	$output = ob_get_contents();
	ob_end_clean();

	if($echo_to_screen)
	{
		echo $output;
	}

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
	
	global $gCms;
	if($gCms->config["debug"] == true)
	{
		debug_display($var, $title, true);
	}

}

/**
 * Display $var nicely to the $gCms->errors array if $config['debug'] is set
 *
 * @param mixed $var
 * @param string $title
 */
function debug_buffer($var, $title="")
{
	global $gCms;
	$errors = &$gCms->errors;

	if($gCms->config["debug"] == true)
	{
		array_push($errors, debug_display($var, $title, false));
	}
}

/**
* Retrieve value from $_REQUEST. Returns $default_value if
*		value is not in $_REQUEST or is not the same basic type as
*		$default_value.
*		If $session_key is set, then will return session value in preference
*		to $default_value if $_REQUEST[$value] is not set.
* 
* @param string $value
* @param mixed $default_value (optional)
* @param string $session_key (optional)
* @return mixed
*/
function get_request_value($value, $default_value = '', $session_key = '')
{
	if($session_key != '')
	{
		if(isset($_SESSION['request_values'][$session_key][$value]))
		{
			$default_value = $_SESSION['request_values'][$session_key][$value];
		}
	}
	if(isset($_REQUEST[$value]))
	{
		$result = get_value_with_default($_REQUEST[$value], $default_value);
	}
	else
	{
		$result = $default_value;
	}

	if($session_key != '')
	{
		$_SESSION['request_values'][$session_key][$value] = $result;
	}

	return $result;
}

/**
* Return $value if it's set and same basic type as $default_value,
*			otherwise return $default_value. Note. Also will trim($value)
*			if $value is not numeric.
* 
* @param string $value
* @param mixed $default_value
* @return mixed
*/
function get_value_with_default($value, $default_value = '')
{
	// is $default_value a number?
	$is_number = false;
	if(is_numeric($default_value))
	{
		$is_number = true;
	}

	// set our return value to the default initially and overwrite with $value if we like it.
	$return_value = $default_value;
	if(is_array($value))
	{
		// $value is an array - validate each element.
		$return_value = array();
		foreach($value as $element)
		{
			$return_value[] = get_value_with_default($element, $default_value);
		}
	}
	else
	{
		if($is_number)
		{
			if(is_numeric($value))
			{
				$return_value = $value;
			}
		}
		else
		{
			$return_value = trim($value);
		}
	}
	return $return_value;
}

/**
 * Retrieve the $value from the $params array checking for
 * $params[$value] and $params[$id.$value]. Returns $default
 * if $value is not in $params array. This is a helper function
 * for modules using the execute, executeuser and executeadmin
 * callback functions. Note: This function will also trim() string 
 * values.
 *
 * @param string $id
 * @param string $value
 * @param array $params
 * @param mixed $default
 * @return mixed
 */
function get_param_value($id, $value, $params, $default = '')
{
	$return_value = $default;
	
	if(is_bool($default))
	{
		// want a boolean return_value
		if(isset($params[$id.$value]))
		{
			$return_value = settype($params[$id.$value], 'boolean');
		}
		else if(isset($params[$value]))
		{
			$return_value = settype($params["display_approved"], 'boolean');
		}
	}
	else
	{
		if(isset($params[$id.$value]))
		{
			$return_value = $params[$id.$value];
		}
		else if(isset($params[$value]))
		{
			$return_value = $params[$value];
		}

		if(is_string($return_value))
			$return_value = trim($return_value);
	}	
	
	return $return_value;
}

# vim:ts=4 sw=4 noet
?>
