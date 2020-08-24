@extends('layouts.admin')
@section('title')
    <title>List Delete category</title>
@endsection
@section('contents')
    <div class="content-wrapper">
        @include('partials.content-header',['name'=>'Danh sách danh mục','key'=>'Bị xóa'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                    </div>
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped table-hover datatable datatable-Speaker">
                            <thead>
                            <tr>
                                <th width="10%" class="text-center">
                                    ID
                                </th>
                                <th width="30%" class="text-center">Tên danh mục</th>
                                <th width="20%" class="text-center">Registered at</th>
                                <th width="20%" class="text-center">Deleted at</th>
                                <th width="20%" class="text-center">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <th scope="row" class="text-center">{{$category->id}}</th>
                                    <td class="text-center">{{$category->name}}</td>
                                    <td class="text-center">{{$category->created_at->format('d/m/Y')}}</td>
                                    <td class="text-center">{{$category->deleted_at->format('d/m/Y')}}</td>
                                    <td style="width: auto" class="text-center">
                                        <a type="button" class="btn btn-primary" data-toggle="modal"
                                           data-target="#exampleModal{{ $category->id }} ">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$category->id}}" tabindex="-1"
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
                                                                    Danh mục cha bị xóa
                                                                </th>
                                                                <td>
                                                                    {{($category->parentIdDelete->name)?? "Không tồn tại"}}
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
                                                                    Ngày xóa
                                                                </th>
                                                                <td>
                                                                    {{$category->deleted_at}}
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a style="color: white"
                                           data-url=" {{route('categories.deleteUpdate',['id'=>$category->id,'parent_id'=>$category->parent_id])}}"
                                           class="btn btn-success action_delete"><i class="fas fa-edit"></i></a>
                                    </td>
                                    {{--                                    @endcan--}}
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
    <script src="{{asset('js/category/deleteUpdate.js')}}"></script>
@endsection
