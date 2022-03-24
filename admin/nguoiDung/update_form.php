<?php
    include '../../connect.php';
    $username = $_GET['id']; 
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
    <title>Sửa thông tin user</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <div class="container shadow" style="margin: auto; margin-top:3%; padding: 100px;">
        <a href="./" class="fa fa-arrow-left"> Quay lại</a>
        <h1 class = "bg-info text-center">Chỉnh sửa thông tin người dùng</h1>
        <form action = "update_processing.php" method = "POST">

            <label class="form-label">Username:</label>
            <input type="text" class="form-control" name="username" value = <?php echo $username?> readonly>

            <label class="form-label">Mật khẩu mới:</label>
            <input type="password" class="form-control" name="pass1">
            
            <label class="form-label">Nhập lại mật khẩu mới:</label>
            <input type="password" class="form-control" name = "pass2">

            <label class="form-label">Quyền:</label>
            <select class="form-control" name="permission">
            <?php
                if ($row['permission']){
                    echo '<option value = "1">Admin</option>;';
                    echo '<option value = "0">Người dùng</option>;';
                }else{
                    echo '<option value = "0">Người dùng</option>;';
                    echo '<option value = "1">Admin</option>;';
                }
            ?>
            </select><br>

            <button type="submit" class="btn btn-primary" name='sbmUpdate'>Cập nhật</button>
        </form>
    </div>
</body>