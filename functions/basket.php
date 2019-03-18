<?php
/**
 * Created by PhpStorm.
 * User: sergej
 * Date: 15.03.19
 * Time: 19:01
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    require 'db.php';
    require 'functions.php';
    $res = do_query("SELECT * FROM products JOIN cart WHERE cart.ip = '{$_SERVER['REQUEST_METHOD']}' AND products.idd = cart.id_products");
    var_dump($res);
    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_array($res);
        do{
            $count = $count + $row['count'];
        }while($row = mysqli_fetch_array($res));
        echo $count;
    }
}
