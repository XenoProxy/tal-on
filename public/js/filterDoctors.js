$(document).ready(function() {  

// Фильтр значений таблицы
    $('select').on('change ', function () {
        var optionSelected = $(this).find("option:selected").val();
        filterDoctors(optionSelected);
    });

    function filterDoctors($filter){
        $('.card').each(function(){
            let $field = $(this).find('.field').val();
            let valid = true;            
            if ($field.toLowerCase().indexOf( // если в массиве значение не найдено, то false
                $filter.toLowerCase()) == -1) {
                valid = valid && false;
            }

            if (valid === true) {
                $(this).css('display', '');
            } else {
                $(this).css('display', 'none');
            }
        });
    }
});
