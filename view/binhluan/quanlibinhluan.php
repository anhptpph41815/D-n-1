
<style>
    main {
    display: flex;
    justify-content: center;
    align-items: center;
    color:black
}

.contentbl {
    max-width: 800px;
    margin: auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
}

h1 {
    color: #5a5c69;
    text-align: center;
    margin-bottom: 20px;
}

.listbl-user {
    margin-top: 20px;
}

.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.table th,
.table td {
    padding: 12px;
    border: 1px solid #dee2e6;
    text-align: left;
    color:black;
}

.table th {
    background-color: #007bff;
    color: #fff;
}

.table tr:nth-child(even) {
    background-color: #f8f9fa;
}

.table a {
    color: #dc3545;
    text-decoration: none;
    cursor: pointer;
}

.table a:hover {
    text-decoration: underline;
}

.table td a {
    margin-right: 10px;
}
</style>
<main>
<?php
                if (isset($_SESSION['user']) && (is_array($_SESSION['user']))) {
                    extract($_SESSION['user']);
                }
                ?>
<div class="contentbl">
    <h1 style="color: rgb(90, 92, 105);text-align:center;">Danh sách bình luận</h1>
    <div class="listbl-user">
        <table class="table table-striped">
            <thead>
                <tr>

                    <th style="width:50%">Nội dung bình luận</th>
                    <th>Tên sản phẩm</th>
                    <th>Chức năng</th>
                </tr>

            </thead>
           
            <?php $listbinhluan_user = load_bl_id_user($_SESSION['user']['id_user']);
             if(empty($listbinhluan_user)):  ?>
                <tr>
                    <td colspan="3" style="color:red">Chưa có bình luận nào </td>
                </tr>
                <?php else :?>
                    <?php 
            foreach ($listbinhluan_user as $binhluan) : ?>
            
            <?php $deletebl = "index.php?act=deletebl&id_binhluan=" . $binhluan['id_binhluan']?>
                <tr>

                    <td style="width:50%"><?=$binhluan['noidung']?></td>
                    <td><?=$binhluan['ten_sanpham']?></td>
                    <td> <a onclick="return confirm('Bạn chắc chắc muốn xóa bình luận này không?')"  href="<?=$deletebl?>" . $id_binhluan>
                           Xóa</a></td>
                </tr>
            <?php
            endforeach ?>
                <?php endif ?>
            
        </table>
    </div>

</div>
</main>

