<?

class IndexController extends DiggmoreAction 
{ 
	function indexAction() 
	{ 
		$view = Zend::registry('view');
		print $view->render('example.php');
	} 

   function noRouteAction() 
   { 
       echo  "Page note exists!"; 
   } 
}

?>