<?php 
    include '../connect.php';
    if(session_id() == '')
        session_start();
    isset($_SESSION['user']) ? $user = $_SESSION['user']['id']:header('Location: /shopg8/login.php');
    $sql = "SELECT * FROM users, donhang_chitiet, donhang, quanao WHERE donhang_chitiet.idDonHang=donhang.idDonHang and users.id = donhang.idCustomer and quanao.idQuanAo = donhang_chitiet.idQuanAo and idCustomer = '$user' ORDER BY donhang.idDonHang DESC";
    $result = mysqli_query($conn, $sql);
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
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../font-icon/fontawesome-free-6.0.0-web/css/all.css">
    <link rel="stylesheet" href="../css/gridsystem.css">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/reponsive.css">
    <link rel="stylesheet" href="../css/dangnhap.css">
</head>
<body>
    <div class="row" >
        <?php include '../sidebar.php' ?>
        <div class="content col l-10" style="margin-top: 20px; font-size: 1.75em">
            <div class="header__login">
                <div class="header__login-img">
                    <img src="../img/DangNhap--slide.webp" alt="">
                </div>
                <div class="header__login-title">
                    <h2 style="font-weight: 400">L???ch s??? mua h??ng</h2>
                </div>
            </div>
            
            <a href="javascript:history.go(-1)" ><i class="fa-solid fa-arrow-left-long" style="padding: 20px 0"></i> Quay l???i</a>
            <?php if (mysqli_num_rows($result)>0){?>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">M?? ????n h??ng</th>
                        <th scope="col">T??n ng?????i ?????t</th>
                        <th scope="col"></th>
                        <th scope="col">S???n ph???m</th>
                        <th scope="col">S??? l?????ng</th>
                        <th scope="col">Gi?? ti???n</th>
                        <th scope="col">?????a ch???</th>
                        <th scope="col">S??T</th>
                        <th scope="col">Ng??y ?????t</th>
                        <th scope="col">Th??nh ti???n</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $STT = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            if ($STT==0)
                                $preDH=$row['idDonHang'];
                            if (($STT==0) || ($preDH != $row['idDonHang'])){ 
                                $STT++;
                                ?>
                                <tr style="background-color: whitesmoke">
                                    <td><?php echo $STT?></td>
                                    <th scope="col"><?php echo $row['idDonHang']?></th>
                                    <th scope="col" colspan="5"><?php echo $row['name']?></th>
                                    <th scope="col"><?php echo $row['address']?></th>
                                    <th scope="col"><?php echo $row['phone']?></th>
                                    <th scope="col"><?php echo $row['ngaytao']?></th>
                                    <th scope="col"><?php echo $row['thanhTien']?></th>
                                </tr>
                            <?php } ?>
                            
                            <tr>
                                <td colspan="3"></td>
                                <td><?php echo '<img src="/shopg8/img/'.$row['img'].'" style="height:100px"'?></td>
                                <td><?php echo $row['ten']?></td>
                                <td><?php echo $row['soLuong']?></td>
                                <td><?php echo $row['price']?></td>
                            </tr>
                        <?php
                            $preDH = $row['idDonHang'];
                        } ?>
                </tbody>
                </table>
            <?php
            }else{
                echo '<h1>B???n ch??a t???ng ?????t h??ng t???i Shop.</h1>';
                echo '<div  style="margin-bottom:100px"><a href="../">Mua ngay</a></div>';
            }
            ?>
            <?php include '../footer.php' ?>
        </div>
        
    </div>
</body>
</html>