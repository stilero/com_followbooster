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
<h2>Getting started</h2>
<p>
<ol>
    <li>Open the options dialog, and enter Instagram Client ID and Client Secret. If you don't have any Instagram Client, click the Create Instagram App in the Options Dialog.</li>
    <li>Click the Authorize app button below, to log in to Instagram</li>
</ol>
</p>
<p>
    <a class="modals" href="index.php?option=com_followbooster&amp;view=auth&amp;format=raw&amp;<?php echo JSession::getFormToken(); ?>=1" rel="{handler: 'iframe', size: {x: 875, y: 600}, onClose: function() {}}">
        <button>Authorize app</button>
    </a> 
</p>
