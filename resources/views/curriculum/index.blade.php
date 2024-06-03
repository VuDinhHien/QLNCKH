@extends('master.admin')

@section('main')

<!-- @section('title', 'Dashboard') -->


<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="fa-solid fa-house-chimney"></i> Trang
                chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page"> Quản lý giáo trình/Sách tham khảo</li>
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
    style="margin-bottom: 10px;">
    Thêm mới
</button>

<table class="table table-hover table-bordered mt-3" id="myTable">
    <thead>
        <tr>
            <th>STT</th>
            <th style="width:200px; text-align: center">Tên sách tham khảo</th>
            <th style="text-align: center">Năm XB</th>
            <th style="text-align: center">Nhà XB</th>
            <th style="text-align: center">Cán bộ tham gia</th>
            <th style="text-align: center">Loại sách</th>
            <th style="text-align: center">Trình độ đào tạo</th>

            <th style="text-align: center">Thao Tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($curriculums as $curriculum)
            <tr>
                <td>{{ $curriculum->id }}</td>
                <td>{{ $curriculum->name }}</td>
                <td>{{ $curriculum->year }}</td>
                <td>{{ $curriculum->publisher }}</td>
                <td>{{ $curriculum->scientist->profile_name }}</td>
                <td>{{ $curriculum->book->book_name }}</td>
                <td>{{ $curriculum->training->training_name }}</td>



                <td>




                    <div class="action">
                        <div>
                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                data-target="#editscouncilModal" data-curriculum-id="{{ $curriculum->id }}"
                                data-name="{{ $curriculum->name }}" data-year="{{ $curriculum->year }}"
                                data-publisher="{{ $curriculum->publisher }}"
                                data-profile-id="{{ $curriculum->profile_id }}"
                                data-book-id="{{ $curriculum->book_id }}"
                                data-training-id="{{ $curriculum->training_id }}">
                                <i class="fa fa-edit"></i>
                            </button>
                        </div>

                        <div>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmDeleteModal"
                                data-id="{{ $curriculum->id }}">
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
                <form id="createForm" action="{{ route('curriculum.store') }}" method="POST">
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
                        <label for="profile_id">Cán bộ tham gia</label>
                        <select class="form-control" name="profile_id" required>
                            @foreach ($scientists as $scientist)
                                <option value="{{ $scientist->id }}">{{ $scientist->profile_name }}</option>
                            @endforeach
                        </select>
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



<!-- The Modal -->
<div class="modal fade" id="editscouncilModal" tabindex="-1" aria-labelledby="editscouncilModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header btn-warning">
                <h4 class="modal-title" id="editscouncilModalLabel">Sửa Hội thảo/hội nghị</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" id="editscouncilForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
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
                        <label for="profile_id">Cán bộ tham gia</label>
                        <select class="form-control" id="profile_id" name="profile_id" required>
                            @foreach ($scientists as $scientist)
                                <option value="{{ $scientist->id }}">{{ $scientist->profile_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="book_id">Loại sách</label>
                        <select class="form-control" id="book_id" name="book_id" required>
                            @foreach ($books as $book)
                                <option value="{{ $book->id }}">{{ $book->book_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="training_id">Trình độ đào tạo</label>
                        <select class="form-control" id="training_id" name="training_id" required>
                            @foreach ($trainings as $training)
                                <option value="{{ $training->id }}">{{ $training->training_name }}</option>
                            @endforeach
                        </select>
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
            var curriculumId = button.data('curriculum-id'); // Extract info from data-* attributes
            var name = button.data('name');
            var year = button.data('year');
            var publisher = button.data('publisher');
            var profileId = button.data('profile-id');
            var bookId = button.data('book-id');
            var trainingId = button.data('training-id');

            // Update the modal's content
            var modal = $(this);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #year').val(year);
            modal.find('.modal-body #publisher').val(publisher);
            modal.find('.modal-body #profile_id').val(profileId);
            modal.find('.modal-body #book_id').val(bookId);
            modal.find('.modal-body #training_id').val(trainingId);

            // Update the form action
            var form = modal.find('#editscouncilForm');
            form.attr('action', '{{ url('admin/curriculum/') }}/' + curriculumId); // Adjust the URL as needed
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
                <h3>Bạn có chắc chắn muốn xóa giáo trình/sách tham khảo này</h3>
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
            var url = '{{ route('curriculum.destroy', ':id') }}'; // Ensure the route name is correct
            url = url.replace(':id', id);

            var modal = $(this);
            modal.find('#deleteForm').attr('action', url);
        });
    });
</script>


@stop()
