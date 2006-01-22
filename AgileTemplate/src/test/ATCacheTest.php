<?


require_once "PHPUnit2/Framework/TestCase.php";
require_once "PHPUnit2/Framework/TestSuite.php";
require_once "../ATCache.php";
require_once "../AgileTemplate.php";
require_once "../ATConfiguration.php";

class ATCacheTest extends PHPUnit2_Framework_TestCase 
{

	public function testGetTemplate()
	{
		$tpl = new ATCache(new ATConfiguration());
		$this->assertNotNull($tpl->getTemplate("test.php"));
		$this->assertType("AgileTemplate", $tpl->getTemplate("test.php"));
	}

}

?>