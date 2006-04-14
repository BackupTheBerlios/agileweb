<?php
//  $Id: MemberDAOTest.php,v 1.1 2006/04/14 03:50:05 nio_xiao Exp $
require_once 'PHPUnit2/Framework/TestCase.php';

require_once dirname(__FILE__).'/_files/DbTestUtil.php';
require_once dirname(__FILE__).'/../../../src/lib/dao/DAOFactory.php';

/**
 * @package     DiggMore
 * @subpackage  DAOTest
 * @copyright   Copyright (c) 2006 PHP More. (http://www.phpmore.com)
 */
class MemberDAOTest extends PHPUnit2_Framework_TestCase
{
    protected $_dao = null;
    protected $_member_dao = null;
    protected $_member = array(
            'username' => 'test',
            'password' => '123456',
            'email'    => 'test@phpmore.com');

    protected function setUp()
    {
        $db_util = DbTestUtil::instance();
        $db_util->emptyTable('member');
        $this->_dao = DAOFactory::getDAOFactory(DAOFactory::DB);
        $this->_member_dao = $this->_dao->getMemberDAO();
    }

    public function testAdd()
    {        
        $userid = $this->_addMember();
        $this->assertEquals(1, intval($userid));
    }

    public function testGet()
    {        
        $this->_addMember();
        $members = $this->_member_dao->get();
        $this->assertEquals(1, count($members));
        $member = $members[0];
        $this->assertEquals(1, intval($member['userid']));
        $this->assertEquals($this->_member['username'], $member['username']);
        $this->assertEquals($this->_member['email'], $member['email']);
        $this->assertEquals(md5($this->_member['password']), $member['password']);
    }

    public function testGetByName()
    {
        $this->_addMember();
        $member = $this->_member_dao->getByName('test');
        $this->assertEquals(1, intval($member['userid']));
        $this->assertEquals($this->_member['username'], $member['username']);
        $this->assertEquals($this->_member['email'], $member['email']);
        $this->assertEquals(md5($this->_member['password']), $member['password']);
        $member = $this->_member_dao->getByName('test2');
        $this->assertNull($member);
    }

    public function testGetById()
    {
        $this->_addMember();
        $member = $this->_member_dao->getById(1);
        $this->assertEquals(1, intval($member['userid']));
        $this->assertEquals($this->_member['username'], $member['username']);
        $this->assertEquals($this->_member['email'], $member['email']);
        $this->assertEquals(md5($this->_member['password']), $member['password']);
        $member = $this->_member_dao->getByName(2);
        $this->assertNull($member);
    }

    public function testUpdate()
    {
        $this->_addMember();
        $member = array(
            'userid'   => 1,
            'password' => 'abcdefg',
            'email'    => 'xxx@phpmore.com');
        $retval = $this->_member_dao->update($member);
        $this->assertTrue($retval);
        $m = $this->_member_dao->getById($member['userid']);
        $this->assertEquals(1, intval($m['userid']));
        $this->assertEquals($member['email'], $m['email']);
        $this->assertEquals(md5($member['password']), $m['password']);
        unset($member['userid']);
        $retval = $this->_member_dao->update($member);
        $this->assertFalse($retval);
    }

    public function testDeleteById()
    {
        $this->_addMember();
        $retval = $this->_member_dao->deleteById('a');
        $this->assertFalse($retval);
        $retval = $this->_member_dao->deleteById(1);
        $this->assertTrue($retval);
        $member = $this->_member_dao->getById(1);
        $this->assertNull($member);
    }

    public function testDeleteByIds()
    {
        $this->_addMember();
        $member = array(
            'username' => 'Nio',
            'password' => 'abcdefg',
            'email'    => 'nio@phpmore.com');
        $this->_addMember($member);
        $ms = $this->_member_dao->get();
        $this->assertEquals(2, count($ms));
        $retval = $this->_member_dao->deleteByIds(array(1, 2));
        $this->assertTrue($retval);
        $ms = $this->_member_dao->get();
        $this->assertEquals(0, count($ms));
    }

    private function _addMember($member = null)
    {
        if (empty($member))
            $member = $this->_member;
        return $this->_member_dao->add($member);
    }

}   ///:~