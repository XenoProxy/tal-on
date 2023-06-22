$(document).ready(function (){
    $("#time").on('click', function(){
        let doctor_id = $('#doctor_id').val();
        let date = $('#date').val();
        let time = $('#time').val();
        let token = $('#token').val();
        console.log(doctor_id, date, time)
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