<!DOCTYPE html>
<html lang="en">
<head>
	<title>PersonalAdmin</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="shortcut icon" href="img/logo.jpg">

  <style>
    footer {
        position: fixed;
        bottom: 0;
        width: 100%;
    }
</style> 
</head>
<body>
	<img src="img/banner.jpg" alt="" class="" width="100%">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 offset-sm-3 mt-4 mb-4">
				<h1 class="text-center">ผู้ดูแลระบบ</h1>
				<p class="text-center">ผู้ดูแลและพัฒนาระบบของเว็บไซต์ B-est</p>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4 offset-sm-1">
				<div class="card-box text-center">
					<div class="user-pic">
						<img src="img/ta.jpg" class="img-fluid" alt="User Pic">
					</div>
					<h4>นายธนวรรธ เพ่งผล</h4>
					<h6></h6>
					<hr>
					<p>Facebook : Ta Thanawat</p>
          <hr>
          <p>E-mail : tayosoi8@gmail.com</p>
					<hr>
				</div>
			</div>

			<div class="col-md-4 offset-sm-2">
				<div class="card-box text-center">
					<div class="user-pic">
						<img src="img/kim.jpg" class="img-fluid" alt="User Pic">
					</div>
					<h4>นายณัฐวุฒิ แดนชล</h4>
					<h6></h6>
					<hr>
					<p>Facebook : Nuttavut Danchon</p>
          <hr>
          <p>E-mail : Nuttavut232@gmail.com</p>
					<hr>
				</div>
			</div>
		</div>
	</div>
	<div class="button">
					<a class="btn btn-light" href="aboutus.php" role="button">ย้อนกลับ</a>
				</div>
 

  <style>

.user-pic {
    width: 150px;
    height: 150px;
    overflow: hidden;
    border-radius: 100%;
    margin: 20px auto 20px;
    border-left: 3px solid #ddd;
    border-right: 3px solid #ddd;
    border-top: 3px solid #007bff;
    border-bottom: 3px solid #007bff;
    transform: rotate(-30deg);
    transition: 0.5s;
}
.img{
    
    height: 50px;
}
.card-box:hover .user-pic {
    transform: rotate(0deg);
    transform: scale(1.1);
}
.card-box {
    padding: 15px;
    background-color: #fdfdfd;
    margin: 20px 0px;
    border-radius: 10px;
    border: 1px solid #eee;
    box-shadow: 0px 0px 8px 0px #d4d4d4;
    transition: 0.5s;
}
.card-box:hover {
	border: 1px solid #007bff;
}
.card-box p {
    color: #808080;
}
</style>

<?php 
require_once("footer.php");
?>
</body>
</html>