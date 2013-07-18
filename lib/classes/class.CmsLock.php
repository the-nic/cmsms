<?php
#BEGIN_LICENSE
#-------------------------------------------------------------------------
# Class: cms_objlock (c) 2013 by Robert Campbell 
#         (calguy1000@cmsmadesimple.org)
#  A class for managing locks on various objects.
# 
#-------------------------------------------------------------------------
# CMS - CMS Made Simple is (c) 2004 by Ted Kulp (wishy@cmsmadesimple.org)
# This project's homepage is: http://www.cmsmadesimple.org
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
 * An exception indicating an error creating a lock
 * 
 * @package CMS
 * @author Robert Campbell (calguy1000@cmsmadesimple.org)
 * @since 2.0
 */
class CmsLockException extends CmsException {}

/**
 * An exception indicating a uid mismatch wrt a lock (person operating on the lock is not the owner)
 * 
 * @package CMS
 * @author Robert Campbell (calguy1000@cmsmadesimple.org)
 * @since 2.0
 */
class CmsLockOwnerException extends CmsLockException {}

/**
 * An exception indicating an error removing a lock
 * 
 * @package CMS
 * @author Robert Campbell (calguy1000@cmsmadesimple.org)
 * @since 2.0
 */
class CmsUnLockException extends CmsLockException {}

/**
 * An exception indicating an error loading or finding a lock
 * 
 * @package CMS
 * @author Robert Campbell (calguy1000@cmsmadesimple.org)
 * @since 2.0
 */
class CmsNoLockException extends CmsLockException {}

/**
 * A simple class represeinting a lock on a logical object in CMSMS.
 */
final class CmsLock implements ArrayAccess
{
  const LOCK_TABLE = 'locks';
  private $_data = array();
  private $_dirty = FALSE;
  private static $_keys = array('id','type','oid','uid','created','modified','lifetime','expires');

  public function __construct($type,$oid,$lifetime = null)
  {
    $type = trim($type);
    $oid = trim($oid);
    if( $type == '' ) throw new CmsInvalidDataException('error_locktypeempty');

    $this->_data['type'] = $type;
    $this->_data['oid'] = $oid;
    $this->_data['uid'] = get_userid(FALSE);
    if( $lifetime == null ) $lifetime = cms_siteprefs::get('lock_timeout',60);
    $this->_data['lifetime'] = max(1,(int)$lifetime);
    $this->_dirty = TRUE;
  }

  public function OffsetGet($key)
  {
    switch( $key ) {
    case 'type':
    case 'oid':
    case 'uid':
      return $this->_data[$key];

    case 'id':
    case 'created':
    case 'modified':
    case 'lifetime':
    case 'expires':
      if( !isset($this->_data[$key]) ) throw new CmsLogicException('error_locknotsaved');
      return $this->_data[$key];
    }
  }

  public function OffsetSet($key,$value)
  {
    switch( $key ) {
    case 'type':
    case 'oid':
      if( isset($this->_data['id']) ) {
	throw new CmsInvalidDataException('error_objectcantsetthis',$key);
      }
      $this->_data[$key] = trim($value);
      $this->_dirty = TRUE;
      break;

    case 'uid':
    case 'id':
    case 'created':
    case 'modified':
    case 'expires':
      // can't set this.
      throw new CmsInvalidDataException('error_objectcantsetthis',$key);

    case 'lifetime':
      $this->_data[$key] = max(1,(int)$value);
      $this->_dirty = TRUE;
      break;
    }
  }

  public function OffsetExists($key)
  {
    return isset($this->_data[$key]);
  }

  public function OffsetUnset($key)
  {
    // do nothing.
  }

  public function expired()
  {
    if( !isset($this->_data['expires']) ) return FALSE;
    if( $this->_data['expires'] < time() ) return TRUE;
    return FALSE;
  }

  public function save()
  {
    if( !$this->_dirty ) return;

    $db = cmsms()->GetDb();
    $dbr = null;
    $this->_data['expires'] = time()+$this->_data['lifetime']*60;
    if( !isset($this->_data['id']) ) {
      // insert
      $query = 'INSERT INTO '.cms_db_prefix().self::LOCK_TABLE.'
                (type,oid,uid,created,modified,lifetime,expires)
                VALUES (?,?,?,?,?,?,?)';
      $dbr = $db->Execute($query,array($this->_data['type'], $this->_data['oid'], $this->_data['uid'],
				       time(), time(), $this->_data['lifetime'], $this->_data['expires']));
      $this->_data['id'] = $db->Insert_ID();
    }
    else {
      // update
      $query = 'UPDATE '.cms_db_prefix().self::LOCK_TABLE.' SET lifetime = ?, expires = ?, modified = ?
                WHERE type = ? AND oid = ? AND uid = ? AND id = ?';
      $dbr = $db->Execute($query,array($this->_data['lifetime'],$this->_data['expires'],time(),
				       $this->_data['type'],$this->_data['oid'],$this->_data['uid'],$this->_data['id']));
    }
    if( !$dbr ) throw new CmsSqlErrorException('Problem creating/updating lock record',null,$db->ErrorMsg());
    $this->_dirty = FALSE;
  }

  public static function &from_row($row)
  {
    $obj = new CmsLock($row['type'],$row['oid'],$row['lifetime']);
    $obj->_dirty = TRUE;
    foreach( $row as $key => $val ) {
      $obj->_data[$key] = $val;
    }
    return $obj;
  }

  public function delete()
  {
    if( !isset($this->_data['id']) || $this->_data['id'] < 1 ) {
      throw new CmsLogicException('Attempt to delete a lock when it has yet to be saved');
    }

    $db = cmsms()->GetDb();
    $query = 'DELETE FROM '.cms_db_prefix().self::LOCK_TABLE.' WHERE id = ?';
    $db->Execute($query,array($this->_data['id']));
    unset($this->_data['id']);
    $this->_dirty = TRUE;
  }

  public static function &load_by_id($lock_id,$type,$oid,$uid = NULL)
  {
    $query = 'SELECT * FROM '.cms_db_prefix().self::LOCK_TABLE.' WHERE id = ? AND type = ? AND oid = ?';
    $db = cmsms()->GetDb();
    $parms = array($lock_id,$type,$oid);
    if( $uid > 0 ) {
      $query .= ' AND uid = ?';
      $parms[] = $uid;
    }
    $row = $db->GetRow($query,$parms);
    if( !is_array($row) || count($row) == 0 ) throw new CmsNoLockException('No lock exists for this object','',array($type,$uid));

    return self::from_row($row);
  }

  public static function &load($type,$oid,$uid = null)
  {
    $query = 'SELECT * FROM '.cms_db_prefix().self::LOCK_TABLE.' WHERE type = ? AND oid = ?';
    $db = cmsms()->GetDb();
    $parms = array($type,$oid);
    if( $uid > 0 ) {
      $query .= ' AND uid = ?';
      $parms[] = $uid;
    }
    $row = $db->GetRow($query,$parms);
    if( !is_array($row) || count($row) == 0 ) throw new CmsNoLockException('No lock exists for this object','',array($type,$uid));

    return self::from_row($row);
  }
} // end of clsss

#
# EOF
#
?>