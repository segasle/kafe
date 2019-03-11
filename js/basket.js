$('.js-basket').on('click', basket);

function basket() {
    var id =  $(this).attr('data-id');
    console.log(id);
}