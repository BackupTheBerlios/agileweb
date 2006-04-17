<?php

require_once(dirname(__FILE__)."/Action.php");

interface ResultType
{
	//
	public function process(Action $action);
}



?>