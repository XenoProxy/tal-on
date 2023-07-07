$(document).ready(function (){
    // вешает событие на кнопки в блоке .appointments внутри .card-body
    $('.card-body .time button').on('click', function(evt) {
        // находим весь родительский блок
        // .closest() - Поиск начинается непосредственно с текущего элемента заданного селектором и движется вверх по дереву DOM.
        let parrent = $(evt.target).closest('.card-body');
        // ищем что нужно в самом блоке
        let date = parrent.find('.date').val();
        let doctor = parrent.find('.doctor').val();                
        let time = $(this).val();
        let token = $('#token').val();

        console.log()

        $.post('get-doctor', {
            date: date,
            doctor: doctor,            
            time: time,
            _token: token
            }).done(function (appointmentId){
                $(this).remove()
                console.log(appointmentId);
                let url = `/appointments/${appointmentId}/edit`
                window.location.replace(url);
        });
    });
});