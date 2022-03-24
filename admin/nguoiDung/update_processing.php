<?php
    include '../../connect.php';
    if (!isset($_SESSION['admin']))
        header('Location: ../../login.php');
    
    $username = $_POST["username"];
    $pass1 = $_POST["pass1"];
    $pass2 = $_POST["pass2"];
    $permission = $_POST["permission"];
    
    if ($pass1 != $pass2){
        echo '<div style="text-align:center">';
        echo '<h1>2 mật khẩu không trùng nhau.</h1>';
        echo '<a href="./update_form.php?id='.$username.'">Quay lại</a>';
        echo '</div>';
    }else{
        $sql = "UPDATE users SET email ='$username', passwd ='$pass1', permission ='$permission' WHERE email = '$username'";
        echo '<h1>$sql</h1>';
        $result = mysqli_query($conn, $sql);        
        if ($result){
            header("Location:./");
        }else{
            echo ''.$sql.'';
            echo '<div style="text-align:center">';
            echo '<h1>Đã có lỗi xảy ra.<h1>';
            echo '<a href="./">Về trang chủ</a>';
            echo '</div>';
        }
    }
?>