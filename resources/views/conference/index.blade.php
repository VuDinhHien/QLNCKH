@extends('master.admin')

@section('main')

<!-- @section('title', 'Dashboard') -->

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="fa-solid fa-house-chimney"></i> Trang chủ</a></li>

        <li class="breadcrumb-item active" aria-current="page">Hội thảo/Hội nghị</li>
    </ol>
</nav>





<!-- Modal -->


<button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#createModal" style="margin-bottom: 10px;">
    Thêm mới
</button>

<table class="table table-hover table-bordered mt-3">
    <thead>
        <tr>
            <th>STT</th>
            <th style="width:400px; text-align: center">Tên hội nghị/hội thảo</th>
            <th>Loại hội thảo</th>
            <th>Cơ quan</th>
            <th>Đơn vị</th>
            <th>Kinh phí</th>
            <th>Tên trạng thái</th>
            <th>Ngày thực hiện</th>
            <th>Thao Tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($conferences as $conference)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $conference->conference_name }}</td>
            <td>{{ $conference->seminar->seminar_name }}</td>
            <td>{{ $conference->office }}</td>
            <td>{{ $conference->unit }}</td>
            <td>{{ $conference->money }}</td>
            <td>{{ $conference->status_name }}</td>
            <td>{{ $conference->date }}</td>

            <td>
                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editconferenceModal" data-conference-id="{{ $conference->id }}" data-conference-name="{{ $conference->conference_name }}" data-seminar-id="{{ $conference->seminar_id }}" data-office="{{ $conference->office }}" data-unit="{{ $conference->unit }}" data-money="{{ $conference->money }}" data-status_name="{{ $conference->status_name }}" data-date="{{ $conference->date }}">
                    <i class="fa fa-edit"></i>
                </button>

                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmDeleteModal" data-id="{{ $conference->id }}">
                    <i class="fa fa-trash"></i>
                </button>




            </td>
        </tr>
        @endforeach
    </tbody>
</table>





<!-- Liên kết phân trang -->
<div class="text-right">
    {{ $conferences->links() }}
</div>

<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-success">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="createModalLabel">Thêm mới</h4>


            </div>
            <div class="modal-body">
                <form id="createForm" action="{{ route('conference.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="conference_name">Tên hội nghị/hội thảo</label>
                        <input type="text" class="form-control" id="conference_name" name="conference_name" required>
                    </div>


                    <div class="form-group">
                        <label for="seminar_id">Loại hội thảo</label>
                        <select class="form-control" name="seminar_id" required>
                            @foreach ($seminars as $seminar)
                            <option value="{{ $seminar->id }}">{{ $seminar->seminar_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="teacher_name">Cơ quan</label>
                        <input type="text" class="form-control" id="office" name="office">
                    </div>
                    <div class="form-group">
                        <label for="teacher_name">Đơn vị</label>
                        <input type="text" class="form-control" id="unit" name="unit">
                    </div>
                    <div class="form-group">
                        <label for="teacher_name">Kinh phí</label>
                        <input type="text" class="form-control" id="money" name="money">
                    </div>
                    <div class="form-group">
                        <label for="teacher_name">Tên trạng thái</label>
                        <input type="text" class="form-control" id="status_name" name="status_name">
                    </div>

                    <div class="form-group">
                        <label for="end_date">Ngày thực hiện</label>
                        <input type="date" class="form-control" id="date" name="date" required>
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


<!-- Button to Open the Modal -->
<!-- Example button -->


<!-- The Modal -->
<div class="modal fade" id="editconferenceModal" tabindex="-1" aria-labelledby="editconferenceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header btn-warning">
                <h4 class="modal-title" id="editconferenceModalLabel">Sửa Hội thảo/hội nghị</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('conference.update', ['conference' => $conference->id]) }}" method="POST" id="editconferenceForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="conference_name">Tên hội nghị/hội thảo</label>
                        <input type="text" class="form-control" id="conference_name" name="conference_name" required>
                    </div>

                    <div class="form-group">
                        <label for="seminar_id">Cấp đề tài/đề án</label>
                        <select class="form-control" name="seminar_id" id="seminar_id">
                            @foreach ($seminars as $seminar)
                            <option value="{{ $seminar->id }}">{{ $seminar->seminar_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="office">Cơ quan</label>
                        <input type="text" class="form-control" id="office" name="office">
                    </div>
                    <div class="form-group">
                        <label for="unit">Đơn vị</label>
                        <input type="text" class="form-control" id="unit" name="unit">
                    </div>
                    <div class="form-group">
                        <label for="money">Kinh phí</label>
                        <input type="text" class="form-control" id="money" name="money">
                    </div>
                    <div class="form-group">
                        <label for="status_name">Tên trạng thái</label>
                        <input type="text" class="form-control" id="status_name" name="status_name">
                    </div>
                    <div class="form-group">
                        <label for="date">Ngày thực hiện</label>
                        <input type="date" class="form-control" id="date" name="date" required>
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


   
    $(document).ready(function() {
        $('#editconferenceModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var conferenceId = button.data('conference-id'); // Extract info from data-* attributes
            var conferenceName = button.data('conference-name');
            var seminarId = button.data('seminar-id');
            var office = button.data('office');
            var unit = button.data('unit');
            var money = button.data('money');
            var statusName = button.data('status-name');
            var date = button.data('date');

            // Update the modal's content
            var modal = $(this);
            modal.find('.modal-body #conference_name').val(conferenceName);
            modal.find('.modal-body #seminar_id').val(seminarId);
            modal.find('.modal-body #office').val(office);
            modal.find('.modal-body #unit').val(unit);
            modal.find('.modal-body #money').val(money);
            modal.find('.modal-body #status_name').val(statusName);
            modal.find('.modal-body #date').val(date);

            // Update the form action
            // modal.find('form').attr('action', `/conference/${conferenceId}`);
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
                <h3>Bạn có chắc chắn muốn xóa đề tài/đề án này</h3>
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
            var button = $(event.relatedTarget); // Button that triggered the modal
            var id = button.data('id'); // Extract info from data-* attributes
            var url = '{{ route("conference.destroy", ":id") }}'; // Ensure the route name is correct
            url = url.replace(':id', id);

            var modal = $(this);
            modal.find('#deleteForm').attr('action', url);
        });
    });
</script>

@stop()