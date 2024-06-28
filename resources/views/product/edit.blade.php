@extends('master.admin')

@section('main')





<div class="container" style="max-width: 1300px;margin: 0 auto;">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 form-container">
            <h2 class="text-center">Cập nhật</h2>

            <form method="post" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

                <div class="form-group">
                    <label for="itemName">Tên loại sản phẩm</label>
                    <input type="text" class="form-control" name="product_name" placeholder="Input field" value="{{ $product->product_name }}">
                </div>
                
                
               
                <div class="text-center">
                    <input type="hidden" name="hidden_id" value="{{ $product->id }}" />
                    <button type="submit" class="btn btn-primary">Sửa</button>
                </div>
            </form>
        </div>
    </div>
</div>




@endsection('content')
