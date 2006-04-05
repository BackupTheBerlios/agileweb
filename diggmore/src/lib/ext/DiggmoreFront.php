<?php

require_once 'Zend/Controller/Front.php'; 


class DiggmoreFront extends Zend_Controller_Front
{
	// do nothing now
    /**
     * Instance of DiggmoreFront
     * @var DiggmoreFront
     */
    static private $_instance = null;


	public function dispatch()
	{
		parent::dispatch();
	}

	/**
	 * Return one and only one instance of the DiggmoreFront object
	 *
	 * @return DiggmoreFront
	 */
	static public function getInstance()
	{
        if (!self::$_instance instanceof self) {
           self::$_instance = new self();
        }

        return self::$_instance;
	}

}

?>