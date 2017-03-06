<?php
$view = empty($_GET['view']) ? 'home' : $_GET['view'];
    switch($view){
        case 'category': include_once 'inc/category/category.php';
            break;
        case 'contact': include_once 'inc/contact/contact.php';
            break;
        case 'home' : include_once 'inc/home/home.php';
            break;
        case 'product': include_once 'inc/product/product.php';
            break;
        case 'service' : include_once 'inc/service/service.php';
            break;
        case 'about' : include_once 'inc/about/about.php';
            break;
        case 'delivery' : include_once 'inc/delivery/delivery.php';
            break;
        case 'popub' : include_once 'inc/popub/popub.php';
            break;

       case 'addtocart':
             $goods_id = abs((int)$_GET['goods_id']);
           addtocart($goods_id);
            $_SESSION['total_sum'] = total_sum($_SESSION['cart']);            //кількість товарів в корзині + захист від вводу неіснуючого товару
        $_SESSION['total_quantity'] = 0;
        $_SESSION['end_total_qty'] = 0;
           foreach($_SESSION['cart'] as $key=>$value){
                if(isset($value['price'])){//якщо є ціна товару з БД - сумуємо кіллкість
                    $_SESSION['end_total_qty']+=$value['endqty'];
                    $_SESSION['total_quantity']+=$value['qty'];

                }else{
                    //інкше видаляємо такий id з сесії(корзини)
                    unset($_SESSION['cart'][$key]);
                }
           }
            ?>
           <script language="JavaScript">
                window.location.href = "<?=redirect();?>"
           </script>

            <?php
           break;

        case 'deleteascart':

            if(isset($_GET['goods_id'])){echo '123';
                    $id=abs((int)$_GET['goods_id']);
                if($id){
                    delete_from_cart($id);
                }
            }
            ?>
            <script language="JavaScript">
                window.location.href = "<?=redirect();?>"
            </script>

            <?php

            break;


        default: include_once'inc/home/home.php';
    }
