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
    <meta name="yandex-verification" content="f9bd44cd040d50da" />
    <?php include 'functions/head.php';?>
    <title><?php echo $title;?></title>
    <link rel="icon" href="photo/logo.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css?t=<?php echo(microtime(true).rand()); ?>">
    <script type="text/javascript" >
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function() {
                try {
                    w.yaCounter50804785 = new Ya.Metrika2({
                        id:50804785,
                        clickmap:true,
                        trackLinks:true,
                        accurateTrackBounce:true,
                        webvisor:true
                    });
                } catch(e) { }
            });

            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () { n.parentNode.insertBefore(s, n); };
            s.type = "text/javascript";
            s.async = true;
            s.src = "https://mc.yandex.ru/metrika/tag.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else { f(); }
        })(document, window, "yandex_metrika_callbacks2");
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/50804785" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-92619689-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-92619689-3');
    </script>


</head>

<body>
<description>
        <div class="heder">
            <div class="cap">
                <div class="meun_up">
                    <ul>
                        <li><a href="?page=main">Главная</a></li>
                        <li><a href="?page=events">Мероприятия</a></li>
                        <li><a href="?page=comments">Отзывы</a></li>
                        <li><a href="?page=contacts">Контакты</a></li>
                    </ul>
                    <?php
                    require 'functions/db.php';
                    if (isset($_SESSION['email'])){
                        echo '<div class="greeting">'.$_SESSION['login']->login.'</div>';
                    }else
                    {
                        $user_accont = array(
                            array(
                                'way' => 'input',
                                'lnscription' => 'Вход',
                            ),
                            array(
                                'way' => 'reg',
                                'lnscription' => 'Регистрация',
                            ),
                        );
                    }

                echo menu_account($user_accont);
                ?>
                </div>
                <div class="dropdown">
                    <button class="btn btn-default glyphicon glyphicon-align-justify dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><small>меню</small></button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="?page=main">Главная</a></li>
                        <li><a href="?page=events">Мероприятия</a></li>
                        <li><a href="?page=comments">Отзывы</a></li>
                        <li><a href="?page=contacts">Контакты</a></li>
                        <?php if (isset($_SESSION['email'])){
                            echo '<div class="greeting">'.$_SESSION['login']->login.'</div>';
                        }else
                            {
                            echo "
                        <li style='display: none;'><a href=\"?page=input\">Вход</a></li>
                        <li style='display: none;'><a href=\"?page=reg\">Регистрация</a></li>";
                        }?>

                        <li role="separator" class="divider"></li>
                        <li><a href="?page=pizza">Пицца</a></li>
                        <li><a href="?page=hot_drink">Горячие напитки</a></li>
                        <li><a href="?page=drinks">Напитки</a></li>
                        <li><a href="?page=cold_appetizers_and_salads">Холодные закуски и сэндвичи</a></li>
                        <li><a href="?page=hot_dishes_and_pasta">Горячие блюда и пасты</a></li>
                        <li><a href="?page=pastries_and_desserts">Выпечка и десерты</a></li>
                        <li><a href="?page=Side_dishes_snacks_and_sauces">Гарниры, закуски и соусы</a></li>
                        <li><a href="?page=Salads_and_first_courses">Салаты и первые блюда</a></li>
                    </ul>
                </div>
                <div class="meun_food">
                    <?php
                    $meun_food = array(
                            array(
                                'way' => 'pizza',
                                'lnscription' => 'Пицца',
                            ),
                            array(
                                'way' => 'hot_drink',
                                'lnscription' => 'Горячие напитки',
                            ),
                            array(
                                'way' => 'drinks',
                                'lnscription' => 'Напитки',
                            ),
                            array(
                                'way' => 'cold_appetizers_and_salads',
                                'lnscription' => 'Холодные закуски и сэндвичи',
                            ),
                            array(
                                'way' => 'hot_dishes_and_pasta',
                                'lnscription' => 'Горячие блюда и пасты',
                            ),
                            array(
                                'way' => 'pastries_and_desserts',
                                'lnscription' => 'Выпечка и десерты',
                            ),
                            array(
                                'way' => 'Side_dishes_snacks_and_sauces',
                                'lnscription' => 'Гарниры, закуски и соусы',
                            ),
                            array(
                                'way' => 'Salads_and_first_courses',
                                'lnscription' => 'Салаты и первые блюда',
                            ),
                    );
                    echo meun_food($meun_food)
                 ?>
                </div>
            </div>
        </div>
</description>
<description>
        <div class="content">