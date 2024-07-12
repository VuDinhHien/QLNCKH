@extends('master.admin')

@section('main')



<div class="container" style="max-width: 1300px;margin: 0 auto;">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 form-container">
            <h2 class="text-center">Update Item</h2>

            <form method="post" action="{{ route('council.update', $council->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

                
                <div class="form-group">
                    <label for="itemDescription">Tên chức vụ</label>
                    <input type="text" class="form-control" name="position_name" placeholder="Input field" value="{{ $council->position_name }}">
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
