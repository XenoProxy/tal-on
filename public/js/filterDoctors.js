$(document).ready(function() {  

    let $rows = $('table').find('.table-data'); // строки из значений, а не фильтров
    $rows.each(function(row){ // перебор по строкам
        let data_row = [];

        $(this).find('td').each(function(){ //перебор по столбцам
            data_row.push($(this).text()); // добавляем значения ячеек в массив (имя, обл., пол-ка)    
        });
        
        $(`#${row}`).on('click', function(){
            if($(this).attr('id') == row){
                $('#js-result_dn').html(' ' + data_row[0]);
                $('#js-result_df').html(' ' + data_row[1]);
                $('#js-result_p').html(' ' + data_row[2]);
            } 
        });        
    });

// Фильтр значений таблицы
    $('.table-filters select').on('change', function () {
        filterTable($(this).parents('table'));
    });

    function filterTable($table) {
        let $filters = $table.find('.table-filters td');
        let $rows = $table.find('.table-data');
        $rows.each(function (rowIndex) {
            let valid = true;
            $(this).find('td').each(function (colIndex) {
                if ($filters.eq(colIndex).find('select').val()) {
                    if ($(this).html().toLowerCase().indexOf( // если в массиве значение не найдено, то false
                        $filters.eq(colIndex).find('select').val().toLowerCase()) == -1) {
                        valid = valid && false;
                    }
                }
            });
            if (valid === true) {
                $(this).css('display', '');
            } else {
                $(this).css('display', 'none');
            }
        });
    }
});
