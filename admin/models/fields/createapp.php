<?php
/**
* Description of InstaBoard
*
* @version  1.0
* @author Daniel Eliasson (joomla@stilero.com)
* @copyright  (C) 2012-nov-07 Stilero Webdesign (www.stilero.com)
* @category Custom Form field
* @license    GPLv2
*/
 
// no direct access
defined('_JEXEC') or die('Restricted access');

    class JFormFieldCreateapp extends JFormField {
        protected $type = 'createapp';
        protected static $instDevPage = 'http://instagram.com/developer/clients/manage/';

        protected function getInput(){
            $htmlCode = '<a href="'.self::$instDevPage.'" target="_blank">';
            $htmlCode .= $this->value;
            $htmlCode .= '</a>';
            return $htmlCode;
        }
        
        protected function getLabel(){
            $toolTip = JText::_($this->element['description']);
            $text = JText::_($this->element['label']);
            $labelHTML = '<label id="'.$this->id.'-lbl" for="'.$this->id.'" class="hasTip" title="'.$text.'::'.$toolTip.'">'.$text.'</label>';
            return $labelHTML;
        }
        
    }//End Class
