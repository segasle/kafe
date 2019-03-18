// Тут передает id тавара в ../functions/ajax.php для заполнени ятаблицы cart
$('.js-basket').click(function () {
    var id = $(this).attr('data-id');
    axios.post('../functions/ajax.php', id,
      {
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      }).then(function (response) {
        basket();
        //console.log(response);
      }).catch(function (error) {
        //console.log(error);
      });     

});

function basket() {
    axios.post('../functions/basket.php', {},
      {
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      })
      .then(function (data) {
        if (data == 0){
          $('.js-button-basket > p').html('');
        }else {
          $('.js-button-basket > p').html(data);
        }
        console.log(data);
      }).catch(function (error) {
        console.log(error);
      }); 
}
