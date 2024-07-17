<!-- <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table thead tr th{
            color:black
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style> -->
    <style>
    /* body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        color: #333;
    } */

    main {
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        color: #333;
    }

    table {

        margin: 0 auto;
        width: 90%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table thead tr th {
        text-align: center ;
        color: #000;
        font-weight: bold;
        max-width: 10%;
    }
    table thead tr td {
        text-align: center ;

    }

    th, td  {
        width:300px;
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
        color:black;
    }

    th {
        background-color: #f2f2f2;
    }

    tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    a {
        text-decoration: none;
        padding: 5px 10px;
        border-radius: 4px;
        color: #fff;
        margin-right: 5px;
    }
    /* th:nth-child(1) {
        max-width:200px ;

    }
    td:nth-child(1) {
        max-width:200px ;
    } */


</style>
<main>
    <h1 style="margin-left:80px">Danh sách đơn hàng</h1>

    <?php  if(isset($_COOKIE['huy'])) :?>
        <h2 style="color:green;margin-left:80px"><?= $_COOKIE['huy'] ?></h2>
        <?php endif ?>
    <?php  if(isset($_COOKIE['xoa'])) :?>
        <h2 style="color:green;margin-left:80px"><?= $_COOKIE['xoa'] ?></h2>
        <?php endif ?>
    <table border="1">
        <thead>
            <tr>
                <th>#</th>
                <th>ID_bill</th>
                <th >Tên</th>
                <th >Địa chỉ</th>
                <th>Tổng tiền</th>
                <th>Ngày đặt</th>
                <th>Phương thức thanh toán</th>
                <th>Trạng thái</th>
                <th >Chức năng</th>
            </tr>
        </thead>
        <?php  if(isset($_SESSION['user'])) : ?>
        <tbody>
            <?php if(empty($load_all_donhang)):  ?>
                <tr>
                    <td colspan="9">Chưa có sản phẩm nào</td>
                </tr>
                <?php else :?>
            <?php $count = 1; foreach ($load_all_donhang as $all_donhang) : ?>
                <tr>
                    <td ><?= $count ?></td>
                    <td ><?= $all_donhang['id_bill']  ?></td>
                    <td ><?= $all_donhang['name']  ?></td>
                    <td ><?= $all_donhang['address']  ?></td><td><?= number_format($all_donhang['total'])?><u>đ</u></td>
                    <td><?= date('d-m-Y',strtotime($all_donhang['date']))  ?></td>
                    <td >
                    <?php if($all_donhang['pttt'] == 1):?>
                        <p> <?= "Chuyển khoản" ?></p>
                        <?php else :?>
                            <p> <?= "Thanh toán khi nhận hàng" ?></p>
                        <?php endif ?>
                   
                </td>
                    <td>
                        <?php if($all_donhang['trangthai'] == 1): ?>
                              <p style="color:blue">  <?= "Đang vận chuyển" ?></p>
                            <?php elseif($all_donhang['trangthai'] == 2): ?>
                              <p style="color:green">  <?= "Đã giao" ?></p>
                              <?php elseif($all_donhang['trangthai'] == 3): ?>
                              <p style="color:red"><?= "Đã hủy" ?></p>
                              <?php elseif($all_donhang['trangthai'] == 4): ?>
                              <p style="color:red"><?= "Đã bị hủy" ?></p>
                                <?php else : ?>
                              <p style="color:orangered">  <?= "Chờ xác nhận" ?></p>
                            <?php endif?>
                        </td>
                    <td >
    <ul class="function-list" style="width:130px;display:flex;flex-direction:row">
    <?php if($all_donhang['trangthai'] == 0) :?>
        <li><a onclick="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này không ?')" style="background-color:red" href="?act=huy_bill&id_bill=<?= $all_donhang['id_bill'] ?>">Hủy</a></li>
        <!-- <li><a style="background-color:red" href="?act=dlt_bill&id_bill=<?= $all_donhang['id_bill'] ?>">Xóa</a></li> -->
        <li><a style="background-color:green" href="?act=chitietdonhang&id_bill=<?=$all_donhang['id_bill']?>">Chi tiết</a></li>
        <?php else: ?>
            <li><a style="background-color:green" href="?act=chitietdonhang&id_bill=<?=$all_donhang['id_bill']?>">Chi tiết</a></li>
<?php endif ?>
    </ul>
</td>
                </tr>
            <?php $count++; endforeach; ?>
            <?php endif ?>
        </tbody>
        <?php endif ?>
    </table>
    <br>
</main>