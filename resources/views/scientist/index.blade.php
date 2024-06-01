@extends('master.admin')

@section('main')

@section('title', 'Dashboard')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="fa-solid fa-house-chimney"></i> Trang
                chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">  nhà khoa học</li>
    </ol>
</nav>

<form action="" method="POST" class="form-inline" role="form">

    <a href="{{ route('scientist.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i>Thêm mới</a>
</form>


<table class="table table-hover table-bordered" id="myTable">
    <thead>
        <tr>
            <th>Họ và tên</th>
            <th>Đơn vị công tác</th>
            <th>Học vị</th>
            <th>Chuyên ngành nghiên cứu</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $model)
            <tr>
                <td>{{ $model->profile_name }}</td>
                <td>{{ $model->office->office_name }}</td>
                <td>{{ $model->degree->degree_name }}</td>
                <td>{{ $model->research_major }}</td>
                <td>
                    <a href="{{ route('scientist.topics', ['scientist' => $model->id]) }}" class="btn btn-primary"><i class="fa-solid fa-circle-info"></i></a>
                    
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@stop
