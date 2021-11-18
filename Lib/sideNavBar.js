$(document).on('click', '#view_addInput', function(){
    $('#contentBody').load('./inputData/view_dataInput.php');  
});
$(document).on('click', '#view_waterInput', function () {
    $('#contentBody').load('./waterInput/view_waterInput.php');
});
$(document).on('click', '#view_reviewData', function(){
    $('#contentBody').load('./waterInput/view_reviewAllData.php');
});