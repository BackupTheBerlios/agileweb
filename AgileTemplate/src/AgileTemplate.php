<?

require_once(dirname(__FILE__)."/ATBuiltIn.php");

class AgileTemplate
{

	var $source;
	var $name;
	var $encoding;

	var $content = "";

	function AgileTemplate($name, $source, &$cfg, $encoding = "", $local = "")
	{
		//
		$this->source = $source;
		$this->name = $name;
		$this->encoding = $encoding;
	}

	function process($root)
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