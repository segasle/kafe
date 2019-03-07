
<h1 class="text-center">Авторизация</h1>
<?php echo login(); ?>
<form action="" class="form-input" method="post">
    <?php
    $array = array(
        array(
            'for' => 'exampleInputEmail1',
            'head' => 'Ваш email',
            'type' => 'text',
            'name' => 'email',
            'placeholder' => 'Email',
        ),
        array(
            'for' => 'exampleInputPassword1',
            'head' => 'Пароль',
            'type' => 'password',
            'name' => 'password',
            'placeholder' => 'Пароль',
        ),
    );
    foreach ($array as $item) {
        $name = $item['name'];
        echo '<div class="form-group">
        <label for="'.$item['for'].'">'.$item['head'].'</label>
        <input type="'.$item['type'].'" class="form-control" name="'.$item['name'].'" id="'.$item['for'].'" placeholder="'.$item['placeholder'].'" value="'.@$_POST[$name].'">
    </div>';
    }
    ?>
    <div class="checkbox">
        <label>
            <input type="radio" name="check"> Заполнить меня
        </label>
    </div>
    <button type="submit" class="btn btn-default" name="submit">Войти</button>
</form>