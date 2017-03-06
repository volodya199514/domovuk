<?php

require_once '../../lib/function.php';

$data = array();

if(isset($_POST['name']) && !empty($_POST['name'])){
    $name = selectProdImgAdress($_POST['name']);

    if(unlink('../../..'.$name['img'])){
        if(deleteProd($_POST['name'])){
            $data = array('msg' => 'Deleted prod', 'error' => 0);
        }
    }else{
        $data = array('msg' => 'Problem processing file', 'error' => 1);
    }
}else{
    $data = array('msg' => 'POST problem', 'error' => 1);
}

echo json_encode($data);