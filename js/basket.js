
$('.js-basket').click(function () {
    var id = $(this).attr('data-id');
    console.log(id);
    $.ajax({
        type: 'POST',
        url: '../functions/ajax.php',
        data: 'id='+data-id,
        dataType: 'html',
        cache: false,
        success: function (data) {
            basket();
        }
    });
});

function basket() {

    $.ajax({
        type: 'POST',
        url: '../functions/basket.php',
        dataType: 'html',
        cache: false,
        success: function (data) {
            if (data == 0){
                $('.js-button-basket > p').html('');
            }else {
                $('.js-button-basket > p').html(data);

            }
        }
    });
}