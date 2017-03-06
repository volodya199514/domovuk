<?php

require_once '../../lib/function.php';

$data = array();

function clean($value = "") {
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);

    return $value;
}

if(!empty($_FILES) && !empty($_POST)){

    if(!empty($_FILES['file']['error'])){

        $data = array('msg' => 'Problem with file: '.$_FILES['file']['error'], 'error' => 1);
    }else{
        $imgname = 'product'.time().'.'.end(explode('.', $_FILES['file']['name']));

        if(isset($_POST['name']) && isset($_POST['price']) && isset($_POST['width']) && isset($_POST['length'])
            && isset($_POST['hits']) && isset($_POST['new']) && isset($_POST['catname'])
            && isset($_POST['handler']) && isset($_POST['oldname'])){

            if(!empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['width']) && !empty($_POST['length'])
                && !empty($_POST['hits']) && !empty($_POST['new']) && !empty($_POST['catname'])
                && !empty($_POST['handler']) && !empty($_POST['oldname'])){

                $name = clean($_POST['name']);
                $price = (float) clean($_POST['price']);
                $width = (int) clean($_POST['width']);
                $height = (int) clean($_POST['length']);

                $catname = $_POST['catname'];
                $handler = $_POST['handler'];

                $catid = selectCatId($catname);

                $hits = (int) $_POST['hits'];
                $new = (int) $_POST['new'];

                $oldname = $_POST['oldname'];
                $oldimg = selectProdImgAdress($_POST['oldname']);

                switch ($handler){
                    case 'add':
                        if(move_uploaded_file($_FILES['file']['tmp_name'], "../../../img/product/".$imgname)){

                            if(addProd($name, "/img/product/".$imgname, $price, $width, $height, $hits, $new, $catid['id'])){

                                $data = array('msg' => 'Added', 'error' => 0);
                            }else{

                                $data = array('msg' => 'Problem with db', 'error' => 1);
                            }
                        }else{
                            $data = array('msg' => 'Problem processing file', 'error' => 1);
                        }
                        break;
                    case 'edit':
                        if(unlink('../../..'.$oldimg['img'])){

                            if(move_uploaded_file($_FILES['file']['tmp_name'], "../../../img/product/".$imgname)){

                                if(updateProd($oldname, $name, "/img/product/".$imgname, $price, $width, $height, $hits, $new, $catid['id'])){
                                    $data = array('msg' => 'Updated', 'error' => 0);

                                }else{
                                    $data = array('msg' => 'Problem with db', 'error' => 1);
                                }
                            }else{
                                $data = array('msg' => 'Problem processing file', 'error' => 1);
                            }
                        }else{
                            $data = array('msg' => 'Problem processing file', 'error' => 1);
                        }
                        break;
                }

            }else{
                $data = array('msg' => 'Empty file', 'error' => 1);
            }
        }else{
            $data = array('msg' => 'POST problem', 'error' => 1);
        }
    }
}else{
    $data = array('msg' => 'Empty data', 'error' => 1);
}

echo json_encode($data);