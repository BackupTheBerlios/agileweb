<?php

require_once(dirname(__FILE__)."/ResultType.php");


class ZendViewResultType implements ResultType
{

	public function process(Action $action, $result)
	{
		//
		if (!isset($action->result))
		{
			// error
		}
		else
		{
			// process
		}
	}
}


?>