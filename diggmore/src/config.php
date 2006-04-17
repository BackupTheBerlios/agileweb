<?php



// DB
$DIGGCONFIG['db']['adapter'] = 'pdoMysql';
$DIGGCONFIG['db']['host'] = '127.0.0.1';
$DIGGCONFIG['db']['username'] = 'root';
$DIGGCONFIG['db']['password'] = '';
$DIGGCONFIG['db']['dbname'] = 'diggmore';

// front
$DIGGCONFIG['front']['sub_directory'] = 'diggmore';
$DIGGCONFIG['front']['default_front'] = 'common';
$DIGGCONFIG['front']['frontfile']['xml'] = 'xml';
$DIGGCONFIG['front']['frontfile']['api'] = 'api';
$DIGGCONFIG['front']['frontfile']['webservice'] = 'webservice';

// View Path

// Controller Path

// 


/**
 * 
 * DiggmoreConfig::instance()->get($index);
 *
 *
 */
class DiggmoreConfig implements ArrayAccess
{
	
	private static $_instance = null;

	private $_config;

	private function __construct() 
	{
		//
		global $DIGGCONFIG;
		$this->_config = $DIGGCONFIG;
	}

	function offsetExists($index) 
	{ 
		return isset($this->_config[$index]); 
	} 

	function offsetGet($index) { 
		return $this->_config[$index]; 
	} 

	function offsetSet($index, $newvalue) { 
		$this->_config[$index] = $newvalue; 
	} 

	function offsetUnset($index) { 
		unset($this->_config[$index]); 
	} 

	/**
	 *
	 * @return DiggmoreConfig
	 */
	public static function instance()
	{
		if (self::$_instance == null)
		{
			self::$_instance = new DiggmoreConfig();
		}

		return self::$_instance;
	}

	/**
	 *
	 * helper method
	 *
	 */
	public function get($index)
	{
		return $this->_config[$index]; 
	}

}



?>