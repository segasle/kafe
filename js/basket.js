$(document).ready(function() {
  // Тут передает id тавара в ../functions/ajax.php для заполнения таблицы cart
  $('.js-basket').click(function () {
      var id = $(this).attr('data-id');
      // берем значение количества товаров
      let count = $('.count_products_in_cart').html();
      //умеличиваем на 1
      count++;
      axios.post('../functions/ajax.php', id,
        {
          headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        })
        // этот код сработает, если запрос POST успешко отправлен
        .then(function (response) {
          // записываем обратно
          $('.count_products_in_cart').text(count);
          
        }).catch(function (error) {
          
        });     

  });

  $('.js-delete_prod').click(function() {
    let count = $('.count_products_in_cart').html();
    --count;
    $('.count_products_in_cart').text(count);
  });
});
