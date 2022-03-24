<?php 
    include '../../connect.php';
    if (!isset($_SESSION['admin']))
        header('Location: ../../login.php');
    $sql="SELECT * FROM users";
    $result=mysqli_query($conn, $sql); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Chỉnh sửa người dùng</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="../../font-icon/fontawesome-free-6.0.0-web/css/all.css">
    <link rel="stylesheet" href="../../css/admin-qldonhang.css">
    <link rel="stylesheet" href="../../css/gridsystem.css">
    <link rel="stylesheet" href="../../css/base.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/reponsive.css">
    <link rel="stylesheet" href="../../Css/dangnhap.css">
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
                            <li class="page-admin-header-item"style=" background: #fff;  ">
                                <a href="../nguoiDung/index.php" class="page-admin-header-link"style="color:#4267B2">
                                    <i class="fa-regular fa-user"></i> Quản Lý Người Dùng</a>
                            </li>
                            <li class="page-admin-header-item" >
                                <a href="../quanAo/index.php" class="page-admin-header-link" >
                                    <i class="fa-solid fa-shirt"></i>Quản Lý Sản Phẩm</a>
                            </li>
                            <li class="page-admin-header-item">
                                <a href="../thongke/thongkedonhang.php" class="page-admin-header-link">
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
                    <span>Danh sách sản phẩm</span>
                </div>
            </div>
            <div class="page-admin-sidebar-bottom">
                <div class="page-admin-sidebar-search">
                    <div class="">
                        <input type="text" placeholder="Tìm kiếm" class="page-admin-sidebar-input" style="  with:350px;  padding: 10px;">
                    <button class="page-admin-search-btn" style="    padding: 10px 20px;">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>  
                    </div>  
                    <div class="setting-btn">
                        <a class="btn btn-success" href="">Thêm mới người dùng</a>   
                        <button class="btn exprot-btn">
                            Xuất file
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <a href="../" class="fa fa-arrow-left"> Quay lại</a>
        
    <div class="manage-user" style="border: 1px solid #000; margin-top:20px">
        <table class="table" style="font-size:14px">
            <thead>
            <tr>
                <th scope="col">Tài khoản</th>
                <th scope="col">Quyền</th>
                <th></th>
            </tr>
            </thead>

            <tbody>
                <?php
                    if (mysqli_num_rows($result)>0)
                        while ($row=mysqli_fetch_assoc($result)){
                            echo '<tr>';
                            echo '<th scope="row">'.$row['email'].'</th>';
                            if ($row['permission'])
                                echo '<th scope="row">admin</th>';
                            else
                                echo '<th scope="row">Nguời dùng</th>';
                            echo '<td>  <a style="margin-right:40px" href="update_form.php?id='.$row['email'].'"><i class="fas fa-edit fa-lg"></i></a>      
                                        <a style="color:red" href="del_processing.php?id='.$row['email'].'"><i class="fas fa-trash fa-lg"></i></a>
                                            </td>';
                            echo '</tr>';
                        }
                ?>
            </tbody>
        </table>
    </div>
    </div>
</body>