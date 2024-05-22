



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
                jQuery('.ikitai-count').html( response );
            }
        });
          
        return false;
    });
}( jQuery ) );