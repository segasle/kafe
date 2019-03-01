<?php echo login();?>
<h1 class="text-center">Авторизация</h1>
<form action="" class="form-input" method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">Ваш email</label>
        <input type="text" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Пароль</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password1" placeholder="Пароль">
    </div>
    <div class="checkbox">
        <label>
            <input type="radio"> Заполнить меня
        </label>
    </div>
    <button type="submit" class="btn btn-default" name="submit">Войти</button>
    <input type="hidden" name="event" value="login">
</form>