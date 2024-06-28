@extends('master.admin')

@section('main')




<div class="container" style="max-width: 1300px;margin: 0 auto;">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 form-container">
            <h2 class="text-center">Thêm chức vụ</h2>

            <form class="align-items:center" method="post" action="{{ route('council.store') }}" enctype="multipart/form-data" >
                @csrf
                <div class="form-group">
                    <label for="itemName">Mã chức vụ</label>
                    <input type="text" class="form-control" name="id" placeholder="Input field" required>
                </div>
                <div class="form-group">
                    <label for="itemDescription">Tên chức vụ</label>
                    <input type="text" class="form-control" name="position_name" placeholder="Input field" required>
                </div>
                
                <div class="form-group">
                    <label for="">Chức vụ duy nhất</label>

                    <select class="form-control" name="only_position" required>
                        <option value="">Select category</option>
                        <option value="Có">Có</option>
                        <option value="Không">Không</option>
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection('content')