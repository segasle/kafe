<?php echo registration(); ?>
<h1 class="text-center">Регистрация</h1>
<?php
$array = array(
    array(
        'head' => 'Ваш email',
        'for' => 'exampleInputEmail1',
        'type' => 'text',
        'name' => 'email',
        'placeholder' => 'Email',
    ),
    array(
        'head' => 'Придумаете логин',
        'for' => 'exampleInputLogin2',
        'type' => 'text',
        'name' => 'login',
        'placeholder' => 'Логин',
    ),
    array(
        'head' => 'Придумаете пароль',
        'for' => 'exampleInputPassword1',
        'type' => 'password',
        'name' => 'pass_confirmation',
        'placeholder' => 'Пароль',
    ),
    array(
        'head' => 'Подтведите пароль',
        'for' => 'exampleInputPassword2',
        'type' => 'password',
        'name' => 'password2',
        'placeholder' => 'Пароль',
    ),
    array(
        'head' => 'Номер телефона',
        'for' => 'exampleInputTel',
        'type' => 'tel',
        'name' => 'phone',
        'placeholder' => 'Телефон',
    ),
    array(
        'head' => 'Адрес',
        'for' => 'exampleInputAddress',
        'type' => 'text',
        'name' => 'address',
        'placeholder' => 'Адрес',
    ),
);

?>
<form action="" id="registration-form" class="form-reg" method="post">
    <?php
    foreach ($array as $item) {
        echo '<div class="form-group">
        <label for="' . $item['for'] . '" class="point">' . $item['head'] . '</label>
        <input type="' . $item['type'] . '" class="form-control" name="' . $item['name'] . '" id="' . $item['for'] . '" placeholder="' . $item['placeholder'] . '">
    </div>';
    }

    ?>
    <div class="checkbox">
        <label>
            <input type="checkbox">
            Вы должны согласится со правами на <a target="_blank" href="">сборку персоналых данных</a>
        </label>
    </div>
    <button type="submit" name="event" class="btn btn-default">Отправить</button>
</form>