<?

require_once 'Zend/Controller/Front.php';
require_once 'Zend/View.php';

require_once(dirname(__FILE__)."/lib/plugins/UTF8Plugin.php");
require_once(dirname(__FILE__)."/lib/plugins/TestPlugin.php");



$front = Zend_Controller_Front::getInstance();

$front->setControllerDirectory('./app'); 
$front->registerPlugin(new UTF8Plugin());
$front->registerPlugin(new TestPlugin());


$view = new Zend_View; 
$view->setScriptPath('./view'); 
Zend::register('view', $view); 

$front->dispatch();

?>