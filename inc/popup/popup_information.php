<script>

    $(document).ready(function() {
        var pc1 = $("#pc1");
        var pc2 = $("#pc2");
        var pc3 = $("#pc3");


        pc1.click(function(){
            pc1.addClass("check_click_1");
            pc2.addClass("check_click_2");
            pc3.addClass("check_click_2");
            pc1.removeClass("check_click_2");
            pc2.removeClass("check_click_1");
            pc3.removeClass("check_click_1");
            $('#popup_information_post_new_post').prop('checked', true);
            $('#popup_information_post_mist_express').prop('checked', false);
            $('#popup_information_post_intaym').prop('checked', false);
            if(document.getElementById('pohta')!=null)
                pohta.id='pohta_check';

        })

        pc2.click(function(){
            pc1.addClass("check_click_2");
            pc2.addClass("check_click_1");
            pc3.addClass("check_click_2");
            pc1.removeClass("check_click_1");
            pc2.removeClass("check_click_2");
            pc3.removeClass("check_click_1");
            $('#popup_information_post_new_post').prop('checked', false);
            $('#popup_information_post_mist_express').prop('checked', true);
            $('#popup_information_post_intaym').prop('checked', false);

            if(document.getElementById('pohta')!=null)
                pohta.id='pohta_check';
        })

        pc3.click(function(){
            pc1.addClass("check_click_2");
            pc2.addClass("check_click_2");
            pc3.addClass("check_click_1");
            pc1.removeClass("check_click_1");
            pc2.removeClass("check_click_1");
            pc3.removeClass("check_click_2");
            $('#popup_information_post_new_post').prop('checked', false);
            $('#popup_information_post_mist_express').prop('checked', false);
            $('#popup_information_post_intaym').prop('checked', true);

            if(document.getElementById('pohta')!=null)
                pohta.id='pohta_check';
        })

    })

</script>


<style> .error { border-color: red; } </style><!--для видалення-->

<div id="popup_information">


    <div class="center_popup">
        <div class="zamovlenna_one_info">
            <p>Кошик</p>
        </div>
        <div class="zamovlenna_cryg_one_info">
            <p>1</p>
        </div>
        <div class="zamovlenna_dva_info">
            <p>Контактна інформація</p>
        </div>
        <div class="zamovlenna_cryg_dva_info">
            <p>2</p>
        </div>
        <div class="zamovlenna_three_info">
            <p>Замовлення оформленно</p>
        </div>
        <div class="zamovlenna_cryg_three_info">
            <p>3</p>
        </div>



            <div class="inform">

            <label>П.І.Б.</label>
            <input  id="input_name" class="input_name" type="text"  name="name" placeholder="Прізвище Ім'я По-батькові"><br>
            <label>Номер телефону</label>
            <input style="margin-left: 47px" id="input_phone" type="text"  name="phone" placeholder="+380983285564"><br>
            <label>E-mail</label>
            <input id="input_email" type="text"  name="email"placeholder="domovuk5@mai.ru"><br>
                <label>Місто</label>
                  <input id="input_city"  type="text"  name="city" placeholder="Lviv"><br>
                <label>Адреса</label>
                <input id="input_adress" type="text"  name="adres" placeholder="вул. Драгоманова 50"><br>

                </div>

            <div class="radio_pohtu">
                <div class="radio_button">
                    <label>Доставка</label>
                </div>



                <div class="pohta" id="pohta">
                    <p  class="check left" id="pc1">Нова Пошта
                        <input id="popup_information_post_new_post"  type="radio" name="new-post" class="hidden">
                    </p>
                    <p  class="check left" id="pc2">Міст Експрес
                        <input id="popup_information_post_mist_express" type="radio" name="new-post" class="hidden">
                    </p>
                    <p  class="check left" id="pc3">Інтайм
                        <input id="popup_information_post_intaym" type="radio" name="new-post" class="hidden">
                    </p>
                </div>
            </div>


            <div class="prodov_zamovlenna">


                <input id="show_popup_congratulations" type="submit" value="Продовжити замовлення" name="prod_zam"  >

            </div>



    </div>


    <div id="close_popup_information"></div>
</div>