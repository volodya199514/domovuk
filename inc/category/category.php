<?php

$perpage = 12;// кількість категорій на сторінці
if(isset($_GET['page'])){
    $page = (int)$_GET['page'];
    if($page<1) $page=1;
}else{
    $page=1;
}

$count_rows= count_rows_category();//кількість категорій
$pages_count = ceil($count_rows/$perpage);//Кількість сторінок
if(!$pages_count) $pages_count=1;//мінімум одна сторінка
if($page>$pages_count) $page=$pages_count; // якщо запрошена сторінка більша максимуму

$start_pos = ($page-1)*$perpage;//початкова сторінка для запиту
?>

<?php
$categorys = selectCategory($start_pos, $perpage);
?>

<div class="center">
    <div class="center_kategoria">
        <div class="browse_by_category">
            <ul>
                <li><a href="#">domovic.com.ua</a></li>
                <li><i></i></li>
                <li>Категорії</li>
            </ul>
            <div class="kategoria_product">
                <?php if($categorys): ?>
                    <?php foreach($categorys as $category): ?>
                        <div class="block_tovar_kategoria">
                            <a href="?view=product&cat=<?=$category['id']?>">
                                <div class="tovar_img_kategoria">
                                    <img src="<?=$category['img']?>">
                                </div>
                                <div class="name_tovar_kategoria">
                                    <p><?=$category['name']?></p>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>

                <?php else: ?>
                    Немає категорій.
                <?php endif ?>


                <!--        <div class="block_tovar_kategoria">
                           <a href="product">
                               <div class="tovar_img_kategoria">
                                   <img src="/img/categori/1.jpg">
                               </div>
                               <div class="name_tovar_kategoria">
                                   <p> Домовик середній</p>
                               </div>
                           </a>
                       </div>
                       <div class="block_tovar_kategoria">
                           <a href="product">
                               <div class="tovar_img_kategoria">
                                   <img src="/img/categori/1.jpg">
                               </div>
                               <div class="name_tovar_kategoria">
                                   <p> Домовик малий </p>
                               </div>
                           </a>
                       </div>
                       <div class="block_tovar_kategoria">
                           <a href="product">
                               <div class="tovar_img_kategoria">
                                   <img src="/img/categori/1.jpg">
                               </div>
                               <div class="name_tovar_kategoria">
                                   <p> великий домовичків</p>
                               </div>
                           </a>
                       </div>
                       <div class="block_tovar_kategoria">
                           <a href="product">
                               <div class="tovar_img_kategoria">
                                   <img src="/img/categori/1.jpg">
                               </div>
                               <div class="name_tovar_kategoria">
                                   <p> Домовик вел.</p>
                               </div>
                           </a>
                       </div>
                       <div class="block_tovar_kategoria">
                           <a href="product">
                               <div class="tovar_img_kategoria">
                                   <img src="/img/categori/1.jpg">
                               </div>
                               <div class="name_tovar_kategoria">
                                   <p> Домовик вел.</p>
                               </div>
                           </a>
                       </div>
                       <div class="block_tovar_kategoria">
                           <a href="product">
                               <div class="tovar_img_kategoria">
                                   <img src="/img/categori/1.jpg">
                               </div>
                               <div class="name_tovar_kategoria">
                                   <p> Домовик вел.</p>
                               </div>
                           </a>
                       </div>
                       <div class="block_tovar_kategoria">
                           <a href="product">
                               <div class="tovar_img_kategoria">
                                   <img src="/img/categori/1.jpg">
                               </div>
                               <div class="name_tovar_kategoria">
                                   <p> Домовик вел.</p>
                               </div>
                           </a>
                       </div>
                       <div class="block_tovar_kategoria">
                           <a href="product">
                               <div class="tovar_img_kategoria">
                                   <img src="/img/categori/1.jpg">
                               </div>
                               <div class="name_tovar_kategoria">
                                   <p> Домовик вел.</p>
                               </div>
                           </a>
                       </div>
                       <div class="block_tovar_kategoria">
                           <a href="product">
                               <div class="tovar_img_kategoria">
                                   <img src="/img/categori/1.jpg">
                               </div>
                               <div class="name_tovar_kategoria">
                                   <p> Домовик вел.</p>
                               </div>
                           </a>
                       </div>
                       <div class="block_tovar_kategoria">
                           <a href="product">
                               <div class="tovar_img_kategoria">
                                   <img src="/img/categori/1.jpg">
                               </div>
                               <div class="name_tovar_kategoria">
                                   <p> Домовик вел.</p>
                               </div>
                           </a>
                       </div>
                       <div class="block_tovar_kategoria">
                           <a href="product">
                               <div class="tovar_img_kategoria">
                                   <img src="/img/categori/1.jpg">
                               </div>
                               <div class="name_tovar_kategoria">
                                   <p> Домовик вел.</p>
                               </div>
                           </a>
                       </div>  -->

            </div>

        </div>
        <div class="goods_pages_center">
            <div class="goods_pages clear">
                <?php pagination($page, $pages_count) ?>
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
                <a class="forward" href="#" >Вперед</a>-->
            </div>
        </div>
    </div>

</div>