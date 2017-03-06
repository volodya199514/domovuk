<?php
mysql_connect("127.0.0.1","root","") or die("No connect to server");
mysql_select_db("domovik") or die ("No connect to DB");
mysql_query("SET NAMES 'UTF8'") or die('Cant set charset');


function selectHomeProduct()
{
    $query = "SELECT * FROM product ORDER BY hits DESC, new DESC  ";
    $res = mysql_query($query) or die(mysql_error());

    //масив продуктів
    $homeProduct = array();
    $iter = 0;

    while(($row = mysql_fetch_assoc($res)) && $iter<8){
        $homeProduct[]=$row;
        $iter++;
    }


  /* if($iter<8)
   {
       $queryAll = "SELECT * FROM product";
       $resNew = mysql_query($queryAll) or die(mysql_error());

       while($row = mysql_fetch_assoc($resNew) && $iter<8){
           $homeProduct[$iter]=$row;
           $iter++;
       }
   }*/

shuffle($homeProduct);
    return $homeProduct;
}

function selectCategory($start_pos, $perpage)
{
    $query = "SELECT * FROM category LIMIT $start_pos, $perpage ";
    $res = mysql_query($query) or die(mysql_error());

    //масив продуктів
    $category = array();

    while($row = mysql_fetch_assoc($res)){
        $category[]=$row;
    }
    return $category;
}

function selectProduct($category, $start_pos, $perpage)
{
    $query = "SELECT * FROM product WHERE id_category=$category LIMIT $start_pos, $perpage ";
    $res = mysql_query($query) or die(mysql_error());

    //масив продуктів
    $product = array();

    while($row = mysql_fetch_assoc($res)){
        $product[]=$row;
    }
    return $product;
}

function selectSlider()
{
    $query = "SELECT * FROM slider";



    $res = mysql_query($query) or die(mysql_error());

    //масив продуктів
    $img = array();

    while($row = mysql_fetch_assoc($res)){
        $img[]=$row;
    }
    return $img;
}

function pagination($page=null, $pages_count=null)
{
    $uri='';

    if($_SERVER['QUERY_STRING']){ // якщо є параметри в запиті
        foreach($_GET as $key => $value){
            //формуємто строку параметрів без номеру сторінки. Номер передається параметром функції.
            if($key != 'page') $uri.="{$key}={$value}&amp;";
        }
    }

    ;
    //формування ссилок
    $back = '';//назад
    $forward = '';//вперед
    $start1page = '';//на початок
    $start2page = '';//на початок
    $start3page = '';//на початок
    $end1page = '';// в кінець
    $end2page = '';// в кінець
    $end3page = '';// в кінець
    $thispage=$page;


    if($page>1)
        $back = "<a class = 'back' href='?{$uri}page=" .($page-1). "'>Назад</a>";

    if($page<$pages_count)
        $forward = "<a class = 'forward' href='?{$uri}page=" .($page+1). "'>Вперед</a>";



    if($pages_count>0)
        $start1page = "<li><a class = 'nav_link' href='?{$uri}page=" .($page=1). "'>1</a></li>";

    if($pages_count>1)
    $start2page = "<li><a class = 'nav_link' href='?{$uri}page=" .($page=2). "'>2</a></li>";

    if($pages_count>2)
    $start3page = "<li><a class = 'nav_link' href='?{$uri}page=" .($page=3). "'>3</a></li>";

    if($pages_count>3)
    $end1page = "<li><a class = 'nav_link' href='?{$uri}page=" .($page=$pages_count). "'>".($pages_count)."</a></li>";

    if($pages_count>4)
    $end2page = "<li><a class = 'nav_link' href='?{$uri}page=" .($page=$pages_count-1). "'>".($pages_count-1)."</a></li>";

    if($pages_count>5)
    $end3page = "<li><a class = 'nav_link' href='?{$uri}page=" .($page=$pages_count-2). "'>".($pages_count-2)."</a></li>";

    $threedots = "<li><span>...</span></li>";
    $this1page= "<li><a href='?{$uri}page=" .($page=$thispage-1). "'>".($thispage-1)."</a></li>";
    $this2page= "<li><a href='?{$uri}page=" .($page=$thispage). "'>".($thispage)."</a></li>";
    $this3page= "<li><a href='?{$uri}page=" .($page=$thispage+1). "'>".($thispage+1)."</a></li>";

    echo $back;

    echo '<ul>';
    echo $start1page;
    echo $start2page;
    echo $start3page;


    if(($thispage-2)>3)
        echo $threedots;


    if(($thispage-2)>2 && ($thispage+1)<$pages_count)
        echo $this1page;

    if(($thispage-2)>1 && ($thispage+2)<$pages_count)
        echo $this2page;

    if(($thispage-2)>0 && ($thispage+3)<$pages_count)
        echo $this3page;


    if(($thispage+4)<$pages_count)
        echo $threedots;


    echo $end3page;
    echo $end2page;
    echo $end1page;
    echo '<ul>';

    echo $forward;
}

function count_rows_category()// кількість категорій
{
    $query = "SELECT COUNT(id) AS count_rows FROM category";

    $res = mysql_query($query) or die(mysql_error());


    while($row = mysql_fetch_assoc($res)){
        if($row['count_rows']) $count_rows=$row['count_rows'];
    }
    return $count_rows;
}


