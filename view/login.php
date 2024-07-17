<main>
    <div class="main-login">

        <!-- form đăng nhập -->
    
        <div class="login">
          <h2>ĐĂNG NHẬP</h2>
          <form action="" method="post">
            Email<br>
            <input type="text" name="email" value="<?= (isset($email)) ? trim($email) : "" ?>" placeholder="Email">
            <hr>
            <?php  if(isset($errors['email']['empty'])) : ?>
            <span style="color:red"><?= $errors['email']['empty']?></span><br>
            <?php endif?>
            <?php  if(isset($errors['email']['fail'])) : ?>
            <span style="color:red"><?= $errors['email']['fail']?></span><br>
            <?php endif?>

            Mật khẩu<br>
            <input type="text" name="password"value="<?= (isset($password)) ? trim($password) : "" ?>" placeholder="Mật khẩu">
            <?php  if(isset($errors['password']['empty'])) : ?>
            <span style="color:red"><?= $errors['password']['empty']?></span><br>
            <?php endif?>

            <span style="color:red"><?= $_COOKIE['message'] ?? "" ?></span>
            <hr>
            <button type="submit" name="dangnhap">Đăng nhập</button>
          </form>
          <p style="text-align:center">hoặc đăng nhập bằng</p>
          <div class="icons" >
            <div class="facebook" >
              <i class="fa-brands fa-facebook" style="width: 3%;"></i>
              <a href="">
                <h4>Facebook</h4>
              </a>
            </div>
            <div class="google" >
              <i class="fa-brands fa-google" style="width: 3%;"></i>
              <a href="">
                <h4>Google</h4>
              </a>
            </div>
          </div>
          <div class="datlai_matkhau" style="text-align:center">
          <a href="?act=forgotpass">  Quên mật khẩu? </a>
          </div>
    
        </div>
        <div class="register">
          <h2>ĐĂNG KÝ</h2>
          <h4>Thiết lập tài khoản để xem và cập nhật chi tiết thông tin tài khoản, theo dõi trạng thái và lịch sử đơn đặt
            hàng của bạn.</h4>
          <a href="?act=register"><button>Đăng ký tài khoản</button></a>
        </div>
    
      </div>
  </main>