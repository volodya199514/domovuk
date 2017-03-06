<?php
session_start();
include_once 'config.php';
include_once '../db_connect.php';
echo  '<!DOCTYPE html>';
echo  '<html>';
echo  '<head>';
echo  '<title>domovuk</title>';
echo  '<link rel="shortcut icon" href="img/domovuk_admin.gif" type="image/vnd.microsoft.icon" />';
echo  '<link rel="stylesheet" href="css/style.css" type="text/css" />';

echo  '<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>';
echo  '<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>';

echo  '<script type="text/javascript" src="js/category.js"></script>';


echo  '<script type="text/javascript" src="js/product.js"></script>';

echo  '<script type="text/javascript" src="js/popup.js"></script>';


echo '<style type="text/css" media="print">
    div.no_print {display: none; }
</style>';

echo  '</head>';
echo  '<body>';


include_once '../library/function.php';
include_once 'lib/function.php';


if(isset($_SESSION['auth'])){
    include_once 'inc/header.php';
}

include_once 'inc/core/core.php';


if(isset($_SESSION['auth'])){
        include_once 'inc/footer.php';
}


echo '<div id="overlay"></div>';
echo '</body>';
echo '</html>';

echo '</body>';
echo '</html>';

