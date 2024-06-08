<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap Toggle FAQ Accordion</title>
<style>

.content-answer{
	padding: 50px 0;
}
.accordion .card {
	border-radius: 6px !important;
	margin-bottom: 5px;
	background-color: transparent;
}
.accordion .card .card-header {
	padding-top: 7px;
	padding-bottom: 7px;
	margin-bottom: 0;
	border-radius: 6px 6px 0 0;
	border-bottom: none;
}
.accordion .card-header:hover {
	background: #ecf0f0;
}
.accordion .card-header h2 span {
	float: left;
	margin-top: 10px;
}

.accordion .card-header a{
	font-weight: 700;
}
.accordion .material-icons{
	background-color: linear-gradient(300deg, #5858e6 40%, #e658ba);
}
.accordion .card-header .btn {
	color: #ffffff;
	font-size: 1.04rem;
	width: 100%;
	text-align: left;
	position: relative;
	top: -2px;
	font-weight: 500;
	transition: 0.3s ease-in-out;
}
.accordion .card-header i {
	float: right;
	font-size: 1.3rem;
	font-weight: bold;
	position: relative;
	top: 5px;
}
.accordion .card-header .btn:hover {
	color: #35589f;
	transition: 0.1s ease-in-out;
}
.accordion .card-body {
	color: #c7c7c7;
	font-size: 1rem;
	text-align: justify;
	border-top: 1px solid #eceded;
	padding-left: 31px;
}
.page-title {
	text-align: center;
	margin: 2rem 0;
	position: relative;
	color: #fff;
}
.page-title::after {
	content: "";
	width: 100px;
	position: absolute;
	margin: 0 auto;
	height: 4px;
	border-radius: 1px;
	background: #3659a2;
	left: 0;
	right: 0;
	bottom: -15px;
}
</style>

</head>
<body>
	<div id="answer">
		<div class="container-xl">
			<div class="row">
				<div class="col-lg-12 content-answer">
					<h1 class="page-title"><b>HỎI &amp; ĐÁP</b></h1>
					<div class="accordion" id="accordionExample">
						<div class="card">
							<div class="card-header" id="headingOne">
								<h2 class="clearfix mb-0">
									<a class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Trung tâm đào tạo ngoại ngữ Vision có được thành lập từ bao giờ?<i class="material-icons">add</i></a>									
								</h2>
							</div>
							<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
								<div class="card-body">Trung tâm đào tạo ngoại ngữ Vision đã bắt đầu hoạt động từ năm 2005, mang lại cho học viên những trải nghiệm học tập chất lượng và hiệu quả.</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header" id="headingTwo">
								<h2 class="mb-0">
									<a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Vision cung cấp những khoá học ngoại ngữ nào? <i class="material-icons">add</i></a>
								</h2>
							</div>
							<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
								<div class="card-body">Vision cung cấp các khóa học tiếng Anh, tiếng Nhật, tiếng Hàn và tiếng Trung, phù hợp với mọi nhu cầu và mục tiêu học tập của học viên.</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header" id="headingThree">
								<h2 class="mb-0">
									<a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Cơ sở vật chất của Vision như thế nào? <i class="material-icons">add</i></a>                     
								</h2>
							</div>
							<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
								<div class="card-body">Cơ sở vật chất của Vision được xây dựng và trang bị hiện đại, bao gồm các phòng học rộng rãi, trang thiết bị tiên tiến và không gian thoải mái.</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header" id="headingFour">
								<h2 class="mb-0">
									<a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">Vision có những phương pháp giảng dạy nào để học viên tiếp cận ngoại ngữ hiệu quả? <i class="material-icons">add</i></a>                               
								</h2>
							</div>
							<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
								<div class="card-body">Phương pháp giảng dạy tại Vision bao gồm sử dụng trò chơi, trải nghiệm thực tế và công nghệ giáo dục, giúp học viên tiếp cận và tiếp thu kiến thức hiệu quả.</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header" id="headingFive">
								<h2 class="mb-0">
									<a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">Vision có đội ngũ giáo viên như thế nào? <i class="material-icons">add</i></a>                               
								</h2>
							</div>
							<div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
								<div class="card-body">Đội ngũ giáo viên của Vision đều có kinh nghiệm sâu rộng, nhiệt huyết và có trình độ chuyên môn cao, đảm bảo chất lượng giảng dạy tốt nhất cho học viên.</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header" id="headingSix">
								<h2 class="mb-0">
									<a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">Học phí tại Vision như thế nào so với các trung tâm đào tạo ngoại ngữ khác? <i class="material-icons">add</i></a>                               
								</h2>
							</div>
							<div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
								<div class="card-body">Học phí tại Vision được thiết kế linh hoạt và cạnh tranh, đồng thời cung cấp nhiều chính sách ưu đãi đặc biệt và hỗ trợ tài chính cho học viên.</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header" id="headingSeven">
								<h2 class="mb-0">
									<a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">Vision có chương trình học ngoại ngữ dành cho trẻ em không? <i class="material-icons">add</i></a>                               
								</h2>
							</div>
							<div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
								<div class="card-body">Có, Vision có chương trình học ngoại ngữ dành cho trẻ em từ 4 tuổi, với phương pháp giảng dạy vui nhộn, phù hợp với tính cách và nhu cầu của trẻ.</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header" id="headingEight">
								<h2 class="mb-0">
									<a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">Học viên của Vision được hỗ trợ như thế nào trong quá trình học? <i class="material-icons">add</i></a>                               
								</h2>
							</div>
							<div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample">
								<div class="card-body">Học viên của Vision được hỗ trợ một cách toàn diện trong quá trình học, từ việc chọn lựa khóa học phù hợp đến việc giải đáp thắc mắc và hỗ trợ về kỹ năng học tập.</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<script>
	$(document).ready(function(){
		// Add minus icon for collapse element which is open by default
		$("#collapseOne").collapse('close');
		$("#collapseTwo").collapse('show');
		$("#collapseThree").collapse('show');
		$("#collapseFour").collapse('close');
		$("#collapseFive").collapse('show');
		$("#collapseSix").collapse('show');
		$("#collapseSeven").collapse('close');
		$("#collapseEight").collapse('show');


		
		$(".collapse.show").each(function(){
			$(this).siblings(".card-header").find(".btn i").html("remove");
			$(this).prev(".card-header").addClass("highlight");
		});
		
		// Toggle plus minus icon on show hide of collapse element
		$(".collapse").on('show.bs.collapse', function(){
			$(this).parent().find(".card-header .btn i").html("remove");
		}).on('hide.bs.collapse', function(){
			$(this).parent().find(".card-header .btn i").html("add");
		});
	});
	</script>
</body>
</html>