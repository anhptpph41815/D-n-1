<?php 
function load_all_khachhang(){
    $sql = "SELECT * from khachhang order by role";
    $result = pdo_query($sql);
    return $result;
}
function dangnhap($email, $password){
    $sql = "Select * from khachhang where email = '$email' and password = '$password'";
    $result = pdo_query_one($sql);
    return $result;
}
function checkpass($password,$id_user)
{
    $sql = "Select * from khachhang where password = '$password' and id_user = '$id_user'" ;
    $result = pdo_query_one($sql);
    return $result;
}
function changepassword($newpassword,$id_user){
    $sql = "Update khachhang set password ='".$newpassword."'where id_user=" .$id_user;
    pdo_execute($sql);
}
function select_one_khachhang($id_khachhang){
    $sql = "Select * from khachhang where id_user = '$id_khachhang'";
    $result = pdo_query_one($sql);
    return $result;
}
function select_one_kh_forgettk($email){
    $sql = "Select * from khachhang where email = '$email'";
    $result = pdo_query_one($sql);
    return $result;
}
function delete_tk($id_user)
{
    $sql = "DELETE from khachhang where id_user=" . $id_user;
    pdo_execute($sql);
}
function update_khachhang($ten, $email, $address,$tel,$id_user)
{
    $sql = "UPDATE khachhang set ten='$ten',email='$email', address='$address' , tel = '$tel' where id_user='$id_user'";
    pdo_execute($sql);
}
function update_khachhang_admin($ten, $email,$password,$role,$id_user)
{
    $sql = "UPDATE khachhang set ten='$ten',email='$email',password = '$password', role = '$role' where id_user='$id_user'";
    pdo_execute($sql);
}

function ignore_khachhang($id){
    $sql = "SELECT * from khachhang where id_user != $id";
    $result = pdo_query($sql);
    return $result;
}
function add_taikhoan($ten,$email,$password){
    $sql = "INSERT into khachhang(ten,email,password) VALUES ('$ten','$email','$password')";
    pdo_execute($sql);
}
function count_khachhang(){
    $sql = "SELECT count(*) as tong_khachhang from khachhang where role = 0 ";
    $result = pdo_query_one($sql);
    return $result;
}

function checkmail($email)
{
    $sql = "Select * from khachhang where email = '$email'";
    $result = pdo_query_one($sql);
    return $result;
}
function get_pass($email)
{
    $sql = "SELECT password FROM khachhang  where email = '$email'";
    $result = pdo_query_one($sql);
    return $result;
}
?>