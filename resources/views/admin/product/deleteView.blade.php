@extends('layouts.admin')

@section('title')
    <title>List Product</title>
@endsection

@section('contents')
    <div class="content-wrapper">
        @include('partials.content-header',['name'=>'Danh sách Sản phẩm','key'=>'Đã xóa'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped table-hover datatable datatable-Speaker">
                            <thead>
                            <tr>
                                <th width="5%">Id</th>
                                <th scope="col" width="15%">Tên sách</th>
                                <th scope="col" width="15%">Tên tác giả</th>
                                <th scope="col" width="15%">Avatar</th>
                                <th scope="col" width="15%">Danh mục</th>
                                <th scope="col" width="18%">Nội dung</th>
                                <th scope="col" width="12%">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $productsItem)
                                <tr>
                                    <th scope="row">{{$productsItem->id}}</th>
                                    <th scope="row">{{$productsItem->name}}</th>
                                    <td>{{$productsItem->name_author}}</td>
                                    <td>
                                        <a href="{{$productsItem->image_path}}" target="_blank">
                                            <img width="100%" src="{{$productsItem->image_path}}"
                                                 alt="{{$productsItem->image_name}}">
                                        </a>
                                    </td>
                                    <td>{{optional($productsItem->category)->name }}</td>
                                    <td>{!!$productsItem->content!!}</td>
                                    <td>
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
                                                                    Deleted_at
                                                                </th>
                                                                <td>
                                                                    {{$productsItem->deleted_at}}
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href=""
                                           data-url=" {{route('products.deleteUpdate',['id'=>$productsItem->id,'category_id' => $productsItem->category_id])}}"
                                           class="btn btn-success action_delete"><i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('js/product/deleteUpdate.js')}}"></script>
@endsection

