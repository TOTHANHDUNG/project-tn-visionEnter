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
  <link rel="stylesheet" href="/css/home-style.css">
  <link rel="icon" type="image/png" href="/images/Backup_of_logo.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&family=Merriweather+Sans:ital,wght@0,300..800;1,300..800&family=Red+Hat+Text:ital,wght@0,300..700;1,300..700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link href="/css/fontawesome.min.css" rel="stylesheet" type="text/css" />
  <link href="/css/owl.carousel.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>
<body>
    @include('header')
<main>
  @include('slider')
<div class="container">
  <section id="introduce" class="py-5">
    <div class="container">
      <div class="row welcome text-center">
        <div class="col-12">
          <h2 class="display-4 title-center">Trung Tâm Ngoại Ngữ Vision</h2>
          <p class="lead">Vision Languge Center tự hào là đơn vị đào tạo ngoại ngữ hàng đầu tại Việt Nam.</p>
        </div>
      </div>
      <div class="row introduce-sub text-center">
        <div class="col-sm-6 col-md-3 mb-4">
          <div class="item-introduce">
            <img src="/images/online-graduation.png" class="img-fluid bg-transparent" alt="">
            <h3>Lịch sử</h3>
            <p>Với hơn 10 năm nghiên cứu và phát triển, Vision Languge Center đã đào tạo trên hàng nghìn học viên đạt thành quả vượt trội.</p>
          </div>
        </div>
        <div class="col-sm-6 col-md-3 mb-4">
          <div class="item-introduce">
            <img src="/images/online-exam.png" class="img-fluid bg-transparent" alt="">
            <h3>Mục tiêu</h3>
            <p>Sứ mệnh hàng đầu mà Vision Language Center hướng đến là giúp đỡ thế hệ trẻ Việt Nam phát triển toàn diện.</p>
          </div>
        </div>
        <div class="col-sm-6 col-md-3 mb-4">
          <div class="item-introduce">
            <img src="/images/self-learning.png" class="img-fluid bg-transparent" alt="">
            <h3>Phương pháp</h3>
            <p>Rèn luyện khả năng ứng dụng tự học từ vựng. Linh hoạt xử lý các chủ đề giao tiếp một cách rõ ràng, chủ động, sáng tạo.</p>
          </div>
        </div>
        <div class="col-sm-6 col-md-3 mb-4">
          <div class="item-introduce">
            <img src="/images/exchange.png" class="img-fluid bg-transparent" alt="">
            <h3>Đội ngũ giáo viên</h3>
            <p>Đội ngũ giáo viên chất lượng, có kinh nghiệm và trình độ chuyên môn cao trong việc giảng dạy.</p>
          </div>
        </div>
      </div>
    </div>
  </section>


   <div id="card_wrapper">
       <div class="container-content row">
         <div class="title-content col-12 text-center">
           <h2 class="head_text">Đội ngũ <span>Giáo viên</span></h2>
           <p class="head_para">"Đội ngũ giáo viên chất lượng, </BR>có kinh nghiệm và trình độ chuyên môn cao trong việc giảng dạy."</p>
         </div>
         <div class="col-12">
           <div class="owl-carousel slider_carousel">
            @if(!empty($teacher_english))
             @foreach ($teacher_english as $teacher)
             <div class="card_box">
               <div class="image-container">
                 <img class="img avatar-teacher" src="{{ asset('photodata/' . $teacher->photo) }}" alt="">
               </div>
               <div class="card_text">
                 <h4>{{$teacher->name}}</h4>
                 <p>{{$teacher->description}}</p>
               </div>
             </div>
             @endforeach
             @endif
           </div>
         </div>
       </div>
   </div>


   {{-- maketing course --}}
   <div id="course_mkt">
    <div class="container-youtube1">
      <div class="row container-content d-flex">
        <div class="col-xl-6 col-lg-6 align-items-center text-center">
          <div class="col-xl-12 align-items-center">
            <h2>Tư duy học</br> <span>Khác biệt</span>
            </br>được kiểm chứng bởi </br><span>Sal Khan</span></h3>
            <p>Phương pháp tư duy học khác biệt của Sal Khan dựa trên một số nguyên tắc và chiến lược cụ thể nhằm tạo ra một trải nghiệm học tập cá nhân hóa và hiệu quả.</p>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6">
          <div class="embed-responsive embed-responsive-16by9">
            <iframe width="300px" height="169px" src="https://www.youtube.com/embed/I1XBZADuWnQ?si=izbh7e-syhC543Ey" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>

       <div class="container-youtube1">
         <div class="row container-content d-flex">
           <div class="col-xl-6 col-lg-6">
             <div class="embed-responsive embed-responsive-16by9">
               <iframe width="560" height="315" src="https://www.youtube.com/embed/AXYmL-vv84w?si=EYEzxTDM62oiziv_" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
             </div>
           </div>
           <div class="col-xl-6 col-lg-6 align-items-center text-center">
             <div class="col-xl-12 align-items-center">
               <h2>Cách dạy</br> <span>Độc đáo</span>
               </br>được thiết kế bởi</br><span>Giáo viên Vision</span></h3>
               <p>có thể kết hợp các yếu tố sáng tạo, công nghệ hiện đại và phương pháp giáo dục tiên tiến để tạo ra một trải nghiệm học tập thú vị và hiệu quả.</p>
             </div>
           </div>
         </div>
       </div>

       <div class="container-youtube1">
         <div class="row container-content d-flex">
           <div class="col-xl-6 col-lg-6 align-items-center text-center">
             <div class="col-xl-12 align-items-center">
               <h2>Tư duy học</br> <span>Khác biệt</span>
               </br>được kiểm chứng bởi </br><span>Sal Khan</span></h3>
               <p>Phương pháp tư duy học khác biệt của Sal Khan dựa trên một số nguyên tắc và chiến lược cụ thể nhằm tạo ra một trải nghiệm học tập cá nhân hóa và hiệu quả.</p>
             </div>
           </div>
           <div class="col-xl-6 col-lg-6">
             <div class="embed-responsive embed-responsive-16by9">
               <iframe width="300px" height="169px" src="https://www.youtube.com/embed/I1XBZADuWnQ?si=izbh7e-syhC543Ey" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
             </div>
           </div>
         </div>
       </div>
   </div>


     {{-- register  --}}
     <div class="form-register">
       <div class="align-items-center text-center">
         <button id="showFormButton" class="btn btn-register mb-3"><a href="https://docs.google.com/forms/d/15UKsgs0jwwZVSIMVj_TeBMvcogushZhcctAxjSNiyM0/edit" target="_blank">Đăng Ký để được Tư Vấn Miễn phí!</a> </button>
       </div>
   </div>
   @include('review')
   @include('answer-question')

