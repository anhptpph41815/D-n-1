<?php
    function thongke_binhluan(){
        $sql = "SELECT books.id_book as masach,books.tieude as tensach, COUNT(binhluan.id_binhluan) as countbl FROM binhluan left join books on binhluan.id_book = books.id_book GROUP BY books.id_book,books.tieude";
        $listthongke = pdo_query($sql);
        return $listthongke;
    }

    function thongke_doanhthu_theothang(){
        $sql = "SELECT DATE_FORMAT(date, '%m/%Y') AS month_year, SUM(total) AS total_amount
        FROM bill
        GROUP BY month_year";
        $listtk = pdo_query($sql);
        return $listtk;
    }
    function thongke_doanhthu_subday_now($subday , $now){
        $sql = "SELECT DATE_FORMAT(date, '%d/%m/%Y') AS month_year, SUM(total) AS total_amount FROM bill WHERE date BETWEEN '$subday' AND '$now' GROUP BY month_year order by month_year ";
        $listthongke = pdo_query($sql);
        return $listthongke;
    }

    function thongke_doanhthu_nam(){
        $sql = "SELECT DATE_FORMAT(date, '%Y') AS month_year, SUM(total) AS total_amount
        FROM bill
        GROUP BY month_year order by month_year desc";
        $listtk = pdo_query($sql);
        return $listtk;
    }
    function thongke_table(){
        $sql = "SELECT dm.ten_danhmuc, count(sp.id_sanpham) as count_sanpham ,MIN(sp.price) as min_sanpham , MAX(sp.price) as max_sanpham, avg(sp.price) as avg_sanpham from sanpham sp inner join danhmuc dm on sp.id_danhmuc = dm.id_danhmuc group by dm.id_danhmuc";
        $result = pdo_query($sql);
        return $result;
    }
?>