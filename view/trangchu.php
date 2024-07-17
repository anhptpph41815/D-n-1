<style>
    .form_search {
        display: flex;
        margin-left: 50px;
        margin-top: 20px;
    }
  .form_search input[type='text']{
    width: 15%;
  }
    .form_search input {
        width: 10%;
        padding: 8px; /* Thêm padding để tăng kích thước ô input */
        border: 1px solid #ccc; /* Thêm đường viền để ô input rõ ràng hơn */
        border-radius: 5px; /* Bo tròn góc ô input */
        transition: all 0.3s; /* Thêm hiệu ứng transition */
    }

    .form_search input:hover {
        border-color: #555; /* Đổi màu đường viền khi hover */
        background-color: #f5f5f5; /* Đổi màu nền khi hover */
    }

    .form_search input[type="submit"] {
        cursor: pointer; /* Biến đổi con trỏ thành pointer khi hover vào nút submit */
        background-color: #4caf50; /* Màu nền cho nút submit */
        color: #fff; /* Màu chữ cho nút submit */
        border: none; /* Xóa đường viền cho nút submit */
        border-radius: 5px; /* Bo tròn góc cho nút submit */
        margin-left: 5px; /* Khoảng cách giữa input và nút submit */
        transition: background-color 0.3s; /* Thêm hiệu ứng transition */
    }

    .form_search input[type="submit"]:hover {
        background-color: #45a049; /* Đổi màu nền khi hover vào nút submit */
    }
</style>

<div class="hr"></div>
        <div class="banner">
            <img src="images/BANNER_DONG_HO_CHUAN_PC.png" alt="">
        </div>
        <div class="hr"></div>
<main>
    <!-- Trong form trang chủ -->
<div class="form_search">
    <form action="?act=list_sp" method="post">
        <input type="text" name="kyw" id="" placeholder="Tìm kiếm...">
        <input type="submit" name="clickok" value="Tìm kiếm">
    </form>
</div>
    <h3>XEM SẢN PHẨM THEO THƯƠNG HIỆU</h3>
    <div class="listbrand">
        <?php $count = 1; foreach ($all_danhmuc as $all_dm) : ?>
            <a href="index.php?act=category_products&id_dm=<?= $all_dm['id_danhmuc'] ?>"><img src="images/<?= $all_dm["img_danhmuc"] ?>" alt=""></a>
            <?php $count++; if($count ==6){
                break;
            } ?>
            
        <?php  endforeach ?>

    </div>



    <div class="brand">
    <?php foreach ($all_danhmuc as $all_dm) : ?>
        <!-- Danh sách 4 sản phẩm mới nhất -->
        <?php $four_sanpham = load_four_sanpham($all_dm['id_danhmuc']);
                $all_sanpham = select_all_sanpham()?>
        <div class="list">
            <?php $check = false; foreach($all_sanpham as $all_sp): ?>
                <?php if($all_dm['id_danhmuc'] == $all_sp['id_danhmuc']) :?>
                    <?php $check = true; ?>
                    <?php endif ?>
                <?php endforeach ?>

                <?php if($check == true): ?>
                    <!-- Tên hãng  -->
                    <h1><?= $all_dm['ten_danhmuc'] ?></h1>

            <?php foreach($four_sanpham as $four_sp) : ?>
                <!-- box của từng sản phẩm  -->
                    <div class="product">
                <a href="?act=chitietsanpham&id_sp=<?= $four_sp['id_sanpham'] ?>">
                    <img src="images/<?= $four_sp['img_sanpham'] ?>" alt="">
                    <h3><?= $four_sp['ten_sanpham'] ?></h3>
                    <p><?= number_format( $four_sp['price'])  ?>đ</p>
                </a>
            </div>
            <?php endforeach ?>
                <!-- Nút xem tất cả hãng -->
            <div class="btn-view-all-product">
            <a href="?act=category_products&id_dm=<?= $all_dm['id_danhmuc'] ?>">XEM TẤT CẢ ĐồNG Hồ <?= $all_dm['ten_danhmuc'] ?></a>
        </div>
                    <?php endif ?>
        </div>

            <!-- Button xem tất cả sản phẩm  -->
            
        <?php endforeach ?>
       


    </div>


    </div>
   
</main>