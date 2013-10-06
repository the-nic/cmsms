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

// echo $this->StartTabHeaders();
// if( $this->can_search() ) echo $this->SetTabHeader('search',$this->Lang('search'));
// echo $this->EndTabHeaders();

//echo $this->StartTabContent();
if( $this->can_search() ) {
  //echo $this->StartTab('search', $params);
  include(dirname(__FILE__).'/function.admin_search_tab.php');
  //echo $this->EndTab();
}

//echo $this->EndTabContent();
#
# EOF
#
?>