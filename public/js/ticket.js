$(document).ready(function() {    
    let polyclinic = null;
    let field = null;

    // при выборе элемента из списка срабатывает событие
    $('#polyclinic').change(function(){
        polyclinic = $('#polyclinic option:selected').text();
        $('#js-result_p').html('Результат: ' + polyclinic);
    });

    $('#doctor_field').change(function(){
        field = $('#doctor_field option:selected').text();
        $('#js-result_f').html('Результат: ' + field);
    });

    $('#select').on('click',function(){
        // получаем значение из выбранного селекта
        //var optionsValue = this.options[this.selectedIndex].value;
        // добавляем выбранное значение в input
        //$('#test').val(optionsValue);
    });
});
