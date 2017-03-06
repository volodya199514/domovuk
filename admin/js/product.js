$(document).ready(function(){

    //кароч треба знати яка кнопка клікнула хз
    var whothefuckclickonform = undefined;


    //чистимо поля після того як додали чи видалили товар
    function clearvalues(handler){
        $('#in_pop_'+handler+'_name').val('');
        $('#in_pop_'+handler+'_price').val('');
        $('#in_pop_'+handler+'_length').val('');
        $('#in_pop_'+handler+'_width').val('');

        $('#cb_pop_'+handler+'_hit').prop('checked', false);
        $('#cb_pop_'+handler+'_new').prop('checked', false);

        switch (handler){
            case 'add':
                $('#pc1').addClass('top_menu_edit_click2');
                $('#pc2').addClass('top_menu_edit_click2');
                $('#pc1').removeClass('top_menu_edit_click1');
                $('#pc2').removeClass('top_menu_edit_click1');
                break;
            case 'edit':
                $('#pc3').addClass('top_menu_edit_click2');
                $('#pc4').addClass('top_menu_edit_click2');
                $('#pc3').removeClass('top_menu_edit_click1');
                $('#pc4').removeClass('top_menu_edit_click1');
                break;
        }
    }

    //кнопка яка відкриває форму вибору файлу додавання та редагування

    $('#but_prod_add_photo ,#but_prod_edit_photo').on("click", function(event){
        whothefuckclickonform = event.target;
        $('#fileToUploadProduct').click();
    });

    //кнопка видалення

    $('#but_prod_del').on('click', function(event){

        var data = $('#sel_prod_prod_del').val();

        $.ajax({
            url: '/admin/ajax/product/delete.php',
            type: 'POST',
            data: {'name':data},
            dataType: 'json',
            success: function(data){
                if(data.error === 0){
                    console.log(data.msg);
                    catrefresh();
                }else{
                    console.log(data.msg);
                }
            }
        });
    })

    //кнопка зберегти додавання або редагування

    $('#but_prod_add_save, #but_prod_edit_save').on('click', function(event){
        var formdata = new FormData(),
            handler = undefined;

        switch (event.target.id){
            case 'but_prod_add_save':
                handler = 'add';
                break;
            case 'but_prod_edit_save':
                handler = 'edit';
                break;
        }

        formdata.append('file', $('#fileToUploadProduct')[0].files[0]);
        formdata.append('name', $('#in_pop_'+handler+'_name').val());
        formdata.append('price', $('#in_pop_'+handler+'_price').val());
        formdata.append('length', $('#in_pop_'+handler+'_length').val());
        formdata.append('width', $('#in_pop_'+handler+'_width').val());
        formdata.append('hits', $('#cb_pop_'+handler+'_hit').prop('checked') ? 2 : 1);
        formdata.append('new', $('#cb_pop_'+handler+'_new').prop('checked') ? 2 : 1);

        //категорія
        formdata.append('catname', $('#sel_prod_cat_'+handler).val());

        //дія, додавання або редагування
        formdata.append('handler', handler);

        //якщо додавання то старе імя продукту непотрібно, костилі крч
        formdata.append('oldname', handler === 'edit' ? $('#sel_prod_prod_edit').val() : 'none');

        $.ajax({
            url: '/admin/ajax/product/addedit.php',
            type: 'POST',
            data: formdata,
            dataType: 'json',
            cache: false,
            processData: false,
            contentType: false,
            success: function(data){
                if(data.error === 0){
                    console.log(data.msg);
                    clearvalues(handler);
                    catrefresh();
                }else{
                    console.log(data.msg);
                }
            }
        });
    })

    $('#fileToUploadProduct').on('change', function(event){

        //обєкт FileReader не нище IE10

        var rdr = new FileReader();
        var that = this;

        rdr.onload = function(e){
            switch (whothefuckclickonform.id){
                case 'but_prod_add_photo':
                    $('#div_img_pop_add').empty();
                    $("#div_img_pop_add").append("<img src="+ e.target.result+">");
                    break;
                case 'but_prod_edit_photo':
                    $('#div_img_pop_edit').empty();
                    $("#div_img_pop_edit").append("<img src="+ e.target.result+">");
                    break;
            }
        }

        rdr.readAsDataURL(that.files[0]);
    });

    //галочки, костиль крч

    function birds(pc1, pc2, cb1, cb2, class1, class2, prop1){
        pc1.click(function(){
            cb1.prop(prop1, true);
            cb2.prop(prop1, false);
            pc1.addClass(class1);
            pc2.addClass(class2);
            pc1.removeClass(class2);
            pc2.removeClass(class1);
        });

        pc2.click(function(){
            cb1.prop(prop1, false);
            cb2.prop(prop1, true);
            pc1.addClass(class2);
            pc2.addClass(class1);
            pc1.removeClass(class1);
            pc2.removeClass(class2);
        });
    }

    //оновлення категорій

    function catrefresh(){
        $.ajax({
            url: '/admin/ajax/product/helper.php',
            type: 'POST',
            data: {"do":"needcat"},
            dataType: 'json',
            success: function(data){
                if(data.error === 0){
                    console.log(data.msg);
                    $("#sel_prod_cat_add, #sel_prod_cat_edit, #sel_prod_cat_del").empty();
                    data.data.forEach(function(item){
                        $("#sel_prod_cat_add, #sel_prod_cat_edit, #sel_prod_cat_del").append("<option>"+item.name+"</option>");
                    });

                    $('#sel_prod_cat_edit').change();
                    $('#sel_prod_cat_del').change();
                }else{
                    console.log(data.msg);
                }
            }
        });
    };


    $('#sel_prod_cat_del, #sel_prod_cat_edit').on('change', function(){
        var that = this;

        switch (that.id){
            case 'sel_prod_cat_del':
                var thatthat = $('#sel_prod_prod_del');
                break;
            case 'sel_prod_cat_edit':
                var thatthat = $('#sel_prod_prod_edit');
                break;
        }

        $.ajax({
            url: '/admin/ajax/product/helper.php',
            type: 'POST',
            data: {"name":that.value, "do":"needcatid"},
            dataType: 'json',
            success: function(data){
                if(data.error === 0){
                    $.ajax({
                        url: '/admin/ajax/product/helper.php',
                        type: 'POST',
                        data: {"id":data.data.id,"do":"needprod"},
                        dataType: 'json',
                        success: function(data){
                            if(data.error === 0){
                                thatthat.empty();
                                data.data.forEach(function(item){
                                    thatthat.append("<option>"+item.name+"</option>");
                                });
                                switch (that.id){
                                    case 'sel_prod_cat_edit':
                                        $('#sel_prod_prod_edit').change();
                                        break;
                                    case 'sel_prod_cat_del':
                                        $('#sel_prod_prod_del').change();
                                        break;
                                }
                            }else{
                                console.log(data.msg);
                            }
                        }
                    });
                }else{
                    console.log(data.msg);
                }
            }
        });
    });

    //оновлення картинки в редагуванні і видаленні

    $('#sel_prod_prod_del, #sel_prod_prod_edit').on('change', function(){
        var that = this;

        $.ajax({
            url: '/admin/ajax/product/helper.php',
            type: 'POST',
            data: {"name":that.value, "do":"needprodimgadress"},
            dataType: 'json',
            success: function(data){
                if(data.error === 0){
                    console.log(data.msg);
                    switch (that.id){
                        case 'sel_prod_prod_edit':
                            $('#div_img_pop_edit').empty();
                            $('#div_img_pop_edit').append('<img src='+data.data.img+'>');
                            break;
                        case 'sel_prod_prod_del':
                            $('#div_img_pop_del').empty();
                            $('#div_img_pop_del').append('<img src='+data.data.img+'>');
                            break;
                    }
                }else{
                    console.log(data.msg);
                }
            }
        });
    })

    birds($('#pc1'),$('#pc2'),$('#cb_pop_add_hit'),$('#cb_pop_add_new'),'top_menu_edit_click1','top_menu_edit_click2','checked');
    birds($('#pc3'),$('#pc4'),$('#cb_pop_edit_hit'),$('#cb_pop_edit_new'),'top_menu_edit_click1','top_menu_edit_click2','checked');
    catrefresh();
});
