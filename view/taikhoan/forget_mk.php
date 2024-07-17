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
            <h1 style="color: rgb(90, 92, 105);text-align:center;">Lấy lại mật khẩu</h1>
            <div>
                <?php

                extract($_SESSION['user']);
                ?>
               <div style="text-align:center">

                <form method="post">
                    <div class="">
                        <h2 style="color:black">Email</h2>
                        <input class="input_pass" type="email" placeholder="Email" name="email">
                    </div>
                    <div class="">
                        <input class="buttonchangepass" type="submit" value="Lấy lại mật khẩu" name="capnhat">
                        <?php if(isset($_COOKIE['message'])) :?>
                            <p style="color:red;font-size:15px"><?= $_COOKIE['message']?></p>
                            <?php endif ?>
                        <?php if(isset($_COOKIE['success'])) :?>
                            <p style="color:green;font-size:15px"> <?= $_COOKIE['success']?></p>
                            <?php endif ?>
                    </div>
                </form>
               </div>
            </div>

        </div>
    </div>
</div>
</main>