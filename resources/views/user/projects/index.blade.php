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

<div class="text-right mb-3">
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createModal">Thêm mới</button>
</div>

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
        @foreach ($topics as $topic)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $topic->topic_name }}</td>
                <td>{{ $topic->lvtopic->lvtopic_name }}</td>
                <td>{{ $topic->result }}</td>
                <td>
                    @foreach ($topic->scientists as $sci)
                        @if ($sci->id == $scientist->id)
                            {{ \App\Models\Role::find($sci->pivot->role_id)->role_name }}
                        @endif
                    @endforeach
                </td>
                <td>{{ $topic->start_date }}</td>
                <td>{{ $topic->end_date }}</td>
                <td>
                    @foreach ($topic->scientists as $sci)
                        @if ($sci->id == $scientist->id)
                            <div style="display: flex">
                                <div style="margin-right: 5px">
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                        data-target="#editModal" data-topic-id="{{ $topic->id }}"
                                        data-topic-name="{{ $topic->topic_name }}"
                                        data-lvtopic-id="{{ $topic->lvtopic_id }}" data-result="{{ $topic->result }}"
                                        data-start-date="{{ $topic->start_date }}"
                                        data-end-date="{{ $topic->end_date }}" data-file="{{ $topic->file }}"
                                        data-role-id="{{ $sci->pivot->role_id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#deleteModal" data-topic-id="{{ $topic->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Modal create-->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-success">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="createModalLabel">Thêm mới</h4>
            </div>
            <div class="modal-body">
                <form id="createForm" action="{{ route('user.projects.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="topic_name">Tên đề tài</label>
                        <input type="text" class="form-control" id="topic_name" name="topic_name" required>
                    </div>
                    <div class="form-group">
                        <label for="lvtopic_id">Cấp đề tài/đề án</label>
                        <select class="form-control" name="lvtopic_id" required>
                            @foreach ($lvtopics as $lvtopic)
                                <option value="{{ $lvtopic->id }}">{{ $lvtopic->lvtopic_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Hộp Chọn -->
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

                    <div class="form-group">
                        <label for="file">Tải tài liệu</label>
                        <input type="file" class="form-control" id="file" name="file">
                    </div>

                    <div class="form-group">
                        <label for="profile_id">Cán bộ tham gia</label>
                        <div id="create-authors-container">
                            <div class="author-group">
                                <div class="form-group row">
                                    <div class="col-xs-5">
                                        <select class="form-control" name="scientists[0][id]" required>
                                            <option value="">---Chọn nhà khoa học---</option>
                                            @foreach ($scientists as $scientist)
                                                <option value="{{ $scientist->id }}">{{ $scientist->profile_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-xs-5">
                                        <select class="form-control" name="scientists[0][role_id]" required>
                                            <option value="">---Chọn vai trò---</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-xs-2">
                                        <button type="button" class="btn btn-danger remove-author">Xóa</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" id="create-add-author">Thêm tác giả</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" id="createSaveButton">Lưu</button>
            </div>
        </div>
    </div>
</div>



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
                <form id="editForm" action="{{ route('user.topic.update', ['topic' => 0]) }}" method="POST" enctype="multipart/form-data">
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

                    <div class="form-group">
                        <label for="edit_file">Tệp tài liệu</label>
                        <input type="file" class="form-control" id="edit_file" name="file">
                        <p id="current_file"></p>
                        <a href="#" id="download_file" target="_blank" style="display: none;">Tải tệp hiện
                            tại</a>
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


<!-- Modal delete-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-danger">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="deleteModalLabel">Xóa đề tài</h4>
            </div>
            <div class="modal-body">
                <p>Bạn có chắc chắn muốn xóa đề tài này không?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                <form id="deleteForm" action="{{ route('user.projects.destroy', ['topic' => 0]) }}" method="POST"
                    style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
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
        var createAuthorCount = 1; // Biến đếm số lượng tác giả đã thêm

        $('#create-add-author').click(function() {
            var authorGroup = `
                <div class="author-group">
                    <div class="form-group row">
                        <div class="col-xs-5">
                            <select class="form-control" name="scientists[${createAuthorCount}][id]" required>
                                @foreach ($scientists as $scientist)
                                    <option value="{{ $scientist->id }}">{{ $scientist->profile_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-5">
                            <select class="form-control" name="scientists[${createAuthorCount}][role_id]" required>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-2">
                            <button type="button" class="btn btn-danger remove-author">Xóa</button>
                        </div>
                    </div>
                </div>
            `;
            $('#create-authors-container').append(authorGroup);

            createAuthorCount++; // Tăng biến đếm lên 1 sau khi thêm tác giả
        });

        $(document).on('click', '.remove-author', function() {
            $(this).closest('.author-group').remove();
        });

        $('#createSaveButton').click(function() {
            $('#createForm').submit();
        });

        $('[data-target="#editModal"]').click(function() {
            var topicId = $(this).data('topic-id');
            var topicName = $(this).data('topic-name');
            var lvtopicId = $(this).data('lvtopic-id');
            var result = $(this).data('result');
            var startDate = $(this).data('start-date');
            var endDate = $(this).data('end-date');
            var roleId = $(this).data('role-id');
            var file = $(this).data('file'); // Lấy đường dẫn file từ data-file

            console.log("File path: " + file); // Kiểm tra xem có lấy được đường dẫn file chưa

            $('#edit_topic_name').val(topicName);
            $('#edit_lvtopic_id').val(lvtopicId);
            $('#result').val(result);
            $('#edit_start_date').val(startDate);
            $('#edit_end_date').val(endDate);
            $('#edit_role_id').val(roleId);

            if (file) {
                $('#current_file').text("Tệp hiện tại: " + file);
                $('#download_file').attr('href', 'storage/uploads/topics/' + file).show();
            } else {
                $('#current_file').text("Không có tệp");
                $('#download_file').hide();
            }

            var action = "{{ route('user.topic.update', ['topic' => ':id']) }}";
            action = action.replace(':id', topicId);
            $('#editForm').attr('action', action);
        });

        $('#updateButton').click(function() {
            $('#editForm').submit();
        });

        $('[data-target="#deleteModal"]').click(function() {
            var topicId = $(this).data('topic-id');
            var action = "{{ route('user.projects.destroy', ['topic' => ':id']) }}";
            action = action.replace(':id', topicId);
            $('#deleteForm').attr('action', action);
        });

        // Tự động ẩn thông báo sau 2 giây
        setTimeout(function() {
            $('.notification').fadeOut('slow');
        }, 2000); // 2000ms = 2s
    });
</script>

@stop()
