<?php
//require_once '../smsru_php/sms.ru.php';
$sum_price = 0;
$header = '';
$count = '';
$action = 10; // акция в %
?>
    <h1 class="text-center">Корзина</h1>
    <div class="container">
    <table class="table table-bordered table-sm">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Названия</th>
            <th scope="col">Количество</th>
            <th scope="col">Цена</th>
            <th scope="col">Сумма</th>
            <th scope="col">Удалить</th>
        </tr>
        </thead>
        <tbody>
        <?php
        //Запрос на получения товаров из корзины (в будущем надо вместо cart.ip = 'POST' привязать к таблице users)
        if (isset($_SESSION['user'])) {
            $user = json_decode($_SESSION['user']);
            $res = do_query("SELECT * FROM products JOIN cart WHERE cart.id_users = $user->id AND products.idd = cart.id_products");
            foreach ($res as $item) {
                $sum_price += $item['count'] * $item['price'];
                $header = $item['header'];
                $count = $item['count'];
                echo "<tr>
                      <td>" . $header . "</td>
                      <td>" . $count . "</td>
                      <td>" . $item['price'] . "</td>
                      <td>" . $count * $item['price'] . "</td>
                      <td>
                      <form action='' method='post'>
                        <button type=\"submit\" name='" . $item['id'] . "'>
                         <i class=\"fa fa-trash-o fa-2x\" aria-hidden=\"true\"></i>
                        </button></form>
                      </td>
                    </tr>";
            }
        } elseif (isset($_SESSION['prod'])) {
            foreach ($_SESSION['prod'] as $prod) {
                $idd = $prod['id_products'];
                $res = do_query("SELECT * FROM products WHERE idd = $idd");
                $item = mysqli_fetch_array($res);
                $sum_price += $prod['count'] * $item['price'];
                $header = $item['header'];
                $count = $prod['count'];
                echo "<tr>
                      <td>" . $header . "</td>
                      <td>" . $count . "</td>
                      <td>" . $item['price'] . "</td>
                      <td>" . $count * $item['price'] . "</td>
                      <td>
                      <form action='' method='post'>
                        <input type=\"hidden\" name=\"id\" value=" . $item['idd'] . ">
                        <button type=\"submit\" name=\"delete\" class=\"js-delete_prod\">
                         <i class=\"fa fa-trash-o fa-2x\" aria-hidden=\"true\"></i>
                        </button></form>
                      </td>
                    </tr>";
            }
        }
        ?>
        </tbody>
    </table>
    <table class="table table-bordered table-sm">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Акция</th>
            <!--<th scope="col">Сумма</th>-->
            <th scope="col">Итого</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $action_text = 'От 1500 рублей акция, бутылка колы в подарок';
        if ($sum_price > 1500) {
            $action_text = 'литровая  бутылка колы  в подарок!';
        }

        if (isset($mail) and $mail == true) {
            $sum_price = 0;
        }

        echo "<tr>
                  <td>" . $action_text . "</td>
                  <td>" . $sum_price . "</td>";
        //<td scope=\"col\">" . ($sum_price - $sum_price * $action / 100) . "</td>";
        ?>
        </tbody>
    </table>
<?php if (isset($_SESSION['user'])) { ?>
    <form class="form-horizontal" method="post">
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default button" name="submit_cart_login">Отправить заказ</button>
            </div>
        </div>
    </form>
    <?php

} else {

    ?>
    <p class="h3 text-center">Быстрый заказ</p>
    <form class="form-horizontal" method="post">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Email"
                       value="<?php echo @$_POST['email'] ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Номер телефона</label>
            <div class="col-sm-10">
                <input type="tel" class="form-control phone-number" id="inputPassword3" name="phone" placeholder="Номер"
                       value="<?php echo @$_POST['phone'] ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Адрес</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword3" name="address" placeholder="Адрес"
                       value="<?php echo @$_POST['address'] ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Сообщения</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="sms"><?php echo @$_POST['sms'] ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default button" name="submit2">Отправить заказ</button>
            </div>
        </div>
    </form>
    </div>
    <?php

}

if (isset($_POST['delete'])) {
    foreach ($_SESSION['prod'] as $key => $value) {
        if ($value['id_products'] == $_POST['id']) {
            unset($_SESSION['prod'][$key]);
            break;
        }
    }
}

