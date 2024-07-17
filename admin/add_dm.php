<div class="content" >
<h1 style="color: rgb(90, 92, 105);">Thêm mới danh mục</h1>
                            
                                <div class="row">
                                <?= $_COOKIE['message'] ?? ""?>
                                <form style="max-width: 100%;
        margin: 20px auto;
        padding: 20px;
        background-color: #f4f4f4;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);" action="" method="post" enctype="multipart/form-data">
                                    Tên thương hiệu
                                    <input type="text" name="name_danhmuc" placeholder="Tên danh mục"  id="">
                                    <?php if(isset($errors['ten'])): ?>
                                        <span style="color:red"><?= $errors['ten'] ?></span>
                                        <?php endif ?>
                                    <br><br>
                                    Logo thương hiệu
                                    <input type="file" name="hinh" id="" >
                                    <?php if(isset($errors['hinh'])): ?>
                                        <span style="color:red"><?= $errors['hinh'] ?></span>
                                        <?php endif ?><br><br>
                                    <!-- Video banner
                                    <input type="file" name="video" id="video" required accept="video/*"><br><br> -->
                                    <input type="submit" value="Thêm" name="submit">
                                    <a href="?act=danhmuc" style="background-color: #0d6efd;
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
input[type="text"], input[type="file"] {
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