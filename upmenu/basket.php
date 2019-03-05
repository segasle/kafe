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