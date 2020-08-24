$(function () {
    $(document).on('click', '.action_update', actionDelete);
});

function actionDelete(event) {
    event.preventDefault();
    let urlRequest = $(this).data('url');
    let that= $(this);
    Swal.fire({
        title: 'Bạn có chắc chắn?',
        text: "Khôi phuc tài khoản này!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Updated!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: 'GET',
                url: urlRequest,
                success: function (data) {
                    if (data.code == 200) {
                        that.parent().parent().remove();
                        Swal.fire({
                            icon: 'success',
                            title: 'Khôi phục tài khoản thành công!',
                            text: 'Tài khoản đã được khôi phục vui lòng kiểm tra lại.',
                        }
                        )
                    }
                },
                error: function () {
                    if (data.code == 500) {
                        Swal.fire({
                                icon: 'error',
                                title: 'Khôi phục thất bại!',
                                text: 'Khôi phục  Tài khoản không thành công.',
                            })
                    }
                }
            });
        }
    });
}
