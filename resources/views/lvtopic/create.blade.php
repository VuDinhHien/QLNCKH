@extends('master.admin')

@section('main')






<div class="container" style="max-width: 1300px;margin: 0 auto;">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 form-container">
            <h2 class="text-center">Thêm mới</h2>

            <form class="align-items:center" method="post" action="{{ route('lvtopic.store') }}" enctype="multipart/form-data" >
                @csrf
                <div class="form-group">
                    <label for="itemName">Tên cấp đề tài</label>
                    <input type="text" class="form-control" name="lvtopic_name" placeholder="Input field" required>
                </div>
                
                <div class="form-group">
                    <label for="">Đề tài\Đề án</label>

                    <select class="form-control" name="category" required>
                        <option value="">Chọn cấp</option>
                        <option value="Đề tài">Đề tài</option>
                        <option value="Đề án">Đề án</option>
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