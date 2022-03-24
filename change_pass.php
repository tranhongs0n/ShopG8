<?php 
    include 'connect.php';
 	$user = isset($_SESSION['user']) ? $user = $_SESSION['user']:[];
	if(isset($_POST["submit"])){
		$email = $_POST["email"];
		$passwd = $_POST['passwd'];
		$n_passwd = $_POST['n_passwd'];
		$rn_passwd = $_POST['rn_passwd']; 	
		$sql = "UPDATE users SET passwd='$n_passwd' WHERE email='$email'" ;
		
		if($passwd === $user['passwd'])
			if ($n_passwd == $rn_passwd){
				$query = mysqli_query($conn,$sql);
				// Cập nhật data mới cho session.
				$sql="SELECT * FROM users WHERE email = '$email'";
				$_SESSION['user']=mysqli_fetch_assoc(mysqli_query($conn, $sql));
				echo "<script>alert('Cập nhật thành công'); location.replace('change_pass.php');</script>";
			}else
				echo "<script>alert('Mật khẩu nhập lại không khớp')</script>";
		else
			echo "<script>alert('Sai mật khẩu cũ')</script>";
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Đổi mật khẩu</title>
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="font-icon/fontawesome-free-6.0.0-web/css/all.css">
    <link rel="stylesheet" type="text/css" href="css/profile.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;500;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./font-icon/fontawesome-free-6.0.0-web/css/all.css">
    <link rel="stylesheet" href="./css/gridsystem.css">
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/reponsive.css">
    <link rel="stylesheet" href="./Css/profile.css">
    <link rel="stylesheet" href="./Css/dangnhap.css">
    
</head>
<body>
	<div class="row">
		<?php include 'sidebar.php' ?>

		<div class="col l-10">
			<div class="header__login">
				<div class="header__login-img">
					<img src="./img/DangNhap--slide.webp" alt="">
				</div>
				<div class="header__login-title">
					<h2>Hồ Sơ</h2>
					<a href="" class="header__login-link-back">Trang Chủ</a>
					<i class="fa-solid fa-angle-right"></i>
					<span>Tài Khoản</span>
					<i class="fa-solid fa-angle-right"></i>
					<span>Đổi mật khẩu</span>
				</div>
			</div>
			
			<a href="javascript:history.go(-1)" style="font-size:16px"><i class="fa-solid fa-arrow-left-long"></i> Quay lại</a>
			<div class="infomation">
				<h2 style="">Đổi mật khẩu</h2><br>

				<form action="" method="POST">
					<div class="display">
						<div class="line">
							<div class="label">
								<label for="email">Tài khoản&emsp;&emsp;</label>
							</div>
							<div class="info">
								<div class="info1">
									<div class="info2"><input type="text" name="email"  value="<?php echo $user['email']; ?>"></div>
								</div>
							</div>
						</div>
					</div>

					<div class="display">
						<div class="line">
							<div class="label">
								<label for="passwd" style="text-align: left">Mật khẩu cũ&emsp;&emsp;</label>
							</div>
							<div class="info">
								<div class="info1">
									<div class="info2"><input type="password" name="passwd" value=""></div>
								</div>
							</div>
						</div>
					</div>

					<div class="display">
						<div class="line">
							<div class="label">
								<label for="n_passwd" style="text-align: left">Mật khẩu mới&emsp;&emsp;</label>
							</div>
							<div class="info">
								<div class="info1">
									<div class="info2"><input type="password" name="n_passwd" value=""></div>
								</div>
							</div>
						</div>
					</div>

					<div class="display">
						<div class="line">
							<div class="label">
								<label for="rn_passwd" style="text-align: left">Nhập lại mật khẩu mới&emsp;&emsp;</label>
							</div>
							<div class="info">
								<div class="info1">
									<div class="info2"><input type="password" name="rn_passwd" value=""></div>
								</div>
							</div>
						</div>
					</div>
					<br><br>
					<div class="form-group">
						<input type="submit" name="submit" class="btn btn-info" value="Cập nhật"> 
					</div>
				</form>
			</div>
			<?php include 'footer.php' ?>
		</div>
	</div>
</body>
</html>