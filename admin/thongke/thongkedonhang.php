<?php 
    include '../../connect.php';
    $sql = "SELECT * FROM users, donhang_chitiet,donhang,quanao WHERE donhang_chitiet.idDonHang=donhang.idDonHang and users.id = donhang.idCustomer and quanao.idQuanAo = donhang_chitiet.idQuanAo";
    $result = mysqli_query($conn, $sql);
    if(!$result){
        echo $result->error;
        die();
    }
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
    <link rel="stylesheet" type="text/css" href="../../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../font-icon/fontawesome-free-6.0.0-web/css/all.css">
    <link rel="stylesheet" href="../../css/gridsystem.css">
    <link rel="stylesheet" href="../../css/base.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/reponsive.css">
    <link rel="stylesheet" href="../../css/admin-qldonhang.css">

</head>
<body>
    <div class="container-admin">
        <div class="page-admin-wrap">
            <div class="page-admin-header">
                <div class="page-admin-header-right">
                    <div class="page-admin-header-logo"   >
                        <a href="../">
                        <img src="../../img/logo.jpg" alt="">
                        </a>
                    </div>
                    <div class="page-admin-header-option">
                        <ul class="page-admin-header-list">
                            <li class="page-admin-header-item">
                                <a href="../nguoiDung/index.php" class="page-admin-header-link">
                                    <i class="fa-regular fa-user"></i> Quản Lý Người Dùng</a>
                            </li>
                            <li class="page-admin-header-item" >
                                <a href="../quanAo/index.php" class="page-admin-header-link">
                                    <i class="fa-solid fa-shirt"></i>Quản Lý Sản Phẩm</a>
                            </li>
                            <li class="page-admin-header-item" style=" background: #fff;  ">
                                <a href="../thongke/thongkedonhang.php" class="page-admin-header-link"  style="color:#4267B2">
                                    <i class="fa-solid fa-box-archive"></i>Quản lý đơn hàng</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="page-admin-header-left">
                    <a href="">
                        <i class="fa-regular fa-bell"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="page-admin-sidebar">
            <div class="page-admin-sidebar-top">
                <div class="page-admin-sidebar-top-left">
                    <a href="">
                        <i class="fa-solid fa-gear"></i>
                    </a>
                    <span>Danh sách đơn hàng</span>
                </div>
                <div class="page-admin-siderbar-top-right">
                    <div class="search-time">
                        <i class="fa-solid fa-angle-down"></i>
                        <span>15h00</span>
                        <i class="fa-solid fa-right-long"></i>
                        <i class="fa-solid fa-angle-down"></i>
                        <span>20h00</span>
                    </div>
                </div>
            </div>
            <div class="page-admin-sidebar-bottom">
                <div class="page-admin-sidebar-search">
                    <div class="">
                        <input type="text" placeholder="Tìm kiếm" class="page-admin-sidebar-input">
                    <button class="page-admin-search-btn">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>  
                    </div>  
                    <div class="setting-btn">
                        <button class="btn setting-stranfer-btn">
                            Cài đặt chuyển phát
                        </button>   
                        <button class="btn exprot-btn">
                            Xuất ra kho
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container col" style="margin-top: 20px; font-size: 1.75em; background-color: #fff"  >
        <a href="javascript:history.go(-1)"><i class="fa-solid fa-arrow-left-long"></i> Quay lại</a>
        <div class="manage-user" style="border: 1px solid #000; margin-top:20px">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Mã đơn hàng</th>
                        <th scope="col" >Tên khách hàng</th>
                        <th></th>
                        <th scope="col">Sản phẩm</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Giá tiền</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Ngày đặt</th>
                        <th scope="col">Thành tiền</th>
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
                                <tr style="background-color: lightgray">
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
                                <td><?php echo '<img src="../../img/'.$row['img'].'" style="height:100px"'?></td>
                                <td><?php echo $row['ten']?></td>
                                <td><?php echo $row['soLuong']?></td>
                                <td><?php echo $row['price']?></td>
                            </tr>
                        <?php
                            $preDH = $row['idDonHang'];
                        } ?>
                </tbody>
            </table>    
        </div>
    </div>
</body>
</html>