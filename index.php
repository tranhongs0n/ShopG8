<?php 
    include 'connect.php';
    $user = isset($_SESSION['user']) ? $user = $_SESSION['user']:[];
    $sql = "SELECT * FROM quanAo";
    $result = mysqli_query($conn, $sql);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop G8</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;500;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./font-icon/fontawesome-free-6.0.0-web/css/all.css">
    <link rel="stylesheet" href="./css/gridsystem.css">
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/reponsive.css">
</head>
<body>
    <div class="row">
        <?php include 'sidebar.php' ?>
        <div class="content col l-10">
            <div class="content__slider">
                <a href="" class="content__slider-link">
                    <img src="./img/slider-1.jpg" class="content__slider-img">
                </a>
            </div>
            <div class="content-wrap">
                <div class="content__header">
                <h1 class="content__header-title">QUẦN NAM</h1>
                <div class="content__header-menu">
                    <nav>
                        <ul class="content__header-menu-list">
                            <li class="content__header-menu-item">
                                <a href="" class="content__header-menu-item-link">ÁO THUN</a>
                            </li>
                            <li class="content__header-menu-item">
                                <a href="" class="content__header-menu-item-link">ÁO SƠ MI NAM</a>
                            </li>
                            <li class="content__header-menu-item">
                                <a href="" class="content__header-menu-item-link">QUẦN SHORT</a>
                            </li>
                            <li class="content__header-menu-item">
                                <a href="" class="content__header-menu-item-link">QUẦN DÀI</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
            <div class="content__product">
                <div class="grid wide">
                    <div class="row">
                        <?php 
                        if (mysqli_num_rows($result) > 0)
                            while ($row = mysqli_fetch_assoc($result)){
                        ?>
                            <div class="content__product-item col l-3">
                                <div class="content__product-item-img">
                                    <?php echo '<a href="user/detail.php?id='.$row['idQuanAo'].'">
                                                    <img src="img/'.$row['img'].'" height="320">' ?></a>
                                </div>
                                <div class="content__product-item-price">
                                    <?php echo '<span>'.$row['price'].' VNĐ</span>' ?>
                                </div>
                            </div>
                            <?php }?>
                    </div>
                </div>
            </div>
            <?php include 'footer.php' ?>
        </div>
    </div>
</body>
</html>