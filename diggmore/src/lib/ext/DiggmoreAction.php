<?php

require_once 'Zend/Controller/Action.php'; 


/**
 *
 * to be the role: Action Runner..... 
 *
 */
abstract class DiggmoreAction extends Zend_Controller_Action
{
	//
	// 
	function indexAction() 
	{
		$this->runAction();
	}

	private function runAction()
	{
		// action runner
		print_r($this);
	}

}


?>