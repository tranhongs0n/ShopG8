<?php
    include '../../connect.php';
    if (!isset($_SESSION['admin']))
        header('Location: ../../login.php');
    $id = $_GET['id']; 
    $sql = "SELECT * FROM quanAo where idQuanAo = '$id'";
    $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Sửa thông tin user</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <div class="container shadow" style="margin: auto; margin-top:3%; padding: 100px;">
        <a href="./" class="fa fa-arrow-left"> Quay lại</a>
        <h1 class = "bg-info text-center">Chỉnh sửa thông tin sản phẩm</h1>
        <form action = "update_processing.php" method = "POST" enctype="multipart/form-data">
        
            <label class="form-label">ID:</label>
            <input type="text" class="form-control" name="id" <?php echo "value = \"".$row['idQuanAo']."\"";?> readonly>
            
            <label class="form-label">Tên sản phẩm:</label>
            <input type="text" class="form-control" name="ten" <?php echo "value = \"".$row['ten']."\"";?>>

            <label class="form-label">Số lượng:</label>
            <input type="number" class="form-control" name="soLuong" <?php echo "value = \"".$row['tonKho']."\"";?>>

            <label class="form-label">Giá:</label>
            <input type="number" class="form-control" name="gia" <?php echo "value = \"".$row['price']."\"";?>>
            
            <label class="form-lable">Ảnh sản phẩm</label>
            <div>
                <input type="file" class="form-control" name="image" required>
                <div class="invalid-feedback">Vui Lòng chọn 1 tệp</div>
            </div>
            
            <button type="submit" class="btn btn-primary" name='sbmUpdate'>Cập nhật</button>
        </form>
    </div>
</body>