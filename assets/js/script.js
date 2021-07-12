jQuery(document).ready(function ($) {

    $('#wl_post_id_form').submit(function (event) {
        event.preventDefault();

        var wl_post_id = $('.wl-post-id__form__input').val();
        $.ajax({
            url: theme_ajax_obj.ajaxurl,
            data: {
                'action': 'wl_search_post_id',
                'wl_post_id': wl_post_id
            },
            success: function (data) {
                $('.wl-post-id').html(data);
                $('#wl_post_title').show();
                $('#wl_post_id_form').hide();
            },
            error: function (errorThrown) {
                console.log(errorThrown);
            }
        });
    });

});