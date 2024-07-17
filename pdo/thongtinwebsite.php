<?php
    function load_all_thongtinwebsite($id){
        $sql ="SELECT * from thongtin_website_chitietsanpham where $id";
        $result = pdo_query_one($sql);
        return $result;
    }
?>