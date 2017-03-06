<?php
/**
 * Created by PhpStorm.
 * User: vova
 * Date: 29.07.15
 * Time: 14:39
 */

$uploaddir ='./../img/categori/';
$file = $uploaddir.basename($_FILES['uploadfile']['name']);
$ext = substr($_FILES['uploadfile']['name'],
    strpos($_FILES['uploadfile']['name'],'.'),
    strlen($_FILES['uploadfile']['name'])-1);
$filetypes = array('.jpg','.gif','.bmp','.png',
    '.JPG','.BMP','.GIF','.PNG','.jpeg','.JPEG');


if(!in_array($ext, $filetypes)){
    echo "<p>Неправильний формат</p>";

}else{
    if(move_uploaded_file($_FILES['uploadfile']['tmp_name'],$file)){
        echo
        "success";
    }else{

        echo "error";

    }
}