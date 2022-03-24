<?php 
    include 'connect.php';
    if(isset($_POST['email'])){
        $email = $_POST['email'];
        $passwd = $_POST['passwd'];

        $sql = "SELECT * FROM users where email='$email'";
        $query = mysqli_query($conn, $sql);
        $checkEmail = mysqli_num_rows($query);
        $data = mysqli_fetch_assoc($query);
        if($checkEmail)
            if($passwd == $data['passwd']){
                if ($data['permission']=='0'){
					$_SESSION['user'] = $data;
					header('location: ./');
				}else{
					$_SESSION['admin'] = $data;
					header('location: ./admin');
				}
            }else
                echo "<script>alert('Mật khẩu chưa chính xác')</script>";
        else
            echo "<script>alert('Tài khoản không tồn tại')</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
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
    <link rel="stylesheet" href="./Css/dangnhap.css">
</head>
<body>
    <div class="container">
        <div class="grid">
            <div class="row">
                <?php include 'sidebar.php' ?>
                <!-- main -->
                <div class="content col l-10">
                    <div class="header__login">
                        <div class="header__login-img">
                            <img src="./img/DangNhap--slide.webp" alt="">
                        </div>
                        <div class="header__login-title">
                            <h2>Đăng Nhập</h2>
                            <a href="" class="header__login-link-back">Trang Chủ</a>
                            <i class="fa-solid fa-angle-right"></i>
                            <span>Tài Khoản</span>
                        </div>
                    </div>
                    <form action="" method="POST">
                        <div class="form__login">
                            <div class="form__login-wrap">
                                <input type="email" name="email" class="form__login-email" placeholder="Nhập email hoặc số điện thoại"></br>
                                <input type="password" name="passwd"class="form__login-password" placeholder="Mật khẩu"></br>
                                <div class="form__login-btn-wrap">
                                    <button class="form__login-btn">Đăng nhập</button>
                                </div>
                                <div class="form__login-link">
                                    <a href="./index.php">Về trang chủ</a>
                                </div>
                                <div class="form__login-link">
                                    <a href="signup.php">Đăng ký</a>
                                </div>
                                <div class="form__login-link">
                                    <a href="">Quên mật khẩu?</a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php include 'footer.php' ?>
                </div>
            </div>
        </div>
    </div>
	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>

</body>
</html>