

@extends('master.admin')

@section('main')

@section('title', 'Danh sách đề tài của ' . $scientist->profile_name)

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="fa-solid fa-house-chimney"></i> Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="{{ route('scientist.index') }}">Lý lịch nhà khoa học</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $scientist->profile_name }}</li>
    </ol>
</nav>

<!-- Menu điều hướng -->

<h2 style="text-align:center; font-weight:bold">Thông tin của {{ $scientist->profile_name }}</h2>

<style>
    /* Tùy chỉnh màu chữ cho các liên kết trong navbar */
    .navbar-default .navbar-nav>li>a {
        color: blue;
    }

    .navbar-default .navbar-nav>li>a:hover,
    .navbar-default .navbar-nav>li>a:focus {
        color: dark;
    }

    .navbar-default .navbar-nav>.active>a,
    .navbar-default .navbar-nav>.active>a:hover,
    .navbar-default .navbar-nav>.active>a:focus {
        color: darkblue;
        background-color: transparent;
        /* Để không thay đổi màu nền khi được chọn */
    }
</style>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse-1">
            <ul class="nav navbar-nav">
                
                <li><a class="nav-link"href="{{ route('scientist.profile', ['scientist' => $scientist->id]) }}">Lý lịch <span class="sr-only">(current)</span></a></li>
                <li><a href="{{ route('scientist.topics', ['scientist' => $scientist->id]) }}">Đề tài/Đề án</a></li>
                <li><a href="#">Đề án</a></li>
                <li><a href="#">Bài tham luận</a></li>
                <li><a href="#">giáo trình</a></li>
                <li><a href="#">Sách tham khảo</a></li>
                <li><a href="#">Bài báo</a></li>
                <li><a href="#">Công trình áp dụng</a></li>
                <li><a href="#">Giải thưởng</a></li>
                <li><a href="#">Thành tựu</a></li>
            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>




<table class="table table-hover table-bordered mt-3" id="myTable">
    <thead>
        <tr>
            <th>STT</th>
            <th style="width:200px; text-align: center">Tên đề tài/đề án</th>
            <th style="text-align: center">Chủ nhiệm</th>
            <th style="text-align: center">Cấp đề tài/đề án</th>
            <th style="text-align: center">Kết quả nghiệm thu</th>
            <th style="text-align: center">Ngày bắt đầu</th>
            <th style="text-align: center">Ngày kết thúc</th>
            <th style="text-align: center">Thao Tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($topics as $topic)
            <tr>
                <td>{{ $topic->id }}</td>
                <td>{{ $topic->topic_name }}</td>
                <td>{{ $topic->profile->profile_name }}</td>
                <td>{{ $topic->lvtopic->lvtopic_name }}</td>
                <td>{{ $topic->result }}</td>
                <td>{{ $topic->start_date }}</td>
                <td>{{ $topic->end_date }}</td>
                <td>
                    <div class="action">
                        <div>
                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                data-target="#editscouncilModal" data-topic-id="{{ $topic->id }}"
                                data-topic-name="{{ $topic->topic_name }}" data-profile-id="{{ $topic->profile_id }}"
                                data-result="{{ $topic->result }}" data-lvtopic-id="{{ $topic->lvtopic_id }}"
                                data-start-date="{{ $topic->start_date }}" data-end-date="{{ $topic->end_date }}">
                                <i class="fa fa-edit"></i>
                            </button>
                        </div>
                        <div>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmDeleteModal"
                                data-id="{{ $topic->id }}">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>



@stop()
