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
if (!isset($gCms))
    exit ;
if (!$this->CheckPermission('Manage Stylesheets'))
    return;

$this->SetCurrentTab('stylesheets');

if (isset($params['cancel'])) {
    if ($params['cancel'] == $this->Lang('cancel'))
        $this->SetMessage($this->Lang('msg_cancelled'));
        $this->RedirectToAdminTab();
}

try {
    $css_ob = null;
    $message = $this->Lang('msg_stylesheet_saved');
    $response = 'success';
    $apply = isset($params['apply']) ? 1 : 0;
    $extraparms = array();

    if (isset($params['css'])) {
        $css_ob = CmsLayoutStylesheet::load($params['css']);
        $extraparms['css'] = $params['css'];
    } else {
        $css_ob = new CmsLayoutStylesheet();
    }

//
    // prepare to display.
    //
    if ($css_ob && $css_ob->get_id() && dm_utils::locking_enabled()) {
        $smarty->assign('lock_timeout', $this->GetPreference('lock_timeout'));
        $smarty->assign('lock_refresh', $this->GetPreference('lock_refresh'));
        try {
            $lock_id = CmsLockOperations::is_locked('stylesheet', $css_ob->get_id());
            if ($lock_id > 0)
                CmsLockOperations::unlock($lock_id, 'stylesheet', $css_ob->get_id());
            $lock = new CmsLock('stylesheet', $css_ob->get_id(), (int)$this->GetPreference('lock_timeout'));
            $smarty->assign('lock', $lock);
        } catch( CmsException $e ) {
            $response = 'error';
            $message = $e->GetMessage();

            if (!$apply) {
                $this->SetError($message);
                $this->RedirectToAdminTab();
            }
        }
    }

    try {
        if (isset($params['submit']) || isset($params['apply']) && $response !== 'error') {
            if (isset($params['description']))
                $css_ob->set_description($params['description']);
            if (isset($params['content']))
                $css_ob->set_content($params['content']);
            $typ = array();
            if (isset($params['media_type']))
                $typ = $params['media_type'];
            $css_ob->set_media_types($typ);
            if (isset($params['media_query']))
                $css_ob->set_media_query($params['media_query']);
            if ($this->CheckPermission('Manage Designs')) {
                $design_list = array();
                if (isset($params['design_list']))
                    $design_list = $params['design_list'];
                $css_ob->set_designs($design_list);
            }
            //$css_ob->set_designs(array());
            //if( isset($params['design_list']) ) $css_ob->set_designs($params['design_list']);

            // set the name last as it is the most likely to generate an error.
            // this allows us to preserve as much data as possible.
            if (isset($params['name']))
                $css_ob->set_name($params['name']);

            $css_ob->save();

            if (!$apply) {
                $this->SetMessage($message);
                $this->RedirectToAdminTab();
            }
        }
    } catch( CmsException $e ) {
        $message = $e->GetMessage();
        $response = 'error';
    }

    // handle the response message
    if ($apply) {
        $this->GetJSONResponse($response, $message);
    } elseif (!$apply && $response == 'error') {
        echo $this->ShowErrors($message);
    }

    $designs = CmsLayoutCollection::get_all();
    if (is_array($designs) && count($designs)) {
        $out = array();
        foreach ($designs as $one) {
            $out[$one->get_id()] = $one->get_name();
        }
        $smarty->assign('design_list', $out);
    }

    $smarty->assign('has_designs_right', $this->CheckPermission('Manage Designs'));
    $smarty->assign('extraparms', $extraparms);
    $smarty->assign('css', $css_ob);
    if ($css_ob && $css_ob->get_id())
        $smarty->assign('css_id', $css_ob->get_id());

    echo $this->ProcessTemplate('admin_edit_css.tpl');
} catch( CmsException $e ) {
    $this->SetError($e->GetMessage());
    $this->RedirectToAdminTab();
}

#
# EOF
#
?>