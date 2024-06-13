@extends('master.admin')

@section('main')

<!-- @section('title', 'Dashboard') -->



<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="fa-solid fa-house-chimney"></i> Trang
                chủ</a></li>

        <li class="breadcrumb-item active" aria-current="page">Quản lý bài báo khoa học</li>
    </ol>
</nav>
<style>
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

<!-- Thông báo thành công -->
@if (session('success'))
    <div class="notification alert alert-success alert-dismissible">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif



<!-- Modal -->



<!-- Modal -->
<button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#createModal"
    style="margin-bottom: 10px; margin-left:10px"><i class="fa-solid fa-circle-plus"></i>
    Thêm mới
</button>

<a href="{{ route('magazines.export') }}" class="btn btn-success pull-right">
    <i class="fa fa-file-excel" style="margin-right: 5px;"></i> Xuất Excel
</a>

<table class="table table-hover table-bordered mt-3" id="myTable">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên bài báo</th>
            <th>Năm công bố</th>
            <th>Tên tạp chí</th>
            <th>Loại bài báo</th>
            <th>Cán bộ tham gia</th>

            <th>Thao Tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($magazines as $magazine)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $magazine->magazine_name }}</td>
                <td>{{ $magazine->year }}</td>
                <td>{{ $magazine->journal }}</td>
                <td>{{ $magazine->paper->paper_name }}</td>
                <td>
                    @foreach ($magazine->scientists as $scientist)
                        {{ $scientist->profile_name }}
                        ({{ \App\Models\Role::find($scientist->pivot->role_id)->role_name }})
                        @if (!$loop->last)
                            ;
                        @endif
                    @endforeach
                </td>
                <td>
                    <div class="action" style="display: flex">
                        <div>
                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                data-target="#editModal" data-magazine-id="{{ $magazine->id }}"
                                data-magazine-name="{{ $magazine->magazine_name }}" data-year="{{ $magazine->year }}"
                                data-journal="{{ $magazine->journal }}" data-paper-id="{{ $magazine->paper_id }}"
                                data-scientists='@json($magazine->scientists)'>
                                <i class="fa fa-edit"></i>
                            </button>
                        </div>
                        <div style="margin-left:10px">
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmDeleteModal"
                                data-id="{{ $magazine->id }}">
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
                <form id="createForm" action="{{ route('magazine.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="magazine_name">Tên bài báo</label>
                        <input type="text" class="form-control" id="magazine_name" name="magazine_name" required>
                    </div>
                    <div class="form-group">
                        <label for="year">Năm công bố</label>
                        <input type="number" class="form-control" id="year" name="year" required>
                    </div>
                    <div class="form-group">
                        <label for="journal">Tạp chí</label>
                        <input type="text" class="form-control" id="journal" name="journal" required>
                    </div>
                    <div class="form-group">
                        <label for="paper_id">Loại bài báo</label>
                        <select class="form-control" name="paper_id" required>
                            @foreach ($papers as $paper)
                                <option value="{{ $paper->id }}">{{ $paper->paper_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="profile_id">Cán bộ tham gia</label>
                        <div id="create-authors-container">
                            <div class="author-group">
                                <div class="form-group row">
                                    <div class="col-xs-5">
                                        <select class="form-control" name="scientists[0][id]" required>
                                            @foreach ($scientists as $scientist)
                                                <option value="{{ $scientist->id }}">{{ $scientist->profile_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-xs-5">
                                        <select class="form-control" name="scientists[0][role_id]" required>
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
            var action = '{{ route('magazine.destroy', ':id') }}';
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
                <form id="editForm" action="{{ route('magazine.update', ['magazine' => 0]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="edit_magazine_name">Tên bài báo</label>
                        <input type="text" class="form-control" id="edit_magazine_name" name="magazine_name"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="edit_year">Năm công bố</label>
                        <input type="number" class="form-control" id="edit_year" name="year" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_journal">Tạp chí</label>
                        <input type="text" class="form-control" id="edit_journal" name="journal" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_paper_id">Loại bài báo</label>
                        <select class="form-control" id="edit_paper_id" name="paper_id" required>
                            @foreach ($papers as $paper)
                                <option value="{{ $paper->id }}">{{ $paper->paper_name }}</option>
                            @endforeach
                        </select>
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
        $('#add-author, #add-edit-author').click(function() {
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
            if ($(this).attr('id') === 'add-author') {
                $('#authors-container').append(authorGroup);
            } else {
                $('#edit-authors-container').append(authorGroup);
            }
        });

        $(document).on('click', '.remove-author', function() {
            $(this).closest('.author-group').remove();
        });

        // Handle edit button click
        $('[data-target="#editModal"]').click(function() {
            var magazineId = $(this).data('magazine-id');
            var magazineName = $(this).data('magazine-name');
            var year = $(this).data('year');
            var journal = $(this).data('journal');
            var paperId = $(this).data('paper-id');
            var scientists = $(this).data('scientists');

            $('#edit_magazine_name').val(magazineName);
            $('#edit_year').val(year);
            $('#edit_journal').val(journal);
            $('#edit_paper_id').val(paperId);

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

            var action = "{{ route('magazine.update', ['magazine' => ':id']) }}";
            action = action.replace(':id', magazineId);
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
