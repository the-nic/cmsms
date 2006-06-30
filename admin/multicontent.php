<?php
#CMS - CMS Made Simple
#(c)2004 by Ted Kulp (wishy@users.sf.net)
#This project's homepage is: http://cmsmadesimple.sf.net
#
#This program is free software; you can redistribute it and/or modify
#it under the terms of the GNU General Public License as published by
#the Free Software Foundation; either version 2 of the License, or
#(at your option) any later version.
#
#This program is distributed in the hope that it will be useful,
#but WITHOUT ANY WARRANTY; without even the implied warranty of
#MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#GNU General Public License for more details.
#You should have received a copy of the GNU General Public License
#along with this program; if not, write to the Free Software
#Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
#
#$Id$

$CMS_ADMIN_PAGE=1;

require_once("../include.php");

if (isset($_POST['cancel']))
	redirect('listcontent.php');

check_login();

$action = '';
if (isset($_POST['multiaction'])) $action = $_POST['multiaction'];

include_once("header.php");

global $gCms;
$hm =& $gCms->GetHierarchyManager();

$nodelist = array();

function DoContent(&$list, &$node, $checkdefault = true, $checkchildren = true)
{
	$content =& $node->GetContent();
	if (isset($content))
	{
		if (!$checkdefault || ($checkdefault && !$content->DefaultContent()))
		{
			$inarray = false;
			foreach ($list as $oneitem)
			{
				if ($oneitem == $content)
				{
					$inarray = true;
					break;
				}
			}

			if (!$inarray)
				$list[] =& $content;

			if ($checkchildren)
			{
				$children =& $node->getChildren();
				if (isset($children) && count($children))
				{
					reset($children);
					while (list($key) = each($children))
					{
						$onechild =& $children[$key];
						DoContent($list, $onechild, $checkdefault, $checkchildren);
					}
				}
			}
		}
	}
}
$reorder_error = FALSE;
if (isset($_POST['idlist']))
{
	foreach (explode(':', $_POST['idlist']) as $id)
	{
		$node =& $hm->sureGetNodeById($id);
		if (isset($node))
		{
			$content =& $node->GetContent();
			if (isset($content))
			{
				$nodelist[] =& $content;
			}
		}
	}
}
else
{
	foreach ($_POST as $k=>$v)
	{
		if (startswith($k, 'multicontent-'))
		{
			$id = substr($k, strlen('multicontent-'));
			$node =& $hm->sureGetNodeById($id);
			if (isset($node))
			{
				if ($action == 'inactive')
					DoContent($nodelist, $node, true, false);
				else if ($action == 'active')
					DoContent($nodelist, $node, false, false);
				else if ($action == 'delete')
					DoContent($nodelist, $node);
			}
		}
		if ($action == 'reorder')
		  {	  
		    if (startswith($k, 'order-'))
		      {
			$id = substr($k, strlen('order-'));
			$node =& $hm->sureGetNodeById($id);
			$one =& $node->getContent();
			$parentNode = &$node->getParentNode();
			if (FALSE == empty($reorder_parents_array[$one->ParentId()]) && array_key_exists($v, $reorder_parents_array[$one->ParentId()]))
			  {
			    $reorder_error = 'sibling_duplicate_order';
			  }
			else if ($v > count($parentNode->getChildren()))
			  {
			    $reorder_error = 'order_too_large';
			  }
			else if (0 == $v)
			  {
			    $reorder_error = 'order_too_small';
			  }
			else
			  {
			    $reorder_array[$id] = $v;
			    $reorder_parents_array[$one->ParentId()][$v] = $v;
			  }
		      }

		  }
	}
	if ($action == 'reorder' && $reorder_error == FALSE)
	  {
	    $order_changed = FALSE;
	    foreach ($reorder_array AS $page_id => $page_order)
	      {
		$node =& $hm->sureGetNodeById($page_id);
		$one =& $node->getContent();
		// Only update if order has changed.
		if ($one->ItemOrder() != $page_order)
		  {
		    $order_changed = TRUE;
		    $query = 'UPDATE '.cms_db_prefix().'content SET item_order ='.intval($page_order).' WHERE content_id = ?';
		    $db->Execute($query, array($page_id));
		  }
	      }
	    if (TRUE == $order_changed)
	      {
		ContentManager::SetAllHierarchyPositions();
	      }
	    else
	      {
		$reorder_error = 'no_orders_changed';
	      }
	  }
 }

