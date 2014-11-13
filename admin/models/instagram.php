<?php
/**
 * Instagram
 *
 * @version  1.0
 * @author Daniel Eliasson <daniel at stilero.com>
 * @package Stilero
 * @subpackage Expression procect is undefined on line 8, column 18 in Templates/Joomla/_model.php.
 * @copyright  (C) 2014-nov-13 Stilero Webdesign (http://www.stilero.com)
 * @category Components
 * @license	GPLv2
 * @link http://www.stilero.com
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla modelitem library
jimport('joomla.application.component.modelitem');
 
class FollowboosterModelInstagram extends JModelItem{
    
    private $_accessToken;
    private $_EndPoint;
    private $_Relationship;
    private $_UserInfo;
    private $_tag;
    
    public function __construct($config = array()) {
        parent::__construct($config);
        $params = JComponentHelper::getParams('com_followbooster');
        $this->_accessToken = $params->get('access_token');
        $this->_EndPoint = new InstaTags($this->_accessToken);
        $this->_Relationship = new InstaRelationships($this->_accessToken);
        $this->_UserInfo = new InstaUsers($this->_accessToken);
        
    }
    
    /**
     * Get items from the tag set in the settings
     * @return null|boolean
     */
    public function getItems(){
        $params = JComponentHelper::getParams('com_followbooster');
        $this->_tag = $params->get('tag');
        $accessToken = $params->get('access_token');
        if($accessToken != ''){
            if($this->_tag == ''){
                return null;
            }
            $tagFeed = $this->_EndPoint->getRecentMediaByTag($this->_tag);
            $feed = json_decode($tagFeed);
            $user_id = $feed->data[0]->user->id;
            $userinfo = $this->_UserInfo->getUserInfo('195289139');
            $relationship = $this->_Relationship->getUserIdRelationship('195289139');
            $follow = $this->_Relationship->followUserId('195289139');
            var_dump($follow);
            $user = json_decode($userinfo);
            $relation = json_decode($relationship);
            var_dump($user).' '.  var_dump($relation);exit;
            $images = null;
            if($feed->meta->code == '200'){
                $images = $feed->data;
            }
            return $images;
        }
        return false;
    }
    
    
}