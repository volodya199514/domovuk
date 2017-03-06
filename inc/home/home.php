<div class="center">
    <div class="slider_center">
<script type="text/javascript">
        $(function() {
            $('#carousel').carouFredSel({
                width: '100%',
                items: {
                    visible: 1,
                    start: -1
                },
                scroll: {
                    items: 1,
                    duration: 1000,
                    timeoutDuration: 50000
                },
                prev: '#prev',
                next: '#next',
                pagination: {
                    container: '#pager',
                    deviation: 1
                }
            });
        });
    </script>
    <div class="slid">
        <div id="wrapper">
            <div id="carousel">

                <?php
                $img = selectSlider();
                ?>
                <?php if($img):?>
                    <?php foreach($img as $image): ?>
                        <img src="<?=$image['adress']?>"/>
                    <?php endforeach; ?>
                <?php endif;?>

               <!--
                <img src="/img/slider/2.jpg" />
                <img src="/img/slider/3.jpg" />
                <img src="/img/slider/4.jpg" />
                <img src="/img/slider/5.jpg" />
                <img src="/img/slider/6.jpg" />
                -->
            </div>
            <div class="bot_prev_next">
                <a href="#" id="prev"> </a>
                <a href="#" id="next"> </a>
            </div>
            <div id="pager"></div>
        </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $(".klick_slid_top , .klick_slid_buttom").hover(
            function() {
                $(this).stop().animate({"opacity": "1"}, "slow");
            },
            function() {
                $(this).stop().animate({"opacity": "0.5"}, "slow");
            });
    });
