<?php
mysql_connect("127.0.0.1","root","") or die("No connect to server");
mysql_select_db("domovik") or die ("No connect to DB");
mysql_query("SET NAMES 'UTF8'") or die('Cant set charset');

function deleteProd($name)
{
    $query = "DELETE FROM product WHERE name = ".'"'.$name.'"';
    return mysql_query($query);
}

function addProd($name, $img, $price, $width, $height, $hits, $new, $idcategory){
    $query = "INSERT INTO product (name, img, price, width, height, hits, new, id_category)
                VALUES (".'"'.$name.'"'." ,".'"'.$img.'"'." ,".$price." ,".$width.
        " ,".$height." ,".$hits." ,".$new." ,".$idcategory.")";

    return mysql_query($query);
}

function updateProd($oldname, $name, $img, $price, $width, $height, $hits, $new, $idcategory){
    $query = "UPDATE product
                SET name = ".'"'.$name.'"'.",".
        "img = ".'"'.$img.'"'.",".
        "price = ".'"'.$price.'"'.",".
        "width = ".'"'.$width.'"'.",".
        "height = ".'"'.$height.'"'.",".
        "hits = ".$hits.",".
        "new = ".$new.",".
        "id_category = ".'"'.$idcategory.'"'.
        " WHERE name = ".'"'.$oldname.'"';

    return mysql_query($query);
}

function selectCat(){
    $query = "SELECT * FROM category";
    $res = mysql_query($query);

    $cat = array();

    while($row = mysql_fetch_assoc($res)){
        $cat[]=$row;
    }

    return $cat;
}

function selectProdImgAdress($name){
    $query = "SELECT img FROM product WHERE name = ".'"'.$name.'"';
    $res = mysql_query($query);
    return mysql_fetch_assoc($res);
}

function selectCatId($name){
    $query = "SELECT id FROM category WHERE name = ".'"'.$name.'"';
    $res = mysql_query($query);
    return mysql_fetch_assoc($res);
}

function selectProd($id){
    $query = "SELECT name FROM product WHERE id_category = ".'"'.$id.'"';
    $res = mysql_query($query);

    $cat = array();

    while($row = mysql_fetch_assoc($res)){
        $cat[]=$row;
    }

    return $cat;
}

function selectSliderAdress($photoname)
{
    $query = "SELECT adress FROM slider WHERE name = ".'"'.$photoname.'"';
    $res = mysql_query($query);
    return mysql_fetch_assoc($res);
}

function addPhotoSlider($photoname, $path)
{
    $query = "INSERT INTO slider (name, adress) VALUES (".'"'.$photoname.'"'." ,".'"'.$path.'"'.")";
    $res = mysql_query($query);
}

function deletePhotoSlider($photoname)
{
    $query = "DELETE FROM slider WHERE name = ".'"'.$photoname.'"';
    $res = mysql_query($query);
}



function selectAllCategory(){

    $query = "SELECT * FROM category";
    $res = mysql_query($query) or die(mysql_error());

    $cat=array();

    while($row=mysql_fetch_assoc($res)){
        $cat[] = $row;
    }

    return $cat;
}


function selectCategoryImg($name){
    $query = "SELECT id, img FROM category WHERE name = ".'"'.$name.'"';
    $res = mysql_query($query);
    return mysql_fetch_assoc($res);
}




function selectQuestion($start_pos, $perpage)
{
    $query = "SELECT * FROM question ORDER BY id DESC LIMIT $start_pos, $perpage ";

    $res = mysql_query($query);

    $questions = array();

    while($row = mysql_fetch_assoc($res)){
        $questions[]=$row;
    }

    return $questions;

}


function count_rows_question()// кількість категорій
{
    $query = "SELECT COUNT(id) AS count_rows FROM question";

    $res = mysql_query($query) or die(mysql_error());


    while($row = mysql_fetch_assoc($res)){
        if($row['count_rows']) $count_rows=$row['count_rows'];
    }
    return $count_rows;
}


function selectOrder($startpos, $perpage, $month, $year){
    $query = "SELECT * FROM orders WHERE `date` LIKE '%.$month.%$year' LIMIT $startpos, $perpage ";
    $res = mysql_query($query) or die(mysql_error());

    $order = array();

    while($row = mysql_fetch_assoc($res))
    {
        $order[] = $row;
    }

    return $order;
}

function count_rows_orders()// кількість категорій
{
    $query = "SELECT COUNT(id) AS count_rows FROM orders";

    $res = mysql_query($query) or die(mysql_error());


    while($row = mysql_fetch_assoc($res)){
        if($row['count_rows']) $count_rows=$row['count_rows'];
    }
    return $count_rows;
}

function selectMonth(){

    $query = "SELECT * FROM  `month`  ";
    $res = mysql_query($query) or die(mysql_error());

    $month = array();

    while($row = mysql_fetch_assoc($res))
    {
        $month[] = $row;
    }

    return $month;
}


function autorization(){

    $query = "SELECT * FROM admin";
    $res = mysql_query($query) or die(mysql_error());

    $user = array();

    while($row = mysql_fetch_assoc($res)){
        $user[]=$row;
    }
    return $user;
}