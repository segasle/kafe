<?php 
    $sum_price = 0;
    $header = '';
    $count = '';

    
    if ( isset($_POST['delete']) ) {
        foreach ($_SESSION['prod'] as $key => $value) {
            if ($value['id_products'] == $_POST['id']) {
                unset($_SESSION['prod'][$key]);
                break;
            }
        }
    }

    if (isset($_POST['submit2'])) {
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
            $errors[] = "Вы непраильно ввели номер телефона, пример: +7(915)5473712";
        }
        if (empty($data['address'])) {
            $errors[] = 'Не ввели адрес';
        }
        if (empty($errors)) {
            $_SESSION['phone'] = $phone;
            $_SESSION['address'] = $data['address'];
            if (empty($data['sms'])) {
                $sms = 0;
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
                    $mess .= $item['header'] . ' ' . $prod['count'] . 'шт' . ',';
                }
                $mess .= 'Сумма ' . $sum_price . 'руб';
                $mess .= $_SESSION['phone'] . ', ' . $_SESSION['address'] . ', ' . $sms;
                $to = 'segasle@yandex.ru';
                $subject = 'Заказ продуктов';
                $message = "$mess";
                $headers = 'From: segasle@kafe-lyi.ru' . "\r\n" .
                    'Reply-To: segasle@kafe-lyi.ru' . "\r\n" .
                    "Content-Type: text/plain; charset=\"UTF-8\"\r\n"
                    . 'X-Mailer: PHP/' . phpversion();
                $mail = mail("$to", "$subject", "$message", "$headers");
                if ($mail) {
                    unset($_SESSION['prod']);
                    echo '<div class="go">Успешно отправлено</div>';
                    echo '<script>setTimeout(\'location="?page=basket"\', 10000)</script>';
                }
            }
            
        } else {
            echo "<div class='errors'>" . array_shift($errors) . "</div>";
        }
    }
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
        if ( isset($_COOKIE['user']) ) {
            $user = json_decode($_COOKIE['user']);
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
        } elseif ( isset($_SESSION['prod']) ) {
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
                        <input type=\"hidden\" name=\"id\" value=". $item['idd'] .">
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
            <th scope="col">Скидка</th>
            <th scope="col">Сумма</th>
            <th scope="col">Итого</th>
        </tr>
        </thead>
        <tbody>
        <?php
        echo "<tr>
                  <td>10 %</td>
                  <td>" . $sum_price . "</td>
                  <td scope=\"col\">" . ($sum_price - $sum_price * 10 / 100) . "</td>";
        ?>
        </tbody>
    </table>
    <?php if ( isset($_COOKIE['user']) ) {  ?>
    <p class="h3 text-center">Для зарегистрованных пользователей</p>
    <form class="form-horizontal" method="post">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Email">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default button" name="submit">Отправить заказ</button>
            </div>
        </div>
    </form>
    <?php
//        if (isset($_POST['submit'])) {
//            if (!empty(mysqli_fetch_array($res))) {
//                if (login()){
//                    $do = do_query("SELECT * FROM `cart` JOIN `products` WHERE cart.id_products = products.idd");
//                        $mess = '';
//                        foreach ($do as $item) {
//                            $mess .= $item['header'] . ' ' . $item['count'] . 'шт' . ',';
//                        }
//                        $mess .= 'Сумма ' . $sum_price . 'руб';
//                        $mess .= $_SESSION['phone'] . ', ' . $_SESSION['address'];
//                        $to = 'segasle@yandex.ru';
//                        $subject = 'Заказ продуктов';
//                        $message = "$mess";
//                        $headers = 'From: segasle@kafe-lyi.ru' . "\r\n" .
//                            'Reply-To: segasle@kafe-lyi.ru' . "\r\n" .
//                            "Content-Type: text/plain; charset=\"UTF-8\"\r\n"
//                    . 'X-Mailer: PHP/' . phpversion();
//                        $mail = mail("$to", "$subject", "$message", "$headers");
//                        if ($mail) {
//                            $del = do_query("DELETE FROM `cart` WHERE id_users = $user->id");
//                            if ($del) {
//                                echo '<div class="go">Успешно отправлено</div>';
//                                echo '<script>setTimeout(\'location="?page=basket"\', 10000)</script>';
//                            }
//                        }
//                }
//                //login();
//            } else {
//                echo "<div class='errors'>Корзина пуста</div>";
//            }
//        }
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
                <input type="tel" class="form-control" id="inputPassword3" name="phone" placeholder="Номер"
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
