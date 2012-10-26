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
if( !$this->CheckPermission('Manage Designs') ) return;

$this->SetCurrentTab('designs');
if( isset($params['cancel']) ) {
  $this->SetMessage($this->Lang('msg_cancelled'));
  $this->RedirectToAdminTab();
}

$design = null;
try {
  if( !isset($params['design']) || $params['design'] == '' ) {
    $design= new CmsLayoutCollection;
    $design->set_name('New Design');
  }
  else {
    $design = CmsLayoutCollection::load($params['design']);
  }

	try {
		if( isset($params['submit']) ) {
			$design->set_name($params['name']);
			$design->set_description($params['description']);
			$tpl_assoc = array();
			if( isset($params['assoc_tpl']) ) {
				$tpl_assoc = $params['assoc_tpl'];
			}
			$design->set_templates($tpl_assoc);

			$css_assoc = array();
			if( isset($params['assoc_css']) ) {
				$css_assoc = $params['assoc_css'];
			}
			$design->set_stylesheets($css_assoc);
			$design->save();
			$this->SetMessage($this->Lang('msg_design_saved'));
			$this->RedirectToAdminTab();
		}
	}
	catch( Exception $e ) {
		echo $this->ShowErrors($e->GetMessage());
	}

  $templates = CmsLayoutTemplate::get_editable_templates(get_userid());
  if( count($templates) ) {
    $smarty->assign('all_templates',$templates);
	}

	$stylesheets = StylesheetOperations::get_instance()->LoadStylesheets();
	if( is_array($stylesheets) && count($stylesheets) ) {
		$out = array();
		$out2 = array();
		for( $i = 0; $i < count($stylesheets); $i++ ) {
			$out[$stylesheets[$i]->id] = $stylesheets[$i]->name;
			$out2[$stylesheets[$i]->id] = $stylesheets[$i];
		}
		$smarty->assign('list_stylesheets',$out);
		$smarty->assign('all_stylesheets',$out2);
	}

  $smarty->assign('design',$design);
  echo $this->ProcessTemplate('admin_edit_design.tpl');
}
catch( CmsException $e ) {
  $this->SetError($e->GetMessage());
  $this->RedirectToAdminTab();
}


#
# EOF
#
?>