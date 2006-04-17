<?php


// $Id: index.php,v 1.6 2006/04/17 16:30:05 binzywu Exp $
define(DIGGMORE_ROOT, dirname(__FILE__));


require_once 'Zend.php';  
require_once 'Zend/Controller/Front.php';
require_once 'Zend/Controller/Action.php'; 
require_once 'Zend/Controller/Dispatcher.php'; 

/*

configuration file

*/
require_once(dirname(__FILE__)."/config.php");

/**

Diggmore Front file

 */
require_once 'lib/ext/DiggmoreFront.php';  
require_once 'lib/ext/DiggmoreAction.php';  

$front = DiggmoreFront::getInstance(); 
$front->dispatch(); 

?>