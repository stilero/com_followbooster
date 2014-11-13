<?php
/**
 * Feed Controller
 *
 * @version  1.0
 * @author Daniel Eliasson - joomla at stilero.com
 * @copyright  (C) 2012-okt-21 Stilero Webdesign http://www.stilero.com
 * @category Components
 * @subpackage Instaboard
 * @license	GPLv2
 * 
 */

// no direct access
defined('_JEXEC') or die('Restricted access'); 

// import joomla controller library
jimport('joomla.application.component.controller');

class FollowboosterControllerInstagram extends JControllerLegacy{
    
    public static $modelName = 'instagram';
    public static $viewName = 'instagram';
    
    public function display($cachable = false, $urlparams = false){
        $view = $this->getView( self::$viewName, 'html' );
        $model = $this->getModel(  self::$modelName );
        $view->setModel( $model, true );
        $view->display();
    }
}
