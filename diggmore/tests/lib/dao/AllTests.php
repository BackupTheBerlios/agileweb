<?php
//  $Id: AllTests.php,v 1.1 2006/04/14 03:50:05 nio_xiao Exp $
//  cmd: PHPUnit2 DAOAllTests AllTests.php
if (!defined('PHPUnit2_MAIN_METHOD')) {
    define('PHPUnit2_MAIN_METHOD', 'DAOAllTests::main');
}

require_once 'PHPUnit2/Framework/TestSuite.php';
require_once 'PHPUnit2/TextUI/TestRunner.php';

require_once dirname(__FILE__).'/DAOFactoryTest.php';
require_once dirname(__FILE__).'/MemberDAOTest.php';

/**
 * @package     DiggMore
 * @subpackage  DAOTest
 * @copyright   Copyright (c) 2006 PHP More. (http://www.phpmore.com)
 */
class DAOAllTests
{
    public static function main()
    {
        PHPUnit2_TextUI_TestRunner::run(self::suite());
    }

    public static function suite()
    {
        $suite = new PHPUnit2_Framework_TestSuite('DiggMore - DAO');

        $suite->addTestSuite('DAOFactoryTest');
        $suite->addTestSuite('MemberDAOTest');

        return $suite;
    }
}

if (PHPUnit2_MAIN_METHOD == 'DAOAllTests::main') {
    DAOAllTests::main();
}
