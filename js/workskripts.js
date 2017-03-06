$(document).ready(function(){

    if (localStorage.getItem('popup') === 'open'){
        $('#show_popup_empty').trigger("click");
    }



    $("#popup_busket").on("click", ".popup_busket_but_del_good", function(){
        var goodid = $(this).attr('id').match(/\d/g).join("");
        var that = $(this);

        console.log(that.parent().parent());

        $.ajax({
            url: '/ajax/busket/delete.php',
            type: 'POST',
            data: {"action" :  'count'},
            dataType: 'json',
            success: function(data11){
                console.log(data11);
                if(data11.error === 0){
                    console.log(data11.msg);

                    $.ajax({
                        url: '/ajax/busket/delete.php',
                        type: 'POST',
                        data: {"action" :  'del', "goodId" : goodid},
                        dataType: 'json',
                        success: function(data22){
                            console.log(data22);

                            if(data22.error === 0){
                                console.log(data22.msg);
                                that.parent().parent().remove();
                                $("#popup_busket_total_sum").text(data22.newtotal + " грн.");

                                if(data11.count < 2){
                                    localStorage.setItem('popup', 'open');
                                    window.location.href = window.location.href;
                                }

                            }else{
                                console.log(data22.msg);
                            }
                        },
                        error: function( jqXhr, textStatus, errorThrown ){
                            console.log( errorThrown );

                            if(data11.count < 2){
                                localStorage.setItem('popup', 'open');
                                window.location.href = window.location.href;
                            }
                        }
                    });


                }else{
                    console.log(data11.msg);
                }
            },
            error: function( jqXhr, textStatus, errorThrown ){
                console.log( errorThrown );
            }
        });
    });

    $(".kilkist_product").on("click", ".left_dodat_product", function(){

        var goodid = $(this).attr('id');
        goodid = parseInt(goodid);
        var that = $(this);

        var tval = that.parent().parent().children(".kilkist_product").children('.input-text').val();


        if(tval > 1){
            that.parent().parent().children(".kilkist_product").children('.input-text').val((parseInt(tval) - 1));
        $.ajax({
            url: '/ajax/busket/plusminus.php',
            type: 'POST',
            data: {"action" :  'minus', "goodId" : goodid},
            dataType: 'json',
            success: function(data){
                console.log(data);

                if(data.error === 0){
                    console.log(data.msg);

                    that.parent().parent().children('.ostatochna_suma').empty().append('<p>'+data.newsumprice+'</p>');
                    $("#popup_busket_total_sum").text(data.newtotal + " грн.");
                    $(".end-order").empty().append("Вітаю! Ви оформили замовлення на "+'<span>'+data.newtotal+'</span>'+'<span>'+" грн."+'</span>'+" Очікуйте на дзвінок, наші оператори з Вами зв'яжуться, щоб уточнити деталі покупки.");

                }else{
                    console.log(data.msg);
                }
            },
            error: function( jqXhr, textStatus, errorThrown ){
                console.log( errorThrown );
            }
        });
        };
    });

    $(".input-text").on("input", function(){
        var tval = $(this).val();

        if (tval < 1 || isNaN(tval)){
            $(this).val(1);
        }

        tval = $(this).val();

        var goodid = $(this).attr('id');
        goodid = parseInt(goodid);
        var that = $(this);



        $.ajax({
            url: '/ajax/busket/plusminus.php',
            type: 'POST',
            data: {"action" :  'input', "goodId" : goodid, "val" : tval},
            dataType: 'json',
            success: function(data){
                console.log(data);

                if(data.error === 0){
                    console.log(data.msg);
                    that.parent().parent().children(".kilkist_product").children('.input-text').val((parseInt(tval)));
                    that.parent().parent().children('.ostatochna_suma').empty().append('<p>'+data.newsumprice+'</p>');
                    $("#popup_busket_total_sum").text(data.newtotal + " грн.");
                    $(".end-order").empty().append("Вітаю! Ви оформили замовлення на "+'<span>'+data.newtotal+'</span>'+'<span>'+" грн."+'</span>'+" Очікуйте на дзвінок, наші оператори з Вами зв'яжуться, щоб уточнити деталі покупки.");

                }else{
                    console.log(data.msg);
                }
            },
            error: function( jqXhr, textStatus, errorThrown ){
                console.log( errorThrown );
            }
        });

    });

    $(".kilkist_product").on("click", ".right_dodat_product", function(){
        var goodid = $(this).attr('id');
        goodid = parseInt(goodid);
        var that = $(this);

        var tval = that.parent().parent().children(".kilkist_product").children('.input-text').val();
        that.parent().parent().children(".kilkist_product").children('.input-text').val((parseInt(tval) + 1));

        $.ajax({
            url: '/ajax/busket/plusminus.php',
            type: 'POST',
            data: {"action" :  'plus', "goodId" : goodid},
            dataType: 'json',
            success: function(data){
                console.log(data);

                if(data.error === 0){
                    console.log(data.msg);

                    that.parent().parent().children('.ostatochna_suma').empty().append('<p>'+data.newsumprice+'</p>');
                    $("#popup_busket_total_sum").text(data.newtotal + " грн.");
                    $(".end-order").empty().append("Вітаю! Ви оформили замовлення на "+'<span>'+data.newtotal+'</span>'+'<span>'+" грн."+'</span>'+" Очікуйте на дзвінок, наші оператори з Вами зв'яжуться, щоб уточнити деталі покупки.");



                }else{
                    console.log(data.msg);
                }
            },
            error: function( jqXhr, textStatus, errorThrown ){
                console.log( errorThrown );
            }
        });
    });

    });







