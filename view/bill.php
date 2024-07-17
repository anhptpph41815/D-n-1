<?php 
session_start();
// if (!isset($_SESSION['page_refreshed'])) {
//     // Nếu chưa, đặt biến session và chuyển hướng người dùng đến trang chủ
//     $_SESSION['page_refreshed'] = true;
//     header("Location:../index.php?act=trangchu");
//     exit(); // Đảm bảo dừng việc thực thi sau khi chuyển hướng
// }
include "../pdo/connection.php";
include "../pdo/danhmuc.php";
include "../pdo/sanpham.php";
$all_danhmuc = load_all_danhmuc();
include 'thuvien.php';
if(!isset($_SESSION['cart'])){
    header('location:../index.php?act=trangchu');
}
if(isset($_POST['dathang'])){
    $id_user = "";
    if(isset($_POST['id_user'])){
        $id_user = $_POST['id_user'];
    }
    $name = trim($_POST['hovaten']);
    $address = trim($_POST['address']);
    $tel = trim($_POST['tel']);
    $email = trim($_POST['email']);
    $ngayhientai = date("m/d/Y");
    $date = date('Y-m-d', strtotime($ngayhientai));
    $pttt = $_POST['pttt'];
    $tong = 0 ;
    
  if(isset($_SESSION['cart'])){
    for( $i=0;$i < sizeof($_SESSION['cart']); $i++){
        $tt = $_SESSION['cart'][$i]['quantity'] *  $_SESSION['cart'][$i]['price'];
        $tong += $tt;
    }


    // insert đơn hàng 
    $id_bill =taodonhang($id_user,$name,$address,$tel,$email,$tong,$date,$pttt);
    // Lấy thoogn tin khách hàng từ form để tạo đơn hàng
  

    $cart = $_SESSION['cart'];

    // Tạo mảng chứa id các sản phẩm trong giỏ hàng
    $productId = array_column($cart, 'id');
    
    // Chuyển đổi mảng id thành 1 chuỗi để thực hiện truy vấn
    $idList = implode(',',$productId);
    // Lấy sản phẩm trong bảng sản phẩm theo id 
    $dataDb = load_one_sanpham_cart($idList);
    // Lấy thông tin giỏ hàng từ session + id đơn hàng vừa tạo 
    foreach ($dataDb as $key => $product){
        $sum_total = 0;
        // kiểm tra số lượng sản phẩm trong giỏ hàng
        $quantityInCart = 0;
        foreach ($_SESSION['cart'] as $item) {
            if ($item['id'] == $product['id_sanpham']) {
                $quantityInCart = $item['quantity'];
                break;
            }
        }
 
        $sum_total += ((int)$product['price'] * (int)$quantityInCart);
        $id_sanpham = $product['id_sanpham'];
        $ten_sanpham = $product['ten_sanpham'];
        $hinhsp = $product['img_sanpham'];
        $price = $product['price'];
        $soluong = $quantityInCart;
        
        taochitietbill($id_sanpham,$ten_sanpham,$hinhsp,$price,$soluong,$sum_total,$id_bill);
        
    }
    // insert vào bảng giỏ hàng

    // show confirm đơn hàng
    //unset giỏ hàng session
    unset($_SESSION['cart']);

  }
}
?>
<?php 
?>
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
    <link rel="stylesheet" href="../style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="tong">
        <div class="menu">
            <ul>
                <li><a href="../?act=trangchu">TRANG CHỦ</a></li>
                <li><a href="">SẢN PHẨM</a>
                    <ul class="sub-menu">
                        <?php foreach ($all_danhmuc as $danhmuc) : ?>
                            <li><a href="../?act=category_products&id_dm=<?= $danhmuc['id_danhmuc'] ?>"><?= $danhmuc['ten_danhmuc'] ?></a></li>
                        <?php endforeach ?>
                    </ul>
                </li>
                <li><a href="?act=tintuc">TIN TỨC</a></li>

            </ul>
            <div class="logo">
                <a href="../?act=trangchu"><img style="width: 160px;" src="../images/xin500k.png" alt=""></a>
            </div>
           
            <ul >
                <!-- <li><a href=""><i class="fa-solid fa-magnifying-glass" style="font-size: 20px;"></i></a></li> -->
                <li><a href="../?act=cart"><i class="fa-solid fa-cart-shopping" style="font-size: 20px;"></i>
                <!-- <span style="color:red;font-size:20px;" id='totalProduct'><?= !empty($_SESSION['cart']) ? count($_SESSION['cart']) : "" ?></span> -->
            </a></li>
            <li ><a href="../?act=tracuu"><i class="fa-solid fa-bag-shopping" style="font-size: 20px;"></i></a></li>
            <!-- <li><a href="?act=list_donhang"><i class="fa-solid fa-bag-shopping" style="font-size: 20px;"></i></a></li> -->
                <li><a href="../?act=user"><i class="fa-solid fa-user" style="font-size: 20px;"></i></a></li>
            </ul>
        </div>
        <main style="background-color: white;">
            <div class="cart-content" style="padding-bottom:10px;">
                <div class="modal-body">
                    
                    <div class="cart-left">
                        <h1 style="color:red">ĐẶT HÀNG THÀNH CÔNG</h1>
                        <hr>
                        <h2 style="color:red">Thông tin nhận hàng</h2>
                        <span class="paycart"  style="color: black;">Mã đơn hàng* <?= $id_bill ?></span>
                       
                        <span class="paycart"  style="color: black;">Họ và Tên*</span>
                        <h2 style="color:orange" ><?= $name ?></h2>
                        <span class="paycart"  style="color: black;">Địa chỉ*</span>
                        <h2 style="color:orange" ><?= $address ?></h2>
                        <span class="paycart"   style="color: black;">Số điện thoại*</span>
                        <h2 style="color:orange" ><?= $tel ?></h2>
                        <span class="paycart"  style="color: black;">Địa chỉ email*</span>
                        <h2 style="color:orange" ><?= $email ?></h2>
                        <span class="paycart" style="color: black;">Hình thức thanh toán*</span>
                        <h2 style="color:orange" ><?= $pttt == 1 ?  "Chuyển khoản" :"Thanh toán khi nhận hàng"   ?></h2>
                       
                       

                    </div>
                    <div class="cart-right" style="border: 2px solid black;">
                        <strong class="cart-item cart-header cart-column" style="color:red">THÔNG TIN SẢN PHẨM</strong>
                        <div class="total-pay">

                        <div class="head">
                            <div class="head_lf"><b>Sản phẩm</b></div>
                            <div class="head_rt"><b>Giá</b></div>
                        </div>
                        <div class="hr1"></div>
                        <div class="content">
                        <?php 
                   
                        $sum_total = 0;
                        $thongtindonhang = thongtindonhang($id_bill);
                        foreach($thongtindonhang as $ttdh):
                    ?>
                              
                            
                               <div class="row" style="display:flex;flex-direction:row;border-bottom:1px solid gray;padding:5px">
                               <div class="head_lf" ><?= $product['ten_sanpham']?> <b style="color:orangered">x<?= $ttdh['soluong'] ?></b></div>
                                <div class="head_rt" ><b ><?= number_format((int)$ttdh['price'] * (int)$ttdh['soluong'], 0, ",", ".") ?> <u>đ</u></b></div>
                               
                               </div>
                                <?php
                        // Tính tổng giá đơn hàng
                        $sum_total += ((int)$ttdh['price'] * (int)$ttdh['soluong']);

                        // Lưu tổng giá trị vào sesion
                        $_SESSION['resultTotal'] = $sum_total;
                    endforeach;
                    ?>

                        </div>
                        <div class="giaohang">
                            <div class="head_lf">Giao hàng</div>
                            <div class="head_rt">Giao hàng miễn phí</div>
                        </div>
                        
                        <div class="sum_all">
                            <div class="head_lf">Tổng cộng</div>
                            <div class="head_rt"><b style="color: orangered;"> <?= number_format((int)$sum_total, 0, ",", ".")  ?> <u>đ</u></b></div>
                        </div>
                        </div>
                    </div>
                    
                </div>
                <a href="../?act=trangchu" class="button">Trở về trang chủ</a>
            </div>
        </main>
