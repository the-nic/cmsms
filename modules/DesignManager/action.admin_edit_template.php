<?php // -*- mode:php; tab-width:2; indent-tabs-mode:t; c-basic-offset:2; -*-
#-------------------------------------------------------------------------
# Module: AdminSearch - A CMSMS addon module to provide template management.
# (c) 2012 by Robert Campbell <calguy1000@cmsmadesimple.org>
#
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
# Or read it online: http://www.gnu.org/licenses/licenses.html#GPL
#
#-------------------------------------------------------------------------
if( !isset($gCms) ) exit;
if( !$this->CheckPermission('Modify Templates') ) {
  // no manage templates permission
  if( !$this->CheckPermission('Add Templates') ) {
    // no add templates permission
    if( !isset($params['tpl']) || !CmsLayoutTemplate::user_can_edit($params['tpl']) ) {
      // no parameter, or no ownership/addt_editors.
      return;
    }
  }
}

$this->SetCurrentTab('templates');

if( isset($params['cancel']) ) {
	if( $params['cancel'] == $this->Lang('cancel') ) {
		$this->SetMessage($this->Lang('msg_cancelled'));
	}
  $this->RedirectToAdminTab();
}

try {
  $tpl_obj = null;
	$type_obj = null;
  $type_is_readonly = false;

  $extraparms = array();
  if( isset($params['import_type']) ) {
    $tpl_obj = CmsLayoutTemplate::create_by_type($params['import_type']);
    $tpl_obj->set_owner(get_userid());
    $extraparms['import_type'] = $params['import_type'];
    $type_is_readonly = true;
  }
  else if( isset($params['tpl']) ) {
    $tpl_obj = CmsLayoutTemplate::load($params['tpl']);
    $extraparms['tpl'] = $params['tpl'];
  }
  else {
    $this->SetError($this->Lang('error_missingparam'));
    $this->RedirectToAdminTab();
  }

  try {
		if( isset($params['tpl_setall']) ) {
			if( !$this->CheckPermission('Modify Templates') ) {
				throw new CmsException($this->Lang('error_permission'));
			}
			
			$db = cmsms()->GetDb();
			$time = $db->DbTimeStamp(time());
			$query = 'UPDATE '.cms_db_prefix()."content 
                SET template_id = ?, modified_date = $time";
			$dbr = $db->Execute($query,array($tpl_obj->get_id()));
			if( !$dbr ) {
				throw new CmsSQLErrorException($db->sql.' -- '.$db->ErrorMsg());
			}

			$this->SetMessage($this->Lang('msg_allpagesupdated'));
			$this->RedirectToAdminTab();
		}

    if( isset($params['submit']) || isset($params['apply']) ) {

      $tpl_obj->set_name($params['name']);
      $tpl_obj->set_content($params['contents']);
			if( isset($params['description']) ) {
				$tpl_obj->set_description($params['description']);
			}
			if( isset($params['type']) ) {
				$tpl_obj->set_type($params['type']);
			}
			if( isset($params['dflt']) ) {
				$tpl_obj->set_type_dflt($params['default']);
			}
      if( isset($params['owner_id']) ) {
				$tpl_obj->set_owner($params['owner_id']);
      }
      if( isset($params['addt_editors']) && is_array($params['addt_editors']) &&
					count($params['addt_editors']) ) {
				$tpl_obj->set_additional_editors($params['addt_editors']);
      }
      if( isset($params['category_id']) ) {
				$tpl_obj->set_category($params['category_id']);
      }
			if( $this->CheckPermission('Manage Designs') ) {
				$design_list = array();
				if( isset($params['design_list']) ) {
					$design_list = $params['design_list'];
				}
				$tpl_obj->set_designs($design_list);
			}
      $tpl_obj->save();

			if( isset($params['apply']) ) {
				echo 'AJAX GOOD';
				exit;
			}

			$this->SetMessage($this->Lang('msg_template_saved'));
			$this->RedirectToAdminTab();
    }
  }
  catch( CmsException $e ) {
    echo $this->ShowErrors($e->GetMessage());
  }

	$type_obj = CmsLayoutTemplateType::load($tpl_obj->get_type_id());
	$smarty->assign('type_obj',$type_obj);

  $smarty->assign('extraparms',$extraparms);
  $smarty->assign('template',$tpl_obj);

  $cats = CmsLayoutTemplateCategory::get_all();
  $out = array();
  $out[''] = $this->Lang('prompt_none');
  if( is_array($cats) && count($cats) ) {
    foreach( $cats as $one ) {
      $out[$one->get_id()] = $one->get_name();
    }
  }
  $smarty->assign('category_list',$out);

  $types = CmsLayoutTemplateType::get_all();
  if( is_array($types) && count($types) ) {
    $out = array();
		$out2 = array();
    foreach( $types as $one ) {
			$out2[] = $one->get_id();
      $out[$one->get_id()] = $one->get_langified_display_value();
    }
    $smarty->assign('type_list',$out);
    $smarty->assign('type_is_readonly',$type_is_readonly);
  }

  $designs = CmsLayoutCollection::get_all();
  if( is_array($designs) && count($designs) ) {
    $out = array();
    foreach( $designs as $one ) {
      $out[$one->get_id()] = $one->get_name();
    }
    $smarty->assign('design_list',$out);
  }

  $smarty->assign('has_manage_right',$this->CheckPermission('Modify Templates'));
  $smarty->assign('has_themes_right',$this->CheckPermission('Manage Designs'));
  if( $this->CheckPermission('Modify Templates') || 
      $tpl_obj->get_owner_id() == get_userid()) {

    $userops = cmsms()->GetUserOperations();
    $allusers = $userops->LoadUsers();
    $tmp = array();
    foreach( $allusers as $one ) {
      $tmp[$one->id] = $one->username;
    }
    if( is_array($tmp) && count($tmp) ) {
      $smarty->assign('user_list',$tmp);
    }
    
    $groupops = cmsms()->GetGroupOperations();
    $allgroups = $groupops->LoadGroups();
    foreach( $allgroups as $one ) {
      if( $one->active == 0 ) continue;
      $tmp[$one->id*-1] = $this->Lang('prompt_group').': '.$one->name; // appends to the tmp array.
    }
    if( is_array($tmp) && count($tmp) ) {
      $smarty->assign('addt_editor_list',$tmp);
    }
  }
  echo $this->ProcessTemplate('admin_edit_template.tpl');
}
catch( CmsException $e ) {
  $this->SetError($e->GetMessage());
  $this->RedirectToAdminTab();
}

#
# EOF
#
?>