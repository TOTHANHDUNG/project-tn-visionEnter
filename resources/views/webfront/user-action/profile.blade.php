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
                    <img class="img-account-profile rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4">JPG hoặc PNG không quá 5MB</div>
                    <!-- Profile picture upload button-->
                    <button class="btn btn-primary" type="button">Tải ảnh lên</button>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Chi tiết hồ sơ</div>
                <div class="card-body">
                    <form>
                        <!-- Form Group (username)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Tên đầy đủ</label>
                            <input class="form-control" id="inputUsername" type="text" placeholder="Nhập tên bạn..." value="">
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">Địa chỉ Email</label>
                            <input class="form-control" id="inputEmailAddress" type="email" placeholder="Nhập địa chỉ Email của bạn..." value="">
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">Số điện thoại</label>
                                <input class="form-control" id="inputPhone" type="tel" placeholder="Nhập số điện thoại của bạn..." value="">
                            </div>
                            <!-- Form Group (birthday)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputBirthday">Ngày sinh</label>
                                <input class="form-control" id="inputBirthday" type="text" name="birthday" placeholder="Nhập ngày sinh..." value="">
                            </div>
                        </div>
                        <!-- Save changes button-->
                        <button class="btn btn-primary" type="button">Lưu thay đổi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection