<div class="content" >
<h1 style="color: rgb(90, 92, 105);">Chỉnh sửa size</h1>
                            
                                <div class="row">
                                <form style="max-width: 100%;
        margin: 20px auto;
        padding: 20px;
        background-color: #f4f4f4;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);" action="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id_sanpham" value="<?= $_GET['id_sp'] ?>">
                                    <span>Size</span>
                                    <input type="number" disabled  name="size" placeholder="Size" required id="" value="<?= $one_size['size']?>"><br><br>
                                    <span>Số lượng</span>
                                    <input type="number" name="soluong" id="" placeholder="Số lượng" value="<?= $one_size['so_luong']?>"><br>
                                    <?php if(isset($_COOKIE['message'])) : ?>
                                        <span style="color:red"><?= $_COOKIE['message'] ?></span>
                                        <?php endif ?>
                                    <br>
                                    <input type="submit" value="Cập nhật" name="submit">
                                    <input type="reset"style="height:43px;margin-bottom:5px" value="Nhập lại">

    <a href="?act=edit_sp&id_sp=<?= $_GET['id_sp'] ?>" style="background-color: #0d6efd;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-decoration:none;">Trở lại</a>
                                </form>
                                    

                                
                                </div>
                        
                        
                      </div>

                      <style>
   
/* Style the form input fields */
input[type="text"], input[type="file"],input[type="number"] {
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
