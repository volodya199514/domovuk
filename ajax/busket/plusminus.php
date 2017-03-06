<?php

session_start();

require_once '../../library/function.php';



if(isset($_POST['goodId']) && !empty($_POST['goodId']) && isset($_POST['action']) && !empty($_POST["action"])){
    $goodId = (int)$_POST['goodId'];

    if ($_POST["action"] == 'minus'){
        if(minus_endqty($goodId)){
            $res = array('msg' => 'Good minus!', 'error' => 0, 'newtotal' => $_SESSION['total_sum'], 'newsumprice'=> $_SESSION['cart'][$goodId]['sumprice']);
        }else{
            $res = array('msg' => 'Problem change', 'error' => 1);
        }
    }elseif($_POST["action"] == 'plus'){
        if(plus_endqty($goodId)){
            $res = array('msg' => 'Good plus!', 'error' => 0, 'newtotal' => $_SESSION['total_sum'], 'newsumprice'=> $_SESSION['cart'][$goodId]['sumprice']);
        }else{
            $res = array('msg' => 'Problem change', 'error' => 1);
        }
    }elseif($_POST["action"] == 'input'){
        $res = array('msg' => 'Good input!', 'error' => 0);
    }else{
        $res = array('msg' => 'Wrong action1', 'error' => 1);
    }
}else{
    $res = array('msg' => 'POST problem!', 'error' => 1);
}

if(isset($_POST['goodId']) && !empty($_POST['goodId']) && isset($_POST['action']) && !empty($_POST["action"]) && isset($_POST['val']) && !empty($_POST["val"]) ){
    $goodId = (int)$_POST['goodId'];
    $val = (int)$_POST['val'];

    if ($_POST["action"] == 'input'){
        if(input_endqty($goodId, $val)){
            $res = array('msg' => 'Good input!', 'error' => 0, 'newtotal' => $_SESSION['total_sum'], 'newsumprice'=> $_SESSION['cart'][$goodId]['sumprice']);
        }else{
            $res = array('msg' => 'Problem change', 'error' => 1);
        }
    }else{
        $res = array('msg' => 'Wrong action', 'error' => 1);
    }
}


echo str_replace('\\','\\\\',json_encode($res));