<h1 class="text-center">Корзина</h1>
<div class="table">
    <?php
    $array = array(
        array(
            'head' => 'Изображения',
        ),
        array(
            'head' => 'Названия',
        ),
        array(
            'head' => 'Количество',
        ),
        array(
            'head' => 'Сумма',
        ),
        array(
            'head' => 'Итого',
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
            <div class="checkbox">
                <label>
                    <input type="checkbox"> Remember me
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Sign in</button>
        </div>
    </div>
</form>