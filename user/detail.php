<?php 
    include '../connect.php';
    $id = $_GET['id'];
    if(session_id() == '')
        session_start();
    
    $user= isset($_SESSION['user']) ? $_SESSION['user']['id']:NULL;
    $sql = "SELECT * FROM quanAo where idQuanAo = '$id'";
    $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));

    if (isset($_POST['buy_type'])){
        if (!isset($user))
            echo "<script>alert('Hãy đăng nhập để tiếp tục mua sắm'); window.location.replace('../login.php')</script>";
        else{
            $soLuong = $_POST['quantity'];
            // Kiểm tra xem sp đã đc thêm vào trc đấy chưa.
            $sqlKiemTra = "SELECT soLuong FROM gioHang WHERE (idCustomer='$user' AND idQuanAo='$id')";
            if (mysqli_num_rows(mysqli_query($conn, $sqlKiemTra))==0){
                $sqlAdd = "INSERT INTO gioHang VALUES ('$user', '$id', '$soLuong')";
                mysqli_query($conn, $sqlAdd);
            }else{
                // Lấy số lượng cũ.
                $result = mysqli_fetch_assoc(mysqli_query($conn, $sqlKiemTra));
                $soLuongMoi = $result['soLuong'] + $soLuong;
                $sqlUpdate = "UPDATE gioHang SET soLuong='$soLuongMoi' WHERE (idCustomer='$user' AND idQuanAo='$id')";
                mysqli_query($conn, $sqlUpdate);
            }
            if ($_POST['buy_type'] == 'buy_now')
                header('Location: ./cart.php');
            else
                echo "<script>alert('Đã thêm thành công')</script>";
        }
    }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;500;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../font-icon/fontawesome-free-6.0.0-web/css/all.css">
    <link rel="stylesheet" href="../css/gridsystem.css">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/reponsive.css">
    <link rel="stylesheet" href="../Css/dangnhap.css">
    <link rel="stylesheet" href="../Css/cart.css">
    <link rel="stylesheet" href="../Css/chitietsp.css">
</head>
<body>
    <div class="row">
        <?php include '../sidebar.php' ?>
        <!-- main -->
        <div class="content col l-10">
            <div class="header__login">
                <div class="header__login-img">
                    <img src="../img/DangNhap--slide.webp">
                </div>
            </div>
            <a href="javascript:history.go(-1)" style="color: grey"><i class="fa-solid fa-arrow-left-long fa-3x"></i></a>
            <div class="row" style="margin-bottom: 100px ; justify-content:start">
                <div class="col-sm" style="padding-left: 50px;">
                    <?php echo '<img src="../img/'.$row['img'].'" width="400" >'?>
                </div>    
            <div class="col-sm"style="margin-left: 40px; width: 680px; ">    
                    <?php echo '<p style="margin-top:50px;  font-size: 3em; font-weight: bold;">'.$row['ten'].'</p>'?>
                    <?php echo '<p style="margin-top:50px;  font-size: 2.5em; color: red;">'.$row['price'].' VND</p>'?>
                    <form style="margin-top: 50px" action="" method="post">
                        <label style="font-size: 2em; margin: top 3px;0px;" for="quantity">Số lượng:</label>
                        <input class="text-right" value="1" style="font-size: 2em; text-align: center" type="number" name="quantity" min="1" <?php echo 'max="'.$row['tonKho'].'"'?>>
                        <br>
                        <button type="submit" name="buy_type" value="buy_later" class="btn btn-outline-warning addCart" style="font-size: 1.75em; width: 49%; margin-top: 20px; border: 1px solid #FF000; padding: 10px 10px; background: white; color: red; border: 1px solid;">
                            Thêm vào giỏ hàng.</button>
                        <button type="submit" name="buy_type" value="buy_now" class="btn btn-outline-danger" style="font-size: 1.75em; width: 49%; margin-top: 20px; border: 1px solid #FF000; padding: 10px 10px; color: back; background: white; border: 1px solid; margin-bottom:20px">
                            Mua ngay</button>
                    </form>
                    <button type="submit" class="btn btn-secondary" style="font-size: 1.75em; width:100%; padding:10px 0 ; margin-top:0px; background: black; color:white;" href="">Đang có tại các cửa hàng</button>
                    <div class="service" style="font-size: 14px; margin-top:20px">
                        <p style="margin-bottom:10px">
                            <i class="fa-solid fa-angles-right"></i>  BẢO HÀNH SẢN PHẨM 90 NGÀY</p>
                        <p style="margin-bottom:10px">
                            <i class="fa-solid fa-angles-right"></i>  ĐỔI HÀNG TRONG VÒNG 30 NGÀY</p>
                        <p style="margin-bottom:10px">
                            <i class="fa-solid fa-angles-right"></i>  HOTLINE BÁN HÀNG 0868164588</p>
                    </div>
                </div>
            </div>
            <?php include '../footer.php' ?>
        </div>
    </div>
</body>
</html>