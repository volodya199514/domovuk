    <div class="center">
        <div class="browse_by_category">
            <ul>
                <li><a href="#">domovic.com.ua</a></li>
                <li><i></i></li>
                <li>Контакти</li>
            </ul>
        </div>
        <div class="rozt_block">
        <div class="production-block contacts left">
                <div class="kiyvstar_nomer">
                    <img src="/img/detalipsd/kuivstar.png ">
                    <p>+380973223959</p>
                </div>
            <div class="kiyvstar_nomer">
                <img src="/img/detalipsd/kuivstar.png ">
                <p>+380966942408</p>
            </div>
          <!--  <div class="life_nomer">
                <img src="/img/detalipsd/life.png ">
                <p>ще немає</p>
            </div> -->
            <div class="mail">
                <img src="/img/detalipsd/email.png">
                <p>domovuk5@gmail.com</p>
            </div>
            <div class="skype">
                <img src="/img/detalipsd/skype.png">
                <p>domovuk5</p>
            </div>
            </div>
             <div class="map">
                 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d678126.6604674354!2d25.24248440910435!3d48.40024387024975!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4736c74713fd400d%3A0xa4bbfb631db36d6f!2z0JrQvtGB0L7Qsiwg0JjQstCw0L3Qvi3QpNGA0LDQvdC60L7QstGB0LrQsNGPINC-0LHQu9Cw0YHRgtGM!5e0!3m2!1sru!2sua!4v1433874903733" width="600" height="450" frameborder="0" style="border:0"></iframe>
            </div>
            </div>
        <div class="callback">

            <script type="text/javascript">
                function checkForm(form){

                    var name = form.name.value;
                    var phone = form.phone.value;
                    var email = form.email.value;
                    var putanna = form.putanna.value;

                    var pattern_name = /^([^0-9]*)$/;//без цифр
                    var pattern_phone = /^(\+?\d+)?\s*(\(\d+\))?[\s-]*([\d-]*)$/;//можуть бути цифри, -, + на початку.
                    var pattern_email = /^([a-z0-9._-]){1,20}@(([a-z0-9-]+\.)+(com|net|org|mil|"."edu|gov|arpa|info|biz|inc|name|[a-z]{2})|[0-9]{1,3}\.[0-9]{1,3}\.[0 -"."9]{1,3}\.[0-9]{1,3})$/;//емейл

                    var flag1=false, flag2=false, flag3=false, flag4=false;

                    if(name=='' || !pattern_name.test(name)){
                        if(document.getElementById('contact_name'))
                            contact_name.id='contact_name_error';
                        flag1=false;
                    }else{
                        if(document.getElementById('contact_name_error'))
                            contact_name_error.id='contact_name';
                        flag1=true;
                    }


                    if(phone=='' || !pattern_phone.test(phone)){
                        if(document.getElementById('contact_phone'))
                            contact_phone.id='contact_phone_error';
                        flag2=false;
                    }else{
                        if(document.getElementById('contact_phone_error'))
                            contact_phone_error.id='contact_phone';
                        flag2=true;
                    }

                    if(email=='' || !pattern_email.test(email)){
                        if(document.getElementById('contact_email'))
                            contact_email.id='contact_email_error';
                        flag3=false;
                    }else{
                        if(document.getElementById('contact_email_error'))
                            contact_email_error.id='contact_email';
                        flag3=true;
                    }

                    if(putanna==''){
                        if(document.getElementById('contact_putanna'))
                            contact_putanna.id='contact_putanna_error';
                        flag4=false;
                    }else{
                        if(document.getElementById('contact_putanna_error'))
                            contact_putanna_error.id='contact_putanna';
                        flag4=true;
                    }


                    if(flag1 && flag2 && flag3 && flag4)
                    {

                        $.ajax({
                            type: "POST",
                            url: "mail.php",
                            data: {"name" :  name, "phone" : phone, "email" :  email, "message" : putanna }
                        }).done(function(){
                            $('#contact_putanna').val('');
                            $('#contact_email').val('');
                            $('#contact_phone').val('');
                            $('#contact_name').val('');

                        });
                    }
                }


            </script>

            <form id="form" method="post" action="javascript:void(null);" onsubmit="return checkForm(this);">
                <h1>Зворотній зв'язок</h1>
                <label>Ім'я:</label>
                <input id="contact_name" type="text" placeholder="Введіть Ім'я" value="<?=$_SESSION['name'] ?>"  name="name"><br>

                <label>Телефон:</label>
                <input id="contact_phone" type="text"  placeholder="+380966942408" value="<?=$_SESSION['phone']?>" name="phone"><br>

                <label>E-mail:</label>
                <input id="contact_email" type="text" placeholder="domovuk5@gmail.com" value="<?=$_SESSION['email']?>"  name="email"><br>


            <div class="callback_put">
                        <label>Питання:</label>
                    <textarea id="contact_putanna" type="text" placeholder="Задайте питання" name="putanna"><?=$_SESSION['message']?></textarea><br>
                    </div>
                     <input  type="submit" value="Надіслати" name="order" >
             </form>
        </div>
    </div>

    <?php

    ?>