<?php


require_once(dirname(__FILE__)."/ATCache.php");


/**
 * Copyright (c) AgileSoft.cn
 * @author Binzy
 * @package AgileTemplate
 * Configuration
 * <example>
 * $config = new ATConfiguration();
 * $config->setDirectoryForTemplateLoading("/wwwroot/tpl");
 * $tpl = $config->getTemplate("agilesoft.php");
 * $root = array("person"=>"Binzy Wu");
 * $out = $tpl->process();
 * print $out;
 * </example>
 *
 */
class ATConfiguration
{

	var $cache;
	var $encodingMap = array();
	var $base_dir;

	/**
	 *
	 * @access public
	 *
	 */
	function ATConfiguration($loader = '')
	{
		//
		$this->_init();
	}

	/**
	 *
	 * @access private
	 *
	 */
	function _init()
	{
		$this->_loadBuiltinEncodingMap();
		$this->base_dir = "./";
		$this->cache = new ATCache(&$this);
	}

	/**
	 *
	 * @access public
	 * @param string $dir the dicrectory for the templates loading
	 *
	 */
	function setDirectoryForTemplateLoading($dir)
	{
		if (!is_dir($dir))
		{
			trigger_error ("Dir $dir not exists!", E_USER_ERROR);
		}
		else
		{
			//
			$this->base_dir = $dir;
			$this->cache = new ATCache(&$this);
		}
	}

	/**
	 *
	 * @access public
	 * @param string $tpl_name the template name
	 * @param string encoding
	 * @param string the local
	 * @return AgileTemplate
	 *
	 */
	function getTemplate($tpl_name, $encoding = "", $local = "")
	{
		//
		return $this->cache->getTemplate($tpl_name, $encoding, $local);
	}


	/**
	 *
	 * @access private
	 *
	 */
	function _loadBuiltinEncodingMap()
	{
        $this->encodingMap["ar"] = "ISO-8859-6";
        $this->encodingMap["be"] = "ISO-8859-5";
        $this->encodingMap["bg"] = "ISO-8859-5";
        $this->encodingMap["ca"] = "ISO-8859-1";
        $this->encodingMap["cs"] = "ISO-8859-2";
        $this->encodingMap["da"] = "ISO-8859-1";
        $this->encodingMap["de"] = "ISO-8859-1";
        $this->encodingMap["el"] = "ISO-8859-7";
        $this->encodingMap["en"] = "ISO-8859-1";
        $this->encodingMap["es"] = "ISO-8859-1";
        $this->encodingMap["et"] = "ISO-8859-1";
        $this->encodingMap["fi"] = "ISO-8859-1";
        $this->encodingMap["fr"] = "ISO-8859-1";
        $this->encodingMap["hr"] = "ISO-8859-2";
        $this->encodingMap["hu"] = "ISO-8859-2";
        $this->encodingMap["is"] = "ISO-8859-1";
        $this->encodingMap["it"] = "ISO-8859-1";
        $this->encodingMap["iw"] = "ISO-8859-8";
        $this->encodingMap["ja"] = "Shift_JIS";
        $this->encodingMap["ko"] = "EUC-KR";    
        $this->encodingMap["lt"] = "ISO-8859-2";
        $this->encodingMap["lv"] = "ISO-8859-2";
        $this->encodingMap["mk"] = "ISO-8859-5";
        $this->encodingMap["nl"] = "ISO-8859-1";
        $this->encodingMap["no"] = "ISO-8859-1";
        $this->encodingMap["pl"] = "ISO-8859-2";
        $this->encodingMap["pt"] = "ISO-8859-1";
        $this->encodingMap["ro"] = "ISO-8859-2";
        $this->encodingMap["ru"] = "ISO-8859-5";
        $this->encodingMap["sh"] = "ISO-8859-5";
        $this->encodingMap["sk"] = "ISO-8859-2";
        $this->encodingMap["sl"] = "ISO-8859-2";
        $this->encodingMap["sq"] = "ISO-8859-2";
        $this->encodingMap["sr"] = "ISO-8859-5";
        $this->encodingMap["sv"] = "ISO-8859-1";
        $this->encodingMap["tr"] = "ISO-8859-9";
        $this->encodingMap["uk"] = "ISO-8859-5";
        $this->encodingMap["zh"] = "GB2312";
        $this->encodingMap["zh_tw"] = "Big5";

	}
}


?>