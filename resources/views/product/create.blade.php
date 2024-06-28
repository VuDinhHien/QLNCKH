@extends('master.admin')

@section('main')





<div class="container" style="max-width: 1300px;margin: 0 auto;">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 form-container">
            <h2 class="text-center">Thêm mới</h2>

            <form class="align-items:center" method="post" action="{{ route('product.store') }}" enctype="multipart/form-data" >
                @csrf
                <div class="form-group">
                    <label for="itemName">Tên loại sản phẩm</label>
                    <input type="text" class="form-control" name="product_name" placeholder="Input field" required>
                </div>
                
                
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Sửa</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection('content')