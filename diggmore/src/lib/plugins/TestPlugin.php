<?

require_once("Zend/Controller/Plugin/Abstract.php");

class TestPlugin extends Zend_Controller_Plugin_Abstract
{
	/**
	 * Called before Zend_Controller_Front begins evaluating the
	 * request against its routes.
	 *
	 * @return void
	 */
	public function routeStartup()
	{
		print 'i am test plugin';
	}

	/**
	 * Called after Zend_Controller_Router exits.
	 *
	 * This callback allows for proxy or filter behavior.  The
	 * $action must be returned for the Zend_Controller_Dispatcher_Token
	 * to enter the dispatch loop.  To abort before the dispatch loop is
	 * entered, return FALSE.
	 *
	 * @param  Zend_Controller_Dispatcher_Token|boolean $action
	 * @return Zend_Controller_Dispatcher_Token|boolean
	 */
	public function routeShutdown($action)
	{
	    return $action;
	}

	/**
	 * Called before Zend_Controller_Front enters its dispatch loop.
	 * During the dispatch loop.
	 *
	 * This callback allows for proxy or filter behavior.  The
	 * $action must be returned for the Zend_Controller_Dispatcher_Token
	 * to enter the dispatch loop.  To abort before the dispatch loop is
	 * entered, return FALSE.
	 *
	 * @param  Zend_Controller_Dispatcher_Token|boolean $action
	 * @return Zend_Controller_Dispatcher_Token|boolean
	 */
	public function dispatchLoopStartup($action)
	{
	    return $action;
	}

	/**
	 * Called before an action is dispatched by Zend_Controller_Dispatcher.
	 *
	 * This callback allows for proxy or filter behavior.  The
	 * $action must be returned for the Zend_Controller_Dispatcher_Token
	 * to be dispatched.  To abort the dispatch, return FALSE.
	 *
	 * @param  Zend_Controller_Dispatcher_Token|boolean $action
	 * @return Zend_Controller_Dispatcher_Token|boolean
	 */
	public function preDispatch($action)
	{
	    return $action;
	}

	/**
	 * Called after an action is dispatched by Zend_Controller_Dispatcher.
	 *
	 * This callback allows for proxy or filter behavior.  The
	 * $action must be returned, otherwise the next action
	 * will not be dispatched.  To exit the dispatch loop without
	 * dispatching the action, return FALSE.
	 *
	 * @param  Zend_Controller_Dispatcher_Token|boolean $action
	 * @return Zend_Controller_Dispatcher_Token|boolean
	 */
	public function postDispatch($action)
	{
	    return $action;
	}

	/**
	 * Called before Zend_Controller_Front exists its dispatch loop.
	 *
	 * @return void
	 */
	public function dispatchLoopShutdown()
	{}

}

?>