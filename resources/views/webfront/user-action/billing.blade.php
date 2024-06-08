@extends('webfront.user-action.all-action-user')

@section('content-billing')
<div class="container-xl px-4 mt-4">
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-lg-4 mb-4">
            <!-- Billing card 1-->
            <div class="card h-100 border-start-lg border-start-primary">
                <div class="card-body">
                    <div class="small text-muted">Tổng hóa đơn tháng này</div>
                    <div class="h3">499.000đ</div>
                    <a class="text-arrow-icon small" href="#!">
                        Chuyển sang thanh toán hằng năm
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <!-- Billing card 2-->
            <div class="card h-100 border-start-lg border-start-secondary">
                <div class="card-body">
                    <div class="small text-muted">Khoản thanh toán tiếp theo đến hạn</div>
                    <div class="h3">20/1/2024</div>
                    <a class="text-arrow-icon small text-secondary" href="#!">
                        Xem lịch sử thanh toán
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <!-- Billing card 3-->
            <div class="card h-100 border-start-lg border-start-success">
                <div class="card-body">
                    <div class="small text-muted">Kế hoạch hiện tại</div>
                    <div class="h3 d-flex align-items-center">Designer</div>
                    <a class="text-arrow-icon small text-success" href="#!">
                        Kế hoạch nâng cao
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Payment methods card-->
    <div class="card card-header-actions mb-4">
        <div class="card-header">
            Phương thức thanh toán
            <button class="btn btn-sm btn-primary" type="button">Thêm phương thức thanh toán</button>
        </div>
        <div class="card-body px-0">
            <!-- Payment method 1-->
            <div class="d-flex align-items-center justify-content-between px-4">
                <div class="d-flex align-items-center">
                     <i class="fab fa-cc-paypal fa-2x cc-color-paypal"></i>
                    <div class="ms-4">
                        <div class="small">Paypal</div>
                        <div class="text-xs text-muted">Thanh toán gần nhất: 20/5/2024</div>
                    </div>
                </div>
                <div class="ms-4 small">
                    <div class="badge bg-light text-dark me-3">Mặc định</div>
                    <a href="#!">Sửa</a>
                </div>
            </div>
            <hr>
            <!-- Payment method 2-->
            <div class="d-flex align-items-center justify-content-between px-4">
                <div class="d-flex align-items-center">
                    <i class="fab fa-cc-mastercard fa-2x cc-color-mastercard"></i>
                    <div class="ms-4">
                        <div class="small">Mastercard</div>
                        <div class="text-xs text-muted">Thanh toán gần nhất: </div>
                    </div>
                </div>
                <div class="ms-4 small">
                    <a class="text-muted me-3" href="#!">Làm mặc định</a>
                    <a href="#!">Sửa</a>
                </div>
            </div>
            <hr>
            <!-- Payment method 3-->
            <div class="d-flex align-items-center justify-content-between px-4">
                <div class="d-flex align-items-center">
                    <i class="fab fa-cc-amex fa-2x cc-color-amex"></i>
                    <div class="ms-4">
                        <div class="small">American Express</div>
                        <div class="text-xs text-muted">Thanh toán gần nhất:</div>
                    </div>
                </div>
                <div class="ms-4 small">
                    <a class="text-muted me-3" href="#!">Làm mặc định</a>
                    <a href="#!">Sửa</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Billing history card-->
    <div class="card mb-4">
        <div class="card-header">Lịch sử thanh toán</div>
        <div class="card-body p-0">
            <!-- Billing history table-->
            <div class="table-responsive table-billing-history">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th class="border-gray-200" scope="col">Mã giao dịch</th>
                            <th class="border-gray-200" scope="col">Ngày</th>
                            <th class="border-gray-200" scope="col">Số tiền</th>
                            <th class="border-gray-200" scope="col">Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#39201</td>
                            <td>06/15/2021</td>
                            <td>$29.99</td>
                            <td><span class="badge bg-light text-dark">Pending</span></td>
                        </tr>
                        <tr>
                            <td>#38594</td>
                            <td>05/15/2021</td>
                            <td>$29.99</td>
                            <td><span class="badge bg-success">Paid</span></td>
                        </tr>
                        <tr>
                            <td>#38223</td>
                            <td>04/15/2021</td>
                            <td>$29.99</td>
                            <td><span class="badge bg-success">Paid</span></td>
                        </tr>
                        <tr>
                            <td>#38125</td>
                            <td>03/15/2021</td>
                            <td>$29.99</td>
                            <td><span class="badge bg-success">Paid</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection