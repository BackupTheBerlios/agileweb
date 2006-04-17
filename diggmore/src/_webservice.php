<?

require_once 'Zend/Controller/Front.php';
require_once 'Zend/View.php';



$front = Zend_Controller_Front::getInstance();

$front->setControllerDirectory('./app'); 


$view = new Zend_View; 
$view->setScriptPath('./view'); 
Zend::register('view', $view); 

$front->dispatch();

?>