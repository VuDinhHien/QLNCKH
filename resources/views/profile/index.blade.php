@extends('master.admin')

@section('main')

@section('title', 'Dashboard')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="fa-solid fa-house-chimney"></i> Trang chủ</a></li>

        <li class="breadcrumb-item active" aria-current="page"> Lý lịch nhà khoa học</li>
    </ol>
</nav>



<form action="" method="POST" class="form-inline" role="form">

    




    <a href="{{ route('profile.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i>Thêm mới</a>
</form>


<table class="table table-hover table-bordered" style="margin-top: 15px">
    <thead>
        <tr>
            <th style="width: 20px">Mã cán bộ</th>
            <th style="width: 30px">Họ và tên</th>
            <th style="width: 30px">Ngày sinh</th>
            <th style="width: 30px">giới tính</th>
            <th style="width: 30px">Nơi sinh</th>
            <th style="width: 30px">Địa chỉ liên lạc</th>
            <th style="width: 30px">Điện thoại cơ quan</th>
            <th style="width: 30px">Điện thoại nhà riêng</th>
            <th style="width: 30px">Điện thoại di động</th>
            <th style="width: 30px">Email</th>
            <th style="width: 30px">Học vị</th>
            <th style="width: 30px">Năm phong</th>
            <th style="width: 30px">Chức danh khoa học</th>
            <th style="width: 30px">C.ngành nghiên cứu</th>
            <th style="width: 30px">Chức vụ nghiên cứu</th>
            <th style="width: 30px">Tên tổ chức</th>
            <th style="width: 30px">Địa chỉ tố chức</th>
            <th style="width: 50px">Thao tác</th>

        </tr>
    </thead>
    <tbody>
        @foreach($data as $model)

        <tr>

           <td>{{ $model->profile_id }}</td>
            <td>{{ $model->profile_name }}</td>
            <td>{{ $model->birthday }}</td>
            <td>{{ $model->gender }}</td>
            <td>{{ $model->birth_place }}</td>
            <td>{{ $model->address }}</td>
            <td>{{ $model->office_phone }}</td>
            <td>{{ $model->house_phone }}</td>
            <td>{{ $model->telephone }}</td>
            <td>{{ $model->email }}</td>
            <td>{{ $model->degree->degree_name }}</td>
            <td>{{ $model->investiture }}</td>
            <td>{{ $model->scientific_title }}</td>
            <td>{{ $model->research_major }}</td>
            <td>{{ $model->research_position }}</td>
            <td>{{ $model->office->office_name }}</td>
            <td>{{ $model->address_office }}</td>
            


            <td>
                <form method="post" action="{{ route('profile.destroy', $model->id) }}">
                    @csrf
                    @method('DELETE')

                    <a href="{{ route('profile.show', $model->id) }}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                    <a href="{{ route('profile.edit', $model->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you want to Delete it ?')"><i class="fa fa-trash"></i></button>
                </form>

            </td>
        </tr>

        @endforeach







    </tbody>
</table>



@stop()