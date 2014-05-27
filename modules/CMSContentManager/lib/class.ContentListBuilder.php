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

/**
 * @package CMS
 */

/**
 * A simple class for building, and managing content lists.
 *
 * This is an internal class.  Not intended for use by external third parties.
 *
 * @package CMS
 * @internal
 * @ignore
 * @author Robert Campbell
 * @copyright Copyright (c) 2013, Robert Campbell <calguy1000@cmsmadesimple.org>
 */
final class ContentListBuilder
{
  private $_opened_array = array();
  private $_module;
  private $_userid;
  private $_use_perms = TRUE;
  private $_pagelimit = 500;
  private $_offset    = 0;
  private $_pagelist;
  private $_seek_to;
  private $_locks;
  private $_display_columns = array();

  /**
   * Constructor
   *
   * Caches the opened pages, and userid
   */
  public function __construct(CMSModule $mod)
  {
    if( get_class($mod) != 'CMSContentManager' ) throw new CmsInvalidDataException('Expected ContentEditor object, got: '.get_class($mod));

    $this->_module = $mod;
    $this->_userid = get_userid();
    $tmp = cms_userprefs::get('opened_pages');
    if( $tmp ) $this->_opened_array = explode(',',$tmp);
  }

  public function column_state($column,$state = TRUE)
  {
    $this->_display_columns[$column] = $state;
  }

  /**
   * Expand a section, given a parent page_id.  Results in the children of this page being visible.
   */
  public function expand_section($parent_page_id)
  {
    $parent_page_id = (int)$parent_page_id;
    if( $parent_page_id < 1 ) return;

    $tmp = $this->_opened_array;
    $tmp[] = $parent_page_id;
    asort($tmp);
    $this->_opened_array = array_unique($tmp);
    cms_userprefs::set('opened_pages',implode(',',$this->_opened_array));
  }

  /**
   * Marks all parent pages as expanded.  Results in all content pages being visible.
   */
  public function expand_all()
  {
    $hm = cmsms()->GetHierarchyManager();
    // find all the pages (recursively) that have children.

    // anonymous, recursive function.
    $func = function($node) use(&$func) {
      $out = null;
      if( $node->has_children() ) {
	$out = array();
	if( $node->get_tag('id') ) $out[] = $node->get_tag('id');
        $children = $node->get_children();
	for( $i = 0; $i < count($children); $i++ ) {
	  $tmp = $func($children[$i]);
          if( is_array($tmp) && count($tmp) ) $out = array_merge($out,$tmp);
	}
	$out = array_unique($out);
      }
      return $out;
    }; // function.

    $this->_opened_array = $func($hm);
    cms_userprefs::set('opened_pages',implode(',',$this->_opened_array));
  }

  /**
   * Marks all parent pages as collapsed.  Results in no child pages beng visible.
   */
  public function collapse_all()
  {
    $this->_opened_array = array();
    cms_userprefs::remove('opened_pages');
  }

  /**
   * Collapse a parent page, results in its child pages not being visible in the content list.
   */
  public function collapse_section($parent_page_id)
  {
    $parent_page_id = (int)$parent_page_id;
    if( $parent_page_id < 1 ) return FALSE;

    $tmp = array();
    foreach( $this->_opened_array as $one ) {
      if( $one != $parent_page_id ) $tmp[] = $one;
    }
    asort($tmp);
    $this->_opened_array = array_unique($tmp);
    if( count($this->_opened_array) ) {
      cms_userprefs::set('opened_pages',implode(',',$this->_opened_array));
    }
    else {
      cms_userprefs::remove('opened_pages');
    }
    return TRUE;
  }

  /**
   * Toggle the active state of a content page
   */
  public function set_active($page_id,$state = TRUE)
  {
    $state = (bool)$state;
    $page_id = (int)$page_id;
    if( $page_id < 1 ) return FALSE;
    if( !$this->_module->CheckPermission('Manage All Content') ) return FALSE;

    $contentops = cmsms()->GetContentOperations();
    $node = $contentops->quickfind_node_by_id($page_id);
    if( !$node ) return FALSE;
    $content = $node->GetContent(FALSE,FALSE,FALSE);
    if( !$content ) return FALSE;

    $content->SetActive($state);
    $content->Save();
    return TRUE;
  }

  /**
   * Set the page limit.
   * This must be called BEFORE get_content_list() is called.
   *
   * @param integer The page limit (min 1, max 500)
   * @return void
   */
  public function set_pagelimit($n)
  {
    $n = (int)$n;
    $n = max(1,min(500,$n));
    $this->_pagelimit = $n;
  }


