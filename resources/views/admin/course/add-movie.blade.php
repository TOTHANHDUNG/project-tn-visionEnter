@extends('admin.admin')
@section('content')
<body>
  <h1 class="text-center mb-4">NHẬP DỮ LIỆU</h1>

  <div class="container mb-5">
    <div class="row justify-content-center">
      <div class="col-8">
        <div class="card">
          <div class="card-body">
            <form action="{{route('addMovieHandle')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="courseId" value="{{$course->id}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label" required> Tên movie</label>
                <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                @error('name')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label" required>Mô tả movie</label>
                <textarea name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" rows="5" required style="resize: none;"></textarea>
                @error('name')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="inputStatus">Giáo viên</label>
                <select id="inputStatus" name ='teacherId' class="form-control custom-select">
                  <option selected disabled>Select one</option>
                    @if(!empty($teachers))
                        @foreach ($teachers as $teacher)
                            <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                        @endforeach
                    @endif
                </select>
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label" required>Video</label>
                <input type="file" name="video" class="form-control" id="photo">
                @error('name')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  -->
</body>
@endsection
