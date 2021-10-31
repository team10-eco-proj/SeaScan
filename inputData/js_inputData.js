$(document).on('click', '#dataSubmit', function(){
    // console.log("hi");
    let mail = $('#exampleInputEmail1').val();
    let pw = $('#exampleInputPassword1').val();
    // console.log(mail);
    // console.log(pw);
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