</div>
 <!-- introduce  -->

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
        navText: ["<i class='fa-solid fa-caret-left'></i>","<i class='fa-solid fa-caret-right'></i>"],
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
          1000: {
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

document.addEventListener("DOMContentLoaded", function() {
    // Xóa lớp "active" khỏi tất cả các mục header trước
    var headerItems = document.querySelectorAll('.header-item');
    headerItems.forEach(function(item) {
        item.classList.remove('active');
    });

    // Kiểm tra xem trang hiện tại có phải là trang "home" hay không
    if (window.location.href.includes("/home")) {
        // Nếu là trang "home", thêm lớp "active" cho mục "home" trong header
        var homeItem = document.querySelector('.header-home');
        if (homeItem) {
            homeItem.classList.add('active');
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
    document.getElementById("showFormButton").addEventListener("click", function () {
        // Hiển thị form đăng ký thông tin
        document.getElementById("container-register").style.display = "block";
    });
</script>
  <script type="" src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/js/swiper.min.js"></script>
  <script type="" src="/js/slider-swiper-script.js"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
    document.addEventListener('DOMContentLoaded', function() {
  // Get all card boxes and text elements
  const cardBoxes = document.querySelectorAll('#card_wrapper .card_box');
  const imageContainers = document.querySelectorAll('#card_wrapper .image-container');
  const cardTexts = document.querySelectorAll('#card_wrapper .card_text');

  // Calculate the maximum height of the card boxes
  let maxHeight = 0;
  cardBoxes.forEach(card => {
    maxHeight = Math.max(maxHeight, card.offsetHeight);
  });

  // Set the height of all card boxes to the maximum height
  cardBoxes.forEach(card => {
    card.style.height = `${maxHeight}px`;
  });

  // Calculate the maximum height of the text elements
  let maxTextHeight = 0;
  cardTexts.forEach(text => {
    maxTextHeight = Math.max(maxTextHeight, text.offsetHeight);
  });

  // Set the height of all text elements to the maximum height
  cardTexts.forEach(text => {
    text.style.height = `${maxTextHeight}px`;
  });

  // Calculate the maximum height of the image containers
  let maxImageHeight = 0;
  imageContainers.forEach(image => {
    maxImageHeight = Math.max(maxImageHeight, image.offsetHeight);
  });

  // Set the height of all image containers to the maximum height
  imageContainers.forEach(image => {
    image.style.height = `${maxImageHeight}px`;
  });
});

  </script>

</body>
</html>


