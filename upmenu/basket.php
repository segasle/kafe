<h1 class="text-center">Корзина</h1>
<div class="container">
    
    <table class="table table-bordered table-sm">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Названия</th>
                <th scope="col">Количество</th>
                <th scope="col">Цена</th>
                <th scope="col">Сумма</th>
                <th scope="col">Удалить</th>
            </tr>
        </thead>
        <tbody>
            <?php
              $sum_price = 0;
              //Запрос на получения товаров из корзины (в будущем надо вместо cart.ip = 'POST' привязать к таблице users)
              $res = do_query("SELECT * FROM products JOIN cart WHERE cart.ip = 'POST' AND products.idd = cart.id_products");
              foreach ($res as $item) {
                $sum_price += $item['count'] * $item['price'];
                echo "<tr>
                  <td>". $item['header']  ."</td>
                  <td>". $item['count']  ."</td>
                  <td>". $item['price']  ."</td>
                  <td>". $item['count'] * $item['price']  ."</td>
                  <td>
                    <button type=\"submit\">
                      <svg id=\"i-trash\" viewBox=\"0 0 30 30\" width=\"26\" height=\"26\" fill=\"none\" stroke=\"currentcolor\" stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\">
                      <path d=\"M28 6 L6 6 8 30 24 30 26 6 4 6 M16 12 L16 24 M21 12 L20 24 M11 12 L12 24 M12 6 L13 2 19 2 20 6\" />
                    </svg>
                    </button>
                  </td>
                </tr>";
              }
            ?>
        </tbody>
    </table>
    <table class="table table-bordered table-sm">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Скидка</th>
                <th scope="col">Сумма</th>
                <th scope="col">Итого</th>
            </tr>
        </thead>
        <tbody>
            <?php
             echo "<tr>
                  <td>10 %</td>
                  <td>". $sum_price  ."</td>
                  <td scope=\"col\">". ($sum_price - $sum_price*10/100)  ."</td>";
            ?>
        </tbody>
    </table>

    <form class="form-horizontal">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Отправить заказ</button>
            </div>
        </div>
    </form>
</div>