var car = {};
$('.js-basket').on('click', basket);

function basket() {
    var id =  $(this).attr('data-id');
    //console.log(id);
    if (car[id] == undefined){
        car[id] = 1;
    }else {
        car[id]++;
    }
    console.log(car[id]);
}