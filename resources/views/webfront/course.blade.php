<!DOCTYPE html>
<html lang="en">

<head>
    <title>Vision Foreign Language Center</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="description" content="">
    <meta name="keywords" content="app, landing, corporate, Creative, Html Template, Template">
    <meta name="author" content="web-themes">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/course.css">
    <link rel="icon" type="image/png" href="/images/Backup_of_logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&family=Merriweather+Sans:ital,wght@0,300..800;1,300..800&family=Red+Hat+Text:ital,wght@0,300..700;1,300..700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="/css/fontawesome.min.css" rel="stylesheet" type="text/css" />
    <link href="/css/owl.carousel.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/css/stylesheet.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

</head>

<body>
    @include('header')
    <main>
        <div class="container-course container-fluid">
            <div id="card_wrapper">
                <div class="container-content row">
                    <div class="container-content-course">
                        <div class="container">
                            <div class="section-title">
                                <h2>Khóa học Giao tiếp</h2>
                                <p>Qua Phim</p>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row justify-content-center content-course-detail">
                                <div class="col-12 text-statistical-english">
                                    <lord-icon class="d-inline-block align-middle"
                                        src="https://cdn.lordicon.com/hqymfzvj.json" trigger="loop" delay="1500"
                                        state="in-add-card" colors="primary:#ffffff" style="width:40px;height:40px">
                                    </lord-icon><a href="">Gồm có {{ !empty($course_english) ? count($course_english) : 0 }} khóa học</a>
                                </div>
                                <div class="col-12 text-sub-english">
                                    <lord-icon class="d-inline-block align-middle"
                                        src="https://cdn.lordicon.com/jkzgajyr.json" trigger="loop" delay="2000"
                                        colors="primary:#ffffff" style="width:40px;height:40px">
                                    </lord-icon><a href="">Khóa học Tiếng Anh</a>
                                </div>
                                <div class="col-12">
                                    <div class="owl-carousel slider_carousel">
                                        @foreach ($course_english as $course)
                                            <div class="card_box">
                                                <div class="image-container">
                                                    <img class="img avatar-teacher"
                                                        src="{{ asset('photodata/' . $course->photo) }}"
                                                        alt="image_course">
                                                </div>
                                                <div class="card_text">
                                                    <h4 class="name_course">{{ $course->name }}</h4>
                                                    <p><i class="fa-solid fa-coins" style="color: #ffffff;"></i>
                                                        {{ $course->price }} USD</p>
                                                    <p><i class="fa-regular fa-clock"></i> {{ $course->teacherid }}</p>
                                                    <a href="{{route('course-detail', $course->id)}}" class="btn btn-primary">Xem ngay</a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-12 text-statistical-english">
                                    <lord-icon class="d-inline-block align-middle"
                                        src="https://cdn.lordicon.com/hqymfzvj.json" trigger="loop" delay="1500"
                                        state="in-add-card" colors="primary:#ffffff" style="width:40px;height:40px">
                                    </lord-icon><a href="">Gồm có {{ !empty($course_korean) ? count($course_korean) : 0 }} khóa học</a>
                                </div>
                                <div class="col-12 text-sub-english">
                                    <lord-icon class="d-inline-block align-middle"
                                        src="https://cdn.lordicon.com/jkzgajyr.json" trigger="loop" delay="2000"
                                        colors="primary:#ffffff" style="width:40px;height:40px">
                                    </lord-icon><a href="">Khóa học Tiếng Hàn</a>
                                </div>
                                <div class="col-12">
                                    <div class="owl-carousel slider_carousel">
                                        @foreach ($course_korean as $course)
                                            <div class="card_box">
                                                <div class="image-container">
                                                    <img class="img avatar-teacher"
                                                        src="{{ asset('photodata/' . $course->photo) }}"
                                                        alt="image_course">
                                                </div>
                                                <div class="card_text">
                                                    <h4 class="name_course">{{ $course->name }}</h4>
                                                    <p><i class="fa-solid fa-coins" style="color: #ffffff;"></i>
                                                        {{ $course->price }} USD</p>
                                                    <p><i class="fa-regular fa-clock "></i> {{ $course->teacherid }}
                                                    </p>
                                                    <a href="/korean-detail" class="btn btn-primary">Xem ngay</a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-register container">
            <div class="align-items-center text-center">
                <button id="showFormButton" class="btn btn-register mb-3"><a
                        href="https://docs.google.com/forms/d/15UKsgs0jwwZVSIMVj_TeBMvcogushZhcctAxjSNiyM0/edit"
                        target="_blank">Đăng Ký để được Tư Vấn Miễn phí ngay!</a>
                </button>
            </div>
        </div>
        {{-- review  --}}
        @include('review')
        @include('answer-question')

        <!-- Footer -->
    </main>
    @include('footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/myscript.js"></script>
    <script src="/js/jquery-3.4.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/owl.carousel.min.js"></script>

    <script>
        function slider_carouselInit() {
            $('.owl-carousel.slider_carousel').owlCarousel({
                dots: false,
                loop: true,
                margin: 30,
                stagePadding: 2,
                autoplay: false,
                nav: true,
                navText: ["<i class='fa-solid fa-caret-left'></i>", "<i class='fa-solid fa-caret-right'></i>"],
                autoplayTimeout: 1500,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: false // Hide navigation arrows on mobile devices
                    },
                    768: {
                        items: 2,
                        nav: true // Show navigation arrows on larger screens
                    },
                    992: {
                        items: 3,
                        nav: true // Show navigation arrows on larger screens
                    },
                    1300: {
                        items: 4,
                        nav: true // Show navigation arrows on larger screens
                    }
                }
            });
        }


        slider_carouselInit();

        // Đảm bảo tất cả các phần tử HTML đã được tải xong trước khi chạy mã JavaScript
        document.addEventListener("DOMContentLoaded", function() {
            // Kiểm tra xem trang hiện tại có phải là trang "home" không
            if (window.location.href.endsWith("/home") || window.location.href.endsWith("/")) {
                // Nếu là trang "home", loại bỏ lớp "active" khỏi mục "home" trong header
                var homeItem = document.querySelector('.header-home');
                if (homeItem) {
                    // homeItem.classList.remove('active');
                }
            }

            // Kiểm tra xem trang hiện tại có phải là trang "course" không
            if (window.location.href.includes("/course")) {
                // Nếu là trang "course", thêm lớp "active" cho mục "course" trong header
                var courseItem = document.querySelector('.header-course');
                if (courseItem) {
                    courseItem.classList.add('active');
                }
            }
        });
    </script>
    <script>
        // Tạo một trình quan sát với các tùy chọn
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        });

        // Theo dõi các phần tử có lớp "lazy-load"
        const lazyLoadElements = document.querySelectorAll('.lazy-load');
        lazyLoadElements.forEach(element => {
            observer.observe(element);
        });
    </script>

    <script>
        // Thêm sự kiện click cho nút "Đăng Ký"
        document.getElementById("showFormButton").addEventListener("click", function() {
            // Hiển thị form đăng ký thông tin
            document.getElementById("container-register").style.display = "block";
        });
    </script>

    <script type="" src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/js/swiper.min.js"></script>
    <script type="" src="/js/slider-swiper-script.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="/js/aos.js"></script>
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
</body>

</html>
