<?php

$perpage = 8;// кількість продуктів на сторінці
if(isset($_GET['page'])){
    $page = (int)$_GET['page'];
    if($page<1) $page=1;
}else{
    $page=1;
}

$count_rows= count_rows_product($_GET['cat']);//кількість категорій
$pages_count = ceil($count_rows/$perpage);//Кількість сторінок
if(!$pages_count) $pages_count=1;//мінімум одна сторінка
if($page>$pages_count) $page=$pages_count; // якщо запрошена сторінка більша максимуму

$start_pos = ($page-1)*$perpage;//початкова сторінка для запиту
?>

<?php
$products = selectProduct($_GET['cat'],$start_pos,$perpage);
?>

<div class="center">
    <div class="browse_by_category">
        <ul>
            <li><a href="#">domovic.com.ua</a></li>
            <li><i></i></li>
            <li><a href="category">Категорія</a></li>
            <li><i></i></li>
            <li>Продукція</li>
        </ul>
        <div class="pit_product">

            <?php if($products): ?>
                <?php foreach($products as $product): ?>
                    <div class="block_tovar_pit">
                        <div class="tovar_img_pit">
                            <img src="<?=$product['img']?>">
                        </div>
                        <div class="name_tovar_pit">
                            <p><?=$product['name']?></p>
                        </div>
                        <div class="parametru_pit">
                            <p>Висота:&nbsp;<?=$product['height']?>&nbsp;см.</p>
                            <p>Ширина:&nbsp;<?=$product['width']?>&nbsp;см. </p>
                            <p>Ціна:&nbsp;<?=$product['price']?>&nbsp;грн.</p>


                    <?php  if(!isset($_SESSION['cart'][$product['id']])):?>
                                <div class="pokupka_corzuna_pit">
                                    <img src="/img/detalipsd/symka.png">
                                    <a href="?view=addtocart&goods_id=<?=$product['id']?>">Купити</a>
                                </div>
                        <?php else: ?>
                          <div class="pokupka_corzuna_kohuk_pit">
                                  <a href="#">В корзині</a>
                              </div>
                        <?php endif; ?>




                          </div>
                      </div>
                <?php endforeach; ?>
            <?php else: ?>
                Немає товару.
            <?php endif;?>

            <!--  <div class="block_tovar_pit">
                  <div class="tovar_img_pit">
                      <img src="/img/product/1.jpg">
                  </div>
                  <div class="name_tovar_pit">
                      <p>Домовик великий</p>
                  </div>
                  <div class="parametru_pit">
                      <p>Висота:&nbsp;15&nbsp;см.</p>
                      <p>Ширина:&nbsp;20&nbsp;см. </p>
                      <p>Ціна:&nbsp;100000&nbsp;грн.</p>
                      <div class="pokupka_corzuna_pit">
                          <img src="/img/detalipsd/symka.png">
                          <a href="#">Купити</a>
                      </div>
                  </div>
              </div>
              <div class="block_tovar_pit">
                  <div class="tovar_img_pit">
                      <img src="/img/product/1.jpg">
                  </div>
                  <div class="name_tovar_pit">
                      <p>Домовик вел.</p>
                  </div>
                  <div class="parametru_pit">
                      <p>Висота:&nbsp;15&nbsp;см.</p>
                      <p>Ширина:&nbsp;20&nbsp;см. </p>
                      <p>Ціна:&nbsp;100000&nbsp;грн.</p>
                      <div class="pokupka_corzuna_pit">
                          <img src="/img/detalipsd/symka.png">
                          <a href="#">Купити</a>
                      </div>
                  </div>
              </div>
              <div class="block_tovar_pit">
                  <div class="tovar_img_pit">
                      <img src="/img/product/1.jpg">
                  </div>
                  <div class="name_tovar_pit">
                      <p>Домовик вел.</p>
                  </div>
                  <div class="parametru_pit">
                      <p>Висота:&nbsp;15&nbsp;см.</p>
                      <p>Ширина:&nbsp;20&nbsp;см. </p>
                      <p>Ціна:&nbsp;100000&nbsp;грн.</p>
                      <div class="pokupka_corzuna_pit">
                          <img src="/img/detalipsd/symka.png">
                          <a href="#">Купити</a>
                      </div>
                  </div>
              </div>
              <div class="block_tovar_pit">
                  <div class="tovar_img_pit">
                      <img src="/img/product/1.jpg">
                  </div>
                  <div class="name_tovar_pit">
                      <p>Домовик вел.</p>
                  </div>
                  <div class="parametru_pit">
                      <p>Висота:&nbsp;15&nbsp;см.</p>
                      <p>Ширина:&nbsp;20&nbsp;см. </p>
                      <p>Ціна:&nbsp;100000&nbsp;грн.</p>
                      <div class="pokupka_corzuna_pit">
                          <img src="/img/detalipsd/symka.png">
                          <a href="#">Купити</a>
                      </div>
                  </div>
              </div>
              <div class="block_tovar_pit">
                  <div class="tovar_img_pit">
                      <img src="/img/product/1.jpg">
                  </div>
                  <div class="name_tovar_pit">
                      <p>Домовик вел.</p>
                  </div>
                  <div class="parametru_pit">
                      <p>Висота:&nbsp;15&nbsp;см.</p>
                      <p>Ширина:&nbsp;20&nbsp;см. </p>
                      <p>Ціна:&nbsp;100000&nbsp;грн.</p>
                      <div class="pokupka_corzuna_pit">
                          <img src="/img/detalipsd/symka.png">
                          <a href="#">Купити</a>
                      </div>
                  </div>
              </div>
              <div class="block_tovar_pit">
                  <div class="tovar_img_pit">
                      <img src="/img/product/1.jpg">
                  </div>
                  <div class="name_tovar_pit">
                      <p>Домовик вел.</p>
                  </div>
                  <div class="parametru_pit">
                      <p>Висота:&nbsp;15&nbsp;см.</p>
                      <p>Ширина:&nbsp;20&nbsp;см. </p>
                      <p>Ціна:&nbsp;100000&nbsp;грн.</p>
                      <div class="pokupka_corzuna_pit">
                          <img src="/img/detalipsd/symka.png">
                          <a href="#">Купити</a>
                      </div>
                  </div>
              </div>
              <div class="block_tovar_pit">
                  <div class="tovar_img_pit">
                      <img src="/img/product/1.jpg">
                  </div>
                  <div class="name_tovar_pit">
                      <p>Домовик вел.</p>
                  </div>
                  <div class="parametru_pit">
                      <p>Висота:&nbsp;15&nbsp;см.</p>
                      <p>Ширина:&nbsp;20&nbsp;см. </p>
                      <p>Ціна:&nbsp;100000&nbsp;грн.</p>
                      <div class="pokupka_corzuna_pit">
                          <img src="/img/detalipsd/symka.png">
                          <a href="#">Купити</a>
                      </div>
                  </div>
              </div>    -->
              </div>
          </div>
          <div class="goods_pages_center">
              <div class="goods_pages clear">

                  <?php pagination($page, $pages_count) ?>
            <!--      <a class=back href=""> Назад</a>
                  <ul>
                      <li><a href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><span>...</span></li>
                      <li><a href="#">8</a></li>
                      <li><a href="#">9</a></li>
                      <li><a href="#">10</a></li>
                  </ul>
                  <a class="forward" href="#" >Вперед</a>  -->
              </div>
          </div>
      </div>