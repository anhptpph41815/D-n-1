<?php
session_start();
include "../pdo/connection.php";
include "../pdo/sanpham.php";

// Kiểm tra xem giỏ hàng có dữ liệu hay không
if (!empty($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];

    // Tạo mảng chứa ID các sản phẩm trong giỏ hàng
    $productId = array_column($cart, 'id');

    // Chuyển đôi mảng id thành một cuỗi để thực hiện truy vấn
    $idList = implode(',', $productId);

    // Lấy sản phẩm trong bảng sản phẩm theo id
    $dataDb = load_one_sanpham_cart($idList);
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
        <tr align="center">
            <td><?= $key + 1 ?></td>
            <td>
                <img src="images/<?= $product['img_sanpham'] ?>" alt="<?= $product['ten_sanpham'] ?>" style="width: 100px; height: auto">
            </td>
            <td><?= $product['ten_sanpham'] ?></td>
            <td><?= number_format((int)$product['price'], 0, ",", ".")  ?> <u>đ</u></td>
            <td>
                <input type="number" value="<?= $quantityInCart ?>" min="1" id="quantity_<?= $product['id_sanpham'] ?>" oninput="updateQuantity(<?= $product['id_sanpham'] ?>, <?= $key ?>)">
            </td>
            <td>
                <?= number_format((int)$product['price'] * (int)$quantityInCart, 0, ",", ".") ?> <u>đ</u>
            </td>
            <td>
                <button>Xóa</button>
            </td>
        </tr>
    <?php
        // Tính tổng giá đơn hàng
        $sum_total += ((int)$product['price'] * (int)$quantityInCart);

        // Lưu tổng giá trị vào sesion
        $_SESSION['resultTotal'] = $sum_total;
    endforeach;
    ?>

    <tr>
        <td colspan="5" align="center">
            <h2>Tổng tiền hàng:</h2>
        </td>
        <td colspan="2" align="center">
            <h2>
                <span>
                    <?= number_format((int)$sum_total, 0, ",", ".")  ?> <u>đ</u>
                </span>
            </h2>
        </td>
    </tr>
<?php
}
?>