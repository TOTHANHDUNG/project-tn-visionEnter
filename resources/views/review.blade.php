<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<style>
.review  h2 {
	color: rgb(255, 255, 255);
	font-weight: 700;
	text-align: center;
	text-transform: uppercase;
	position: relative;
	margin: 30px 0 70px;
}
.review  h2::after {
	content: "";
	width: 100px;
	position: absolute;
	margin: 0 auto;
	height: 4px;
	border-radius: 1px;
	background: linear-gradient(200deg,#e658ba, #5858e6 40% );
	left: 0;
	right: 0;
	bottom: -20px;
}
.review .carousel .carousel-item {
	color: rgb(255, 255, 255);
	overflow: hidden;
	min-height: 120px;
	font-size: 13px;
}
.review .carousel .media img {
	width: 80px;
	height: 80px;
	display: block;
	border-radius: 50%;
}
.review .carousel .testimonial {
	/* padding: 0 15px 0 60px ;
	position: relative; */
}
.review .carousel .testimonial::before {
	content: "\201C";
	font-family: Arial,sans-serif;
	color: #ffffff;
	font-weight: bold;
	font-size: 68px;
	line-height: 54px;
	position: absolute;
	left: 15px;
	top: 0;
}
.review .carousel .overview b {
	text-transform: uppercase;
	background: linear-gradient(300deg, #5858e6 40%, #e658ba);
}
.review .carousel .carousel-indicators {
	bottom: -40px;
}
.review .carousel-indicators li, .carousel-indicators li.active {
	width: 20px;
	height: 20px;
	border-radius: 50%;
	margin: 1px 3px;
	box-sizing: border-box;
}
.review .carousel-indicators li {	
	background: #e2e2e2;
	border: 4px solid #fff;
}
.review .carousel-indicators li.active {
	color: #fff;
	background: linear-gradient(300deg, #5858e6 40%, #e658ba);
	border: 5px double;    
}
</style>
</head>
<body>
	<div id="review">
		<div class="container-xl review">
			<div class="row">
			  <div class="col-sm-12">
				<h2>HỌC VIÊN <b>NÓI GÌ?</b></h2>
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
				  <!-- Carousel indicators -->
				  <ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
				  </ol>
						
						<!-- Wrapper for carousel items -->
						<div class="carousel-inner">
							<div class="carousel-item active">
							  <div class="row">
								<div class="col-sm-6">
								  <div class="media">
									<img src="/examples/images/clients/1.jpg" class="mr-3" alt="">
									<div class="media-body">
									  <div class="testimonial">
										<p>Lorem ipsum dolor sit amet, consec adipiscing elit. Nam eusem scelerisque tempor, varius quam luctus dui. Mauris magna metus nec.</p>
										<p class="overview"><b>Paula Wilson</b>, Media Analyst</p>
									  </div>
									</div>
								  </div>
								</div>
								<div class="col-sm-6">
								  <div class="media">
									<img src="/examples/images/clients/2.jpg" class="mr-3" alt="">
									<div class="media-body">
									  <div class="testimonial">
										<p>Vestibulum quis quam ut magna consequat faucibus. Pellentesque eget mi suscipit tincidunt. Utmtc tempus dictum. Pellentesque virra.</p>
										<p class="overview"><b>Antonio Moreno</b>, Web Developer</p>
									  </div>
									</div>
								  </div>
								</div>
							  </div>
							</div>
							<div class="carousel-item">
							  <div class="row">
								<div class="col-sm-6">
								  <div class="media">
									<img src="/examples/images/clients/3.jpg" class="mr-3" alt="">
									<div class="media-body">
									  <div class="testimonial">
										<p>Lorem ipsum dolor sit amet, consec adipiscing elit. Nam eusem scelerisque tempor, varius quam luctus dui. Mauris magna metus nec.</p>
										<p class="overview"><b>Michael Holz</b>, Seo Analyst</p>
									  </div>
									</div>
								  </div>
								</div>
								<div class="col-sm-6">
								  <div class="media">
									<img src="/examples/images/clients/4.jpg" class="mr-3" alt="">
									<div class="media-body">
									  <div class="testimonial">
										<p>Vestibulum quis quam ut magna consequat faucibus. Pellentesque eget mi suscipit tincidunt. Utmtc tempus dictum. Pellentesque virra.</p>
										<p class="overview"><b>Mary Saveley</b>, Web Designer</p>
									  </div>
									</div>
								  </div>
								</div>
							  </div>
							</div>
							<div class="carousel-item">
							  <div class="row">
								<div class="col-sm-6">
								  <div class="media">
									<img src="/examples/images/clients/5.jpg" class="mr-3" alt="">
									<div class="media-body">
									  <div class="testimonial">
										<p>Lorem ipsum dolor sit amet, consec adipiscing elit. Nam eusem scelerisque tempor, varius quam luctus dui. Mauris magna metus nec.</p>
										<p class="overview"><b>Martin Sommer</b>, UX Analyst</p>
									  </div>
									</div>
								  </div>
								</div>
								<div class="col-sm-6">
								  <div class="media">
									<img src="/examples/images/clients/6.jpg" class="mr-3" alt="">
									<div class="media-body">
									  <div class="testimonial">
										<p>Vestibulum quis quam ut magna consequat faucibus. Pellentesque eget mi suscipit tincidunt. Utmtc tempus dictum. Pellentesque virra.</p>
										<p class="overview"><b>John Williams</b>, Web Developer</p>
									  </div>
									</div>
								  </div>
								</div>
							  </div>
							</div>
						  </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>