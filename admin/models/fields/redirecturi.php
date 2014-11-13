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

class JFormFieldRedirecturi extends JFormField {
    protected $type = 'redirecturi';
    protected $redirectURI;

    public function __construct($form = null) {
        parent::__construct($form);
        $this->redirectURI = JURI::current().'?option=com_followbooster&view=auth';
    }
    protected function getInput(){
        $htmlCode = '<input id="'.$this->id.'" name="'.$this->name.'" type="text" class="text_area" size="100" value="'.$this->redirectURI.'"/>';
        return $htmlCode;
    }

    protected function getLabel(){
        $toolTip = JText::_($this->element['description']);
        $text = JText::_($this->element['label']);
        $labelHTML = '<label id="'.$this->id.'-lbl" for="'.$this->id.'" class="hasTip" title="'.$text.'::'.$toolTip.'">'.$text.'</label>';
        return $labelHTML;
    }

}//End Class