function loadBodyContent(page) {
    $('#contentBody').load(page);
}
function changeBodyContent(_page) {
    window.location.replace(_page);
}

function Toast(type, css, msg) {
    this.type = type;
    this.css = css;
    this.msg = 'This is positioned in the ' + msg + '. You can also style the icon any way you like.';
    // toastr.options.positionClass = css;
    // toastr[type](msg);
}