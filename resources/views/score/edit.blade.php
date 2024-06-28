@extends('master.admin')

@section('main')



<div class="container" style="max-width: 1300px;margin: 0 auto;">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 form-container">
            <h2 class="text-center">Cập nhật</h2>

            <form method="post" action="{{ route('score.update', $score->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
<!-- 
                <div class="form-group">
                    <label for="itemName">Mã loại hội đồng</label>
                    <input type="text" class="form-control" name="score_id" placeholder="Input field" value="{{ $score->score_id }}">
                </div> -->
                
                
                <div class="form-group">
                    <label for="itemName">Năm</label>
                    <input type="year" class="form-control" name="year" placeholder="Input field" value="{{ $score->year }}">
                </div>

                <div class="form-group">
                    <label for="itemName">Số quyết định</label>
                    <input type="text" class="form-control" name="decision_num" placeholder="Input field" value="{{ $score->decision_num }}">
                </div>

                <div class="form-group">
                    <label for="itemName">Tên bảng điểm</label>
                    <input type="text" class="form-control" name="tbscore_name" placeholder="Input field" value="{{ $score->tbscore_name }}">
                </div>

                <div class="form-group">
                    <label for="itemName">Điểm trần</label>
                    <input type="text" class="form-control" name="mark" placeholder="Input field" value="{{ $score->mark }}">
                </div>

                <div class="form-group">
                    <label for="itemName">Hội đồng chấm</label>
                    <input type="text" class="form-control" name="council" placeholder="Input field" value="{{ $score->council }}">
                </div>


                <div class="text-center">
                    <input type="hidden" name="hidden_id" value="{{ $score->id }}" />
                    <button type="submit" class="btn btn-primary">Sửa</button>
                </div>
            </form>
        </div>
    </div>
</div>




@endsection('content')
