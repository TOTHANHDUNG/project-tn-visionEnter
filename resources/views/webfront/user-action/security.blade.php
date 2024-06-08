@extends('webfront.user-action.all-action-user')

@section('content-security')
<div class="container-xl px-4 mt-4  justify-content-center align-items-center">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <!-- Change password card-->
            <div class="card mb-4">
                <div class="card-header">Đổi mật khẩu</div>
                <div class="card-body">
                    <form>
                        <!-- Form Group (current password)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="currentPassword">Mật khẩu cũ</label>
                            <input class="form-control" id="currentPassword" type="password" placeholder="Nhập mật khẩu cũ">
                        </div>
                        <!-- Form Group (new password)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="newPassword">Mật khẩu mới</label>
                            <input class="form-control" id="newPassword" type="password" placeholder="Nhập mật khẩu mới">
                        </div>
                        <!-- Form Group (confirm password)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="confirmPassword">Xác nhận mật khẩu</label>
                            <input class="form-control" id="confirmPassword" type="password" placeholder="Nhập lại mật khẩu mới">
                        </div>
                        <button class="btn btn-primary" type="button">Lưu</button>
                    </form>
                </div>
            </div>
            <!-- Security preferences card-->
        </div>
    </div>
</div>
@endsection