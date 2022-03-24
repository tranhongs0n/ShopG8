<?php 
    include 'connect.php';
    $user = isset($_SESSION['user']) ? $_SESSION['user']:[];
    if(isset($_POST["submit"])){
        $email = $_POST["email"];
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $address = $_POST['address'];
        $sql = "UPDATE users SET name='$name', phone = '$phone', address='$address' WHERE email='$email'" ;
        $query = mysqli_query($conn,$sql);
        if($query){
            // Cập nhật data mới cho session.
            $sql="SELECT * FROM users WHERE email = '$email'";
            $_SESSION['user']=mysqli_fetch_assoc(mysqli_query($conn, $sql));
            echo "<script>alert('Cập nhật thành công'); location.replace('profile.php');</script>";
        }else{
            echo "<script>alert('Cập nhật không thành công')</script>";
            echo $conn->error;
        }
 }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TÀI KHOẢN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">   
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
    <link rel="stylesheet" href="./Css/profile.css">

</head>
<body>
    <div class="row">
        <?php include './sidebar.php' ?>
        <!-- main -->
        <div class="content col l-10">
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
                    <span>Hồ sơ</span>
                </div>
            </div>
            <div class="profile-page">
                <div class="wrapper">
                    <div class="grid">
                        <div class="row">
                            <div class="container">
                                <div class="infomation" >
                                    <h2>Thông Tin Cá Nhân</h2><br>
                                    <form action="" method="POST">
                                        <div class="display">
                                            <div class="line">
                                                <div class="label">
                                                    <label for="user_name">Tài khoản&emsp;&emsp;</label>
                                                </div>
                                                <div class="info">
                                                    <div class="info1">
                                                        <div class="info2"><input type="text" name="email" value="<?php echo $user['email']; ?>"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php 
                                        $sql1 = "SELECT * FROM users where email = '$user[email]'";
                                        $result  = mysqli_query($conn,$sql1);
                                        if($result) {
                                            $row = mysqli_fetch_assoc($result); { ?>
                                            <div class="display">
                                                <div class="line">
                                                    <div class="label">
                                                        <label for="name">Tên&emsp;&emsp;</label>
                                                    </div>
                                                    <div class="info">
                                                        <div class="info1">
                                                            <div class="info2"><input type="text" name = "name"placeholder maxlength="255" value="<?php echo $row['name']; ?>"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="display">
                                                <div class="line">
                                                    <div class="label">
                                                        <label for="phone">Số điện thoại&emsp;&emsp;</label>
                                                    </div>
                                                    <div class="info">
                                                        <div class="info1">
                                                            <div class="info2"><input type="tel" name="phone" pattern="[0]{1}[0-9]{9}" placeholder maxlength="255" value="<?php echo $row['phone']; ?>"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="display">
                                                <div class="line">
                                                    <div class="label">
                                                        <label for="phone">Địa chỉ&emsp;&emsp;</label>
                                                    </div>
                                                    <div class="info">
                                                        <div class="info1">
                                                            <div class="info2"><input type="text" name="address" placeholder maxlength="255" value="<?php echo $row['address']; ?>"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br><br>
                                            <div class="form-group">
                                                <input type="submit" name="submit" class="btn btn-info" value="Cập nhật"> 
                                                <div class="btn-logout" style="background-color:red">
                                                    <a href="./logout.php">Đăng xuất</a>
                                                </div>
                                                <div class="btn-logout" style="margin-left:20px">
                                                    <a href="./change_pass.php">Đổi mật khẩu</a>
                                                </div>
                                            </div>
                                            <?php }
                                        }?>    
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include 'footer.php' ?>
        </div>
    </div>
</body>
</html>