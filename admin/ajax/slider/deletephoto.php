<?php

require_once '../../lib/function.php';

$data = array();

if(isset($_POST['do']) && isset($_POST['name'])){
    if($_POST['do'] == 'get'){
        $res = selectSliderAdress($_POST['name']);
        $data = array('Msg' => 'Got', 'Error' => 0, 'Adress' => $res['adress']);
    }

    if($_POST['do'] == 'del'){
        if(isset($_POST['name'])){
            if(unlink('../../../img/slider/'.$_POST['name'])){
                deletePhotoSlider($_POST['name']);
                $data = array('Msg' => 'Deleted', 'Error' => 0);
            }else{
                $data = array('Msg' => 'Problem processing file', 'Error' => 1);
            }
        }
    }
}else{
    $data = array('Msg' => 'POST problem', 'Error' => 1);
}

echo json_encode($data);