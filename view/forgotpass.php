
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

h4{
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
            <h1 style="color: rgb(90, 92, 105);text-align:center;">Lấy lại mật khẩu đã quên: </h1>
            <div>
               <div style="text-align:center">
               <span style="color:red"><?= $_COOKIE['message'] ?? ""?></span>
                <form method="post" >
                    <div class="">
                        <h2 style="color:black"> Email: </h2>
                        <input class="input_pass" type="text"  name="email">
                        <h4 style="color:green"><?= $_COOKIE['ok'] ?? ""?></h4>
                    </div>
                    <div class="">
                        <input class="buttonchangepass" type="submit" value="Gửi" name="getpass">
                        
                    </div>
                </form>
               </div>
            </div>

        </div>
    </div>
</div>
</main>