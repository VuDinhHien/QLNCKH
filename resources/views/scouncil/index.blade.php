@extends('master.admin')

@section('main')

<!-- @section('title', 'Dashboard') -->

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="fa-solid fa-house-chimney"></i> Trang chủ</a></li>

        <li class="breadcrumb-item active" aria-current="page">Hội đồng khoa học</li>
    </ol>
</nav>


<style>
    th{
        text-align: center
    }

    .action {
        display: flex;
        justify-content: space-between
    }
</style>




<!-- Modal -->


<button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#createModal" style="margin-bottom: 10px;">
    Thêm mới
</button>

<table class="table table-hover table-bordered mt-3" id="myTable">
    <thead>
        <tr>
            <th>Số quyết định</th>
            <th>Ngày lập</th>
            <th>Cấp hội đồng</th>
            <th>Loại hội đồng</th>
            <th>Tên hội đồng</th>
            <th>Năm</th>
            <th>Thao Tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($scouncils as $scouncil)
        <tr>
            <td>{{ $scouncil->decision_number }}</td>
            <td>{{ $scouncil->date }}</td>
            <td>{{ $scouncil->lvcouncil->lvcouncils_name }}</td>
            <td>{{ $scouncil->tpcouncil->tpcouncil_name }}</td>
            <td>{{ $scouncil->scouncil_name }}</td>
            <td>{{ $scouncil->year }}</td>

            <td>

               

                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editscouncilModal" data-scouncil-id="{{ $scouncil->id }}" data-decision-number="{{ $scouncil->decision_number }}" data-date="{{ $scouncil->date }}" data-lvcouncil-id="{{ $scouncil->lvcouncil_id }}" data-tpcouncil-id="{{ $scouncil->tpcouncil_id }}" data-scouncil-name="{{ $scouncil->scouncil_name }}" data-year="{{ $scouncil->year }}">
                    <i class="fa fa-edit"></i>
                </button>

                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmDeleteModal" data-id="{{ $scouncil->id }}">
                    <i class="fa fa-trash"></i>
                </button>


            </td>
        </tr>
        @endforeach
    </tbody>
</table>





<!-- Liên kết phân trang -->


<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-success">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="createModalLabel">Thêm mới</h4>


            </div>
            <div class="modal-body">
                <form id="createForm" action="{{ route('scouncil.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="conference_name">Số quyết định</label>
                        <input type="text" class="form-control" id="decision_number" name="decision_number" required>
                    </div>

                    <div class="form-group">
                        <label for="conference_name">Ngày lập</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>


                    <div class="form-group">
                        <label for="lvcouncil_id">Cấp hội đồng</label>
                        <select class="form-control" name="lvcouncil_id" required>
                            @foreach ($lvcouncils as $lvcouncil)
                            <option value="{{ $lvcouncil->id }}">{{ $lvcouncil->lvcouncils_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tpcouncil_id">Cấp hội đồng</label>
                        <select class="form-control" name="tpcouncil_id" required>
                            @foreach ($tpcouncils as $tpcouncil)
                            <option value="{{ $tpcouncil->id }}">{{ $tpcouncil->tpcouncil_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="scouncil_name">Tên hội đồng</label>
                        <input type="text" class="form-control" id="scouncil_name" name="scouncil_name">
                    </div>


                    <div class="form-group">
                        <label for="year">Năm</label>
                        <input type="year" class="form-control" id="year" name="year" required>
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

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        $('#saveButton').click(function() {
            $('#createForm').submit();
        });
    });
</script>


<!-- The Modal -->
<div class="modal fade" id="editscouncilModal" tabindex="-1" aria-labelledby="editscouncilModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header btn-warning">
                <h4 class="modal-title" id="editscouncilModalLabel">Chỉnh sửa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" id="editscouncilForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="decision_number">Số quyết định</label>
                        <input type="text" class="form-control" id="decision_number" name="decision_number" required>
                    </div>

                    <div class="form-group">
                        <label for="date">Ngày lập</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>

                    <div class="form-group">
                        <label for="lvcouncil_id">Cấp hội đồng</label>
                        <select class="form-control" id="lvcouncil_id" name="lvcouncil_id" required>
                            @foreach ($lvcouncils as $lvcouncil)
                                <option value="{{ $lvcouncil->id }}">{{ $lvcouncil->lvcouncils_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tpcouncil_id">Cấp hội đồng</label>
                        <select class="form-control" id="tpcouncil_id" name="tpcouncil_id" required>
                            @foreach ($tpcouncils as $tpcouncil)
                                <option value="{{ $tpcouncil->id }}">{{ $tpcouncil->tpcouncil_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="scouncil_name">Tên hội đồng</label>
                        <input type="text" class="form-control" id="scouncil_name" name="scouncil_name" required>
                    </div>

                    <div class="form-group">
                        <label for="year">Năm</label>
                        <input type="number" class="form-control" id="year" name="year" required>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#editscouncilModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var scouncilId = button.data('scouncil-id'); // Extract info from data-* attributes
            var decisionNumber = button.data('decision-number');
            var date = button.data('date');
            var lvcouncilId = button.data('lvcouncil-id');
            var tpcouncilId = button.data('tpcouncil-id');
            var scouncilName = button.data('scouncil-name');
            var year = button.data('year');

            // Update the modal's content
            var modal = $(this);
            modal.find('.modal-body #decision_number').val(decisionNumber);
            modal.find('.modal-body #date').val(date);
            modal.find('.modal-body #lvcouncil_id').val(lvcouncilId);
            modal.find('.modal-body #tpcouncil_id').val(tpcouncilId);
            modal.find('.modal-body #scouncil_name').val(scouncilName);
            modal.find('.modal-body #year').val(year);

            // Update the form action
            var form = modal.find('#editscouncilForm');
            form.attr('action', '/admin/scouncil/' + scouncilId); // Adjust the URL as needed
        });
    });
</script>

<!-- Confirm Delete Modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-danger">
                <h3 class="modal-title" id="confirmDeleteModalLabel">Xác nhận xóa</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3>Bạn có chắc chắn muốn xóa hội đồng này</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Hủy</button>
                <form id="deleteForm" action="" method="POST" class="pull-right">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        $('#confirmDeleteModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); 
            var id = button.data('id'); 
            var url = '{{ route("scouncil.destroy", ":id") }}'; 
            url = url.replace(':id', id);

            var modal = $(this);
            modal.find('#deleteForm').attr('action', url);
        });
    });
</script>

@stop()