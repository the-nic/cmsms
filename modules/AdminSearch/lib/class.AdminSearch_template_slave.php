<?php

final class AdminSearch_template_slave extends AdminSearch_slave
{
  public function get_name() 
  {
    $mod = cms_utils::get_module('AdminSearch');
    return $mod->Lang('lbl_template_search');
  }

  public function get_description()
  {
    $mod = cms_utils::get_module('AdminSearch');
    return $mod->Lang('desc_template_search');
  }

  public function check_permission()
  {
    $userid = get_userid();
    return check_permission($userid,'Modify Templates');
  }

  public function get_matches()
  {
    $db = cmsms()->GetDb();
    $query = 'SELECT *FROM '.cms_db_prefix().CmsLayoutTemplate::TABLENAME.' WHERE name LIKE ? OR content LIKE ?';
    $str = '%'.$this->get_text().'%';
    $parms = array($str,$str);
    if( $this->search_descriptions() ) {
      $query .= ' OR description LIKE ?';
      $parms[] = $str;
    }
    $dbr = $db->GetArray($query,$parms);
    if( is_array($dbr) && count($dbr) ) {
      $output = array();
      $urlext='?'.CMS_SECURE_PARAM_NAME.'='.$_SESSION[CMS_USER_KEY];

      foreach( $dbr as $row ) {
	$one = $row['id'];
	// here we could actually have a smarty template to build the description.
	$mod = cms_utils::get_module('DesignManager');
	$text = '';
	$pos = strpos($row['content'],$this->get_text());
	if( $pos !== FALSE ) {
	  $start = max(0,$pos - 50);
	  $end = min(strlen($row['content']),$pos+50);
	  $text = substr($row['content'],$start,$end-$start);
	  $text = cms_htmlentities($text);
	  $text = str_replace($this->get_text(),'<span class="search_oneresult">'.$this->get_text().'</span>',$text);
	  $text = str_replace("\r",'',$text);
	  $text = str_replace("\n",'',$text);
	}
	$url = $mod->create_url('m1_','admin_edit_template','',array('tpl'=>$one));
	$tmp = array('title'=>$row['name'],
		     'description'=>AdminSearch_tools::summarize($row['description']),
		     'edit_url'=>$url,'text'=>$text);
	$output[] = $tmp;
      }

      return $output;
    }
    
  }
} // end of class

?>