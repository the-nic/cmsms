<?php
#-------------------------------------------------------------------------
# Module: AdminSearch - A CMSMS addon module to provide admin side search capbilities.
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
if( !$this->VisibleToAdminUser() ) exit;

function status_error($msg) 
{
  echo '<script type="text/javascript">parent.status_error(\''.$msg.'\')</script>';
}

function status_msg($msg)
{
  echo '<script type="text/javascript">parent.status_msg(\''.$msg.'\')</script>';
}

function begin_section($id,$txt)
{
  echo "<script type=\"text/javascript\">parent.begin_section('{$id}','{$txt}')</script>";
}

function add_result($listid,$content,$title,$url)
{
  $tmp = "parent.add_result('{$listid}','{$content}','{$title}','{$url}')";
  echo '<script type="text/javascript">'.$tmp.'</script>';
}

function end_section()
{
  echo '<script type="text/javascript">parent.end_section()</script>';
}

if( !isset($params['search_text']) || $params['search_text'] == '' ) {
  status_error($this->Lang('error_nosearchtext')); return;
}

// save the search
$userid = get_userid();
$searchparams = $params;
unset($searchparams['submit']);
unset($searchparams['action']);
set_preference($userid,$this->GetName().'saved_search',serialize($searchparams));
unset($searchparams['slaves']);

// find search slave classes
status_msg($this->Lang('starting'));
$slaves = AdminSearch_tools::get_slave_classes();
if( is_array($slaves) && count($slaves) ) {
  foreach( $slaves as $one_slave ) {
    if( !in_array($one_slave['class'],$params['slaves']) ) continue;
    $module = cms_utils::get_module($one_slave['module']);
    if( !is_object($module) ) continue;
    if( !class_exists($one_slave['class']) ) continue;
    if( !is_subclass_of($one_slave['class'],'AdminSearch_slave') ) continue;

    $obj = new $one_slave['class'];
    if( !is_object($obj) ) continue;
    if( !$obj->check_permission() ) continue;

    $obj->set_params($searchparams);
    $results = $obj->get_matches();
    begin_section($one_slave['class'],$obj->get_name());
    foreach( $results as $one ) {
      add_result($one_slave['class'],$one['title'],$one['description'],$one['edit_url']);
    }
    end_section();
  }
}
status_msg($this->Lang('finished'));
exit;

#
# EOF
#
?>