<?php
    include '../../connect.php';
    if (!isset($_SESSION['admin']))
        header('Location: ../../login.php');
    $id = $_POST['id'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_name = $_FILES['image']['name'];
    $ten=$_POST['ten'];
    $soLuong = $_POST['soLuong'];
    $gia=$_POST['gia'];

    $sql="UPDATE quanao SET ten='$ten', tonKho='$soLuong', price='$gia', img='$file_name' where idQuanAo = '$id'";
    $result=mysqli_query($conn, $sql);
    copy($file_tmp,'../../img/'.$file_name.'');
    header("Location:./");
?>