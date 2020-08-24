
@extends('layouts.admin')
@section('title')
    <title>Trang chủ</title>
@endsection
@section('contents')
    <div class="content-wrapper">
        @include('partials.content-header',['name'=>'Home','key'=>''])
        <div class="content">
                    <div class="col-md-12">
                        Trang chủ
                    </div>
        </div>
    </div>
@endsection
