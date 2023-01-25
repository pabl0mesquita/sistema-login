$(function () {
    $("#form_login").submit(function (e) {
        e.preventDefault();

        var form = $(this);
        var load = $(".ajax_load");
        var ajax_response = $(".ajax_response");

        load.fadeIn(200).css('display', "flex");

        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: form.serialize(),
            dataType: 'JSON',
            success: function(response){
                if(response.message){
                    console.log(response.message)
                    ajax_response.html(response.message);
                }
                if(response.data){
                    console.log(response.data)
                }

                load.fadeOut(200);
            },
            complete:function(response){
                load.fadeOut(200);
            },
            error: function(response){
                load.fadeOut(200);

            }
        });
    });
});