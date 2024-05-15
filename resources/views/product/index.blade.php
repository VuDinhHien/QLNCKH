@extends('master.admin')

@section('main')

@section('title', 'Dashboard')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="fa-solid fa-house-chimney"></i> Trang chủ</a></li>

        <li class="breadcrumb-item active" aria-current="page"> Loại sản phẩm</li>
    </ol>
</nav>


<form action="" method="POST" class="form-inline" role="form">

    <div class="form-group">
        <label class="sr-only" for="">label</label>
        <input type="email" class="form-control" id="" placeholder="Input field">
    </div>



    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
    <a href="{{ route('product.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i>Thêm mới</a>
</form>


<table class="table table-hover">
    <thead>
        <tr>
            <th>Tên loại sản phẩm</th>
            <th class="text-right">Thao tác</th>

        </tr>
    </thead>
    <tbody>
        @foreach($data as $row)

        <tr>

            <td>{{ $row->product_name }}</td>
            
            <td class="text-right">
                <form method="post" action="{{ route('product.destroy', $row->id) }}">
                    @csrf
                    @method('DELETE')

                   
                    <a href="{{ route('product.edit', $row->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                    
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you want to Delete it ?')"><i class="fa fa-trash"></i></button>
                </form>

            </td>
        </tr>

        @endforeach



    </tbody>
</table>
<div class="text-right">
{{ $data->links('pagination::bootstrap-3') }}
</div>


@stop()