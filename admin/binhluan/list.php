<div class="content">
    <h1 style="color: rgb(90, 92, 105);">Danh sách bình luận</h1>
    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tài khoản</th>
                    <th>Nội dung bình luận</th>
                    <th>Tên sản phẩm</th>
                    <th>Chức năng</th>
                </tr>

            </thead>
            
                    <?php $count= 1;  foreach ($listbinhluan as $binhluan) : ?>
                <?php $deletebl = "index.php?act=deletebl" ?>
                <tr>
                    <td><?=$count?></td>
                    <td><?=$binhluan['email']?></td>
                    <td><?=$binhluan['noidung']?></td>
                    <td> <?= $binhluan['ten_sanpham']?></td>
                    <td> <a onclick="return confirm('Bạn chắc chắc muốn xóa không?')"  href="<?=$deletebl?>&id_binhluan=<?=$binhluan['id_binhluan']?>" >
                            <input class="btn btn-outline-danger" type="button" value="Xóa"></a></td>
                </tr>
            <?php $count++;
            endforeach; ?>
                
        </table>
    </div>

</div>
