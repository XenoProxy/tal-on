$(document).ready(function (){

    // let date_count = $('.date_count').val(); 
    // let doctor_count = $('.doctor_count').val(); 
    // let time_count = $('.time_count').val(); 
    // for(let i = 0; i < date_count; i++){
    //     let date_id = i;
    //     for(let j = 1; j <= doctor_count; j++){
    //         let doctor_id = j;
    //         for(let k = 0; k < time_count; k++){
    //             let time_id = k;
    //             $(`#${date_id}${doctor_id}${time_id}`).on('click', function(){
                    
    //                 let appointment_arr = $(this).attr('id').split('');
    //                 let date = $(`.date#${appointment_arr[0]}`).val();
    //                 let doctor = appointment_arr[1];
    //                 let time = $(this).val();
    //                 let token = $('#token').val();  

    //                 console.log(date, doctor, time) 
                    
    //                 $.post('get-doctor', {
    //                     date: date,
    //                     doctor: doctor,            
    //                     time: time,
    //                     _token: token
    //                   }).done(function (response){
    //                     console.log(response);
    //                 });
    //             })
    //         }
    //     } 
    //}



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