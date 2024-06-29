@extends('admin.admin')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Quản lý đánh giá</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active">Đánh giá</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row g-3 align-items-center mt-2">
      <div class="col-auto">
        <form action="/data-teacher" method="GET">
          <input type="search" id="inputPassword6" name ="search" class="form-control" aria-describedby="passwordHelpInline">
        </form>
      </div>
    </div>
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên khóa học</th>
                    <th scope="col">Email người dùng</th>
                    <th scope="col">Đánh giá</th>
                    <th scope="col">Xếp hạng</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = ($data->currentPage() - 1) * $data->perPage() + 1;
                @endphp
                @foreach ($ratings as $rating)
                <tr>
                  <th scope="row">{{$no++}}</th>
                  <td>{{ optional($rating->course)->name }}</td>
                  <td>{{ optional($rating->user)->email }}</td>
                  <td>{{ $rating->review }}</td>
                  <td>{{ $rating->rating }}</td>
                    <td>
                        <a href="/edit-rating/{{$rating->id}}" type="button" class="btn btn-warning">Edit</a>
                        <a href="#" type="button" class="btn btn-danger delete" data-id="{{ $rating->id }}" data-name="{{ $rating->review }}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

      {{$ratings->links()}}
    </div>
  </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>    
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  $('.delete').click(function(){
    var ratingid = $(this).attr('data-id');
    var name = $(this).attr('data-name');

    swal({
      title: "Are you sure?",
      text: "Bạn có chắc chắn muốn xóa đánh giá với nội dung: " + name + "?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "/deleterating/" + ratingid;
        swal("Đã xóa!", {
          icon: "success",
        });
      } else {
        swal("Hủy bỏ xóa đánh giá!");
      }
    });
  });
</script>
<script>
  @if(Session::has('success'))
    toastr.success("{{Session::get('success')}}");
  @elseif(Session::has('error'))
    toastr.error("{{Session::get('error')}}");
  @endif
</script>
@endpush