<?php

require_once '../../lib/function.php';

$data = array();

if(!empty($_FILES['file']['error'])){
    $data = array('Msg' => $_FILES['file']['error'], 'Error' => 1);
}else{
    $name = 'slider'.time().'.'.end(explode('.', $_FILES['file']['name']));

    if(move_uploaded_file($_FILES['file']['tmp_name'], "../../../img/slider/".$name)){
        addPhotoSlider($name, '/img/slider/'.$name);
        $data = array('Msg' => 'Success', 'Error' => 0, 'Adress' => '/img/slider/'.$name);
    }else{
        $data = array('Msg' => 'Problem processing file', 'Error' => 1);
    }
}

echo json_encode($data);



