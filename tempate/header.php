<?php
// Получаем количество товаров в корзине
if ( !empty($_COOKIE['user']) ) {
    $user = json_decode($_COOKIE['user']);
    $res = do_query("SELECT count FROM cart WHERE 'id_users' = $user->id");
    // проверям, есть ли у данного пользователя есть товары в корзине
    if ($res) {
        // если есть, считаем их сумму
        $count = 0;
        foreach ($res as $item) {
            $count += $item['count'];
        }
    } else {
        // это если нет товаров в корзине
        $count = 0;
    }
    if ( !isset($_COOKIE['count']) ) {
        setcookie('count', $count);
    } else {
        $_COOKIE['count'] = $count;
    }
} else {
    if ( empty($_SESSION['prod']) ) {
            setcookie('count', 0);
    } else {
        $sum_p = 0;
        foreach ($_SESSION['prod'] as $key => $prod) {
            $sum_p += $prod['count'];
        }
        $_COOKIE['count'] = $sum_p;
    }
}
// тут проверяем наличие куки "count", если нет, создает, если есть, туда записываем значение $count


if (isset($_GET['page']) and $_GET['page'] == 'basket'){
    $di = do_query("SELECT * FROM `cart`");
    foreach ($di as $value){
        $id = $value['id'];
        if (isset($_POST[$id])){
            $del = do_query("DELETE FROM `cart` WHERE `id` = $id");
            if ($del){
                header('location: ?page=basket');
            }
        }
    }

}
?>
<!doctype html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta property="og:locale" content="ru_RU">
    <meta property="og:type" content="article">
    <meta property="og:title" content="Кострово - кафе Луи">
    <meta property="og:description" content="ru_RU">
    <meta property="og:site_name" content="kafe-lyi">
    <meta name="robots" content="index, follow">
    <meta name="keywords" content="Кафе, kafe, кафе луи, kafe lyi, кафе кострово,">
    <meta name="description" content="Кафе ЛУИ в кострово, ">
    <meta name="yandex-verification" content="f9bd44cd040d50da"/>
    <?php include 'functions/head.php'; ?>
    <title><?php echo $title; ?></title>
    <link rel="icon" href="photo/logo.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css?t=<?php echo(microtime(true) . rand()); ?>">
    <link rel="stylesheet" href="icons/css/font-awesome.min.css">
    <script type="text/javascript">
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function () {
                try {
                    w.yaCounter50804785 = new Ya.Metrika2({
                        id: 50804785,
                        clickmap: true,
                        trackLinks: true,
                        accurateTrackBounce: true,
                        webvisor: true
                    });
                } catch (e) {
                }
            });

            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () {
                    n.parentNode.insertBefore(s, n);
                };
            s.type = "text/javascript";
            s.async = true;
            s.src = "https://mc.yandex.ru/metrika/tag.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else {
                f();
            }
        })(document, window, "yandex_metrika_callbacks2");
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/50804785" style="position:absolute; left:-9999px;" alt=""/></div>
    </noscript>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-92619689-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-92619689-3');
    </script>


</head>

<body>
<div class="container-fluid">
    <form action="" method="post">
        <button type="submit" name="basket" class="basket js-button-basket">

            <i class="fa fa-shopping-basket fa-2x"></i>
            <p class="count_products_in_cart"><?= isset($_COOKIE['count']) ? $_COOKIE['count'] : 0 ?></p>
        </button>
    </form>
    <header>
        <div class="heder">
            <div class="cap">
                <div class="menu">
                    <input type="checkbox" id="checkbox">
                    <label class="burger" for="checkbox">
                        <div class="fa fa-5x fa-bars"></div>
                    </label>
                    <nav>
                        <?php echo menu(); ?>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <description>
        <div class="content">