@extends('master.admin')

@section('main')



<!-- <div class="card">

    <div class="card-body">
        <form method="post" action="{{ route('council.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Mã chức vụ</label>
                <div class="col-sm-10">
                    <input type="text" name="id" class="form-control" />
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Tên chức vụ</label>
                <div class="col-sm-10">
                    <input type="text" name="position_name" class="form-control" />
                </div>
            </div>

            <div class="row mb-4">
                <label class="col-sm-2 col-label-form">Chức vụ duy nhất</label>
                <div class="col-sm-10">
                    <select name="only_position" class="form-control">
                        <option value="Có">Có</option>
                        <option value="Không">Không</option>
                    </select>
                </div>
            </div>

            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Add" />
            </div>
        </form>
    </div>
</div> -->

<div class="row">
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
</div>



@endsection('content')