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

/**
 * This page is both the interface of the CSS editing, and used for actually
 * updating the CSS in the DB. The first part checks that all parameters are
 * valids, and then insert into the DB and redirect.
 *
 * The second part show the form to edit the CSS
 *
 * It takes one argument when called externally :
 * - $css_id : the id of the css to edit
 *
 * @since	0.6
 * @author	calexico
 */


$CMS_ADMIN_PAGE=1;

require_once("../include.php");

check_login();

#******************************************************************************
# Definition of global vars
#******************************************************************************

# this var is used to store any error that may occur
$error = "";

#******************************************************************************
# we get the parameters
#******************************************************************************

# the new name of the css
$css_name = "";
if (isset($_POST["css_name"])) $css_name = $_POST["css_name"];

# the old name of the css (if it has changed, we'll have to check that the new
# one is not already used.&
$orig_css_name = "";
if (isset($_POST["orig_css_name"])) $orig_css_name = $_POST["orig_css_name"];

# the content of the CSS
$css_text = "";
if (isset($_POST["css_text"])) $css_text = $_POST["css_text"];

# the ID of the CSS
$css_id = -1;
if (isset($_POST["css_id"])) $css_id = $_POST["css_id"];
else if (isset($_GET["css_id"])) $css_id = $_GET["css_id"];

# if the form has beeen cancelled, we redirect
if (isset($_POST["cancel"]))
{
	redirect("listcss.php");
	return;
}

#******************************************************************************
# first, checking the user's permission
#******************************************************************************
$userid = get_userid();
$access = check_permission($userid, 'Modify CSS');

if ($access)
{

	# the user has submitted the form
	if (isset($_POST["editcss"]))
	{
		$validinfo = true;

		# check if the name is valid
		if ("" == $css_name)
		{
			$error .= "<li>".lang('nofieldgiven', array(lang('name')))."</li>";
			$validinfo = false;
		}

		# then check if new name is in use or not
		else if ($css_name != $orig_css_name)
		{
			$query = "SELECT css_id from ".cms_db_prefix()."css WHERE css_name = " . $db->qstr($css_name);
			$result = $db->Execute($query);

			if ($result && $result->RowCount() > 0)
			{
				$error .= "<li>".lang('cssalreadyused')."</li>";
				$validinfo = false;
			}
		}

		# then check if css has content
		if ("" == $css_text)
		{
			$error .= "<li>".lang('nofieldgiven', array(lang('content')))."</li>";
			$validinfo = false;
		}

#******************************************************************************
# everything looks ok, we can update the CSS
#******************************************************************************
		if ($validinfo)
		{
			$query = "UPDATE ".cms_db_prefix()."css SET css_name = ".$db->qstr($css_name).", css_text = ".$db->qstr($css_text).", modified_date = '".$db->DBTimeStamp(time())."' WHERE css_id = $css_id";
			$result = $db->Execute($query);

			if ($result)
			{
				audit($css_id, $css_name, 'Edited CSS');

				# we now have to check which templates are associated with this CSS and update their modified date.
				$cssquery = "SELECT assoc_to_id FROM ".cms_db_prefix()."css_assoc
					WHERE	assoc_type		= 'template'
					AND		assoc_css_id	= '$css_id'";
				$cssresult = $db->Execute($cssquery);

				if ($cssresult)
				{
					# now updating templates
					while ($line = $cssresult->FetchRow())
					{
						$query = "UPDATE ".cms_db_prefix()."templates SET modified_date = '".$db->DBTimeStamp(time())."' 
							WHERE template_id = '".$line["assoc_to_id"]."'";
						$result = $db->Execute($query);

						if (FALSE == $result)
						{
							$error .= "<li>".lang('errorupdatingtemplate')."</li>";
						}
					}
				}
					
				redirect("listcss.php");
				return;
			}
			else
			{
				$error .= "<li>".lang('errorupdatingcss')."</li>";
			}
		} # end of updating
	} # end of the user has submitted
	
	# we've been called with a css id, we get it to show it on the form
	else if (-1 != $css_id)
	{

		# we get the CSS in the DB
		$query = "SELECT * from ".cms_db_prefix()."css WHERE css_id = " . $css_id;
		$result = $db->Execute($query);

		# we put the content in vars
		if ($result && $result->RowCount() > 0)
		{
			$row = $result->FetchRow();
			$css_name		= $row["css_name"];
			$orig_css_name	= $row["css_name"];
			$css_text		= $row["css_text"];
		}
		else
		{
			$error .= "<li>".lang('errorretrievingcss')."</li>";
		}
	} # end of getting css
} # end of has access

include_once("header.php");

# if the user has no acess, we display an error
if (!$access)
{
	print "<h3>".lang('noaccessto', array(lang('editcss')))."</h3>";
}

# else, we can display the form
else
{
	# first displaying erros if any
	if ($error != "")
	{
		echo "<ul class=\"error\">".$error."</ul>";
	}
?>

<form method="post" action="editcss.php" <?php if(isset($use_javasyntax) && $use_javasyntax){echo 'onSubmit="textarea_submit(this, \'content,stylesheet\');"';} ?>>

<div class="adminform">

<h3><?php echo lang('editcss')?></h3>

<table width="100%" border="0">

	<tr>
		<td width="100">*<?php echo lang('name')?>:</td>
		<td>
			<input type="text" name="css_name" maxlength="25" value="<?php echo $css_name?>" />
			<input type="hidden" name="orig_css_name" value="<?php echo $orig_css_name?>" />
		</td>
	</tr>
	<tr>
		<td>*<?php echo lang('content')?>:</td>
		<td><?php echo textarea_highlight((isset($use_javasyntax)?$use_javasyntax:false), $css_text, "css_text"); ?></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<input type="hidden" name="css_id" value="<?php echo $css_id?>" />
			<input type="hidden" name="editcss" value="true" />
			<input type="submit" value="<?php echo lang('submit')?>" class="button" onmouseover="this.className='buttonHover'" onmouseout="this.className='button'" />
			<input type="submit" name="cancel" value="<?php echo lang('cancel')?>" class="button" onmouseover="this.className='buttonHover'" onmouseout="this.className='button'" />
		</td>
	</tr>

</table>

</div>

</form>

<?php

} # end of displaying form

include_once("footer.php");

# vim:ts=4 sw=4 noet
?>
