<?


require_once "PHPUnit2/Framework/TestCase.php";
require_once "PHPUnit2/Framework/TestSuite.php";
require_once "../AgileTemplate.php";
require_once "../ATConfiguration.php";

class AgileTemplateTest extends PHPUnit2_Framework_TestCase 
{

	public function testProcess()
	{
		$tpl = new AgileTemplate("test", "test.php", new ATConfiguration());
		$this->assertEquals("Hello, Binzy.", $tpl->process(array("man"=>"Binzy")));

	}

}

?>