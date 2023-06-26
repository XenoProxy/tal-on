$(document).ready(function (){

    // вешает событие на кнопки в блоке .appointments внутри .card-body
    $('.card-body .appointments a').on('click', function(evt) {
        // находим весь родительский блок
        // .closest() - Поиск начинается непосредственно с текущего элемента заданного селектором и движется вверх по дереву DOM.
        let parrent = $(evt.target).closest('.card-body');
        // ищем что нужно в самом блоке
        let date = parrent.find('.date').val();
        let doctor = parrent.find(`.doctor`).val();                
        let time = $(this).text();
        let token = $('#token').val();

        console.log(date, doctor, time)

        $.post('get-doctor', {
            date: date,
            doctor: doctor,            
            time: time,
            _token: token
            }).done(function (response){
                //console.log(response);
        });
    });
});