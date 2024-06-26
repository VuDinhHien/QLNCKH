@extends('master.admin')

@section('main')






<div class="container" style="max-width: 1300px;margin: 0 auto;">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 form-container">
            <h2 class="text-center">Thêm mới</h2>

            <form class="align-items:center" method="post" action="{{ route('office.store') }}" enctype="multipart/form-data" >
                @csrf
                <div class="form-group">
                    <label for="itemName">Mã cơ quan</label>
                    <input type="text" class="form-control" name="office_id" placeholder="Input field" required>
                </div>

                <div class="form-group">
                    <label for="itemName">Tên cơ quan</label>
                    <input type="text" class="form-control" name="office_name" placeholder="Input field" required>
                </div>

                <div class="form-group">
                    <label for="itemName">Địa chỉ</label>
                    <input type="text" class="form-control" name="address" placeholder="Input field">
                </div>

                <div class="form-group">
                    <label for="itemName">Số điện thoại</label>
                    <input type="text" class="form-control" name="phone" placeholder="Input field">
                </div>

                <div class="form-group">
                    <label for="itemName">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Input field">
                </div>

                <div class="form-group">
                    <label for="itemName">Cơ quan cha</label>
                    <input type="text" class="form-control" name="office_parent" placeholder="Input field">
                </div>
                
                
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection('content')