  /**
   * Get the page limit.
   *
   * @return integer
   */
  public function get_pagelimit()
  {
    return $this->_pagelimit;
  }

  /**
   * Set the page offset
   * This must be called before get_content_list() is called.
   *
   * @param int page offset (min 0, max is set by get_content_list())
   */
  public function set_offset($n)
  {
    $n = (int)$n;
    $n = max(0,$n);
    $this->_offset = $n;
  }

  /**
   * Get the current offset
   *
   * @return integer
   */
  public function get_offset()
  {
    return $this->_offset;
  }

  public function seek_to($n)
  {
    $n = (int)$n;
    $n = max(1,$n);
    $this->_seek_to = $n;
  }

  public function set_page($n)
  {
    $n = (int)$n;
    $n = max(1,$n);
    $this->_offset = $this->_pagelimit * ($n-1);
  }

  /**
   * This can be called after the content list is returned as
   * the offset can be adjusted because of seeking to a content id.
   */
  public function get_page()
  {
    return (int)($this->_offset / $this->_pagelimit) + 1;
  }

  /**
   * Get the number of pages.
   * Can only be called AFTER get_content_list has been called.
   *
   * @return integer
   */
  public function get_numpages()
  {
    if( !is_array($this->_pagelist) ) return;
    $npages = (int)(count($this->_pagelist) / $this->_pagelimit);
    if( count($this->_pagelist) % $this->_pagelimit  != 0 ) $npages++;
    return $npages;
  }

  /**
   * Set the specified page as the default page
   */
  public function set_default($page_id)
  {
    $page_id = (int)$page_id;
    if( $page_id < 1 ) return FALSE;

    if( !$this->_module->CheckPermission('Manage All Content') ) return;

    $contentops = cmsms()->GetContentOperations();
    $content1 = $contentops->LoadContentFromId($page_id);
    if( !$content1 ) return FALSE;
    if( !$content1->IsDefaultPossible() ) return FALSE;
    if( !$content1->Active() ) return FALSE;

    $page_id2 = ContentOperations::get_instance()->GetDefaultContent();
    $content2 = $contentops->LoadContentFromId($page_id2);
    if( !$content2 ) return FALSE;

    $content1->SetDefaultContent(TRUE);
    $content1->Save();
    $content2->SetDefaultContent(FALSE);
    $content2->Save();
    return TRUE;
  }

  /**
   * Move a content page up, or down wrt it's peers.
   */
  public function move_content($page_id,$direction)
  {
    $page_id = (int)$page_id;
    if( $page_id < 1 ) return FALSE;
    $direction = (int)$direction;
    if( $direction == 0 ) return FALSE;
    $contentops = cmsms()->GetContentOperations();

    $test = FALSE;
    if( $this->_module->CheckPermission('Manage All Content') ) {
        $test = TRUE;
    }
    else if( $this->_module->CheckPermission('Reorder Content') && $contentops->CheckPeerAuthorship($this->_userid,$page_id) ) {
        $test = TRUE;
    }

    if( !$test ) return FALSE;

    $content = $contentops->LoadContentFromId($page_id);
    if( !$content ) return FALSE;

    $content->ChangeItemOrder($direction);
    $contentops = ContentOperations::get_instance();
    $contentops->SetAllHierarchyPositions();
    return TRUE;
  }

  /**
   * Delete a content page.
   *
   * returns error message on failure.  null on success;
   */
  public function delete_content($page_id)
  {
    $page_id = (int)$page_id;
    if( $page_id < 1 ) return $this->_module->Lang('error_invalidpageid');

    $test = FALSE;
    if( $this->_module->CheckPermission('Manage All Content') ) {
      $test = TRUE;
    }
    else if( $this->_module->CheckPermission('Remove Pages') && check_authorship($this->_userid,$page_id) ) {
      $test = TRUE;
    }

    if( !$test ) return $this->_module->Lang('error_delete_permission');

    $contentops = cmsms()->GetContentOperations();
    $node = $contentops->quickfind_node_by_id($page_id);
    if( !$node ) return $this->_module->Lang('error_invalidpageid');
    if( $node->has_children() ) return $this->_module->Lang('error_delete_haschildren');

    $parent = $node->get_parent();
    $parent_id = $node->get_tag('id');
    $childcount = 0;
    if( $parent ) $childcount = $parent->count_children();

    $content = $node->GetContent(FALSE,FALSE,FALSE);
    if( $content->DefaultContent() ) return $this->_module->Lang('error_delete_defaultcontent');

    $content->Delete();

    if( $childcount == 1 && $parent_id > -1 ) $this->collapse_section($parent_id);
    $this->collapse_section($page_id);

    $contentops->SetAllHierarchyPositions();
  }

