@extends('admin.admin')
@section('content')
<body>
  <h1 class="text-center mb-4">CHỈNH SỬA DỮ LIỆU</h1>

  <div class="container mb-5">
    <div class="row justify-content-center">
      <div class="col-8">
        <div class="card">
          <div class="card-body">
            <form action="/insertcourse" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label" required> Tên khoá học</label>
                <input type="text" name="name" value="{{$data->name}}"" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                @error('name')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label" required> Giáo Viên</label>
                <select name="teacherid">
                    @foreach($teachers as $teacher)
                        <option name="teachid" value="{{$teacher['id']}}"  {{$data->teacherid == $teacher['id'] ? 'selected' : ''}}> {{$teacher['name']}}  </option>
                    @endforeach
                </select>
                @error('name')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label" required>Mô tả khóa học</label>
                <textarea name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" rows="5" required style="resize: none;">{{$data['description']}}</textarea>
                @error('name')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label" required>Giá</label>
                <input type="number" value="{{$data['price']}}" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                @error('name')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Ngôn ngữ</label>
                <select class="form-select" name="language" aria-label="Default select example" required>
                  <option disabled selected value >Sellect Languages</option>
                  <option value="english" {{$data['language'] == 'english' ? 'selected' : ''}}>English</option>
                  <option value="korean" {{$data['language'] == 'korean' ? 'selected' : ''}}>Korean</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Loại hình</label>
                <select class="form-select" name="type" aria-label="Default select example" required>
                  <option disabled selected value >Select</option>
                  <option value="online" {{$data['type'] == 'online' ? 'selected' : ''}}>Online</option>
                  <option value="offline" {{$data['type'] == 'offline' ? 'selected' : ''}}>Offline</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label" required>Hình ảnh</label>
                <input type="file" name="photo" class="form-control" id="photo">
                @error('name')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
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
