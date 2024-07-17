<?php
function load_all_danhmuc(){
    $sql = "SELECT  * from danhmuc ";
    $all_danhmuc = pdo_query($sql);
    return $all_danhmuc ;
}
function load_all_danhmuc_byAdmin(){
    $sql = "SELECT  * from danhmuc order by id_danhmuc desc";
    $all_danhmuc = pdo_query($sql);
    return $all_danhmuc ;
}
function load_one_danhmuc($id_danhmuc){
    $sql = "SELECT * from danhmuc where id_danhmuc = '$id_danhmuc'";
    $one_danhmuc = pdo_query_one($sql);
    return $one_danhmuc ;
}
function load_all_danhmuc_exist($id_danhmuc){
    $sql = "SELECT * from danhmuc where id_danhmuc != '$id_danhmuc'";
    $result = pdo_query($sql);
    return $result;
}
function add_danhmuc($ten_danhmuc,$image){
    $sql = "INSERT into danhmuc(ten_danhmuc,img_danhmuc) Values ('$ten_danhmuc','$image') ";
    pdo_execute($sql);
}
function delete_danhmuc($id_danhmuc){
    $one_danhmuc = load_one_danhmuc($id_danhmuc);
    $img = "../images/".$one_danhmuc['img_danhmuc'];
    unlink($img);
    $load_all_sanpham =  load_all_sanpham($id_danhmuc);
    foreach($load_all_sanpham as $load_all_sp){
        $imgsp = "../images/".$load_all_sp['img_sanpham'];
        unlink($imgsp);
    }

    $sql = "DELETE from sanpham where id_danhmuc = '$id_danhmuc'";
    pdo_execute($sql);
    $sql = "DELETE from danhmuc where id_danhmuc = '$id_danhmuc' ";
    pdo_execute($sql);

}

function update_danhmuc ($ten_danhmuc,$img_danhmuc,$id_danhmuc,){
    $one_danhmuc = load_one_danhmuc($id_danhmuc);

    // Ảnh tải lên có dữ liệu
    if($img_danhmuc != null){
        // Ảnh đã có trước đó trong database 
        if($one_danhmuc['img_danhmuc'] != null || $one_danhmuc['img_danhmuc'] != ""){
            $last_img = "../images/".$one_danhmuc['img_danhmuc'];
            unlink($last_img);
        }
        $sql = "UPDATE danhmuc set ten_danhmuc = '$ten_danhmuc' , img_danhmuc = '$img_danhmuc' where id_danhmuc = '$id_danhmuc'";
        pdo_execute($sql);
    }
    else{
        $sql = "UPDATE danhmuc set ten_danhmuc = '$ten_danhmuc'  where id_danhmuc = '$id_danhmuc'";
        pdo_execute($sql);
    }
}

function count_danhmuc(){
    $sql = "SELECT count(*) as tong_danhmuc from danhmuc";
    $count_danhmuc = pdo_query_one($sql);
    return $count_danhmuc ;
}
?>