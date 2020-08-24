$(function () {
    let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);
    $.extend(true, $.fn.dataTable.defaults, {
        order: [[1, 'desc']],
        pageLength: 100,
    });
    $('.datatable-Speaker:not(.ajaxTable)').DataTable({buttons: dtButtons})
})

//user update

$(function () {
    $(document).on('click', '.action_update', actionUpdate);
});

function actionUpdate(event) {
    event.preventDefault();
    let urlRequest = $(this).data('url');
    let that= $(this);
    Swal.fire({
        title: 'Bạn có chắc chắn?',
        text: "Muốn cập nhật tài khoản này lên admin",
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
                        Swal.fire(
                            'Cập nhật thành công!',
                            'Tài khoản đã được cập nhật lên admin.',
                            'success'
                        )
                    }
                },
                error: function () {
                    Swal.fire(
                        'Cập nhật thất bại!',
                        'Cập nhật tài khoản không thành công.',
                        'fails'
                    )
                }
            });
        }
    })
}

//user block
$(function () {
    $(document).on('click', '.action_delete', actionDelete);
});

function actionDelete(event) {
    event.preventDefault();
    let urlRequest = $(this).data('url');
    let that= $(this);
    Swal.fire({
        title: 'Bạn có chắc chắn?',
        text: "Tài khoản sẽ bị block!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Deleted!'
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
                            title: 'Xóa tài khoản thành công!',
                            text: 'Tài khoản đã bị xóa.',
                        }
                        )
                    }
                },
                error: function () {
                        Swal.fire({
                            icon: 'error',
                            title: 'Xóa thất bại!',
                            text: 'Tài khoản xóa không thành công!Vui lòng kiểm tra lại',
                        }
                        )
                }
            });
        }
    });
}
