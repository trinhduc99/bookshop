<a type="button" class="btn btn-primary" data-toggle="modal"
   data-target="#exampleModal{{ $productsItem->id }} ">
    <i class="fas fa-eye"></i>
</a>
<!-- Modal -->
<div class="modal fade" id="exampleModal{{$productsItem->id}}" tabindex="-1"
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
                            {{$productsItem->id}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Tên sách
                        </th>
                        <td>
                            {{$productsItem->name}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Tên tác giả
                        </th>
                        <td>
                            {{$productsItem->name_author}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Nội dung
                        </th>
                        <td>
                            {!! $productsItem->content !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Avatar
                        </th>
                        <td>
                            <a href="{{$productsItem->image_path}}"
                               target="_blank">
                                <img src="{{$productsItem->image_path}}"
                                     alt="{{$productsItem->image_name}}"
                                     style="width: 100px; height: 100px">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Danh mục được chọn
                        </th>
                        <td>
                            {{($productsItem->category->name)?? "Không tồn tại"}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Tên tài khoản tạo
                        </th>
                        <td>
                            {{($productsItem->users->name)??"Không tồn tại"}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Registered at
                        </th>
                        <td>
                            {{$productsItem->created_at}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Updated at
                        </th>
                        <td>
                            {{$productsItem->updated_at}}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
