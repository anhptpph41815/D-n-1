<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AHA Luxury - Đồng hồ chính hãng</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="images/xin500k.png">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="tong">
        <div class="menu">
            <ul>
                <li><a href="?act=trangchu">TRANG CHỦ</a></li>
                <li><a href="">SẢN PHẨM</a>
                    <ul class="sub-menu">
                        <?php foreach ($all_danhmuc as $danhmuc) : ?>
                            <li><a href="?act=category_products&id_dm=<?= $danhmuc['id_danhmuc'] ?>"><?= $danhmuc['ten_danhmuc'] ?></a></li>
                        <?php endforeach ?>
                    </ul>
                </li>
                <li><a href="?act=tintuc">TIN TỨC</a></li>

            </ul>
            <div class="logo">
                <a href="?act=trangchu"><img style="width: 160px;" src="images/xin500k.png" alt=""></a>
            </div>
            <ul >
                <!-- <li><a href=""><i class="fa-solid fa-magnifying-glass" style="font-size: 20px;"></i></a></li> -->
                <li><a href="?act=cart"><i class="fa-solid fa-cart-shopping" style="font-size: 20px;"></i>
                <!-- <span style="color:red;font-size:20px;" id='totalProduct'><?= !empty($_SESSION['cart']) ? count($_SESSION['cart']) : "" ?></span> -->
            </a></li>
            <li ><a href="?act=tracuu"><i class="fa-solid fa-bag-shopping" style="font-size: 20px;"></i></a></li>
            <!-- <li><a href="?act=list_donhang"><i class="fa-solid fa-bag-shopping" style="font-size: 20px;"></i></a></li> -->
                <li><a href="?act=user"><i class="fa-solid fa-user" style="font-size: 20px;"></i></a></li>
            </ul>
        </div>
        <style>
            #totalProduct {
                position: absolute;
                top: 0;
                right: 0;
                color: white;
                font-size: 12px;
                z-index: 2;
            }
        </style>