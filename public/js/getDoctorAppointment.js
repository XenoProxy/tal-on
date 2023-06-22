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
        for(let j = 0; j < doctor_count; j++){
            for(let k = 0; k < time_count; k++){
        
            }
        }
    }

    $("button").on('click', function(){
        let doctor_id = $('#doctor_id').val();
        let date = $('#date').val();
        let time = $('#time').val();
        let token = $('#token').val();

        // из значений button получаем строку и преобразуем в массив
        // [id_даты  id_врача id_времени]
        let appointment_arr = $('#appointment').val().split(' ');;
        console.log(appointment_arr);
        $.post('get-doctor', {
            doctor_id: doctor_id,
            date: date,
            time: time,
            _token: token
          }).done(function (response){
            console.log(response);
        });
    })
  });