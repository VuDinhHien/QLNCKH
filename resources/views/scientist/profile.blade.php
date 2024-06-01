
@extends('master.admin')

@section('main')

@section('title', 'Lý lịch của ' . $scientist->profile_name)

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="fa-solid fa-house-chimney"></i> Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="{{ route('scientist.index') }}">Lý lịch nhà khoa học</a></li>
        <li class="breadcrumb-item active" aria-current="page">Lý lịch của {{ $scientist->profile_name }}</li>
    </ol>
</nav>

<!-- Menu điều hướng -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Menu</a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('scientist.profile', ['scientist' => $scientist->id]) }}">Lý lịch</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('scientist.topics', ['scientist' => $scientist->id]) }}">Đề tài/Đề án</a>
            </li>
        </ul>
    </div>
</nav>

<!-- Thông tin lý lịch -->
<div class="card mt-3">
    <div class="card-header">
        Thông tin lý lịch
    </div>
    <div class="card-body">
        <p><strong>Họ và tên:</strong> {{ $scientist->profile_name }}</p>
        <p><strong>Email:</strong> {{ $scientist->email }}</p>
        
        <!-- Thêm thông tin khác của nhà khoa học ở đây -->
    </div>
</div>

@stop()