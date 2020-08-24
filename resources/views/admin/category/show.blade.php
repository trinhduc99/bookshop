<a style="color: white" type="button" class="btn btn-primary" data-toggle="modal"
   data-target="#showModal{{ $category->id }}">
    <i class="fas fa-eye"></i>
</a>
<!-- Modal -->
<div class="modal fade" id="showModal{{$category->id}}" tabindex="-1"
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
                            {{$category->id}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Tên Danh mục
                        </th>
                        <td>
                            {{$category->name}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Danh mục cha
                        </th>
                        <td>
                            {{($category->parentId->name) ?? "Không tồn tại"}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Số lượng danh mục con
                        </th>
                        <td>
                            {{($category->childrenId()->get()->count())}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Số lượng sản phẩm liên quan
                        </th>
                        <td>
                            {{$category->products()->where('category_id',$category->id)->count()}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Ngày tạo
                        </th>
                        <td>
                            {{$category->created_at}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Ngày cập nhật
                        </th>
                        <td>
                            {{$category->updated_at}}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
