@extends('master.admin')

@section('main')



<div class="container" style="max-width: 1300px;margin: 0 auto;">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 form-container">
            <h2 class="text-center">Update Item</h2>

            <form method="post" action="{{ route('artopic.update', $artopic->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

                <div class="form-group">
                    <label for="itemName">Mã cấp hội đồng</label>
                    <input type="text" class="form-control" name="artopic_id" placeholder="Input field" value="{{ $artopic->artopic_id }}">
                </div>
                
                
                <div class="form-group">
                    <label for="itemName">Tên cấp hội đồng</label>
                    <input type="text" class="form-control" name="artopic_name" placeholder="Input field" value="{{ $artopic->artopic_name }}">
                </div>


                <div class="text-center">
                    <input type="hidden" name="hidden_id" value="{{ $artopic->id }}" />
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>




@endsection('content')
