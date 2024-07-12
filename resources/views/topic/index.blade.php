@extends('master.admin')

@section('main')

@section('title', 'Dashboard')


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


    .author-group {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .author-group select {
        margin-right: 10px;
    }

    .author-group .remove-author {
        margin-left: 10px;
    }
</style>

<!-- Modal -->

<!-- Thông báo thành công -->
@if (session('success'))
    <div class="notification alert alert-success alert-dismissible">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif




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
            <th>Tên đề tài/đề án</th>
            <th>Cấp đề tài/đề án</th>
            <th>Kết quả nghiệm thu</th>
            <th>Ngày bắt đầu</th>
            <th>Ngày kết thúc</th>
            <th>Cán bộ tham gia (Vai trò)</th>
            <th>Tệp đính kèm</th>
            <th>Thao Tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($topics as $topic)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $topic->topic_name }}</td>
                <td>{{ $topic->lvtopic->lvtopic_name }}</td>
                <td>{{ $topic->result }}</td>
                <td>{{ $topic->start_date }}</td>
                <td>{{ $topic->end_date }}</td>
                <td>
                    @foreach ($topic->scientists as $scientist)
                        {{ $scientist->profile_name }}
                        ({{ \App\Models\Role::find($scientist->pivot->role_id)->role_name }})
                        @if (!$loop->last)
                            ;
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($topic->files as $file)
                        <div>
                            <a href="{{ route('topic.download', $file->id) }}" class="btn btn-link" target="_blank">{{ $file->original_name }}</a>
                        </div>
                    @endforeach
                </td>
                <td>
                    <div class="action" style="display: flex">
                        <div>
                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                data-target="#editModal" data-topic-id="{{ $topic->id }}"
                                data-topic-name="{{ $topic->topic_name }}" data-lvtopic-id="{{ $topic->lvtopic_id }}"
                                data-result="{{ $topic->result }}" data-start-date="{{ $topic->start_date }}"
                                data-end-date="{{ $topic->end_date }}" data-scientists='@json($topic->scientists)'>
                                <i class="fa fa-edit"></i>
                            </button>
                        </div>
                        <div style="margin-left:10px">
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
                <form id="createForm" action="{{ route('topic.store') }}" method="POST">
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
                            <option>Chọn kết quả</option>
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
                        <label for="profile_id">Cán bộ tham gia</label>
                        <div id="create-authors-container">
                            <div class="author-group">
                                <div class="form-group row">
                                    <div class="col-xs-5">
                                        <select class="form-control" name="scientists[0][id]" required>
                                            <option value="">-Chọn nhà khoa học-</option>
                                            @foreach ($scientists as $scientist)
                                                <option value="{{ $scientist->id }}">{{ $scientist->profile_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-xs-5">
                                        <select class="form-control" name="scientists[0][role_id]" required>
                                            <option value="">-Chọn vai trò-</option>
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

        // Tự động ẩn thông báo sau 2 giây
        setTimeout(function() {
            $('.notification').fadeOut('slow');
        }, 2000); // 2000ms = 2s
    });
</script>

<!-- Modal xóa -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog"
    aria-labelledby="confirmDeleteModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-danger">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="confirmDeleteModalLabel">Xác nhận xóa</h4>
            </div>
            <div class="modal-body">
                Bạn có chắc chắn muốn xóa bài báo này không?
            </div>
            <div class="modal-footer">
                <form id="deleteForm" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </div>
        </div>
    </div>
</div>



<script>
    $(document).ready(function() {
        $('#add-author').click(function() {
            var authorGroup = `
                <div class="author-group">
                    <select class="form-control" name="scientists[${$('.author-group').length}][id]" required>
                        @foreach ($scientists as $scientist)
                            <option value="{{ $scientist->id }}">{{ $scientist->profile_name }}</option>
                        @endforeach
                    </select>
                    <select class="form-control" name="scientists[${$('.author-group').length}][role_id]" required>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                        @endforeach
                    </select>
                    <button type="button" class="btn btn-danger remove-author">Xóa</button>
                </div>
            `;
            $('#authors-container').append(authorGroup);
        });

        $(document).on('click', '.remove-author', function() {
            $(this).closest('.author-group').remove();
        });

        $('#saveButton').click(function() {
            $('#createForm').submit();
        });

        // Tự động ẩn thông báo sau 2 giây
        setTimeout(function() {
            $('.notification').fadeOut('slow');
        }, 2000); // 2000ms = 2s

        // Xử lý sự kiện click nút xóa
        $('#confirmDeleteModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Button đã click
            var id = button.data('id'); // Lấy id từ data-id
            var action = '{{ route('topic.destroy', ':id') }}';
            action = action.replace(':id', id);

            var modal = $(this);
            modal.find('#deleteForm').attr('action', action);
        });
    });
