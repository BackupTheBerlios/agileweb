<?php
//  $Id: DbDAO.php,v 1.1 2006/04/14 03:50:05 nio_xiao Exp $
require_once 'Zend.php';
require_once 'Zend/Db/Inflector.php';
//require_once 'Zend/Db/Table.php';

Zend::loadClass('Zend_Db');

//  Database config file. 
//  If you want to test DAO using your own database, you can define this constant before requiring this file.
if (!defined('DIGGMORE_DB_CONFIG'))
    define('DIGGMORE_DB_CONFIG', dirname(__FILE__).'/../../config.php');

/**
 * @package     DiggMore
 * @subpackage  DAO
 * @copyright   Copyright (c) 2006 PHP More. (http://www.phpmore.com)
 */
class DbDAO
{
    /**
     * @var Zend_Db_Adapter_Abstract
     */
    protected $_db = null;
    /**
     * Default table name.
     * @var string
     */
    protected $_table = null;

    /**
     * Constructor.
     */
    public function __construct()
    {
        global $DIGGCONFIG;

        require_once DIGGMORE_DB_CONFIG;
        //$config   = DiggmoreConfig::instance();
        $adapter  = $DIGGCONFIG['db']['adapter'];
        $params   = $DIGGCONFIG['db'];
        $this->_db = Zend_Db::factory($adapter, $params);
        //Zend_Db_Table::setDefaultAdapter($this->_db);
        if (empty($this->_table)) { //Init default table name.
            $tbl = preg_replace('/^Db([a-zA-Z0-9]+)DAO$/', '\1', get_class($this));
            $inflector   = new Zend_Db_Inflector();
            $this->_table = $inflector->underscore($tbl);
        }
    }

    /**
     * DB select query.
     *
     * @param   string|array    $cond
     * @param   string          $order
     * @param   integer         $count
     * @param   integer         $offset
     * @param   string|array    $cols
     * @return  array
     */
    protected function _select($cond = null, $order = null, $count = null, $offset = null, $cols = null)
    {
        $select = $this->_db->select();
        if (empty($cols))
            $cols = '*';
        $select->from($this->_table, $cols);
        if ($cond) {
            if (is_array($cond)) {
                foreach ($cond as $field => $value)
                    $select->where("$field = ?", $value);
            } else {
                $select->where(string($cond));
            }
        }   //end if
        $select->order($order);
        $select->limit($count, $offset);
        return $this->_db->fetchAll($select);
    }

    /**
     * @param   string          $field
     * @param   mixed           $value
     * @param   string|array    $cols
     * @return  array
     */
    protected function _getByField($field, $value, $cols = null)
    {
        return $this->_select(array($field=>$value), null, null, null, $cols);
    }
}   ///:~