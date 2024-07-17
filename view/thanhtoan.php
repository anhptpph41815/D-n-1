<main style="background-color: white;">
    <div class="cart-content" style="padding-bottom:30px">
        <div class="modal-body">

            <div class="cart-left">
                <h2 style="color: red;">THÔNG TIN THANH TOÁN</h2>
                <hr>
                <div id="error-message" style="color: red; display: none;font-size:15px"></div>
                <form action="view/bill.php" method="post" onsubmit="return validateForm()">
                    <?php if (isset($_SESSION['user'])) : ?>
                        <?php $khachhang = select_one_khachhang($_SESSION['user']['id_user']) ?>
                    <?php endif ?>
                    <input type="hidden" name="id_user" value="<?= $khachhang['id_user'] ?? "" ?>"  >
                    <span class="paycart" style="color: black;">Họ và Tên*</span>
                    <input class="input-pay" type="text" name="hovaten" id="hovaten" value="<?= $khachhang['ten'] ?? '' ?>">

                    <span class="paycart" style="color: black;">Địa chỉ*</span>
                    <input class="input-pay" type="text" name="address" id="address" value="<?= $khachhang['address'] ?? '' ?>">
                    <span class="paycart" style="color: black;">Số điện thoại*</span>
                    <input class="input-pay" type="text" name="tel" id="tel" value="<?= $khachhang['tel'] ?? '' ?> ">
                    <span class="paycart" style="color: black;">Địa chỉ email*</span>
                    <input class="input-pay" type="text" name="email" id="email" value="<?= $khachhang['email'] ?? '' ?>">
                    <span class="paycart" style="color: black;">Hình thức thanh toán*</span>
                    <select class="input-pay" name="pttt" id="pttt">
                        <option value="" disabled selected>--Chọn hình thức thanh toán--</option>
                        <option value="0">Thanh toán khi nhận hàng</option>
                        <option value="1">Chuyển khoản</option>
                    </select>
              


            </div>

            <div class="cart-right" style="border: 2px solid black;">
                <strong class="cart-item cart-header cart-column">ĐƠN HÀNG CỦA BẠN</strong>
                <div class="total-pay">

                    <div class="head">
                        <div class="head_lf"><b>Sản phẩm</b></div>
                        <div class="head_rt"><b>Giá</b></div>
                    </div>
                    <div class="hr1"></div>
                    <div class="content">
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


                            <div class="row" style="display:flex;flex-direction:row;border-bottom:1px solid gray;padding:5px">
                                <div class="head_lf"><?= $product['ten_sanpham'] ?> <b style="color:orangered">x<?= $quantityInCart ?></b></div>
                                <div class="head_rt"><b><?= number_format((int)$product['price'] * (int)$quantityInCart, 0, ",", ".") ?> <u>đ</u></b></div>

                            </div>
                        <?php
                            // Tính tổng giá đơn hàng
                            $sum_total += ((int)$product['price'] * (int)$quantityInCart);

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
                    <button class="btn-thanhtoan" name="dathang">Đặt hàng</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</main>

<script>
    function validateForm() {
        var hovaten = document.getElementById('hovaten').value;
        var address = document.getElementById('address').value;
        var tel = document.getElementById('tel').value;
        var email = document.getElementById('email').value;
        var pttt = document.getElementById('pttt').value;

        // Kiểm tra Họ và Tên
        if (hovaten.trim() === '') {
            showErrorMessage('Vui lòng nhập Họ và Tên.');
            return false;
        }
        function validateName(name){
            var nameRegex = /^[\p{L}\s]+$/u;
            var words = name.split(/\s+/);
            return nameRegex.test(name) && words.length >= 3;
        }
        if(!validateName(hovaten)){
            showErrorMessage('Họ và tên không hợp lệ');
            return false;
        }
        
      

        // Kiểm tra Địa chỉ
        if (address.trim() === '') {
            showErrorMessage('Vui lòng nhập Địa chỉ.');
            return false;
        }

        // Kiểm tra Số điện thoại
        if (tel.trim() === '') {
            showErrorMessage('Vui lòng nhập Số điện thoại.');
            return false;
        }

        // Kiểm tra Địa chỉ email
        if (email.trim() === '') {
            showErrorMessage('Địa chỉ email không được để trống.');
            return false;
        }if (!validateEmail(email) ){
            showErrorMessage('Địa chỉ email không hợp lệ.');
            return false;
        }

        // Kiểm tra Hình thức thanh toán
        if (pttt.trim() === '') {
            showErrorMessage('Vui lòng chọn Hình thức thanh toán.');
            return false;
        }

        // Nếu mọi thứ hợp lệ, ẩn thông báo lỗi (nếu có)
        hideErrorMessage();
        return true;
    }

    // Hàm kiểm tra địa chỉ email hợp lệ
    function validateEmail(email) {
        var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email);
    }
    function validateTel(tel) {
        var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email);
    }

    // Hàm hiển thị thông báo lỗi
    function showErrorMessage(message) {
        var errorMessage = document.getElementById('error-message');
        errorMessage.innerHTML = message;
        errorMessage.style.display = 'block';
    }

    // Hàm ẩn thông báo lỗi
    function hideErrorMessage() {
        var errorMessage = document.getElementById('error-message');
        errorMessage.style.display = 'none';
    }
</script>