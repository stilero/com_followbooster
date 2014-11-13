<?php
/**
 * Auth View
 *
 * @version  1.0
 * @author daniel
 * @copyright  (C) 2012-nov-04 Stilero Web design
 * @category Components
 * @license	GPLv2
 * 
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla view library
jimport('joomla.application.component.view');

class FollowboosterViewAuth extends JViewLegacy{
    
    function display($tpl = null){
        JToolBarHelper::title(JText::_('Authorization'), 'users');
        parent::display($tpl);
    }
    
    public function openAuthorization(){
        JToolBarHelper::title(JText::_('Authorization'), 'users');
        $model = $this->getModel('auth');
        $model->openAuthorization();
        return;
    }
    
    public function getToken($code){
        JRequest::checkToken( 'get' ) or die( 'Invalid Token' );
        JToolBarHelper::title(JText::_('Authorization'), 'users');
        $model = $this->getModel('auth');
        $isSuccessful = $model->getToken($code);
        $msg = 'App Authorized';
        if(!$isSuccessful){
            $msg = 'Failed authorizing';
        }
        $this->msg = $msg;
        $this->wasSuccessful = $isSuccessful;
        parent::display();
    }
}
