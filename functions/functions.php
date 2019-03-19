<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
header('Content-Type: text/html; charset=utf-8');

function connections()
{
    $file = '';
    if (empty($_GET['page'])) {
        $file = 'main';
    } else {
        $file = $_GET['page'];
    }
    include 'tempate/header.php';
    if (file_exists('food/' . $file . '.php')) {
        include 'food/' . $file . '.php';
    } elseif (file_exists('users/' . $file . '.php')) {
        if (isset($_COOKIE['user'])) {
            include 'users/' . $file . '.php';
        }else{
            include 'upmenu/404.php';
        }

    } else {
        include 'upmenu/' . $file . '.php';
    }
    include 'tempate/footer.php';

}

function do_query($query)
{
    global $mysqli;

    $result = mysqli_query($mysqli, $query);
    return $result;
}

function menu()
{
    $menu = do_query("SELECT * FROM `menu` WHERE `parent` = '0' ORDER BY menu.id");
    $user = do_query("SELECT * FROM `menu` WHERE `parent` = '1' ORDER BY menu.id");
    $food = do_query("SELECT * FROM `menu` WHERE `parent` = '2' ORDER BY menu.id");
    $users = do_query("SELECT * FROM `menu` WHERE `parent` = '3' ORDER BY menu.id");
    $out = '<div class="menu_up"><ul>';
    foreach ($menu as $item) {
        $out .= '<li><a href="' . $item['link'] . '">' . $item['title'] . '</a></li>';
    }
    $out .= '</ul>';
    if (!isset($_COOKIE['user'])) {
        $out1 = '<div class="menu_food"><ul class="user_account">';
        foreach ($user as $item) {
            $out1 .= '<li><a href="' . $item['link'] . '">' . $item['title'] . '</a></li>';
        }
        $out1 .= '</ul></div>';
    } else {
        $out1 = '<div class="menu_user"><ul>';
        foreach ($users as $user) {
            $out1 .= '<li><a href="' . $user['link'] . '">' . $user['title'] . '</a></li>';

        }
        $out1 .= '</ul></div>';

    }

    $out2 = '<ul>';
    foreach ($food as $item) {
        $out2 .= '<li class="red"><a href="' . $item['link'] . '">' . $item['title'] . '</a></li>';
    }
    $out2 .= '</ul></div>';
    return $out . $out2 . $out1;

}

function comm()
{
    if (isset($_POST['comm'])) {
        $data = $_POST;
        $result = do_query("SELECT COUNT(*) as count FROM comment WHERE `name` = '{$data['name']}'");
        $result = $result->fetch_object();
        $errors = array();
        if ($data['name'] == '' or $data['name'] == ' ') {
            $errors = 'Вы не ввели имя';
            if (trim($data['name']) <= 3 or trim($data['name']) >= 16) {
                $errors[] = 'имя должен составлять от 3 до 16 символов';

            }

        }

        if (empty($data['content'])) {
            $errors = 'Вы не написали отзыв';
            if ($data['content'] <= 10 or $data['content'] >= 1000) {
                $errors[] = 'Отзыв должен составлять от 10 до 1000 символов';
            }
        }
        if (empty($errors)) {
            if (!empty($result)) {
                // сохраняет все данные в БД
                $wer = do_query("INSERT INTO comment (`name`,`content`)VALUES ('{$data['name']}','{$data['content']}')");
                if (!empty($wer)) {
                    echo '<div class="go">Успешно отправлено</div>';
                }
            }
        } else {
            echo '<div class="errors">' . array_shift($errors) . '</div>';
        }
    }
    return;
}

function post_comm()
{
    $query = do_query("SELECT `name`, `content`, `data` FROM `comment` ORDER BY `id` DESC");
    $myrow_otzivi = mysqli_fetch_array($query);

    if ($myrow_otzivi['name']) {
        do {
            $mydata = new DateTime($myrow_otzivi['data']);
            echo "<div class='comment'>";
            echo "<div class='row'><div class='col-lg-6 col-xs-6'><div class='glyphicon glyphicon-user'></div><span class='user'>" . $myrow_otzivi['name'] . "</span> </div><div class='col-lg-6 col-xs-6'><div class='glyphicon glyphicon-time'></div><span class='data'>" . $mydata->format('d.m.Y H:i:s') . "</span> </div></div>";
            echo "<div class='content-text'><div><p>" . $myrow_otzivi['content'] . "</p></div></div>";
            echo "</div>";
        } while ($myrow_otzivi = mysqli_fetch_array($query));
    } else {
        echo 'нет отзыва, вы будете первыми';
    }
    return;
}

