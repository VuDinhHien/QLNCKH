@extends('master.user')

@section('main')

@section('title', 'Danh sách giáo trình/sách tham khảo')



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

<h2 style="text-align:center; font-weight:bold">Danh sách giáo trình/sách tham khảo của {{ $scientist->profile_name }}
</h2>

<div class="text-right mb-3">
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createModal">Thêm mới</button>
</div>

<table class="table table-hover table-bordered mt-3" id="myTable">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên sách tham khảo</th>
            <th>Năm XB</th>
            <th>Nhà XB</th>

            <th>Loại sách</th>
            <th>Trình độ đào tạo</th>
            <th>Vai trò</th>
            <th>Thao tác</th>



        </tr>
    </thead>
    <tbody>
        @foreach ($curriculums as $curriculum)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $curriculum->name }}</td>
                <td>{{ $curriculum->year }}</td>
                <td>{{ $curriculum->publisher }}</td>

                <td>{{ $curriculum->book->book_name }}</td>
                <td>{{ $curriculum->training->training_name }}</td>
                <td>
                    @foreach ($curriculum->scientists as $sci)
                        @if ($sci->id == $scientist->id)
                            {{ \App\Models\Role::find($sci->pivot->role_id)->role_name }}
                        @endif
                    @endforeach
                </td>

                <td>
                    @foreach ($curriculum->scientists as $sci)
                        @if ($sci->id == $scientist->id)
                            <button type="button" class="btn btn-warning btn-sm edit-button" data-toggle="modal"
                                data-target="#editModal" data-curriculum-id="{{ $curriculum->id }}"
                                data-name="{{ $curriculum->name }}" data-year="{{ $curriculum->year }}"
                                data-publisher="{{ $curriculum->publisher }}"
                                data-book-id="{{ $curriculum->book->id }}"
                                data-training-id="{{ $curriculum->training->id }}" data-files="{{ json_encode($curriculum->files) }}"
                                data-role-id="{{ $curriculum->pivot->role_id }}">
                                <i class="fas fa-edit"></i>
                            </button>

                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                data-target="#deleteModal" data-curriculum-id="{{ $curriculum->id }}">
                                <i class="fas fa-trash"></i>
                            </button>
                        @endif
                    @endforeach
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
                <form id="createForm" action="{{ route('user.curriculums.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Tên sách tham khảo/ giáo trình</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="year">Năm XB</label>
                        <input type="text" class="form-control" id="year" name="year" required>
                    </div>
                    <div class="form-group">
                        <label for="publisher">Nhà XB</label>
                        <input type="text" class="form-control" id="publisher" name="publisher" required>
                    </div>

                    <div class="form-group">
                        <label for="book_id">Loại sách</label>
                        <select class="form-control" name="book_id" required>
                            @foreach ($books as $book)
                                <option value="{{ $book->id }}">{{ $book->book_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="training_id">Trình độ đào tạo</label>
                        <select class="form-control" name="training_id" required>
                            @foreach ($trainings as $training)
                                <option value="{{ $training->id }}">{{ $training->training_name }}</option>
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
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-warning">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="editModalLabel">Chỉnh sửa giáo trình/sách tham khảo</h4>
            </div>
            <div class="modal-body">
                <form id="editForm" action="{{ route('user.curriculum.updateCurriculum', ['curriculum' => 0]) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="edit_name">Tên sách tham khảo/ giáo trình</label>
                        <input type="text" class="form-control" id="edit_name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_year">Năm XB</label>
                        <input type="text" class="form-control" id="edit_year" name="year" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_publisher">Nhà XB</label>
                        <input type="text" class="form-control" id="edit_publisher" name="publisher" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_book_id">Loại sách</label>
                        <select class="form-control" id="edit_book_id" name="book_id" required>
                            @foreach ($books as $book)
                                <option value="{{ $book->id }}">{{ $book->book_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="edit_training_id">Trình độ đào tạo</label>
                        <select class="form-control" id="edit_training_id" name="training_id" required>
                            @foreach ($trainings as $training)
                                <option value="{{ $training->id }}">{{ $training->training_name }}</option>
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


<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-danger">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="deleteModalLabel">Xóa giáo trình/ sách tham khảo</h4>
            </div>
            <div class="modal-body">
                <p>Bạn có chắc chắn muốn xóa giáo trình/ sách tham khảo này không?</p>
            </div>
            <div class="modal-footer">
               
                <form id="deleteForm" action="{{ route('user.curriculums.destroy', ['curriculum' => 0]) }}"
                    method="POST">
                    @csrf
                    @method('DELETE')
                    
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
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

        // Handle edit button click to populate modal with data
        $('.edit-button').click(function() {
            var curriculumId = $(this).data('curriculum-id');
            var name = $(this).data('name');
            var year = $(this).data('year');
            var publisher = $(this).data('publisher');
            var bookId = $(this).data('book-id');
            var trainingId = $(this).data('training-id');
            var roleId = $(this).data('role-id');
            var files = $(this).data('files'); // Mảng các tệp

           

            $('#edit_name').val(name);
            $('#edit_year').val(year);
            $('#edit_publisher').val(publisher);
            $('#edit_book_id').val(bookId);
            $('#edit_training_id').val(trainingId);
            $('#edit_role_id').val(roleId);

            // Hiển thị các tệp hiện tại
            var filesHtml = '';
            files.forEach(function(file) {
                filesHtml += `
           <div>
            <p>${file.original_name}</p> <!-- Hiển thị tên tệp gốc -->
            <a href="/user/curriculum/download/${file.id}" class="btn btn-info btn-sm">Tải</a>
            <button type="button" class="btn btn-danger btn-sm delete-file-button" data-file-id="${file.id}">Xóa</button>
           </div>`;
            });
            $('#current_files').html(filesHtml);

            var action = "{{ route('user.curriculum.updateCurriculum', ['curriculum' => ':id']) }}";
            action = action.replace(':id', curriculumId);
            $('#editForm').attr('action', action);
        });

        $('#updateButton').click(function() {
            $('#editForm').submit();
        });

        $('[data-target="#deleteModal"]').click(function() {
            var curriculumId = $(this).data('curriculum-id');
            var action = "{{ route('user.curriculums.destroy', ['curriculum' => ':id']) }}";
            action = action.replace(':id', curriculumId);
            $('#deleteForm').attr('action', action);
        });

        // Xử lý nút xóa tệp
        $(document).on('click', '.delete-file-button', function() {
            var fileId = $(this).data('file-id');
            var button = $(this);

            $.ajax({
                url: '/user/curriculum/' + fileId,
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

        // Tự động ẩn thông báo sau 2 giây
        setTimeout(function() {
            $('.notification').fadeOut('slow');
        }, 2000); // 2000ms = 2s
    });
</script>



@stop()
