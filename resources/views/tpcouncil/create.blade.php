@extends('master.admin')

@section('main')






<div class="container" style="max-width: 1300px;margin: 0 auto;">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 form-container">
            <h2 class="text-center">Thêm mới</h2>

            <form class="align-items:center" method="post" action="{{ route('tpcouncil.store') }}" enctype="multipart/form-data" >
                @csrf
                <div class="form-group">
                    <label for="itemName">Mã loại hội đồng</label>
                    <input type="text" class="form-control" name="tpcouncil_id" placeholder="Input field" required>
                </div>

                <div class="form-group">
                    <label for="itemName">Tên loại hội đồng</label>
                    <input type="text" class="form-control" name="tpcouncil_name" placeholder="Input field" required>
                </div>
                
                
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection('content')