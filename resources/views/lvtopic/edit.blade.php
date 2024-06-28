@extends('master.admin')

@section('main')


<div class="container" style="max-width: 1300px;margin: 0 auto;">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 form-container">
            <h2 class="text-center">Cập nhật</h2>

            <form method="post" action="{{ route('lvtopic.update', $lvtopic->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

                <div class="form-group">
                    <label for="itemName">Tên đề tài</label>
                    <input type="text" class="form-control" name="lvtopic_name" placeholder="Input field" value="{{ $lvtopic->lvtopic_name }}">
                </div>
                
                
                <div class="form-group">
                    <label for="">Đề tài/Đề án</label>

                    <select class="form-control" name="category" >
                        
                        <option value="Đề tài">Đề tài</option>
                        <option value="Đề án">Đề án</option>
                    </select>
                </div>
                <div class="text-center">
                    <input type="hidden" name="hidden_id" value="{{ $lvtopic->id }}" />
                    <button type="submit" class="btn btn-primary">Sửa</button>
                </div>
            </form>
        </div>
    </div>
</div>




@endsection('content')
