

( function( $ ) {
	$('.action-favorite').click(function() {
        // $('.action-favorite[data-tid="'+target_id+'"]')
        var target_id =  $(this).attr('data-tid');
        var user_id = $(this).attr('data-uid');
        console.log(target_id);
        console.log(user_id);
        jQuery.ajax({
            url : favorite_user.ajax_url,
            type : 'post',
            data : {
                action : 'favorite_user',
                target_id : target_id,
                user_id : user_id
            },
            success : function( response ) {
                console.log(response);
                var tmp = JSON.parse(response);
                if(tmp['favorite_flag'] == '0') {
                    $('.action-favorite[data-tid="'+target_id+'"]').html( 'お気に入りに追加' );
                    $('.action-favorite[data-tid="'+target_id+'"]').removeClass('c-btn_tertiary');
                    $('.action-favorite[data-tid="'+target_id+'"]').addClass('c-btn_primary');
                } else {
                    $('.action-favorite[data-tid="'+target_id+'"]').html( 'お気に入りを解除' );
                    $('.action-favorite[data-tid="'+target_id+'"]').removeClass('c-btn_primary');
                    $('.action-favorite[data-tid="'+target_id+'"]').addClass('c-btn_tertiary');
                }
            }
        });
          
        return false;
    });
}( jQuery ) );