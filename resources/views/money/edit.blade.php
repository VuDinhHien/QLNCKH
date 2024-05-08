@extends('master.admin')

@section('main')





<div class="container" style="max-width: 1300px;margin: 0 auto;">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 form-container">
            <h2 class="text-center">Update Item</h2>

            <form method="post" action="{{ route('money.update', $money->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

                <div class="form-group">
                    <label for="itemName">Tên nguồn kinh phí</label>
                    <input type="text" class="form-control" name="money_name" placeholder="Input field" value="{{ $money->money_name }}">
                </div>
                
                
               
                <div class="text-center">
                    <input type="hidden" name="hidden_id" value="{{ $money->id }}" />
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>




@endsection('content')
