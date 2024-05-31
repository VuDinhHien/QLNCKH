@extends('master.admin')

@section('main')

@section('title', 'Dashboard')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="fa-solid fa-house-chimney"></i> Trang chủ</a></li>

        <li class="breadcrumb-item active" aria-current="page"> Lý lịch nhà khoa học</li>
    </ol>
</nav>






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
        @foreach($data as $model)

        <tr>

          
            <td>{{ $model->profile_name }}</td>
            <td>{{ $model->office->office_name }}</td>
          
            <td>{{ $model->degree->degree_name }}</td>
            
            <td>{{ $model->research_major }}</td>
           
            
           <td>
            <a href="#" class="btn btn-primary"><i class="fa-solid fa-circle-info"></i></a>
           </td>

           
        </tr>

        @endforeach







    </tbody>
</table>



@stop()