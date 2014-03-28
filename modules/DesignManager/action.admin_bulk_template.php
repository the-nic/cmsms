<?php
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
if( !$this->VisibleToAdminUser() ) return;

if( isset($params['allparms']) ) {
  $params = array_merge($params,unserialize(base64_decode($params['allparms'])));
}

$this->SetCurrentTab('templates');

if( !isset($params['bulk_action']) || !isset($params['tpl_select']) ||
    !is_array($params['tpl_select']) || count($params['tpl_select']) == 0 ) {
  $this->SetError($this->Lang('error_missingparam'));
  $this->RedirectToAdminTab();
}
if( isset($params['cancel']) ) {
  $this->SetMessage($this->Lang('msg_cancelled'));
  $this->RedirectToAdminTab();
}

switch( $params['bulk_action'] ) {
 case 'delete':
	 if( !$this->CheckPermission('Modify Templates') ) {
		 // check if we have ownership/delete permission for these templates
		 $my_templates = CmsLayoutTemplate::template_query(array(0=>'u:'.get_userid(),'as_list'=>1));
		 if( !is_array($my_templates) || count($my_templates) == 0 ) {
			 $this->SetError($this->Lang('error_retrieving_mytemplatelist'));
			 $this->RedirectToAdminTab();
		 }
		 $tpl_ids = array_keys($my_templates);

		 foreach( $params['tpl_select'] as $one ) {
			 if( !$this->CheckPermission('Modify Templates') ) {
				 if( !in_array($one,$tpl_ids) ) {
					 $this->SetError($this->Lang('error_permission_bulkoperation'));
					 $this->RedirectToAdminTab();
				 }
			 }
		 }
	 }

   if( isset($params['submit']) ) {
     if( !isset($params['check1']) || !isset($params['check2']) ) {
       echo $this->ShowErrors($this->Lang('error_notconfirmed'));
     }
     else {
       $templates = CmsLayoutTemplate::load_bulk($params['tpl_select']);
       foreach( $templates as $one ) {
				 if( in_array($one->get_id(),$params['tpl_select']) ) {
					 $one->delete();
				 }
       }

       $this->SetMessage($this->Lang('msg_bulkop_complete'));
       $this->RedirectToAdminTab();
     }
   }
   break;

 default:
   $this->SetError($this->Lang('error_missingparam'));
   $this->RedirectToAdminTab();
   break;
}

$templates = CmsLayoutTemplate::load_bulk($params['tpl_select']);
$smarty->assign('bulk_op','bulk_action_delete');
$allparms = base64_encode(serialize(array('tpl_select'=>$params['tpl_select'],
					   'bulk_action'=>$params['bulk_action'])));
$smarty->assign('allparms',$allparms);
$smarty->assign('templates',$templates);

echo $this->ProcessTemplate('admin_bulk_template.tpl');

#
# EOF
#
?>