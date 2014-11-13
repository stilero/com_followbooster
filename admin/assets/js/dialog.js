/**
 * @version     $Id$
 * @copyright   Copyright 2012 Stilero AB. All rights re-served.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
//jQuery(function($){
    
    var getDialog = function($msg, $alertClass){
        var html = '<div class="alert ' + $alertClass + '"><button type="button" class="close" data-dismiss="alert">×</button>' + $msg +'</div>';
        return html;
    };
    
    var showError = function($msg, $placeholder){
        var html = getDialog($msg, 'alert-error');
        $(html).appendTo($placeholder);
    };
    
    var showSuccess = function($msg, $placeholder){
        var html = getDialog($msg, 'alert-success');
        $(html).appendTo($placeholder);
    };
    
    var showInfo = function($msg, $placeholder){
        var html = getDialog($msg, 'alert-info');
        $(html).appendTo($placeholder);
    };
    
    var showWarning = function($msg, $placeholder){
        var html = getDialog($msg, 'alert-warning');
        $(html).appendTo($placeholder);
    };
//});