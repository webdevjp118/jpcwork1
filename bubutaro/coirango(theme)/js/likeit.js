( function( $ ) {
	$('.action-like').click(function() {
        // $('.action-favorite[data-tid="'+target_id+'"]')
        var target_id =  $(this).attr('data-tid');
        var user_id = $(this).attr('data-uid');
        console.log(target_id);
        console.log(user_id);
        jQuery.ajax({
            url : favorite_user.ajax_url,
            type : 'post',
            data : {
                action : 'like_it',
                target_id : target_id,
                user_id : user_id
            },
            success : function( response ) {
                console.log(response);
                var tmp = JSON.parse(response);
                if(tmp['like_flag'] == '0') {
                    $('.action-like[data-tid="'+target_id+'"]').html('<div class="c-unlike-ic"></div>' + tmp['like_count']);
                } else {
                    $('.action-like[data-tid="'+target_id+'"]').html('<div class="c-like-ic"></div>' + tmp['like_count']);
                }
            }
        });
          
        return false;
    });
    $('.action-cclike').click(function() {
        // $('.action-favorite[data-tid="'+target_id+'"]')
        var target_id =  $(this).attr('data-tid');
        var user_id = $(this).attr('data-uid');
        console.log(target_id);
        console.log(user_id);
        jQuery.ajax({
            url : favorite_user.ajax_url,
            type : 'post',
            data : {
                action : 'like_it',
                target_id : target_id,
                user_id : user_id
            },
            success : function( response ) {
                console.log(response);
                var tmp = JSON.parse(response);
                if(tmp['like_flag'] == '0') {
                    $('.action-cclike[data-tid="'+target_id+'"]').html('<div class="c-unlike-ic"></div>');
                    $('.small-cclike[data-tid="'+target_id+'"]').html('<div class="inline-flex"><div class="c-unlike-ic"></div>' + tmp['like_count'] + '</div>');
                } else {
                    $('.action-cclike[data-tid="'+target_id+'"]').html('<div class="c-like-ic"></div>');
                    $('.small-cclike[data-tid="'+target_id+'"]').html('<div class="inline-flex"><div class="c-like-ic"></div>' + tmp['like_count'] + '</div>');
                }
            }
        });
          
        return false;
    });
}( jQuery ) );