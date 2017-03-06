$(document).ready(function() {
    $('#overlay').css({opacity: 0.5}); // Делаем затемняющий фон кроссбраузерным
    /*********************************************Позиціонуємо всі вікна**************************************************/
    positionCenter($('#popup_category_add')); // Позиционируем всплывающее окно по центру
    positionCenter($('#popup_category_edit')); // Позиционируем всплывающее окно по центру
    positionCenter($('#popup_category_delete')); // Позиционируем всплывающее окно по центру

    positionCenter($('#popup_product_add')); // Позиционируем всплывающее окно по центру
    positionCenter($('#popup_product_edit')); // Позиционируем всплывающее окно по центру
    positionCenter($('#popup_product_delete')); // Позиционируем всплывающее окно по центру

    positionCenter($('#popup_slider')); // Позиционируем всплывающее окно по центру

/*********************************************Категорія**************************************************/
	
    $('#show_popup_category_add').click(function() { // При клике по ссылке, показываем всплывающее окно
        $('#popup_category_add, #overlay').fadeIn(300);
    });
	
    $('#close_popup_category_add').click(function() { // Скрываем всплывающее окно при клике по кнопке закрыть
		$('#popup_category_add, #overlay').fadeOut(300);
    });

    $('#show_popup_category_edit').click(function() { // При клике по ссылке, показываем всплывающее окно
        $('#popup_category_edit, #overlay').fadeIn(300);
    });

    $('#close_popup_category_edit').click(function() { // Скрываем всплывающее окно при клике по кнопке закрыть
        $('#popup_category_edit, #overlay').fadeOut(300);
    });

    $('#show_popup_category_delete').click(function() { // При клике по ссылке, показываем всплывающее окно
        $('#popup_category_delete, #overlay').fadeIn(300);
    });

    $('#close_popup_category_delete').click(function() { // Скрываем всплывающее окно при клике по кнопке закрыть
        $('#popup_category_delete, #overlay').fadeOut(300);
    });



    /*********************************************Продукція**************************************************/
    $('#show_popup_product_add').click(function() { // При клике по ссылке, показываем всплывающее окно
        $('#popup_product_add, #overlay').fadeIn(300);
    });

    $('#close_popup_product_add').click(function() { // Скрываем всплывающее окно при клике по кнопке закрыть
        $('#popup_product_add, #overlay').fadeOut(300);
    });

    $('#show_popup_product_edit').click(function() { // При клике по ссылке, показываем всплывающее окно
        $('#popup_product_edit, #overlay').fadeIn(300);
    });

    $('#close_popup_product_edit').click(function() { // Скрываем всплывающее окно при клике по кнопке закрыть
        $('#popup_product_edit, #overlay').fadeOut(300);
    });

    $('#show_popup_product_delete').click(function() { // При клике по ссылке, показываем всплывающее окно
        $('#popup_product_delete, #overlay').fadeIn(300);
    });

    $('#close_popup_product_delete').click(function() { // Скрываем всплывающее окно при клике по кнопке закрыть
        $('#popup_product_delete, #overlay').fadeOut(300);
    });



    /*********************************************Слайдер**************************************************/
    $('#show_popup_slider').click(function() { // При клике по ссылке, показываем всплывающее окно
        $('#popup_slider, #overlay').fadeIn(300);
    });

    $('#close_popup_slider').click(function() { // Скрываем всплывающее окно при клике по кнопке закрыть
        $('#popup_slider, #overlay').fadeOut(300);
    });



    function positionCenter(elem) { // Функция, которая позиционирует всплывающее окно по центру
        elem.css({
            marginTop:  '-' + elem.height()/  2 + 'px',
			marginLeft: '-' + elem.width() / 2 + 'px'
        });
    }
});