<div class="hr"></div>
        <footer>
            <?php  $thongtinwebsite = load_all_thongtinwebsite(1); ?>
            <div class="footer_1">
              <img src="../images/LOGOSUTU500K.png" alt="" />
            </div>
            <div class="footer_2">
              <h1><?= $thongtinwebsite['ten_website'] ?></h1>
              <hr />
              <p><?= $thongtinwebsite['diachi'] ?></p>
              <br />
              <h4>☏Hotline : <?= $thongtinwebsite['hotline'] ?></h4>
              <hr />
              <p>
              <?= $thongtinwebsite['ten_website'] ?>.
              <?= $thongtinwebsite['diachi'] ?><br>
              <?= $thongtinwebsite['description'] ?>
                <!-- aHa LUXURY OFFICERSố 3A Trần Quang Diệu - Đống Đa - TP. Hà Nội (Việt
                Nam)☏Hotline : 093.66.88888 - Di động : 083.22.99999EU LUXURY CHUYÊN
                CUNG CẤP – PHÂN PHỐI CÁC DÒNG ĐIỆN THOẠI VERTU, TRANG SỨC & ĐỒNG HỒ
                CHÍNH HÃNG NHẬP KHẨU TỪ CHÂU ÂU -->
              </p>
              <br />
              <p>Email: <?= $thongtinwebsite['email'] ?></p>
              <br />
              <div class="icon">
                <div class="facebook_icon"><p>Facebook</p></div>
                <div class="youtobe_icon">Youtube</div>
                <div class="bo_cong_thuong">
                  <img src="images/datbao.png" alt="">
                </div>
              </div>
            </div>
            <div class="footer_3">
              <h1>DỊCH VỤ</h1>
              <p>- Sửa chữa thay da Đồng hồ</p>
              <p>- Thu mua</p>
              <p>- Ký gửi</p>
              <p>- Cá nhân hóa đồng hồ</p>
      
              <h1>ĐIỀU KHOẢN</h1>
              <p>- Chính sách đổi trả hàng</p>
              <p>- Chính sách vận chuyển</p>
              <p>- Chính sách bảo hành sản phẩm</p>
              <p>- Điều khoản sử dụng</p>
              <p>- Chính sách thanh toán</p>
            </div>
            <div class="footer_4">
              <h1>MUA HÀNG</h1>
              <p>- Hướng dẫn mua hàng</p>
              <p>- Đổi mới trong vòng 15 ngày nếu sản phẩm bị lỗi do nhà sản xuất</p>
              <p>- Thanh toán trực tiếp hoặc qua Atm Visa Master Card</p>
              <div class="phone_number">
                <p>HOTLINE: <span><?= $thongtinwebsite['hotline'] ?></span></p>
              </div>

          </footer>
    </div>

