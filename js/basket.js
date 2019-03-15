// var car = {};
// $('.js-basket').on('click', basket);
//
// function basket() {
//     var id =  $(this).attr('data-id');
//     if (car[id] == undefined){
//         car[id] = 1;
//     }else {
//         car[id]++;
//     }
//     console.log(car[id]);
// }
// function showBasket() {
//     //var out = '<button>';
//     var src = 'function/function.php';
//     var xhr = new XMLHttpRequest();
//     xhr = open('get', src, false);
//     var respose = xhr.response;
//     respose = JSON.parse(respose);
// //var name = JSON.parse('<?php echo $json; ?>');
// console.log(respose);
// }
// showBasket();
$('.js-basket').click(function () {
    var id = $(this).attr('data-id');
    console.log(id);
    $.ajax({
        type: 'POST',
        url: 'inc/ajax.php',
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
        url: 'inc/basket.php',
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