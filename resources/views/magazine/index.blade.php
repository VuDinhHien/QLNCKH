@extends('master.admin')

@section('main')

<!-- @section('title', 'Dashboard') -->

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="fa-solid fa-house-chimney"></i> Trang chủ</a></li>

        <li class="breadcrumb-item active" aria-current="page">Quản lý bài báo khoa học</li>
    </ol>
</nav>





<!-- Modal -->


<button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#createModal" style="margin-bottom: 10px;">
    Thêm mới
</button>

<table class="table table-hover table-bordered mt-3">
    <thead>
        <tr>
            <th>STT</th>
            <th style="width:400px; text-align: center">Tên bài báo</th>
            <th style="text-align: center">Năm công bố</th>
            <th style="width:300px;text-align: center">Tên tạp chí</th>
            <th style="width:300px;text-align: center">Loại bài báo</th>
            <th style="text-align: center">Thao Tác</th>
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
                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editTopicModal" data-topic-id="{{ $magazine->id }}" data-magazine-name="{{ $magazine->magazine_name }}" data-year="{{ $magazine->year }}" data-journal="{{ $magazine->journal }}" data-paper-id="{{ $magazine->paper_id }}">
                    <i class="fa fa-edit"></i>
                </button>

                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmDeleteModal" data-id="{{ $magazine->id }}">
                    <i class="fa fa-trash"></i>
                </button>


            </td>
        </tr>
        @endforeach
    </tbody>
</table>





<!-- Liên kết phân trang -->
<div class="text-right">
    {{ $magazines->links() }}
</div>

<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-success">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" id="saveButton">Lưu</button>
            </div>
        </div>
    </div>
</div>


<!-- The Modal -->
<div class="modal fade" id="editTopicModal" tabindex="-1" aria-labelledby="editTopicModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header btn-warning">
                <h4 class="modal-title" id="editTopicModalLabel">Sửa Đề tài/đề án</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('magazine.update', ['magazine' => $magazine->id]) }}" method="POST" id="editmagazineForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
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
                        <select class="form-control" name="paper_id" id="paper_id" required>
                            @foreach ($papers as $paper)
                            <option value="{{ $paper->id }}">{{ $paper->paper_name }}</option>
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




<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<script>
    document.getElementById('saveButton').addEventListener('click', function() {
        document.getElementById('createForm').submit();
    });



    $(document).ready(function() {
        $('#editTopicModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var magazineId = button.data('magazine-id'); // Extract info from data-* attributes
            var paperName = button.data('paper-name');
            var year = button.data('year');
            var journal = button.data('journal');
            var paperId = button.data('paper-id');

            // Update the modal's content
            var modal = $(this);
            modal.find('.modal-body #paper_name').val(paperName);
            modal.find('.modal-body #year').val(year);
            modal.find('.modal-body #journal').val(journal);
            modal.find('.modal-body #paper_id').val(paperId);

          
            // modal.find('form').attr('action', `/magazine/${magazineId}`);
        });
    });


</script>


<!-- Confirm Delete Modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-danger">
                <h3 class="modal-title" id="confirmDeleteModalLabel">Xác nhận xóa</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3>Bạn có chắc chắn muốn xóa tạp chí này</h3>
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
            var url = '{{ route("magazine.destroy", ":id") }}'; // Ensure the route name is correct
            url = url.replace(':id', id);

            var modal = $(this);
            modal.find('#deleteForm').attr('action', url);
        });
    });
</script>

@stop()