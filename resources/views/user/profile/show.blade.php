@extends('master.user')

@section('main')

@section('title', 'Lý lịch của ' . $scientist->profile_name)

<h2 style="text-align:center; font-weight:bold">Thông tin của {{ $scientist->profile_name }}</h2>
<div class="row">


    @if (Session::has('ok'))
        <div class="alert alert-success notification" id="success-alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('ok') }}
        </div>
    @endif
    @if (Session::has('no'))
        <div class="alert alert-danger notification" id="error-alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('no') }}
        </div>
    @endif
    <form class="align-items-center" method="post" action="" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-md-3">
            <div class="form-group">
                <label for="profile_id">Mã cán bộ <span class="text-danger">*</span></label>
                <input type="text" class="form-control" style="font-weight: bold;" name="profile_id"
                    value="{{ $scientist->profile_id }}" placeholder="Input field" readonly>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="profile_name">Họ và Tên <span class="text-danger">*</span></label>
                <input type="text" class="form-control" style="font-weight: bold;" name="profile_name"
                    value="{{ $scientist->profile_name }}" placeholder="Input field" readonly>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="birthday">Ngày sinh <span class="text-danger">*</span></label>
                <input type="date" class="form-control" name="birthday" style="font-weight: bold;"
                    value="{{ $scientist->birthday }}" placeholder="Input field" readonly>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="gender">Giới tính <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="gender" style="font-weight: bold;"
                    value="{{ $scientist->gender }}" readonly>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="birth_place">Nơi sinh <span class="text-danger">*</span></label>
                <input type="text" class="form-control" style="font-weight: bold;" name="birth_place"
                    value="{{ $scientist->birth_place }}" placeholder="Input field" readonly>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="address">Địa chỉ liên lạc</label>
                <input type="text" class="form-control" name="address" value="{{ $scientist->address }}"
                    placeholder="Địa chỉ liên lạc" readonly>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="office_phone">Điện thoại cơ quan</label>
                <input type="text" class="form-control" name="office_phone" value="{{ $scientist->office_phone }}"
                    placeholder="Điện thoại cơ quan" readonly>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="house_phone">Điện thoại nhà riêng</label>
                <input type="text" class="form-control" name="house_phone" value="{{ $scientist->house_phone }}"
                    placeholder="Điện thoại nhà riêng" readonly>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="telephone">Điện thoại di động <span class="text-danger">*</span></label>
                <input type="text" class="form-control" style="font-weight: bold;" name="telephone"
                    value="{{ $scientist->telephone }}" placeholder="Input field" readonly>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="email">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" style="font-weight: bold;" name="email"
                    value="{{ $scientist->email }}" placeholder="Input field" readonly>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="degree_id">Học vị <span class="text-danger">*</span></label>
                <input type="text" class="form-control" style="font-weight: bold;" name="degree_name"
                    value="{{ $scientist->degree->degree_name }}" readonly>
                <input type="hidden" name="degree_id" value="{{ $scientist->degree_id }}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="investiture">Năm phong</label>
                <input type="text" class="form-control" name="investiture" value="{{ $scientist->investiture }}"
                    placeholder="Năm phong" readonly>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="scientific_title">Chức danh khoa học</label>
                <input type="text" class="form-control" name="scientific_title"
                    value="{{ $scientist->scientific_title }}" placeholder="Chức danh khoa học" readonly>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="research_major">Chuyên ngành nghiên cứu</label>
                <input type="text" class="form-control" name="research_major" style="font-weight: bold;"
                    value="{{ $scientist->research_major }}" placeholder="Input field" readonly>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="research_title">Chức danh nghiên cứu</label>
                <input type="text" class="form-control" name="research_title"
                    value="{{ $scientist->research_title }}" placeholder="Chức danh nghiên cứu" readonly>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="research_position">Chức vụ nghiên cứu</label>
                <input type="text" class="form-control" name="research_position"
                    value="{{ $scientist->research_position }}" placeholder="Chức vụ nghiên cứu" readonly>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="office_id">Tên tổ chức <span class="text-danger">*</span></label>
                <input type="text" class="form-control" style="font-weight: bold;" name="office_name"
                    value="{{ $scientist->office->office_name }}" readonly>
                <input type="hidden" name="office_id" value="{{ $scientist->office_id }}">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="address_office">Địa chỉ tổ chức <span class="text-danger">*</span></label>
                <input type="text" class="form-control" style="font-weight: bold;" name="address_office"
                    value="{{ $scientist->address_office }}" placeholder="Input field" readonly>
            </div>
        </div>

    </form>

 
</div>
<div class="pull-right">
    <a href="{{ route('user.dashboard') }}" class="btn btn-primary">Quay lại Dashboard</a>

    <a href="{{ route('user.profile.edit') }}" class="btn btn-warning">Chỉnh sửa</a>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $("#success-alert").fadeOut("slow");
        }, 2000);
        setTimeout(function() {
            $("#error-alert").fadeOut("slow");
        }, 2000);
    });
</script>

@stop()
