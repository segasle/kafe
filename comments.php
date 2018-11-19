<h1 class="text-center">Отзывы</h1>
<?php echo comm(); ?>
<form action="" class="form-input" method="post" id="registration-form">
    <div class="form-group">
        <label for="exa">Ваше имя</label>
        <input  type="text" class="form-control" name="name" id="exa" placeholder="Имя">
    </div>
    <div class="form-group">
        <label for="presentation">Напишите текст</label>
        <div><textarea name="content" id="presentation"  rows="10" cols="30"
                  class="form__textarea"></textarea><span id="pres-max-length">1000</span>
    </div></div>
    <button type="submit" class="btn btn-default" name="comm" style="display: block;">Отправиить</button>
</form>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script>

    $.validate({
        modules : 'location, date, security, file',
        onModulesLoaded : function() {
            $('#country').suggestCountry();
        }
    });

    // Restrict presentation length
    $('#presentation').restrictLength( $('#pres-max-length') );

</script>
<h2 class="text-center">Список отзывов</h2>
<?php echo post_comm();