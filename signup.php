<?php 
    include 'connect.php';
    if (isset($_POST['email'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $passwd = $_POST['passwd'];
        $phone = $_POST['phone'];
        $sql1 = "SELECT * from users where email = '$email'";
        $query1 = mysqli_query($conn,$sql1);
        $checkEmail = mysqli_num_rows($query1);
        if ($checkEmail == 1)
            echo "<script>alert('Email đã được đăng ký trước đó rồi vui lòng nhập lại email khác')</script>";
        else{ 
            if(empty($email))
                echo"<script>alert('Vui lòng nhập email')</script>";
            else{
                $sql = "INSERT INTO users(email,name,passwd,phone) values('$email','$name','$passwd','$phone') ";
                $query = mysqli_query($conn,$sql);
				if ($query){
?>
                    <script>
                        alert('Đã đăng kí thành công'); 
                        location.replace('./login.php');
                    </script>
<?php 
                }else
					echo "không thành công";
            }         
        }  
    }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
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
    <div class="row">
        <?php include 'sidebar.php' ?>
        <!-- Main -->
        <div class="content col l-10">
            <div class="header__login">
                <div class="header__login-img">
                    <img src="./img/DangNhap--slide.webp" alt="">
                </div>
                <div class="header__login-title">
                    <h2>Đăng Kí</h2>
                    <a href="./" class="header__login-link-back">Trang Chủ</a>
                    <i class="fa-solid fa-angle-right"></i>
                    <span>Đăng Kí</span>
                </div>
            </div>
            <form action="" method="POST">
                <div class="form__login">
                    <div class="form__login-wrap">
                        <input type="text" name="name" class="form__login-hoten" placeholder="Họ và tên"></br>
                        <input type="email" name="email"class="form__login-email" placeholder="Email"></br>
                        <input type="password" name="passwd" class="form__login-password" placeholder="Mật khẩu"></br>
                        <input type="tel" name="phone" pattern="[0]{1}[0-9]{9}" class="form__login-phone" placeholder="Số điện thoại"></br>
                        <div class="form__login-btn-wrap">
                            <?php if (empty($email)) {?>
                            <button type="submit" class="form__login-btn">Đăng Kí</button>
                            <?php }else if ($checkEmail == 1)  {?>
                            <button type="submit" class="form__login-btn">Đăng Kí</button>
                            <?php }else {?>
                                <button type="button" class="form__login-btn" onclick="pop()">Đăng Kí</button>
                            <?php } ?>
                        </div>  
                    </div>
                </div>
            </form>
            <?php include 'footer.php' ?>
        </div>
    </div>
    <script>
        function pop() {
            alert("Đăng ký thành công, vui lòng đăng nhập lại");
            document.location = 'login.php';
    }
    </script>
</body>
</html>