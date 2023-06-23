$(document).ready(function (){

    // вешает событие на кнопки в блоке .appointments внутри .card-body
    $('.card-body .appointments button').on('click', function(evt) {
        // находим весь родительский блок
        let parrent = $(evt.target).closest('.card-body');
        // ищем что нужно в самом блоке
        let date = parrent.find('.date').val();
        let doctor = parrent.find(`.doctor`).val();                
        let time = $(this).val();
        let token = $('#token').val();

        console.log(date, doctor, time)

        $.post('get-doctor', {
            date: date,
            doctor: doctor,            
            time: time,
            _token: token
            }).done(function (response){
            console.log(response);
        });
    });
});