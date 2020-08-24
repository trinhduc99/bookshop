
<!-- Modal -->
<div class="modal fade" id="userModal{{$user->id}}" tabindex="-1"
     role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thông tin tài
                    khoản</h5>
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            Id
                        </th>
                        <td>
                            {{$user->id}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Tên Tài khoản
                        </th>
                        <td>
                            {{$user->name}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Email
                        </th>
                        <td>
                            {{$user->email}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Vai trò
                        </th>
                        <td>
                            {{$user->role}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Số lượng sản phẩm đã đăng
                        </th>
                        <td>
                            {{$user->products()->where('user_id',$user->id)->count()}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Ngày tạo
                        </th>
                        <td>
                            {{$user->created_at}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Ngày cập nhật
                        </th>
                        <td>
                            {{$user->updated_at}}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
