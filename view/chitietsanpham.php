<div class="hr"></div>
<div class="banner">
  <?php $one_danhmuc =  load_one_danhmuc($one_sanpham['id_danhmuc'])  ?>
  <?php if ($one_danhmuc['video_danhmuc'] != "") : ?>
    <video src="images/<?= $one_danhmuc['video_danhmuc'] ?>" autoplay="autoplay" muted loop></video>
  <?php else : ?>
    <img src="images/BANNER_DONG_HO_CHUAN_PC.png" alt="">
  <?php endif ?>
</div>
<div class="hr"></div>
<main>
  <div class="thongtin_sanpham">
    <div class="head_desc">
      <div class="head_left">
        <img src="images/<?= $one_sanpham['img_sanpham'] ?>" alt="" />
      </div>
      <div class="head_center">
        <form  method="post">
        <h1><?= $one_sanpham['ten_sanpham'] ?></h1>
        <hr>
        <p>Mã SP : <?= $one_sanpham['id_sanpham'] ?></p><br>
        <p>Số lượng : <?= $one_sanpham['soluong'] ?></p><br>
        <h2>Giá : <span><?= number_format($one_sanpham['price']) ?>đ</span></h2>
        <!-- <br>
        <select name="size" id="" style="width:100px;margin-right:20px">
          <option value="">--Chọn size--</option>
          <?php foreach($all_sizesanpham as $all_size_sp):?>
            <option value="<?=$all_size_sp['size']?>"><?=$all_size_sp['size']?></option>
            <?php endforeach ?>
        </select> -->
        
  <br>
        <h2>Thông tin thêm:</h2>
        <hr>
        <p><?= $thongtinwebsite['camket']  ?></p>

        <div class="button">
          <input type="hidden" name="id_sanpham" value="<?= $one_sanpham['id_sanpham'] ?>">
          <input type="hidden" name="ten_sanpham" value="<?= $one_sanpham['ten_sanpham'] ?>">
          <input type="hidden" name="hinh" value="<?= $one_sanpham['img_sanpham'] ?>">
          <input type="hidden" name="price" value="<?= $one_sanpham['price'] ?>">

       
         <?php if($one_sanpham['soluong'] <= 0): ?>
          <h2 style="color:red">Sản phẩm đã bán hết!</h2>
          <?php else : ?>
            <button data-id="<?= $one_sanpham['id_sanpham'] ?>" class="buy" type="submit" name="buy" onclick="addTo_cart(<?= $one_sanpham['id_sanpham'] ?>,'<?= $one_sanpham['ten_sanpham'] ?>',<?= $one_sanpham['price'] ?>)">Mua ngay</button>
          <!-- NÚt thêm vào giỏ hàng  -->
          <button data-id="<?= $one_sanpham['id_sanpham'] ?>" class="add" type="submit" name="addtocart" onclick="addTo_cart(<?= $one_sanpham['id_sanpham'] ?>,'<?= $one_sanpham['ten_sanpham'] ?>',<?= $one_sanpham['price'] ?>)">Thêm vào giỏ hàng</button>
         
            <?php endif ?>
          </div>
        </form>
      </div>
      <div class="head_right">
        <div class="box">
          <h1 style="text-transform:uppercase">Địa chỉ mua hàng</h1>
          <hr>
          <p><?= $thongtinwebsite['diachi'] ?></i></p>
          <p> Hotline : <?= $thongtinwebsite['hotline'] ?></p>

        </div>
        <div class="box">
          <p><?= $thongtinwebsite['vanchuyen'] ?></p>
        </div>
    

      </div>
    </div>
    <div class="end_desc">
      <div class="end_left">
        <h2>Thông tin sản phẩm</h2>
        <h3><?= $one_sanpham['ten_sanpham'] ?></h3>
        <!-- Tiêu đề 1 -->
        <?php if (!empty($one_sanpham['description'])) : ?>
          <p><?= $one_sanpham['description'] ?></p>
          <?php else :?>
            <p>Chưa có thông tin sản phẩm</p>
        <?php endif ?>
       
        <div class="box">
        <h2 style="text-transform:uppercase">ĐÁNH GIÁ CỦA KHÁCH HÀNG</h2>
        <hr>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                $("#binhluan").load("view/binhluan/binhluanform.php", {
                    id_sanpham: <?= $id_sanpham ?>
                });
            });
        </script>
        
       
       <div class="row" id="binhluan">

