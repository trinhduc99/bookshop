@extends('layouts.app')
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="" class="brand-link">
        <img src="{{asset('adminlte/dist/img/AdminLTELogo.png')}}" alt="logo trang quản lý sách"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">QUẢN LÝ SÁCH</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="{{route('home')}}" class="nav-link">
                        <i class="fas fa-fw fa-tachometer-alt">
                        </i>
                        <span>TRANG CHỦ</span>
                </a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @can('user-list')
                    <li class="nav-item has-treeview">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-users-cog">
                            </i>
                            <p>
                                <span>QUẢN LÝ TÀI KHOẢN</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('users.indexUser')}}" class="nav-link ">
                                    <i class="fa-fw fas fa-users">
                                    </i>
                                    <p>
                                        <span>Tài khoản User</span>
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('users.indexAdmin')}}" class="nav-link ">
                                    <i class="fa-fw fas fa-users"></i>
                                    <p>
                                        <span>Tài khoản Admin</span>
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('users.indexUserDelete')}}" class="nav-link ">
                                    <i class="fa-fw fas fa-users">
                                    </i>
                                    <p>
                                        <span>Tài khoản đã xóa</span>
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
                <li class="nav-item has-treeview">
                    <a class="nav-link nav-dropdown-toggle" href="">
                        <i class="fa-fw fas fa-cogs">
                        </i>
                        <p>
                            <span>QUẢN LÝ DANH MỤC</span>
                            <i class="right fa fa-fw fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('categories.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-address-book"></i>
                                <p>
                                    Danh sách danh mục
                                </p>
                            </a>
                        </li>
                        @can('category-deleteView')
                            <li class="nav-item">
                                <a href="{{route('categories.deleteView')}}" class="nav-link ">
                                    <i class="nav-icon fas fa-address-book">
                                    </i>
                                    <p>
                                        <span>Danh mục đã xóa</span>
                                    </p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-cogs">
                        </i>
                        <p>
                            <span>QUẢN LÝ SẢN PHẨM</span>
                            <i class="right fa fa-fw fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('products.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-portrait"></i>
                                <p>
                                    Danh sách sản phẩm
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            @can('product-deleteView')
                                <a href="{{route('products.deleteView')}}" class="nav-link ">
                                    <i class="nav-icon fas fa-portrait">
                                    </i>
                                    <p>
                                        <span>Sản phẩm đã xóa</span>
                                    </p>
                                </a>
                            @endcan
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>

