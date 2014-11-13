<?php
/**
 * AdminListHelper - For fast creation of Admin Lists
 *
 * @version  1.0
 * @author Daniel Eliasson - joomla at stilero.com
 * @copyright  (C) 2012-okt-27 Stilero Webdesign http://www.stilero.com
 * @category Plugins
 * @license	GPLv2
 */

// no direct access
defined('_JEXEC') or die('Restricted access'); 

class Instamenuhelper{
    
    private static $_compOption = 'com_instaboard';
    
    public static function addSubmenu($vName = 'feed'){
        
        JSubMenuHelper::addEntry(
            JText::_('Feed'),
            'index.php?option='.self::$_compOption.'&view=feed',
            ($vName == 'feed')
        );
        
        JSubMenuHelper::addEntry(
            JText::_('User'),
            'index.php?option='.self::$_compOption.'&view=user',
            ($vName == 'user')
        );
        
        JSubMenuHelper::addEntry(
            JText::_('Follows'),
            'index.php?option='.self::$_compOption.'&view=follows&task=follows',
            ($vName == 'follows')
        );
        
        JSubMenuHelper::addEntry(
            JText::_('Followed By'),
            'index.php?option='.self::$_compOption.'&view=follows&task=followedBy',
            ($vName == 'followedBy')
        );
        
        JSubMenuHelper::addEntry(
            JText::_('Tag'),
            'index.php?option='.self::$_compOption.'&view=tag',
            ($vName == 'tag')
        );
        
        JSubMenuHelper::addEntry(
            JText::_('Popular'),
            'index.php?option='.self::$_compOption.'&view=popular',
            ($vName == 'popular')
        );
    }
}