<?php
print_r($_SESSION['id']++);
if (isset($_SESSION['id'])){
    /*$_SESSION['id'] = array_push($_SESSION);
    if (empty($_SESSION['id'])){
        $_SESSION['id'] = 1;
    }else{
        $_SESSION['id']+=1;
    }                                            */
    $out = '<form action="" method="post">
    <button type="submit" name="basket" class="basket js-button-basket"><i class="fa fa-shopping-basket fa-2x"></i><p>'.$_SESSION['id'].'</p></button>
</form>';
}else{
    $out = '';
}
echo $out;

?>