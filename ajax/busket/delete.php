<?php

session_start();

require_once '../../library/function.php';

if(isset($_POST['action']) && !empty($_POST['action'])){
    if($_POST["action"] == 'count'){
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
            $res = array('msg' => 'count', 'error' => 0, 'count' => count($_SESSION['cart']));
        }else{
            $res = array('msg' => 'No cart?', 'error' => 1);
        }
    }elseif($_POST["action"] == 'del'){
        if(isset($_POST['goodId']) && !empty($_POST['goodId'])){
            $goodId = $_POST['goodId'];

            if(delete_from_cart($goodId)){
                $res = array('msg' => 'Good deleted!', 'error' => 0, 'newtotal' => $_SESSION['total_sum']);
            }else{
                $res = array('msg' => 'Problem delete good, No cart?', 'error' => 1);
            }
        }else{
            $res = array('msg' => 'POST problem!', 'error' => 1);
        }
    }
}else{
    $res = array('msg' => 'POST problem!', 'error' => 1);
}


echo str_replace('\\','\\\\',json_encode($res));