<style>
    main {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 20px;
}

form {
    max-width: 400px;
    margin: auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    color: #5a5c69;
    text-align: center;
    margin-bottom: 20px;
}

h4 {
    margin-bottom: 10px;
}

.input_pass {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ced4da;
    border-radius: 4px;
}

.buttonchangepass {
    background-color: #28a745;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    display: inline-block;
}

.buttonchangepass:hover {
    background-color: #218838;
}
</style>
<main>
<div>

    <div>
        <div>
            <h1 style="color: rgb(90, 92, 105);text-align:center;">Đổi mật khẩu</h1>
            <div>
                <?php

                extract($_SESSION['user']);
                ?>
               <div style="text-align:center">
               <h4 style="color: red;"><?= $thongbao ?? "" ?></h4>
               <h4 style="color: green;"><?= $success?? "" ?></h4>
                <form method="post" >
                    <div class="">
                        <h2 style="color:black"> Mật khẩu cũ: </h2>
                        <input class="input_pass" type="password"  name="password">
                    </div>
                    <div>
                    <h2 style="color:black"> Mật khẩu mới: </h2>
                        <input class="input_pass" type="password" name="newpassword">
                    </div>
                    <div class="">
                    <h2 style="color:black">  Nhập lại mật khẩu mới: </h2>

                        <input class="input_pass" type="password" name="renewpassword">
                    </div>
                    <div class="">
                        <input type="hidden" name="id_user" value="<?= $id_user ?>">
                        <input class="buttonchangepass" type="submit" value="Đổi mật khẩu" name="capnhat">
                    </div>
                    <a href="?act=forget_mk" style="color:red">Quên mật khẩu?</a>
                </form>
               </div>
            </div>

        </div>
    </div>
</div>
</main>