<h1 class="text-center">Корзина</h1>
<div class="table">
    <?php
    //Запрос на получения товаров из корзины (в будущем надо вместо cart.ip = 'POST' привязать к таблице users)
    $res = do_query("SELECT * FROM products JOIN cart WHERE cart.ip = 'POST' AND products.idd = cart.id_products");
    /*$array = array(
        array(
            'head' => 'Названия',
         //   'session' => $_SESSION['header'],
        ),
        array(
            'head' => 'Количество',
           // 'session' => $_SESSION['id'],

        ),
        array(
            'head' => 'Сумма',
            //'session' => $_SESSION['price'],

        ),

    );*/
    // Вывод товаров из таблицы Корзина
    foreach ($res as $item) {
        echo "<div class=\"table-cell\">
            <div class=\"block\">
                <div class=\"block_title\"><p>Названия</p></div>
                <div class=\"block_description\">". $item['header']  ."</div>
            </div>
        </div>
        <div class=\"table-cell\">
            <div class=\"block\">
                <div class=\"block_title\"><p>Количество</p></div>
                <div class=\"block_description\">". $item['count']  ."</div>
            </div>
        </div>
        <div class=\"table-cell\">
            <div class=\"block\">
                <div class=\"block_title\"><p>Сумма</p></div>
                <div class=\"block_description\">". $item['count'] * $item['price']  ."</div>
            </div>
        </div>"."<br>";
    }
    ?>
</div>
<div class="float-right">
    <div class="table">
        <?php
        $basket = array(
            array(
                'head' => 'Скидка',
            ),
            array(
                'head' => 'Сумма',
            ),
            array(
                'head' => 'Итого',
            ),
        );
        foreach ($basket as $item) {

            echo "<div class=\"table-cell\">
        <div class=\"block\">
            <div class=\"block_title\"><p>" . $item['head'] . "</p></div>
            <div class=\"block_description\"></div>
        </div>
    </div>";
        }
        ?>
    </div>
</div>
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