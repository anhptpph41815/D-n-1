


<div class="content">
    <h1 style="color: rgb(90, 92, 105);">Sửa tài khoản</h1>

    <div class="row">
        <?= $_COOKIE['message'] ?? "" ?>
        <form style="max-width: 100%;
        margin: 20px auto;
        padding: 20px;
        background-color: #f4f4f4;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);" action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_user" value="<?= $khachhang['id_user'] ?>">
            Họ và tên <input type="text" name="ten" value="<?= isset($_POST['ten']) ? $_POST['ten'] : $khachhang['ten'] ?>">
           <?php if(isset($errors['ten'])): ?>
            <span style="color:red"><?= $errors['ten'] ?></span><br>
            <?php endif ?>

            Email <input type="text" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : $khachhang['email'] ?>"><br>
            <?php if(isset($errors['email'])): ?>
            <span style="color:red"><?= $errors['email'] ?></span><br>
            <?php endif ?>

            Password <input type="text" name="password" value="<?= isset($_POST['password']) ? $_POST['password'] : $khachhang['password'] ?>">
            <?php if(isset($errors['password'])): ?>
            <span style="color:red"><?= $errors['password'] ?></span><br>
            <?php endif ?>

            <input type="radio" value="0" <?= $khachhang['role'] == 0 ? "checked" : "" ?> name="role" id="">User
            <input type="radio" value="2" <?= $khachhang['role'] == 2 ? "checked" : "" ?> name="role" id="">Nhân viên 
            <input type="radio" value="1" <?= $khachhang['role'] == 1 ? "checked" : "" ?> name="role" id="">Admin<br><br>
            <input type="submit" name="capnhat" value="Cập nhật">
            <input type="reset" style="background-color: #a97a3b;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-decoration:none;" value="Nhập lại">
            <a href="?act=khachhang" style="background-color: #0d6efd;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-decoration:none;">Danh sách</a>
        </form>



    </div>


</div>

<style>
    /* Style the form input fields */
    input[type="text"],
    input[type="file"],
    input[type='password'],
    input[type='email'] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    /* Style the submit button */
    input[type="submit"] {
        background-color: #4caf50;
        color: #fff;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    /* Change submit button color on hover */
    input[type="submit"]:hover {
        background-color: #45a049;
    }

    /* Add some spacing between elements */
    br {
        margin-bottom: 10px;
    }
</style>