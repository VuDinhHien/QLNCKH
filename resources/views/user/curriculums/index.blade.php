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
                                data-training-id="{{ $curriculum->training->id }}"
                                data-role-id="{{ $curriculum->pivot->role_id }}">
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
                <h4 class="modal-title" id="editModalLabel">Chỉnh sửa giáo trình/sách tham khảo</h4>
            </div>
            <div class="modal-body">
                <form id="editForm" action="{{ route('user.magazine.updateCurriculum', ['curriculum' => 0]) }}"
                    method="POST">
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
        // Handle edit button click to populate modal with data
        $('.edit-button').click(function() {
            var curriculumId = $(this).data('curriculum-id');
            var name = $(this).data('name');
            var year = $(this).data('year');
            var publisher = $(this).data('publisher');
            var bookId = $(this).data('book-id');
            var trainingId = $(this).data('training-id');
            var roleId = $(this).data('role-id');

            $('#edit_name').val(name);
            $('#edit_year').val(year);
            $('#edit_publisher').val(publisher);
            $('#edit_book_id').val(bookId);
            $('#edit_training_id').val(trainingId);
            $('#edit_role_id').val(roleId);

            var action = "{{ route('user.magazine.updateMagazine', ['magazine' => ':id']) }}";
            action = action.replace(':id', curriculumId);
            $('#editForm').attr('action', action);
        });

        $('#updateButton').click(function() {
            $('#editForm').submit();
        });
    });
</script>



@stop()
