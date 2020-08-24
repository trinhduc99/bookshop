

@extends('layouts.admin')
@section('title')
    <title>List category</title>
@endsection
@section('contents')
    <div class="content-wrapper">
        @include('partials.content-header',['name'=>'Thông tin tài khoản','key'=>''])
        <div class="content">
            <div class="container-fluid">
                <div class="card-body">
                    <div class="mb-2">
                        <table class="table table table-bordered table-striped">
                            <tbody>
                            <tr>
                                <th>
                                    Id
                                </th>
                                <td>
                                    {{$userDetails->id}}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Tên Tài khoản
                                </th>
                                <td>
                                    {{$userDetails->name}}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Email
                                </th>
                                <td>
                                    {{$userDetails->email}}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Vai trò
                                </th>
                                <td>
                                    {{$userDetails->role}}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Số lượng sản phẩm đã đăng
                                </th>
                                <td>
                                    {{$userDetails->products()->where('user_id',$userDetails->id)->count()}}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Ngày tạo
                                </th>
                                <td>
                                    {{$userDetails->created_at}}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Ngày cập nhật
                                </th>
                                <td>
                                    {{$userDetails->updated_at}}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <a style="margin-top:20px;" href="{{url()->previous()}}" class="btn btn-dark">
                            Back to list
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

