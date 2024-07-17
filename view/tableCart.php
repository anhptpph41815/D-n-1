<?php
session_start();
include "../pdo/connection.php";
include "../pdo/sanpham.php";

// Kiểm tra xem giỏ hàng có dữ liệu hay không
if (!empty($_SESSION['cart'])) :
    $cart = $_SESSION['cart'];

    // Tạo mảng chứa ID các sản phẩm trong giỏ hàng
    $productId = array_column($cart, 'id');

    // Chuyển đôi mảng id thành một cuỗi để thực hiện truy vấn
    $idList = implode(',', $productId);

    // Lấy sản phẩm trong bảng sản phẩm theo id
    $dataDb = load_one_sanpham_cart($idList) ?>
    <div  class="modal-body">
            <div  class="cart-left">
                <div class="cart-row">
                    <span class="cart-img" style="font-weight:700">Sản Phẩm</span>
                    <span class="cart-tensp"style="font-weight:700">Tên</span>
                    <span class="cart-price"style="font-weight:700">Giá</span>
                    <span class="cart-quantity"style="font-weight:700">Số Lượng</span>
                    <span class="cart-count"style="font-weight:700">Tổng</span>
                    <span class="cart-option"style="font-weight:700">Chức năng</span>
                </div>
                <hr>
                <div class="cart-items">


                    <?php
                    $sum_total = 0;
                    foreach ($dataDb as $key => $product) :
                        // kiểm tra số lượng sản phẩm trong giỏ hàng
                        $quantityInCart = 0;
                        foreach ($_SESSION['cart'] as $item) {
                            if ($item['id'] == $product['id_sanpham']) {
                                $quantityInCart = $item['quantity'];
                                break;
                            }
                        }
                    ?>
                        <div class="cart-row">
                            <div class="cart-img">
                                <img style="width:80px" class="" src="images/<?= $product['img_sanpham'] ?>" >
                            </div>
                            <div class="cart-tensp" style="margin-top:10px">
                                <span  class=""><?= $product['ten_sanpham'] ?></span>
                            </div>
                            <div class="cart-price"  style="margin-top:25px">
                                <span class=""><?= number_format((int)$product['price'], 0, ",", ".")  ?> <u>đ</u></span>
                            </div>
                            <div class="cart-quantity" style="margin-top:25px">
                                 <input type="number" value="<?= $quantityInCart ?>" min="1" id="quantity_<?= $product['id_sanpham'] ?>" oninput="updateQuantity(<?= $product['id_sanpham'] ?>, <?= $key ?>)">
                              
                            </div>
                            <div class="cart-count" style="margin-top:25px">
                            <b style="color:black"><?= number_format((int)$product['price'] * (int)$quantityInCart, 0, ",", ".") ?> <u>đ</u></b></div>
                            <div class="cart-option">
                            <button style="height:30px;text-align:center;line-height:30px;margin-top:25px" onclick="removeFormCart(<?= $product['id_sanpham'] ?>)" class="btn btn-danger">Xóa</button></div>
                        </div>
                        <hr>

                    <?php
                        // Tính tổng giá đơn hàng
$sum_total += ((int)$product['price'] * (int)$quantityInCart);

                        // Lưu tổng giá trị vào sesion
                        $_SESSION['resultTotal'] = $sum_total;
                    endforeach;
                    ?>




                </div>

            </div>
            <div class="cart-right">
                <strong class="cart-item cart-header cart-column">TỔNG HÓA ĐƠN</strong>
                <hr class="hr1">
                <div class="total-cart">
                    <div class="total-left">
                        <span class="cart-total">Tổng cộng: </span>
                        <br>
                        <!-- <hr>
                        <span class="cart-total">Giảm giá: </span>
                        <hr>
                        <span class="cart-total">Thành tiền: </span>
                        <hr> -->
                    </div>
                    <div class="total-right">
                        
                        <span class="cart-total-price"><?= number_format((int)$sum_total, 0, ",", ".")  ?> <u>đ</u></span>
                        <br>
                        <!-- <hr>
                        <span class="cart-discount-price"><b>42424</b></span>
                        <hr>
                        <span class="cart-grand-total-price"><b><?= $tongtien ?></b></span>
                        <br>
                        <hr> -->
                    </div>

                </div>
                <?php if ($sum_total > 0) : ?>
                    <button class="btn-thanhtoan"><a href="?act=thanhtoan">TIẾN HÀNH THANH TOÁN</a></button>

                <?php endif ?>
                <button class="btn-viewmore"><a href="?act=trangchu">TIẾP TỤC XEM THÊM SẢN PHẨM</a></button>


            </div>
        </div>
<?php endif ?>