</div>

     
       
        </div>
        
      </div>
      <div class="end_right">
        <ul class="thongsokithuat">
          <p class="name_table">THÔNG SỐ KĨ THUẬT</p>
          <li>
            <span>Dòng sản phẩm</span>
            <p style="text-transform:uppercase"><?= $one_sanpham['ten_danhmuc'] != '' ? $one_sanpham['ten_danhmuc'] : "Chưa có thông tin" ?></p>
          </li>
          <li>
            <span>Thấm nước</span>
            <p><?= $one_sanpham['thamnuoc'] != '' ? $one_sanpham['thamnuoc'] : "Chưa có thông tin" ?></p>
          </li>

          <li>
            <span>Vành đồng hồ</span>
            <p><?= $one_sanpham['vanhdongho'] != '' ? $one_sanpham['vanhdongho'] : "Chưa có thông tin" ?></p>
          </li>
          <li>
            <span>Năng lượng</span>
            <p><?= $one_sanpham['nangluong'] != '' ? $one_sanpham['nangluong'] : "Chưa có thông tin" ?></p>
          </li>
          <li>
            <span>Chất liệu vỏ</span>
            <p><?= $one_sanpham['chatlieuvo'] != '' ? $one_sanpham['chatlieuvo'] : "Chưa có thông tin" ?></p>
          </li>
          <li>
            <span>Dây đeo</span>
            <p><?= $one_sanpham['daydeo'] != '' ? $one_sanpham['daydeo'] : "Chưa có thông tin" ?></p>
          </li>
          <li>
            <span>Khóa</span>
            <p><?= $one_sanpham['khoa'] != '' ? $one_sanpham['khoa'] : "Chưa có thông tin" ?></p>
          </li>
          <li>
            <span>Mặt kính</span>
            <p><?= ($one_sanpham['matkinh']) != '' ? $one_sanpham['matkinh'] : "Chưa có thông tin"  ?></p>
          </li>
          <li>
            <span>Sản xuất tại</span>
            <p><?= $one_sanpham['sanxuattai'] != '' ? $one_sanpham['sanxuattai'] : "Chưa có thông tin" ?></p>
          </li>
        </ul>
        <br><br>
       
        <p></p>
      </div>
    </div>

  </div>
  <!-- <h2 class="title_sanphamlienquan"> <img style="width:300px; text-align:center;" src="images/chan_logo.png" alt=""></h2> -->
  <h2 class="title_sanphamlienquan">XEM THÊM CÁC SẢN PHẨM KHÁC</h2>
  <div class="sanphamlienquan">
    <?php foreach ($four_sanphamlienquan as $four_splq) : ?>

      <div class="product">
        <a href="?act=chitietsanpham&id_sp=<?= $four_splq['id_sanpham'] ?>">
          <img src="images/<?= $four_splq['img_sanpham'] ?>" alt="">
          <h3><?= $four_splq['ten_sanpham'] ?></h3>
          <p><?= number_format($four_splq['price'])  ?> đ</p>
        </a>
      </div>
    <?php endforeach; ?>
  </div>
</main>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
  let totalProduct = document.getElementById('totalProduct');
  function addTo_cart(productId,productName,productPrice){
    // SỬ dụng jquery
    $.ajax({
      type:'POST',
      // Đường để tới tệp php xử lý dữ liệu
      url:"./view/addTocart.php",
      data:{
        id: productId,
        name: productName,
        price: productPrice
      },
      success:function(response){
        totalProduct.innerText = response;
      },
      error: function(error){
        console.log(error);
      }
    });
  }
</script>