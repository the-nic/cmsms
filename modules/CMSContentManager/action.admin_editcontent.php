<?php
#BEGIN_LICENSE
#-------------------------------------------------------------------------
# Module: CMSContentManager (c) 2013 by Robert Campbell
#         (calguy1000@cmsmadesimple.org)
#  A module for managing content in CMSMS.
#
#-------------------------------------------------------------------------
# CMS - CMS Made Simple is (c) 2004 by Ted Kulp (wishy@cmsmadesimple.org)
# Visit our homepage at: http://www.cmsmadesimple.org
#
#-------------------------------------------------------------------------
#
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# However, as a special exception to the GPL, this software is distributed
# as an addon module to CMS Made Simple.  You may not use this software
# in any Non GPL version of CMS Made simple, or in any version of CMS
# Made simple that does not indicate clearly and obviously in its admin
# section that the site was built with CMS Made simple.
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
#END_LICENSE
if( !isset($gCms) ) exit;

$this->SetCurrentTab('pages');

//
// init
//
$this->SetCurrentTab('pages');
$user_id = get_userid();
$content_id = null;
$content_obj = null;
$pagedefaults = CmsContentManagerUtils::get_pagedefaults();
$content_type = $pagedefaults['contenttype'];
$error = null;

if( isset($params['content_id']) ) $content_id = (int)$params['content_id'];

if( isset($params['cancel']) ) {
    try {
        if( $content_id && CmsContentManagerUtils::locking_enabled() ) CmsLockOperations::unlock('content',$content_id);
    }
    catch( Exception $e ) {
        // do nothing.
    }
    unset($_SESSION['__cms_copy_obj__']);
    $this->SetMessage($this->Lang('msg_cancelled'));
    $this->RedirectToAdminTab();
}

if( $content_id < 1 ) {
    // adding.
    if( !$this->CheckPermission('Add Pages') ) {
        // no permission to add pages.
        $this->SetError($this->Lang('error_editpage_permission'));
        $this->RedirectToAdminTab();
    }
}
else if( !$this->CanEditContent($content_id) ) {
    // nope, can't edit this page anyways.
    $this->SetError($this->Lang('error_editpage_permission'));
    $this->RedirectToAdminTab();
}

// Get a list of content types and pick a default if necessary
$gCms = cmsms();
$contentops = $gCms->GetContentOperations();
$existingtypes = $contentops->ListContentTypes(false,true);

//
// load or create the initial content object
//
try {
    if( $content_id == 'copy' && isset($_SESSION['__cms_copy_obj__']) ) {
        // we're copying a content object.
        $content_obj = unserialize($_SESSION['__cms_copy_obj__']);
    }
    else if( $content_id < 1 ) {
        // creating a new content object
        if( isset($params['content_type']) ) $content_type = trim($params['content_type']);
        $content_obj = $contentops->CreateNewContent($content_type);
        $content_obj->SetOwner($user_id);
        $content_obj->SetLastModifiedBy($user_id);
        $content_obj->SetActive($pagedefaults['active']);
        $content_obj->SetSecure($pagedefaults['secure']);
        $content_obj->SetCachable($pagedefaults['cachable']);
        $content_obj->SetShowInMenu($pagedefaults['showinmenu']);
        $content_obj->SetPropertyValue('design_id',$pagedefaults['design_id']);
        $content_obj->SetTemplateId($pagedefaults['template_id']);
        $content_obj->SetPropertyValue('searchable',$pagedefaults['searchable']);
        $content_obj->SetPropertyValue('content_en',$pagedefaults['content']);
        $content_obj->SetPropertyValue('pagemetadata',$pagedefaults['metadata']);
        $content_obj->SetPropertyValue('extra1',$pagedefaults['extra1']);
        $content_obj->SetPropertyValue('extra2',$pagedefaults['extra2']);
        $content_obj->SetPropertyValue('extra3',$pagedefaults['extra3']);
        $content_obj->SetAdditionalEditors($pagedefaults['addteditors']);
    }
    else {
        // editint an existing content object
        $content_obj = $contentops->LoadContentFromId($content_id);
        $content_type = $content_obj->Type();
        if( isset($params['content_type']) ) {
            $content_type = trim($params['content_type']);
        }
    }

    // validate the content type.
    if( is_array($existingtypes) && count($existingtypes) > 0 && !in_array($content_type,array_keys($existingtypes)) ) {
        $this->SetError($this->Lang('error_editpage_contenttype'));
        $this->RedirectToAdminTab();
    }
}
catch( Exception $e ) {
    // An error here means we can't display anything
    $this->SetError($e->getMessage());
    $this->RedirectToAdminTab();
}