if (isset($_POST['submit_cart_login'])) {
    $res = do_query("SELECT * FROM `cart` WHERE `id_users` = $user->id");
    if (mysqli_num_rows($res) > 0) {
        $user = json_decode($_SESSION['user']);
        $do = do_query("SELECT * FROM `cart` JOIN `products` WHERE `id_users` = $user->id AND cart.id_products = products.idd");
        $mess = '';
        foreach ($do as $item) {
            $sum_price += $item['count'] * $item['price'];
            $mess .= $item['header'] . ' ' . $item['count'] . 'шт' . '<br>';
        }
        $sum_price = $sum_price / 2; // 10 % акции..
        $mess .= ' Сумма = ' . $sum_price . 'руб' . "<br>";
        $mess .= $user->phone . ', ' . $user->address;
        $to = 'kafe-lyi@yandex.ru';
        $subject = 'Заказ продуктов';
        $message = "$mess";
        $headers = 'From: segasle@kafe-lyi.ru' . "\r\n" .
            'Reply-To: segasle@kafe-lyi.ru' . "\r\n" .
            "Content-Type: text/html; charset=\"UTF-8\"\r\n"
            . 'X-Mailer: PHP/' . phpversion();
        $mail = mail("$to", "$subject", "$message", "$headers");
        if ($mail) {
//
//            $smsru = new SMSRU('[зарегистрируйтесь, чтобы получить api_id]'); // Ваш уникальный программный ключ, который можно получить на главной странице
//
//            $data = new stdClass();
//            $data->to = 'телефон, на который регистрировались';
//            $data->text = 'Hello World'; // Текст сообщения
//// $data->from = ''; // Если у вас уже одобрен буквенный отправитель, его можно указать здесь, в противном случае будет использоваться ваш отправитель по умолчанию
//// $data->time = time() + 7*60*60; // Отложить отправку на 7 часов
//// $data->translit = 1; // Перевести все русские символы в латиницу (позволяет сэкономить на длине СМС)
//// $data->test = 1; // Позволяет выполнить запрос в тестовом режиме без реальной отправки сообщения
//// $data->partner_id = '1'; // Можно указать ваш ID партнера, если вы интегрируете код в чужую систему
//            $sms = $smsru->send_one($data); // Отправка сообщения и возврат данных в переменную
//
//            if ($sms->status == "OK") { // Запрос выполнен успешно
//                echo "Сообщение отправлено успешно. ";
//                echo "ID сообщения: $sms->sms_id. ";
//                echo "Ваш новый баланс: $sms->balance";
//            } else {
//                echo "Сообщение не отправлено. ";
//                echo "Код ошибки: $sms->status_code. ";
//                echo "Текст ошибки: $sms->status_text.";
//            }
            $del = do_query("DELETE FROM cart WHERE `id_users` = $user->id");
            if ($del) {
                echo '<div class="go">Успешно отправлено</div>';
                $_COOKIE['count'] = 0;
                //  echo '<script>setTimeout(\'location="?page=main"\', 2000)</script>';
            }
        }
    } else {
        echo "<div class='errors'>Корзина пуста</div>";
    }
}

if (isset($_POST['submit2'])) {
    if (isset($_SESSION['prod'])) {
        $data = $_POST;
        $phone = $data['phone'];
        $email = $data['email'];
        $errors = array();
        if (empty($data['email'])) {
            $errors[] = 'Не ввели email';
        }
        if (!preg_match("/^(?!.*@.*@.*$)(?!.*@.*\-\-.*\..*$)(?!.*@.*\-\..*$)(?!.*@.*\-$)(.*@.+(\..{1,11})?)$/", "$email")) {
            $errors[] = 'Вы неправильно ввели электронную почту';
        }
        if (!preg_match("/(^(?!\+.*\(.*\).*\-\-.*$)(?!\+.*\(.*\).*\-$)(\+[0-9]{1,3}\([0-9]{1,3}\)[0-9]{1}([-0-9]{0,8})?([0-9]{0,1})?)$)|(^[0-9]{1,4}$)/", "$phone")) {
            $errors[] = "Вы неправильно ввели номер телефона, пример: +7(915)5473712";
        }
        if (empty($data['address'])) {
            $errors[] = 'Не ввели адрес';
        }
        if (empty($errors)) {
            $_SESSION['phone'] = $phone;
            $_SESSION['address'] = $data['address'];
            if (empty($data['sms'])) {
                $sms = '';
            } else {
                $sms = $data['sms'];
            }
            $dat = do_query("INSERT INTO `order` (`email`, `phone`, `address`, `sms`) VALUES ('{$data['email']}','{$data['phone']}','{$data['address']}', '{$sms}')");
            if ($dat) {
                $mess = '';
                foreach ($_SESSION['prod'] as $prod) {
                    $idd = $prod['id_products'];
                    $res = do_query("SELECT * FROM products WHERE idd = $idd");
                    $item = mysqli_fetch_array($res);
                    $mess .= $item['header'] . ' ' . $prod['count'] . 'шт' . '<br>';
                }
                $mess .= 'Сумма =' . $sum_price . 'руб <br>';
                $mess .= $_SESSION['phone'] . ', ' . $_SESSION['address'] . ', ' . $sms;
                $to = 'kafe-lyi@yandex.ru';
                $subject = 'Заказ продуктов';
                $message = "$mess";
                $headers = 'From: segasle@kafe-lyi.ru' . "\r\n" .
                    'Reply-To: segasle@kafe-lyi.ru' . "\r\n" .
                    "Content-Type: text/html; charset=\"UTF-8\"\r\n"
                    . 'X-Mailer: PHP/' . phpversion();
                $mail = mail("$to", "$subject", "$message", "$headers");
                if ($mail) {
                    unset($_SESSION['prod']);
                    echo '<div class="go">Успешно отправлено</div>';
                    //echo '<script>setTimeout(\'location="?page=main"\', 2000)</script>';
                }
            }

        } else {
            echo "<div class='errors'>" . array_shift($errors) . "</div>";
        }
    } else {
        echo '<div class="errors">Корзина пуста</div>';
    }
}

