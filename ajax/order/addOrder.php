<?php
mysql_connect("127.0.0.1","root","") or die("No connect to server");
mysql_select_db("domovik") or die ("No connect to DB");
mysql_query("SET NAMES 'UTF8'") or die('Cant set charset');

session_start();

$message='';

foreach($_SESSION['cart'] as $cart)
{
    $category=$cart['id_category'];
    $quer = "SELECT `name` FROM category WHERE id= $category";
    $res = mysql_query($quer) or die(mysql_error());


    while($row = mysql_fetch_assoc($res)){
        $category=$row['name'];
    }


    $data = array('category'=>$category,'photo'=>$cart['img'],'tovar_name'=>$cart['name'],'qty'=>$cart['endqty'], 'price'=>$cart['sumprice'] ,
        'name' => $_POST['name'] , 'phone' => $_POST['phone'], 'email' => $_POST['email'], 'post1'=>$_POST['post1'], 'post2'=>$_POST['post2'], 'post3'=>$_POST['post3'], 'city' => $_POST['city'],
        'adress' => $_POST['adress'], 'data'=>date("d.m.Y"));


    $photo = $cart['img'];
    $tovar_name=$cart['name'];
    $qty = $cart['endqty'];
    $price=$cart['sumprice'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    if($_POST['post1']== 2)
    $post = 'Нова пошта';

    if($_POST['post2']== 4)
        $post = 'Міст експрес';

    if($_POST['post3']== 6)
        $post = 'Інтайм';

    $city = $_POST['city'];
    $adress = $_POST['adress'];
    $date=date("d.m.Y");

$message= $message.'
Назва товару: '.$tovar_name.'
кількість: '.$qty.'
вартість: '.$price.'
';

    $query = "INSERT INTO `domovik`.`orders`

    (`category`, `img`, `product_name`, `amount`, `price`,
    `full_name`, `phone`, `email`, `delivery`, `city`, `adress`, `date`)

    VALUES ('$category', '$photo', '$tovar_name', '$qty', '$price',
     '$name', '$phone', '$email', '$post', '$city', '$adress', '$date');";

    mysql_query($query) or die(mysql_error());



}


$subject = 'Замовлення з інтернет-магазину domovuk.com.ua';


mail($email,$subject, 'Шановні клієнти, дякуємо за покупку.
Склад:'.$message."
Наші менеджери в найближчий час з вами зв'яжуться.
Уточнити покупку можна емейлом: domovuk5@gmail.com.
А також за номером телефону: +380973223959");


mail('domovuk5@gmail.com','Нове замовлення', 'ПІБ: '.$name.'
Номер телефону: '.$phone.'
Email: '.$email.'
Місто: '.$city.'
Адреса: '.$adress.'
Доставка: '. $post.'
Загальна сума: '. $_SESSION['total_sum'].'

Склад:'.$message);

unset($_SESSION['cart']);
unset($_SESSION['total_sum']);
unset($_SESSION['total_quantity']);
unset($_SESSION['end_total_qty']);
echo json_encode($data);