@extends('master.admin')

@section('main')

@section('title', 'Dashboard')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="fa-solid fa-house-chimney"></i> Trang chủ</a></li>

        <li class="breadcrumb-item active" aria-current="page"> Chức vụ hội đồng</li>
    </ol>
</nav>




   



   
    <a href="{{ route('council.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i>Thêm mới</a>



<table class="table table-hover" id="myTable">
    <thead>
        <tr>
           
            <th>Tên chức vụ</th>
           
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
        @foreach($data as $row)

        <tr>

          
            <td>{{ $row->position_name }}</td>
          
            <td>
                <form method="post" action="{{ route('council.destroy', $row->id) }}">
                    @csrf
                    @method('DELETE')

                   
                    <a href="{{ route('council.edit', $row->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                    
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you want to Delete it ?')"><i class="fa fa-trash"></i></button>
                </form>

            </td>
        </tr>

        @endforeach



    </tbody>
</table>



@stop()