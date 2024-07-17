<div class="content">
    <h1 style="color: rgb(90, 92, 105);">Sửa sản phẩm</h1>

    <div class="row">
        <?= $_COOKIE['message'] ?? "" ?>
        <form style="max-width: 100%;
        margin: 20px auto;
        padding: 20px;
        background-color: #f4f4f4;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);display:flex;flex-direction:row;justify-content:space-around" action="" method="post" enctype="multipart/form-data">
            <!-- tên sản phẩm  -->
            <div class="left">
                <h2>Thông tin cơ bản</h2>
                <p style="color:purple"><span style="color:red">* </span>ID sản phẩm</p>
                <input type="text" disabled  value="<?= $one_sanpham['id_sanpham'] ?>"  id=""><br>
                <input type="hidden" name="id_sanpham" value="<?= $one_sanpham['id_sanpham'] ?>" id="">
                <p style="color:purple"><span style="color:red">* </span>Tên sản phẩm</p>
                <input type="text" name="ten_sanpham" placeholder="Tên sản phẩm" value="<?= isset($_POST['ten_sanpham']) ? $_POST['ten_sanpham'] : $one_sanpham['ten_sanpham'] ?>" id=""><br>
                <?php if(isset($errors['ten'])): ?>
                    <span style="color:red"><?= $errors['ten'] ?></span>
                    <?php endif ?>

                <!-- Giá  -->
                <p style="color:purple"><span style="color:red">* </span>Giá</p>
                <input type="text" name="price" placeholder="Giá" value="<?= isset($_POST['price']) ? $_POST['price'] : $one_sanpham['price'] ?>" id=""><br>
                <?php if(isset($errors['price'])): ?>
                    <span style="color:red"><?= $errors['price'] ?></span>
                    <?php endif ?>

                <p style="color:purple"><span style="color:red">* </span>Số lượng</p>
                <input type="number" name="soluong" placeholder="Số lượng" value="<?= isset($_POST['soluong']) ? $_POST['soluong'] : $one_sanpham['soluong'] ?>"  id=""><br>
                <?php if(isset($errors['soluong'])): ?>
                    <span style="color:red"><?= $errors['soluong'] ?></span>
                    <?php endif ?>

                <!-- Hình ảnh  -->
                <p style="color:purple"><span style="color:red">* </span>Hình ảnh</p>
                <?php if (isset($one_sanpham['img_sanpham']) && $one_sanpham['img_sanpham'] != "") :  ?>
                    <input style="border:1px solid gray;width:200px;border-radius:10px " type="image" src="../images/<?= $one_sanpham['img_sanpham'] ?>" alt=""><br><br>
                <?php else : ?>
                    <p style="color:red">Chưa có hình ảnh</p>
                <?php endif ?>
                <input type="file" name="hinh" id="">
                <br><br>

                <!-- Bảng size  -->
                <!-- <a href="?act=add_size&id_sp=<?= $_GET['id_sp'] ?>" class="btn btn-success" >Thêm size</a><br>
                <?php if(isset($_COOKIE['success'])):  ?>
                    <span style="color:green"><?= $_COOKIE['success'] ?></span>
                    <?php endif ?>
                <table style="width:500px;border:1px solid gray;margin-top: 10px;">
                    <thead>
                        <th>#</th>
                        <th>Size</th>
                        <th>Số lượng</th>
                        <th>Chức năng</th>
                    </thead>
                    <tbody>
                        <?php if($all_sizesanpham == false) : ?>
                            <tr>
                                <td colspan="3">Chưa có size</td>
                            </tr>
                            <?php else :?>
                        <?php $count=1; foreach ($all_sizesanpham as $all_sizesp) :  ?>
                            <tr>
                                <td><?= $count ?></td>
                                <td><?= $all_sizesp['size'] ?></td>
                                <td><?= $all_sizesp['soluong'] ?></td>
                                <td><a href="?act=edit_size&id_sp=<?=$all_sizesp['id_sanpham']?>&sz=<?=$all_sizesp['size']?>" class="btn btn-outline-secondary" style="margin-right:10px">Sửa</a>
                                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa không') "href="?act=delete_size&id_sp=<?=$all_sizesp['id_sanpham']?>&sz=<?=$all_sizesp['size']?>" class="btn btn-outline-danger">Xóa</a></td>
                                
                            </tr>
                        <?php $count++; endforeach ?>
                        <?php endif ?>
                    </tbody>
                </table><br> -->



                    <!-- Thương hiệu  -->
                    <p style="color:purple"><span style="color:red">* </span>Thương hiệu</p>
                    <select name="id_danhmuc" id="" required>
                        <?php foreach ($all_danhmuc as $all_dm) : ?>
                            <option value="<?= $all_dm['id_danhmuc']; ?> " <?= ($all_dm['id_danhmuc'] === $one_sanpham['id_danhmuc']) ? "selected" : "" ?>>
                              <?= $all_dm['ten_danhmuc'] ?>
                            </option>
                        <?php endforeach ?>
                    </select><br>

                    <!-- Thông tin chi tiết  -->
                    <p style="color:purple"><span style="color:red">* </span>Thông tin chi tiết</p>
                    <textarea name="description" id="" cols="70" rows="5" placeholder="Thông tin sản phẩm"><?php if ($one_sanpham['description'] != "") : ?>
                <?= trim($one_sanpham['description'] )?>
                <?php endif ?>
        </textarea><br> 
            </div>


            <div class="right">
            <h2>Thông số kĩ thuật</h2>
                    <p style="color:purple"><span style="color:red">* </span>Khả năng chống nước <b>(Không bắt buộc)</b></p>
                    <input type="text" name="thamnuoc" placeholder="Khả năng chống nước" value="<?= $one_sanpham['thamnuoc'] ?? "" ?>" id=""><br>
                    <p style="color:purple"><span style="color:red">* </span>Vành đồng hồ <b>(Không bắt buộc)</b></p>
                    <input type="text" name="vanh" placeholder="Vành đồng hồ" value="<?= $one_sanpham['vanhdongho'] ?? "" ?>" id=""><br>
                    <p style="color:purple"><span style="color:red">* </span>Năng lượng <b>(Không bắt buộc)</b></p>
                    <input type="text" name="nangluong" placeholder="Năng lượng" value="<?= $one_sanpham['nangluong'] ?? "" ?>" id=""><br>
                    <p style="color:purple"><span style="color:red">* </span>Chất liệu vỏ <b>(Không bắt buộc)</b></p>
                    <input type="text" name="chatlieuvo" placeholder="Chất liệu vỏ" value="<?= $one_sanpham['chatlieuvo'] ?? "" ?>" id=""><br>
                    <p style="color:purple"><span style="color:red">* </span>Dây đeo <b>(Không bắt buộc)</b></p>
                    <input type="text" name="daydeo" placeholder="Dây đeo" value="<?= $one_sanpham['daydeo'] ?? "" ?>" id=""><br>
                    <p style="color:purple"><span style="color:red">* </span>Khóa <b>(Không bắt buộc)</b></p>
                    <input type="text" name="khoa" placeholder="Khóa" value="<?= $one_sanpham['khoa'] ?? "" ?>" id=""><br>
                    <p style="color:purple"><span style="color:red">* </span>Mặt kính <b>(Không bắt buộc)</b></p>
                    <input type="text" name="matkinh" placeholder="Mặt kính" value="<?= $one_sanpham['matkinh'] ?? "" ?>" id=""><br>
                    <p style="color:purple"><span style="color:red">* </span>Nơi sản xuất <b>(Không bắt buộc)</b></p>
                    <input type="text" name="noisanxuat" placeholder="Nơi sản xuất" value="<?= $one_sanpham['sanxuattai'] ?? "" ?>" id=""><br>

                <br>


                <input type="submit" value="Cập nhật" name="submit">
                <input type="reset" style="height:43px;margin-bottom:5px" class="btn btn-secondary" value="Nhập lại">
                <a href="?act=sanpham" style="background-color: #0d6efd;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-decoration:none;">Danh sách</a>
            </div>
        </form>



    </div>


</div>

<style>
    /* Style the form input fields */
    input[type="text"],
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

    .left {
        width: 45%;
    }

    .right {
        width: 45%;
    }
</style>
<script>
    function addSize() {
        var container = document.createElement('div');
        container.className = 'size-container';

        var count = document.querySelectorAll('.size-container').length + 1;

        var sizeLabel = document.createElement('p');
        sizeLabel.style.color = 'purple';
        sizeLabel.innerHTML = '<span style="color: red">*</span>Size ' + count;

        var sizeInput = document.createElement('input');
        sizeInput.type = 'text';
        sizeInput.name = 'size[]';
        sizeInput.placeholder = 'Size';

        var quantityInput = document.createElement('input');
        quantityInput.type = 'text';
        quantityInput.name = 'soluong[]';
        quantityInput.placeholder = 'Số lượng';

        container.appendChild(sizeLabel);
        container.appendChild(sizeInput);
        container.appendChild(quantityInput);

        document.body.appendChild(container);
    }
</script>