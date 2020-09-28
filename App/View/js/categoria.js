$(function () {

    $(".nova_categoria").submit(function (e) {

        e.preventDefault();
        var obj_form = $(this);
        var formData = obj_form.serialize();
        
        $.ajax({
            url: obj_form.attr("action"),
            data: formData,
            type: 'POST',
            dataType:'json',
            success: function (response) {
                if (response.status == 'success') {
                    $(".main_dialog").html(response.message).fadeIn().show();
                    $('#category-table').prepend(response.data);
                    obj_form.trigger("reset");
                    return;    
                }                
                $(".main_dialog").html(response.data).fadeIn().show();
            }
        });

    });

});