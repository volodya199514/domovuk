$(function(){
    new AjaxUpload($('#upload_category'),{
        action: 'upload.php',
        name: 'uploadfile',
        onSubmit: function(file, ext){
            if(!(ext && /^(jpg|png|jpeg|gif)$/.test(ext))){
                return false;
            }

        },
        onComplete: function(file, response){
            if(response==="success"){
                $('#files').html('');
                $('<li style="display: inline;"></li>').appendTo('#files').html('<img src="./../img/categori/'
                    +file+'" /><br /><input type="hidden" name="img" value="/img/categori/'+file+'"> ').addClass('success');
                document.getElementById('/img/categori/'+file);
            } else{
                $('<li style="display: none;"></li>').appendTo('#files').text('Файл не загружен'
                    + file).addClass('error');
            }
        }
    });
});

$(function(){
    new AjaxUpload($('#edit_category'),{
        action: 'upload.php',
        name: 'uploadfile',
        onSubmit: function(file, ext){
            if(!(ext && /^(jpg|png|jpeg|gif)$/.test(ext))){
                $('#status').text('можна загружати файли ' +
                    'тільки з розширеннями jpg, png, jpeg, gif')
                return false;
            }
            $('#status').text('загрузка...');
        },
        onComplete: function(file, response){
            $('#status').text('');

            if(response==="success"){
                $('#category_red').html('');
                $('<li style="display: inline;"></li>').appendTo('#category_red').html('<img src="./../img/categori/'
                    +file+'" /><br /><input type="hidden" name="new_img" value="/img/categori/'+file+'"> ').addClass('success');
                document.getElementById('/img/categori/'+file);
            } else{
                $('<li style="display: none;"></li>').appendTo('#category_red').text('Файл не загружен'
                    + file).addClass('error');
            }
        }
    });
});