<?php
/**
 * Instaboard
 *
 * @version  1.0
 * @package Stilero
 * @subpackage Instaboard
 * @author Daniel Eliasson - joomla at stilero.com
 * @copyright  (C) 2012-okt-21 Stilero Webdesign http://www.stilero.com
 * @license	GNU General Public License version 2 or later.
 * @link http://www.stilero.com
 */

// no direct access
defined('_JEXEC') or die('Restricted access'); 

class Classhelper{
    
    public static function loadMainClasses(){
        $classes = array(
            'Communicator',
            'InstaClient',
            'InstaError',
            'InstaOauth',
            'InstaOauthAccessCode',
            'InstaOauthAccessToken',
            'InstaRelationshipAction',
            'InstaScope'
        );
        foreach ($classes as $class) {
            JLoader::register($class, INSTA_API.$class.'.php');
        }
    }
    
    public static function loadEndpointClasses(){
        $classes = array(
            'InstaEndpoint',
            'InstaComments',
            'InstaEmbeddings',
            'InstaGeographies',
            'InstaLikes',
            'InstaLocations',
            'InstaMedia',
            'InstaRelationships',
            'InstaTags',
            'InstaUsers'
        );
        foreach ($classes as $class) {
            JLoader::register($class, INSTA_API.'Endpoints/'.$class.'.php');
        }
    }
}
