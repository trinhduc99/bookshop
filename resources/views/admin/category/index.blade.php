@extends('layouts.admin')
@section('title')
    <title>List category</title>
@endsection
@section('contents')
    <div class="content-wrapper">
        @include('partials.content-header',['name'=>'Danh sách Danh mục','key'=>''])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @can('category-create')
                            <a href="{{route('categories.create')}}" class="btn btn-success float-right m-2">
                                Add New <i class="fa fa-user-plus fa-fw"></i>
                            </a>
                        @endcan
                    </div>
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped table-hover datatable datatable-Speaker">
                            <thead>
                            <tr>
                                <th width="10%" class="text-center">
                                    ID
                                </th>
                                <th width="35%" class="text-center">Tên danh mục</th>
                                <th width="20%" class="text-center">Registered at</th>
                                <th width="20%" class="text-center">Updated at</th>
                                @can('category-show')
                                    <th width="15%" class="text-center">Hành động</th>
                                @endcan
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td scope="row" class="text-center">{{$category->id}}</td>
                                    <td class="text-center">{{$category->name}}</td>
                                    <td class="text-center">{{$category->created_at->format('d/m/Y')}}</td>
                                    <td class="text-center">{{$category->updated_at->format('d/m/Y')}}</td>
                                    @can('category-show')
                                        <td class="text-center">
                                            @include('admin.category.show')
                                            @can('category-edit')
                                                <a href="{{route('categories.edit',['id' => $category->id])}}"
                                                   class="btn btn-info"><i class="fas fa-edit"></i></a>
                                            @endcan
                                            @can('category-delete')
                                                <a style="color: white"
                                                   data-url=" {{route('categories.delete',['id'=>$category->id])}}"
                                                   class="btn btn-danger action_delete"><i class="fas fa-trash"></i></a>
                                            @endcan
                                        </td>
                                    @endcan
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
    <script src="{{asset('js/category/index.js')}}"></script>
@endsection
