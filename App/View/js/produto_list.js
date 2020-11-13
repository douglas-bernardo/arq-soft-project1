$(function () {
    
    $('button[id="delete_item"]').on("click", function (e) {
        e.preventDefault();
        var data = $(this).data();
        var div = $(this).closest('#item');
        $.post(data.action, data, function (resp) {
            div.fadeOut();
        },"json")
        .fail(function (resp) {
            console.log(resp);
        });        
    })
});