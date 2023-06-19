$(document).ready(function() {    
    let polyclinic = null;
    let field = null;

    // при выборе элемента из списка срабатывает событие
    $('#polyclinic').change(function(){
        polyclinic = $('#polyclinic option:selected').text();
        $('#js-result_p').html(' ' + polyclinic);
    });

    $('#doctor_field').change(function(){
        field = $('#doctor_field option:selected').text();
        $('#js-result_f').html(' ' + field);
    });


    $('.table-filters select').on('change', function () {
        filterTable($(this).parents('table'));
    });

    function filterTable($table) {
        var $filters = $table.find('.table-filters td');
        var $rows = $table.find('.table-data');
        $rows.each(function (rowIndex) {
            var valid = true;
            $(this).find('td').each(function (colIndex) {
                if ($filters.eq(colIndex).find('select').val()) {
                    if ($(this).html().toLowerCase().indexOf(
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
