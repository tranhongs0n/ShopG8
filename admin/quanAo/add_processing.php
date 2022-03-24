<?php
    include '../../connect.php';
    if (!isset($_SESSION['admin']))
        header('Location: ../../login.php');
    $file_tmp = $_FILES['hinhanh']['tmp_name'];
    $file_name = $_FILES['hinhanh']['name'];
    $ten=$_POST['ten'];
    $soLuong = $_POST['soLuong'];
    $gia=$_POST['gia'];

    $sql="INSERT INTO quanao(ten, tonkho, price, img) VALUES ('$ten', '$soLuong', '$gia', '$file_name')";
    mysqli_query($conn, $sql);
    copy($file_tmp,'../../img/'.$file_name.'');
    header("Location:./");
?>