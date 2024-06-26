@extends('master.admin')

@section('main')



<div class="container" style="max-width: 1300px;margin: 0 auto;">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 form-container">
            <h2 class="text-center">Cập nhật</h2>

            <form method="post" action="{{ route('suggestion.update', $suggestion->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

                <div class="form-group">
                    <label for="itemName">Mã trạng thái đề xuất</label>
                    <input type="text" class="form-control" name="suggestion_id" placeholder="Input field" value="{{ $suggestion->suggestion_id }}">
                </div>
                
                
                <div class="form-group">
                    <label for="itemName">Tên trạng thái đề xuất</label>
                    <input type="text" class="form-control" name="suggestion_name" placeholder="Input field" value="{{ $suggestion->suggestion_name }}">
                </div>


                <div class="text-center">
                    <input type="hidden" name="hidden_id" value="{{ $suggestion->id }}" />
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
            </form>
        </div>
    </div>
</div>




@endsection('content')
