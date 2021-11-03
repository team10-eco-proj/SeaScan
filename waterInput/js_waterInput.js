$(document).ready(function(){
  $(document).on('click', '#btn_waterInputSubmit', function () {

      let temp = $('#input_newTemp').val();
      let salinity = $('#input_newSalinity').val();
      let lat = $('#input_newLat').val();
      let long = $('#input_newLong').val();
      //let newWaterDate = $('#input_newDate').val();
      console.log(temp);
      //do client side data validation here
      if(true){
          addNewWaterData(temp, salinity, lat, long);
      }
  });
});
function addNewWaterData(temp, salinity, lat, long){
    $.ajax({
        url: './waterInput/php_submitWaterData.php',
        type: 'POST',
        data:
        {
            t: temp,
            s: salinity,
            la: lat,
            lo: long,
    //        date: newWaterDate
        },
        success: function (response) {
            console.log(response);
        }
    });
}
