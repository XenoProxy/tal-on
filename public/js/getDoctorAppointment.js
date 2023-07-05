$(document).ready(function (){

    // let appointments = JSON.parse($('.appointments').val());
    // for (key in appointments) {
    //     let appointment = appointments[key] //запись
    //     //console.log(appointment) 
    //     for (data in appointment) {
    //         //console.log([data]) //ключ
    //         //console.log(appointments[0][data])// значения ключа
    //     }
    // }

    // let available_appointments = $('.card-body');
    // let available_date = $(available_appointments[0]).find('.date').val();
    // let available_doctor = $(available_appointments[0]).find('.doctor').val();                
    // let available_time = $(available_appointments[0]).find('.time button');
    // //console.log(available_date)
    // for (key in available_appointments) {
    //     //let appointment = appointments[key] //запись
    //     //console.log(available_appointments_count[key]) 
    //     // for (data in appointment) {
    //     //     console.log([data]) //ключ
    //     //     console.log(appointments[0][data])// значения ключа
    //     // }
    // }


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

        let appointments = JSON.parse($('.appointments').val());
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