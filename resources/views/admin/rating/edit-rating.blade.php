@extends('admin.admin')

@section('content')
<body>
  <h1 class="text-center mb-4">CHỈNH SỬA DỮ LIỆU</h1>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-8">
        <div class="card">
          <div class="card-body">
            <form action="{{ route('updaterating', $data->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="name" class="form-label">Tên khóa học</label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" required value="{{ optional($data->course)->name }}">
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email người dùng</label>
                <input type="text" name="email" class="form-control" id="email" aria-describedby="emailHelp" required value="{{ optional($data->user)->email }}" disabled>
              </div>
              <div class="mb-3">
                <label for="review" class="form-label">Đánh giá</label>
                <textarea class="form-control" id="review" name="review" required style="resize: none;">{{ $data->review }}</textarea>
              </div>
              <div class="form-group">
                <label for="rating">Xếp hạng:</label>
                <input type="number" class="form-control" id="rating" name="rating" value="{{ $data->rating }}" min="1" max="5">
              </div>
              <button type="submit" class="btn btn-primary">Cập nhật</button>
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
