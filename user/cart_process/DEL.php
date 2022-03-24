<?php
    if(session_id() == '')
        session_start();
    isset($_SESSION['user']) ? $user = $_SESSION['user']['id']:header('Location: ../../login.php');
    include '../../connect.php';
    $idQuanAo = $_GET['id'] ;
    $sqlXoa = "DELETE FROM gioHang WHERE (idCustomer = '$user' AND idQuanAo = '$idQuanAo')";
    mysqli_query($conn, $sqlXoa);
    header('Location: ../cart.php');
?>