if (count($nodelist) == 0 && 'reorder' != $action)
{
	redirect("listcontent.php");
}
else
{
	if ($action == 'delete')
	{
		?>
		<div class="pagecontainer">
			<p class="pageheader"><?php echo lang('deletecontent') ?></p><br />
		<?php
		$userid = get_userid();
		$access = check_permission($userid, 'Remove Pages');
		if ($access)
		{
			echo '<form method="post" action="multicontent.php">' . "\n";
			echo '<p>'.lang('deletepages').'</p><p>' . "\n";
			$idlist = array();
			foreach ($nodelist as $node)
			{
				echo $node->Name() . ' (' . $node->Hierarchy() . ')' . '<br />' . "\n";
				$idlist[] = $node->Id();
			}
			echo '</p>';

			echo '<div class="pageoverflow">
				<p class="pagetext">&nbsp;</p>
				<p class="pageinput">';

			echo '<input type="hidden" name="multiaction" value="dodelete" /><input type="hidden" name="idlist" value="'.implode(':', $idlist).'" />' . "\n";
			?>
								<input type="submit" name="confirm" value="<?php echo lang('submit') ?>"  class="pagebutton" onmouseover="this.className='pagebuttonhover'" onmouseout="this.className='pagebutton'" />
								<input type="submit" name="cancel" value="<?php echo lang('cancel') ?>" class="pagebutton" onmouseover="this.className='pagebuttonhover'" onmouseout="this.className='pagebutton'" />
							</p>
						</div>
					</form>
				</div>
			</div>
			<?php
		}
		else
		{
			redirect('listcontent.php');
		}
	}
	else if ($action == 'dodelete')
	{
		$userid = get_userid();
		$access = check_permission($userid, 'Remove Pages');
		if ($access)
		{
			foreach (array_reverse($nodelist) as $node)
			{

				$id = $node->Id();
				$title = $node->Name() . ' (' . $node->Hierarchy() . ')';
				//echo 'Deleting:' . $title . '<br />';
				$node->Delete();
				audit($id, $title, 'Deleted Content');
			}
			ContentManager::SetAllHierarchyPositions();
		}
		//include_once("footer.php");
		redirect("listcontent.php");
	}
	else if ($action == 'inactive')
	{
		$userid = get_userid();
		$modifyall = check_permission($userid, 'Modify Any Page');

		foreach ($nodelist as $node)
		{
			$permission = ($modifyall || check_ownership($userid, $node->Id()) || check_authorship($userid, $node->Id()));

			if ($permission)
			{
				if ($node->Active())
				{
					$node->SetActive(false);
					$node->Save();
				}
			}
		}
		redirect("listcontent.php");
	}
	else if ($action == 'active')
	{
		$userid = get_userid();
		$modifyall = check_permission($userid, 'Modify Any Page');

		foreach ($nodelist as $node)
		{
			$permission = ($modifyall || check_ownership($userid, $node->Id()) || check_authorship($userid, $node->Id()));

			if ($permission)
			{
				if (!$node->Active())
				{
					$node->SetActive(true);
					$node->Save();
				}
			}
		}
		redirect("listcontent.php");
	}
	else if ($action == 'reorder')
	{
	  if (FALSE == $reorder_error)
	    {
	      redirect('listcontent.php?message=pages_reordered');
	    }
	  else
	    {
	      redirect('listcontent.php?error='.$reorder_error);
	    }
	}
	else
	{
		redirect('listcontent.php');
	}
}

include_once("footer.php");

# vim:ts=4 sw=4 noet
?>
