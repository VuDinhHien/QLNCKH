@extends('master.user')

@section('main')

@section('title', 'Danh sách đề xuất')



<!-- Thông báo thành công -->
@if (session('success'))
    <div class="notification alert alert-success alert-dismissible">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif


<h2 style="text-align:center; font-weight:bold">Danh sách đề xuất của {{ $scientist->profile_name }}</h2>
<div class="text-right mb-3">
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createModal">Thêm mới</button>
</div>

<table class="table table-hover table-bordered mt-3" id="myTable">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên đề xuất</th>
            <th>Năm</th>

            <th>Loại đề xuất</th>

            <th>Ghi chú</th>
            <th>Trạng thái</th>
            <th>Vai trò của bạn</th>
            <th>Thao Tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($offers as $offer)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $offer->offer_name }}</td>
                <td>{{ $offer->year }}</td>

                <td>{{ $offer->propose->propose_name }}</td>

                <td>{{ $offer->note }}</td>
                <td>{{ $offer->status }}</td>
                <td>
                    @foreach ($offer->scientists as $sci)
                        @if ($sci->id == $scientist->id)
                            {{ \App\Models\Role::find($sci->pivot->role_id)->role_name }}
                        @endif
                    @endforeach
                </td>

                <td>
                    @foreach ($offer->scientists as $sci)
                        @if ($sci->id == $scientist->id)
                            <button type="button" class="btn btn-warning btn-sm edit-button" data-toggle="modal"
                                data-target="#editModal" data-offer-id="{{ $offer->id }}"
                                data-offer-name="{{ $offer->offer_name }}" data-year="{{ $offer->year }}"
                                data-note="{{ $offer->note }}" data-propose-id="{{ $offer->propose->id }}"
                                data-role-id="{{ $offer->scientists->first()->pivot->role_id }}">
                                <i class="fas fa-edit"></i>
                            </button>

                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                data-target="#deleteModal" data-offer-id="{{ $offer->id }}">
                                <i class="fas fa-trash"></i>
                            </button>
                        @endif
                    @endforeach
                </td>



            </tr>
        @endforeach
    </tbody>
</table>



{{-- modal CREATE --}}
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-success">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="createModalLabel">Thêm mới</h4>
            </div>
            <div class="modal-body">
                <form id="createForm" action="{{ route('user.offers.store') }}" method="POST"
                    enctype="multipart/form-data">
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
                                            <option value="">-Chọn nhà khoa học-</option>
                                            @foreach ($scientists as $scientist)
                                                <option value="{{ $scientist->id }}">{{ $scientist->profile_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-xs-5">
                                        <select class="form-control" name="scientists[0][role_id]" required>
                                            <option value="">--Chọn vai trò--</option>
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




{{-- Modal DELETE --}}
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-danger">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="deleteModalLabel">Xóa đề xuất</h4>
            </div>
            <div class="modal-body">
                <p>Bạn có chắc chắn muốn xóa đề xuất này không?</p>
            </div>
            <div class="modal-footer">

                <form id="deleteForm" action="{{ route('user.offers.destroy', ['offer' => 0]) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- modal EDIT --}}


<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-warning">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="editModalLabel">Chỉnh sửa đề xuất</h4>
            </div>
            <div class="modal-body">
                <form id="editForm" action="{{ route('user.offer.updateOffer', ['offer' => 0]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="edit_offer_name">Tên đề xuất</label>
                        <input type="text" class="form-control" id="edit_offer_name" name="offer_name" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_year">Năm</label>
                        <input type="text" class="form-control" id="edit_year" name="year" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_note">Ghi chú</label>
                        <input type="text" class="form-control" id="edit_note" name="note" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_propose_id">Trình độ đào tạo</label>
                        <select class="form-control" id="edit_propose_id" name="propose_id" required>
                            @foreach ($proposes as $propose)
                                <option value="{{ $propose->id }}">{{ $propose->propose_name }}</option>
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
            var offerId = $(this).data('offer-id');
            var offerName = $(this).data('offer-name');
            var year = $(this).data('year');
            var note = $(this).data('note');
            var proposeId = $(this).data('propose-id');
            var roleId = $(this).data('role-id');

            $('#edit_offer_name').val(offerName);
            $('#edit_year').val(year);
            $('#edit_note').val(note);
            $('#edit_propose_id').val(proposeId);
            $('#edit_role_id').val(roleId);

            var action = "{{ route('user.offer.updateOffer', ['offer' => ':id']) }}";
            action = action.replace(':id', offerId);
            $('#editForm').attr('action', action);
        });

        $('#updateButton').click(function() {
            $('#editForm').submit();
        });

        $('[data-target="#deleteModal"]').click(function() {
            var offerId = $(this).data('offer-id');
            var action = "{{ route('user.offers.destroy', ['offer' => ':id']) }}";
            action = action.replace(':id', offerId);
            $('#deleteForm').attr('action', action);
        });



        // Tự động ẩn thông báo sau 2 giây
        setTimeout(function() {
            $('.notification').fadeOut('slow');
        }, 2000); // 2000ms = 2s
    });
</script>


@stop()
