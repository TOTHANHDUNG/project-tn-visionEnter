@extends('admin.admin')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Quản lý giáo viên</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active">Giáo viên</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <div class="container">
    <a href="/add-teacher" type="button" class="btn btn-success">Thêm + </a>
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
            <th scope="col">Tên giáo viên</th>
            <th scope="col">Mô tả</th>
            <th scope="col">Ngôn ngữ</th>
            <th scope="col">Ảnh</th>
            <th scope="col">SĐT</th>
            <th scope="col">Thời gian</th>
            <th scope="col">Hành động</th>
          </tr>
        </thead>
        <tbody>
          @php
              $no = ($data->currentPage() - 1) * $data->perPage() + 1;
          @endphp
          @foreach ($data as $row)
          <tr>
            <th scope="row">{{$no ++}}</th>
            <td>{{$row->name}}</td>
            <td>{{$row->description}}</td>
            <td>{{$row->language}}</td>
            <td>
              <img src="{{ asset('photodata/' . $row->photo) }}" alt="" style="width: 40px;">
          </td>
            <td>{{$row->phone_number}}</td>
            <td>{{$row->created_at->format(' D M Y')}}</td>
            <td>
              <a href="/edit-teacher/{{$row->id}}" type="button" class="btn btn-warning">Edit</a>
              <a href="#" type="button" class="btn btn-danger delete" data-id="{{$row->id}}" data-name="{{$row->name}}">Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{$data->links()}}
    </div>
  </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
  <script>
    $('.delete').click(function(){
      var pegawaiid = $(this).attr('data-id');
      var name = $(this).attr('data-name');

      swal({
      title: "Bạn có chắc?",
      text: "Bạn có chắc xóa dữ liệu giáo viên "+name+" ",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "/deleteteacher/" + pegawaiid+""
        swal("Dữ liệu giáo viên đã bị xóa!", {
          icon: "success",
        });
      } else {
        swal("Dữ liệu chưa bị xóa!");
      }
    });
    });
    
  </script>
  <script>
    @if(Session::has('success'))
      toastr.success("{{Session::get('success')}}")
    @endif
  </script>
  @endpush