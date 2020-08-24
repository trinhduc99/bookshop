$(function () {
    let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);
    $.extend(true, $.fn.dataTable.defaults, {
        order: [[1, 'desc']],
        pageLength: 100,
    });
    $('.datatable-Speaker:not(.ajaxTable)').DataTable({buttons: dtButtons})
})
$(function () {
    $(document).on('click', '.action_delete', actionDelete);
});

function actionDelete(event) {
    event.preventDefault();
    let urlRequest = $(this).data('url');
    let that= $(this);
    Swal.fire({
        title: 'Bạn có chắc chắn?',
        text: "Sản phẩm sẽ bị xóa!",
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
                                title: 'Xóa thành công!',
                                text: 'Sản phẩm đã được xóa.',
                            })
                    }
                },
                error: function () {
                    Swal.fire({
                        icon: 'error',
                        title: 'Xóa thất bại!',
                        text: 'Xóa sản phẩm không thành công.',
                    })
                },

            });
        }
    })
}
