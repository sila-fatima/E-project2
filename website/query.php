<?php
session_start();
if(isset($_POST['addtocart'])){
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }
    $_SESSION['cart'][] = array("pid"=> $_POST['proid'],"pname"=> $_POST['proname'],"pimg"=> $_POST['proimg'],"pprice"=> $_POST['proprice'],"pqty"=> $_POST['proqty'] );
    echo "<script> alert('Product Added To Cart');
        location.assign('shop.php');
    </script>";
}
if (isset($_GET['dlt'])&& $_SESSION['cart']) { 
    $dlt_item = array_search($_GET['dlt'], array_column($_SESSION['cart'], 'pid'));
    if ($dlt_item !== false) {
        unset($_SESSION['cart'][$dlt_item]);
    }
}
?>