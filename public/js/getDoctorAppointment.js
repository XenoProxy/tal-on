$(document).ready(function (){

    let appointments = JSON.parse($('.appointments').val());
    console.log(appointments[0])
    // вешает событие на кнопки в блоке .appointments внутри .card-body
    $('.card-body .time button').on('click', function(evt) {
        // находим весь родительский блок
        // .closest() - Поиск начинается непосредственно с текущего элемента заданного селектором и движется вверх по дереву DOM.
        let parrent = $(evt.target).closest('.card-body');
        // ищем что нужно в самом блоке
        let date = parrent.find('.date').val();
        let doctor = parrent.find(`.doctor`).val();                
        let time = $(this).val();
        let token = $('#token').val();

        let appointments = JSON.parse($('.appointments').val());
        console.log(appointments[0])

        $.post('get-doctor', {
            date: date,
            doctor: doctor,            
            time: time,
            _token: token
            }).done(function (appointmentId){
                console.log(appointmentId);
                let url = `/appointments/${appointmentId}/edit`
                window.location.replace(url);
        });
    });
});