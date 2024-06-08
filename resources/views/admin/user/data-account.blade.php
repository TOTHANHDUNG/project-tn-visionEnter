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
          <h1 class="m-0">Bảng điều khiển</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active">Bảng điều khiên</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <div class="container">
    <a href="/add-account" type="button" class="btn btn-success">Thêm + </a>
    <div class="row g-3 align-items-center mt-2">
      <div class="col-auto">
        <form action="/data-account" method="GET">
          <input type="search" id="inputPassword6" name ="search" class="form-control" aria-describedby="passwordHelpInline">
        </form>
      </div>
    </div>
    <div class="row">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Tên</th>
            <th scope="col">Ảnh</th>
            <th scope="col">Vai trò</th>
            <th scope="col">Email</th>
            <th scope="col">Password</th>
            <th scope="col">Thời gian</th>
            <th scope="col">Hành động</th>
          </tr>
        </thead>
        <tbody>
          @php
              $no = 1;
          @endphp
          @foreach ($data as $row)
          <tr>
            <th scope="row">{{$no ++}}</th>
            <td>{{$row->name}}</td>
            <td>
              <img src="{{ asset('photodata/' . $row->photo) }}" alt="" style="width: 40px;">
          </td>          
            <td>{{$row->role}}</td>
            <td>{{$row->email}}</td>
            <td>{{$row->password}}</td>
            <td>{{$row->created_at->format(' D M Y')}}</td>
            <td>
              <a href="/editdata-account/{{$row->id}}" type="button" class="btn btn-warning">Edit</a>
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
      title: "Are you sure?",
      text: "Kamu akan menghapus data pegawai dengan id "+name+" ",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "/deleteaccount/" + pegawaiid+""
        swal("Poof! Your imaginary file has been deleted!", {
          icon: "success",
        });
      } else {
        swal("Data tidak jadi dihapus!");
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