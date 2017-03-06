<div class="header">
    <div class="header_content">
    <div class="logo"><a href="<?php echo $site_url?>"></a></div>
        <div class="block-menu">
            <ul class="menu">
                <li><a href="<?php echo $site_url?>">Головна</a></li>
                <li><a href="category">Продукція</a></li>
                <li><a href="service">Послуги</a></li>
                <li><a href="contact">Контакти</a></li>
            </ul>
        </div>
           <?php if(($_SESSION['total_quantity'])): ?>
             <div id="show_popup_busket" class="basket">
                <a href="#"><?=$_SESSION['total_quantity']?></a>
            </div> <!-- попаб заповнений і корзинка незвичайна -->
        <?php else: ?>
             <div id="show_popup_empty" class="basket_empty"></div> <!-- попаб порожній і корзинка звичайна -->
        <?php endif; ?>
        </div>
</div>
