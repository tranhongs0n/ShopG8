<?php
    if (session_id() == '')
        session_start();
    if (!isset($_SESSION['admin']))
        header('Location: ../../login.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>ADMIN</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <h1 class="bg-success text-center">Trang quản lý</h1>
    <div class="text-center" style="margin-top:5%">
        <a class="btn btn-success" href="nguoiDung">Quản lý người dùng</a>
        <p></p>
        <a class="btn btn-success" href="quanAo" style="margin-top:2%">Quản lý sản phẩm</a>
        <p></p>
        <a class="btn btn-success" href="./thongke/thongkedonhang.php" style="margin-top:2%">Quản lý đơn hàng</i></a>
        <p></p>
        <a class="btn btn-warning" href="../logout.php" style="margin-top:2%"> Đăng xuất</i></a>
    </div>
</body>
</html>
