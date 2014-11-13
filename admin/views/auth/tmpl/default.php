<?php
/**
 * Description of Instaboard
 *
 * @version  1.0
 * @author Daniel Eliasson - joomla at stilero.com
 * @copyright  (C) 2012-okt-23 Stilero Webdesign http://www.stilero.com
 * @category Components
 * @license	GPLv2
 * 
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
$class = $this->wasSuccessful ? 'success' : 'error';
$header = $this->wasSuccessful ? 'Success' : 'Error';
$type = $this->wasSuccessful ? '' : 'error';
JFactory::getApplication()->enqueueMessage(JText::_($header).' - '.JText::_($this->msg), $type);
return;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Instagram Auth</title>
        <link href="<?php echo JURI::root().'administrator/components/com_followbooster/assets/bootstrap/css/bootstrap.min.css'; ?>" rel="stylesheet">
    </head>
    <body>
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="<?php echo JURI::root().'administrator/components/com_followbooster/assets/bootstrap/js/bootstrap.min.js'; ?>"></script>
        <div class="container-fluid">
                <div class="alert alert-<?php echo $class; ?>">
                    <button type="button" class="close" data-dismiss="alert" onClick="window.parent.document.location.reload();window.parent.SqueezeBox.close();">×</button>
                <h4><?php echo $header; ?></h4>
                <?php echo $this->msg; ?>
                </div>
        </div>
    </body>
</html>
