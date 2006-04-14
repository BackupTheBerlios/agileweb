<?php
//  $Id: MemberDAO.php,v 1.1 2006/04/14 03:50:05 nio_xiao Exp $

/**
 * @package     DiggMore
 * @subpackage  DAO
 * @copyright   Copyright (c) 2006 PHP More. (http://www.phpmore.com)
 */
interface MemberDAO
{
    /**
     * Get members list.
     *
     * @param   array   $cond   Condition array.
     * @param   integer $count
     * @param   integer $offset
     * @return  array
     */
    public function get($cond = null, $count = null, $offset = null);
    /**
     * @param   integer $id     user_id
     * @return  array
     */
    public function getById($id);
    /**
     * @param   integer $name   username
     * @return  array|null
     */
    public function getByName($name);
    /**
     * @param   array   $member An array contains user infos.
     * @return  integer Return userid.
     */
    public function add($member);
    /**
     * @param   array   $member An array contains user infos, and $members['user_id'] is pk.
     * @return  boolean
     */
    public function update($memeber);
    /**
     * @param   integer $id     user_id
     * @return  boolean
     */
    public function deleteById($id);
    /**
     * @param   array   $ids   An array of user_id.
     * @return  boolean
     */
    public function deleteByIds($ids);
}   ///:~