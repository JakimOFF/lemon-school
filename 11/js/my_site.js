$(document).ready(function(){
    $('.image_unit>div').css('opacity', '1');
    //смена цвета на синий
    $('.color_unit_blue').on('click', function(){
        $('.image_links_man> div').css('opacity', '0');
        $('.image_unit_blue').css('opacity', '1');
    });
    //смена цвета на желтый
    $('.color_unit_yellow').on('click', function(){
        $('.image_links_man> div').css('opacity', '0');
        $('.image_unit_yellow').css('opacity', '1');
    });
    //смена цвета на черный
    $('.color_unit_black').on('click', function(){
        $('.image_links_man> div').css('opacity', '0');
        $('.image_unit_black').css('opacity', '1');
    });
});
