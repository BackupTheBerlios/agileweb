<?php

/** Zend_Controller_Router_Interface */ 
require_once 'Zend/Controller/Router/Interface.php'; 

/** Zend_Controller_Dispatcher_Interface */ 
require_once 'Zend/Controller/Dispatcher/Interface.php'; 

/** Zend_Controller_Router_Exception */ 
require_once 'Zend/Controller/Router/Exception.php'; 

/** Zend_Controller_Dispatcher_Action */ 
require_once 'Zend/Controller/Dispatcher/Interface.php'; 



class DiggmoreRouter implements Zend_Controller_Router_Interface
{
	//

	public function route(Zend_Controller_Dispatcher_Interface $dispatcher)
	{
	}

}

?>