  /**
   * Get the columns that are visible to display in the content list
   */
  public function get_display_columns()
  {
    $config = cmsms()->GetConfig();
    $dflt = 'expand,icon1,hier,page,alias,url,template,friendlyname,owner,active,default,move,view,copy,edit,delete,multiselect';
    $mod = $this->_module;
    $cols = explode(',',$mod->GetPreference('list_visiblecolumns',$dflt));

    $columnstodisplay = array();
    $columnstodisplay['expand'] = in_array('expand',$cols);
    $columnstodisplay['icon1'] = in_array('icon1',$cols);
    $columnstodisplay['hier'] = in_array('hier',$cols);
    $columnstodisplay['page'] = in_array('page',$cols);
    $columnstodisplay['alias'] = in_array('alias',$cols);
    $columnstodisplay['url'] = in_array('url',$cols) && $config['url_rewriting'] != 'none';
    $columnstodisplay['template'] = in_array('template',$cols);
    $columnstodisplay['friendlyname'] = in_array('friendlyname',$cols);
    $columnstodisplay['owner'] = in_array('owner',$cols);
    $columnstodisplay['active'] = in_array('active',$cols) && $mod->CheckPermission('Manage All Content');
    $columnstodisplay['default'] = in_array('default',$cols) && $mod->CheckPermission('Manage All Content');
    $columnstodisplay['move'] = in_array('move',$cols) && ($mod->CheckPermission('Manage All Content') || $mod->CheckPermission('Reorder Content'));
    $columnstodisplay['view'] = in_array('view',$cols);
    $columnstodisplay['copy'] = in_array('copy',$cols) && ($mod->CheckPermission('Add Pages') || $mod->CheckPermission('Manage All Content'));
    $columnstodisplay['edit'] = in_array('edit',$cols);
    $columnstodisplay['delete'] = in_array('delete',$cols) && ($mod->CheckPermission('Remove Pages') || $mod->CheckPermission('Manage All Content'));
    $columnstodisplay['multiselect'] = in_array('multiselect',$cols) && ($mod->CheckPermission('Remove Pages') || $mod->CheckPermission('Manage All Content'));

    foreach( $columnstodisplay as $key => $val ) {
      if( isset($this->_display_columns[$key]) ) $columnstodisplay[$key] = $val && $this->_display_columns[$key];
    }

    return $columnstodisplay;
  }

  /**
   * Recursive function to generate a list of all content pages.
   */
  private function _get_all_pages(cms_tree $node)
  {
    $out = array();
    if( $node->get_tag('id') ) $out[] = $node->get_tag('id');
    if( $node->has_children() ) {
      $children = $node->get_children();
      for( $i = 0; $i < count($children); $i++ ) {
	$child = $children[$i];
	$tmp = $this->_get_all_pages($child);
	if( is_array($tmp) && count($tmp) ) $out = array_merge($out,$tmp);
      }
    }
    return $out;
  }

