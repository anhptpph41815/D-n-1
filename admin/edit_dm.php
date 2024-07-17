<div class="content" >
<h1 style="color: rgb(90, 92, 105);">Chỉnh sửa danh mục</h1>
                            
                                <div class="row">
                                <?= $_COOKIE['message'] ?? ""?>
                                <form style="max-width: 100%;
        margin: 20px auto;
        padding: 20px;
        background-color: #f4f4f4;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);" action="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id_danhmuc" value="<?= $one_danhmuc['id_danhmuc'] ?>">
                                    <p style="color:purple"><span style="color:red">* </span>Tên danh mục</p>
                                    <input type="text" name="name_danhmuc" placeholder="Tên danh mục" value="<?= isset($_POST['name_danhmuc']) ? $_POST['name_danhmuc'] : $one_danhmuc['ten_danhmuc'] ?>"  id="">
                                    <?php if(isset($errors['ten'])):  ?>
                                        <span style="color:red"><?= $errors['ten'] ?></span>
                                        <?php endif ?><br><br>
                                    

                                    <!-- Logo thương hiệu  -->
                                    <p style="color:purple"><span style="color:red">* </span>Logo thương hiệu</p>
                                    <?php if(isset($one_danhmuc['img_danhmuc']) && $one_danhmuc['img_danhmuc'] != ""):  ?>
                                        <input style="border:1px solid gray;width:200px;border-radius:10px " type="image" src="../images/<?= $one_danhmuc['img_danhmuc'] ?>" alt=""><br><br>
                                        <?php else :?>
                                            <p style="color:red">Chưa có Logo thương hiệu</p>
                                        <?php endif ?>
                                        <input type="file" name="hinh" id="" >

                                     
                            
                                    <input type="submit" value="Sửa" name="submit">
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