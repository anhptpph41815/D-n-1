<style>
    /* Reset some default styles */
/* h1,
h2,
h3,
p,
form,
input {
    margin: 0;
    padding: 0;
}

body {
    font-family: 'Arial', sans-serif;
}

main {
   text-align: center;
}

form {
    max-width: 400px;
    margin: auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 10px;
    text-align: center;
    font-size: 15px;
}

h1 {
    color: #5a5c69;
    text-align: center;
    margin-bottom: 20px;
}

.inputchange {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ced4da;
    border-radius: 4px;
}

.buttonchange {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-bottom: 10px;
}

.buttonchange:hover {
    background-color: #0056b3;
} */
main {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 20px;
}

form {
    width:40%;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    color:black;
}

h1 {
    color: #5a5c69;
}
h4{
    color:black;
}
.inputchange {
    width: 80%;
    padding: 10px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.buttonchange {
    width:80%;
    background-color: #4caf50;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-bottom: 10px;
}

.buttonchange:hover {
    background-color: #45a049;
}

.reset {
    width:80%;
    background-color: #007bff;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.reset:hover {
    background-color: #d32f2f;
}
</style>
<main>
<div>

    <div>
        <div>
          

            <div style="text-align:center">
                <?php

                extract($_SESSION['user']);

                ?>
                <form method="post">
                <h1 style="color: rgb(90, 92, 105);text-align:center;">Cập nhật thông tin tài khoản</h1>
                    <div>
                        <h4>Họ và tên</h4>
                        <input class="inputchange" type="text" name="ten" placeholder="Tên" value="<?=  isset($_POST['ten']) ? $_POST['ten'] : $khachhang['ten']  ?>">
                    </div>
                    <?php if(isset($errors['ten'])) :?>
                        <span style="color:red"><?= $errors['ten'] ?></span>
                        <?php endif ?>
                    <div class="">
                    <h4>Email</h4>
                        <input class="inputchange" type="text" name="email" placeholder="Email" value="<?=  isset($_POST['email']) ? $_POST['email'] : $khachhang['email']  ?>">
                    </div>
                    <?php if(isset($errors['email'])) :?>
                        <span style="color:red"><?= $errors['email'] ?></span>
                        <?php endif ?>
                    <div class="">
                    <h4>Địa chỉ</h4>
                        <input class="inputchange" type="text" name="address" placeholder="Địa chỉ" value="<?=  isset($_POST['address']) ? $_POST['address'] : $khachhang['address']  ?>">
                    </div>
                    <?php if(isset($errors['address'])) :?>
                        <span style="color:red"><?= $errors['address'] ?></span>
                        <?php endif ?>
                    <div class="">
                    <h4>Số điện thoại</h4>
                        <input class="inputchange" type="text" name="tel" placeholder="Số điện thoại" value="<?=  isset($_POST['tel']) ? $_POST['tel'] : $khachhang['tel']  ?>">
                    </div>
                    <?php if(isset($errors['tel'])) :?>
                        <span style="color:red"><?= $errors['tel'] ?></span>
                        <?php endif ?>
                    <div class="">
                        <input type="hidden" name="id_user" value="<?= $_SESSION['user']['id_user'] ?>">
                        <input class="buttonchange" type="submit" value="Cập nhật" name="capnhat">
                        <input class="reset" type="reset" value="Nhập lại">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
</main>