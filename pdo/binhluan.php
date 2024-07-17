<?php
function add_bl($noidung,$id_user,$id_sanpham){
    $sql="INSERT into binhluan(noidung,id_user,id_sanpham) values('$noidung','$id_user','$id_sanpham')";
    pdo_execute($sql);
}
function loadall_bl($id_sanpham){
        $sql="SELECT binhluan.noidung ,khachhang.email FROM binhluan INNER JOIN khachhang on binhluan.id_user = khachhang.id_user";
        if($id_sanpham>0) $sql.=" AND id_sanpham='".$id_sanpham."'";
        $listbl=pdo_query($sql);
        return $listbl;
}
function delete_bl($id_binhluan){
    $sql = "DELETE from binhluan where id_binhluan=".$id_binhluan;
    pdo_execute($sql);
}

function loadbl(){
   $sql = "SELECT binhluan.id_binhluan, binhluan.noidung,khachhang.email,sanpham.ten_sanpham  FROM binhluan INNER JOIN khachhang ON binhluan.id_user = khachhang.id_user INNER JOIN sanpham on binhluan.id_sanpham = sanpham.id_sanpham";

  $listblnew=pdo_query($sql);
    return $listblnew;

}
function load_bl_id_user($id_user){
    $sql= " SELECT khachhang.id_user, khachhang.ten,khachhang.email,binhluan.noidung,sanpham.ten_sanpham,binhluan.id_binhluan from khachhang inner join binhluan  on khachhang.id_user = binhluan.id_user inner join sanpham on binhluan.id_sanpham = sanpham.id_sanpham where khachhang.id_user=" .$id_user;
    $listbl_user = pdo_query($sql);
    return $listbl_user;
 }
 
 


?>