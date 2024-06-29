<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div id="card_wrapper">
        <div class="container">
            <div class="container-content row">
                <div class="title-content col-12 text-center">
                    <h2 class="head_text">Đội ngũ <span>Giáo viên</span></h2>
                    <p class="head_para">"Đội ngũ giáo viên chất lượng, có kinh nghiệm và trình độ chuyên môn cao trong việc giảng dạy."</p>
                </div>
                <div class="col-12">
                    <div class="owl-carousel slider_carousel">
                        @foreach ($course_english as $course)
                        <div class="card_box">
                            <div class="image-container">
                                <img class="img avatar-teacher" src="{{$course->photo}}" alt="">
                            </div>
                            <div class="card_text">
                                <h4>{{$course->name}}</h4>
                                <p>Giá: {{$course->price}} USD</p>
                                <p>Thời gian: {{$course->duration}}</p>
                                <p>Rating: {{$course->rating}}</p>
                                <a href="#" class="btn btn-primary">Xem ngay</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
