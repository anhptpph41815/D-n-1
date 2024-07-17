<?php
function load_all_donhang(){
    $sql = "SELECT * FROM bill bl order by id_bill desc";
    $result = pdo_query($sql);
    return $result;
}
function load_all_donhang_user($id_user){
    $sql = "SELECT * FROM bill where id_user = $id_user" ;
    $result = pdo_query($sql);
    return $result;
}
function tra_cuu_don_hang($id_bill)
{
    $sql = "SELECT * FROM bill bl inner join chitietbill btbl on bl.id_bill = btbl.id_bill where bl.id_bill = '$id_bill'";
    $result = pdo_query($sql);
    return $result;
}
function checkbill($id_bill,$tel)
{
    $sql = "Select * from bill where id_bill = '$id_bill' and tel = '$tel'";
    $result = pdo_query_one($sql);
    return $result;
}
function load_one_donhang($id_bill){
    $sql = "SELECT * FROM bill bl inner join chitietbill btbl on bl.id_bill = btbl.id_bill where bl.id_bill = '$id_bill'";
    $result = pdo_query_one($sql);
    return $result;
}
function load_chitietbill($id_bill){
    $sql = "SELECT * FROM chitietbill  where id_bill =  '$id_bill'";
    $result = pdo_query($sql);
    return $result;
}
function update_donhang($id_bill,$trangthai){
    $sql = "UPDATE bill set trangthai = '$trangthai' where id_bill = '$id_bill' ";
    pdo_execute($sql);
}
function huy_donhang_user($id_bill){
    $sql = "UPDATE bill set trangthai = '3' where id_bill = '$id_bill' ";
    pdo_execute($sql);
}
function huy_donhang_admin($id_bill){
    $sql = "UPDATE bill set trangthai = '4' where id_bill = '$id_bill' ";
    pdo_execute($sql);
}

function delete_donhang($id_bill){
    $sql = "DELETE from chitietbill where id_bill = '$id_bill'";
    pdo_execute($sql);
    $sql = "DELETE from bill where id_bill = '$id_bill'";
    pdo_execute($sql);

}
function count_donhang(){
    $sql ="SELECT COUNT(id_bill) AS don_thanh_cong FROM bill where trangthai = 2";
    $listdonhang = pdo_query_one($sql);
    return $listdonhang;
}

?>
