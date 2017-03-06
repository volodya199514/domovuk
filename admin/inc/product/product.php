<?php
    require_once 'popup_product_add.php';
    require_once 'popup_product_edit.php';
    require_once 'popup_product_delete.php';
?>


<form style="display: none;" method='POST' enctype='multipart/form-data'>
    <input type='file' id="fileToUploadProduct" accept='image/*'>
</form>

<div class="center_admin">
    <div class="product_dod_red_del">
        <div class="product_add" id="show_popup_product_add">
            <input type="submit"  value="Додати">
        </div>
        <div class="product_edit" id="show_popup_product_edit">
            <input type="submit"  value="Редагувати">
        </div>
        <div class="product_delete" id="show_popup_product_delete">
            <input type="submit"  value="Видалити">
        </div>
    </div>
</div>
