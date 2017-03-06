<?php
/**
 * Created by PhpStorm.
 * User: vova
 * Date: 29.07.15
 * Time: 21:45
 */


require_once '../../lib/function.php';

$data = array();

if(isset($_POST['do']) && isset($_POST['name'])){
    if($_POST['do'] == 'get'){
        $res = selectCategoryImg($_POST['name']);
        $data = array('Msg' => 'Got', 'Error' => 0, 'Adress' => $res['img'], 'Idi'=>$res['id']);
    }

    /*if($_POST['do'] == 'del'){
        if(unlink('../../../img/slider/'.$_POST['name'])){
            deletePhotoSlider($_POST['name']);
            $data = array('Msg' => 'Deleted', 'Error' => 0);
        }else{
            $data = array('Msg' => 'Problem processing file', 'Error' => 1);
        }
    }*/
}else{
    $data = array('Msg' => 'POST problem', 'Error' => 1);
}

echo json_encode($data);