@extends('master.admin')

@section('main')

<!-- <div class="card">
    <div class="card-header">Edit council</div>
    <div class="card-body">
        <form method="post" action="{{ route('council.update', $council->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Mã chức vụ</label>
                <div class="col-sm-10">
                    <input type="text" name="id" class="form-control" value="{{ $council->id }}" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Tên chức vụ</label>
                <div class="col-sm-10">
                    <input type="text" name="position_name" class="form-control" value="{{ $council->position_name }}" />
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
                <input type="hidden" name="hidden_id" value="{{ $council->id }}" />
                <input type="submit" class="btn btn-primary" value="Edit" />
            </div>  
        </form>
    </div>
</div> -->


<!-- <div class="row">
    <div class="col-md-4">

        <form method="post" action="{{ route('council.update', $council->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="">Mã chức vụ</label>
                <input type="text" name="id" class="form-control" id="" placeholder="Input field"  value="{{ $council->id }}">
            </div>
            <div class="form-group">
                <label for="">Tên chức vụ</label>
                <input type="text" name="position_name" class="form-control" id="" placeholder="Input field" value="{{ $council->position_name }}">
            </div>

            <div class="form-group">
                <label for="">Chức vụ duy nhất </label>

                <select name="only_position" id="">
                    
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
            <h2 class="text-center">Update Item</h2>

            <form method="post" action="{{ route('council.update', $council->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

                <div class="form-group">
                    <label for="itemName">Mã chức vụ</label>
                    <input type="text" class="form-control" name="id" placeholder="Input field" value="{{ $council->id }}">
                </div>
                <div class="form-group">
                    <label for="itemDescription">Tên chức vụ</label>
                    <input type="text" class="form-control" name="position_name" placeholder="Input field" value="{{ $council->position_name }}">
                </div>
                
                <div class="form-group">
                    <label for="">Chức vụ duy nhất</label>

                    <select class="form-control" name="only_position" >
                        
                        <option value="Có">Có</option>
                        <option value="Không">Không</option>
                    </select>
                </div>
                <div class="text-center">
                    <input type="hidden" name="hidden_id" value="{{ $council->id }}" />
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementsByName('only_position')[0].value = "{{ $council->only_position }}";
</script>



@endsection('content')
