$(function () {
    $('#logout').click(function () {
        if (confirm('Bạn có muốn đăng xuất không?')) {
            document.getElementById('logout-form').submit();
        }
        return false;
    });
});

