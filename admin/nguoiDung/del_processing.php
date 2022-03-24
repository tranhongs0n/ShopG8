<?php
    include '../../connect.php';
    if (!isset($_SESSION['admin']))
        header('Location: ../../login.php');
    $username = $_GET['id'];
    $sql = "DELETE FROM users WHERE email = '$username'";
    $result = mysqli_query($conn, $sql);

    if ($result > 0){
        header("Location:./");
    }else{
        echo "Đã có lỗi xảy ra.";
        echo $sql;
    }
?>