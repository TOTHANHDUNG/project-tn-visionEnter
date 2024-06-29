@extends('webfront.user-action.all-action-user')

@section('content-profile')
<div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Ảnh</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    @if ($user->photo)
                        <img class="img-account-profile rounded-circle mb-2" src="{{ asset('photodata/' . $user->photo) }}" alt="Ảnh đại diện">
                    @else
                        <img class="img-account-profile rounded-circle mb-2" src="{{ asset('photodata/avatar.png') }}" alt="Ảnh đại diện mặc định">
                    @endif
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4">JPG hoặc PNG không quá 5MB</div>
                    <!-- Profile picture upload form-->
                    <form method="POST" action="{{ route('profile.updatePhoto') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="file" name="photo" class="form-control mb-2" required>
                        <button class="btn btn-primary" type="submit">Tải ảnh lên</button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Chi tiết hồ sơ</div>
                <div class="card-body">
                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        <!-- Form Group (username)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Tên đầy đủ</label>
                            <input class="form-control" id="inputUsername" name="name" type="text" placeholder="Nhập tên bạn..." value="{{ $user->name }}">
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">Địa chỉ Email</label>
                            <input class="form-control" id="inputEmailAddress" name="email" type="email" placeholder="Nhập địa chỉ Email của bạn..." value="{{ $user->email }}">
                        </div>
                        <!-- Save changes button-->
                        <button class="btn btn-primary" type="submit">Lưu thay đổi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
