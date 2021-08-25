$(document).ready(function () {

    if (sessionStorage.getItem('item_registered_success') != null) {
        $(".main_dialog").html(sessionStorage.getItem('item_registered_success')).fadeIn().show();
        sessionStorage.removeItem('item_registered_success');
    }

    $('.nav .nav-item a').on("click", function (e) {
        e.preventDefault();

        if (history.state == null) {
            history.pushState({ id: "index" }, "Home", "http://localhost/menu-digital-aop/");
        }

        var $this = $(this);
        var href = $this.attr("href");
        load_page(href);

    });

    window.onpopstate = function (e) {
        if (e.state) {
            load_page(document.location.href);
        }
    };

});

function load_page(page) {
    fetch(page)
        .then(function (response) {
            return response.text();
        })
        .then((html) => {
            location.href = "#" + page;
            var pag = page.split('=');
            var stateObj = { id: pag[1] };
            history.replaceState(stateObj, "Pilot | " + pag[1], page);
            $("body").html(html);
        });
}
