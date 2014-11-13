<?php
/**
 * @version  1.0
 * @author Daniel Eliasson - joomla at stilero.com
 * @copyright  (C) 2012-okt-21 Stilero Webdesign http://www.stilero.com
 * @category Components
 * @license	GPLv2
  */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

?>
<?php if($this->items != false) : ?>
<ul class="thumbnails">
<?php foreach ($this->items as $item) : ?>
    <li>
        <div class="thumbnail">
            <h3>
                <a class="modal" data-toggle="modal" href="index.php?option=com_followbooster&amp;view=user&amp;format=raw&amp;<?php echo JSession::getFormToken(); ?>=1&amp;user_id=<?php echo $item->user->id; ?>" rel="{handler: 'iframe', size: {x: 875, y: 600}, onClose: function() {}}">
                    <img class="profile_picture" data-src="<?php echo $image->images->thumbnail->url; ?>"  src="#" width="20" height="20" /> 
                </a>
            </h3>
            <a class="modal" data-toggle="modal" href="index.php?option=com_followbooster&amp;view=image&amp;format=raw&amp;<?php echo JSession::getFormToken(); ?>=1&amp;id=<?php echo $item->id; ?>" rel="{handler: 'iframe', size: {x: 875, y: 600}, onClose: function() {}}">
                    <img class="feed_image" data-src="<?php echo $image->images->thumbnail->url; ?>" src="#" />
                </a>
            
            <p>
                <i class="icon-time"></i><?php echo Boardhelper::timeToText($item->created_time); ?> 
                <i class="icon-heart"></i><?php echo $item->likes->count; ?> 
                <i class="icon-comment"></i><?php echo $item->comments->count; ?>
            </p>
        </div>
    </li>
<?php endforeach; ?>
</ul>
<?php else : ?>
     <?php echo $this->loadTemplate('auth'); ?>
<?php endif; ?>
