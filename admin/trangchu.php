<style>
    table {
        width: 100%;
        border: 1px solid gray;
    }
</style>
<div class="content">
    <h1 style="color: rgb(90, 92, 105);">Thống kê</h1>
    <div class="boxes">
        <div class="box">
            <h6 style="color: rgb(90, 92, 105);">Tổng sản phẩm</h6>
            <p style="color:rgb(90, 92, 105)"><?= $count_sanpham['tong_sanpham'] ?></p>
        </div>
        <div class="box">
            <h6 style="color: rgb(90, 92, 105);">Tổng danh mục</h6>
            <p style="color:rgb(90, 92, 105)"><?= $count_danhmuc['tong_danhmuc'] ?></p>
        </div>
        <div class="box">
            <h6 style="color: rgb(90, 92, 105);">Đơn hàng đã giao</h6>
            <p style="color:rgb(90, 92, 105)"><?= $count_donhang['don_thanh_cong'] ?></p>
        </div>
        <div class="box">
            <h6 style="color: rgb(90, 92, 105);">Tổng số khách hàng</h6>
            <p style="color:rgb(90, 92, 105)"><?= $count_khachhang['tong_khachhang'] ?></p>
        </div>


    </div>


    <div class="chart">
        <div class="chart_left">
            <h1 style="color:#4e73df">Doanh thu theo tháng</h1>
            <form action="" method="post">
                <select name="timeRange" id="">
                    <option value="years"> Tháng</option>
                    <option value="7day"> 7 ngày</option>
                    <option value="28day"> 28 ngày</option>

                </select>
                <input type="submit" name="submit" value="change">
            </form>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <canvas id="myChart" width="800px" height="380px" style="margin-top:30px"></canvas>
            <?php

            $doanhthu = [];
            $time = [];
            $thongke = $thongke_doanhthu;
            foreach ($thongke as $tk) {
                extract($tk);
                array_push($doanhthu, $total_amount);
                array_push($time, $month_year);
            }
            echo '<script>';
            echo 'const phpData = ' . json_encode($doanhthu) . ';';
            echo 'const phpLabels = ' . json_encode($time) . ';';
            echo '</script>';
            ?>
        </div>







        <div class="chart_right">
            <h1 style="color:#4e73df">Revenue Sources</h1>
            <canvas id="dongHoChart" width="400" height="300"></canvas>
        </div>

    </div>

    <br>
    <div class="table">
        <table border="1">
            <thead>
                <th>Tên danh mục</th>
                <th>Số lượng sản phẩm</th>
                <th>Sản phẩm có giá thấp nhất</th>
                <th>Sản phẩm có giá cao nhất</th>
                <th>Giá trung bình</th>
            </thead>
            <tbody>
                <?php $table_thongke = thongke_table();
                foreach ($table_thongke as $tb_thongke) : ?>
                    <tr>

                        <td><?= $tb_thongke['ten_danhmuc'] ?></td>
                        <td><?= $tb_thongke['count_sanpham'] ?></td>
                        <td><?= number_format($tb_thongke['min_sanpham']) ?>đ</td>
                        <td><?= number_format($tb_thongke['max_sanpham']) ?>đ</td>
                        <td><?= number_format($tb_thongke['avg_sanpham']) ?>đ</td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

</div>


<script>
    const labels = phpLabels;
    const data = {
        labels: labels,
        datasets: [{
            label: 'Tổng doanh thu',
            data: phpData,
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        }]
    };

    const config = {
        type: 'line',
        data: data,
    };

    let myChart = document.getElementById('myChart').getContext('2d');
    new Chart(myChart, config);
</script>


<script>
    var ctx = document.getElementById('dongHoChart').getContext('2d');
    <?php $danhmuc = chart_danhmuc(); ?>

    var labels2 = [];
    var data2 = [];

    <?php foreach ($danhmuc as $dm) : ?>
        labels2.push('<?= $dm['ten_danhmuc'] ?>');
        data2.push(<?= $dm['total_sanpham'] ?>);
    <?php endforeach ?>

    var dongHoChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels2,
            datasets: [{
                label: 'Số lượng',
                data: data2,
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4CAF50']
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>