  /**
   * Load all content that the user has access to.
   */
  private function _load_editable_content()
  {
      // build a display list
      // 1.  add in top level items (items with parent == -1) which cannot be closed
      // 2.  for reach item in opened array
      //       for each parent
      //         if not in opened array break
      //     if got to root, add items children
      // 3.  reduce list by items we are able to view (author pages)

      $contentops = cmsms()->GetContentOperations();
      $hm = cmsms()->GetHierarchyManager();
      $display = array();

      // filter the display list by what we're authorized to view.
      if( $this->_use_perms && ($this->_module->CheckPermission('Manage All Content') || $this->_module->CheckPermission('Modify Any Page')) ) {
          // we can display anything

          // add in top level items.
          {
              $children = $hm->get_children();
              foreach( $children as $child ) {
                  $display[] = $child->get_tag('id');
              }
          }

          // add children of opened_array items to the list.
          $list = array();
          foreach( $this->_opened_array as $one ) {
              $node = $contentops->quickfind_node_by_id($one);
              if( !$node ) continue;
              // ignore if the parents are not also in the opened array
              $parent = $node->get_parent();
              $parent_id = $parent->get_tag('id');
              if( $parent_id != '' && !in_array($parent_id,$this->_opened_array) ) continue;
              while( $node ) {
                  $children = $node->get_children();
                  if( $children && count($children) ) {
                      foreach( $children as $child ) {
                          $list[] = $child->get_tag('id');
                      }
                  }
                  $node = $node->get_parent();
              }
          }
          if( is_array($list) && count($list) ) $display = array_merge($display,$list);
          $display = array_unique($display);
      }
      else {
          //
          // we can only edit some pages.
          //

          /*
            for each item
            if in opened array or has no parent add item
            if all parents are opened add item
          */
          $tmplist = $contentops->GetPageAccessForUser($this->_userid);
          $display = array();
          foreach( $tmplist as $item ) {
              // get all the parents
              $parents = array();
              $startnode = $node = $contentops->quickfind_node_by_id($item);
              while( $node && $node->get_tag('id') > 0 ) {
                  $parents[] = $node->get_tag('id');
                  $node = $node->getParent();
              }
              // start at root
              // push items from list on the stack if they are root, or the previous item is in the opened array.
              $parents = array_reverse($parents);
              for( $i = 0; $i < count($parents); $i++ ) {
                  if( $i == 0 ) {
                      $display[] = $parents[$i];
                      continue;
                  }
                  if( $i > 0 && in_array($parents[$i-1],$this->_opened_array) && in_array($parents[$i-1],$display) ) {
                      $display[] = $parents[$i];
                  }
              }
          }
      }

      // now order the page id list by hierarchy. and make sure they are unique.
      $display = array_unique($display);
      usort($display,function($a,$b) use ($hm,$contentops) {
              $node_a = $contentops->quickfind_node_by_id($a);
              $hier_a = $node_a->getHierarchy();
              $node_b = $contentops->quickfind_node_by_id($b);
              $hier_b = $node_b->getHierarchy();
              return strcmp($hier_a,$hier_b);
          });

      $this->_pagelist = $display;

      if( $this->_seek_to > 0 ) {
          // re-calculate an offset
          $idx = array_search($this->_seek_to,$this->_pagelist);
          if( $idx > 0 ) {
              // item found.
              $pagenum = (int)($idx / $this->_pagelimit);
              $this->_offset = (int)($pagenum * $this->_pagelimit);
          }
      }

      $offset = min(count($this->_pagelist),$this->_offset);
      $display = array_slice($display,$offset,$this->_pagelimit);

      ContentOperations::get_instance()->LoadChildren(-1,FALSE,TRUE,$display);
      return $display;
  }

  /**
   * Given a content id, and a userid indicate wether the user has access to all peers of the content page.
   */
  private function _check_peer_authorship($content_id,$userid = null)
  {
    if( $content_id < 1 ) return FALSE;
    if( $userid <= 0 ) $userid = $this->_userid;
    $contentops = cmsms()->GetContentOperations();
    return $contentops->CheckPeerAuthorship($userid,$content_id);
  }

  /**
   * Checks if the specified user is the author of the specified content page
   */
  private function _check_authorship($content_id,$userid = null)
  {
    if( $userid <= 0 ) $userid = $this->_userid;
    return cmsms()->GetContentOperations()->CheckPageAuthorship($userid,$content_id);
  }

  /**
   * Get a hash of current page locks.
   */
  public function get_locks()
  {
    if( is_array($this->_locks) ) return $this->_locks;
    $this->_locks = array();
    $tmp = CmsLockOperations::get_locks('content');
    if( is_array($tmp) && count($tmp) ) {
        foreach( $tmp as $lock_obj ) {
            $this->_locks[$lock_obj['oid']] = $lock_obj;
        }
    }
    return $this->_locks;
  }

  /**
   * Test if we have any locks.
   */
  public function have_locks()
  {
    if( count($this->get_locks()) ) return TRUE;
    return FALSE;
  }

  /**
   * Checks if the current page is locked.
   */
  private function _is_locked($page_id)
  {
    $locks = $this->get_locks();
    if( !is_array($locks) || count($locks) == 0 ) return FALSE;
    if( in_array($page_id,array_keys($locks)) ) return TRUE;
    return FALSE;
  }

  private function _is_default_locked()
  {
    $dflt_content_id = ContentOperations::get_instance()->GetDefaultContent();
    $locks = $this->get_locks();
    if( is_array($locks) && count($locks) && in_array($dflt_content_id,array_keys($locks)) ) return TRUE;
    return FALSE;
  }

