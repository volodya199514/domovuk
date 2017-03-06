<?php

require_once '../../../library/function.php';

$data = array();

if(isset($_POST['do'])){
    if($_POST['do'] == 'givemethis'){
        $res = selectSlider();
        $data = array('Msg' => 'GotAll', 'Error' => 0, 'Data' => $res);
    }
}else{
    $data = array('Msg' => 'POST problem', 'Error' => 1);
}

echo json_encode($data);