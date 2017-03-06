

<?php

$perpage = 6;// кількість категорій на сторінці
if(isset($_GET['page'])){
    $page = (int)$_GET['page'];
    if($page<1) $page=1;
}else{
    $page=1;
}

$count_rows= count_rows_orders();//кількість категорій
$pages_count = ceil($count_rows/$perpage);//Кількість сторінок
if(!$pages_count) $pages_count=1;//мінімум одна сторінка
if($page>$pages_count) $page=$pages_count; // якщо запрошена сторінка більша максимуму

$start_pos = ($page-1)*$perpage;//початкова сторінка для запиту
?>

<?php

if(($_POST['year']=='Рік' && $_POST['month']=='Місяці') || (!isset($_POST['year']) && !isset($_POST['mouth'])))
    $orders = selectOrder($start_pos,$perpage, '%', '%' );
elseif($_POST['year']=='Рік')
    $orders = selectOrder($start_pos,$perpage, $_POST['month'], '%'  );
elseif($_POST['month']=='Місяці')
    $orders = selectOrder($start_pos,$perpage, '%', $_POST['year'] );
else
    $orders = selectOrder($start_pos,$perpage, $_POST['month'], $_POST['year'] );

    $month = selectMonth();
?>

    <div class="center_admin_order" xmlns="http://www.w3.org/1999/html">
    <div class="help_admin">
        <div class="no_print">
            <p>Перевірка замовлення</p>
        </div>
    </div>

    <div class="search_zamovlen">
        <div class="menu_popup_search_zamovlen">
            <form action="order" method="POST">
            <select name="year">
                <option selected="selected">Рік</option>
                <?php for($i=2015; $i<2046; $i++):?>

                <option value="<?=$i;?>" <?php if($i==$_POST['year']) echo 'selected="selected";'?>><?=$i;?></option>
                <?php endfor; ?>
               <!-- <option>2016</option>
                <option>2017</option>
                <option>2045</option>-->

            </select>

            <select name="month">
                <option selected="selected" >Місяці</option>
                <?php foreach($month as $mon): ?>
                    <option value="<?=$mon['number'];?>" <?php if($mon['number']==$_POST['month']) echo 'selected="selected";'?>><?=$mon['name']; ?></option>
                <?php endforeach; ?>
               <!--
               <option>Січень</option>
                <option>Лютий</option>
                <option>Березень</option>
                <option>Квітень</option>
                <option>Травень</option>
                <option>Червень</option>
                <option>Липень</option>
                <option>Серпень</option>
                <option>Вересень</option>
                <option>Жовтень</option>
                <option>Лиспопад</option>
                <option>Грудень</option> -->
            </select>

        </div>
        <div class="search_slider">

            <input type="submit" value="Пошук" name="search">
        </div>

        </form>
        <div class="print_slider">
            <input type="submit"  value="Роздрук" onclick="window.print()">
        </div>
    </div>



    <div class="order_table">
         <div class="osnovna_tabl_zamovlen">
             <div class="osnmenu_zamovlen">
            <div class="nomer_zamovlen">
               <p>№</p>
            </div>
             <div class="categoru_zamovlen">
                 <p>Категорія</p>
             </div>
             <div class="foto_zamovlen">
                 <p>Фото</p>
             </div>
             <div class="name_tovar_zamovlen">
                 <p>Назва товару</p>
             </div>
             <div class="kilkist_zamovlen">
                 <p>Кількість</p>
             </div>
             <div class="vartist_zamovlen">
                 <p>Вартість</p>
             </div>
             <div class="pib_zamovlen">
                 <p>П.І.Б.</p>
             </div>
            <div class="tel_zamovlen">
                <p>Номер тел.</p>
            </div>
             <div class="elpohta_zamovlen">
                 <p>E-mail</p>
             </div>
             <div class="dostavka_zamovlen">
                  <p>Доставка</p>
              </div>
              <div class="city_zamovlen">
                  <p>Місто</p>
              </div>
               <div class="adres_zamovlen">
                  <p>Адреса</p>
              </div>
                 <div class="date_zamovlen">
                      <p>Дата</p>
                  </div>

            <?php if($orders): ?>
            <?php foreach($orders as $order): ?>

                 <div class="zamovlenu_tovaru">


                     <div class="nomeracia_tovar">
                         <p><?=$order['id']?></p>
                     </div>
                     <div class="categoria_tovar">
                         <p><?=$order['category']?></p>
                     </div>
                     <div class="foto_tovar">
                            <img src="<?=$order['img']?>">
                     </div>
                     <div class="name_tovar">
                         <p><?=$order['product_name']?></p>
                     </div>
                     <div class="kilkist_tovar">
                         <p><?=$order['amount']?>&nbsp;шт.</p>
                     </div>
                     <div class="vartist_tovaru">
                         <p><?=$order['price']?>&nbsp;грн.</p>
                     </div>
                     <div class="pib_tovar_zam">
                         <p><?=$order['full_name']?></p>
                     </div>
                     <div class="tel_tovar_zam">
                         <p><?=$order['phone']?></p>
                     </div>
                     <div class="el_pohta_zam">
                         <p><?=$order['email']?></p>
                     </div>
                     <div class="dostavka_pohta_zam">
                         <p><?=$order['delivery']?></p>
                     </div>
                    <div class="city_zam">
                         <p><?=$order['city']?></p>
                     </div>
                         <div class="adres_zam">
                            <p><?=$order['adress']?></p>
                        </div>
                        <div class="date_zam">
                            <p><?=$order['date']?></p>
                        </div>
                 </div>
            <?php endforeach; ?>

            <?php else: ?>
                немає заказів
            <?php endif; ?>
           <!--      <div class="zamovlenu_tovaru">
                     <div class="nomeracia_tovar">
                         <p>1</p>
                     </div>
                     <div class="categoria_tovar">
                         <p>Домовик великий</p>
                     </div>
                     <div class="foto_tovar">
                         <img src="../../../admin/img/foto_tovaru/2.jpg">
                     </div>
                     <div class="name_tovar">
                         <p>Домовик великий оранжевий</p>
                     </div>
                     <div class="kilkist_tovar">
                         <p>200&nbsp;шт.</p>
                     </div>
                     <div class="vartist_tovaru">
                         <p>10000&nbsp;грн.</p>
                     </div>
                     <div class="pib_tovar_zam">
                         <p>Lozovan Vitali Petrovich</p>
                     </div>
                     <div class="tel_tovar_zam">
                         <p>+380982268581</p>
                     </div>
                     <div class="el_pohta_zam">
                         <p>dmytro_slotvinskyy@gmail.com</p>
                     </div>
                     <div class="dostavka_pohta_zam">
                         <p>Інтайм</p>
                     </div>
                     <div class="city_zam">
                         <p>Lviv</p>
                     </div>
                     <div class="adres_zam">
                         <p>вул. Генерала Чупринки 50</p>
                     </div>
                     <div class="date_zam">
                         <p>02.07.15</p>
                     </div>
                 </div>
                 <div class="zamovlenu_tovaru">
                     <div class="nomeracia_tovar">
                         <p>1</p>
                     </div>
                     <div class="categoria_tovar">
                         <p>Домовик великий</p>
                     </div>
                     <div class="foto_tovar">
                         <img src="../../../admin/img/foto_tovaru/2.jpg">
                     </div>
                     <div class="name_tovar">
                         <p>Домовик великий оранжевий</p>
                     </div>
                     <div class="kilkist_tovar">
                         <p>200&nbsp;шт.</p>
                     </div>
                     <div class="vartist_tovaru">
                         <p>10000&nbsp;грн.</p>
                     </div>
                     <div class="pib_tovar_zam">
                         <p>Lozovan Vitali Petrovich</p>
                     </div>
                     <div class="tel_tovar_zam">
                         <p>+380982268581</p>
                     </div>
                     <div class="el_pohta_zam">
                         <p>dmytro_slotvinskyy@gmail.com</p>
                     </div>
                     <div class="dostavka_pohta_zam">
                         <p>Міст Експрес</p>
                     </div>
                     <div class="city_zam">
                         <p>Lviv</p>
                     </div>
                     <div class="adres_zam">
                         <p>вул. Генерала Чупринки 50</p>
                     </div>
                     <div class="date_zam">
                         <p>02.07.15</p>
                     </div>
                 </div>
            <div class="zamovlenu_tovaru">
                <div class="nomeracia_tovar">
                    <p>1</p>
                </div>
                <div class="categoria_tovar">
                    <p>Домовик великий</p>
                </div>
                <div class="foto_tovar">
                    <img src="../../../admin/img/foto_tovaru/2.jpg">
                </div>
                <div class="name_tovar">
                    <p>Домовик великий оранжевий</p>
                </div>
                <div class="kilkist_tovar">
                    <p>200&nbsp;шт.</p>
                </div>
                <div class="vartist_tovaru">
                    <p>10000&nbsp;грн.</p>
                </div>
                <div class="pib_tovar_zam">
                    <p>Lozovan Vitali Petrovich</p>
                </div>
                <div class="tel_tovar_zam">
                    <p>+380982268581</p>
                </div>
                <div class="el_pohta_zam">
                    <p>dmytro_slotvinskyy@gmail.com</p>
                </div>
                <div class="dostavka_pohta_zam">
                    <p>Нова Пошта</p>
                </div>
                <div class="city_zam">
                    <p>Lviv</p>
                </div>
                <div class="adres_zam">
                    <p>вул. Генерала Чупринки 50</p>
                </div>
                <div class="date_zam">
                    <p>02.07.15</p>
                </div>
            </div>
            <div class="zamovlenu_tovaru">
                <div class="nomeracia_tovar">
                    <p>1</p>
                </div>
                <div class="categoria_tovar">
                    <p>Домовик великий</p>
                </div>
                <div class="foto_tovar">
                    <img src="../../../admin/img/foto_tovaru/2.jpg">
                </div>
                <div class="name_tovar">
                    <p>Домовик великий оранжевий</p>
                </div>
                <div class="kilkist_tovar">
                    <p>200&nbsp;шт.</p>
                </div>
                <div class="vartist_tovaru">
                    <p>10000&nbsp;грн.</p>
                </div>
                <div class="pib_tovar_zam">
                    <p>Lozovan Vitali Petrovich</p>
                </div>
                <div class="tel_tovar_zam">
                    <p>+380982268581</p>
                </div>
                <div class="el_pohta_zam">
                    <p>dmytro_slotvinskyy@gmail.com</p>
                </div>
                <div class="dostavka_pohta_zam">
                    <p>Нова Пошта</p>
                </div>
                <div class="city_zam">
                    <p>Lviv</p>
                </div>
                <div class="adres_zam">
                    <p>вул. Генерала Чупринки 50</p>
                </div>
                <div class="date_zam">
                    <p>02.07.15</p>
                </div>
            </div><div class="zamovlenu_tovaru">
                <div class="nomeracia_tovar">
                    <p>1</p>
                </div>
                <div class="categoria_tovar">
                    <p>Домовик великий</p>
                </div>
                <div class="foto_tovar">
                    <img src="../../../admin/img/foto_tovaru/2.jpg">
                </div>
                <div class="name_tovar">
                    <p>Домовик великий оранжевий</p>
                </div>
                <div class="kilkist_tovar">
                    <p>200&nbsp;шт.</p>
                </div>
                <div class="vartist_tovaru">
                    <p>10000&nbsp;грн.</p>
                </div>
                <div class="pib_tovar_zam">
                    <p>Lozovan Vitali Petrovich</p>
                </div>
                <div class="tel_tovar_zam">
                    <p>+380982268581</p>
                </div>
                <div class="el_pohta_zam">
                    <p>dmytro_slotvinskyy@gmail.com</p>
                </div>
                <div class="dostavka_pohta_zam">
                    <p>Нова Пошта</p>
                </div>
                <div class="city_zam">
                    <p>Lviv</p>
                </div>
                <div class="adres_zam">
                    <p>вул. Генерала Чупринки 50</p>
                </div>
                <div class="date_zam">
                    <p>02.07.15</p>
                </div>
            </div>



-->
             </div>
         </div>


                 <div class="goods_pages_admin_center">
                     <div class="goods_pages_admin clear">

                        <?php   pagination($page, $pages_count); ?>
                        <!-- <a class=back href=""> Назад</a>
                         <ul>
                             <li><a href="#">1</a></li>
                             <li><a href="#">2</a></li>
                             <li><a href="#">3</a></li>
                             <li><span>...</span></li>
                             <li><a href="#">8</a></li>
                             <li><a href="#">9</a></li>
                             <li><a href="#">10</a></li>
                         </ul>
                         <a class="forward" href="#" >Вперед</a> -->
                     </div>
                 </div>
             </div>
</div>