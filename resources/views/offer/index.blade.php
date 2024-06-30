@extends('master.admin')

@section('main')

<!-- @section('title', 'Dashboard') -->

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="fa-solid fa-house-chimney"></i> Trang
                chủ</a></li>

        <li class="breadcrumb-item active" aria-current="page">Đề xuất</li>
    </ol>
</nav>


<!-- Thông báo thành công -->
@if (session('success'))
    <div class="notification alert alert-success alert-dismissible">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif


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


<button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#createModal"
    style="margin-bottom: 10px; margin-left:10px"><i class="fa-solid fa-circle-plus"></i>
    Thêm mới
</button>

<table class="table table-hover table-bordered mt-3" id="myTable">
    <thead>
        <tr>
            <th>Tên đề xuất</th>
            <th>Năm</th>

            <th>Loại đề xuất</th>

            <th>Ghi chú</th>
            <th>Trạng thái</th>
            <th>Cán bộ tham gia</th>
            <th>Thao Tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($offers as $offer)
            <tr>
                <td>{{ $offer->offer_name }}</td>
                <td>{{ $offer->year }}</td>

                <td>{{ $offer->propose->propose_name }}</td>

                <td>{{ $offer->note }}</td>
                <td>{{ $offer->status }}</td>
                <td>
                    @foreach ($offer->scientists as $scientist)
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
                                data-target="#editModal" data-offer-id="{{ $offer->id }}"
                                data-offer-name="{{ $offer->offer_name }}" data-year="{{ $offer->year }}"
                                data-note="{{ $offer->note }}" data-propose-id="{{ $offer->propose_id }}"
                                data-scientists='@json($offer->scientists)'>
                                <i class="fa fa-edit"></i>
                            </button>
                        </div>
                        <div style="margin-left:10px">
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmDeleteModal"
                                data-id="{{ $offer->id }}">
                                <i class="fa fa-trash"></i>
                            </button>

                        </div>
                        
                    </div>
                </td>


            </tr>
        @endforeach
    </tbody>
</table>


<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-success">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="createModalLabel">Thêm mới</h4>
            </div>
            <div class="modal-body">
                <form id="createForm" action="{{ route('offer.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="offer_name">Tên đề xuất</label>
                        <input type="text" class="form-control" id="offer_name" name="offer_name" required>
                    </div>
                    <div class="form-group">
                        <label for="year">Năm </label>
                        <input type="text" class="form-control" id="year" name="year" required>
                    </div>
                    <div class="form-group">
                        <label for="note">Ghi chú</label>
                        <input type="text" class="form-control" id="note" name="note">
                    </div>

                    <div class="form-group">
                        <label for="propose_id">Loại đề xuất</label>
                        <select class="form-control" name="propose_id" required>
                            @foreach ($proposes as $propose)
                                <option value="{{ $propose->id }}">{{ $propose->propose_name }}</option>
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
                                                <option value="{{ $scientist->id }}">{{ $scientist->profile_name }}
                                                </option>
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
                Bạn có chắc chắn muốn xóa đề xuất này không?
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
            var action = '{{ route('offer.destroy', ':id') }}';
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
                <form id="editForm" action="{{ route('offer.update', ['offer' => 0]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="offer_name">Tên đề xuất</label>
                        <input type="text" class="form-control" id="edit_offer_name" name="offer_name" required>
                    </div>
                    <div class="form-group">
                        <label for="year">Năm </label>
                        <input type="text" class="form-control" id="edit_year" name="year" required>
                    </div>
                    <div class="form-group">
                        <label for="note">Ghi chú</label>
                        <input type="text" class="form-control" id="edit_note" name="note">
                    </div>

                    <div class="form-group">
                        <label for="propose_id">Loại đề xuất</label>
                        <select class="form-control" name="propose_id" id="edit_propose_id" required>
                            @foreach ($proposes as $propose)
                                <option value="{{ $propose->id }}">{{ $propose->propose_name }}</option>
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
    // Thêm sự kiện click cho nút mở modal
    $('[data-target="#editModal"]').click(function() {
        var button = $(this);
        var offerId = button.data('offer-id');
        var offerName = button.data('offer-name');
        var year = button.data('year');
        var note = button.data('note');
        var proposeId = button.data('propose-id');
        var scientists = button.data('scientists');

        // Kiểm tra giá trị scientists
        console.log(scientists);

        // Cập nhật giá trị vào form
        $('#edit_offer_name').val(offerName);
        $('#edit_year').val(year);
        $('#edit_note').val(note);
        $('#edit_propose_id').val(proposeId);

        // Clear previous authors
        $('#edit-authors-container').empty();

        // Populate authors
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

        // Cập nhật action của form
        var action = "{{ route('offer.update', ['offer' => ':id']) }}";
        action = action.replace(':id', offerId);
        $('#editForm').attr('action', action);
    });

    // Thêm sự kiện click cho nút cập nhật
    $('#updateButton').click(function() {
        $('#editForm').submit();
    });

    // Thêm sự kiện click cho nút thêm tác giả
    $('#add-edit-author').click(function() {
        var index = $('.author-group').length;
        var authorGroup = `
            <div class="author-group">
                <select class="form-control" name="scientists[${index}][id]" required>
                    @foreach ($scientists as $scientist)
                        <option value="{{ $scientist->id }}">{{ $scientist->profile_name }}</option>
                    @endforeach
                </select>
                <select class="form-control" name="scientists[${index}][role_id]" required>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                    @endforeach
                </select>
                <button type="button" class="btn btn-danger remove-author">Xóa</button>
            </div>
        `;
        $('#edit-authors-container').append(authorGroup);
    });

    // Thêm sự kiện click cho nút xóa tác giả
    $(document).on('click', '.remove-author', function() {
        $(this).closest('.author-group').remove();
    });
});

</script>


<script>
   $(document).ready(function() {
    $('.approve-offer').click(function() {
        var offerId = $(this).data('offer-id');

        $.ajax({
            url: '/offer/approve/' + offerId,
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    window.location.href = '/topics';
                } else {
                    alert('Có lỗi xảy ra. Vui lòng thử lại.');
                }
            },
            error: function() {
                alert('Có lỗi xảy ra. Vui lòng thử lại.');
            }
        });
    });
});
</script>




@stop()
