
@extends('master.admin')

@section('main')

@section('title', 'Danh sách sách tham khảo/giáo trình ' . $scientist->profile_name)

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="fa-solid fa-house-chimney"></i> Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="{{ route('scientist.index') }}">Lý lịch nhà khoa học</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $scientist->profile_name }}</li>
    </ol>
</nav>


<h2 style="text-align:center; font-weight:bold">Thông tin của {{ $scientist->profile_name }}</h2>

<style>
    /* Tùy chỉnh màu chữ cho các liên kết trong navbar */
    .navbar-default .navbar-nav>li>a {
        color: rgb(0, 55, 255);
        justify-content: space-between;
        
    }

    .navbar-default .navbar-nav>li>a:hover,
    .navbar-default .navbar-nav>li>a:focus {
        color: dark;
    }

    .navbar-default .navbar-nav>.active>a,
    .navbar-default .navbar-nav>.active>a:hover,
    .navbar-default .navbar-nav>.active>a:focus {
        color: rgb(139, 19, 0);
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
                <li><a a class="nav-link" href="{{ route('scientist.topics', ['scientist' => $scientist->id]) }}">Đề tài/Đề án</a></li>
        
                <li><a href="#">Bài tham luận</a></li>
                <li  class="active"><a href="{{ route('scientist.curriculums', ['scientist' => $scientist->id]) }}">Sách tham khảo/Giáo trình</a></li>
                <li><a href="{{ route('scientist.magazines', ['scientist' => $scientist->id]) }}">Bài báo</a></li>
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
            <th style="width:200px; text-align: center">Tên sách tham khảo</th>
            <th style="text-align: center">Năm XB</th>
            <th style="text-align: center">Nhà XB</th>
           
            <th style="text-align: center">Loại sách</th>
            <th style="text-align: center">Trình độ đào tạo</th>

           
        </tr>
    </thead>
    <tbody>
        @foreach ($curriculums as $curriculum)
            <tr>
                <td>{{ $curriculum->id }}</td>
                <td>{{ $curriculum->name }}</td>
                <td>{{ $curriculum->year }}</td>
                <td>{{ $curriculum->publisher }}</td>
              
                <td>{{ $curriculum->book->book_name }}</td>
                <td>{{ $curriculum->training->training_name }}</td>

                
            </tr>
        @endforeach
    </tbody>
</table>



@stop()
