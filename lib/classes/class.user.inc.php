<?php
#CMS - CMS Made Simple
#(c)2004 by Ted Kulp (tedkulp@users.sf.net)
#This project's homepage is: http://cmsmadesimple.org
#
#This program is free software; you can redistribute it and/or modify
#it under the terms of the GNU General Public License as published by
#the Free Software Foundation; either version 2 of the License, or
#(at your option) any later version.
#
#This program is distributed in the hope that it will be useful,
#BUT withOUT ANY WARRANTY; without even the implied warranty of
#MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#GNU General Public License for more details.
#You should have received a copy of the GNU General Public License
#along with this program; if not, write to the Free Software
#Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
#
#$Id$

/**
 * Generic user class.  This can be used for any logged in user or user related function.
 *
 * @since 0.6.1
 * @package CMS
 */
class User
{
	/**
	 * User ID
	 */
	var $id;

	/**
	 * Username
	 */
	var $username;

	/**
	 * Password (md5 encoded)
	 */
	var $password;

	/**
	 * First Name
	 */
	var $firstname;

	/**
	 * Last Name
	 */
	var $lastname;

	/**
	 * Email
	 */
	var $email;

	/**
	 * Active Flag
	 */
	var $active;

	/**
	 * Flag to tell whether user can login to admin panel
	 */
	var $adminaccess;

	/**
	 * Generic constructor.  Runs the SetInitialValues fuction.
	 */
	function User()
	{
		$this->SetInitialValues();
	}

	/**
	 * Sets object to some sane initial values
	 *
	 * @since 0.6.1
	 */
	function SetInitialValues()
	{
		$this->id = -1;
		$this->username = '';
		$this->password = '';
		$this->firstname = '';
		$this->lastname = '';
		$this->email = '';
		$this->active = false;
		$tihs->adminaccess = false;
	}

	/**
	 * Encrypts and sets password for the User
	 *
	 * @since 0.6.1
	 */
	function SetPassword($password)
	{
		$this->password = md5($password);
	}

	/**
	 * Saves the user to the database.  If no user_id is set, then a new record
	 * is created.  If the uset_id is set, then the record is updated to all values
	 * in the User object.
	 *
	 * @returns mixed If successful, true.  If it fails, false.
	 * @since 0.6.1
	 */
	function Save()
	{
		$result = false;
		
		if ($this->id > -1)
		{
			$result = UserOperations::UpdateUser($this);
		}
		else
		{
			$newid = UserOperations::InsertUser($this);
			if ($newid > -1)
			{
				$this->id = $newid;
				$result = true;
			}

		}

		return $result;
	}

	/**
	 * Delete the record for this user from the database and resets
	 * all values to their initial values.
	 *
	 * @returns mixed If successful, true.  If it fails, false.
	 * @since 0.6.1
	 */
	function Delete()
	{
		$result = false;

		if ($this->id > -1)
		{
			$result = UserOperations::DeleteUserByID($this->id);
			if ($result)
			{
				$this->SetInitialValues();
			}
		}

		return $result;
	}
}

/**
 * Class for doing user related functions.  Maybe of the User object functions
 * are just wrappers around these.
 *
 * @since 0.6.1
 * @package CMS
 */
class UserOperations
{
	/**
	 * Gets a list of all users
	 *
	 * @returns array An array of User objects
	 * @since 0.6.1
	 */
	function LoadUsers()
	{
		global $gCms;
		$db = &$gCms->db;

		$result = array();

		$query = "SELECT user_id, username, password, first_name, last_name, email, active, admin_access FROM ".cms_db_prefix()."users ORDER BY username";
		$dbresult = $db->Execute($query);

		if ($dbresult && $dbresult->RowCount() > 0)
		{
			while ($row = $dbresult->FetchRow())
			{
				$oneuser = new User();
				$oneuser->id = $row['user_id'];
				$oneuser->username = $row['username'];
				$oneuser->firstname = $row['first_name'];
				$oneuser->lastname = $row['last_name'];
				$oneuser->email = $row['email'];
				$oneuser->password = $row['password'];
				$oneuser->active = $row['active'];
				$oneuser->adminaccess = $row['admin_access'];
				array_push($result, $oneuser);
			}
		}

		return $result;
	}

	/**
	 * Loads a user by username.
	 *
	 * @param mixed $username Username to load
	 * @param mixed $password Password to check against
	 * @param mixed $activeonly Only load the user if they are active
	 * @param mixed $adminaccessonly Only load the user if they have admin access
	 *
	 * @returns mixed If successful, the filled User object.  If it fails, it returns false.
	 * @since 0.6.1
	 */
	function LoadUserByUsername($username, $password = '', $activeonly = true, $adminaccessonly = false)
	{
		$result = false;

		global $gCms;
		$db = &$gCms->db;

		$params = array();

		$query = "SELECT user_id FROM ".cms_db_prefix()."users WHERE username = ?";
		array_push($params, $username);

		if ($password != '')
		{
			$query .= " AND password = ?";
			array_push($params, md5($password));
		}

		if ($activeonly == true)
		{
			$query .= " AND active = 1";
		}

		if ($adminaccessonly == true)
		{
			$query .= " AND admin_access = 1";
		}

		$dbresult = $db->Execute($query, $params);

		if ($dbresult && $dbresult->RowCount() > 0)
		{
			$row = $dbresult->FetchRow();
			$id = $row['user_id'];
			$result = UserOperations::LoadUserByID($id);
		}

		return $result;
	}

