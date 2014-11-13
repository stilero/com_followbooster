<?php
/**
 * Description of com_followbooster
 *
 * @version  1.0
 * @author Daniel Eliasson <daniel at stilero.com>
 * @copyright  (C) 2014-nov-13 Stilero Webdesign (http://www.stilero.com)
 * @category Components
 * @license	GPLv2
 * 
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * 
 * This file is part of followbooster.
 * 
 * com_followbooster is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * com_followbooster is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with com_followbooster.  If not, see <http://www.gnu.org/licenses/>.
 * 
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
JHTML::addIncludePath(JPATH_COMPONENT.DS.'helpers');
require_once JPATH_COMPONENT.DS.'controller.php';
$controller = JRequest::getWord('view');

if ($controller) { 
    $path = JPATH_COMPONENT.DS.'controllers'.DS.$controller.'.php';
    if ( file_exists($path)) {
        require_once $path;
    } else {       
        $controller = '';	   
    }
}
$classname    = 'FollowboosterController'.$controller;
$controller   = new $classname();

// Perform the Request task
$controller->execute(JRequest::getCmd('task', 'display'));
 
// Redirect if set by the controller
$controller->redirect();