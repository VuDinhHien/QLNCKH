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



<button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#createModal" style="margin-bottom: 10px;">
    Thêm mới
</button>

<table class="table table-hover table-bordered mt-3" id="myTable">
    <thead>
        <tr>
            <th>Người đề xuất</th>
            <th>Năm</th>
            <th>Tên đề xuất</th>
            <th>Loại đề xuất</th>
            <th>Trạng thái</th>
            <th>Ghi chú</th>
            <th>Trạng thái</th>
            <th>Thao Tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($offers as $offer)
        <tr>
            <td>{{ $offer->user->name }}</td>
            <td>{{ $offer->year }}</td>
            <td>{{ $offer->offer_name }}</td>
            <td>{{ $offer->propose->propose_name }}</td>
            <td>{{ $offer->suggestion->suggestion_name }}</td>
            <td>{{ $offer->note }}</td>
            <td>{{ $offer->status }}</td>

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








@stop()