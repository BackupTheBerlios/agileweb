<?php
//  $Id: DbTestUtil.php,v 1.1 2006/04/14 03:50:05 nio_xiao Exp $
define('DIGGMORE_DB_CONFIG', dirname(__FILE__).'/config.php');  //using my database

/**
 * @package     DiggMore
 * @subpackage  DAOTest
 * @copyright   Copyright (c) 2006 PHP More. (http://www.phpmore.com)
 */
class DbTestUtil
{
    private static $_instance = null;

    protected $_db = null;

    private function __construct()
    {
        global $DIGGCONFIG;

        require_once DIGGMORE_DB_CONFIG;
        $adapter  = $DIGGCONFIG['db']['adapter'];
        $params   = $DIGGCONFIG['db'];
        $this->_db = Zend_Db::factory($adapter, $params);
    }

    public function instance()
    {
        if (!self::$_instance) {
            self::$_instance = new self;
        }
        return self::$_instance;
    }

    public function emptyTable($table)
    {
        $sql = "TRUNCATE $table";
        $this->_db->query($sql);
    }
}