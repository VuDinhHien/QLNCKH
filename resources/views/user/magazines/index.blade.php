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
                            <button type="button" class="btn btn-warning btn-sm edit-button" data-toggle="modal"
                                data-target="#editModal" data-magazine-id="{{ $magazine->id }}"
                                data-magazine-name="{{ $magazine->magazine_name }}" data-year="{{ $magazine->year }}"
                                data-journal="{{ $magazine->journal }}" data-paper-id="{{ $magazine->paper->id }}"
                                data-role-id="{{ $magazine->pivot->role_id }}">
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
                <h4 class="modal-title" id="editModalLabel">Chỉnh sửa bài báo khoa học</h4>
            </div>
            <div class="modal-body">
                <form id="editForm" action="{{ route('user.magazine.updateMagazine', ['magazine' => 0]) }}"
                    method="POST">
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
            var magazineId = $(this).data('magazine-id');
            var magazineName = $(this).data('magazine-name');
            var year = $(this).data('year');
            var journal = $(this).data('journal');
            var paperId = $(this).data('paper-id');
            var roleId = $(this).data('role-id');

            $('#edit_magazine_name').val(magazineName);
            $('#edit_year').val(year);
            $('#edit_journal').val(journal);
            $('#edit_paper_id').val(paperId);
            $('#edit_role_id').val(roleId);

            var action = "{{ route('user.magazine.updateMagazine', ['magazine' => ':id']) }}";
            action = action.replace(':id', magazineId);
            $('#editForm').attr('action', action);
        });

        $('#updateButton').click(function() {
            $('#editForm').submit();
        });
    });
</script>


@stop()
