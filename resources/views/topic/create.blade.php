<!-- @extends('master.admin')

@section('main') -->






<!-- <div class="container" style="max-width: 1300px;margin: 0 auto;">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 form-container">
            <h2 class="text-center">Add New Item</h2>

            <form class="align-items:center" method="post" action="{{ route('topic.store') }}" enctype="multipart/form-data" >
                @csrf
                <div class="form-group">
                    <label for="itemName">Tên đề tài/đề án</label>
                    <input type="text" class="form-control" name="topic_name" placeholder="Input field" required>
                </div>

                <div class="form-group">
                    <label for="itemName">Chủ nhiệm</label>
                    <input type="text" class="form-control" name="teacher_name" placeholder="Input field" required>
                </div>
                <div class="form-group">
                    <label for="itemName">Cấp đề tài/đề án</label>
                    
                    <select name="lvtopic_id" id="" class="form-control">
                       @foreach($lvtopics as $lvtopic)
                          <option value="{{ $lvtopic->id }}">{{ $lvtopic->lvtopic_name }}</option>
                       @endforeach
                   </select>
                </div>

                <div class="form-group">
                    <label for="itemName">Kết quả nghiệm thu</label>
                   
                    <select name="result" id="" class="form-control">
                       
                        <option value="Khá">Khá</option>
                        <option value="Giỏi">Giỏi</option>
                        <option value="Xuất sắc">Xuất sắc</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="itemName">Ngày kết thúc</label>
                    <input type="date" class="form-control" name="end_date" placeholder="Input field" required>
                </div>
                
                
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div> -->


<!-- @endsection('content') -->