@extends('master.admin')
@section('title', 'Sửa thông tin của' . $profile->profile_name)
@section('main')



<div class="row">
    <form class="align-items-center" method="post" action="{{ route('profile.update', $profile->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-md-3">
            <div class="form-group">
                <label for="profile_id">Mã cán bộ</label>
                <input type="text" class="form-control" name="profile_id" value="{{ $profile->profile_id }}" placeholder="Input field" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="profile_name">Họ và Tên</label>
                <input type="text" class="form-control" name="profile_name" value="{{ $profile->profile_name }}" placeholder="Input field" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="birthday">Ngày sinh</label>
                <input type="date" class="form-control" name="birthday" value="{{ $profile->birthday }}" placeholder="Input field" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="gender">Giới tính</label>
                <select name="gender" id="gender" class="form-control" required>
                    <option value="Nữ" {{ $profile->gender == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                    <option value="Nam" {{ $profile->gender == 'Nam' ? 'selected' : '' }}>Nam</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="birth_place">Nơi sinh</label>
                <input type="text" class="form-control" name="birth_place" value="{{ $profile->birth_place }}" placeholder="Input field" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="address">Địa chỉ liên lạc</label>
                <input type="text" class="form-control" name="address" value="{{ $profile->address }}" placeholder="Input field">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="office_phone">Điện thoại cơ quan</label>
                <input type="text" class="form-control" name="office_phone" value="{{ $profile->office_phone }}" placeholder="Input field">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="house_phone">Điện thoại nhà riêng</label>
                <input type="text" class="form-control" name="house_phone" value="{{ $profile->house_phone }}" placeholder="Input field">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="telephone">Điện thoại di động</label>
                <input type="text" class="form-control" name="telephone" value="{{ $profile->telephone }}" placeholder="Input field" required>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="{{ $profile->email }}" placeholder="Input field" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="degree_id">Học vị</label>
                <select class="form-control" name="degree_id" required>
                    @foreach ($degrees as $degree)
                    <option value="{{ $degree->id }}" {{ $degree->id == $profile->degree_id ? 'selected' : ''}}>{{ $degree->degree_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="investiture">Năm phong</label>
                <input type="text" class="form-control" name="investiture" value="{{ $profile->investiture }}" placeholder="Input field">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="scientific_title">Chức danh khoa học</label>
                <input type="text" class="form-control" name="scientific_title" value="{{ $profile->scientific_title }}" placeholder="Input field">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="research_major">Chuyên ngành nghiên cứu</label>
                <input type="text" class="form-control" name="research_major" value="{{ $profile->research_major }}" placeholder="Input field" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="research_title">Chức danh nghiên cứu</label>
                <input type="text" class="form-control" name="research_title" value="{{ $profile->research_title }}" placeholder="Input field">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="research_position">Chức vụ nghiên cứu</label>
                <input type="text" class="form-control" name="research_position" value="{{ $profile->research_position }}" placeholder="Input field">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="office_id">Tên tổ chức</label>
                <select class="form-control" name="office_id" required>
                    @foreach ($offices as $office)
                    <option value="{{ $office->id }}" {{ $office->id == $profile->office_id ? 'selected' : ''}}>{{ $office->office_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="address_office">Địa chỉ tổ chức</label>
                <input type="text" class="form-control" name="address_office" value="{{ $profile->address_office }}" placeholder="Input field" required>
            </div>
        </div>
        <div class="text-center col-md-12">

            <button type="submit" class="btn btn-warning">Sửa thông tin</button>
        </div>
    </form>
</div>




@endsection('content')