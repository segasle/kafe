<h1 class="text-center">Корзина</h1>
<div class="table">
    <?php
    $array = array(
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

    );
    foreach ($array as $item) {
        echo "<div class=\"table-cell\">
        <div class=\"block\">
            <div class=\"block_title\"><p>" . $item['head'] . "</p></div>
            <div class=\"block_description\"></div>
        </div>
    </div>";
    }
    ?>
</div>
<div>
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
</div></div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <p class="h3">Для зарегированных пользователей</p>
        <form class="form-horizontal">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input name="email" type="email" class="form-control" id="inputEmail3" placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="inputPassword3"
                           placeholder="Password">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default" name="submit">Отправить заказ</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <p class="h3">Быстрый заказ</p>
        <form action="" class="form-horizontal">
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Номер телефона</label>
                <input type="tel" class="form-control"></div>
            <div class="form-group">
                <label for="">Адрес</label>
                <input type="text" class="form-control"></div>
            <div class="form-group">
                <label for="">Имя</label>
                <input type="email" class="form-control"></div>
            <div class="form-group">
                <label for="">Сообщения</label>
                <textarea rows="7" class="form-control"></textarea>
            </div>                                                                <button type="submit" class="btn btn-default" name="submitshow">Отправить заказ</button>
        </form>
    </div>
</div>