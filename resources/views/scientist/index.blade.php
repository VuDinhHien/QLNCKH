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
                <td>{{ $model->office->office_name ?? '' }}</td>
                <td>{{ $model->degree->degree_name ?? '' }}</td>
                <td>{{ $model->research_major }}</td>
            
                <td>
                    
                    
                    <form method="post" action="{{ route('scientist.destroy', $model->id) }}">
                        @csrf
                        @method('DELETE')

                        <a href="{{ route('scientist.profile', ['scientist' => $model->id]) }}" class="btn btn-primary"><i class="fa-solid fa-circle-info"></i></a>
    
                        
                        <a href="{{ route('scientist.edit', $model->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
    
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you want to Delete it ?')"><i class="fa fa-trash"></i></button>
                    </form>

                </td>

                
            </tr>
        @endforeach
    </tbody>
</table>

@stop
