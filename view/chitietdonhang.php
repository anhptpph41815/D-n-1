<style>
    .main {
        padding: 20px;
    }

    h1 {
        color: #5a5c69;
        text-align: center;
    }

    .bill {
        max-width: 1200px;
        margin: auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .left {
        padding: 40px;
        background-color: white;
        color: black;
        text-align: center;
    }

    .right {
        border-radius: 8px;
        text-align: center;
        background-color: black;
        color: black;
    }

    .prd {
        width: 70%;
        margin: 0 auto;
        display: flex;
        flex-direction: row;
        padding: 0 40px;
    }

    .prd .ten {
        font-size: 20px;
        color: orange;
    }

    .prd .price {
        width: 20%;
        color: orangered;
        font-size: 20px;

    }

    select {
        padding: 8px;
        margin-top: 10px;
        width: 100%;
        box-sizing: border-box;
    }

    .contentbl {
        max-width: 1200px;
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
        width: 300px;
        padding: 12px;
        border: 1px solid #dee2e6;
        text-align: left;
        color: black;
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
    <form action="" method="post">
        <div class="bill">
            <div class="left">
                <p style="color: rgb(90, 92, 105);font-size:27px;font-weight:700;">Đơn hàng: <?= $load_one_donhang['id_bill'] ?> </p>
                <br>
                <input type="hidden" value="<?= $load_one_donhang['id_bill'] ?>" name="id_bill">
                <h2>Tên khách hàng: <?= $load_one_donhang['name'] ?></h2>
                <h2>Địa chỉ: <?= $load_one_donhang['address'] ?></h2>
                <h2>Số điện thoại: <?= $load_one_donhang['tel'] ?></h2>
                <h2>Email: <?= $load_one_donhang['email'] ?></h2>
                <h2>Trạng thái đơn: <?php if ($load_one_donhang['trangthai']==0) {
                        echo 'Chờ xác nhận';
                    }else if($load_one_donhang['trangthai']==1){
                        echo 'Đang vận chuyển';
                    }else if($load_one_donhang['trangthai']==2){
                        echo 'Đã giao';
                    }else if($load_one_donhang['trangthai']==3){
                        echo 'Đã hủy';
                    }else{
                        echo 'Đã bị hủy';
                    } 
    ?> </h2>
            </div>
            <!-- <div class="right">
                <h1 style="color:white">Sản phẩm</h1>
                <?php foreach ($load_chitietbill as $ctbill) : ?>
                    <div class="prd" style="margin-bottom: 20px;">

                        <img style="width:60px" src="images/<?= $ctbill['hinh_sanpham'] ?>" alt="">
                        <div class="ten"><?= $ctbill['ten_sanpham'] ?> <b style="color:orangered">x<?= $ctbill['soluong'] ?></b></div>

                        <div class="price"><?= number_format($ctbill['thanhtien']) ?><u>đ</u></div>
                    </div>
                <?php endforeach ?>
                <h1 style="color:white">Tổng tiền: <span style="color:orangered"><?= number_format($load_one_donhang['total']) ?><u>đ</u></span></h1>
            </div> -->
            <div class="listbl-user">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                        </tr>

                    </thead>
                    <?php foreach ($load_chitietbill as $ctbill) : ?>
                        <tr>
                            <td><?= $ctbill['ten_sanpham'] ?></td>
                            <td><img style="width:60px" src="images/<?= $ctbill['hinh_sanpham'] ?>" alt=""></td>
                            <td><?= $ctbill['soluong'] ?></td>
                            <td><?= number_format($ctbill['price'] * $ctbill['soluong']) ?> VNĐ</td>
                        </tr>
                        <? ?>
                    <?php endforeach ?>
                    <tr>
                        <td colspan="3"><Strong>Tổng tiền: </Strong></td>
                        <td><Strong><?= number_format($load_one_donhang['total']) ?> VNĐ</Strong></td>
                    </tr>
                </table>
            </div>
        </div>
    </form>
    <a href=""></a>

</main>