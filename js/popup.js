$(document).ready(function() {

    $('#overlay').css({opacity: 0.5}); // Делаем затемняющий фон кроссбраузерным
    positionCenter($('#popup_busket')); // Позиционируем всплывающее окно по центру
    positionCenter($('#popup_congratulations'));
    positionCenter($('#popup_information'));
    positionCenter($('#popup_empty'));

    $('#show_popup_empty').click(function() { // При клике по ссылке, показываем всплывающее окно
        $('#popup_empty, #overlay').fadeIn(300);
    });

    $('#show_popup_busket').click(function() { // При клике по ссылке, показываем всплывающее окно
        $('#popup_busket, #overlay').fadeIn(300);
    });

    $('#show_popup_information').click(function() { // При клике по ссылке, показываем всплывающее окно
        $('#popup_busket, #overlay').fadeOut(0);
        $('#popup_information, #overlay').fadeIn(0);
    });


var flag1 = false, flag2 = false, flag3 = false, flag4 = false, flag5 = false, flag6 = false;

   $('#show_popup_congratulations').click(function() { // При клике по ссылке, показываем всплывающее окно



       var order = new FormData();
       var pattern_name = /^([^0-9]*)$/;//без цифр
       var pattern_phone = /^(\+?\d+)?\s*(\(\d+\))?[\s-]*([\d-]*)$/;//можуть бути цифри, -, + на початку.
       var pattern_email = /^([a-z0-9._-]){1,20}@(([a-z0-9-]+\.)+(com|net|org|mil|"."edu|gov|arpa|info|biz|inc|name|[a-z]{2})|[0-9]{1,3}\.[0-9]{1,3}\.[0 -"."9]{1,3}\.[0-9]{1,3})$/;//емейл





       if(($('#input_name').val() && pattern_name.test($('#input_name').val())) ||
           ($('#input_name_error').val() && pattern_name.test($('#input_name_error').val()))  ){
;
           if($('#input_name_error').val())
                input_name_error.id='input_name';
           input_name.id = "input_name";
           flag1=true;
       }else{
           flag1=false;
           if( $('#input_name_error').val()== null && pattern_name.test($('#input_name_error').val()) )
               input_name.id = "input_name_error";
           else
           input_name_error.id = "input_name_error";
       }


       if(($('#input_phone').val() && pattern_phone.test($('#input_phone').val())) ||
           ($('#input_phone_error').val() && pattern_phone.test($('#input_phone_error').val()))  ){

           if($('#input_phone_error').val())
               input_phone_error.id='input_phone';
           input_phone.id = "input_phone";
           flag2=true;
       }else{
           flag2=false;
           if( $('#input_phone_error').val()== null && !pattern_phone.test($('#input_phone_error').val()) )
               input_phone.id = "input_phone_error";
           else
               input_phone_error.id = "input_phone_error";
       }

       if(($('#input_email').val() && pattern_email.test($('#input_email').val())) ||
           ($('#input_email_error').val() && pattern_email.test($('#input_email_error').val()))  ){

           if($('#input_email_error').val())
               input_email_error.id='input_email';
           input_email.id = "input_email";
           flag3=true;
       }else{
           flag3=false;
           if( $('#input_email_error').val()== null &&  !pattern_email.test($('#input_email_error').val())  )
               input_email.id = "input_email_error";
           else
               input_email_error.id = "input_email_error";
       }

       if(($('#input_city').val() && pattern_name.test($('#input_city').val())) ||
           ($('#input_city_error').val() && pattern_name.test($('#input_city_error').val()))  ){

           if($('#input_city_error').val())
               input_city_error.id='input_city';
           input_city.id = "input_city";
           flag4=true;
       }else{
           flag4=false;
           if( $('#input_city_error').val()== null && pattern_name.test($('#input_city_error').val()) )
               input_city.id = "input_city_error";
           else
               input_city_error.id = "input_city_error";
       }

       if($('#input_adress').val()  ||$('#input_adress_error').val()){

           if($('#input_adress_error').val())
               input_adress_error.id='input_adress';
           input_adress.id = "input_adress";
           flag5=true;
       }else{
           flag5=false;
           if( $('#input_adress_error').val()== null )
               input_adress.id = "input_adress_error";
           else
               input_adress_error.id = "input_adress_error";
       }


           if(document.getElementById('pohta_check')!=null)
                flag6=true;



if(flag1 && flag2 && flag3 && flag4 && flag5 && flag6){

       order.append('name', $('#input_name').val());
       order.append('phone', $('#input_phone').val());
       order.append('email', $('#input_email').val());
       order.append('city', $('#input_city').val());
       order.append('adress', $('#input_adress').val());
       order.append('post1', $('#popup_information_post_new_post').prop('checked')? 2 : 1);
       order.append('post2', $('#popup_information_post_mist_express').prop('checked')? 4 : 3);
       order.append('post3', $('#popup_information_post_intaym').prop('checked')? 6 : 5);


           $.ajax({
               url: '/ajax/order/addOrder.php',
               type: 'POST',
               data: order,
               dataType: 'json',
               cache: false,
               processData: false,
               contentType: false,
               success: function(data){

                   console.log(data.category+','+data.photo+','+data.tovar_name+','
                       +data.qty+','+data.price+','+data.name+','
                       +data.phone+','+data.email+','+data.city+','+data.post1+','+data.post2+','+data.post3+data.adress+','+data.data);
               }
           });

           $('#popup_information, #overlay').fadeOut(0);
           $('#popup_congratulations, #overlay').fadeIn(0);
       }



    });

    $('#close_popup_button').click(function() { // Скрываем всплывающее окно при клике по кнопке закрыть
        $('#popup_congratulations, #overlay').fadeOut(300);
        window.location.href = window.location.href;
    });

    $('#close_popup').click(function() { // Скрываем всплывающее окно при клике по кнопке закрыть
        localStorage.setItem('popup', 'close');
        window.location.href = window.location.href;
        $('#popup_empty, #overlay').fadeOut(300);
    });
    $('#close_popup_busket').click(function() { // Скрываем всплывающее окно при клике по кнопке закрыть
        $('#popup_busket, #overlay').fadeOut(300);
        localStorage.setItem('popup', 'close');
        window.location.href = window.location.href;
    });
    $('#close_popup_information').click(function() { // Скрываем всплывающее окно при клике по кнопке закрыть
        $('#popup_information, #overlay').fadeOut(300);
        localStorage.setItem('popup', 'close');
        window.location.href = window.location.href;
    });
    $('#close_popup_congratulations').click(function() { // Скрываем всплывающее окно при клике по кнопке закрыть

        $('#popup_congratulations, #overlay').fadeOut(300);
        localStorage.setItem('popup', 'close');
        window.location.href = window.location.href;
    });

    function positionCenter(elem) { // Функция, которая позиционирует всплывающее окно по центру
        elem.css({
            marginTop: 100 + 'px',
            marginLeft: '-' + elem.width() / 2 + 'px'
        });
    }
});