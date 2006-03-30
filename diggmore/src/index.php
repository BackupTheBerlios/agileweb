<?


// $Id: index.php,v 1.2 2006/03/30 13:42:44 binzywu Exp $

require_once 'Zend.php';  
require_once 'lib/ext/DiggmoreFront.php';  
require_once 'lib/ext/DiggmoreAction.php';  
require_once 'lib/plugins/TestPlugin.php';  

Zend::loadClass('Zend_InputFilter'); 
Zend::loadClass('Zend_View'); 

$front = DiggmoreFront::getInstance(); 
$front->setControllerDirectory('./app'); 
$front->registerPlugin(new TestPlugin());


$view = new Zend_View; 
$view->setScriptPath('./app'); 
Zend::register('view', $view); 

$front->dispatch(); 

?>