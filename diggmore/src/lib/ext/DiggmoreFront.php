<?php

//require_once 'Zend/Controller/Front.php'; 


class DiggmoreFront
{
	// do nothing now
    /**
     * Instance of DiggmoreFront
     * @var DiggmoreFront
     */
    static private $_instance = null;


	public function dispatch()
	{

		include_once($this->getFrontFile());

	}

	private function getFrontFile()
	{
		//
        $path = $_SERVER['REQUEST_URI'];
        if (strstr($path, '?')) {
            $path = substr($path, 0, strpos($path, '?'));
        }
        $path = explode('/', trim($path, '/'));

		$front_config = DiggmoreConfig::instance()->get('front');

		if (isset($front_config['frontfile'][$path[0]]))
		{
			//
			$front = $front_config['frontfile'][$path[0]];
		}
		else
		{
			$front = $front_config['default_front'];
		}

		return $front_file = DIGGMORE_ROOT.'/_'.$front.'.php';
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