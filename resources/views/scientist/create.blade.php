@extends('master.admin')

@section('main')



<div class="row">
    <form class="align-items-center" method="post" action="{{ route('scientist.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="col-md-3">
            <div class="form-group">
                <label for="profile_id">Mã cán bộ <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="profile_id" placeholder="Input field" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="profile_name">Họ và Tên <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="profile_name" placeholder="Input field" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="birthday">Ngày sinh <span class="text-danger">*</span></label>
                <input type="date" class="form-control" name="birthday" placeholder="Input field" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="gender">Giới tính <span class="text-danger">*</span></label>
                <select name="gender" id="gender" class="form-control" required>
                    <option value="Nữ">Nữ</option>
                    <option value="Nam">Nam</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="birth_place">Nơi sinh <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="birth_place" placeholder="Input field" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="address">Địa chỉ liên lạc</label>
                <input type="text" class="form-control" name="address" placeholder="Input field">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="office_phone">Điện thoại cơ quan</label>
                <input type="text" class="form-control" name="office_phone" placeholder="Input field">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="house_phone">Điện thoại nhà riêng</label>
                <input type="text" class="form-control" name="house_phone" placeholder="Input field">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="telephone">Điện thoại di động <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="telephone" placeholder="Input field" required>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="email">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" name="email" placeholder="Input field" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="degree_id">Học vị <span class="text-danger">*</span></label>
                <select class="form-control" name="degree_id" required>
                    @foreach ($degrees as $degree)
                    <option value="{{ $degree->id }}">{{ $degree->degree_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="investiture">Năm phong</label>
                <input type="text" class="form-control" name="investiture" placeholder="Input field">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="scientific_title">Chức danh khoa học</label>
                <input type="text" class="form-control" name="scientific_title" placeholder="Input field">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="research_major">Chuyên ngành nghiên cứu</label>
                <input type="text" class="form-control" name="research_major" placeholder="Input field">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="research_title">Chức danh nghiên cứu</label>
                <input type="text" class="form-control" name="research_title" placeholder="Input field">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="research_position">Chức vụ nghiên cứu</label>
                <input type="text" class="form-control" name="research_position" placeholder="Input field">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="office_id">Tên tổ chức <span class="text-danger">*</span></label>
                <select class="form-control" name="office_id" required>
                    @foreach ($offices as $office)
                    <option value="{{ $office->id }}">{{ $office->office_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="address_office">Địa chỉ tổ chức <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="address_office" placeholder="Input field" required>
            </div>
        </div>
        <div class="text-center col-md-12">
            <button type="submit" class="btn btn-success">Thêm mới</button>
        </div>
    </form>
</div>




@endsection('content')