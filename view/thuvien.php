<?php 
function thongtindonhang($id_bill){
    $conn = ketnoidb();
    $sql = 'SELECT * from chitietbill where id_bill IN ('. $id_bill .')';
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function taochitietbill($id_sanpham,$ten_sanpham,$hinhsp,$price,$soluong,$thanhtien,$id_bill){
    $conn= ketnoidb();
    $sql ="INSERT into chitietbill(id_sanpham,ten_sanpham,hinh_sanpham,price,soluong,thanhtien,id_bill) VALUES('$id_sanpham','$ten_sanpham','$hinhsp','$price','$soluong','$thanhtien','$id_bill')";
   $conn->exec($sql);

}
function taodonhang($id_user,$name,$address,$tel,$email,$total,$date,$pttt){
    $conn= ketnoidb();
    $sql ="INSERT into bill(id_user,name,address,tel,email,total,date,pttt) VALUES('$id_user','$name','$address','$tel','$email','$total','$date','$pttt')";
   $conn->exec($sql);
   $lastId = $conn->lastInsertId();
   $conn = null;
   return $lastId;
}
function ketnoidb(){
    $servername = "localhost";
    $dbname= "duan1111";
    $username = "root";
    $password = "";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

// function load_one_sanpham_cart($idList){
//     $conn = ketnoidb();
//     $sql = 'SELECT * from sanpham where id_sanpham IN ('. $idList .')';
//     $stmt = $conn->prepare($sql);
//     $stmt->execute();
//     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//     return $result;

// }

function load_all_thongtinwebsite($id){
    $conn = ketnoidb();
    $sql ="SELECT * from thongtin_website_chitietsanpham where $id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
// function tongdonhang(){
//     $tong = 0 ;
  
//             for( $i=0;$i < sizeof($_SESSION['cart']); $i++){
//                 $tt = $_SESSION['cart'][$i]['quantity'] *  $_SESSION['cart'][$i]['price'];
//                 $tong += $tt;
//             }

//     return $tong;
// }
?>