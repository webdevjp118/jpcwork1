

( function( $ ) {
	$('.action-ikitai').click(function() {
        var laundry_id = $('#laundry_id').val();
        var user_id = $('#user_id').val();
        jQuery.ajax({
            url : ikitaiit.ajax_url,
            type : 'post',
            data : {
                action : 'laundry_ikitai_it',
                laundry_id : laundry_id,
                user_id : user_id
            },
            success : function( response ) {
                console.log(response);
                var tmp = JSON.parse(response);
                //ikitai_it_count,
                //ikitai_it_flag
                jQuery('.ikitai-count').html( tmp['ikitai_it_count'] );

                if(tmp['ikitai_it_flag'] == '0') {
                    $('.action-ikitai').removeClass('active');
                } else {
                    $('.action-ikitai').addClass('active');
                }
            }
        });
          
        return false;
    });
}( jQuery ) );