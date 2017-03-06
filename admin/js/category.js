/**
 * Created by vova on 29.07.15.
 */
$(document).ready(function(){
    $("#form_category_add").submit(function(){
        $.ajax({
            type: "POST",
            url: "addCategory.php",
            data: $(this).serialize()
        }).done(function(){

        });
    });

    $("#form_category_edit").submit(function(){
        $.ajax({
            type: "POST",
            url: "editCategory.php",
            data: $(this).serialize()
        }).done(function(data){

            $(".foto_popup_categori_red").append("<img src="+data.Adress+"><input name='id' value='"+data.Idi +"'>");

        });
    });

    $("#form_category_delete").submit(function(){

        $.ajax({
            type: "POST",
            url: "deleteCategory.php",
            data: $(this).serialize()
        }).done(function(){

        });
    });


    function refreshCategory(){
        $.ajax({
            url: '/admin/ajax/category/selectCategory.php',
            type: 'POST',
            data: {"do":"givemethis"},
            dataType: 'json',
            success: function(data){
                if(data.Error === 0){
                    $(".menu_popup_categori_red").children().empty();

                    data.Data.forEach(function(item){
                        $('.menu_popup_categori_red').children().append('<option>'+item.name +'</option>');
                    });
                    $('.menu_popup_categori_red select').change();
                }
            }
        });
    };

    function refreshCategoryDelete(){
        $.ajax({
            url: '/admin/ajax/category/selectCategory.php',
            type: 'POST',
            data: {"do":"givemethis"},
            dataType: 'json',
            success: function(data){
                if(data.Error === 0){
                    $(".menu_popup_categori_delete").children().empty();
                    data.Data.forEach(function(item){
                        $('.menu_popup_categori_delete').children().append('<option>'+item.name+'</option>');
                    });
                    $('.menu_popup_categori_delete select').change();
                }
            }
        });
    };

    $('.menu_popup_categori_red select').on('change', function(){
        var data = $('.menu_popup_categori_red select').val();

        $.ajax({
            url: '/admin/ajax/category/editCategory.php',
            type: 'POST',
            data: {"name":data,"do":"get"},
            dataType: 'json',
            success: function(data){
//console.log(data);
                if(data.Error === 0){
                    $(".foto_popup_categori_red").children().remove();
                    $(".foto_popup_categori_red").append("<img src="+data.Adress+"><input type='hidden' name='id' value='"+data.Idi +"'>");
                }
            }
        });
    });


    $('.menu_popup_categori_delete select').on('change', function(){
        var data = $('.menu_popup_categori_delete select').val();

        $.ajax({
            url: '/admin/ajax/category/deleteCategory.php',
            type: 'POST',
            data: {"name":data,"do":"get"},
            dataType: 'json',
            success: function(data){
                // console.log(data);

                if(data.Error === 0){
                    $(".foto_popup_categori_delete").children().remove();
                    $(".foto_popup_categori_delete").append("<img src="+data.Adress+"><input type='hidden' name='id' value='"+data.Idi +"'>");
                }
            }
        });
    });


    refreshCategoryDelete();

    refreshCategory();

});
