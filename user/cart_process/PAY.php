<?php
    include '../../connect.php';
    isset($_SESSION['user']) ? $user = $_SESSION['user']:header('Location: ../../login.php');
    $idCustomer = $user['id'];
    // Tạo đơn hàng mới
    mysqli_query($conn, "INSERT INTO donHang (idCustomer) VALUES ('$idCustomer')");
    // Lấy id đơn hàng mới.
    $sql = "SELECT idDonHang FROM donHang WHERE idCustomer = '$idCustomer' ORDER BY idDonHang DESC";
    $result = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    $idDonHang = $result['idDonHang'];
    $tongTien = 0;
    // Tạo donHang_chitiet.
    // Lấy từ giỏ hàng sang
    $sql = "SELECT * FROM gioHang WHERE idCustomer = '$idCustomer'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result)>0){
        while ($row=mysqli_fetch_assoc($result)){
            $idQA = $row['idQuanAo'];
            $sl = $row['soLuong'];
            //Thêm vào chi tiết đơn hàng.
            mysqli_query($conn, "INSERT INTO donHang_chiTiet VALUES ('$idDonHang', '$idQA', '$sl')");
            // Tính tiền.
            $sql = "SELECT * FROM quanAo WHERE idQuanAo = '$idQA'";
            $ttSP = mysqli_fetch_assoc(mysqli_query($conn, $sql));
            $tongTien = $tongTien+$ttSP['price']*$sl;
            // Cập nhật sl sp còn lại.
            $tonKhoM = $ttSP['tonKho'] - $sl;
            // Cập nhật sl sp đã bán.
            $daBanM = $ttSP['daBan'] + $sl;
            mysqli_query($conn, "UPDATE quanAo SET tonKho='$tonKhoM', daBan='$daBanM' where idQuanAo='$idQA'");
            }
        // Cập nhật tổng tiền.
        mysqli_query($conn, "UPDATE donHang SET thanhTien = '$tongTien' where idDonHang='$idDonHang'");
    }
    // Xoá sản phẩm vừa thanh toán khỏi giỏ hàng.
    mysqli_query($conn, "DELETE FROM gioHang WHERE idCustomer = '$idCustomer'");
    header('Location: ../history.php');
?>