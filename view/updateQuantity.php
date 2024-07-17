<?php
session_start();
if($_SERVER['REQUEST_METHOD'] === "POST"){
   // Lấy dữ liệu từ ajax đẩy lên 
   $productId = $_POST['id'];
   $newQuantity = $_POST['quantity'];
   // Kiểm tra giỏ hàng cố tồn tại hay không
   if(!empty($_SESSION['cart'])){
    // kiểm tra sản phẩm đã có trong giỏ hàng chưa
    $index = array_search($productId,array_column($_SESSION['cart'],'id'));

    // Nếu sản phẩm tồn tại thì cập nhật lại số lượng
    if($index !==  false){
        $_SESSION['cart'][$index]['quantity']  = $newQuantity;
    }else{
        echo "sản phẩm ko tồn tại trong giỏ hàng";
    }
   }
}else{
    echo "Yêu cầu không hợp lệ";
}
?>