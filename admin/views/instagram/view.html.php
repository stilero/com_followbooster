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
 * This file is part of instagram.
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

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla view library
jimport('joomla.application.component.view');
 
/**
 * HTML View class for the HelloWorld Component
 */
class FollowboosterViewInstagram extends JViewLegacy{
    
    public function display($tpl=null) {
       JToolBarHelper::title(JText::_('Not Authorized'), 'user');
        JToolBarHelper::preferences('com_followbooster');
        $params = JComponentHelper::getParams('com_followbooster');
        $token = $params->get('access_token');
        if($token != ''){
            JToolBarHelper::title(JText::_('Feed'), 'newsfeeds');
            Instamenuhelper::addSubmenu('feed');
        }
        //JHtml::stylesheet(JURI::root().'administrator/components/com_instaboard/assets/css/style.css');
        JHtml::stylesheet(JURI::root().'administrator/components/com_followbooster/assets/bootstrap/css/bootstrap-grid.min.css');
        JHtml::stylesheet(JURI::root().'administrator/components/com_followbooster/assets/bootstrap/css/bootstrap-icon.min.css');
        JHtml::stylesheet(JURI::root().'administrator/components/com_followbooster/assets/bootstrap/css/bootstrap-thumbs.min.css');
        //JHtmlBehavior::framework(true);
        JHtml::_('behavior.framework'); 
        //JHtml::script(JURI::root().'administrator/components/com_followbooster/assets/js/lazyload.js');
        JHTML::_('behavior.modal'); 
        $model = $this->getModel('instagram');
        $items = $model->getItems();
        $this->assignRef('items', $items);
        JHTML::_('behavior.modal'); 
       parent::display($tpl);
    }
    
    function edit($id) {
        JToolBarHelper::title(JText::_('Com_followbooster Instagram: [<small>Edit</small>]', 'generic.png'));
        JToolBarHelper::save();
        JToolBarHelper::cancel('cancel', 'Close');
        $model =& $this->getModel();
        $instagram = $model->getInstagram( $id );
        $this->assignRef('instagram', $instagram);
        parent::display();
    }
    
    function add(){
        JToolBarHelper::title( JText::_('Com_followbooster Instagram')
                . ': [<small>Add</small>]' );
        JToolBarHelper::save();
        JToolBarHelper::cancel();
        $model =& $this->getModel();
        $instagram = $model->getNewInstagram();
        $this->assignRef('instagram', $instagram);
        parent::display();
    }
}
