<?php
/**
 * Description of Component_InstaBoard
 *
 * @version  1.1
 * @author Daniel Eliasson - joomla at stilero.com
 * @copyright  (C) 2012-okt-21 Stilero Webdesign http://www.stilero.com
 * @category Components
 * @license	GPLv2
 */

// no direct access
defined('_JEXEC') or die('Restricted access');
if(!defined('DS')){
    define('DS', DIRECTORY_SEPARATOR);
}
define('INCLUDES_FOLDER', JPATH_COMPONENT_ADMINISTRATOR.'/includes/');
define('INSTA_API', INCLUDES_FOLDER.'insta-api/');
jimport('joomla.filesystem.file');
JLoader::register('InstaboardModelEndpointmodel', JPATH_COMPONENT_ADMINISTRATOR.'/models/endpointmodel.php');
JLoader::register('Classhelper', JPATH_COMPONENT_ADMINISTRATOR.'/helpers/classhelper.php');
JLoader::register('Boardhelper', JPATH_COMPONENT_ADMINISTRATOR.'/helpers/boardhelper.php');
JLoader::register('Mapshelper', JPATH_COMPONENT_ADMINISTRATOR.'/helpers/mapshelper.php');
JLoader::register('Instamenuhelper', JPATH_COMPONENT_ADMINISTRATOR.'/helpers/instamenuhelper.php');
JLoader::register('JHTMLString', JPATH_ROOT.'/libraries/joomla/html/html/string.php');
Classhelper::loadMainClasses();
Classhelper::loadEndpointClasses();
require_once JPATH_COMPONENT.DS.'controller.php';
$viewController = JRequest::getWord('view');
if ( $viewController) { 
    $path = JPATH_COMPONENT.DS.'controllers'.DS.$viewController.'.php';
    if (JFile::exists($path)) {
        require_once $path;
    } else {       
        $viewController = '';	   
    }
}
$classname = 'InstaboardController'.$viewController;
$controller = new $classname();
$controller->execute(JRequest::getCmd('task', 'display'));
$controller->redirect();