
<style>
    main {
    display: flex;
    justify-content: center;
    align-items: center;
    color:black
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
<div class="contentbl">
    
    <h1 style="color: rgb(90, 92, 105);text-align:center;">Đơn hàng số <?=$mybill[0]['id_bill']?> </h1>
    <h1>Tên khách hàng: <?=$mybill[0]['name']?></h1>
    <h1>Số điện thoại: <?=$mybill[0]['tel']?></h1>
    <h1>Số điện thoại: <?=$mybill[0]['email']?></h1>
    <h1>Trạng thái đơn: <?php if ($mybill[0]['trangthai']==0) {
                        echo 'Đang xác thực';
                    }else if($mybill[0]['trangthai']==1){
                        echo 'Đang vận chuyển';
                    }else if($mybill[0]['trangthai']==2){
                        echo 'Đã giao';
                    }else{
                        echo 'Đã hủy';
                    } 
    ?> </h1>
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
           
            <?php foreach($mybill as $bill): ?>
            
                <tr>
                    <td><?=$bill['ten_sanpham']?></td>
                    <td><img style="width:50px" src="images/<?=$bill['hinh_sanpham']?>" alt=""></td>
                    <td><?=$bill['soluong']?></td>
                    <td><?=number_format($bill['price']*$bill['soluong'])?> VNĐ</td>
                </tr>
            <? ?>
            <?php endforeach?>
            <tr>
                <td colspan="3"><Strong>Tổng tiền: </Strong></td>
                <td><Strong><?=number_format($mybill[0]['total'])?> VNĐ</Strong></td>
            </tr>
        </table>
    </div>

</div>
</main>

