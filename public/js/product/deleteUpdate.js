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
        title: 'Bạn có chắc chắn!',
        text: "Sản phẩm sẽ được khôi phục Khi danh mục liên quan còn tồn tại",
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
                        Swal.fire ({
                            icon: 'success',
                            title: 'Khôi phục thành công!',
                            text: 'Sản phẩm đã được Khôi phục!',
                        })
                    }
                },
                error: function () {
                        Swal.fire( {
                            icon: 'error',
                            title: 'Khôi phục thất bại!',
                            text: 'Vui lòng khôi phục danh mục sản phẩm có liên quan trước khi tiếp tục!',
                        })
                }
            });
        }
    })
}
