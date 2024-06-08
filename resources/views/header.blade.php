<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Varela+Round">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/header.css">

</head> 
<body>
	<div class="container-fuild container-navbar">
		<nav class="navbar navbar-expand-xl ">
			<a href="/home" class="navbar-brand"><img src="/images/logo1.png" style="width: 70px"></a>  		
			<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
				<span class="navbar-toggler-icon"></span>
			</button>
			<!-- Collection of nav links, forms, and other content for toggling -->
			<div id="navbarCollapse" class="collapse navbar-collapse justify-content-center">
				<div class="navbar-nav">
					<a href="/home" class="nav-item nav-link header-home ">Trang chủ</a>
					<a href="/course" class="nav-item nav-link header-course ">Khóa học</a>
					<a href="#card_wrapper" class="nav-item nav-link">Giáo viên</a>			
					<div class="nav-item dropdown">
						<a href="#" data-toggle="dropdown" class="nav-item nav-link dropdown-toggle">Lịch câu lạc bộ</a>
						<div class="dropdown-menu">					
							<a href="#" class="dropdown-item">Tiếng Anh</a>
							<a href="#" class="dropdown-item">Tiếng Hàn</a>
							<a href="#" class="dropdown-item">Graphic Design</a>
							<a href="#" class="dropdown-item">Digital Marketing</a>
						</div>
					</div>
					<a href="#" class="nav-item nav-link ">Tin tức</a>
					<a href="#contact" class="nav-item nav-link">Liên hệ</a>
					<a href="#" class="nav-item nav-link">VI</a>
				</div>
				<form class="navbar-form form-inline">
					<div class="input-group search-box">								
						<input type="text" id="search" class="form-control" placeholder="Nhập từ khóa...">
						<div class="input-group-append">
							<span class="input-group-text">
								<i class="material-icons">&#xE8B6;</i>
							</span>
						</div>
					</div>
				</form>
				<div class="navbar-btn ml-auto action-buttons d-flex justify-content-center">
                    @guest
                        <div class="nav-item ml-auto action-buttons">
                            <a href="/login" class="btn btn-login">Đăng nhập</a>
                            <a href="/registration" class="btn sign-up-btn">Đăng ký</a>
                        </div>
                    @else
                        <div class="nav-item ml-auto action-buttons">
                            <div class="dropdown mr-5">
                                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ Auth::user()->photo ? asset('photodata/' . Auth::user()->photo) : asset('photodata/ba.png') }}" alt="Avatar" class="cover-avatar me-2" style="width: 60px">
                                    <span>{{ Auth::user()->name }}</span> <!-- Hiển thị tên người dùng -->
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="/profile">Xem Hồ Sơ Cá Nhân</a></li>
                                    <li><a class="dropdown-item" href="#">Cài Đặt</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <!-- Sử dụng onclick để gọi hàm confirmLogout() khi nhấp vào nút Logout -->
                                            <button type="submit" class="dropdown-item" onclick="return confirmLogout()">Đăng Xuất</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                                                    
                        </div>
                        
                    @endguest
                </div>
			</div>
		</nav>
	</div>
    <script>
        function confirmLogout() {
            if (confirm('Bạn có chắc chắn muốn đăng xuất không?')) {
                // Nếu người dùng nhấn OK, chuyển hướng đến trang logout
                window.location.href = "{{ route('logout') }}";
            } else {
                // Nếu người dùng nhấn Cancel, không làm gì cả
                return false;
            }
        }

    </script>
            <script>
                // Prevent dropdown menu from closing when click inside the form
                $(document).on("click", ".action-buttons .dropdown-menu", function(e){
                    e.stopPropagation();
					
                });
                </script>
</body>
</html>