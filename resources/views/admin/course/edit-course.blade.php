@extends('admin.admin')

@section('content')
<body>
  <h1 class="text-center mb-4">CHỈNH SỬA DỮ LIỆU</h1>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-8">
        <div class="card">
          <div class="card-body">
            <form action="/updatecourse/{{$data->id}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                  <label for="teacherid" class="form-label">Giáo viên</label>
                  <input type="text" name="teacherid" class="form-control" id="teacherid" aria-describedby="emailHelp" required value="{{$data->teacherid}}">
              </div>
              <div class="mb-3">
                  <label for="name" class="form-label">Tên khóa học</label>
                  <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" required value="{{$data->name}}">
              </div>
              <div class="mb-3">
                  <label for="photo" class="form-label">Upload Ảnh</label>
                  <input type="file" name="photo" class="form-control" id="photo">
              </div>
              <div class="mb-3">
                  <label for="description" class="form-label">Mô tả khóa học</label>
                  <textarea name="description" class="form-control" id="description" aria-describedby="emailHelp" rows="5" required style="resize: none;">{{$data->description}}</textarea>
              </div>
              <div class="mb-3">
                  <label for="price" class="form-label">Giá</label>
                  <input type="number" name="price" class="form-control" id="price" aria-describedby="emailHelp" required value="{{$data->price}}">
              </div>
              <div class="mb-3">
                  <label for="language" class="form-label">Ngôn ngữ</label>
                  <select class="form-select" name="language" id="language" aria-label="Default select example">
                      <option disabled selected value>{{$data->language}}</option>
                      <option value="english">English</option>
                      <option value="korean">Korean</option>
                  </select>
              </div>
              <div class="mb-3">
                  <label for="type" class="form-label">Loại hình</label>
                  <select class="form-select" name="type" id="type" aria-label="Default select example">
                      <option disabled selected value>{{$data->type}}</option>
                      <option value="online">Online</option>
                      <option value="offline">Offline</option>
                  </select>
              </div>
              <button type="submit" class="btn btn-primary">Update</button>
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