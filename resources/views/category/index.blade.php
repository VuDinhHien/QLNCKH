@extends('master.admin')

@section('main')

<!-- @section('title', 'Dashboard') -->

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="fa-solid fa-house-chimney"></i> Trang
                chủ</a></li>

        <li class="breadcrumb-item active" aria-current="page">Hội đồng khoa học</li>
    </ol>
</nav>


<style>
    th {
        text-align: center
    }

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
            <th>Tên hạng mục</th>
            <th>Loại nghiên cứu</th>
            <th>Vai trò</th>
            <th>Trình độ đào tạo</th>
            <th>Số giờ nghiên cứu</th>
            <th>Thao Tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->category_name }}</td>
                <td>{{ $category->type }}</td>
                <td>{{ $category->role->role_name }}</td>
                <td>{{ $category->training->training_name }}</td>
                <td>{{ $category->research_number }}</td>


                <td>

                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                        data-target="#editscouncilModal" data-category-id="{{ $category->id }}"
                        data-category-name="{{ $category->category_name }}" data-type="{{ $category->type }}"
                        data-role-id="{{ $category->role_id }}" data-training-id="{{ $category->training_id }}"
                        data-research-number="{{ $category->research_number }}">
                        <i class="fa fa-edit"></i>
                    </button>

                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmDeleteModal"
                        data-id="{{ $category->id }}">
                        <i class="fa fa-trash"></i>
                    </button>




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
                <form id="createForm" action="{{ route('category.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="category_name">Tên hạng mục</label>
                        <input type="text" class="form-control" id="category_name" name="category_name" required>
                    </div>

                    <div class="form-group">
                        <label for="type">Loại nghiên cứu</label>
                        <input type="text" class="form-control" id="type" name="type">
                    </div>


                    <div class="form-group">
                        <label for="role_id">Vai trò</label>
                        <select class="form-control" name="role_id" required>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->role_name }}</option>
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
                        <label for="research_number">Số giờ nghiên cứu</label>
                        <input type="text" class="form-control" id="research_number" name="research_number">
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
                <h4 class="modal-title" id="editscouncilModalLabel">Sửa Hạng Mục</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" id="editscouncilForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="category_name">Tên hạng mục</label>
                        <input type="text" class="form-control" id="category_name" name="category_name" required>
                    </div>

                    <div class="form-group">
                        <label for="type">Loại nghiên cứu</label>
                        <input type="text" class="form-control" id="type" name="type">
                    </div>

                    <div class="form-group">
                        <label for="role_id">Vai trò</label>
                        <select class="form-control" id="role_id" name="role_id" required>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->role_name }}</option>
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

                    <div class="form-group">
                        <label for="research_number">Số giờ nghiên cứu</label>
                        <input type="text" class="form-control" id="research_number" name="research_number">
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
            var categoryId = button.data('category-id'); // Extract info from data-* attributes
            var categoryName = button.data('category-name');
            var type = button.data('type');
            var roleId = button.data('role-id');
            var trainingId = button.data('training-id');
            var researchNumber = button.data('research-number');

            // Update the modal's content
            var modal = $(this);
            modal.find('.modal-body #category_name').val(categoryName);
            modal.find('.modal-body #type').val(type);
            modal.find('.modal-body #role_id').val(roleId);
            modal.find('.modal-body #training_id').val(trainingId);
            modal.find('.modal-body #research_number').val(researchNumber);

            // kích hoạt sự kiện thay đổi và đảm bảo select đã chọn
            modal.find('.modal-body #role_id').val(roleId).change();
            modal.find('.modal-body #training_id').val(trainingId).change();

            // Update the form action
            var form = modal.find('#editscouncilForm');
            form.attr('action', '/admin/category/' + categoryId); // Adjust the URL as needed
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
                <h3>Bạn có chắc chắn muốn xóa Hạng mục này</h3>
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
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var url = '{{ route('category.destroy', ':id') }}';
            url = url.replace(':id', id);

            var modal = $(this);
            modal.find('#deleteForm').attr('action', url);
        });
    });
</script>





@stop()
