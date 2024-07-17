<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f8f9fa;
        margin: 0;
    }

    .content {
        padding: 20px;
    }

    h1 {
        color: #5a5c69;
        text-align: center;
    }

    .left,
    .right {
        padding: 20px;
        box-sizing: border-box;
    }

    .left h1,
    .right h1 {
        color: #333;
    }

    .left h2,
    .right h2 {
        margin: 10px 0;
    }

    select {
        padding: 8px;
        margin-top: 10px;
        width: 100%;
        box-sizing: border-box;
    }

    .product {
        margin-top: 20px;
        border-bottom: 1px solid #ccc;
        padding-bottom: 10px;
    }

    .img img {
        width: 100px;
        height: auto;
    }

    .right {
        background-color: black;
        color: #fff;
    }

    .ten {
        margin-left: 10px;
    }

    .price {
        flex-shrink: 0;
        margin-left: auto;
    }





    .card {
        background-color: #e3e3e9;
        border-radius: 0.1rem;
        margin-bottom: 10px;
    }

    .card-header:first-child {
        border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0;
    }

    .card-header {
        padding: 0.75rem 1.25rem;
        margin-bottom: 0;
        background-color: #fff;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }

    .track {
        background-color: #ddd;
        height: 7px;
        display: flex;
        margin-bottom: 60px;
        margin-top: 50px;
    }

    .track .step {
        flex-grow: 1;
        width: 25%;
        margin-top: -18px;
        text-align: center;
        position: relative;
    }

    .track .step.active:before {
        background: #ff5722;

    }

    .track .step::before {
        height: 7px;
        position: absolute;
        content: "";
        width: 100%;
        left: 0;
        top: 18px;
    }

    .track .step.active .icon {
        background: #ee5435;
        color: #fff;
    }

    .track .icon {
        width: 40px;
        height: 40px;
        line-height: 40px;
        position: relative;
        border-radius: 100%;
        background: #ddd;
        display: inline-block;
    }

    .track .step.active .text {
        font-weight: 400;
        color: #000;
    }

    .track .text {
        display: block;
        margin-top: 7px;
    }

    .btn-warning {
        color: #ffffff;
        background-color: #ee5435;
        border-color: #ee5435;
        border-radius: 1px;
    }

    .btn-warning:hover {
        color: #ffffff;
        background-color: #ff2b00;
        border-color: #ff2b00;
        border-radius: 1px;
    }
</style>


<?php if ($load_one_donhang['trangthai'] == 0 || $load_one_donhang['trangthai'] == 1 || $load_one_donhang['trangthai'] == 2) : ?>
    <h1 style="color: rgb(90, 92, 105);">Trạng thái đơn hàng</h1>
    <article class="card" height="200px">

        <?php
        $trangthai = [
            ['icon' => 'fa fa-check', 'text' => 'Chưa xác nhận'],
            ['icon' => 'fa fa-truck', 'text' => 'Đang vận chuyển'],
            ['icon' => 'fa fa-check', 'text' => 'Hoàn thành'],
        ];
        ?>
        <div class="card-body">
            <div class="track">
                <?php foreach ($trangthai as $key => $step) :
                    if ($load_one_donhang['trangthai'] >= $key) {
                        $active = "active";
                    } else {
                        $active = "";
                    }
                ?>

                    <div class="step <?= $active ?>">

                        <span class="icon"><i class="<?php echo $step['icon']; ?>"></i></span>
                        <span class="text"><?php echo $step['text']; ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </article>

<?php endif ?>


<div class="content">
    <h1 style="color: rgb(90, 92, 105);">Chi tiết đơn hàng</h1>
    <form action="" method="post">
        <div style="display:flex;flex-direction:row">
            <div class="left" style="width:50%">
                <h1>Thông tin nhận hàng</h1>
                <input type="hidden" value="<?= $load_one_donhang['id_bill'] ?>" name="id_bill">
                <h2>Tên khách hàng:<?= $load_one_donhang['name'] ?></h2>
                <h2>Địa chỉ:<?= $load_one_donhang['address'] ?></h2>
                <h2>Số điện thoại: <?= $load_one_donhang['tel'] ?></h2>
                <h2>Email:<?= $load_one_donhang['email'] ?></h2>
                <h2>Ngày mua:<?= date('d-m-Y', strtotime($load_one_donhang['date'])) ?></h2>
                <?php if ($load_one_donhang['trangthai'] != 2 && $load_one_donhang['trangthai'] != 3 && $load_one_donhang['trangthai'] != 4):?>
                <select name="trangthai">
                    <?php
                    $trangthai = [
                        "0" => "Đơn hàng mới",
                        "1" => "Đang vận chuyển",
                        "2" => "Đã giao",
                        
                    ];
                    $status = $load_one_donhang['trangthai'];
                    for ($i = 0; $i < 3; $i++) {
                        if ($status <= $i) {
                    ?>
                            <option value="<?= $i ?>" <?= ($status == $i) ? 'selected' : '' ?>><?= $trangthai[$i] ?></option>
                        <?php
                        }
                        ?>
                    <?php
                    }
                    ?>
                </select>
                
                <?php elseif ($load_one_donhang['trangthai'] == 2) : ?>
                    <h2>Trạng thái: Đã giao</h2>
                <?php elseif ($load_one_donhang['trangthai'] == 3) : ?>
                    <h2>Trạng thái: Người mua đã hủy</h2>
                <?php elseif ($load_one_donhang['trangthai'] == 4) : ?>
                    <h2> Trạng thái: đã hủy</h2>
                <?php endif ?>
            </div>
            <div class="right" style="width:50%;">
                <h1 style="color:orangered;margin-top:10px">Danh sách đơn hàng</h1>
                <?php foreach ($load_chitietbill as $ctbill) : ?>
                    <div class="product" style="display:flex;flex-direction:row">
                        <div class="img">
                            <img style="width:60px" src="../images/<?= $ctbill['hinh_sanpham'] ?>" alt="">
                        </div>
                        <div class="ten"><?= $ctbill['ten_sanpham'] ?> <b style="color:orange">x<?= $ctbill['soluong'] ?></b></div>
                        <div class="price" style="color:orangered"><?= number_format($ctbill['thanhtien']) ?><u>đ</u></div>
                    </div>
                <?php endforeach ?>
                <h1 style="color:orange;margin-top:10px">Tổng tiền: <span style><?= number_format($load_one_donhang['total']) ?><u>đ</u></span></h1>
            </div>
        </div>
        <?php if($load_one_donhang['trangthai'] !=2  && $load_one_donhang['trangthai'] !=3 && $load_one_donhang['trangthai'] !=4) :?>
        <button class="btn btn-success" name="update_bill" type="submit">Cập nhật</button>
        <?php endif ?>
        <a href="?act=donhang" class="btn btn-primary">Danh sách</a>
    </form>


</div>