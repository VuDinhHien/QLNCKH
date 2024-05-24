@extends('master.admin')

@section('main')



<div class="row">
    <form class="align-items-center" method="post" action="{{ route('profile.store', $profile->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-md-3">
            <div class="form-group">
                <label for="profile_id">Mã cán bộ</label>
                <input type="text" class="form-control" style="font-weight: bold;" name="profile_id" value="{{ $profile->profile_id }}" placeholder="Input field" readonly>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="profile_name">Họ và Tên</label>
                <input type="text" class="form-control" style="font-weight: bold;" name="profile_name" value="{{ $profile->profile_name }}" placeholder="Input field" readonly>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="birthday">Ngày sinh</label>
                <input type="date" class="form-control" name="birthday" style="font-weight: bold;" value="{{ $profile->birthday }}" placeholder="Input field" readonly>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="gender">Giới tính</label>
                <input type="text" class="form-control" name="gender" style="font-weight: bold;" value="{{ $profile->gender }}" readonly>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="birth_place">Nơi sinh</label>
                <input type="text" class="form-control" style="font-weight: bold;" name="birth_place" value="{{ $profile->birth_place }}" placeholder="Input field" readonly>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="address">Địa chỉ liên lạc</label>
                <input type="text" class="form-control" name="address" value="{{ $profile->address }}" placeholder="Địa chỉ liên lạc" readonly>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="office_phone">Điện thoại cơ quan</label>
                <input type="text" class="form-control" name="office_phone" value="{{ $profile->office_phone }}" placeholder="Điện thoại cơ quan" readonly>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="house_phone">Điện thoại nhà riêng</label>
                <input type="text" class="form-control" name="house_phone" value="{{ $profile->house_phone }}" placeholder="Điện thoại nhà riêng" readonly>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="telephone">Điện thoại di động</label>
                <input type="text" class="form-control" style="font-weight: bold;" name="telephone" value="{{ $profile->telephone }}" placeholder="Input field" readonly>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" style="font-weight: bold;" name="email" value="{{ $profile->email }}" placeholder="Input field" readonly>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="degree_id">Học vị</label>
                <input type="text" class="form-control" style="font-weight: bold;" name="degree_name" value="{{ $profile->degree->degree_name }}" readonly>
                <input type="hidden" name="degree_id" value="{{ $profile->degree_id }}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="investiture">Năm phong</label>
                <input type="text" class="form-control" name="investiture" value="{{ $profile->investiture }}" placeholder="Năm phong" readonly>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="scientific_title">Chức danh khoa học</label>
                <input type="text" class="form-control" name="scientific_title" value="{{ $profile->scientific_title }}" placeholder="Chức danh khoa học" readonly>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="research_major">Chuyên ngành nghiên cứu</label>
                <input type="text" class="form-control" name="research_major" style="font-weight: bold;" value="{{ $profile->research_major }}" placeholder="Input field" readonly>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="research_title">Chức danh nghiên cứu</label>
                <input type="text" class="form-control" name="research_title" value="{{ $profile->research_title }}" placeholder="Chức danh nghiên cứu" readonly>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="research_position">Chức vụ nghiên cứu</label>
                <input type="text" class="form-control" name="research_position" value="{{ $profile->research_position }}" placeholder="Chức vụ nghiên cứu" readonly>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="form-group">
                <label for="office_id">Tên tổ chức</label>
                <input type="text" class="form-control" style="font-weight: bold;" name="office_name" value="{{ $profile->office->office_name }}" readonly>
                <input type="hidden" name="office_id" value="{{ $profile->office_id }}">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="address_office">Địa chỉ tổ chức</label>
                <input type="text" class="form-control" style="font-weight: bold;" name="address_office" value="{{ $profile->address_office }}" placeholder="Input field" readonly>
            </div>
        </div>
        <div class="text-center col-md-12">
            <!-- <button type="submit" class="btn btn-warning">Sửa thông tin</button> -->
            <a href="{{ route('profile.index') }}" class="btn btn-warning">Quay lại danh sách</a>
        </div>
    </form>
</div>




@endsection('content')