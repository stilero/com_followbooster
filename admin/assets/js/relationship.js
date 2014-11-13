/**
 * @version     $Id$
 * @copyright   Copyright 2012 Stilero AB. All rights re-served.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
jQuery(function($){
    
    var setFollowBtn = function(){
        $('#relationbtn').removeClass('btn-danger');
        $('#relationbtn').addClass('btn-info');
        $('#relationbtn').text('');
        $('input[name=task]').val('follow');
        $('<i class="icon-star icon-white"></i><span> Follow</span>').appendTo('#relationbtn');
        
    };
    
    var setUnlikeBtn = function(){
        $('#relationbtn').removeClass('btn-info');
        $('#relationbtn').addClass('btn-danger');
        $('#relationbtn').text('');
        $('input[name=task]').val('unfollow');
        $('<i class="icon-star-empty icon-white"></i><span> Unfollow</span>').appendTo('#relationbtn');
    };
    
    var setBtn = function($task){
        if($task == 'follow'){
            setUnfollowBtn();
        }else{
            setFollowBtn();
        }
    };
    
    $('#relationform').submit(function(e){
        e.preventDefault();
//        var params = $('#relationform').serialize();
        var params = $('#relationform').serialize();
    
        $.getJSON('index.php', params, function(data){
            if(data.meta.code == '200'){
                showSuccess('<strong>Success!</strong> user ' + params['task'] + 'd.', '#likedialog');
                setBtn(params['task']);
            }else{
                showWarning('<strong>Warning!</strong><br />' + data.meta.error_message, '#likedialog');
            }
        }).error(function(){
            showError('<strong>Error!</strong> server error occured.', '#likedialog');
        });
    });
});