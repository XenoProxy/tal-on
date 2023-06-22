$(document).ready(function (){

    // дата-врач
    let $rows = $('.card').find('.card-body'); 
    $rows.each(function(row){ 
        console.log(row);
    });

    let date_count = $('#date_count').val(); //2
    let doctor_count = $('#doctor_count').val(); //1
    let time_count = $('#date_count').val(); //1
    for(let i = 0; i < date_count; i++){
        let doctor_id = i;
        for(let j = 0; j < doctor_count; j++){
            let date_id = j;
            for(let k = 0; k < time_count; k++){
                let time_id = k;
            }
        }
    }
    
    //console.log($('.appointments').find('button').val()); // кнопки для записи

    let appointments = $('.appointments')
    // перебираем все кнопки
    appointments.each(function(appointment){
        // из значений button получаем строку и преобразуем в массив
        // [id_даты id_врача id_времени]
        let appointment_arr = $(this).find('button').val().split(' ');
        console.log(appointment_arr);
    })

    $("button").on('click', function(){
        let doctor = $('#doctor').val();
        let date = $('#date').val();
        let time = $('#time').val();
        let token = $('#token').val();

        $.post('get-doctor', {
            doctor: doctor,
            date: date,
            time: time,
            _token: token
          }).done(function (response){
            console.log(response);
        });
    })
  });