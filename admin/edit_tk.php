<div class="content" >
<h1 style="color: rgb(90, 92, 105);">Thêm mới tài khoản</h1>
                            
                                <div class="row">
                                <?= $_COOKIE['message'] ?? ""?>
                                <form style="max-width: 100%;
        margin: 20px auto;
        padding: 20px;
        background-color: #f4f4f4;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);" action="" method="post" enctype="multipart/form-data">
                                    <input type="text" name="ten" placeholder="Tên" required id=""><br><br>
                                    <input type="email" name="email" id="" placeholder="Email" required><br><br>
                                    
                                    <input type="text" name="password" placeholder="Password" id="" required>
                                    <input type="submit" value="Thêm" name="submit">
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
input[type="text"], input[type="file"] ,input[type='password'],input[type='email']{
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