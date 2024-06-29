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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/english-detail.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body>
    {{-- header  --}}
    <div class="container container-navbar">
        <nav class="navbar navbar-expand-xl">
            <div class="container">
                <a href="/home" class="navbar-brand"><img src="/images/logo1.png"></a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Collection of nav links, forms, and other content for toggling -->
                <div id="navbarCollapse" class="collapse navbar-collapse justify-content-center">
                    <div class="navbar-nav">
                        <a href="#content-english-detail" class="nav-item nav-link header-home ">Nội dung</a>
                        <a href="#course-mkt" class="nav-item nav-link header-course ">Điểm khác biệt</a>
                        <a href="/course" class="nav-item nav-link">Các khóa học</a>
                        <a href="#review" class="nav-item nav-link ">Đánh giá</a>
                        <a href="#contact" class="nav-item nav-link">Liên hệ</a>
                        <a href="#answer" class="nav-item nav-link">Hỏi & Đáp</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <div class="container" id="content-english-detail">
        <div class="content-infor">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="text-center">Mẹo học tiếng anh siêu nhanh qua <span>Phim</span></h1>
                        <p class="text-center">Khóa học <span>đặc biệt</span> được thiết kế nhằm giúp bạn <span>nâng
                                cao</span> kỹ năng tiếng Anh.</p>
                        <div class="text-center d-flex justify-content-center">
                            @if(!Auth::check() || empty($boughtCourse))
                                <button class="btn btn-hocthu mr-3">
                                    <a href="{{route('learn', [$courseDetail->id])}}">Học thử miễn phí!!</a>
                                    <lord-icon src="https://cdn.lordicon.com/aklfruoc.json" trigger="loop" delay="2000"
                                        style="width:20px;height:20px; padding-top: 3px"></lord-icon>
                                </button>
                            @endif

                            @if(Auth::check())
                                @if(!empty($boughtCourse))
                                <button class="btn btn-hocthu mr-3">
                                    <a href="{{route('learn', [$courseDetail->id])}}">Học ngay!!</a>
                                    <lord-icon src="https://cdn.lordicon.com/aklfruoc.json" trigger="loop" delay="2000"
                                        style="width:20px;height:20px; padding-top: 3px"></lord-icon>
                                </button>
                                @else
                                <button class="btn btn-muakhoahoc ml-3">
                                    <a href="{{route('pricing.processTransaction', $courseDetail->id)}}">Mua khóa học</a>
                                    <lord-icon src="https://cdn.lordicon.com/mfmkufkr.json" trigger="loop" delay="2000"
                                        colors="primary:#ffffff" style="width:20px;height:20px; padding-top: 3px"></lord-icon>
                                </button>
                                @endif

                            @else
                            <button class="btn btn-muakhoahoc ml-3">
                                <a href="{{route('pricing.processTransaction', $courseDetail->id)}}">Login để mua khoá học</a>
                                <lord-icon src="https://cdn.lordicon.com/mfmkufkr.json" trigger="loop" delay="2000"
                                    colors="primary:#ffffff" style="width:20px;height:20px; padding-top: 3px"></lord-icon>
                            </button>
                            @endif
                        </div>
                        <div class="text-center d-flex justify-content-center" style="margin-top:20px">
                            <button class="btn btn-hocthu mr-3">
                                Giá: {{$courseDetail->price}} USD
                            </button>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <div class="container my-5">
            <div class="row justify-content-center">
              <div class="col-12 col-md-10 col-lg-8">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/Ohe1S02HJqo?si=Z7QVLDRDgOyjc1h6" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>                </div>
              </div>
            </div>
          </div>
        {{-- maketing course --}}
        <div id="course-mkt">
            <div class="container-youtube">
                <div class="row container-content d-flex justify-content-center align-items-center">
                    <div class="col-xl-6 col-lg-6 d-flex justify-content-center align-items-center flex-column">
                        <div class="col-xl-12">
                            <h2>Khóa học</br> <span> thiết kế</span>
                            </br>theo kiểu</br><span>Team building</span></h2>
                            <p>Phương pháp tư duy học khác biệt của Sal Khan dựa trên một số nguyên tắc và chiến lược cụ thể nhằm tạo ra một trải nghiệm học tập cá nhân hóa và hiệu quả.</p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 d-flex justify-content-center">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe width="300px" height="169px" src="https://www.youtube.com/embed/I1XBZADuWnQ?si=izbh7e-syhC543Ey" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-youtube">
                <div class="row container-content d-flex justify-content-center align-items-center">
                    <div class="col-xl-6 col-lg-6 d-flex justify-content-center">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/AXYmL-vv84w?si=EYEzxTDM62oiziv_" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 d-flex justify-content-center align-items-center flex-column">
                        <div class="col-xl-12">
                            <h2>Cách dạy</br> <span>Độc đáo</span>
                            </br>được thiết kế bởi</br><span>Giáo viên Vision</span></h2>
                            <p>có thể kết hợp các yếu tố sáng tạo, công nghệ hiện đại và phương pháp giáo dục tiên tiến để tạo ra một trải nghiệm học tập thú vị và hiệu quả.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-youtube">
                <div class="row container-content d-flex justify-content-center align-items-center">
                    <div class="col-xl-6 col-lg-6 d-flex justify-content-center align-items-center flex-column">
                        <div class="col-xl-12">
                            <h2>Tư duy học</br> <span>Khác biệt</span>
                            </br>được kiểm chứng bởi </br><span>Sal Khan</span></h2>
                            <p>Phương pháp tư duy học khác biệt của Sal Khan dựa trên một số nguyên tắc và chiến lược cụ thể nhằm tạo ra một trải nghiệm học tập cá nhân hóa và hiệu quả.</p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 d-flex justify-content-center">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe width="300" height="169" src="https://www.youtube.com/embed/Vgc_pwDxx_g?si=57KaVXeLy4u8iL-t" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- register  --}}
        <div class="form-register">
            <div class="align-items-center text-center">
                <button id="showFormButton" class="btn btn-register mb-3"><a
                        href="https://docs.google.com/forms/d/15UKsgs0jwwZVSIMVj_TeBMvcogushZhcctAxjSNiyM0/edit"
                        target="_blank">Đăng Ký để được Tư Vấn Miễn phí!</a>
                </button>
            </div>
        </div>
        @include('review')
        @include('answer-question')
    </div>
    {{-- center  --}}

    @include('footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>

</body>

</html>
