$(document).ready(function(){
    var files;

    $('#badd').on("click", function(){
        $('#fileToUploadSlider').click();
    });

    $('input[type=file]').on('change', function(event){//////////тут помилка
        event.stopPropagation();
        event.preventDefault();

        var files = event.target.files;

        var data = new FormData();
        data.append('file', files[0])

        $.ajax({
            url: '/admin/ajax/slider/addphoto.php',
            type: 'POST',
            data: data,
            dataType: 'json',
            cache: false,
            processData: false,
            contentType: false,
            success: function(data){
                if(data.Error === 0){
                    $(".foto_slaider").children().remove();
                    $(".foto_slaider").append("<img src="+data.Adress+">");
                    refresh();
                }else{
                    console.log(data.Msg);
                }
            }
        });
    });

    function refresh(){
        $.ajax({
            url: '/admin/ajax/slider/select.php',
            type: 'POST',
            data: {"do":"givemethis"},
            dataType: 'json',
            success: function(data){
                if(data.Error === 0){
                    $(".menu_popup_slider").children().empty();
                    data.Data.forEach(function(item){
                        $('.menu_popup_slider').children().append('<option>'+item.name+'</option>');
                    });
                    $('.menu_popup_slider select').change();
                }
            }
        });
    };

    $('#bdelpopup').on("click", function(){
        var data = $('.menu_popup_slider select').val();
        $.ajax({
            url: '/admin/ajax/slider/deletephoto.php',
            type: 'POST',
            data: {"name":data,"do":"del"},
            dataType: 'json',
            success: function(data){
                if(data.Error === 0){
                    refresh();
                }
            }
        });
    });

    $('.menu_popup_slider select').on('change', function(){
        var data = $('.menu_popup_slider select').val();

        $.ajax({
            url: '/admin/ajax/slider/deletephoto.php',
            type: 'POST',
            data: {"name":data,"do":"get"},
            dataType: 'json',
            success: function(data){
                if(data.Error === 0){
                    $(".foto_slider_delete").empty();
                    $(".foto_slider_delete").append("<img src="+data.Adress+">");
                }
            }
        });
    });

    refresh();
});