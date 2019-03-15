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
    $id = clear_string($_POST['id']);
    $cart = do_query("SELECT * FROM `cart` WHERE `ip` = '{$_SERVER['REQUEST_METHOD']}' AND `id_products` = $id");
    if (mysqli_num_rows($cart) > 0){
        $row = mysqli_fetch_array($cart);
        $new = $row['count']+1;
        $update = do_query("UPDATE `cart` SET `count` = '$new' WHERE ip = '{$_SERVER['REQUEST_METHOD']}' AND id_products = $id");
    }else{
        $cart = do_query("SELECT * FROM `products` WHERE idd = $id");
        $row = mysqli_fetch_array($cart);
        if (empty($row['price2'])){
            $row['price2'] = $row['price'];
        }
        do_query("INSERT INTO `cart`(`ip`, `price`, `id_products`) VALUES ('".$_SERVER['REQUEST_METHOD']."','".$row['price2']."','".$id."')");

    }
}