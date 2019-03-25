<h1 class="text-center">Мероприятия</h1>
<?php  events(); event_mail();?>
<form action="" method="post" class="form-input">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <label for="name">Ваше имя</label>
            <input type="text" name="name" placeholder="Имя" id="name"  class="form-control">
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <label for="surname">Ваша фамилия</label>
            <input type="text" name="surname" id="surname" placeholder="Фамилия" class="form-control">
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <label for="phone">Ваш телефон</label>
            <input type="text" name="phone" placeholder="Телефон" id="phone" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <label for="event">Выберите мериприятие</label>
            <select name="event" id="event" class="form-control">
                <option value="День рождения">День рождения</option>
                <option value="Садьба">Садьба</option>
                <option value="Похороны">Похороны</option>
            </select>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <label for="rooms">Выберите помещение</label>
            <select name="rooms" id="rooms" class="form-control">
                <option value="Открытое">Открытое</option>
                <option value="Закрытое">Закрытое</option>
            </select>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <label for="data">Выберите дату и время</label>
            <input type="date" name="data" id="data" class="form-control">
        </div>
    </div>
    <button type="submit" class="btn btn-default" name="submit">Отправиить</button>
</form>