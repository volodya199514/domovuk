

<?php

$perpage = 6;// кількість категорій на сторінці
if(isset($_GET['page'])){
    $page = (int)$_GET['page'];
    if($page<1) $page=1;
}else{
    $page=1;
}

$count_rows= count_rows_question();//кількість категорій
$pages_count = ceil($count_rows/$perpage);//Кількість сторінок
if(!$pages_count) $pages_count=1;//мінімум одна сторінка
if($page>$pages_count) $page=$pages_count; // якщо запрошена сторінка більша максимуму

$start_pos = ($page-1)*$perpage;//початкова сторінка для запиту
?>

  <?php $questions = selectQuestion($start_pos, $perpage); ?>

    <div class="center_admin">
        <div class="help_admin_zvazok">
        <p>Зворотній зв'язок</p>
        </div>
    <div class="table_question">
        <div class="osnovna_tabl_questio">
            <div class="question_nadpus">
                <div class="question_date_prus">
                    <p>Дата</p>
                </div>
                <div class="question_name">
                    <p>Ім'я</p>
                </div>
                <div class="question_nomer">
                    <p>Номер телефону</p>
                </div>
                  <div class="question_pohta_el">
                        <p>Електронна пошта</p>
                   </div>
                   <div class="question_putanna">
                        <p>Питання</p>
                   </div>
            </div>

            <?php if($questions): ?>
                <?php foreach($questions as $question): ?>
            <div class="question_zv_zvazok">
                <div class="question_date_prus_zvazok">
                    <p><?=$question['date']?></p>
                </div>
                <div class="question_name_zv_zvazok">
                    <p><?=$question['name']?></p>
                </div>
                <div class="question_nomer_zv_zvazok">
                    <p><?=$question['number']?></p>
                </div>
                <div class="question_pohta_el_zv_zvazok">
                    <p><?=$question['email']?></p>
                </div>
                <div class="question_putanna_zv_zvazok">
                    <p><?=$question['question']?></p>
                </div>
            </div>
                <?php endforeach;?>
            <?php else: ?>
                Немає питань.
            <?php endif; ?>


         <!--   <div class="question_zv_zvazok">
                <div class="question_date_prus_zvazok">
                    <p>27.06.15</p>
                </div>
                <div class="question_name_zv_zvazok">
                    <p>Віталік</p>
                </div>
                <div class="question_nomer_zv_zvazok">
                    <p>+380982268581</p>
                </div>
                <div class="question_pohta_el_zv_zvazok">
                    <p>lozovan95@mail.ru</p>
                </div>
                <div class="question_putanna_zv_zvazok">
                    <p>Як можна з вами звязатися щоб поговорити за доставку замовлення?</p>
                </div>
            </div>
            <div class="question_zv_zvazok">
                <div class="question_date_prus_zvazok">
                    <p>27.06.15</p>
                </div>
                <div class="question_name_zv_zvazok">
                    <p>Віталік</p>
                </div>
                <div class="question_nomer_zv_zvazok">
                    <p>+380982268581</p>
                </div>
                <div class="question_pohta_el_zv_zvazok">
                    <p>lozovan95@mail.ru</p>
                </div>
                <div class="question_putanna_zv_zvazok">
                    <p>Як можна з вами звязатися щоб поговорити за доставку замовлення?</p>
                </div>
            </div>
            <div class="question_zv_zvazok">
                <div class="question_date_prus_zvazok">
                    <p>27.06.15</p>
                </div>
                <div class="question_name_zv_zvazok">
                    <p>Віталік</p>
                </div>
                <div class="question_nomer_zv_zvazok">
                    <p>+380982268581</p>
                </div>
                <div class="question_pohta_el_zv_zvazok">
                    <p>lozovan95@mail.ru</p>
                </div>
                <div class="question_putanna_zv_zvazok">
                    <p>Як можна з вами звязатися щоб поговорити за доставку замовлення?</p>
                </div>
            </div>
            <div class="question_zv_zvazok">
                <div class="question_date_prus_zvazok">
                    <p>27.06.15</p>
                </div>
                <div class="question_name_zv_zvazok">
                    <p>Віталік</p>
                </div>
                <div class="question_nomer_zv_zvazok">
                    <p>+380982268581</p>
                </div>
                <div class="question_pohta_el_zv_zvazok">
                    <p>lozovan95@mail.ru</p>
                </div>
                <div class="question_putanna_zv_zvazok">
                    <p>Як можна з вами звязатися щоб поговорити за доставку замовлення?</p>
                </div>
            </div>
            <div class="question_zv_zvazok">
                <div class="question_date_prus_zvazok">
                    <p>27.06.15</p>
                </div>
                <div class="question_name_zv_zvazok">
                    <p>Віталік</p>
                </div>
                <div class="question_nomer_zv_zvazok">
                    <p>+380982268581</p>
                </div>
                <div class="question_pohta_el_zv_zvazok">
                    <p>vitalulozovan@gmail.com</p>
                </div>
                <div class="question_putanna_zv_zvazok">
                    <p>Як можна з вами звязатися щоб поговорити за доставку замовлення?</p>
                </div>
            </div> -->


        </div>
        <div class="goods_pages_admin_center">
            <div class="goods_pages_admin clear">
                <?php pagination($page, $pages_count) ?>
               <!-- <a class=back href=""> Назад</a>
                <ul>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><span>...</span></li>
                    <li><a href="#">8</a></li>
                    <li><a href="#">9</a></li>
                    <li><a href="#">10</a></li>
                </ul>
                <a class="forward" href="#" >Вперед</a> -->
            </div>
        </div>
    </div>
</div>