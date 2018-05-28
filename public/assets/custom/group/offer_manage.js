var GroupOfferListing = function () {

    $('body').on('click', '.pagination a', function(e) {
        e.preventDefault();

        $('#load a').css('color', '#dfecf6');
        $('#load').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="/images/loading.gif" />');

        var url = $(this).attr('href');
        getOffers(url);
        window.history.pushState("", "", url);
    });

    function getOffers(url) {
        $.ajax({
            url : url
        }).done(function (data) {
            $('.offers').html(data);
        }).fail(function () {
            alert('Offers could not be loaded.');
        });
    }
}();
jQuery(document).ready(function() {
    GroupOfferListing.init();

});