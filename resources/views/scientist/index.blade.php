@extends('master.admin')

@section('main')

@section('title', 'Dashboard')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="fa-solid fa-house-chimney"></i> Trang chủ</a></li>
   
    <li class="breadcrumb-item active" aria-current="page"> Quản lý nhà khoa học</li>
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
            <th>Họ tên</th>
            <th style="width: 400px">Đơn vị công tác</th>
            <th>Học hàm</th>
            <th>Học vị</th>
            <th>Chuyên ngành nghiên cứu</th>
            <th>Thao tác</th>
            
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Bùi Giang Nam</td>
            <td>TẠP CHÍ GIÁO DỤC LÝ LUẬN </td>
            <td></td>
            <td>Tiến sĩ</td>
            <td>Lịch sử Việt Nam</td>
            
            <td>
               
                <a href="" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                <a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
            </td>
        </tr>

        <tr>
            <td>Bùi Giang Nam</td>
            <td>TẠP CHÍ GIÁO DỤC LÝ LUẬN </td>
            <td></td>
            <td>Tiến sĩ</td>
            <td>Lịch sử Việt Nam</td>
            
            <td>
               
                <a href="" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                <a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
            </td>
        </tr>

        <tr>
            <td>Bùi Giang Nam</td>
            <td>TẠP CHÍ GIÁO DỤC LÝ LUẬN </td>
            <td></td>
            <td>Tiến sĩ</td>
            <td>Lịch sử Việt Nam</td>
            
            <td>
               
                <a href="" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                <a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
            </td>
        </tr>

        <tr>
            <td>Bùi Giang Nam</td>
            <td>TẠP CHÍ GIÁO DỤC LÝ LUẬN </td>
            <td></td>
            <td>Tiến sĩ</td>
            <td>Lịch sử Việt Nam</td>
            
            <td>
               
                <a href="" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                <a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
            </td>
        </tr>

    </tbody>
</table>



@stop()