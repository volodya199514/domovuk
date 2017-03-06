<?php
session_start();

include_once 'config.php';
include_once 'db_connect.php';
;
echo  '<!DOCTYPE html>';
echo  '<html>';
echo  '<head>';
echo  '<title>domovuk.com.ua</title>';

echo '<link rel="shortcut icon" href="'.$site_url.'/img/domovuk.gif" type="image/vnd.microsoft.icon" />';
echo  '<link rel="stylesheet" href="'.$site_url.'/css/style.css" type="text/css" />';
echo  '<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>';
echo  '<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>';
echo  '<script type="text/javascript" src="js/popup.js"></script>';
echo  '<script type="text/javascript" src="'.$site_url.'/js/jquery.carouFredSel-6.0.4-packed.js"></script>';
echo  '<script type="text/javascript" src="js/workskripts.js"></script>';echo  '</head>';
echo  '<body>';

$_SESSION['auth_error']=1;
unset($_SESSION['auth']);

include_once 'library/function.php';

include_once 'inc/popup/popup_busket.php';
include_once 'inc/popup/popup_empty.php';
include_once 'inc/popup/popup_information.php';
include_once 'inc/popup/popup_congratulations.php';

include_once 'inc/header.php';
include 'inc/core/core.php';
include_once 'inc/footer.php';

echo '<div id="overlay"></div>';
echo '</body>';
echo '</html>';


