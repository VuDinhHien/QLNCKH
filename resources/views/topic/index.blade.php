@extends('master.admin')

@section('main')

<!-- @section('title', 'Dashboard') -->


<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="fa-solid fa-house-chimney"></i> Trang
                chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page"> Danh sách Đề tài</li>
    </ol>
</nav>



<style>
    .action {
        display: flex;
        justify-content: space-between
    }
</style>

<!-- Modal -->


<button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#createModal"
    style="margin-bottom: 10px; margin-left:10px"><i class="fa-solid fa-circle-plus"></i>
    Thêm mới
</button>
<a href="{{ route('topics.export') }}" class="btn btn-success pull-right">
    <i class="fa fa-file-excel" style="margin-right: 5px;"></i> Xuất Excel
</a>

<table class="table table-hover table-bordered mt-3" id="myTable">
    <thead>
        <tr>
            <th>STT</th>
            <th style="width:200px; text-align: center">Tên đề tài/đề án</th>
            <th style="text-align: center">Chủ nhiệm</th>
            <th style="text-align: center">Cấp đề tài/đề án</th>
            <th style="text-align: center">Kết quả nghiệm thu</th>
            <th style="text-align: center">Ngày bắt đầu</th>
            <th style="text-align: center">Ngày kết thúc</th>
            <th style="text-align: center">Thao Tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($topics as $topic)
            <tr>
                <td>{{ $topic->id }}</td>
                <td>{{ $topic->topic_name }}</td>
                <td>{{ $topic->scientist->profile_name }}</td>
                <td>{{ $topic->lvtopic->lvtopic_name }}</td>
                <td>{{ $topic->result }}</td>
                <td>{{ $topic->start_date }}</td>
                <td>{{ $topic->end_date }}</td>

                <td>




                    <div class="action">
                        <div>
                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                data-target="#editscouncilModal" data-topic-id="{{ $topic->id }}"
                                data-topic-name="{{ $topic->topic_name }}" data-profile-id="{{ $topic->profile_id }}"
                                data-result="{{ $topic->result }}" data-lvtopic-id="{{ $topic->lvtopic_id }}"
                                data-start-date="{{ $topic->start_date }}" data-end-date="{{ $topic->end_date }}">
                                <i class="fa fa-edit"></i>
                            </button>
                        </div>

                        <div>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmDeleteModal"
                                data-id="{{ $topic->id }}">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </div>




                </td>
            </tr>
        @endforeach
    </tbody>
</table>