function events()
{
    if (isset($_POST['submit'])) {
        $data = $_POST;
        $errors = array();
        $tempate = '^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$';
        $sub = $data['phone'];
        if (empty($data['name'])) {
            $errors = 'Вы не ввели имя';
        }
        if (empty($data['surname'])) {
            $errors[] = 'Вы не ввели фамилию';
        }
        if (empty($data['phone'])) {
            $errors[] = 'Вы не ввели телефлон';
        }
        if (empty($data['data'])) {
            $errors[] = 'Вы не ввели дату';
        }
        if (preg_match("$tempate", "$sub", $matc) == false) {
            $errors[] = 'Введите правильный формат, пример 89153213322';
        }
        if (empty($errors)) {
            $result = do_query("SELECT COUNT(*) as count FROM events WHERE `data` = '{$data['data']}'");

            $result = $result->fetch_object();
            if (!empty($result->count)) {
                echo '<div class="errors">К сожелению эта дата занята, выберите другой день!</div>';
            } else {
                // сохраняет все данные в БД
                $wer = do_query("INSERT INTO `events` (`id`, `name`, `surname`, `phone`, `event`, `rooms`, `data`) VALUES (NULL, '{$data['name']}', '{$data['surname']}', $matc, '{$data['event']}', '{$data['rooms']}', '{$data['data']}')");
                if (!empty($wer)) {
                    echo '<div class="go">Успешно отправлено! Подождите, когда наш оператор свяжется с вами</div>';
                }
            }
        } else {
            echo '<div class="errors">' . array_shift($errors) . '</div>';
        }
    }
    return;
}

function event_mail()
{

    if (isset($_POST)) {


        $data = $_POST;

        if (!empty($data)) {
            $mess = implode("", $data);
            $to = 'kafe-lyi@yandex.ru';
            $subject = 'Заказ';
            $message = "$mess";
            $headers = 'From: segasle@kafe-lyi.ru' . "\r\n" .
                'Reply-To: segasle@kafe-lyi.ru' . "\r\n" .
                "Content-Type: text/plain; charset=\"UTF-8\"\r\n"
                . 'X-Mailer: PHP/' . phpversion();

            mail("$to", "$subject", "$message", "$headers");

        }
    }
    return;
}

function get_product()
{
    $product = do_query("SELECT * FROM `products` JOIN `menu` WHERE products.categories = menu.id");
    $out = '<div class="row">';
    foreach ($product as $item) {
        if (isset($item['img'])) {
            $img = '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"><img src="photo/pizza/' . $item['img'] . '" class="img elements"></div>';
        } else {
            $img = '';
        }
        if (isset($item['weight'])) {
            $weight = ' <p class="weight">' . $item['weight'] . 'гр </p>';
        } else {
            $weight = '';
        }
        if (isset($item['description'])) {
            $description = $item['description'];
        } else {
            $description = '';
        }
        if (isset($item['head'])) {
            $head = '<p class="h3">' . $item['head'] . '</p>';
        } else {
            $head = '';
        }
        if (isset($item['header'])) {
            $header = '    <div class="elements">
                                    <p class="elements">' . $item['header'] . '</p>
                                </div>';
        } else {
            $header = '';
        }
        if (isset($item['price'])) {
            $price = '<p class="price">' . $item['price'] . 'p</p>';
        } else {
            $price = '';
        }
        if (isset($item['price2'])) {
            $price2 = '<p class="price">' . $item['price2'] . 'p</p>';
        } else {
            $price2 = '';
        }
        if (isset($item['img']) or isset($item['weight']) or isset($item['description']) or isset($item['header']) or isset($item['price']) or isset($item['price2'])) {
            $col = ' <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">             <div class="block_content">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                ' . $header . '   
                                <div class="elements">
                                    <p class="text_content">' . $description . '</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="pull-right">
                                    <div class="elements">
                                        <div class="block_weight_price">
                                           
                                            ' . $weight . $price . $price2 . '
                                            
                                        </div>
                                    </div>
                                    <div class="elements">
                                    <form action="" method="post">
                                    <input type="number" value="1" class="number"> 
                                    <button type="button" class="js-basket" data-id="'.$item['idd'].'" name="'.$item['idd'].'">добавить</button>
</form>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                </div>';
        } else {
            $col = '';
        }
        if ($item['catg'] == $_GET['page']) {
            $out .= '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                ' . $img . $head . $col . '
            
            
            </div>
         </div>';
        }
    }
    $out .= '</dov>';
    return $out;
}
function clear_string($str) {
    return trim(strip_tags($str));
}
function basket_open()
{
    if (isset($_POST['basket'])) {
        header('location: ?page=basket');
    }
}

