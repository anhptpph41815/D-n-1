<div class="content">
    <h1 style="color: rgb(90, 92, 105);">Danh sách sản phẩm</h1>
    <a href="?act=add_sp" class="btn btn-success" style="margin-bottom:10px">Thêm mới</a><br>
    <form action="" method="post">
        <select name="id_danhmuc" id="">
            <option value="">Tất cả</option>
            <?php foreach ($all_danhmuc as $all_dm) : ?>
                <option value="<?= $all_dm['id_danhmuc'] ?>"><?= $all_dm['ten_danhmuc'] ?></option>
            <?php endforeach ?>
        </select>

        <select name="price" id="">
            <option value="">Tất cả giá</option>
            <option value="low_to_high">Thấp đến cao</option>
            <option value="high_to_low">Cao đến thấp</option>
            <option value="100_to_500">100tr đến 500tr</option>
            <option value="500_to_700">500tr đến 700tr</option>
            <option value="above_700">Trên 700tr</option>
        </select>

        <input type="submit" name="listok" value="Lọc">
    </form>
    <?php if (isset($_COOKIE['success'])) :  ?>
        <span style="color:green"><?= $_COOKIE['success'] ?></span>
    <?php endif ?>
    <div class="row">
        <table class="table table-striped">
            <thead>
                <th>#</th>
                <th>Tên sản phẩm</th>
                <th>Hình</th>
                <th>Giá</th>
                <!-- <th>Tổng Size</th> -->
                <th>Số lượng</th>       
                <th>Chức năng</th>
            </thead>
            <?php $count = 1;
            foreach ($all_sanpham as $all_sp) : ?>
                <tr>
                    <td style="line-height:50px;width:40px"><?= $count ?></td>
                    <td style="line-height:50px;text-align:left">
                        <?php
                        $ten_sanpham = $all_sp['ten_sanpham'];
                        // Giới hạn chiều dài của chuỗi và thêm dấu "..." nếu cần
                        $ten_sanpham_display = strlen($ten_sanpham) > 70 ? substr($ten_sanpham, 0, 70) . "..." : $ten_sanpham;
                        echo $ten_sanpham_display;
                        ?>
                    </td>
                    <td style="line-height:50px"><img width="40px" src="../images/<?= $all_sp['img_sanpham'] ?>" alt=""></td>
                    <td style="line-height:50px"><?= number_format($all_sp['price']) ?> đ</td>
                    <!-- <td style="line-height:50px"><?= $all_sp['size'] ?></td> -->
                    <td style="line-height:50px"><?= $all_sp['soluong'] ?></td>
                    <td style="line-height:50px">
                        <a href="?act=edit_sp&id_sp=<?= $all_sp['id_sanpham'] ?>" class="btn btn-outline-secondary">Sửa</a>
                        <a onclick="return confirm('Bạn có chắc chắn muốn xóa không')" href="?act=delete_sp&id_sp=<?= $all_sp['id_sanpham'] ?>" class="btn btn-outline-danger">Xóa</a>
                        <a type="button" href="?act=view_sp&id_sp=<?= $all_sp['id_sanpham']?>" class="btn btn-outline-success">Chi tiết</a>
                    </td>
                </tr>

            <?php $count++;
            endforeach ?>



        </table>
    </div>
    <div class="pagination" style="margin-top: 10px;">
        <button id="prevPage">Previous</button>
        <span id="currentPage">1</span>
        <button id="nextPage">Next</button>
    </div>

</div>

<style>
    thead th {
        text-align: center;
    }

    tbody tr td {
        text-align: center;

    }

    form label {
        display: block;
        margin: 10px 0 5px;
        color: #555;
    }

    form select {
        width: 20%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    /* Submit Button */
    form input[type="submit"] {
        width: 20%;
        background-color: #4caf50;
        color: #fff;
        padding: 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    form input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>