  private function _is_lock_expired($page_id)
  {
    $locks = $this->get_locks();
    if( !is_array($locks) || count($locks) == 0 ) return FALSE;
    if( isset($locks[$page_id]) ) {
      $lock = $locks[$page_id];
      if( $lock->expired() ) return TRUE;
    }
    return FALSE;
  }

  /**
   * Load, and cache all users
   */
  private function _get_users()
  {
    static $_users = null;
    if( !$_users ) {
      $tmp = UserOperations::get_instance()->LoadUsers();
      if( is_array($tmp) && count($tmp) ) {
	$_users = array();
	for( $i = 0; $i < count($tmp); $i++ ) {
	  $oneuser = $tmp[$i];
	  $_users[$oneuser->id] = $oneuser;
	}
      }
    }
    return $_users;
  }

  /**
   * Givena list of displayable pages, builds display info for each page.
   */
  private function _get_display_data($page_list)
  {
      $users = $this->_get_users();
      $contentops = cmsms()->GetContentOperations();
      $mod = $this->_module;
      $columns = $this->get_display_columns();
      $userid = $this->_userid;

      // preload the templates.
      $tpl_list = array();
      foreach( $page_list as $page_id ) {
          $node = $contentops->quickfind_node_by_id($page_id);
          if( !$node ) continue;
          $content = $node->GetContent(FALSE,FALSE,TRUE);
          if( !$content ) continue;
          $tpl_list[] = $content->TemplateId();
      }
      $tpl_list = array_values(array_unique(array_values($tpl_list)));
      $tpls = CmsLayoutTemplate::load_bulk($tpl_list);

      $out = array();
      foreach( $page_list as $page_id ) {
          $node = $contentops->quickfind_node_by_id($page_id);
          if( !$node ) continue;
          $content = $node->GetContent(FALSE,FALSE,TRUE);
          if( !$content ) continue;

          $rec = array();
          $rec['depth'] = $node->get_level();
          $rec['hasusablelink'] = $content->HasUsableLink();
          $rec['hastemplate'] = $content->HasTemplate();
          $rec['menutext'] = $content->MenuText();
          $rec['title'] = $content->Name();
          $rec['template_id'] = $content->TemplateId();
          $rec['can_edit_tpl'] = $mod->CheckPermission('Modify Templates');
          $rec['id'] = $content->Id();
          $rec['lastmodified'] = $content->GetModifiedDate();
          $rec['created'] = $content->GetCreationDate();
          $rec['secure'] = $content->Secure();
          $rec['cachable'] = $content->Cachable();
          $rec['showinmenu'] = $content->ShowInMenu();
          $rec['viewable'] = $content->IsViewable();
          if( $this->_is_locked($page_id) ) {
              $lock = $this->_locks[$page_id];
              $rec['lockuser'] = $users[$lock['uid']]->username;
              $rec['lock'] = $this->_locks[$page_id];
          }
          if( $page_id == $this->_seek_to ) $rec['selected'] = 1;
          if( $content->LastModifiedBy() > 0 && isset($users[$content->LastModifiedBy()]) ) {
              $rec['lastmodifiedby'] = $users[$content->LastModifiedBy()]->username;
          }
          $rec['can_edit'] = ($mod->CheckPermission('Modify Any Page') || $mod->CheckPermission('Manage All Content') ||
                              $this->_check_authorship($rec['id'])) && !$this->_is_locked($page_id);
          $rec['can_steal'] = ($mod->CheckPermission('Modify Any Page') || $mod->CheckPermission('Manage All Content') ||
                               $this->_check_authorship($rec['id'])) && $this->_is_locked($page_id) && $this->_is_lock_expired($page_id);
          $rec['can_delete'] = $rec['can_edit'] && $mod->CheckPermission('Remove Pages');

          foreach( $columns as $column => $displayable ) {
              switch( $column ) {
              case 'expand':
                  $rec[$column] = 'none';
                  if( $node->has_children() ) {
                      if( in_array($page_id,$this->_opened_array) ) {
                          $rec[$column] = 'open';
                      } else {
                          $rec[$column] = 'closed';
                      }
                  }
                  break;

              case 'hier':
                  $rec[$column] = $content->Hierarchy();
                  break;

              case 'page':
                  if( $content->MenuText() == CMS_CONTENT_HIDDEN_NAME ) continue;
                  $rec[$column] = $content->MenuText();
                  if( CmsContentManagerUtils::get_pagenav_display() == 'title' ) $rec[$column] = $content->Name();
                  break;

              case 'alias':
                  if( $content->HasUsableLink() && $content->Alias() != '' ) $rec[$column] = $content->Alias();
                  break;

              case 'url':
                  $rec[$column] = '';
                  if( $content->HasUsableLink() && $content->URL() != '' ) $rec[$column] = $content->URL();
                  break;

              case 'template':
                  if( $content->IsViewable() ) {
                      try {
                          $template = CmsLayoutTemplate::load($content->TemplateId());
                          $rec[$column] = $template->get_name();
                      }
                      catch( Exception $e ) {
                          // can't edit this content object, cuz we can't get the template associated with it.
                          $rec['can_edit'] = false;
                      }
                  }
                  break;

              case 'friendlyname':
                  $rec[$column] = $content->FriendlyName();
                  break;

              case 'owner':
                  if( $content->Owner() > 0 ) $rec[$column] = $users[$content->Owner()]->username;
                  break;

              case 'active':
                  $rec[$column] = '';
                  if( $mod->CheckPermission('Manage All Content') && !$content->IsSystemPage() && !$this->_is_locked($page_id) ) {
                      if( $content->Active() ) {
                          $rec[$column] = 'active';
                          if( $content->DefaultContent() ) $rec[$column] = 'default';
                      } else {
                          $rec[$column] = 'inactive';
                      }
                  }
                  break;

              case 'default':
                  $rec[$column] = '';
                  if( $this->_module->CheckPermission('Manage All Content') && !$this->_is_locked($page_id) && !$this->_is_default_locked() ) {
                      if( $content->IsDefaultPossible() && $content->Active() ) $rec[$column] = ($content->DefaultContent())?'yes':'no';
                  }
                  break;

              case 'move':
                  $rec[$column] = '';
                  if( !$this->have_locks() && $this->_check_peer_authorship($content->Id()) && ($nsiblings = $node->count_siblings()) > 1 ) {
                      if( $content->ItemOrder() == 1 ) {
                          $rec[$column] = 'down';
                      }
                      else if( $content->ItemOrder() == $nsiblings ) {
                          $rec[$column] = 'up';
                      }
                      else {
                          $rec[$column] = 'both';
                      }
                  }
                  break;

              case 'view':
                  $rec[$column] = '';
                  if( $content->HasUsableLink() && $content->IsViewable() && $content->Active() ) $rec[$column] = $content->GetURL();
                  break;

              case 'copy':
                  $rec[$column] = '';
                  if( $content->IsCopyable() && !$this->_is_locked($content->Id()) ) {
                      if( $rec['can_edit'] && ($mod->CheckPermission('Add Pages') || $mod->CheckPermission('Manage All Content')) ) {
                          $rec[$column] = 'yes';
                      }
                  }
                  break;

              case 'edit':
                  $rec[$column] = '';
                  if( $rec['can_edit'] ) {
                      $rec[$column] = 'yes';
                  }
                  elseif( $rec['can_steal'] ) {
                      $rec[$column] = 'steal';
                  }
                  break;

              case 'delete':
                  $rec[$column] = '';
                  if( $rec['can_delete'] && !$content->DefaultContent() && !$node->has_children() && !$this->_is_locked($content->Id()) ) {
                      $rec[$column] = 'yes';
                  }
                  break;

              case 'multiselect':
                  $rec[$column] = '';
                  if( !$content->IsSystemPage() && !$this->_is_locked($content->Id()) ) {
                      if( $mod->CheckPermission('Manage All Content') || $mod->CheckPermission('Modify Any Page') ) {
                          $rec[$column] = 'yes';
                      }
                      else if( $mod->CheckPermission('Remove Pages') && $this->_check_authorship($content->Id()) ) {
                          $rec[$column] = 'yes';
                      }
                      else if( $this->_check_authorship($content->Id()) ) {
                          $rec[$column] = 'yes';
                      }
                  }
                  break;
              } // switch
          } // foreach

          $out[] = $rec;
      } // foreach

      return $out;
  }

  /**
   * Master function, returns an array of display data for viewable/editable content
   */
  public function get_content_list()
  {
    $pagelist = $this->_load_editable_content();
    if( is_array($pagelist) && count($pagelist) ) return $this->_get_display_data($pagelist);
  }

  /**
   * Test if this content list supports multiselect
   */
  public function supports_multiselect()
  {
    $cols = $this->get_display_columns();
    return (isset($cols['multiselect']) && $cols['multiselect']);
  }

} // end of class

#
# EOF
#
?>