function registration()
{
    $out = '';
    if (isset($_POST['submit'])) {
        $data = $_POST;
        $email = $data['email'];
        $errors = array();
        $phone = $data['phone'];
        if (!isset($data['checkbox'])) {
            $errors[] = 'Не поставили галочку';
        }
        if (empty(trim($data['login']))) {
            $errors[] = 'Вы не ввели имя';

        }
        if (empty(trim($data['email']))) {
            $errors[] = 'Вы не ввели электронную почту';
        }
        if (!preg_match("/^(?!.*@.*@.*$)(?!.*@.*\-\-.*\..*$)(?!.*@.*\-\..*$)(?!.*@.*\-$)(.*@.+(\..{1,11})?)$/", "$email")) {
            $errors[] = 'Вы неправильно ввели электронную почту';
        }
        if (empty($data['pass_confirmation'])) {
            $errors[] = 'Вы не ввели пароль';

        }
        if ($data['pass_confirmation'] >= 6) {
            $errors[] = 'короткий пароль';
        }

        if ($data['password2'] != $data['pass_confirmation']) {
            $errors[] = 'Вы не правильно ввели пароль';
        }
        if (!preg_match("/(^(?!\+.*\(.*\).*\-\-.*$)(?!\+.*\(.*\).*\-$)(\+[0-9]{1,3}\([0-9]{1,3}\)[0-9]{1}([-0-9]{0,8})?([0-9]{0,1})?)$)|(^[0-9]{1,4}$)/", "$phone")) {
            $errors[] = "Вы непраильно ввели номер телефона, пример: +7(915)5473712";
        }
        if (empty(trim($data['address']))) {
            $errors[] = "Вы не ввели адрес";
        }
        if (empty($errors)) {
            $result = do_query("SELECT COUNT(*) as count FROM users WHERE `email` = '{$data['email']}'");
            $result = $result->fetch_object();
            if (empty($result->count)) {
                // сохраняет все данные в БД
                $wer = do_query("INSERT INTO users (`login`, `email`, `password`, `phone`, `address`) VALUES ('{$data['login']}','{$data['email']}','" . password_hash($data['password2'], PASSWORD_DEFAULT) . "','{$data['phone']}','{$data['address']}')");
                if (!empty($wer)) {
                    $out = '<div class="go">Успешно зарегиревались</div>';
                }
            } else {
                $out = '<div class="errors">Такая электронная почта уже есть</div>';
            }
        } else {
            $out = '<div class="errors">' . array_shift($errors) . '</div>';
        }
    }
    return $out;
}

function login()
{

    $out = '';
    $data = $_POST;
    if (isset($data['submit'])) {
        $email = $data['email'];
        $password = $data['password'];
        $resilt = mysqli_fetch_assoc(do_query("SELECT * FROM `users` WHERE `email` ='" . $email . "'"));
        if ($resilt) {
            if (!password_verify($password, $resilt['password'])) {
                $out = '<div class="errors">Пароль не верный</div>';
            }
        } else {
            $out = '<div class="errors">Пользоаатель не найден</div>';
        }
    }
    return $out;
}

function user_login()
{
    $data = $_POST;

    $resilt = mysqli_fetch_assoc(do_query("SELECT * FROM `users`"));
    if (isset($data['submit'])) {
        if (isset($data['check'])) {
            setcookie('user', json_encode($resilt), time() + 3600 * 24 * 30 * 12);

            $_COOKIE['user'] = $resilt['id'];
            if (isset($_COOKIE['user'])) {
                header('location: ?page=main');
            }
        } else {
            setcookie('user', json_encode($resilt));
            $_COOKIE['user'] = $resilt['id'];
            if (isset($_COOKIE['user'])) {
                header('location: ?page=main');
            }
        }
    }
    //return;
}
