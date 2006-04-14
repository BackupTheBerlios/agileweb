<?php
//  $Id: DAOFactory.php,v 1.1 2006/04/14 03:50:05 nio_xiao Exp $
require_once dirname(__FILE__).'/../DiggmoreException.php';

/**
 * @package     DiggMore
 * @subpackage  DAO
 * @copyright   Copyright (c) 2006 PHP More. (http://www.phpmore.com)
 */
abstract class DAOFactory
{
    /**
     * DAO types supported.
     * @const
     */
    const DB = 'Db';
    //const FILE = 'File';
    //const LDAP = 'LDAP';

    /**
     * Get MemberDAO.
     *
     * @return  MemberDAO
     */
    abstract public function getMemberDAO();

    /*  TODO:
     abstract public getPostDAO();
     abstract public getTagDAO(); 
     abstract public getVoteDAO();
    */

    /**
     * Get DAOFactory instance.
     *
     * @param   string  $which  One of DAOFactory types.
     * @return  DAOFactory
     * @throws  DiggMoreException
     */
    public static function getDAOFactory($which)
    {
        $class = $which.__CLASS__;
        if (class_exists($class))
            return new $class();
        $file = dirname(__FILE__).'/'.$class.'.php';
        if (!file_exists($file)) {
            throw new DiggmoreException("Could not find DAOFactory file: $file .");
        }
        require_once $file;
        if (!class_exists($class)) {
            throw new DiggmoreException("Could not find class '$class' in file $file .");
        }
        return new $class();
    }

    /**
     * Proxy for 'getXxxDAO' methods. It's automatic :)
     *
     * @param   string  $method Method name.
     * @return  MemberDAO|TagDAO|....|null
     * @throws  DiggmoreException
     */
    protected function _getDAO($method)
    {
        if (!preg_match('/^([a-zA-Z0-9]+)DAOFactory$/', get_class($this), $matches)) {
            throw new DiggmoreException('Class name "'.get_class($this).'" is invalid!');
        }
        $which = $matches[1];
        if (preg_match('/^get([a-zA-Z0-9]+DAO)$/', $method, $matches)) {
            $interface = $matches[1];
            $class = $which.$interface;
            if (class_exists($class)) {
                return new $class();
            }
            $file  = dirname(__FILE__).'/'.$class.'.php';
            if (!file_exists($file)) {
                throw new DiggmoreException("Could not find file: $file .");
            }
            require_once $file;
            if (!class_exists($class)) {
                throw new DiggmoreException("Could not find class '$class' in file $file .");
            }            
            return new $class();
        }
        return null;
    }
}   ///:~