</body>


</html>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    // hàm cập nhật số lượng
    function updateQuantity(id, index) {
        // lấy giá trị của ô input
        let newQuantity = $('#quantity_' + id).val();
        if (newQuantity <= 0) {
            newQuantity = 1
        }

        // Gửi yêu cầu bằng ajax để cập nhật giỏ hàng
        $.ajax({
            type: 'POST',
            url: './view/updateQuantity.php',
            data: {
                id: id,
                quantity: newQuantity
            },
            success: function(response) {
                // Sau khi cập nhật thành công
                $.post('view/tableCart.php', function(data) {
                    $('#order').html(data);
                })
            },
            error: function(error) {
                console.log(error);
            },
        })
    }

    function removeFormCart(id) {
        if (confirm("Bạn có đồng ý xóa sản phẩm hay không?")) {
            // Gửi yêu cầu bằng ajax để cập nhật giỏ hàng
            $.ajax({
                type: 'POST',
                url: './view/deleteCart.php',
                data: {
                    id: id
                },
                success: function(response) {
                    // Sau khi cập nhật thành công
                    $.post('view/tableCart.php', function(data) {
                        $('#order').html(data);
                    })
                },
                error: function(error) {
                    console.log(error);
                },
            })
        }
    }

    
</script>

<style>
    a {
       
        height: 40px;
        width:50%;
        margin:0 auto;
        text-align: center;
    text-decoration: none;
    color: inherit;
    cursor: pointer;
}

/* Style the link as a button */
a.button {
    margin-top: 10px;
    line-height: 40px;
    display: inline-block;
    background-color: orangered;
    color: #fff;
    border: none;
    border-radius: 4px;
    transition: background-color 0.3s ease;
}

/* Hover effect */
a.button:hover {
    background-color: orange;
}
</style>

<!-- <?php unset($_SESSION['page_refreshed']); ?> -->