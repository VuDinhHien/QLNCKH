@extends('master.admin')

@section('main')

@section('title', 'Dashboard')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="fa-solid fa-house-chimney"></i> Trang chủ</a></li>

        <li class="breadcrumb-item active" aria-current="page"> Cấp đề tài</li>
    </ol>
</nav>


<form action="" method="POST" class="form-inline" role="form">

   


    
    <a href="{{ route('lvtopic.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i>Thêm mới</a>
</form>



<table class="table table-hover" id="myTable">
    <thead>
        <tr>
            <th>Tên cấp đề tài</th>
            <th>Đề tài/Đề án</th>
            <th>Thao tác</th>

        </tr>
    </thead>
    <tbody>
        @foreach($data as $row)

        <tr>

            <td>{{ $row->lvtopic_name }}</td>
            <td>{{ $row->category }}</td>
            <td>
                <form method="post" action="{{ route('lvtopic.destroy', $row->id) }}">
                    @csrf
                    @method('DELETE')

                   
                    <a href="{{ route('lvtopic.edit', $row->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                    
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you want to Delete it ?')"><i class="fa fa-trash"></i></button>
                </form>

            </td>
        </tr>

        @endforeach



    </tbody>
</table>



@stop()