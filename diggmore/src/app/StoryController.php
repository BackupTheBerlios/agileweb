<?


//

require_once(dirname(__FILE__)."/../lib/ext/DiggmoreController.php");

class StoryController extends DiggmoreController
{

	public function indexAction()
	{
		//
		print "a";
		//$this->_redirect("/");
	}

	public function submitAction()
	{
		// just submit the story
		print_r($_REQUEST);
	}

	/**
	 *
	 * view the story //
	 *
	 */
	public function viewAction()
	{
		//
	}


}


?>