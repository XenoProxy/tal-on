$(document).ready(function (){
    $("#time").on('click', function(){
        let doctor_id = $('#doctor_id').val();
        let date = $('#date').val();
        let time = $('#time').val();
        console.log(doctor_id)
        $.post('get-doctor', {
            doctor_id: doctor_id,
            date: date,
            time: time,
          }).done(function (response){
            console.log(response);
        });
    })
  });