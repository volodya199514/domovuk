<?php
require_once 'popup_slider.php';
?>

<script type="text/javascript" src="js/slider.js"></script>;

<form style="display: none;" method='POST' enctype='multipart/form-data'>
    <input type='file' id="fileToUploadSlider" accept='image/*'>
</form>

<div class="center_admin">
    <div class="slider_dod_del">
        <div class="slider_add">
            <input type="button" id="badd" value="Додати">
        </div>
        <div class="slider_delete" id="show_popup_slider"">
        <input type="submit" id="bdel" value="Видалити">
    </div>
</div>

<div class="foto_slaider">

</div>
</div>
