@extends('master.user')
@section('title', 'Sửa thông tin của' . $scientist->profile_name)
@section('main')



<div class="row">
    <h1>Chỉnh sửa thông tin nhà khoa học</h1>
    <form class="align-items-center" method="post" action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-md-3">
            <div class="form-group">
                <label for="profile_id">Mã cán bộ</label>
                <input type="text" class="form-control" name="profile_id" value="{{ $scientist->profile_id }}" placeholder="Input field" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="profile_name">Họ và Tên</label>
                <input type="text" class="form-control" name="profile_name" value="{{ $scientist->profile_name }}" placeholder="Input field" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="birthday">Ngày sinh</label>
                <input type="date" class="form-control" name="birthday" value="{{ $scientist->birthday }}" placeholder="Input field" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="gender">Giới tính</label>
                <select name="gender" id="gender" class="form-control" required>
                    <option value="Nữ" {{ $scientist->gender == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                    <option value="Nam" {{ $scientist->gender == 'Nam' ? 'selected' : '' }}>Nam</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="birth_place">Nơi sinh</label>
                <input type="text" class="form-control" name="birth_place" value="{{ $scientist->birth_place }}" placeholder="Input field" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="address">Địa chỉ liên lạc</label>
                <input type="text" class="form-control" name="address" value="{{ $scientist->address }}" placeholder="Input field">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="office_phone">Điện thoại cơ quan</label>
                <input type="text" class="form-control" name="office_phone" value="{{ $scientist->office_phone }}" placeholder="Input field">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="house_phone">Điện thoại nhà riêng</label>
                <input type="text" class="form-control" name="house_phone" value="{{ $scientist->house_phone }}" placeholder="Input field">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="telephone">Điện thoại di động</label>
                <input type="text" class="form-control" name="telephone" value="{{ $scientist->telephone }}" placeholder="Input field" required>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="{{ $scientist->email }}" placeholder="Input field" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="degree_id">Học vị</label>
                <select class="form-control" name="degree_id" required>
                    @foreach ($degrees as $degree)
                    <option value="{{ $degree->id }}" {{ $degree->id == $scientist->degree_id ? 'selected' : ''}}>{{ $degree->degree_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="investiture">Năm phong</label>
                <input type="text" class="form-control" name="investiture" value="{{ $scientist->investiture }}" placeholder="Input field">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="scientific_title">Chức danh khoa học</label>
                <input type="text" class="form-control" name="scientific_title" value="{{ $scientist->scientific_title }}" placeholder="Input field">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="research_major">Chuyên ngành nghiên cứu</label>
                <input type="text" class="form-control" name="research_major" value="{{ $scientist->research_major }}" placeholder="Input field">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="research_title">Chức danh nghiên cứu</label>
                <input type="text" class="form-control" name="research_title" value="{{ $scientist->research_title }}" placeholder="Input field">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="research_position">Chức vụ nghiên cứu</label>
                <input type="text" class="form-control" name="research_position" value="{{ $scientist->research_position }}" placeholder="Input field">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="office_id">Tên tổ chức</label>
                <select class="form-control" name="office_id" required>
                    @foreach ($offices as $office)
                    <option value="{{ $office->id }}" {{ $office->id == $scientist->office_id ? 'selected' : ''}}>{{ $office->office_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="address_office">Địa chỉ tổ chức</label>
                <input type="text" class="form-control" name="address_office" value="{{ $scientist->address_office }}" placeholder="Input field" required>
            </div>
        </div>
        <div class="text-center col-md-12">

            <button type="submit" class="btn btn-warning">Sửa thông tin</button>
        </div>
    </form>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>

@endsection('content')