</script>
        </div>


    <?php
        $homeProducts = selectHomeProduct()
    ?>

    <div class="popular_tovar">
        <div class="name_popular_tovar">Популярні товари:</div>

            <?php if($homeProducts): ?>
                <?php foreach($homeProducts as $product):?>
                    <div class="block_tovar">
                        <div class="tovar_img">
                            <img src="<?=$product['img']?>">
                        </div>
                             <div class="name_tovar">
                                     <p><?=$product['name']?></p>
                             </div>
                                <div class="parametru">
                                    <p>Висота:&nbsp;<?=$product['height']?>&nbsp;см.</p>
                                    <p>Ширина:&nbsp;<?=$product['width']?>&nbsp;см. </p>
                                    <p>Ціна:&nbsp;<?=$product['price']?>&nbsp;грн.</p>

                                         <?php if(!isset($_SESSION['cart'][$product['id']])):?>
                                    <div class="pokupka_corzuna">   <!--щоб купити і занести в корзину попаб-->
                                        <img src="/img/detalipsd/symka.png">
                                        <a href="?view=addtocart&goods_id=<?=$product['id']?>">Купити</a>
                                    </div>

                                        <?php else:?>
                                    <!-- продукція не в корзині -->
                                     <div class="pokupka_corzuna_kohuk">
                                        <a href="#">В корзині</a>
                                    </div>   <!-- продукція у корзині -->
                                    <?php endif; ?>

                                    <?php if($product['new']=='1'): ?>
                                        <div class="top-novunka">
                                            <img src="/img/detalipsd/novunka.png">
                                        </div>
                                    <?php elseif($product['hits']=='1'): ?>
                                        <div class="top-emblem">
                                            <img src="/img/detalipsd/sale.png">
                                        </div>
                                    <?php endif; ?>
                            </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                Немає товару.
            <?php endif; ?>


            <!--        <div class="block_tovar">
                        <div class="tovar_img">
                            <img src="/img/product/1.jpg">
                    </div>
                        <div class="name_tovar">
                            <p>Пара домовиків </p>
                        </div>
            <div class="parametru">
                <p>Висота:&nbsp;15&nbsp;см.</p>
                <p>Ширина:&nbsp;20&nbsp;см. </p>
                <p>Ціна:&nbsp;100000&nbsp;грн.</p>
                <div class="pokupka_corzuna">
                    <img src="/img/detalipsd/symka.png">
                    <a href="#">Купити</a>
                </div>
                <div class="top-novunka">
                    <img src="/img/detalipsd/novunka.png">
                </div>
            </div>
        </div>
        <div class="block_tovar">
            <div class="tovar_img">
                <img src="/img/product/1.jpg">
            </div>
            <div class="name_tovar">
                <p>Домовик середній</p>
            </div>
            <div class="parametru">
                <p>Висота:&nbsp;15&nbsp;см.</p>
                <p>Ширина:&nbsp;20&nbsp;см. </p>
                <p>Ціна:&nbsp;100000&nbsp;грн.</p>
                <div class="pokupka_corzuna">
                    <img src="/img/detalipsd/symka.png">
                    <a href="#">Купити</a>
                </div>
                <div class="top-emblem">
                    <img src="/img/detalipsd/sale.png">
                </div>
            </div>
        </div>
        <div class="block_tovar">
            <div class="tovar_img">
                <img src="/img/product/1.jpg">
            </div>
            <div class="name_tovar">
                <p>Домовик малий</p>
            </div>
            <div class="parametru">
                <p>Висота:&nbsp;15&nbsp;см.</p>
                <p>Ширина:&nbsp;20&nbsp;см. </p>
                <p>Ціна:&nbsp;100000&nbsp;грн.</p>
                <div class="pokupka_corzuna">
                    <img src="/img/detalipsd/symka.png">
                    <a href="#">Купити</a>
                </div>
                <div class="top-novunka">
                    <img src="/img/detalipsd/novunka.png">
                </div>
            </div>
        </div>
        <div class="block_tovar">
            <div class="tovar_img">
                <img src="/img/product/1.jpg">
            </div>
            <div class="name_tovar">
                <p>Домовик вел.</p>
            </div>
            <div class="parametru">
                <p>Висота:&nbsp;15&nbsp;см.</p>
                <p>Ширина:&nbsp;20&nbsp;см. </p>
                <p>Ціна:&nbsp;100000&nbsp;грн.</p>
                <div class="pokupka_corzuna">
                    <img src="/img/detalipsd/symka.png">
                    <a href="#">Купити</a>
                </div>
                <div class="top-emblem">
                    <img src="/img/detalipsd/sale.png">
                </div>
            </div>
        </div>
        <div class="block_tovar">
            <div class="tovar_img">
                <img src="/img/product/1.jpg">
            </div>
            <div class="name_tovar">
                <p>Домовик вел.</p>
            </div>
            <div class="parametru">
                <p>Висота:&nbsp;15&nbsp;см.</p>
                <p>Ширина:&nbsp;20&nbsp;см. </p>
                <p>Ціна:&nbsp;100000&nbsp;грн.</p>
                <div class="pokupka_corzuna">
                    <img src="/img/detalipsd/symka.png">
                    <a href="#">Купити</a>
                </div>
                <div class="top-emblem">
                    <img src="/img/detalipsd/sale.png">
                </div>
            </div>
        </div>
        <div class="block_tovar">
            <div class="tovar_img">
                <img src="/img/product/1.jpg">
            </div>
            <div class="name_tovar">
                <p>Домовик вел.</p>
            </div>
            <div class="parametru">
                <p>Висота:&nbsp;15&nbsp;см.</p>
                <p>Ширина:&nbsp;20&nbsp;см. </p>
                <p>Ціна:&nbsp;100000&nbsp;грн.</p>
                <div class="pokupka_corzuna">
                    <img src="/img/detalipsd/symka.png">
                    <a href="#">Купити</a>
                </div>
            </div>
        </div>
        <div class="block_tovar">
            <div class="tovar_img">
                <img src="/img/product/1.jpg">
            </div>
            <div class="name_tovar">
                <p>Домовик вел.</p>
            </div>
            <div class="parametru">
                <p>Висота:&nbsp;15&nbsp;см.</p>
                <p>Ширина:&nbsp;20&nbsp;см. </p>
                <p>Ціна:&nbsp;100000&nbsp;грн.</p>
                <div class="pokupka_corzuna">
                    <img src="/img/detalipsd/symka.png">
                    <a href="#">Купити</a>
                </div>
            </div>
        </div>-->
        </div>
    </div>

