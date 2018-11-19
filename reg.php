<?php echo registration(); ?>
<h1 class="text-center">Регистрация</h1>
<form action="" id="registration-form" class="form-reg" method="post">
    <div class="form-group">
        <label for="exampleInputEmail1" class="point">Ваш email</label>
        <input type="text" class="form-control" name="email"  id="exampleInputEmail1" placeholder="Email"
               data-validation="email"
               data-validation-error-msg="Некорретно введина почта">
    </div>
    <div class="form-group">
        <label for="exampleInputLogin2" class="point">Придумаете логин</label>
        <input type="text" class="form-control" id="exampleInputLogin2" value="<?php // echo @$data['login'];?>" name="login" placeholder="Логин"
               data-validation="length alphanumeric"
               data-validation-length="3-12"
               data-validation-error-msg="Введите имя длинее (3-12 симлов)">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1" class="point">Придумаете пароль</label>
        <input type="password" class="form-control" id="exampleInputPassword1" value="<?php //echo @$data['password1'];?>" name="pass_confirmation" placeholder="Пароль"
               data-validation="length strength" data-validation-length="min6" data-validation-error-msg="Короткий пароль, должно быть не меньше 6 симлов"
               data-validation-strength="2">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword2" class="point">Подтвердите пароль</label>
        <input type="password" class="form-control" id="exampleInputPassword2" name="pass"
               data-validation="confirmation" data-validation-error-msg="Не правильно введен пароль">
    </div>
    <div class="checkbox">
        <label>
            <input type="checkbox" data-validation="required"
                   data-validation-error-msg="Поставьте галочку">
            Вы должны согласится со правами на <a target="_blank" href="">сборку персоналых данных</a>
        </label>
    </div>
    <button type="submit" name="event" class="btn btn-default" onclick="form(document.getElementById('registration-form'))">Отправить</button>
</form>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script><script>

    $.validate({
        modules : 'location, date, security, file',
        onModulesLoaded : function() {
            $('#country').suggestCountry();
        }
    });

    // Restrict presentation length
    $('#presentation').restrictLength( $('#pres-max-length') );
    $.validate({
        modules : 'security'
    });
</script>