	/**
	 * Loads a user by user id.
	 *
	 * @param mixed $id User id to load
	 *
	 * @returns mixed If successful, the filled User object.  If it fails, it returns false.
	 * @since 0.6.1
	 */
	function LoadUserByID($id)
	{
		$result = false;

		global $gCms;
		$db = &$gCms->db;

		$query = "SELECT username, password, active, first_name, last_name, admin_access, email FROM ".cms_db_prefix()."users WHERE user_id = ?";
		$dbresult = $db->Execute($query, array($id));

		if ($dbresult && $dbresult->RowCount() > 0)
		{
			while ($row = $dbresult->FetchRow())
			{
				$oneuser = new User();
				$oneuser->id = $id;
				$oneuser->username = $row['username'];
				$oneuser->password = $row['password'];
				$oneuser->firstname = $row['first_name'];
				$oneuser->lastname = $row['last_name'];
				$oneuser->email = $row['email'];
				$oneuser->adminaccess = $row['admin_access'];
				$oneuser->active = $row['active'];
				$result = $oneuser;
			}
		}

		return $result;
	}

	/**
	 * Saves a new user to the database.
	 *
	 * @param mixed $usre User object to save
	 *
	 * @returns mixed The new user id.  If it fails, it returns -1.
	 * @since 0.6.1
	 */
	function InsertUser($user)
	{
		$result = -1; 

		global $gCms;
		$db = &$gCms->db;

		$new_user_id = $db->GenID(cms_db_prefix()."users_seq");
		$query = "INSERT INTO ".cms_db_prefix()."users (user_id, username, password, active, first_name, last_name, email, admin_access, create_date, modified_date) VALUES (?,?,?,?,?,?,?,?,?,?)";
		#$dbresult = $db->Execute($query, array($new_user_id, $user->username, $user->password, $user->active, $user->firstname, $user->lastname, $user->email, $user->adminaccess, $db->DBTimeStamp(time()), $db->DBTimeStamp(time())));
		$dbresult = $db->Execute($query, array($new_user_id, $user->username, $user->password, $user->active, $user->firstname, $user->lastname, $user->email, 1, $db->DBTimeStamp(time()), $db->DBTimeStamp(time()))); //Force admin access on
		if ($dbresult !== false)
		{
			$result = $new_user_id;
		}

		return $result;
	}

	/**
	 * Updates an existing user in the database.
	 *
	 * @param mixed $user User object to save
	 *
	 * @returns mixed If successful, true.  If it fails, false.
	 * @since 0.6.1
	 */
	function UpdateUser($user)
	{
		$result = false; 

		global $gCms;
		$db = &$gCms->db;

		$query = "UPDATE ".cms_db_prefix()."users SET username = ?, password = ?, active = ?, modified_date = ?, first_name = ?, last_name = ?, email = ?, admin_access = ? WHERE user_id = ?";
		#$dbresult = $db->Execute($query, array($user->username, $user->password, $user->active, $db->DBTimeStamp(time()), $user->firstname, $user->lastname, $user->email, $user->adminaccess, $user->id));
		$dbresult = $db->Execute($query, array($user->username, $user->password, $user->active, $db->DBTimeStamp(time()), $user->firstname, $user->lastname, $user->email, 1, $user->id));
		if ($dbresult !== false)
		{
			$result = true;
		}

		return $result;
	}

	/**
	 * Deletes an existing user from the database.
	 *
	 * @param mixed $id Id of the user to delete
	 *
	 * @returns mixed If successful, true.  If it fails, false.
	 * @since 0.6.1
	 */
	function DeleteUserByID($id)
	{
		$result = false;

		global $gCms;
		$db = &$gCms->db;

		$query = "DELETE FROM ".cms_db_prefix()."additional_users where user_id = ?";
		$db->Execute($query, array($id));

		$query = "DELETE FROM ".cms_db_prefix()."users where user_id = ?";
		$dbresult = $db->Execute($query, array($id));

		if ($dbresult !== false)
		{
			$result = true;
		}

		return $result;
	}

	/**
	 * Show the number of pages the given user's id owns.
	 *
	 * @param mixed $id Id of the user to count
	 *
	 * @returns mixed Number of pages they own.  0 if any problems.
	 * @since 0.6.1
	 */
	function CountPageOwnershipByID($id)
	{
		$result = 0;

		global $gCms;
		$db = &$gCms->db;

		$query = "SELECT count(*) AS count FROM ".cms_db_prefix()."pages WHERE owner = ?";
		$dbresult = $db->Execute($query, array($id));

		if ($dbresult && $dbresult->RowCount() > 0)
		{
			$row = $dbresult->FetchRow();
			if (isset($row["count"]))
			{
				$result = $row["count"];
			}
		}

		return $result;
	}

	function GenerateDropdown($currentuserid = '')
	{
		$result = '';

		$allusers = @UserOperations::LoadUsers();

		if (count($allusers) > 0)
		{
			$result .= '<select name="ownerid">';
			foreach ($allusers as $oneuser)
			{
				$result .= '<option value="'.$oneuser->id.'"';
				if ($oneuser->id == $currentuserid)
				{
					$result .= ' selected="selected"';
				}
				$result .= '>'.$oneuser->username.'</option>';
			}
			$result .= '</select>';
		}

		return $result;
	}
}

# vim:ts=4 sw=4 noet
?>
