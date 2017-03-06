<?php
session_start();
echo  '<html class="bg-404" xmlns="http://www.w3.org/1999/xhtml">';
echo  '<head>';
echo  '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
echo  '<title>Error 404</title>';
echo  '<link rel="stylesheet" href="'.$site_url.'/css/style.css" type="text/css" />';
echo '</head>';

$_SESSION['auth_error']=1;
unset($_SESSION['auth']);

?>
<div class="error404">
    <p>Сторінка не знайдена</p>
</div>