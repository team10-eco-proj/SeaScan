$(document).on('click', '#dataSubmit', function(){
    let mail = $('#exampleInputEmail1').val();
    let pw = $('#exampleInputPassword1').val();

    $.ajax({
        url: './inputData/php_submitData.php',
        type: 'POST',
        data: 
        {
            email : mail,
            password: pw
        },
        success: function(response){
            console.log(response);
        }
    });
});
