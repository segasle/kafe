// Тут передает id тавара в ../functions/ajax.php для заполнения таблицы cart
$('.js-basket').click(function () {
    var id = $(this).attr('data-id');
    axios.post('../functions/ajax.php', id,
      {
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      })
      // этот код сработает, если запрос POST успешко отправлен
      .then(function (response) {
        // берем значение количества товаров
        let count = $('.count_products_in_cart').html();
        //умеличиваем на 1
        count++;
        // записываем обратно
        $('.count_products_in_cart').text(count);
        
      }).catch(function (error) {
        
      });     

});