</script>

<!-- Modal edit-->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-warning">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="editModalLabel">Chỉnh sửa</h4>
            </div>
            <div class="modal-body">
                <form id="editForm" action="{{ route('topic.update', ['topic' => 0]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="edit_topic_name">Tên đề tài</label>
                        <input type="text" class="form-control" id="edit_topic_name" name="topic_name" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_lvtopic_id">Cấp đề tài/đề án</label>
                        <select class="form-control" id="edit_lvtopic_id" name="lvtopic_id" required>
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
                        <label for="edit_start_date">Ngày bắt đầu</label>
                        <input type="date" class="form-control" id="edit_start_date" name="start_date" required>
                    </div>

                    <div class="form-group">
                        <label for="edit_end_date">Ngày kết thúc</label>
                        <input type="date" class="form-control" id="edit_end_date" name="end_date" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_profile_id">Cán bộ tham gia</label>
                        <div id="edit-authors-container">
                            <!-- This will be populated dynamically with JavaScript -->
                        </div>
                        <button type="button" class="btn btn-primary" id="add-edit-author">Thêm tác giả</button>
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

<script>
    $(document).ready(function() {
        $('#add-edit-author').click(function() {
            var authorGroup = `
            <div class="author-group">
                <select class="form-control" name="scientists[${$('.author-group').length}][id]" required>
                    @foreach ($scientists as $scientist)
                        <option value="{{ $scientist->id }}">{{ $scientist->profile_name }}</option>
                    @endforeach
                </select>
                <select class="form-control" name="scientists[${$('.author-group').length}][role_id]" required>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                    @endforeach
                </select>
                <button type="button" class="btn btn-danger remove-author">Xóa</button>
            </div>
        `;
            $('#edit-authors-container').append(authorGroup);
        });

        $(document).on('click', '.remove-author', function() {
            $(this).closest('.author-group').remove();
        });

        // Handle edit button click
        $('[data-target="#editModal"]').click(function() {
            var topicId = $(this).data('topic-id');
            var topicName = $(this).data('topic-name');
            var lvtopicId = $(this).data('lvtopic-id');
            var result = $(this).data('result');
            var startDate = $(this).data('start-date');
            var endDate = $(this).data('end-date');
            var scientists = $(this).data('scientists');

            $('#edit_topic_name').val(topicName);
            $('#edit_lvtopic_id').val(lvtopicId);
            $('#result').val(result);
            $('#edit_start_date').val(startDate);
            $('#edit_end_date').val(endDate);

            $('#edit-authors-container').empty();
            scientists.forEach((scientist, index) => {
                var authorGroup = `
                <div class="author-group">
                    <select class="form-control" name="scientists[${index}][id]" required>
                        @foreach ($scientists as $s)
                            <option value="{{ $s->id }}" ${scientist.id == {{ $s->id }} ? 'selected' : ''}>
                                {{ $s->profile_name }}
                            </option>
                        @endforeach
                    </select>
                    <select class="form-control" name="scientists[${index}][role_id]" required>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" ${scientist.pivot.role_id == {{ $role->id }} ? 'selected' : ''}>
                                {{ $role->role_name }}
                            </option>
                        @endforeach
                    </select>
                    <button type="button" class="btn btn-danger remove-author">Xóa</button>
                </div>
            `;
                $('#edit-authors-container').append(authorGroup);
            });

            var action = "{{ route('topic.update', ['topic' => ':id']) }}";
            action = action.replace(':id', topicId);
            $('#editForm').attr('action', action);
        });

        $('#updateButton').click(function() {
            $('#editForm').submit();
        });
    });
</script>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>




@stop()
