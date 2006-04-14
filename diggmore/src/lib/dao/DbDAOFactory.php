<?php
//  $Id: DbDAOFactory.php,v 1.1 2006/04/14 03:50:05 nio_xiao Exp $
require_once 'Zend.php';
require_once dirname(__FILE__).'/../DiggmoreException.php';
require_once dirname(__FILE__).'/DAOFactory.php';

Zend::loadClass('Zend_Db');

/**
 * @package     DiggMore
 * @subpackage  DAO
 * @copyright   Copyright (c) 2006 PHP More. (http://www.phpmore.com)
 */
class DbDAOFactory extends DAOFactory
{
    public function getMemberDAO()
    {
        return $this->_getDAO(__FUNCTION__);
    }

}   ///:~