<?php
//  $Id: DbMemberDAO.php,v 1.1 2006/04/14 03:50:05 nio_xiao Exp $
require_once dirname(__FILE__).'/DbDAO.php';
require_once dirname(__FILE__).'/MemberDAO.php';

/**
 * @package     DiggMore
 * @subpackage  DAO
 * @copyright   Copyright (c) 2006 PHP More. (http://www.phpmore.com)
 */
class DbMemberDAO extends DbDAO implements MemberDAO
{
    /**
     * Get members list.
     *
     * @param   array   $cond   Condition array.
     * @param   integer $count
     * @param   integer $offset
     * @return  array
     */
    public function get($cond = null, $count = null, $offset = null)
    {
        return $this->_select($cond, 'userid DESC', $count, $offset);
    }

    /**
     * Get member info by userid.
     *
     * @param   integer $id     userid
     * @return  array
     */
    public function getById($id)
    {
        $rows = $this->_getByField('userid', $id);
        return isset($rows[0]) ? $rows[0] : null;
    }

    /**
     * @param   integer $name   username
     * @return  array
     */
    public function getByName($name)
    {
        $rows = $this->_getByField('username', $name);
        return isset($rows[0]) ? $rows[0] : null;
    }

    /**
     * @param   array   $member An array contains user infos.
     * @return  integer Return userid.
     */
    public function add($member)
    {
        //  TODO: Move to BO ??
        $member['password'] = md5($member['password']);
        if (empty($member['regdate'])) {
            $member['regdate'] = time();
        }
        if (empty($member['regip']) && isset($_SERVER['REMOTE_ADDR'])) {
            $member['regip'] = $_SERVER['REMOTE_ADDR']; //TODO: Add detect $_SERVER['HTTP_X_FORWARDED_FOR'].
        }
        if (empty($member['showname'])) {
            $member['showname'] = $member['username'];
        }
        $this->_db->insert($this->_table, $member);
        return $this->_db->lastInsertId();
    }

    /**
     * @param   array   $member An array contains user infos, and $members['userid'] is pk.
     * @return  boolean
     */
    public function update($member)
    {
        if (empty($member['userid']))
            return false;
        if (isset($member['password']))
            $member['password'] = md5($member['password']);
        $where = $this->_db->quoteInto('userid = ?', $member['userid']);
        unset($member['userid']);
        $this->_db->update($this->_table, $member, $where);
        return true;
    }

    /**
     * @param   integer $id     user_id
     * @return  boolean
     */
    public function deleteById($id)
    {
        if (!is_int($id))
            return false;
        $where = $this->_db->quoteInto('userid = ?', $id);
        $this->_db->delete($this->_table, $where);
        return true;
    }

    /**
     * Delete batch members by members' id.
     *
     * @param   array   $ids   An array of user_id.
     * @return  boolean
     */
    public function deleteByIds($ids)
    {
        if (!is_array($ids))
            return false;
        $where = $this->_db->quoteInto('userid IN (?)', $ids);
        $this->_db->delete($this->_table, $where);
        return true;
    }

}   ///:~