//
// handle changing content types
// or a POST
//
try {
    if( $content_id != -1 && $content_type != $content_obj->Type() ) {
        // content type changed. create a new content object, but preserve the id.
        $tmpobj = $contentops->CreateNewContent($content_type);
        $tmpobj->SetId($content_obj->Id());
        $tmpobj->SetName($content_obj->Name());
        $tmpobj->SetMenuText($content_obj->MenuText());
        $tmpobj->SetTemplateId($content_obj->TemplateId());
        $tmpobj->SetParentId($content_obj->ParentId());
        $tmpobj->SetAlias($content_obj->Alias());
        $tmpobj->SetOwner($content_obj->Owner());
        $tmpobj->SetActive($content_obj->Active());
        $tmpobj->SetItemOrder($content_obj->ItemOrder());
        $tmpobj->SetShowInMenu($content_obj->ShowInMenu());
        $tmpobj->SetCachable($content_obj->Cachable());
        $tmpobj->SetHierarchy($content_obj->Hierarchy());
        $tmpobj->SetLastModifiedBy($content_obj->LastModifiedBy());
        $tmpobj->SetAdditionalEditors($content_obj->GetAdditionalEditors());
        $tmpobj->Properties();
        $content_obj = $tmpobj;
    }

    if( strtoupper($_SERVER['REQUEST_METHOD']) == 'POST' ) {
        // if we're in a POST action, another item may have changed that requires reloading the page
        // filling the params will make sure that no edited content was lost.
        $content_obj->FillParams($_POST,($content_id > 0));
    }

    if( isset($params['submit']) || isset($params['apply']) || isset($params['preview']) ) {
        $error = $content_obj->ValidateData();

        if( $error ) {
            if( isset($params['ajax']) ) {
                $tmp = array('response'=>'Error','details'=>$error);
                echo json_encode($tmp);
                exit;
            }
            // error, but no ajax... fall through
        }
        else if( isset($params['submit']) || isset($params['apply']) ) {
            $content_obj->SetLastModifiedBy(get_userid());
            $content_obj->Save();
            $contentops->SetAllHierarchyPositions();
            unset($_SESSION['__cms_copy_obj__']);
            audit($content_obj->Id(),'Content Item: '.$content_obj->Name(),' Edited');
            if( isset($params['submit']) ) {
                try {
                    if( $content_id && CmsContentManagerUtils::locking_enabled() ) CmsLockOperations::unlock('content',$content_id);
                }
                catch( Exception $e ) {
                    // do nothing.
                }
                $this->SetMessage($this->Lang('msg_editpage_success'));
                $this->RedirectToAdminTab();
            }

            if( isset($params['ajax']) ) {
                $tmp = array('response'=>'Success','details'=>$this->Lang('msg_editpage_success'),'url'=>$content_obj->GetURL());
                echo json_encode($tmp);
                exit;
            }
        }
        else if( isset($params['preview']) && $content_obj->HasPreview() ) {
            $_SESSION['__cms_preview__'] = serialize($content_obj);
            $_SESSION['__cms_preview_type__'] = $content_type;
            exit;
        }
    }
}
catch( CmsEditContentException $e ) {
    $this->SetError($e->getMessage());
    $this->RedirectToAdminTab();
}
catch( CmsContentException $e ) {
    $error = $e->GetMessage();
}

