<?php

if($_GET['view']=='exit'){
    unset($_SESSION['auth']);
    ?> <script language="JavaScript">
        window.location.href = "http://domovuk.com.ua";
    </script> <?php
}

if($_POST['auth']){
   $user = autorization();



    foreach($user as $use){
        if($_POST['login']==$use['login'] && md5($_POST['password'])==$use['password']){
            $_SESSION['auth']=1;
            $_SESSION['auth_error']=1;
        }
        else{
            $_SESSION['auth_error']=0;
        }
    }

    if($_SESSION['auth']==1)
   ?> <script language="JavaScript">
    window.location.href = "http://domovuk.com.ua/admin/home";
        </script> <?php
}

$view = empty($_GET['view']) ? 'home' : $_GET['view'];

if(isset($_SESSION['auth'])){

    switch ($_GET['view']) {
        case 'home':

            include_once 'inc/home/home.php';
            break;
        case 'category':
            include_once 'inc/category/category.php';
            break;
        case 'order':
            include_once 'inc/order/order.php';
            break;
        case 'product':
            include_once 'inc/product/product.php';
            break;
        case 'question':
            include_once 'inc/question/question.php';
            break;
        case 'slider':
            include_once 'inc/slider/slider.php';
            break;
        case 'auth':
            include_once 'inc/auth/auth.php';
            break;

        default : include_once 'inc/home/home.php';

    }
}

    else{
        include_once 'inc/auth/auth.php';
        if($_GET['view']){
            $_SESSION['true']=1;
        ?> <script language="JavaScript">
            window.location.href = "http://domovuk.com.ua/admin";
        </script> <?php
        }
    }





