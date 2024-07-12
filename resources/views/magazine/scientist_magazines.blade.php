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


<h2 style="text-align:center; font-weight:bold">Thông tin của {{ $scientist->profile_name }}</h2>
<style>
    /* Tùy chỉnh màu chữ cho các liên kết trong navbar */
    .navbar-default .navbar-nav>li>a {
        color: rgb(0, 55, 255);
        justify-content: space-between;
        font-weight: bolder;
        font-size: 18px; /* Tăng cỡ chữ */
    }

    .navbar-default .navbar-nav>li>a:hover,
    .navbar-default .navbar-nav>li>a:focus {
        color: rgb(139, 19, 0);
    }

    .navbar-default .navbar-nav>.active>a,
    .navbar-default .navbar-nav>.active>a:hover,
    .navbar-default .navbar-nav>.active>a:focus {
        color: rgb(139, 19, 0);
        background-color: transparent;
        /* Để không thay đổi màu nền khi được chọn */
    }

    .navbar-nav {
        float: none;
        margin: 0 auto;
        display: table;
        
        width: 100%;
    }

    .navbar-nav > li {
        display: table-cell;
        text-align: center;
        float: none;
    }
</style>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('scientist.profile', ['scientist' => $scientist->id]) }}">Lý lịch
                        <span class="sr-only">(current)</span></a></li>
                <li><a href="{{ route('scientist.topics', ['scientist' => $scientist->id]) }}">Đề tài/Đề án</a></li>
                <li><a href="{{ route('scientist.curriculums', ['scientist' => $scientist->id]) }}">Sách tham khảo/Giáo trình</a></li>
                <li class="active"><a href="{{ route('scientist.magazines', ['scientist' => $scientist->id]) }}">Bài báo</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<table class="table table-hover table-bordered mt-3" id="myTable">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên bài báo</th>
            <th>Năm công bố</th>
            <th>Tên tạp chí</th>
            <th>Loại bài báo</th>
            <th>Vai trò</th>
      
           
        </tr>
    </thead>
    <tbody>
        @foreach ($magazines as $magazine)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $magazine->magazine_name }}</td>
            <td>{{ $magazine->year }}</td>
            <td>{{ $magazine->journal }}</td>
            <td>{{ $magazine->paper->paper_name }}</td>
            <td>
                @foreach ($magazine->scientists as $sci)
                    @if ($sci->id == $scientist->id)
                        {{ \App\Models\Role::find($sci->pivot->role_id)->role_name }}
                    @endif
                @endforeach
            </td>
           
        </tr>
        @endforeach
    </tbody>
</table>


@stop()
