<main>
    <div class="thongtin_user">
      <div class="head" >
         
          <!-- <div class="text_thongtin">
              <h1><?= $one_khachhang['ten'] ?></h1>
              <p>Tuổi: 19</p>
              <p>Email: <?= $one_khachhang['email'] ?></p>
              <p>Sđt: 0369.037.600</p>
              <p>Địa chỉ: 213 Phương Canh, Xuân Phương, Nam Từ Liêm, Hà Nội</p>
          </div> -->
      
<div class="text_thongtin">
              <h1><?=$one_khachhang['ten'] ?></h1>
              <p>Email: <?= $one_khachhang['email'] ?></p>
              <p>Địa chỉ: <?= $one_khachhang['address'] ?></p>
              <p>Số điện thoại: <?= $one_khachhang['tel'] ?></p>
              <input type="hidden" name=" <?= $one_khachhang['id_user'] ?>">
          </div>
      </div>


      <div class="end">
          <!-- <div class="box">
              <p>Cập nhật thông tin</p>
          </div>
          <div class="box">
              <p>Đổi mật khẩu</p>
          </div>
          <div class="box">
              <p>Địa chỉ nhận hàng</p>
          </div>
          
          <div class="box">
              <p>Quản lý bình luận</p>
          </div>
          <div class="box">
            <p>Đơn hàng của tôi</p>
        </div>
          <div class="box">
              <p>Đơn hàng đã hoàn thành</p>
          </div> -->
         <form  action="" method="post" style="display:flex;flex-direction:row">
            <button class="box" type="submit" name=""><a href="index.php?act=updateinfor">Cập nhật thông tin</a></button>
            <button class="box" type="submit" name=""><a href="index.php?act=changepassword">Đổi mật khẩu</a></button>
            <button class="box" type="submit" name=""><a href="index.php?act=quanlybinhluan">Quản lý bình luận</a></button>
            <button class="box" type="submit" name=""><a href="index.php?act=list_donhang">Đơn hàng của tôi</a></button>
            <button onclick="return confirm('Bạn có chắc chắn muốn đăng xuất không?')" class="box" type="submit" name="dangxuat">Đăng xuất</button>
         </form>
         
        
      </div>
  </div>
  </main>

  <!-- <style>
     #avatar-container {
            width: 120px;
            height: 120px;
            position: relative;
            overflow: hidden;
            border-radius: 50%;
        }

        #avatar-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        #upload-btn-wrapper {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: rgba(0, 0, 0, 0.5);
            cursor: pointer;
        }

        #upload-btn-wrapper input[type=file] {
            font-size: 100px;
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            cursor: pointer;
        }

        #upload-btn-wrapper label {
            color: white;
            font-size: 1.2em;
            text-align: center;
        }
  </style> -->

