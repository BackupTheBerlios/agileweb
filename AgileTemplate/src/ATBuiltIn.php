<?


/**
 * Copyright (c) AgileSoft.cn
 * @author Binzy
 * @package AgileTemplate
 *
 *
 */
class ATBuiltIn
{
	// 
	/**
	 *
	 * @static
	 * @access public
	 * @return void
	 */
	function loadBuiltIns()
	{
		// load all built in functions
		// ����builtinĿ¼
		// �ֱ���PHP4/5��ʽ :p
		if (phpversion() > "5")
		{
			//
			include_once(dirname(__FILE__)."/ExtensionFilter.php");
			ATBuiltIn::load4PHP5();
		}
		else // php4
		{
			//
			ATBuiltIn::load4PHP4();
		}

	}

	/**
	 *
	 * @static
	 * @access private
	 * @return void
	 *
	 */
	function load4PHP4()
	{
		//
	}

	/**
	 *
	 * @static
	 * @access private
	 * @return void
	 *
	 */
	function load4PHP5()
	{
		//
		$files = new ExtensionFilter(new DirectoryIterator(dirname(__FILE__)."/builtin"), 'php');
		foreach($files as $file)
		{
			//
		}
	}

}


?>