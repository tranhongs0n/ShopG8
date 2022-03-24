<?php 
    include '../connect.php';
    if(session_id() == '')
        session_start();
    isset($_SESSION['user']) ? $user = $_SESSION['user']:header('Location: ../login.php');
    
    $idCustomer = $user['id'];
    $sql = "SELECT * FROM gioHang WHERE idCustomer = '$idCustomer'";
    $result = mysqli_query($conn, $sql);
    // Thanh toan.
    if (isset($_GET['pay_type']))
        if ($_GET['pay_type']=='continue')
            header('Location: ../');
        else
            if ((empty($user['address']) || (empty($user['name'])))){
?>
                <script>
                    let check = confirm('Bạn chưa điền đủ thông tin, bạn có muốn điền thêm?');
                    if (check)
                        location.replace('../profile.php');
                </script>
<?php
            }else
                header('Location: ./cart_process/pay.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop G8</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;500;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorig   in>
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../font-icon/fontawesome-free-6.0.0-web/css/all.css">
    <link rel="stylesheet" href="../css/gridsystem.css">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/reponsive.css">
    <link rel="stylesheet" href="../Css/dangnhap.css">
    <link rel="stylesheet" href="../Css/cart.css">
</head>
<body>
    <div class="container">
        <div class="grid">
            <div class="row">
                <?php include '../sidebar.php' ?>
                <div class="content col l-10">
                    <?php if (mysqli_num_rows($result)>0){ ?>
                        <form action="">
                            <div class="form__cart" style="margin-top:30px">
                                <ul>
                                    <div class="form__cart-product">
                                        <li>SẢN PHẨM</li>
                                    </div>
                                    <div class="form__cart-price-amount-avg" style="align-items: center; text-align: center; padding-right:0">
                                        <li style="margin-right: 23px ;margin-left: -33px;">GIÁ</li>
                                        <li>SỐ LƯỢNG</li>
                                        <li>THÀNH TIỀN</li>
                                    </div>
                                </ul>
                            <?php 
                            $tongTien = 0;
                            while ($row=mysqli_fetch_assoc($result)){
                                $idQA = $row['idQuanAo'];
                                $sql2 = "SELECT * FROM quanao WHERE idQuanAo = '$idQA'";
                                $thongTin = mysqli_fetch_assoc(mysqli_query($conn, $sql2));
                                $sl = $row['soLuong'];
                                $gia = $thongTin['price'];
                                $tien = $sl*$gia;
                                $tongTien += $tien;
                        ?>
                                <div class="form__cart-info" style="align-items:center">
                                    <div class="form__cart-info-product" style="display: flex; justify-content:center; align-items:center ">
                                        <div class="form__cart-info-img">
                                            <?php echo '<img src="../img/'.$thongTin['img'].'" height="130">'; ?>
                                        </div>
                                        <div class="form__cart-info-name" style=" font-size: 18px; margin-left: 30px;">
                                            <?php echo '<span><a style="color: #000 ;" href="./detail.php?id='.$idQA.'">'.$thongTin['ten'].'</a></span>'?>
                                        </div>
                                    </div>
                                    <div class="form__cart-info-price-amount-avg">
                                        <div class="form__cart-info-price">
                                            <?php echo '<span>'.$gia.'</span>';?>
                                        </div>
                                        <div class="form__cart-info-amount">
                                            <button class="form__cart-info-amount-btn number">
                                                <?php echo '<span>'.$sl.'</span>';?>                                                    
                                            </button>
                                        </div>
                                        <div class="form__cart-info-total">
                                            <?php echo '<span>'.$tongTien.'</span>';?>
                                        </div>
                                    </div>
                                    <div class="form__cart-info-exit">
                                            <a href="cart_process/DEL.php?id=<?php echo $idQA ?>" style="color:black">
                                                <i class="fa-solid fa-x"></i>
                                            </a>
                                        </div>
                                </div>
                            <?php } ?>
                                <div class="form__cart-note-totalMoney">
                                    <div class="form__cart-totalMoney">
                                        <h3>Tổng Tiền</h3>
                                        <?php echo '<span>'.$tongTien.'</span>';?>
                                        <p>Vận chuyển và thuế tính lúc thanh toán</p>
                                        <div class="form__cart-totalMoney-btn-wrap">
                                            <form action="" method="post">
                                                <button type="submit" name="pay_type" value="continue" class="form__cart-totalMoney-btn continueBuy">
                                                    Tiếp Tục Mua Hàng
                                                </button>
                                                <button type="submit" name="pay_type" value="now" class="form__cart-totalMoney-btn pay">
                                                    Thanh Toán
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </form>
                    <?php
                        }else{ ?>
                            <div style="margin-top: 10%; margin-bottom:170px; font-size: 1.75em">
                                <a href="javascript:history.go(-1)"><i class="fa-solid fa-arrow-left-long"></i> Quay lại</a>
                                <h1 style="margin-top: 5%; margin-bottom:100px">Bạn chưa có gì trong giỏ hàng.</h1>
                                <a href="../">Mua ngay</a>
                            </div>
                    <?php
                        }
                        include '../footer.php';
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>