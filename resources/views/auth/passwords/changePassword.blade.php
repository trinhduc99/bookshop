@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
    <style>
        .field-icon {
            float: right;
            margin-left: -25px;
            margin-top: -25px;
            position: relative;
            z-index: 2;
        }
        .container{
            padding-top:50px;
            margin: auto;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">Quản lý sách - Change Password
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('change.password') }}">
                            @csrf
                            @foreach ($errors->all() as $error)
                                <p class="text-danger">{{ $error }}</p>
                            @endforeach
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Current
                                    Password</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="current_password"
                                           autocomplete="current-password"
                                    >
                                    <span toggle="#password"
                                          class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>
                                <div class="col-md-6">
                                    <input id="new_password" type="password" class="form-control" name="new_password"
                                           autocomplete="current-password"
                                    >
                                    <span toggle="#new_password"
                                          class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">New Confirm
                                    Password</label>
                                <div class="col-md-6">
                                    <input id="new_confirm_password" type="password" class="form-control"
                                           name="new_confirm_password" autocomplete="current-password"
                                    >
                                    <span toggle="#new_confirm_password"
                                          class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <a href="{{url('/')}}" class="btn btn-dark">
                                        Back to list
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        Update Password
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('js/admin/jquery.min.js')}}"></script>
    <script>
        $(".toggle-password").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>
@endsection
