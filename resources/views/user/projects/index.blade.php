@extends('master.user')

@section('main')

@section('title', 'Danh sách đề tài')

@if (Session::has('success'))
    <div class="alert alert-success notification" id="success-alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ Session::get('success') }}
    </div>
@endif

<style>
    .d-flex {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .mr-2 {
        margin-right: 0.5rem;
    }

    .mb-2 {
        margin-bottom: 0.5rem;
    }

    .mb-0 {
        margin-bottom: 0;
    }

    .ml-auto {
        margin-left: auto;
    }
</style>
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
                                        data-end-date="{{ $topic->end_date }}"  data-files="{{ json_encode($topic->files) }}"
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
                            <option value="Chưa nghiệm thu">Chưa nghiệm thu</option>
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
                        <label for="edit_files">Tệp tài liệu</label>
                        <input type="file" class="form-control" id="edit_files" name="files[]" multiple>
                        <div id="current_files"></div>
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
            var files = $(this).data('files'); // Mảng các tệp


            $('#edit_topic_name').val(topicName);
            $('#edit_lvtopic_id').val(lvtopicId);
            $('#result').val(result);
            $('#edit_start_date').val(startDate);
            $('#edit_end_date').val(endDate);
            $('#edit_role_id').val(roleId);

            // Hiển thị các tệp hiện tại
            var filesHtml = '';
            files.forEach(function(file) {
                filesHtml += `
          <div class="d-flex align-items-center mb-2">
            <p class="mb-0 mr-2">${file.original_name}</p>
            <div class="ml-auto">
                <a href="/user/topic/download/${file.id}" class="btn btn-info btn-sm mr-2">Tải</a>
                <button type="button" class="btn btn-danger btn-sm delete-file-button" data-file-id="${file.id}">Xóa</button>
            </div>
        </div>`;
            });
            $('#current_files').html(filesHtml);

            var action = "{{ route('user.topic.update', ['topic' => ':id']) }}";
            action = action.replace(':id', topicId);
            $('#editForm').attr('action', action);
        });

        $('#updateButton').click(function() {
            $('#editForm').submit();
        });

        // Xử lý nút xóa tệp
        $(document).on('click', '.delete-file-button', function() {
            var fileId = $(this).data('file-id');
            var button = $(this);

            $.ajax({
                url: '/user/topic/' + fileId,
                type: 'DELETE',
                data: {
                    _token: $('meta[name="csrf-token"]').attr(
                        'content') // Lấy token CSRF từ meta tag
                },
                success: function(response) {
                    if (response.success) {
                        button.closest('div').remove();
                    } else {
                        alert('Xóa tệp thất bại');
                    }
                }
            });
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
