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
                    sessionStorage.setItem('item_registered_success', response.message );
                    load_page("?class=CategoriaList");

                    // no carregamento via include do twig o css não atualizava 
                    // por iss a rotina abaixo foi substituida pelo load_page
                    //$(".main_dialog").html(response.message).fadeIn().show();
                    //$('#category-table').prepend(response.data);
                    //obj_form.trigger("reset");
                }                
                $(".main_dialog").html(response.data).fadeIn().show();
            }
        });

    });

    $('input.toggle-event[type=checkbox]').change(function() {
        var data = $(this).data();
        data.status = $(this).prop('checked') ? "1" : "0";
        $.ajax({
            url: data.action,
            data: {id: data.id, status: data.status},
            type: 'POST',
            dataType:'json'
        }).done(function(resp){
            console.log(resp);
        });
    })

});