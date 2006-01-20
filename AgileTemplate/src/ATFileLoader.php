<?



require_once(dirname(__FILE__)."/ATLoader.php");

class ATFileLoader extends ATLoader
{

	var $basedir;

	function ATFileLoader()
	{
		
	}

	function getLastModified($name)
	{
		//
		$file = $this->basedir.$name;
		if (!file_exists($file))
		{
			return 0;
		}
		else
		{
			return filemtime($file);
		}
	}

	function getTemplateSource($name)
	{
		//
		$file = $this->basedir.$name;
		if (!file_exists($file))
		{
			trigger_error("Template File: $file not exists!", E_USER_ERROR);
		}
		else
		{
			return $file;
		}
	}

	function closeTemplateSource($source)
	{
		// do nothing
	}



}

?>