<?php

require_once(dirname(__FILE__)."/../lib/ext/DiggmoreController.php");

class UserController extends DiggmoreController
{

	public function UserController()
	{
		parent::DiggmoreController();
	}

	public function indexAction()
	{
		//
	}

	public function policyAction()
	{
		$view = Zend::registry("view");
		$view->title = "User Registration";
		print $view->render('user/policy.php');
	}

	public function regformAction()
	{
		// show reg form
		$view = Zend::registry("view");
		$view->title = "User Registration";
		print $view->render('user/regform.php');
	}

	public function regAction()
	{
		// register the user
		
	}



}


?>