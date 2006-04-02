<?


// $Id: index.php,v 1.4 2006/04/02 13:29:25 binzywu Exp $

require_once 'Zend.php';  
require_once 'lib/ext/DiggmoreFront.php';  
require_once 'lib/ext/DiggmoreAction.php';  
require_once 'lib/plugins/TestPlugin.php';  
require_once 'lib/plugins/UTF8Plugin.php';  

Zend::loadClass('Zend_InputFilter'); 
Zend::loadClass('Zend_View'); 

$front = DiggmoreFront::getInstance(); 
$front->setControllerDirectory('./app'); 
$front->registerPlugin(new UTF8Plugin());
$front->registerPlugin(new TestPlugin());


$view = new Zend_View; 
$view->setScriptPath('./view'); 
Zend::register('view', $view); 

$front->dispatch(); 

?>