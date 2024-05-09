@extends('master.admin')

@section('main')



<div class="container" style="max-width: 1300px;margin: 0 auto;">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 form-container">
            <h2 class="text-center">Update Item</h2>

            <form method="post" action="{{ route('arsearch.update', $arsearch->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

                <div class="form-group">
                    <label for="itemName">Mã lĩnh vực nghiên cứu</label>
                    <input type="text" class="form-control" name="arsearch_id" placeholder="Input field" value="{{ $arsearch->arsearch_id }}">
                </div>
                
                
                <div class="form-group">
                    <label for="itemName">Tên lĩnh vực</label>
                    <input type="text" class="form-control" name="arsearch_name" placeholder="Input field" value="{{ $arsearch->arsearch_name }}">
                </div>


                <div class="text-center">
                    <input type="hidden" name="hidden_id" value="{{ $arsearch->id }}" />
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>




@endsection('content')
