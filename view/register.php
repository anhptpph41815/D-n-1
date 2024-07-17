<main>
    <div class="main-register">

        <!-- form đăng nhập -->
    
        <div class="login">
          <h2>ĐĂNG KÝ</h2>
          <form action="" method="post">
           
            Họ và tên<br>
            <input type="text" placeholder="Tên"  name="ten"  value="<?= (isset($ten)) ? trim($ten) : '' ?>">
            <hr>
            <?php  if(isset($errors['ten']['empty'])) : ?>
            <span style="color:red"><?= $errors['ten']['empty']?></span><br>
            <?php endif?>
            <?php  if(isset($errors['ten']['number'])) : ?>
            <span style="color:red"><?= $errors['ten']['number']?></span><br>
            <?php endif?>
            <?php  if(isset($errors['ten']['fail'])) : ?>
            <span style="color:red"><?= $errors['ten']['fail']?></span><br>
            <?php endif?>
            Email<br>
            <input type="text" placeholder="Email" value="<?= (isset($email)) ? trim($email) : '' ?>" name="email">  
            <hr>
            <?php  if(isset($errors['email']['empty'])) : ?>
            <span style="color:red"><?= $errors['email']['empty']?></span><br>
            <?php endif?>
            <?php  if(isset($errors['email']['fail'])) : ?>
            <span style="color:red"><?= $errors['email']['fail']?></span><br>
            <?php endif?>
           
            Mật khẩu<br>
            <input type="text" placeholder="Mật khẩu"  value="<?= (isset($password)) ? trim($password) : "" ?>"  name="password">   
            <hr>  
            <?php  if(isset($errors['password']['empty'])) : ?>
            <span style="color:red"><?= $errors['password']['empty']?></span><br>
            <?php endif?>
            <?php  if(isset($errors['password']['fail'])) : ?>
            <span style="color:red"><?= $errors['password']['fail']?></span><br>
            <?php endif?>

           <?php if(isset($_COOKIE['message'])) : ?>
            <p style="color:red"><?= $_COOKIE['message'] ?></p>
            <?php endif ?>
        
            <button type="submit" name="submit">Đăng ký</button>
          </form>
          <div class="dacotk" style="margin-top: 20px;">
            Bạn đã có tài khoản? <a href="?act=login">Đăng nhập</a>
          </div>
        </div>
      </div>
 </main>
