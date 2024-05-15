@extends('master.admin')

@section('main')

@section('title', 'Dashboard')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="fa-solid fa-house-chimney"></i> Trang chủ</a></li>

        <li class="breadcrumb-item active" aria-current="page"> Cấp hội đồng</li>
    </ol>
</nav>


<form action="" method="POST" class="form-inline" role="form">

    <div class="form-group">
        <label class="sr-only" for="">label</label>
        <input type="email" class="form-control" id="" placeholder="Input field">
    </div>



    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
    <a href="{{ route('lvcouncil.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i>Thêm mới</a>
</form>

<!-- <style>
    .modal-header {
        background-color: #5cb85c;
        color: white;
    }

    .modal-footer .btn-primary {
        background-color: #5cb85c;
        border-color: #4cae4c;
    }
</style>

Button trigger modal 
<button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#createModal" >
        Thêm mới
    </button>

    
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="createModalLabel">Thêm mới</h4>
                </div>
                <div class="modal-body">
                    <form id="createForm" method="post" action="{{ route('lvcouncil.store') }}" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="itemName">Tên</label>
                            <input type="text" class="form-control" id="itemName" placeholder="Nhập tên">
                        </div>
                        <div class="form-group">
                            <label for="itemDescription">Mô tả</label>
                            <textarea class="form-control" id="itemDescription" rows="3" placeholder="Nhập mô tả"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="saveButton">Lưu</button>
                </div>
            </div>
        </div>
    </div>
 -->

<table class="table table-hover">
    <thead>
        <tr>
            <th>Mã cấp hội đồng</th>
            <th>Tên cấp hội đồng</th>
            <th>Thao tác</th>

        </tr>
    </thead>
    <tbody>
        @foreach($data as $row)

        <tr>

            <td>{{ $row->lvcouncils_id }}</td>
            <td>{{ $row->lvcouncils_name }}</td>
            <td>
                <form method="post" action="{{ route('lvcouncil.destroy', $row->id) }}">
                    @csrf
                    @method('DELETE')

                   
                    <a href="{{ route('lvcouncil.edit', $row->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                    
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you want to Delete it ?')"><i class="fa fa-trash"></i></button>
                </form>

            </td>
        </tr>

        @endforeach



    </tbody>
</table>



@stop()