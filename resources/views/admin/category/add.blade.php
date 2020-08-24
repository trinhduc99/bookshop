@extends('layouts.admin')
@section('title')
    <title>Thêm danh mục</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('admins/category/add.css')}}">
@endsection

@section('contents')
    <div class="content-wrapper">
        @include('partials.content-header',['name'=>'Thêm danh mục','key'=>''])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('categories.store')}}" method="post">
                            @csrf
                            <a href="{{url()->previous()}}" class="btn btn-dark">
                                Back to list
                            </a><br><br>
                            <div class="form-group">
                                <label >Tên danh mục</label>
                                <input type="text"
                                       class="form-control @error('name') is-invalid @enderror"
                                       placeholder="Insert Category Book"
                                       name="name"
                                       value="{{old('name')}}"
                                >
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label >Chọn danh mục cha</label>
                                <select class="form-control @error('parent_id') is-invalid @enderror"
                                        name="parent_id" >
                                    <option value="0">Chọn danh mục cha</option>
                                    {!! $htmlOptions  !!}
                                </select>
                                @error('parent_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
