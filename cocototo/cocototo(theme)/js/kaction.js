( function( $ ) {
	// $('.action-kpoint').click(function() {
    //     var target_id =  $(this).attr('data-tid');
    //     var user_id = $(this).attr('data-uid');
    //     console.log(target_id);
    //     console.log(user_id);
    //     jQuery.ajax({
    //         url : kpoint.ajax_url,
    //         type : 'post',
    //         data : {
    //             action : 'kpoint',
    //             target_id : target_id,
    //             user_id : user_id
    //         },
    //         success : function( response ) {
    //             $('.action-kpoint[data-tid="'+target_id+'"]').find('h4').html(temp['kpoint']);
    //         }
    //     });
          
    //     return false;
    // });
    jQuery('.sum-kpoint').click(function(e){
        e.preventDefault();
    });
    jQuery('.action-kpoint').click(function(e){
        e.preventDefault();
        var postid=jQuery(this).data('tid');
        var ktype=jQuery(this).data('ktype');
        //alert(postid);
        var data = {
            action: 'kaction',
            security : kaction.security,
            postid: postid,
            ktype: ktype,
        };
        $('.action-kpoint[data-tid="'+postid+'"][data-ktype="'+ktype+'"]').find('h4').html("---");
        $('.sum-kpoint[data-tid="'+postid+'"]').find('h4').html("---");
        jQuery.post(kaction.ajaxurl, data, function(res) {
            var result=jQuery.parseJSON( res );
            console.log(result);
            //alert(res);
            var likes=result.likecount;
            var points=result.points;
            $('.action-kpoint[data-tid="'+postid+'"][data-ktype="'+ktype+'"]').find('h4').html(likes);
            $('.sum-kpoint[data-tid="'+postid+'"]').find('h4').html(points);
        });
    });
}( jQuery ) );