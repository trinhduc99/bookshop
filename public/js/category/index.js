$(function () {
    let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);
    $.extend(true, $.fn.dataTable.defaults, {
        order: [[1, 'desc']],
        pageLength: 100,
    });
    $('.datatable-Speaker:not(.ajaxTable)').DataTable({buttons: dtButtons})
})

// deleted at
$(function () {
    $(document).on('click', '.action_delete', actionDelete);
});

//Deleted at
function actionDelete(event) {
    event.preventDefault();
    let urlRequest = $(this).data('url');
    let that = $(this);
    Swal.fire({
        title: 'Bạn có chắc chắn?',
        text: "Danh mục sẽ bị xóa nếu không tồn tại danh mục con và sản phẩm có liên quan!",
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
                        Swal.fire(
                            {
                                icon: 'success',
                                title: 'Xóa thành công!',
                                text: 'Danh mục đã được xóa.',
                                footer: 'success'
                            }
                        )
                    }
                }, error: function () {
                    Swal.fire ({
                            icon: 'error',
                            title: 'Xóa thất bại!',
                            text: 'Bạn cần xóa danh mục con và sản phẩm có liên quan trước khi tiếp tục',
                            footer: 'Failed!',
                        })
                },
            });
        }
    });
}
