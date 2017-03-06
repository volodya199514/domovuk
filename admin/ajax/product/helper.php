<?php

require_once '../../lib/function.php';

$data = array();

if(isset($_POST['do'])){
    if($_POST['do'] == 'needcat'){
        $res = selectCat();
        $data = array('msg' => 'I got all categories from db)', 'error' => 0, 'data' => $res);
    }

    if($_POST['do'] == 'needprod'){
        if(isset($_POST['id'])){
            $res = selectProd($_POST['id']);
            $data = array('msg' => 'I got all products from db)', 'error' => 0, 'data' => $res);
        }
    }

    if($_POST['do'] == 'needcatid'){
        if(isset($_POST['name'])){
            $res = selectCatId($_POST['name']);
            $data = array('msg' => 'I got cat id from db)', 'error' => 0, 'data' => $res);
        }
    }

    if($_POST['do'] == 'needprodimgadress'){
        if(isset($_POST['name'])){
            $res = selectProdImgAdress($_POST['name']);
            $data = array('msg' => 'I got prod img adress)', 'error' => 0, 'data' => $res);
        }
    }
}else{
    $data = array('msg' => 'POST problem', 'error' => 1);
}

echo json_encode($data);