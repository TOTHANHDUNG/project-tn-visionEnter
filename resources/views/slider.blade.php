<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Header</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Varela+Round">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
	*{
		margin: 0px;
		padding: 0px;
		box-sizing: border-box;
	}



/* slider section  */

.container-slider{
    height: 100vh;
    margin-top: 50px;
    overflow: hidden;
    position: relative;
}
.container-slider .list .item{
    width: 100%;
    height: 100%;
    position: absolute;
    inset: 0 0 0 0;
}
.container-slider .list .item img{
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.container-slider .list .item .content{
    position: absolute;
    top: 20%;
    width: 1140px;
    max-width: 80%;
    left: 50%;
    transform: translateX(-50%);
    padding-right: 30%;
    box-sizing: border-box;
    color: #fff;
    text-shadow: 0 5px 10px #0004;
}

.container-slider .list .item .content .title,
.container-slider .list .item .content .type{
    font-size: 5em;
    font-weight: bold;
    line-height: 1.3em;
}
.container-slider .list .item .type{
    color: #14ff72cb;
}
.container-slider .list .item .button-seemore{
    display: grid;
    grid-template-columns: repeat(2, 130px);
    grid-template-rows: 40px;
    gap: 5px;
    margin-top: 20px;
}
.container-slider .list .item .button-seemore button{
    border: none;
	color: #fff;
    background-color: #f7345e;
    font-weight: 500;
    cursor: pointer;
    transition: 0.4s;
    letter-spacing: 2px;
	border-radius: 20px;

}


.container-slider .list .item .button-seemore button:hover{
    letter-spacing: 3px;
}
.container-slider .list .item .button-seemore button:nth-child(2){
    background-color: transparent;
    border: 1px solid #fff;
    color: #eee;
}





/* Thumbnail Section  */
.container-slider .thumbnail{
    position: absolute;
    bottom: 50px;
    left: 50%;
    width: max-content;
    z-index: 100;
    display: flex;
    gap: 20px;
}

.container-slider .thumbnail .item{
    width: 150px;
    height: 220px;
    flex-shrink: 0;
    position: relative;
}

.container-slider .thumbnail .item img{
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 20px;
    box-shadow: 5px 0 15px rgba(0, 0, 0, 0.3);
}


/* nextPrevArrows Section  */
.container-slider .nextPrevArrows{
    position: absolute;
    top: 80%;
    right: 52%;
    z-index: 100;
    width: 300px;
    max-width: 30%;
    display: flex;
    gap: 10px;
    align-items: center;
}
.container-slider .nextPrevArrows button{
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: #14ff72cb;
    border: none;
    color: #fff;
    font-family: monospace;
    font-weight: bold;
    transition: .5s;
    cursor: pointer;
}
.container-slider .nextPrevArrows button:hover{
    background-color: #fff;
    color: #000;
}

/* Animation Part */
.container-slider .list .item:nth-child(1){
    z-index: 1;
}


/* animation text in first item */
.container-slider .list .item:nth-child(1) .content .title,
.container-slider .list .item:nth-child(1) .content .type,
.container-slider .list .item:nth-child(1) .content .description,
.container-slider .list .item:nth-child(1) .content .buttons
{
    transform: translateY(50px);
    filter: blur(20px);
    opacity: 0;
    animation: showContent .5s 1s linear 1 forwards;
}
@keyframes showContent{
    to{
        transform: translateY(0px);
        filter: blur(0px);
        opacity: 1;
    }
}
.container-slider .list .item:nth-child(1) .content .title{
    animation-delay: 0.4s !important;
}
.container-slider .list .item:nth-child(1) .content .type{
    animation-delay: 0.6s !important;
}
.container-slider .list .item:nth-child(1) .content .description{
    animation-delay: 0.8s !important;
}
.container-slider .list .item:nth-child(1) .content .buttons{
    animation-delay: 1s !important;
}




/* Animation for next button click */
.container-slider.next .list .item:nth-child(1) img{
    width: 150px;
    height: 220px;
    position: absolute;
    bottom: 50px;
    left: 50%;
    border-radius: 30px;
    animation: showImage .5s linear 1 forwards;
}

@keyframes showImage{
    to{
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border-radius: 0;
    }
}

.container-slider.next .thumbnail .item:nth-last-child(1){
    overflow: hidden;
    animation: showThumbnail .5s linear 1 forwards;
}
.container-slider.prev .list .item img{
    z-index: 100;
}


@keyframes showThumbnail{
    from{
        width: 0;
        opacity: 0;
    }
}


.container-slider.next .thumbnail{
    animation: effectNext .5s linear 1 forwards;
}

@keyframes effectNext{
    from{
        transform: translateX(150px);
    }
}



/* Animation for prev button click */
.container-slider.prev .list .item:nth-child(2){
    z-index: 2;
}

.container-slider.prev .list .item:nth-child(2) img{
    animation: outFrame 0.5s linear 1 forwards;
    position: absolute;
    bottom: 0;
    left: 0;
}
@keyframes outFrame{
    to{
        width: 150px;
        height: 220px;
        bottom: 50px;
        left: 50%;
        border-radius: 20px;
    }
}

.container-slider.prev .thumbnail .item:nth-child(1){
    overflow: hidden;
    opacity: 0;
    animation: showThumbnail .5s linear 1 forwards;
}
.container-slider.next .nextPrevArrows button,
.container-slider.prev .nextPrevArrows button{
    pointer-events: none;
}


.container-slider.prev .list .item:nth-child(2) .content .title,
.container-slider.prev .list .item:nth-child(2) .content .type,
.container-slider.prev .list .item:nth-child(2) .content .description,
.container-slider.prev .list .item:nth-child(2) .content .buttons
{
    animation: contentOut 1.5s linear 1 forwards!important;
}

@keyframes contentOut{
    to{
        transform: translateY(-150px);
        filter: blur(20px);
        opacity: 0;
    }
}
@media screen and (max-width: 678px) {
    .slider .list .item .content{
        padding-right: 0;
    }
    .slider .list .item .content .title{
        font-size: 50px;
    }
}

@media screen and (max-width: 992px) {
    .container-slider .list .item .content {
        width: 90%;
        padding-right: 0;
    }
}

@media screen and (max-width: 768px) {
    .container-slider .thumbnail .item {
        width: 120px;
        height: 180px;
    }
}
</style>
<script>
// Prevent dropdown menu from closing when click inside the form
$(document).on("click", ".action-buttons .dropdown-menu", function(e){
	e.stopPropagation();
});
</script>
</head> 
<body>
	{{-- slider  --}}
<div class="container-slider">
	<div class="list">
		<div class="item">
			<img src="./images/averger.jpg" alt="">
			<div class="content">
				<div class="title">KHÓA HỌC</div>
				<div class="type">TIẾNG ANH</div>
				<div class="description">
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti temporibus quis eum consequuntur voluptate quae doloribus distinctio. Possimus, sed recusandae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, aut.
				</div>
				<div class="button-seemore">
					<button>Xem thêm</button>
				</div>
			</div>
		</div>

		<div class="item">
			<img src="./images/avatar.jpg" alt="">

			<div class="content">
				<div class="title">KHÓA HỌC</div>
				<div class="type">TIẾNG ANH</div>
				<div class="description">
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti temporibus quis eum consequuntur voluptate quae doloribus distinctio. Possimus, sed recusandae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, aut.
				</div>
				<div class="button-seemore">
					<button>SEE MORE</button>
				</div>
			</div>
		</div>

		<div class="item">
			<img src="./images/img4.jpg" alt="">
			<div class="content">
				<div class="title">MAGIC SLIDER</div>
				<div class="type">PLANT</div>
				<div class="description">
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti temporibus quis eum consequuntur voluptate quae doloribus distinctio. Possimus, sed recusandae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, aut.
				</div>
				<div class="button-seemore">
					<button>SEE MORE</button>
				</div>
			</div>
		</div>

		<div class="item">
			<img src="./images/img3.jpg" alt="">

			<div class="content">
				<div class="title">MAGIC SLIDER</div>
				<div class="type">NATURE</div>
				<div class="description">
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti temporibus quis eum consequuntur voluptate quae doloribus distinctio. Possimus, sed recusandae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, aut.
				</div>
				<div class="button-seemore">
					<button>SEE MORE</button>
				</div>
			</div>
		</div>

	</div>

	<div class="thumbnail">
		<div class="item">
			<img src="https://d1hjkbq40fs2x4.cloudfront.net/2017-08-21/files/landscape-photography_1645.jpg" alt="">
		</div>
		<div class="item">
			<img src="./images/avatar.jpg" alt="">
		</div>
		<div class="item">
			<img src="./images/img4.jpg" alt="">
		</div>
		<div class="item">
			<img src="./images/img3.jpg" alt="">
		</div>

	</div>

	<div class="nextPrevArrows">
		<button class="prev"> < </button>
		<button class="next"> > </button>
	</div>
</div>
<script src="/js/slider.js"></script>
</body>
</html>