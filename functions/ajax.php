<?php
/**
 * Created by PhpStorm.
 * User: sergej
 * Date: 15.03.19
 * Time: 13:51
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    require 'db.php';
    require 'functions.php';
    // В связи со странным методом передачи id (почему-то в ключе передаеться), такой способ его получения:
    foreach ($_POST as $key => $value) {
        $id = $key;
        break;
    }
    if ( isset($_SESSION['user'])) {
        $user = json_decode($_SESSION['user']);
        $id_user = $user->id;
        $cart = do_query("SELECT * FROM `cart` WHERE `id_users` = $id_user AND `id_products` = $id");
        if (mysqli_num_rows($cart) > 0){
            $row = mysqli_fetch_array($cart);
            $new = $row['count']+1;
            $update = do_query("UPDATE `cart` SET `count` = '$new' WHERE `id_users` = $id_user AND id_products = $id");
        }else{
            $cart = do_query("SELECT * FROM `products` WHERE idd = $id");
            $row = mysqli_fetch_array($cart);
            if (empty($row['price2'])){
                $row['price2'] = $row['price'];
            }
            // Когда изменешь таблицу cart, удали из строки ниже `ip` и '1'
            do_query("INSERT INTO `cart` (`ip`, `id_users`, `price`, `id_products`) VALUES ('1', '".$id_user."','".$row['price2']."','".$id."')");
        }
    } else {
        $products = do_query("SELECT * FROM `products` WHERE idd = $id");
        $prod = mysqli_fetch_array($products);
        if (empty($prod['price2'])){
            $prod['price2'] = $prod['price'];
        }
        $data = array('price' => $prod['price2'], 'id_products' => $id, 'count' => 1);
        if ( empty($_SESSION['prod']) ) {
            $_SESSION['prod'][] = $data;
         } else {
            $flag = false;
            foreach ($_SESSION['prod'] as $key => $value) {
                if ( $value['id_products'] == $id ) {
                    $_SESSION['prod'][$key]['count']++;
                    $flag = true;
                    break;
                }
            }
            if ( !$flag ) {
                $_SESSION['prod'][] = $data;
            }
        }
        
    }

}
