@extends('master.admin')

@section('main')






<div class="container" style="max-width: 1300px;margin: 0 auto;">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 form-container">
            <h2 class="text-center">Thêm mới</h2>

            <form class="align-items:center" method="post" action="{{ route('score.store') }}" enctype="multipart/form-data" >
                @csrf
                <div class="form-group">
                    <label for="itemName">Năm</label>
                    <input type="year" class="form-control" name="year" placeholder="Input field" required>
                </div>

                <div class="form-group">
                    <label for="itemName">Số quyết định</label>
                    <input type="text" class="form-control" name="decision_num" placeholder="Input field" required>
                </div>

                <div class="form-group">
                    <label for="itemName">Tên bảng điểm</label>
                    <input type="text" class="form-control" name="tbscore_name" placeholder="Input field" required>
                </div>

                <div class="form-group">
                    <label for="itemName">Điểm trần</label>
                    <input type="text" class="form-control" name="mark" placeholder="Input field" required>
                </div>

                <div class="form-group">
                    <label for="itemName">Hội đồng chấm</label>
                    <input type="text" class="form-control" name="council" placeholder="Input field" required>
                </div>

                
                
                
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection('content')