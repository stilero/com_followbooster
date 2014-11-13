<?php
/**
 * Main admin Controller
 *
 * @version  1.0
 * @author Daniel Eliasson - joomla at stilero.com
 * @copyright  (C) 2012-okt-21 Stilero Webdesign http://www.stilero.com
 * @category Components
 * @license	GPLv2
 * 
 */

// no direct access
defined('_JEXEC') or die('Restricted access'); 

// import joomla controller library
jimport('joomla.application.component.controller');

class InstaboardController extends JControllerLegacy{
    
    public static $modelName = 'feed';
    public static $viewName = 'feed';
    
    public function display($cachable = false, $urlparams = false){
        $view = $this->getView( self::$viewName, 'html' );
        $model = $this->getModel(  self::$modelName );
        $view->setModel( $model, true );
        $view->display();
    }
    
    public function edit(){
        $cids = JRequest::getVar('cid', null, 'default', 'array');
        if( $cids === null ){
            JError::raiseError( 500,
            'cid parameter missing from the request' );
        }
        $controllerId = (int)$cids[0];
        $view = $this->getView( JRequest::getVar( 'view',  self::$viewName ), 'html' );
        $model = $this->getModel( self::$modelName );
        $view->setModel( $model, true );
        $view->edit( $controllerId );
    }
    
    function add(){
        $view = $this->getView( JRequest::getVar( 'view',  self::$viewName ), 'html' );
        $model = $this->getModel( self::$modelName );
        $view->setModel( $model, true );
        $view->add();
    }
    
    function save(){
        $this->apply();
        $redirectTo = JRoute::_('index.php?option='.JRequest::getVar('option').'&task=display');
        $this->setRedirect( $redirectTo, 'Saved' );
    }
    
    function apply(){
        $model = $this->getModel( self::$modelName );
        $model->store();
    }
    
    function cancel(){
        $redirectTo = JRoute::_('index.php?option='.JRequest::getVar('option').'&task=display');
        $this->setRedirect( $redirectTo, 'Cancelled' );
    }
    
    function remove(){
        $cids = JRequest::getVar('cid', null, 'default', 'array');
        if( $cids === null ){
            JError::raiseError( 500, 'Nothing were selected for removal' );
        }
        $model = $this->getModel( self::$modelName);
        $model->delete( $cids);
        $redirectTo = JRoute::_('index.php?option='.JRequest::getVar( 'option' ).'&task=display');
        $this->setRedirect( $redirectTo, 'Deleted' );
    }
}
