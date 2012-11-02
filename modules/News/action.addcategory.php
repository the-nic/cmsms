<?php
if (!isset($gCms)) exit;
if (!$this->CheckPermission('Modify Site Preferences')) return;

$this->SetCurrentTab('categories');
$parent = -1;
if( isset($params['parent'])) {
  $parent = (int)$params['parent'];
 }
if (isset($params['cancel'])) {
  $this->Redirect($id, 'defaultadmin', $returnid);
 }

$name = '';
if (isset($params['name'])) {
  if( $parent == 0 ) $parent = -1;
  $name = trim($params['name']);
  if ($name != '') {
    $query = 'SELECT news_category_id FROM '.cms_db_prefix().'module_news_categories WHERE parent_id = ? AND news_category_name = ?';
    $tmp = $db->GetOne($query,array($parent,$name));
    if( $tmp ) {
      echo $this->ShowErrors($this->Lang('error_duplicatename'));
    }
    else {
      $catid = $db->GenID(cms_db_prefix()."module_news_categories_seq");
      $time = $db->DBTimeStamp(time());
      $query = 'INSERT INTO '.cms_db_prefix().'module_news_categories (news_category_id, news_category_name, parent_id, create_date, modified_date) VALUES (?,?,?,'.$time.','.$time.')';
      $parms = array($catid,$name,$parent);
      $db->Execute($query, $parms);
      news_admin_ops::UpdateHierarchyPositions();
      @$this->SendEvent('NewsCategoryAdded', array('category_id' => $catid, 'name' => $name));
      // put mention into the admin log
      audit($catid, 'News category: '.$catid, ' Category added');

      $this->SetMessage($this->Lang('categoryadded'));
      $this->RedirectToAdminTab();
    }
  }
  else {
    echo $this->ShowErrors($this->Lang('nonamegiven'));
  }
}

// Display template
$tmp = news_ops::get_category_list();
$tmp2 = array_flip($tmp);
$categories = array(-1=>$this->Lang('none'));
foreach( $tmp2 as $k => $v ) {
  $categories[$k] = $v;
}
$smarty->assign('parent',$parent);
$smarty->assign('name',$name);
$smarty->assign('categories',$categories);
$smarty->assign('startform', $this->CreateFormStart($id, 'addcategory', $returnid));
$smarty->assign('endform', $this->CreateFormEnd());
$smarty->assign('inputname', $this->CreateInputText($id, 'name', $name, 20, 255));
$smarty->assign('submit', $this->CreateInputSubmit($id, 'submit', lang('submit')));
$smarty->assign('cancel', $this->CreateInputSubmit($id, 'cancel', lang('cancel')));
$smarty->assign('mod',$this);
echo $this->ProcessTemplate('editcategory.tpl');
?>
