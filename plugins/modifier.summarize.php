<?php
/**
 * Smarty plugin
 * ----------------------------------------------------------------
 * Type:     modifier
 * Name:     summarize
 * Purpose:  returns desired amount of words from the full string
 *        ideal for article text, etc.
 * Auther:   MarkS, AKA Skram, mark@mark-s.net /
 *        http://dev.cmsmadesimple.org/users/marks/
 * ----------------------------------------------------------------
 **/
function smarty_cms_modifier_summarize($string,$numwords='5',$etc='...')
{
  $stringarray = explode(" ",strip_tags($str));
  if( $numwords >= count($stringarray) )
    {
      return $str;
    }
  $tmp = array_slice($stringarray,0,$numwords);
  $tmp = implode(' ',$tmp).$etc;
  return $tmp;    
}//end of function
?>
