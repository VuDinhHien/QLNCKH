@extends('master.admin')

@section('main')

<!-- @section('title', 'Dashboard') -->

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="fa-solid fa-house-chimney"></i> Trang chủ</a></li>

        <li class="breadcrumb-item active" aria-current="page">Đề xuất</li>
    </ol>
</nav>

<style>
    .action{
        display: flex;
        justify-content: space-between
    }
</style>



<!-- Modal -->


<button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#createModal" style="margin-bottom: 10px;">
    Thêm mới
</button>

<table class="table table-hover table-bordered mt-3" id="myTable">
    <thead>
        <tr>
            <th style="text-align: center">Người đề xuất</th>
            <th style="text-align: center">Năm</th>
            <th style="width: 400px; text-align: center">Tên đề xuất</th>
            <th style="text-align: center">Loại đề xuất</th>
            <th style="text-align: center">Trạng thái</th>
            <th style="text-align: center">Ghi chú</th>
            <th style="text-align: center">Thao Tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($offers as $offer)
        <tr>
            <td>{{ $offer->proposer }}</td>
            <td>{{ $offer->year }}</td>
            <td>{{ $offer->offer_name }}</td>
            <td>{{ $offer->propose->propose_name }}</td>
            <td>{{ $offer->suggestion->suggestion_name }}</td>
            <td>{{ $offer->note }}</td>

            <td>

                <div class="action">
                    <div>
                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmDeleteModal" data-id="{{ $offer->id }}">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
    
                   <div>
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editscouncilModal" data-offer-id="{{ $offer->id }}" data-proposer="{{ $offer->proposer }}" data-year="{{ $offer->year }}" data-offer-name="{{ $offer->offer_name }}" data-propose-id="{{ $offer->propose_id }}" data-suggestion-id="{{ $offer->suggestion_id }}" data-note="{{ $offer->note }}">
                        <i class="fa fa-edit"></i>
                    </button>
                   </div>
                </div>




            </td>
        </tr>
        @endforeach
    </tbody>
</table>







<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-success">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="createModalLabel">Thêm mới đề xuất</h4>
            </div>
            <div class="modal-body">
                <form id="createForm" action="{{ route('offer.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="proposer">Người đề xuất</label>
                        <input type="text" class="form-control" id="proposer" name="proposer" required>
                    </div>
                    <div class="form-group">
                        <label for="year">Năm</label>
                        <input type="text" class="form-control" id="year" name="year" required>
                    </div>
                    <div class="form-group">
                        <label for="offer_name">Tên đề xuất</label>
                        <input type="text" class="form-control" id="offer_name" name="offer_name" required>
                    </div>
                    <div class="form-group">
                        <label for="propose_id">Loại đề xuất</label>
                        <select class="form-control" name="propose_id" id="propose_id" required>
                            @foreach ($proposes as $propose)
                            <option value="{{ $propose->id }}">{{ $propose->propose_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="suggestion_id">Trạng thái đề xuất</label>
                        <select class="form-control" name="suggestion_id" id="suggestion_id" required>
                            @foreach ($suggestions as $suggestion)
                            <option value="{{ $suggestion->id }}">{{ $suggestion->suggestion_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="note">Ghi chú</label>
                        <input type="text" class="form-control" id="note" name="note">
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<!-- The Modal -->
<div class="modal fade" id="editscouncilModal" tabindex="-1" aria-labelledby="editscouncilModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header btn-warning">
                <h4 class="modal-title" id="editscouncilModalLabel">Sửa Hội thảo/hội nghị</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('offer.update', ['offer' => $offer->id]) }}" method="POST" id="editscouncilForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="proposer">Người đề xuất</label>
                        <input type="text" class="form-control" id="proposer" name="proposer" required>
                    </div>
                    <div class="form-group">
                        <label for="year">Năm</label>
                        <input type="text" class="form-control" id="year" name="year" required>
                    </div>
                    <div class="form-group">
                        <label for="offer_name">Tên đề xuất</label>
                        <input type="text" class="form-control" id="offer_name" name="offer_name" required>
                    </div>
                    <div class="form-group">
                        <label for="propose_id">Loại đề xuất</label>
                        <select class="form-control" name="propose_id" id="propose_id" required>
                            @foreach ($proposes as $propose)
                            <option value="{{ $propose->id }}">{{ $propose->propose_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="suggestion_id">Trạng thái đề xuất</label>
                        <select class="form-control" name="suggestion_id" id="suggestion_id" required>
                            @foreach ($suggestions as $suggestion)
                            <option value="{{ $suggestion->id }}">{{ $suggestion->suggestion_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="note">Ghi chú</label>
                        <input type="text" class="form-control" id="note" name="note">
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
            var offerId = button.data('offer-id'); // Extract info from data-* attributes
            var proposer = button.data('proposer');
            var year = button.data('year');
            var offerName = button.data('offer-name');
            var proposeId = button.data('propose-id');
            var suggestionId = button.data('suggestion-id');
            var note = button.data('note');

            // Update the modal's content
            var modal = $(this);
            modal.find('.modal-body #proposer').val(proposer);
            modal.find('.modal-body #year').val(year);
            modal.find('.modal-body #offer_name').val(offerName);
            modal.find('.modal-body #propose_id').val(proposeId);
            modal.find('.modal-body #suggestion_id').val(suggestionId);
            modal.find('.modal-body #note').val(note);

            // Update the form action
            var form = modal.find('#editscouncilForm');
            form.attr('action', '{{ url("admin/offer/") }}/' + offerId); // Adjust the URL as needed
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
                <h3>Bạn có chắc chắn muốn xóa đề xuất này</h3>
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
            var url = '{{ route("offer.destroy", ":id") }}'; 
            url = url.replace(':id', id);

            var modal = $(this);
            modal.find('#deleteForm').attr('action', url);
        });
    });
</script>


<!-- The Modal -->



@stop()