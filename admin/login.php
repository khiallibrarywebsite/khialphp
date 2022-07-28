<!DOCTYPE html>
<html lang="ar" dir="">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول للوحة الادمن</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/styleme.css">
    <style>
        *{font-family: 'Tajawal' !important;}
    </style>
</head>
<body>
<!-- <div id="anime" class="anime bg-dark d-flex justify-content-center align-items-center position-fixed w-100 h-100" style="z-index: 1111;"> -->
        <!-- <div class="spinner spinner-border text-light fw-bold h1" style="width:150px; height: 150px;"></div> -->
    <!-- </div> -->
<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-3">
					<h2 class="heading-section">تسجيل الدخول للوحة الأدمن</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(../images/lib.png);">
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">تسجيل الدخول</h3>
			      		</div>

			      	</div>
							<form method="POST" class="signin-form">
			      		<div class="form-group mb-3">
			      			<label>إسم الحساب</label>
			      			<input type="text" name="name" class="form-control" placeholder="Username" required>
			      		</div>
		            <div class="form-group mb-3">
		            	<label>كلمة السر</label>
		              <input type="password" name="password" class="form-control" placeholder="Password" required>
		            </div>
		            <div class="form-group">
		            	<button type="submit" name="login" class="form-control btn btn-primary rounded submit px-3">تسجيل الدخول</button>
		            </div>
		          </form>
		        </div>
		      </div>
				</div>
			</div>
		</div>
</section>

<?php
    require_once 'connect.php';

	if (isset($_POST['login'])) {
		$name = $_POST['name'];
		$password = $_POST['password'];

		$getusers = $db->prepare("SELECT * FROM users WHERE Name = :name AND Password = :password");
		$getusers->bindParam("name",$name);
		$getusers->bindParam("password",$password);
		$getusers->execute();

		if($getusers->rowCount() == "1"){
			header("location: home.php");

			session_start();
			$_SESSION['name'] = $name;
			$_SESSION['password'] = $password;


		}else{
			header('location: login.php');
		}
	}

?>




	<script>
        setInterval(()=> {
        var anime = document.getElementById('anime');
        anime.style.opacity = 0;
        anime.style.zIndex = -1;
        } , 5000)
    </script>

</body>
</html>