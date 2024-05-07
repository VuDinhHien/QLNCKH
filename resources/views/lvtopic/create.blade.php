@extends('master.admin')

@section('main')



<!-- <div class="row">
    <div class="col-md-4">

        <form class="align-items:center" method="post" action="{{ route('council.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="">Mã chức vụ</label>
                <input type="text" name="id" class="form-control" id="" placeholder="Input field">
            </div>
            <div class="form-group">
                <label for="">Tên chức vụ</label>
                <input type="text" name="position_name" class="form-control" id="" placeholder="Input field">
            </div>

            <div class="form-group">
                <label for="">Chức vụ duy nhất </label>

                <select name="only_position" id="">
                    <option value="">---Choice One---</option>
                    <option value="Có">Có</option>
                    <option value="Không">Không</option>
                </select>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
</div> -->



<div class="container" style="max-width: 1300px;margin: 0 auto;">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 form-container">
            <h2 class="text-center">Add New Item</h2>

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
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection('content')