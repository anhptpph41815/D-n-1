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
<div class="banner">
<div class="hr"></div>
      <img src="images/BANNER_DONG_HO_CHUAN_PC.png" alt="">
<div class="hr"></div>
        </div>
<main >
<div class="form_search">
    <form action="?act=list_sp" method="post">
        <input type="text" name="kyw" id="" placeholder="Tìm kiếm...">
        <input type="submit" name="clickok" value="Tìm kiếm">
    </form>
</div>
<div class="brand" >
    <h1>Kết quả tìm kiếm "<?= $_POST['kyw'] ?>"</h1>
    <div class="list">
        <?php if(empty($all_sanpham)): ?>
            <h1 style="color:red">Không có sản phẩm nào </h1>
            <?php else: ?>
        <?php foreach ($all_sanpham as $sp) : ?>
            <!-- box của từng sản phẩm  -->
            <div class="product" style="margin-top: 30px;">
                <a href="?act=chitietsanpham&id_sp=<?= $sp['id_sanpham'] ?>">
                    <img src="images/<?= $sp['img_sanpham'] ?>" alt="">
                    <h3><?= $sp['ten_sanpham'] ?></h3>
                    <p><?= number_format($sp['price'])  ?>đ</p>
                </a>
            </div>
        <?php endforeach ?>
        <?php endif ?>
    </div>
    </div>
   
</main>