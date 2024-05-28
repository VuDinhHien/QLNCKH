@extends('master.admin')

@section('main')

@section('title', 'Dashboard')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="fa-solid fa-house-chimney"></i> Trang
                chủ</a></li>

        <li class="breadcrumb-item active" aria-current="page"> Loại đề xuất</li>
    </ol>
</nav>


<form action="" method="POST" class="form-inline" role="form">


    <a href="{{ route('propose.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i>Thêm mới</a>
</form>


<table class="table table-hover" id="myTable">
    <thead>
        <tr>
            <th>Tên loại đề xuất</th>
            <th class="text-right" style="width= 50px">Thao tác</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
            <tr>

                <td>{{ $row->propose_name }}</td>

                <td class="text-right">
                    <form method="post" action="{{ route('propose.destroy', $row->id) }}">
                        @csrf
                        @method('DELETE')


                        <a href="{{ route('propose.edit', $row->id) }}" class="btn btn-sm btn-warning"><i
                                class="fa fa-edit"></i></a>

                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you want to Delete it ?')"><i class="fa fa-trash"></i></button>
                    </form>

                </td>
            </tr>
        @endforeach



    </tbody>
</table>


@stop()
