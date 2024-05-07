@extends('master.admin')

@section('main')

@section('title', 'Dashboard')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="fa-solid fa-house-chimney"></i> Trang chủ</a></li>
   
    <li class="breadcrumb-item active" aria-current="page"> Quản lý bài báo khoa học</li>
  </ol>
</nav>


<form action="" method="POST" class="form-inline" role="form">

    <div class="form-group">
        <label class="sr-only" for="">label</label>
        <input type="email" class="form-control" id="" placeholder="Input field">
    </div>

    

    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
    <a href="{{ route('topic.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i>Thêm mới</a>
</form>


<table class="table table-hover">
    <thead>
        <tr>
            <th>STT</th>
            <th style="width: 400px">Tên bài báo</th>
            <th>Năm công bố</th>
            <th>Tên tạp chí</th>
            <th>Loại bài báo</th>
            <th>Thao tác</th>
            
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Phát triển thương mại điện tử ở Việt Nam </td>
            <td>2024</td>
            <td>Tạp chí Nghiên cứu tài chính kế toán số 08</td>
            <td>Tạp chí chuyên ngành 1 điểm</td>
            
            <td>
               
                <a href="" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                <a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
            </td>
        </tr>

        <tr>
            <td>1</td>
            <td>Phát triển thương mại điện tử ở Việt Nam </td>
            <td>2024</td>
            <td>Tạp chí Nghiên cứu tài chính kế toán số 08</td>
            <td>Tạp chí chuyên ngành 1 điểm</td>
            
            <td>
               
                <a href="" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                <a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        <tr>
            <td>1</td>
            <td>Phát triển thương mại điện tử ở Việt Nam </td>
            <td>2024</td>
            <td>Tạp chí Nghiên cứu tài chính kế toán số 08</td>
            <td>Tạp chí chuyên ngành 1 điểm</td>
            
            <td>
               
                <a href="" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                <a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        <tr>
            <td>1</td>
            <td>Phát triển thương mại điện tử ở Việt Nam </td>
            <td>2024</td>
            <td>Tạp chí Nghiên cứu tài chính kế toán số 08</td>
            <td>Tạp chí chuyên ngành 1 điểm</td>
            
            <td>
               
                <a href="" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                <a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
    </tbody>
</table>



@stop()