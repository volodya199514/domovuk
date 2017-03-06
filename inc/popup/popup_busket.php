<div id="popup_busket">
    <div class="center_popup">
        <div class="zamovlenna_one">
            <p>Кошик</p>
        </div>
        <div class="zamovlenna_cryg_one">
            <p>1</p>
        </div>
        <div class="zamovlenna_dva">
            <p>Контактна інформація</p>
        </div>
        <div class="zamovlenna_cryg_dva">
            <p>2</p>
        </div>
        <div class="zamovlenna_three">
            <p>Замовлення оформленно</p>
        </div>
        <div class="zamovlenna_cryg_three">
            <p>3</p>
        </div>

        <?php foreach($_SESSION['cart'] as $key=>$item): ?>
            <div class="block_popup_tovar">
                <div class="delete_block_popub_tovar">
                    <a class="popup_busket_but_del_good" id="goodId=<?=$key?>" href="javascript:;">
                        <img src="../img/detalipsd/cr_orange.png"></a>
                </div>
                <div class="popup_tovar_text">
                    <p><?=$item['name']?></p>
                </div>
                <div class="block_popup_tovar_img">
                    <img width="30" height="30" src="<?=$item['img']?>">
                </div>
                <div class="suma_tovar">
                    <p><?=$item['price']?> грн.</p>
                </div>
                <div class="kilkist_product">
                    <div class="left_dodat_product" id="<?=$key?>plusId"></div>
                    <input id="<?=$key?>id" name="quantity" type="text" class="input-text" value="<?=$item['endqty']?>">
                    <div class="right_dodat_product" id="<?=$key?>minusId"></div>
                </div>
                <div class="osnovna_suma">
                    <p>Сума:</p>
                </div>
                <div class="ostatochna_suma">
                    <p><?=$item['sumprice']?></p>
                </div>
            </div>
        <?php endforeach; ?>

        <!--   <div class="block_popup_tovar">
               <div class="delete_block_popub_tovar">
                   <a href="#"></a>
               </div>
               <div class="popup_tovar_text">
                   <p>Домовик великий</p>
               </div>
               <div class="block_popup_tovar_img">
                   <img src="/img/product/1.jpg">
               </div>
               <div class="suma_tovar">
                   <p>30 грн.</p>
               </div>
               <div class="kilkist_product">
                   <div class="left_dodat_product"></div>
                   <input name="quantity" type="text" class="input-text" value="10">
                   <div class="right_dodat_product"></div>
               </div>
               <div class="osnovna_suma">
                   <p>Сума:</p>
               </div>
               <div class="ostatochna_suma">
                   <p>300 грн.</p>
               </div>
           </div> -->

    </div>
    <div class="oformutu_zamovlenna">
        <p>Загалом <a id="popup_busket_total_sum" href="#"><?=$_SESSION['total_sum']?> грн.</a></p>
        <input id="show_popup_information" type="button" value="Оформити замовлення" name="of_zam" >
    </div>
    <div id="close_popup_busket"></div>

</div>
