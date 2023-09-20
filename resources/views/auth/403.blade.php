@extends('auth.layouts.layout1')
@section('content')
    <div class="d-flex flex-column justify-content-center align-items-center vh-100">
        <h1>403 Access Denied</h1>
        <h2>Xin lỗi, bạn không có quyền truy cập vào trang này</h2>
        <a href="{{ route('index') }}">Quay lại trang chủ</a>
    </div>
@endsection