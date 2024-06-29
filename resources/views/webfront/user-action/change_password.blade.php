@extends('webfront.user-action.all-action-user')

@section('content-security')
<div class="container-xl px-4 mt-4  justify-content-center align-items-center">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <!-- Change password card-->
            <div class="card mb-4">
                <div class="card-header">Đổi mật khẩu</div>
                <div class="card-body">
                    <form action="{{ route('user-action.change_password') }}" method="POST">
                        @csrf
                        <!-- Form Group (current password)-->
                        <div class="mb-3">
                            <input name="old_password" class="form-control" id="currentPassword" type="password" placeholder="Nhập mật khẩu cũ" required>
                            @error('old_password')
                                <small class="help-block">{{$message}}</small>
                            @enderror
                        </div>
                        <!-- Form Group (new password)-->
                        <div class="mb-3">
                            <input name="password" class="form-control" id="newPassword" type="password" placeholder="Nhập mật khẩu mới" required>
                            @error('password')
                            <small class="help-block">{{$message}}</small>
                        @enderror
                        </div>
                        <!-- Form Group (confirm password)-->
                        <div class="mb-3">
                            <input name="confirm_password" class="form-control" id="confirmPassword" type="password" placeholder="Nhập lại mật khẩu mới" >
                            @error('confirm_password')
                                <small class="help-block">{{$message}}</small>
                        @enderror
                        </div>
                        <button class="btn btn-primary" type="submit">Lưu</button>
                    </form>
                </div>
            </div>
            <!-- Security preferences card-->
        </div>
    </div>
</div>
@endsection