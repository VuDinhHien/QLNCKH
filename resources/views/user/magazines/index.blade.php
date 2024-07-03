@extends('master.user')

@section('main')

@section('title', 'Danh sách bài báo')



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

<h2 style="text-align:center; font-weight:bold">Danh sách bài báo của {{ $scientist->profile_name }}</h2>

<div class="text-right mb-3">
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createModal">Thêm mới</button>
</div>

<table class="table table-hover table-bordered mt-3" id="myTable">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên bài báo</th>
            <th>Năm công bố</th>
            <th>Tên tạp chí</th>
            <th>Loại bài báo</th>

            <th>Vai trò</th>

            <th>Thao tác</th>

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
                    @foreach ($magazine->scientists as $sci)
                        @if ($sci->id == $scientist->id)
                            {{ \App\Models\Role::find($sci->pivot->role_id)->role_name }}
                        @endif
                    @endforeach
                </td>

                <td>
                    @foreach ($magazine->scientists as $sci)
                        @if ($sci->id == $scientist->id)
                            <div style="display: flex">
                                <div style="margin-right: 5px">
                                    <button type="button" class="btn btn-warning btn-sm edit-button"
                                        data-toggle="modal" data-target="#editModal"
                                        data-magazine-id="{{ $magazine->id }}"
                                        data-magazine-name="{{ $magazine->magazine_name }}"
                                        data-year="{{ $magazine->year }}" data-journal="{{ $magazine->journal }}"
                                        data-paper-id="{{ $magazine->paper->id }}"
                                        data-files="{{ json_encode($magazine->files) }}"
                                        data-role-id="{{ $magazine->pivot->role_id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </div>
                                <div>

                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#deleteModal" data-magazine-id="{{ $magazine->id }}">
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
                <form id="createForm" action="{{ route('user.magazines.store') }}" method="POST"
                    enctype="multipart/form-data">
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
<!-- Modal edit-->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-warning">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="editModalLabel">Chỉnh sửa bài báo khoa học</h4>
            </div>
            <div class="modal-body">
                <form id="editForm" action="{{ route('user.magazine.updateMagazine', ['magazine' => 0]) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="edit_magazine_name">Tên bài báo</label>
                        <input type="text" class="form-control" id="edit_magazine_name" name="magazine_name"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="edit_year">Năm công bố</label>
                        <input type="text" class="form-control" id="edit_year" name="year" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_journal">Tên tạp chí</label>
                        <input type="text" class="form-control" id="edit_journal" name="journal" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_paper_id">Loại bài báo</label>
                        <select class="form-control" id="edit_paper_id" name="paper_id" required>
                            @foreach ($papers as $paper)
                                <option value="{{ $paper->id }}">{{ $paper->paper_name }}</option>
                            @endforeach
                        </select>
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
                <h4 class="modal-title" id="deleteModalLabel">Xóa Bài Báo</h4>
            </div>
            <div class="modal-body">
                <p>Bạn có chắc chắn muốn xóa bài báo này không?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                <form id="deleteForm" action="{{ route('user.magazines.destroy', ['magazine' => 0]) }}"
                    method="POST" style="display:inline;">
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


        // Khi bấm vào nút chỉnh sửa
        $('.edit-button').click(function() {
            var magazineId = $(this).data('magazine-id');
            var magazineName = $(this).data('magazine-name');
            var year = $(this).data('year');
            var journal = $(this).data('journal');
            var paperId = $(this).data('paper-id');
            var files = $(this).data('files'); // Mảng các tệp

            $('#edit_magazine_name').val(magazineName);
            $('#edit_year').val(year);
            $('#edit_journal').val(journal);
            $('#edit_paper_id').val(paperId);

            // Hiển thị các tệp hiện tại
            var filesHtml = '';
            files.forEach(function(file) {
                filesHtml += `
           <div>
            <p>${file.original_name}</p> <!-- Hiển thị tên tệp gốc -->
            <a href="/user/magazine/download/${file.id}" class="btn btn-info btn-sm">Tải</a>
            <button type="button" class="btn btn-danger btn-sm delete-file-button" data-file-id="${file.id}">Xóa</button>
           </div>`;
            });
            $('#current_files').html(filesHtml);

            var action = "{{ route('user.magazine.updateMagazine', ['magazine' => ':id']) }}";
            action = action.replace(':id', magazineId);
            $('#editForm').attr('action', action);
        });

        // Khi bấm nút cập nhật
        $('#updateButton').click(function() {
            $('#editForm').submit();
        });

        // Xử lý nút xóa tệp
        $(document).on('click', '.delete-file-button', function() {
            var fileId = $(this).data('file-id');
            var button = $(this);

            $.ajax({
                url: '/user/magazine/' + fileId,
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
            var topicId = $(this).data('magazine-id');
            var action = "{{ route('user.magazines.destroy', ['magazine' => ':id']) }}";
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
