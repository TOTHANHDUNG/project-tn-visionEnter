<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Vision Foreign Language Center </title>
    <link rel="icon" type="image/png" href="/images/Backup_of_logo.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/try-learning.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/try-learning.css">
    <link rel="stylesheet" href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


</head>

<body>
    <!-- header -->
    <div class="container-fluid">
        <div class="container-navbar">
            <nav class="navbar navbar-expand-xl">
                <div class="container">
                    <a href="/home" class="navbar-brand"><img src="/images/logo1.png" alt="Logo"></a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!-- Collection of nav links, forms, and other content for toggling -->
                    <div id="navbarCollapse" class="collapse navbar-collapse justify-content-center">
                        <div class="navbar-nav">
                            <a href="#video-lesson" class="nav-item nav-link header-home">Nội dung</a>
                            <a href="#learn-lesson" class="nav-item nav-link header-course">Tìm hiểu bài học</a>
                            <a href="#learn-vocabulary" class="nav-item nav-link">Từ vựng</a>
                            <a href="#review" class="nav-item nav-link">Đánh giá</a>
                            <a href="#contact" class="nav-item nav-link">Liên hệ</a>
                            <a href="#" class="nav-item nav-link">VI</a>
                        </div>
                    </div>
                    <div class="navbar-btn ml-auto action-buttons d-flex justify-content-center">
                        @guest
                            <div class="nav-item ml-auto action-buttons">
                                <a href="/login" class="btn btn-login">Đăng nhập</a>
                                <a href="/registration" class="btn sign-up-btn">Đăng ký</a>
                            </div>
                        @else
                            <div class="nav-item ml-auto action-buttons">
                                <div class="dropdown mr-5">
                                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button"
                                        id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                        @if (trim(Auth::user()->photo))
                                            <img src="{{ asset('photodata/' . Auth::user()->photo) . '?' . time() }}"
                                                alt="Avatar" class="cover-avatar me-2">
                                        @else
                                            <img src="{{ asset('photodata/avatar.png') }}" alt="Avatar"
                                                class="cover-avatar me-2">
                                        @endif
                                        <span>{{ Auth::user()->name }}</span>
                                    </a>
    
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="/profile">Xem Hồ Sơ Cá Nhân</a></li>
                                        <li><a class="dropdown-item" href="#">Cài Đặt</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                            <form action="{{ route('logout') }}" method="POST">
                                                @csrf
                                                <button type="submit" class="dropdown-item"
                                                    onclick="return confirmLogout()">Đăng Xuất</button>
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
        <div class="content-video justify-content-center" id="video-lesson">
            <div class="row">
                <div class="col-xl-9">
                    <div class="main-video-container">
                        <video src="{{ $movies[0]->url }}" controls class="main-video" id="videoPlayer"></video>
                        <h3 class="main-vid-title">{{ $movies[0]->title }}</h3>
                        <h6 class="release-date"{{ date('d/m/y', strtotime($movies[0]->created_at)) }}</h6>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="video-list-container">
                        {{-- @dd($movies); --}}
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($movies as $movie)
                            @if ($i == 0)
                                <div class="list active">
                                    <video src="{{ $movie->url }}" class="list-video"></video>

                                    <h3 class="list-title">{{ $movie->title }}</h3>
                                </div>
                                @php
                                    $i++;
                                @endphp
                                @continue
                            @endif
                            <div class="list">
                                <video src="{{ $movie->url }}" class="list-video"></video>
                                <h3 class="list-title">{{ $movie->title }} </h3>
                            </div>
                        @endforeach
                        {{-- <div class="list active">
                            <video src="videos/Fake-food.mp4" class="list-video"></video>

                            <h3 class="list-title">house flood animationnnnnnnnnnnnnnn</h3>
                        </div>

                        <div class="list">
                            <video src="videos/Online-scam.mp4" class="list-video"></video>
                            <h3 class="list-title">zoombie walking animation</h3>
                        </div>

                        <div class="list">
                            <video src="videos/War-Veteran.mp4" class="list-video"></video>
                            <h3 class="list-title">emoji falling animation</h3>
                        </div>
                        <div class="list ">
                            <video src="videos/Fake-food.mp4" class="list-video"></video>

                            <h3 class="list-title">house flood animationnnnnnnnnnnnnnn</h3>
                        </div>

                        <div class="list">
                            <video src="videos/Online-scam.mp4" class="list-video"></video>
                            <h3 class="list-title">zoombie walking animation</h3>
                        </div>

                        <div class="list">
                            <video src="videos/War-Veteran.mp4" class="list-video"></video>
                            <h3 class="list-title">emoji falling animation</h3>
                        </div>
                        <div class="list">
                            <video src="videos/Fake-food.mp4" class="list-video"></video>

                            <h3 class="list-title">house flood animationnnnnnnnnnnnnnn</h3>
                        </div>

                        <div class="list">
                            <video src="videos/Online-scam.mp4" class="list-video"></video>
                            <h3 class="list-title">zoombie walking animation</h3>
                        </div>

                        <div class="list">
                            <video src="videos/War-Veteran.mp4" class="list-video"></video>
                            <h3 class="list-title">emoji falling animation</h3>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="button-prev-next-video">
                <div class="container">
                    <div class="text-center fixed-bottom">
                        <button id="prevButton" class="btn btn-prev mr-2">
                            <lord-icon src="https://cdn.lordicon.com/vduvxizq.json" trigger="hover"
                                colors="primary:#ffffff"
                                style="width:20px;height:20px; transform: rotate(180deg); padding:0 0 24px 10px;">
                            </lord-icon>
                            Bài trước
                        </button>
                        <button id="nextButton" class="btn btn-next">
                            Bài tiếp theo
                            <lord-icon src="https://cdn.lordicon.com/vduvxizq.json" trigger="hover"
                                colors="primary:#ffffff" style="width:20px;height:20px; padding: 3px 0 0 5px;">
                            </lord-icon>
                        </button>
                    </div>
                </div>
            </div>
            <div class="my-5">
                <div class="row gx-5 justify-content-center">
                    <!-- Experience Section-->
                    <section>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h2 class="text-primary fw-bolder mb-0">Tìm hiểu bài học</h2>
                        </div>
                        <!-- Experience Card 1-->
                        <div class="card shadow rounded-4 mb-5" id="learn-lesson">
                            <div class="card-body">
                                <div class="row align-items-center gx-5">
                                    <div class="col text-center text-lg-start mb-4 mb-lg-0">
                                        <div class=" p-4 rounded-4">
                                            <div class="text-primary fw-bolder mb-2">Tài liệu văn bản</div>
                                            <div class="small fw-bolder"></div>
                                            <div class="small text-muted">Stark Industries</div>
                                            <div class="small text-muted">Los Angeles, CA</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="text-content">
                                            <div class="content">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus
                                                laudantium, voluptatem quis repellendus eaque sit animi illo ipsam
                                                amet
                                                officiis corporis sed aliquam non voluptate corrupti excepturi
                                                maxime
                                                porro fuga.
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus
                                                laudantium, voluptatem quis repellendus eaque sit animi illo ipsam
                                                amet
                                                officiis corporis sed aliquam non voluptate corrupti excepturi
                                                maxime
                                                porro fuga.
                                            </div>
                                            <button class="btn btn-sm toggle-content">Xem thêm</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Experience Card 2-->
                        <div class="card shadow rounded-4 mb-5" id="learn-vocabulary">
                            <div class="card-body">
                                <div class="row align-items-center gx-5">
                                    <div class="col text-center text-lg-start mb-4 mb-lg-0">
                                        <div class="bg-light p-4 rounded-4">
                                            <div class="text-primary fw-bolder mb-2">Tài liệu văn bản</div>
                                            <div class="small fw-bolder"></div>
                                            <div class="small text-muted">Stark Industries</div>
                                            <div class="small text-muted">Los Angeles, CA</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="text-content">
                                            <div class="content">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus
                                                laudantium, voluptatem quis repellendus eaque sit animi illo ipsam
                                                amet
                                                officiis corporis sed aliquam non voluptate corrupti excepturi
                                                maxime
                                                porro fuga.
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus
                                                laudantium, voluptatem quis repellendus eaque sit animi illo ipsam
                                                amet
                                                officiis corporis sed aliquam non voluptate corrupti excepturi
                                                maxime
                                                porro fuga.
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus
                                                laudantium, voluptatem quis repellendus eaque sit animi illo ipsam
                                                amet
                                                officiis corporis sed aliquam non voluptate corrupti excepturi
                                                maxime
                                                porro fuga.

                                            </div>
                                            <button class="btn  btn-sm toggle-content">Xem thêm</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Education Section-->
                    <section class=" exercise-course">
                        <h2 class="text-secondary fw-bolder mb-4">Bài tập</h2>
                        <div class="align-items-center gx-5">
                            <div class="card-body col text-center text-lg-start ">
                                <div class="row align-items-center gx-5">
                                    <div class="col-12">
                                        <div id="video-container">
                                            <video id="video-player" src="/videos/Fake-food.mp4" controls
                                                style="width: 100%; height: auto;"></video>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    </section>
                    {{-- review --}}
                    <div class="container container-rating d-flex justify-content-center align-items-center">
                        <div id="review" class="wrapper">
                            <h3>Đánh giá về bài học.</h3>
                            @if (auth()->check())
                                <div id="rateYo"></div>
                            @else
                                <div id="rateYo1"></div>
                            @endif
                            <form action="{{ route('save-rating') }}" method="POST" id="ratingForm">
                                @csrf
                                <div class="form-group">
                                    <input type="number" name="rating" hidden>
                                    <div class="rating">
                                        <i class='bx bx-star star' style="--i: 0;" data-value="1"></i>
                                        <i class='bx bx-star star' style="--i: 1;" data-value="2"></i>
                                        <i class='bx bx-star star' style="--i: 2;" data-value="3"></i>
                                        <i class='bx bx-star star' style="--i: 3;" data-value="4"></i>
                                        <i class='bx bx-star star' style="--i: 4;" data-value="5"></i>
                                        <input type="hidden" name="rating" value="0">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea name="opinion" class="form-control" rows="5" placeholder="Ý kiến của bạn..." required></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="btn-group">
                                        <button type="submit" class="btn btn-primary">Gửi</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    @include('footer')

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="/js/try-learning.js"></script>
    <script>
        //sự kiện click video
        const videoContainer = document.getElementById('video-container');
        const videoPlayer = document.getElementById('video-player');

        videoContainer.addEventListener('click', () => {
            if (videoPlayer.paused) {
                videoPlayer.play();
            } else {
                videoPlayer.pause();
            }
        });


        //review
        const allStar = document.querySelectorAll('.rating .star');
        const ratingValue = document.querySelector('.rating input');

        allStar.forEach((star, index) => {
            star.addEventListener('click', () => {
                ratingValue.value = index + 1;

                allStar.forEach(s => {
                    s.classList.replace('bxs-star', 'bx-star');
                    s.classList.remove('active');
                });

                for (let i = 0; i <= index; i++) {
                    allStar[i].classList.replace('bx-star', 'bxs-star');
                    allStar[i].classList.add('active');
                }
            });
        });
        document.querySelectorAll('.star').forEach((star, index) => {
            star.addEventListener('click', () => {
                let rating = index + 1;
                document.querySelector('input[name="rating"]').value = rating;
                updateStarActive(rating);
            });
        });

        function updateStarActive(rating) {
            document.querySelectorAll('.star').forEach((star, index) => {
                if (index < rating) {
                    star.classList.add('active');
                } else {
                    star.classList.remove('active');
                }
            });
        }
        //sự kiện submit review
        $(document).ready(function() {
            $('form').submit(function(event) {
                event.preventDefault(); // Prevent default form submission
                var formData = $(this).serialize(); // Serialize form data
                var url = $(this).attr('action'); // Get form action URL

                // Send Ajax request
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: formData,
                    success: function(response) {
                        // Handle success response, e.g., show a success message
                        alert('Đã gửi đánh giá thành công!');
                    },
                    error: function(error) {
                        // Handle error response, e.g., show an error message
                        alert('Đã xảy ra lỗi khi gửi đánh giá!');
                    }
                });
            });
        });


        //ẩn văn bản nếu quá nhiều
        const toggleContentBtns = document.querySelectorAll('.toggle-content');
        const textContents = document.querySelectorAll('.text-content');

        toggleContentBtns.forEach((btn, index) => {
            btn.addEventListener('click', () => {
                textContents[index].classList.toggle('open');
                btn.textContent = textContents[index].classList.contains('open') ? 'Ẩn bớt' : 'Xem thêm';
            });
        });

        //sự kiện click Bài tiếp theo
        const videos = document.querySelectorAll('.list-video');
        const titles = document.querySelectorAll('.list-title');
        const listItems = document.querySelectorAll('.list');

        let currentVideoIndex = 0;

        document.getElementById('nextButton').addEventListener('click', function(event) {
            event.preventDefault();

            videos[currentVideoIndex].pause();
            listItems[currentVideoIndex].classList.remove('active');

            currentVideoIndex = (currentVideoIndex + 1) % videos.length;

            videos[currentVideoIndex].play();
            listItems[currentVideoIndex].classList.add('active');

            document.querySelector('.main-vid-title').textContent = titles[currentVideoIndex].textContent;
            document.querySelector('.main-video').src = videos[currentVideoIndex].src;
        });

        document.getElementById('prevButton').addEventListener('click', function(event) {
            event.preventDefault();

            videos[currentVideoIndex].pause();
            listItems[currentVideoIndex].classList.remove('active');

            currentVideoIndex = (currentVideoIndex - 1 + videos.length) % videos.length;

            videos[currentVideoIndex].play();
            listItems[currentVideoIndex].classList.add('active');

            document.querySelector('.main-vid-title').textContent = titles[currentVideoIndex].textContent;
            document.querySelector('.main-video').src = videos[currentVideoIndex].src;
        });

        //mua khóa học nếu muốn xem hết video
        let isPurchased = false; // Mặc định người dùng chưa mua
        let maxVideosAllowed = 3; // Số video tối đa được xem nếu chưa mua

        function playVideo(index) {
            if ((isPurchased) || (index < maxVideosAllowed)) {
                let selectedVideo = danhSachVideo[index];
                let videoElement = $('#videoPlayer');
                videoElement.attr('src', selectedVideo.videoUrl);
                videoElement.get(0).play();
            } else {
                alert('Bạn cần mua khóa học để xem thêm video!');
            }
        }
    </script>

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
        $(document).on("click", ".action-buttons .dropdown-menu", function(e) {
            e.stopPropagation();

        });
        $(document).ready(function() {
            // Ngăn chặn sự kiện lan truyền khi click vào menu thả xuống
            $('.action-buttons .dropdown-menu').on('click', function(e) {
                e.stopPropagation(); // Ngăn chặn sự kiện lan truyền lên các phần tử cha
            });
        });
    </script>

</body>

</html>