function count_rows_product($cat)// кількість категорій
{
    $query = "SELECT COUNT(id) AS count_rows FROM product WHERE id_category=$cat";

    $res = mysql_query($query) or die(mysql_error());


    while($row = mysql_fetch_assoc($res)){
        if($row['count_rows']) $count_rows=$row['count_rows'];
    }
    return $count_rows;
}

function addtocart($goods_id)//додавання товару
{
    if(!isset($_SESSION['cart'][$goods_id])){
        $_SESSION['cart'][$goods_id]['qty'] = 1;
        $_SESSION['cart'][$goods_id]['endqty'] = 10;
    }
}


/*сума заказу + атрибути*/
function total_sum($goods){
   $total_sum = 0;
    $query = "SELECT id, name, price, img, id_category FROM product WHERE
                id IN (".implode(', ',array_keys($goods)).")";

    $res = mysql_query($query) or die(mysql_error());

    while($row = mysql_fetch_assoc($res)){
        $_SESSION['cart'][$row['id']]['id_category']= $row['id_category'];
        $_SESSION['cart'][$row['id']]['name']= $row['name'];
        $_SESSION['cart'][$row['id']]['price']= $row['price'];
        $_SESSION['cart'][$row['id']]['img']= $row['img'];

        if(!isset( $_SESSION['cart'][$row['id']]['endqty']))
        $_SESSION['cart'][$row['id']]['endqty']= $_SESSION['cart'][$row['id']]['qty']*10;
        $_SESSION['cart'][$row['id']]['sumprice']= $_SESSION['cart'][$row['id']]['endqty']*$row['price'];
        $total_sum +=$_SESSION['cart'][$row['id']]['endqty']*$row['price'];
    }

    return $total_sum;
}
/*сума заказу + атрибути*/


/*редірект*/
function redirect(){
    $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER']:  'http://domovuk.com.ua/';
 return $redirect;


}
/*редірект*/



/*видалення з корзини*/
function delete_from_cart($id){
    if($_SESSION['cart']){
        if(array_key_exists($id, $_SESSION['cart'])){
            $_SESSION['total_quantity']-=1;
            $_SESSION['end_total_qty']-=$_SESSION['cart'][$id]['endqty'];
            $_SESSION['total_sum']-=$_SESSION['cart'][$id]['sumprice'];
            unset($_SESSION['cart'][$id]);
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}
/*видалення з корзини*/





function minus_endqty($id){
    if($_SESSION['cart']){
        if(array_key_exists($id, $_SESSION['cart'])){
            $_SESSION['cart'][$id]['endqty']-=1;
            $_SESSION['end_total_qty']-=1;
            $_SESSION['cart'][$id]['sumprice'] = $_SESSION['cart'][$id]['endqty'] * $_SESSION['cart'][$id]['price'];

            $_SESSION['total_sum'] = total_sum($_SESSION['cart']);
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}

function plus_endqty($id){
    if($_SESSION['cart']){
        if(array_key_exists($id, $_SESSION['cart'])){
            $_SESSION['cart'][$id]['endqty']+=1;
            $_SESSION['end_total_qty']+=1;
            $_SESSION['cart'][$id]['sumprice'] = $_SESSION['cart'][$id]['endqty'] * $_SESSION['cart'][$id]['price'];

            $_SESSION['total_sum'] = total_sum($_SESSION['cart']);
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}

/*видалення з корзини*/


function input_endqty($id, $val){
    if($_SESSION['cart']){
        if(array_key_exists($id, $_SESSION['cart'])){
            $pre_qty =  $_SESSION['cart'][$id]['endqty'];
            $_SESSION['cart'][$id]['endqty']=$val;
            $_SESSION['end_total_qty']=$_SESSION['end_total_qty']-$pre_qty+$val;
            $_SESSION['cart'][$id]['sumprice'] = $_SESSION['cart'][$id]['endqty'] * $_SESSION['cart'][$id]['price'];

            $_SESSION['total_sum'] = total_sum($_SESSION['cart']);
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}
















function request_url()//витягаємо url
{
    $result = ''; // Пока результат пуст
    $default_port = 80; // Порт по-умолчанию

    // А не в защищенном-ли мы соединении?
    if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS']=='on')) {
        // В защищенном! Добавим протокол...
        $result .= 'https://';
        // ...и переназначим значение порта по-умолчанию
        $default_port = 443;
    } else {
        // Обычное соединение, обычный протокол
        $result .= 'http://';
    }
    // Имя сервера, напр. site.com или www.site.com
    $result .= $_SERVER['SERVER_NAME'];

    // А порт у нас по-умолчанию?
    if ($_SERVER['SERVER_PORT'] != $default_port) {
        // Если нет, то добавим порт в URL
        $result .= ':'.$_SERVER['SERVER_PORT'];
    }
    // Последняя часть запроса (путь и GET-параметры).
    $result .= $_SERVER['REQUEST_URI'];
    // Уфф, вроде получилось!
    return $result;
}




function print_arr($arr)
{
    echo('<pre>');
    print_r($arr);
    echo('</pre>');
}


