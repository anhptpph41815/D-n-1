<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="style_admin.css">
    </head>
    <body>
        <div class="admin">
            <main>
                <div class="main_left">
                 <div class="logo"> <a href="../index.php?act=trangchu"><img  style="width: 150px;" src="../images/xin500k.png" alt=""></a></div>
                    <ul>
                        
                        <li><a href="index.php"><i class="fa-solid fa-house"></i>Thống kê</a></li>
                        <li><a href="?act=sanpham"><i class="fa-brands fa-shopify"></i>Sản phẩm</a></li>
                        <li><a href="?act=danhmuc"><i class="fa-solid fa-list"></i>Danh mục</a></li>
                        <?php if($_SESSION['admin']['role']  == 1 ): ?>
                        <li><a href="?act=khachhang"><i class="fa-solid fa-user"></i>Khách hàng</a></li>
                        <?php endif ?>
                        <li><a href="?act=binhluan"><i class="fa-solid fa-comment"></i>Bình luận</a></li>
                        <li></i><a href="?act=donhang"><i style="font-size: 20px;width: 40px;" class="fa-solid fa-cart-shopping"></i>Đơn hàng</a></li>
                        <!-- <li><a href="?act=thongtinwebsite"><i class="fa-solid fa-comment"></i>Thông tin website</a></li> -->
                    </ul>
                </div>
                <div class="main_right" style="padding:0px">
                    <div class="head" style="background-color:white">
                        <div class="form">
                            <form action="">
                                <input  type="text" name="" id="" placeholder="Search for...">
                                <button ><i class="fa-solid fa-magnifying-glass" style="font-size: 20px;"></i></button>
                            </form>
                           </div>
                        <div class="option">
                            <i class="fa-solid fa-bell"></i>
                            <i class="fa-solid fa-envelope"></i>
                            <div class="user">
                                <h6><?= $_SESSION['admin']['email'] ?></h6>
                              
                            </div>
                            <a onclick="return confirm('Bạn có chắc chắn muốn đăng xuất không?')" href="?act=dangxuat"><i class="fa-solid fa-right-from-bracket"></i></a>
                        </div>
                    </div>
