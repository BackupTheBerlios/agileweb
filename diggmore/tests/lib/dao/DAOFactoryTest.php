<?php
//  $Id: DAOFactoryTest.php,v 1.1 2006/04/14 03:50:05 nio_xiao Exp $
require_once 'PHPUnit2/Framework/TestCase.php';
require_once dirname(__FILE__).'/../../../src/lib/dao/DAOFactory.php';

/**
 * @package     DiggMore
 * @subpackage  DAOTest
 * @copyright   Copyright (c) 2006 PHP More. (http://www.phpmore.com)
 */
class DAOFactoryTest extends PHPUnit2_Framework_TestCase
{
    protected $_dao = null;

    protected function setUp()
    {
        $this->_dao = DAOFactory::getDAOFactory(DAOFactory::DB);  
    }

    public function testGetDAOFactory()
    {        
        $this->assertType('DbDAOFactory', $this->_dao);
    }

    public function testGetMemberDAO()
    {
        $member_dao = $this->_dao->getMemberDAO();
        $this->assertType('MemberDAO', $member_dao);
    }
}   ///:~