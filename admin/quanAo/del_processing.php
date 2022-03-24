<?php
    include '../../connect.php';
    if (!isset($_SESSION['admin']))
        header('Location: ../../login.php');
    $id = $_GET['id'];
    $sql = "DELETE FROM quanAo WHERE idQuanAo = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result > 0){
        header("Location:./");
    }else{
        echo "Đã có lỗi xảy ra.";
        echo $sql;
    }
?>