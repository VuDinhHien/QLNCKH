@extends('master.user')

@section('main')

@section('title', 'Danh sách đề tài')

@if (Session::has('success'))
    <div class="alert alert-success notification" id="success-alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ Session::get('success') }}
    </div>
@endif
<h2 style="text-align:center; font-weight:bold">Danh sách đề tài của {{ $scientist->profile_name }}</h2>

<table class="table table-hover table-bordered mt-3" id="myTable">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên đề tài</th>
            <th>Loại đề tài</th>
            <th>Kết quả</th>
            <th>Vai trò</th>
            <th>Ngày bắt đầu</th>
            <th>Ngày kết thúc</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($projects as $project)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $project->topic_name }}</td>
                <td>{{ $project->lvtopic->lvtopic_name }}</td>
                <td>{{ $project->result }}</td>
                <td>
                    @foreach ($project->scientists as $sci)
                        @if ($sci->id == $scientist->id)
                            {{ \App\Models\Role::find($sci->pivot->role_id)->role_name }}
                        @endif
                    @endforeach
                </td>
                <td>{{ $project->start_date }}</td>
                <td>{{ $project->end_date }}</td>
                <td>
                    @foreach ($project->scientists as $sci)
                        @if ($sci->id == $scientist->id)
                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                data-target="#editModal"
                                data-topic-id="{{ $project->id }}"
                                data-topic-name="{{ $project->topic_name }}"
                                data-lvtopic-id="{{ $project->lvtopic_id }}"
                                data-result="{{ $project->result }}"
                                data-start-date="{{ $project->start_date }}"
                                data-end-date="{{ $project->end_date }}"
                                data-role-id="{{ $sci->pivot->role_id }}">
                                <i class="fas fa-edit"></i>
                            </button>
                        @endif
                    @endforeach
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


<!-- Modal edit-->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-warning">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="editModalLabel">Chỉnh sửa đề tài</h4>
            </div>
            <div class="modal-body">
                <form id="editForm" action="{{ route('user.topic.update', ['topic' => 0]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="edit_topic_name">Tên đề tài</label>
                        <input type="text" class="form-control" id="edit_topic_name" name="topic_name" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_lvtopic_id">Cấp đề tài/đề án</label>
                        <select class="form-control" id="edit_lvtopic_id" name="lvtopic_id" required>
                            @foreach ($lvtopics as $lvtopic)
                                <option value="{{ $lvtopic->id }}">{{ $lvtopic->lvtopic_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="result">Kết quả nghiệm thu</label>
                        <select name="result" id="result" class="form-control">
                            <option value="Khá">Khá</option>
                            <option value="Giỏi">Giỏi</option>
                            <option value="Xuất sắc">Xuất sắc</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit_start_date">Ngày bắt đầu</label>
                        <input type="date" class="form-control" id="edit_start_date" name="start_date" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_end_date">Ngày kết thúc</label>
                        <input type="date" class="form-control" id="edit_end_date" name="end_date" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_role_id">Vai trò của bạn</label>
                        <select class="form-control" id="edit_role_id" name="role_id" required>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" id="updateButton">Cập nhật</button>
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
        $('[data-target="#editModal"]').click(function() {
            var topicId = $(this).data('topic-id');
            var topicName = $(this).data('topic-name');
            var lvtopicId = $(this).data('lvtopic-id');
            var result = $(this).data('result');
            var startDate = $(this).data('start-date');
            var endDate = $(this).data('end-date');
            var roleId = $(this).data('role-id');

            $('#edit_topic_name').val(topicName);
            $('#edit_lvtopic_id').val(lvtopicId);
            $('#result').val(result);
            $('#edit_start_date').val(startDate);
            $('#edit_end_date').val(endDate);
            $('#edit_role_id').val(roleId);

            var action = "{{ route('user.topic.update', ['topic' => ':id']) }}";
            action = action.replace(':id', topicId);
            $('#editForm').attr('action', action);
        });

        $('#updateButton').click(function() {
            $('#editForm').submit();
        });
    });
</script>



@stop()
