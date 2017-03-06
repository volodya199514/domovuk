<?php
echo  '<script type="text/javascript" src="js/upload.js"></script>';
echo  '<script type="text/javascript" src="js/ajaxupload.3.5.js"></script>';
include_once 'inc/category/popup_category_add.php';
include_once 'inc/category/popup_category_edit.php';
include_once 'inc/category/popup_category_delete.php';
/*echo '<div id="show_popup_category_add">Тут зявляється попап додавання category</div>';
echo '<div id="show_popup_category_edit">Тут зявляється попап редагування category</div>';
echo '<div id="show_popup_category_delete">Тут зявляється попап видалення category</div>'; */
?>
<div class="center_admin">
    <div class="category_dod_red_del">
        <div class="category_add" id="show_popup_category_add">
            <input type="submit"  value="Додати">
        </div>
        <div class="category_edit" id="show_popup_category_edit">
            <input type="submit"  value="Редагувати">
        </div>
        <div class="category_delete" id="show_popup_category_delete">
            <input type="submit"  value="Видалити">
        </div>
    </div>
</div>