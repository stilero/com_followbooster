/**
 * @version     $Id$
 * @copyright   Copyright 2012 Stilero AB. All rights re-served.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
jQuery(function($){
    
    var hideForm = function(){
        $('#commentform').fadeOut();
    }
    
    $('#commentform').submit(function(e){
        e.preventDefault();
        var params = $('#commentform').serialize();
    
        $.getJSON('index.php', params, function(data){
            if(data.meta.code == '200'){
                showSuccess('<strong>Success!</strong> Comment sent', '#likedialog');
                hideForm();
            }else{
                showWarning('<strong>Warning!</strong><br />' + data.meta.error_message, '#likedialog');
            }
        }).error(function(){
            showError('<strong>Error!</strong> server error occured.', '#likedialog');
        });
    });
    
});