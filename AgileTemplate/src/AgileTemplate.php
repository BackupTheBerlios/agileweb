<?

require_once(dirname(__FILE__)."/ATBuiltIn.php");
/**
 * Copyright (c) AgileSoft.cn
 * @author Binzy
 * @package AgileTemplate
 * The template class
 *
 */
class AgileTemplate
{

	var $source;
	var $name;
	var $encoding;

	var $content = "";

	/**
	 * construction
	 * @access public
	 * @param string $name The name of the templates
	 * @param string $source the template source
	 * @param ATConfiguration $cfg the agile template Configuration
	 * @param string $encoding, such as utf-8
	 * @param string $local
	 */
	function AgileTemplate($name, $source, &$cfg, $encoding = "", $local = "")
	{
		//
		$this->source = $source;
		$this->name = $name;
		$this->encoding = $encoding;
	}

	/**
	 * @access public
	 * @param array $root, the data root
	 * @return string the processed template
	 *
	 */
	function process($root = array())
	{
		//process

		// something builtin
		$functions = ATBuiltIn::loadBuiltIns();
		extract($root);
		ob_start();
		include($this->source);
		$this->content = ob_get_contents(); 
		ob_end_clean();
		return $this->content;
	}

	function getOut()
	{
		//
		return $this->content;
	}


}




?>