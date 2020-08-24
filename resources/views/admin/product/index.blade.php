@extends('layouts.admin')

@section('title')
    <title>List Product</title>
@endsection

@section('contents')
    <div class="content-wrapper">
        @include('partials.content-header',['name'=>'Danh sách sản phẩm','key'=>''])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('products.create')}}" class="btn btn-success float-right m-2">
                            Add New <i class="fa fa-user-plus fa-fw"></i>
                        </a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped table-hover datatable datatable-Speaker">
                            <thead>
                            <tr>
                                <th width="5%" class="text-center">
                                    ID
                                </th>
                                <td scope="col" class="text-center" width="15%">Tên sách</td>
                                <td scope="col" class="text-center" width="15%">Tên tác giả</td>
                                <th scope="col" class="text-center" width="15%">Avatar</th>
                                <th scope="col" class="text-center" width="15%">Danh mục</th>
                                <th scope="col" class="text-center" width="15%">Nội dung</th>
                                <th scope="col" class="text-center" width="15%">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $productsItem)
                                <tr>
                                    <th scope="row" class="text-center">{{$productsItem->id}}</th>
                                    <th scope="row" class="text-center">{{$productsItem->name}}</th>
                                    <td class="text-center">{{$productsItem->name_author}}</td>
                                    <td class="text-center">
                                        <a href="{{$productsItem->image_path}}" target="_blank">
                                            <img width="100%" src="{{$productsItem->image_path}}"
                                                 alt="{{$productsItem->image_name}}">
                                        </a>
                                    </td>
                                    <td class="text-center">{{optional($productsItem->category)->name }}</td>
                                    <td class="text-center">{!!$productsItem->content!!}</td>
                                    <td class="text-center">
                                        @can('product-edit',$productsItem->id)
                                            @include('admin.product.show')
                                        @endcan
                                        @can('product-edit',$productsItem->id)
                                            <a href="{{route('products.edit',['id' => $productsItem->id])}}"
                                               class="btn btn-info"><i class="fas fa-edit"></i></a>
                                        @endcan
                                        @can('product-delete', $productsItem->id)
                                            <a href=""
                                               data-url=" {{route('products.delete',['id'=>$productsItem->id])}}"
                                               class="btn btn-danger action_delete"><i class="fas fa-trash"></i></a>
                                        @endcan
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
    <script src="{{asset('js/product/index.js')}}"></script>
@endsection

