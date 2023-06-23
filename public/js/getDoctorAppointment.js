$(document).ready(function (){

    // дата-врач
    let $rows = $('.card').find('.card-body'); 
    $rows.each(function(row){ 
        console.log(row);
    });

    let date_count = $('#date_count').val(); //2
    let doctor_count = $('#doctor_count').val(); //1
    let time_count = $('#time_count').val(); //1
    for(let i = 0; i < date_count; i++){
        let date_id = i;
        for(let j = 0; j < doctor_count; j++){
            let doctor_id = j;
            for(let k = 0; k < time_count; k++){
                let time_id = k;
                $(`#${date_id}${doctor_id}${time_id}`).on('click', function(){
                    let doctor = $('#doctor').val();
                    let date = $(`.date#${date_id}`).val();
                    let time = $('#time').val();
                    let token = $('#token').val();
                    console.log(doctor, date, time)
                })
            }
        }
    }
    
    //console.log($('.appointments').find('button').val()); // кнопки для записи

    let appointments = $('.appointments')
    //console.log($(`#${date_count}${doctor_count}${time_count}`).html());
    // перебираем все кнопки
    appointments.each(function(appointment){
        // из значений button получаем строку и преобразуем в массив
        // [id_даты id_врача id_времени]
        //let appointment_arr = $(this).find('button').val().split(' ');
        let appointment_arr = $(this).find('button').attr('id');
        //console.log(appointment_arr);
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