
@extends('master.admin')

@section('main')

@section('title', 'Lý lịch của ' . $scientist->profile_name)

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
        color: rgb(0, 55, 255);
        justify-content: space-between;
        font-weight: bolder;
        
    }

    .navbar-default .navbar-nav>li>a:hover,
    .navbar-default .navbar-nav>li>a:focus {
        color:  rgb(139, 19, 0);
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
                
                <li class="active"><a href="{{ route('scientist.profile', ['scientist' => $scientist->id]) }}">Lý lịch <span class="sr-only">(current)</span></a></li>
                <li><a href="{{ route('scientist.topics', ['scientist' => $scientist->id]) }}">Đề tài/Đề án</a></li>
               
                <li><a href="#">Bài tham luận</a></li>
                <li><a href="{{ route('scientist.curriculums', ['scientist' => $scientist->id]) }}">Sách tham khảo/Giáo trình</a></li>
                <li><a href="{{ route('scientist.magazines', ['scientist' => $scientist->id]) }}">Bài báo</a></li>
                <li><a href="#">Công trình áp dụng</a></li>
                <li><a href="#">Giải thưởng</a></li>
                <li><a href="#">Thành tựu</a></li>
            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>


<div class="row">
    <form class="align-items-center" method="post" action="{{ route('scientist.store', $scientist->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-md-3">
            <div class="form-group">
                <label for="profile_id">Mã cán bộ</label>
                <input type="text" class="form-control" style="font-weight: bold;" name="profile_id" value="{{ $scientist->profile_id }}" placeholder="Input field" readonly>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="profile_name">Họ và Tên</label>
                <input type="text" class="form-control" style="font-weight: bold;" name="profile_name" value="{{ $scientist->profile_name }}" placeholder="Input field" readonly>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="birthday">Ngày sinh</label>
                <input type="date" class="form-control" name="birthday" style="font-weight: bold;" value="{{ $scientist->birthday }}" placeholder="Input field" readonly>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="gender">Giới tính</label>
                <input type="text" class="form-control" name="gender" style="font-weight: bold;" value="{{ $scientist->gender }}" readonly>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="birth_place">Nơi sinh</label>
                <input type="text" class="form-control" style="font-weight: bold;" name="birth_place" value="{{ $scientist->birth_place }}" placeholder="Input field" readonly>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="address">Địa chỉ liên lạc</label>
                <input type="text" class="form-control" name="address" value="{{ $scientist->address }}" placeholder="Địa chỉ liên lạc" readonly>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="office_phone">Điện thoại cơ quan</label>
                <input type="text" class="form-control" name="office_phone" value="{{ $scientist->office_phone }}" placeholder="Điện thoại cơ quan" readonly>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="house_phone">Điện thoại nhà riêng</label>
                <input type="text" class="form-control" name="house_phone" value="{{ $scientist->house_phone }}" placeholder="Điện thoại nhà riêng" readonly>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="telephone">Điện thoại di động</label>
                <input type="text" class="form-control" style="font-weight: bold;" name="telephone" value="{{ $scientist->telephone }}" placeholder="Input field" readonly>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" style="font-weight: bold;" name="email" value="{{ $scientist->email }}" placeholder="Input field" readonly>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="degree_id">Học vị</label>
                <input type="text" class="form-control" style="font-weight: bold;" name="degree_name" value="{{ $scientist->degree->degree_name }}" readonly>
                <input type="hidden" name="degree_id" value="{{ $scientist->degree_id }}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="investiture">Năm phong</label>
                <input type="text" class="form-control" name="investiture" value="{{ $scientist->investiture }}" placeholder="Năm phong" readonly>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="scientific_title">Chức danh khoa học</label>
                <input type="text" class="form-control" name="scientific_title" value="{{ $scientist->scientific_title }}" placeholder="Chức danh khoa học" readonly>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="research_major">Chuyên ngành nghiên cứu</label>
                <input type="text" class="form-control" name="research_major" style="font-weight: bold;" value="{{ $scientist->research_major }}" placeholder="Input field" readonly>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="research_title">Chức danh nghiên cứu</label>
                <input type="text" class="form-control" name="research_title" value="{{ $scientist->research_title }}" placeholder="Chức danh nghiên cứu" readonly>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="research_position">Chức vụ nghiên cứu</label>
                <input type="text" class="form-control" name="research_position" value="{{ $scientist->research_position }}" placeholder="Chức vụ nghiên cứu" readonly>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="form-group">
                <label for="office_id">Tên tổ chức</label>
                <input type="text" class="form-control" style="font-weight: bold;" name="office_name" value="{{ $scientist->office->office_name }}" readonly>
                <input type="hidden" name="office_id" value="{{ $scientist->office_id }}">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="address_office">Địa chỉ tổ chức</label>
                <input type="text" class="form-control" style="font-weight: bold;" name="address_office" value="{{ $scientist->address_office }}" placeholder="Input field" readonly>
            </div>
        </div>
        
    </form>
</div>


@stop()