<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-success">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="createModalLabel">Thêm mới</h4>


            </div>
            <div class="modal-body">
                <form id="createForm" action="{{ route('topic.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="topic_name">Tên đề tài/đề án</label>
                        <input type="text" class="form-control" id="topic_name" name="topic_name" required>
                    </div>

                    <div class="form-group">
                        <label for="profile_id">Cán bộ tham gia</label>
                        <select class="form-control" name="profile_id" required>
                            @foreach ($scientists as $scientist)
                                <option value="{{ $scientist->id }}">{{ $scientist->profile_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="role_id">Vai trò</label>
                        <select class="form-control" name="role_id" required>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="lvtopic_id">Cấp đề tài/đề án</label>
                        <select class="form-control" name="lvtopic_id" required>
                            @foreach ($lvtopics as $lvtopic)
                                <option value="{{ $lvtopic->id }}">{{ $lvtopic->lvtopic_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="result">Kết quả nghiệm thu</label>
                        <select name="result" id="result" class="form-control">
                            <option value="Khá">Khá</option>
                            <option value="Giỏi">Giỏi</option>
                            <option value="Xuất sắc">Xuất sắc</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="start_date">Ngày bắt đầu</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" required>
                    </div>

                    <div class="form-group">
                        <label for="end_date">Ngày kết thúc</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" required>
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




<!-- Modal -->
<div class="modal fade" id="editscouncilModal" tabindex="-1" aria-labelledby="editscouncilModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header btn-warning">
                <h4 class="modal-title" id="editscouncilModalLabel">Sửa Đề tài/Đề án</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" id="editscouncilForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="topic_name">Tên đề tài/đề án</label>
                        <input type="text" class="form-control" id="topic_name" name="topic_name" required>
                    </div>

                    <div class="form-group">
                        <label for="profile_id">Chủ nhiệm</label>
                        <select class="form-control" name="profile_id" id="profile_id" required>
                            @foreach ($scientists as $scientist)
                                <option value="{{ $scientist->id }}">{{ $scientist->profile_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="lvtopic_id">Cấp đề tài/đề án</label>
                        <select class="form-control" name="lvtopic_id" id="lvtopic_id" required>
                            @foreach ($lvtopics as $lvtopic)
                                <option value="{{ $lvtopic->id }}">{{ $lvtopic->lvtopic_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="result">Kết quả nghiệm thu</label>
                        <select name="result" id="" class="form-control">
                            <option value="Khá">Khá</option>
                            <option value="Giỏi">Giỏi</option>
                            <option value="Xuất sắc">Xuất sắc</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="start_date">Ngày bắt đầu</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" required>
                    </div>

                    <div class="form-group">
                        <label for="end_date">Ngày kết thúc</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" required>
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

<!-- Modal -->
<div class="modal fade" id="editscouncilModal" tabindex="-1" aria-labelledby="editscouncilModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header btn-warning">
                <h4 class="modal-title" id="editscouncilModalLabel">Sửa Đề tài/Đề án</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" id="editscouncilForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="topic_name">Tên đề tài/đề án</label>
                        <input type="text" class="form-control" id="topic_name" name="topic_name" required>
                    </div>

                    <div class="form-group">
                        <label for="profile_id">Chủ nhiệm</label>
                        <select class="form-control" name="profile_id" id="profile_id" required>
                            @foreach ($scientists as $scientist)
                                <option value="{{ $scientist->id }}">{{ $scientist->profile_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="lvtopic_id">Cấp đề tài/đề án</label>
                        <select class="form-control" name="lvtopic_id" id="lvtopic_id" required>
                            @foreach ($lvtopics as $lvtopic)
                                <option value="{{ $lvtopic->id }}">{{ $lvtopic->lvtopic_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="result">Kết quả nghiệm thu</label>
                        <select name="result" id="result" class="form-control">
                            <option value="Khá">Khá</option>
                            <option value="Giỏi">Giỏi</option>
                            <option value="Xuất sắc">Xuất sắc</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="start_date">Ngày bắt đầu</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" required>
                    </div>

                    <div class="form-group">
                        <label for="end_date">Ngày kết thúc</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" required>
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
            var topicId = button.data('topic-id'); // Extract info from data-* attributes
            var topicName = button.data('topic-name');
            var profileId = button.data('profile-id');
            var lvtopicId = button.data('lvtopic-id');
            var result = button.data('result');
            var startDate = button.data('start-date');
            var endDate = button.data('end-date');

            // Update the modal's content
            var modal = $(this);
            modal.find('.modal-body #topic_name').val(topicName);
            modal.find('.modal-body #profile_id').val(profileId);
            modal.find('.modal-body #lvtopic_id').val(lvtopicId);
            modal.find('.modal-body #result').val(result); // Correctly set the value for result
            modal.find('.modal-body #start_date').val(startDate);
            modal.find('.modal-body #end_date').val(endDate);

            // Update the form action
            var form = modal.find('#editscouncilForm');
            console.log('{{ url('admin/topic') }}/' + topicId);
            form.attr('action', '{{ url('admin/topic') }}/' + topicId); // Adjust the URL as needed
        });
    });
</script>



<!-- Confirm Delete Modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog"
    aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
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
            var url = '{{ route('topic.destroy', ':id') }}'; // Ensure the route name is correct
            url = url.replace(':id', id);

            var modal = $(this);
            modal.find('#deleteForm').attr('action', url);
        });
    });
</script>


@stop()
