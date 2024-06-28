@extends('master.admin')

@section('main')






<div class="container" style="max-width: 1300px;margin: 0 auto;">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 form-container">
            <h2 class="text-center">Thêm mới</h2>

            <form class="align-items:center" method="post" action="{{ route('lvcouncil.store') }}" enctype="multipart/form-data" >
                @csrf
                <div class="form-group">
                    <label for="itemName">Mã cấp hội đồng</label>
                    <input type="text" class="form-control" name="lvcouncils_id" placeholder="Input field" required>
                </div>

                <div class="form-group">
                    <label for="itemName">Tên cấp hội đồng</label>
                    <input type="text" class="form-control" name="lvcouncils_name" placeholder="Input field" required>
                </div>
                
                
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- <style>
    .modal-header {
        background-color: #5cb85c;
        color: white;
    }

    .modal-footer .btn-primary {
        background-color: #5cb85c;
        border-color: #4cae4c;
    }
</style> -->



@endsection('content')