//
// BUILD THE DISPLAY
//
if( $content_id && CmsContentManagerUtils::locking_enabled() ) {
    try {
        // here we are attempting to steal a lock.
        $lock_id = CmsLockOperations::is_locked('content',$content_id);
        if( $lock_id > 0 ) CmsLockOperations::unlock($lock_id,'content',$content_id);
        $lock = new CmsLock('content',$content_id, (int) $this->GetPreference('lock_timeout'));
        $smarty->assign('lock',$lock);
    }
    catch( CmsException $e ) {
        $this->SetError($e->getMessage());
        $this->RedirectToAdminTab();
    }
}

$tab_names = null;
$tab_contents_array = array();
$tab_message_array = array();
try {
    $tab_names = $content_obj->GetTabNames();
    $tab_contents_array = array();
    $tab_message_array = array();

    // the content object may not have a main tab, but we require one
    if( !in_array($content_obj::TAB_MAIN,$tab_names) ) {
        $tmp = array($content_obj::TAB_MAIN=>lang($content_obj::TAB_MAIN));
        $tab_names = array_merge($tmp,$tab_names);
    }

    foreach( $tab_names as $currenttab => $label ) {
        $tmp = $content_obj->GetTabMessage($currenttab);
        if( $tmp ) $tab_message_array[$currenttab] = $tmp;

        $contentarray = $content_obj->GetTabElements($currenttab);
        if( $currenttab == $content_obj::TAB_MAIN ) {
            // first tab... add the content type selector.
            $help = '&nbsp;'.cms_admin_utils::get_help_tag(array('key'=>'help_content_type','title'=>$this->Lang('help_title_content_type')));
            $tmp = array('<label for="content_type">*'.$this->Lang('prompt_editpage_contenttype').':</label>'.$help);
            $tmp2 = "<select id=\"content_type\" name=\"{$id}content_type\">";
            foreach( $existingtypes as $type => $label ) {
                if( $type == 'errorpage' && !$this->CheckPermission('Manage All Content') ) {
                    // this is ugly... we should know if the type is a system type.
                    continue;
                }
                $tmp2 .= CmsFormUtils::create_option(array('value'=>$type,'label'=>$label),$content_type);
            }
            $tmp2 .= '</select>';
            $tmp[] = $tmp2;

            $contentarray = array_merge(array($tmp),$contentarray);
        }
        $tab_contents_array[$currenttab] = $contentarray;
    }
}
catch( Exception $e ) {
    $error = $e->GetMessage();
}

if( $error ) echo $this->ShowErrors($error);


// give stuff to smarty.
if( $content_obj->HasPreview() ) {
    $config = cmsms()->GetConfig();
    $smarty->assign('has_preview',1);
    $smarty->assign('preview_url',"{$config['root_url']}/index.php?{$config['query_var']}=".__CMS_PREVIEW_PAGE__);
}

if( $this->GetPreference('template_list_mode','designpage') != 'all')  {
    $tmp = $this->create_url($id,'admin_ajax_gettemplates',$returnid);
    $tmp = str_replace('amp;','',$tmp).'&showtemplate=false';
    $smarty->assign('designchanged_ajax_url',$tmp);
}

$parms = array();
if( $content_id > 0 ) $parms['content_id']=$content_id;
$url = str_replace('&amp','&',$this->create_url($id,'admin_editcontent',$returnid,$parms)).'&showtemplate=false';
$smarty->assign('apply_ajax_url',$url);
$smarty->assign('preview_ajax_url',$this->create_url($id,'admin_editcontent',$returnid,array('preview'=>1)));
$smarty->assign('lock_timeout',$this->GetPreference('locktimeout'));
$smarty->assign('lock_refresh',$this->GetPreference('lockrefresh'));
$smarty->assign('content_id',$content_id);
$smarty->assign('content_obj',$content_obj);
$smarty->assign('tab_names',$tab_names);
$smarty->assign('tab_contents_array',$tab_contents_array);
$smarty->assign('tab_message_array',$tab_message_array);
$factory = new ContentAssistantFactory($content_obj);
/* $assistant = $factory->getEditContentAssistant(); */
/* if( is_object($assistant) ) $smarty->assign('extra_content',$assistant->getExtraCode()); */

echo $this->ProcessTemplate('admin_editcontent.tpl');

#
# EOF
#
?>