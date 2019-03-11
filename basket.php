<?php

if (isset($_SESSION['id'])){
    $_SESSION['id'] = array();
    if (empty($_SESSION['id'])){
        $_SESSION['id'] = 1;
    }else{
        $_SESSION['id']+=1;
    }
    $out = '<form action="" method="post">
    <button type="submit" name="basket" class="basket"><i class="fa fa-shopping-basket fa-2x"></i><p>'.$_SESSION['id'].'</p></button>
</form>';
}else{
    $out = '';
}
echo $out;

?>                                                                                                                                                                      +