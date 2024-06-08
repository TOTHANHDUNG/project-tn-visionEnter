@extends('admin.layout')
@section('title','Login')
@section('content')
<div class="container">
    <!-- Password Reset 1 - Bootstrap Brain Component -->
<div class=" forget-ps">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-12 col-md-11 col-lg-8 col-xl-7 col-xxl-6">
          <div class="bg-white p-4 p-md-5 rounded shadow-sm">
            <div class="row gy-3 mb-5">
              <div class="col-12">
                <div class="text-center">
                  <a href="#!">
                    <img src="/images/vision-new.png" alt="" width="100" height="">
                  </a>
                </div>
              </div>
              <div class="col-12">
                <h2 class="fs-6 fw-normal text-center text-secondary m-0 px-md-5">Cung cấp địa chỉ email được liên kết với tài khoản của bạn để khôi phục mật khẩu.</h2>
              </div>
            </div>
            <form action="#!">
              <div class="row gy-3 gy-md-4 overflow-hidden">
                <div class="col-12">
                  <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                  <div class="input-group">
                    <span class="input-group-text">
                        <lord-icon
                        src="https://cdn.lordicon.com/nzixoeyk.json"
                        trigger="loop"
                        delay="2000"
                        style="width:10px;height:10px;">
                    </lord-icon>
                    </span>
                    <input type="email" class="form-control" name="email" id="email" required>
                  </div>
                </div>
                <div class="col-12">
                  <div class="d-grid">
                    <button class="btn btn-primary btn-lg" type="submit">Đặt lại mật khẩu</button>
                  </div>
                </div>
              </div>
            </form>
            <div class="row">
              <div class="col-12">
                <hr class="mt-5 mb-4 border-secondary-subtle">
                <div class="d-flex gap-4 justify-content-center">
                  <a href="/login" class="link-secondary text-decoration-none">Đăng nhập</a>
                  <a href="/registration" class="link-secondary text-decoration-none">Đăng ký</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
