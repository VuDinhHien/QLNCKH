@extends('master.admin')

@section('main')

@section('title', 'Báo cáo thống kê')

<h2 style="text-align:center; font-weight:bold">Báo cáo thống kê</h2>
<table class="table table-bordered" id="myTable">
    <thead>
        <tr>
            <th>Tên loại báo cáo</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Thống kê theo giáo trình và sách tham khảo</td>
            <td>
                <a href="{{ route('report.export.combined') }}" class="btn btn-sm btn-success">
                    <i class="fa-sharp fa-solid fa-download" style="margin-right: 5px;"></i>
                </a>
            </td>
        </tr>

        <tr>
            <td>Thống kê theo tạp chí</td>
            <td>
                <a href="{{ route('report.export.papers') }}" class="btn btn-sm btn-success">
                    <i class="fa-sharp fa-solid fa-download" style="margin-right: 5px;"></i>
                
                </a>
            </td>
        </tr>

       
    </tbody>
</table>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
@stop()
