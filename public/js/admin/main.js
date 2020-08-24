$('#register-form').submit(function(e){
    if ( !$('#agree-term').is(':checked') ) {
        alert('Click on checkbox before submit!');
        return false;
    }
    if (confirm('Bạn có muốn đăng ký không?')) {
        return true;
    }
});
