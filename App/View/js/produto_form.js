$(function () {

    $('.custom-file-input').on('change',function(){
        let fileName = $(this).val().split('\\').pop(); 
        $(this).next('.custom-file-label').addClass("selected").html(fileName); 
        $('.custom-file-label').html(fileName);
    })

    $(".novo_item").submit(function (e) {
        e.preventDefault();
        var obj_form = $(this);
        var form = document.getElementById("novo_item");
        var formData = new FormData(form);
        
        $.ajax({

            url: obj_form.attr("action"),
            data: formData,
            type: 'POST',
            dataType:'json',
            processData: false,
            contentType: false,
            async: true,
            beforeSend: function () {
                $(".spinner").css("display", "flex");
            }
        }).done(function (response) {
            $(".spinner").css("display", "flex");
            if (response.status == 'error') {
                $(".spinner").css("display", "none");
                $(".main_dialog").html(response.data).fadeIn().show();
                return;
            }
            sessionStorage.setItem('item_registered_success', response.data );
            load_page("?class=ProdutoList");
        });

    });

});