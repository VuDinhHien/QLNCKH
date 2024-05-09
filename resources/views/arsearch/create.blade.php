@extends('master.admin')

@section('main')






<div class="container" style="max-width: 1300px;margin: 0 auto;">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 form-container">
            <h2 class="text-center">Add New Item</h2>

            <form class="align-items:center" method="post" action="{{ route('arsearch.store') }}" enctype="multipart/form-data" >
                @csrf
                <div class="form-group">
                    <label for="itemName">Mã lĩnh vực nghiên cứu</label>
                    <input type="text" class="form-control" name="arsearch_id" placeholder="Input field" required>
                </div>

                <div class="form-group">
                    <label for="itemName">Tên lĩnh vực</label>
                    <input type="text" class="form-control" name="arsearch_name" placeholder="Input field" required>
                </div>
                
                
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection('content')