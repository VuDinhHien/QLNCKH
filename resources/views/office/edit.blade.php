@extends('master.admin')

@section('main')



<div class="container" style="max-width: 1300px;margin: 0 auto;">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 form-container">
            <h2 class="text-center">Update Item</h2>

            <form method="post" action="{{ route('office.update', $office->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

                <!-- <div class="form-group">
                    <label for="itemName">Mã lĩnh vực nghiên cứu</label>
                    <input type="text" class="form-control" name="office_id" placeholder="Input field" value="{{ $office->office_id }}">
                </div> -->
                



                
                <div class="form-group">
                    <label for="itemName">Mã cơ quan</label>
                    <input type="text" class="form-control" name="office_id" placeholder="Input field" value="{{ $office->office_id }}">
                </div>

                <div class="form-group">
                    <label for="itemName">Tên cơ quan</label>
                    <input type="text" class="form-control" name="office_name" placeholder="Input field" value="{{ $office->office_name }}">
                </div>

                <div class="form-group">
                    <label for="itemName">Địa chỉ</label>
                    <input type="text" class="form-control" name="address" placeholder="Input field" value="{{ $office->address }}">
                </div>

                <div class="form-group">
                    <label for="itemName">Số điện thoại</label>
                    <input type="text" class="form-control" name="phone" placeholder="Input field" value="{{ $office->phone }}">
                </div>

                <div class="form-group">
                    <label for="itemName">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Input field" value="{{ $office->email }}">
                </div>

                <div class="form-group">
                    <label for="itemName">Cơ quan cha</label>
                    <input type="text" class="form-control" name="office_parent" placeholder="Input field" value="{{ $office->office_parent }}">
                </div>


                <div class="text-center">
                    <input type="hidden" name="hidden_id" value="{{ $office->id }}" />
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>




@endsection('content')
