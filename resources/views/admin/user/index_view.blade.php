@extends('layouts.admin')
@section('title')
    <title>List User</title>
@endsection
@section('contents')
    <div class="content-wrapper">
        @include('partials.content-header',['name'=>'Danh sách','key'=>'Tài khoản'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped table-hover datatable datatable-Speaker">
                            <thead>
                            <tr>
                                <th width="10%" class="text-center">ID</th>
                                <th scope="col" width="20%" class="text-center">Tên tài khoản</th>
                                <th scope="col" width="20%" class="text-center">Email</th>
                                <th scope="col" width="20%" class="text-center">Register At</th>
                                <th scope="col" width="15%" class="text-center"> Vai trò</th>
                                <th scope="col" width="15%" class="text-center">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th scope="row" class="text-center">{{$user->id}}</th>
                                    <td class="text-center">{{$user->name}}</td>
                                    <td class="text-center">{{$user->email}}</td>
                                    <td class="text-center">{{$user->created_at->format('d/m/Y')}}</td>
                                    <td class="text-center">{{$user->role}}</td>
                                    <td class="text-center">
                                        @include('admin.user.show_delete')
                                        <a
                                            data-url="{{route('users.updateDelete',['id'=>$user->id])}}"
                                            class="btn btn-info action_update"><i class="fas fa-edit"></i>
                                        </a>
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
    <script src="{{asset('js/user/indexUpdate.js')}}"></script>
@endsection

