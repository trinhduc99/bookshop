<!-- Navbar -->
{{--@extends('layouts.app')--}}
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('home')}}" class="nav-link">Home</a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        @php
            $idDetails= auth()->id();
            $userDetails= \App\User::find($idDetails);
        @endphp
        <li class="nav-item dropdown">
            <a class="btn btn-secondary" data-toggle="dropdown" href="#">
                <i class="fas fa-user"></i>
                <span>{{strtoupper($userDetails->name)}}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-header"><b>Xin chào {{$userDetails->name}}</b></span>
                <div class="dropdown-divider"></div>
                <a href="{{route('user.showDetail',['id'=> $idDetails])}}" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> Thông tin tài khoản
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{url('/change-password')}}" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> Đổi mật khẩu
                </a>
                <div class="dropdown-divider"></div>
                <a href="" class="dropdown-item-text" id="logout">
                        <i class="fas fa-fw fa-sign-out-alt">
                        </i>
                        Đăng xuất
                </a>

            </div>
        </li>
    </ul>
</nav>
<form id="logout-form" action="{{ route('logout') }}" method="POST"
      style="display: none;">
    @csrf
</form>

