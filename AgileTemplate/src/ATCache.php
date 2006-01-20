<?


require_once(dirname(__FILE__)."/AgileTemplate.php");
require_once(dirname(__FILE__)."/ATFileLoader.php");

/**
 *
 * 
 * $Id: ATCache.php,v 1.1 2006/01/20 15:43:27 binzywu Exp $
 * 
 * Copyright (c) Binzy Wu
 *
 */
class ATCache
{

	// 
	var $mainloader;
	
	var $configuration;

	var $cachestorage;


	function ATCache(&$configuration, $tpl_loader = null, $cache_storage = null)
	{
		$this->configuration = $configuration;
		//
		if ($tpl_loader == null)
		{

			$this->mainloader = new ATFileLoader();
			$this->mainloader->basedir = $this->configuration->base_dir;
		}
		else
		{
			$class = 'AT'.$tpl_loader.'Loader';
			include_once(dirname(__FILE__)."/".$class.".php");
			$this->mainloader = new $class();
		}
	}

	function getTemplate($tpl_name, $encoding = "", $local = "")
	{
		//
		$source = $this->mainloader->getTemplateSource($tpl_name);

		// 这里会使用上CachedTemplate


		return new AgTemplate($tpl_name, $source, &$this->configuration, $encoding, $local);
	}

	function setConfiguration(&$configuration)
	{
		$this->configuration = &$configuration;
	}

	function setMainLoader(&$loader)
	{
		$this->mainloader = &$loader;
	}


}


?>