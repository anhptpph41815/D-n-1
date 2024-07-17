<?php
session_start();
// if (!isset($_SESSION['giohang'])) {
//     $_SESSION['giohang'] = [];
// }

if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
}
if (isset($_SESSION['admin'])) {
    $admin = $_SESSION['admin'];
}
include "pdo/connection.php";
include "pdo/danhmuc.php";
include "pdo/sanpham.php";
$all_danhmuc = load_all_danhmuc();
include "view/menu.php";
include "pdo/khachhang.php";
include("pdo/thongtinwebsite.php");
include("pdo/binhluan.php");
include "pdo/donhang.php";
$thongtinwebsite = load_all_thongtinwebsite(1);

if (isset($_GET['act'])) {
    $act = $_GET['act'];

    switch ($act) {
            // Trang chủ
        case "trangchu":
            include "view/trangchu.php";
            break;
        case 'list_sp':
            if (isset($_POST['clickok'])) {
                // Nếu người dùng đã click nút tìm kiếm
                $searchKeyword = isset($_POST['kyw']) ? $_POST['kyw'] : '';
                $all_sanpham = load_all_sp_theo_ten($searchKeyword);

            } else {
                // Nếu không có tìm kiếm, hiển thị tất cả sản phẩm
                $all_sanpham = select_all_sanpham();
            }
            include "view/listsp.php";
            break;
            // Trang chi tiết sản phẩm
        case "chitietsanpham":
            if (isset($_GET['id_sp']) && $_GET['id_sp'] != 0) {
                $id_sanpham = $_GET['id_sp'];
                $one_sanpham = load_one_sanpham($id_sanpham);
                $all_sizesanpham = select_all_size_sanpham($id_sanpham);
                $four_sanphamlienquan = sanphamlienquan();
                if (isset($_POST['addtocart'])) {
                    header('location:index.php?act=cart');
                }
                if (isset($_POST['buy'])) {
                    header('location:index.php?act=thanhtoan');
                }
                include "view/chitietsanpham.php";
            } else {
                echo "Không có thông tin sản phẩm";
            }
            break;

            // Trang danh mục
        case "category_products":

            if (isset($_GET["id_dm"]) && $_GET['id_dm'] != 0) {
                $id_danhmuc = $_GET['id_dm'];
                $one_danhmuc = load_one_danhmuc($id_danhmuc);

                // Kiểm tra nút submit đã được nhấn hay chưa
                if (isset($_POST["listok"])) {
                    $price = isset($_POST["price"]) ? $_POST["price"] : "";
                    $all_sanpham = locsp_theogia_danhmuc($price, $id_danhmuc);
                } else {
                    $all_sanpham =  load_all_sanpham($id_danhmuc);
                }
            } else {
                echo "Không có thông tin danh mục";
            }
            include "view/category_products.php";
            break;

            // Trang giỏ hàng
        case "cart":
            // Kiểm tra xem giỏ hàng có dữ liệu hay không
            if (!empty($_SESSION['cart'])) {
                $cart = $_SESSION['cart'];

                // Tạo mảng chứa id các sản phẩm trong giỏ hàng
                $productId = array_column($cart, 'id');

                // Chuyển đổi mảng id thành 1 chuỗi để thực hiện truy vấn
                $idList = implode(',', $productId);
                // Lấy sản phẩm trong bảng sản phẩm theo id 
                $dataDb = load_one_sanpham_cart($idList);
            }
            include "view/cart.php";
            break;

        case "list_donhang":
            if (isset($_SESSION['user'])) {
                $id_user = $_SESSION['user']['id_user'];
                $load_all_donhang =  load_all_donhang_user($id_user);
            }
            include "view/list_donhang_user.php";
            break;

        case "dlt_bill":
            if (isset($_GET['id_bill']) && ($_GET['id_bill']) > 0) {
                $id_bill = $_GET['id_bill'];
                delete_donhang($id_bill);
                setcookie("xoa", "Xóa đơn hàng thành công", time() + 1);
                header("location:index.php?act=list_donhang");
            }
            break;
            case "huy_bill":
                if (isset($_GET['id_bill']) && ($_GET['id_bill']) > 0) {
                    $id_bill = $_GET['id_bill'];
                    huy_donhang_user($id_bill);
                    setcookie("huy", "Hủy đơn hàng thành công", time() + 1);
                    header("location:index.php?act=list_donhang");
                }
                break;
        case "chitietdonhang":
            if (isset($_GET['id_bill']) && ($_GET['id_bill']) > 0) {
                $id_bill = $_GET['id_bill'];
                $load_one_donhang = load_one_donhang($id_bill);
                $load_chitietbill = load_chitietbill($id_bill);
            }
            include "view/chitietdonhang.php";
            break;
        case "delete_cart":
            if (isset($_GET['idsp']) && isset($_GET['sz'])) {
                $id_sanpham = $_GET['idsp'];
                $size = $_GET['sz'];
                $indexToRemove = -1;
                foreach ($_SESSION['giohang'] as $index => $item) {
                    if ($item[0] == $id_sanpham && $item[4] == $size) {
                        $indexToRemove = $index;
                        break; // Dừng vòng lặp khi tìm thấy phần tử cần xóa
                    }
                }
                if ($indexToRemove != -1) {
                    unset($_SESSION['giohang'][$indexToRemove]);
                    // Sau đó, bạn có thể cần chỉnh lại các chỉ số mảng nếu cần
                    $_SESSION['giohang'] = array_values($_SESSION['giohang']);
                }
                header("location:?act=cart");
            }
            break;
            // Trang thanh toán
        case "thanhtoan":
            if (!empty($_SESSION['cart'])) {
                $cart = $_SESSION['cart'];

                // Tạo mảng chứa id các sản phẩm trong giỏ hàng
                $productId = array_column($cart, 'id');

                // Chuyển đổi mảng id thành 1 chuỗi để thực hiện truy vấn
                $idList = implode(',', $productId);
                // Lấy sản phẩm trong bảng sản phẩm theo id 
                $dataDb = load_one_sanpham_cart($idList);


                if (isset($_POST['dathang']) && ($_POST['dathang'])) {
                    $name = $_POST['hovaten'];
                    $address = $_POST['address'];
                    $sdt = $_POST['sdt'];
                    $email = $_POST['email'];
                }
            }
            include "view/thanhtoan.php";
            break;
            // Trang tin tức
        case "tintuc":
            include "view/tintuc.php";
            break;
            // Trang đăng ký
        case "register":
            if (isset($_POST['submit'])) {
                $ten = $_POST['ten'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $all_khachhang = load_all_khachhang();
                $check = true;
                $errors = [];
                //Tên
                if (empty(trim($ten))) {
                    $errors['ten']['empty'] = "Họ và tên không được để trống";
                } elseif (filter_var($ten, FILTER_VALIDATE_INT)) {
                    $errors['ten']['number'] = "Họ và tên không được là số";
                } elseif (strlen(trim($ten)) < 5) {
                    $errors['ten']['fail'] = "Họ tên không được ít hơn 5 kí tự";
                }


                if (empty(trim($email))) {
                    $errors['email']['empty'] = "Email không được để trống";
                } elseif (!filter_var(trim($email), FILTER_VALIDATE_EMAIL)) {
                    $errors['email']['fail'] = "Email không hợp lệ";
                }


                if (empty(trim($password))) {
                    $errors['password']['empty'] = "Password không được để trống";
                } elseif (strlen(trim($password)) <= 5) {
                    $errors['password']['fail'] = "Password phải lớn hơn 5 kí tự";
                }


                if (empty($errors)) {
                    foreach ($all_khachhang as $all_kh) {
                        if ($all_kh['email'] == $email) {
                            $check = false;
                            break;
                        }
                    }
                    if ($check == true) {
                        add_taikhoan($ten, $email, $password);
                        $_SESSION['user'] = dangnhap($email, $password);
                        header("location:index.php?act=trangchu");
                        exit(); // Dừng thực hiện mã ngay tại đây
                    } else {
                        setcookie("message", "Email đã tồn tại!", time() + 1);
                        header("location:index.php?act=register");
                        exit(); // Dừng thực hiện mã ngay tại đây
                    }
                    //Password



                }
            }
            include "view/register.php";

            break;
            // Trang đăng nhập 
        case "login":
            if (isset($_POST['dangnhap'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];

                $errors = [];
                if (empty(trim($email))) {
                    $errors['email']['empty'] = "Email không được để trống";
                } else {
                    if (!filter_var(trim($email), FILTER_VALIDATE_EMAIL)) {
                        $errors['email']['fail'] = "Email không hợp lệ";
                    }
                }

                if (empty(trim($password))) {
                    $errors['password']['empty'] = "Password không được để trống";
                }


                if (empty($errors)) {
                    $info = dangnhap($email, $password);
                    if ($info !== false) {
                        if ($info['role'] == '1') {
                            $_SESSION['admin'] = $info;
                            header('location:admin');
                        } elseif($info['role'] == '2') {
                            $_SESSION['admin'] = $info;
                            header('location:admin');
                        }
                         else{
                            $_SESSION['user'] = $info;
                            header('location:?act=user');
                        }
                    } else {
                        setcookie("message", "Tài khoản hoặc mật khẩu không chính xác", time() + 1);
                        header("location:?act=login");
                    }
                }
            }
            include "view/login.php";
            break;
            case "forgotpass":
                if (isset($_POST['getpass']) && ($_POST['getpass'])) {
                    $email = trim($_POST['email']);
                    $checkmail = checkmail($email);
                    if (empty($email)) {
                        setcookie("message", "Vui lòng nhập email.", time() + 1);
                        header("Location:index.php?act=forgotpass");
                        exit;
                    } else {
    
                        if (empty($checkmail)) {
                            setcookie("message", "Tài khoản không tồn tại.", time() + 1);
                            header("Location:index.php?act=forgotpass");
                            exit;
                        } else {
                            if ($checkmail !== false) {
                                $mypass = get_pass($email);
                                setcookie("ok", "Mật khẩu của bạn là: " . $mypass['password'], time() + 1);
                                header("Location:index.php?act=forgotpass");
                                exit;
                            } else {
                                setcookie("message", "Không có tài khoản trong hệ thống.", time() + 1);
                                header("Location:index.php?act=forgotpass");
                                exit;
                            }
                        };
                    }
                }
                include "view/forgotpass.php";
                break;
            // trang user 
        case 'user':
            if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
                $one_khachhang = select_one_khachhang($_SESSION['user']['id_user'],);
                // Đăng xuất 
                if (isset($_POST['dangxuat'])) {
                    unset($_SESSION['user']);
                    header("location:?act=trangchu");
                }
                include "view/user.php";
            } else if (isset($_SESSION['admin']) && !empty($_SESSION['admin'])) {
                header('location:admin');
                exit;
            } else {
                header("location:?act=login");
                exit;
            }
            break;
        case 'updateinfor':
            if (isset($_SESSION['user'])) {
                $id_khachhang = $_SESSION['user']['id_user'];
                $khachhang = select_one_khachhang($id_khachhang);
                if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                    $ten = trim($_POST['ten']);
                    $email = trim($_POST['email']);
                    $address = trim($_POST['address']);
                    $tel = trim($_POST['tel']);
                    $id_user = $_POST['id_user'];
                    $errors = [];
                    $check = true;
                    if(empty($ten)){
                        $errors['ten'] = "Họ tên không được để trống";
                    }else{
                        if(!preg_match('/^[\p{L}\s]+$/u', $ten)){
                            $errors['ten'] = "Họ tên không được là số";
                        }
                    }

                    if(empty($email)){
                        $errors['email'] = "Email không được để trống";
                    }else{
                        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                            $errors['email'] = "Email không hợp lệ";
                        }else{
                            $all_khachhang = ignore_khachhang($id_user);
                            
                            foreach($all_khachhang as $all_kh){
                                if($all_kh['email'] == $email){
                                    $check = false;
                                }
                            }
                        }
                    }

                    if(empty($address)){
                        $errors['address'] = "Địa chỉ không được để trống";
                    }else{
                        if(!preg_match('/^[\p{L}\s]+$/u', $address)){
                            $errors['address'] = "Địa chỉ không hợp lệ";
                        }
                    }
                    if(empty($tel)){
                        $errors['tel'] = "SĐT không được để trống";
                    }else{
                        if(!preg_match('/^0[0-9]{9}$/',$tel)){
                            $errors['tel'] = "SĐT không hợp lệ";
                        }
                    }


                    if(empty($errors) && $check == true){
                        update_khachhang($ten, $email, $address, $tel, $id_user);
                        header("Location:index.php?act=user");
                    }

                    
                    
                }
            }
            include "view/taikhoan/update.php";
            break;
        case 'changepassword':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $password = $_POST['password'];
                $newpassword = $_POST['newpassword'];
                $renewpassword = $_POST['renewpassword'];
                $id_user = $_POST['id_user'];
                $testpass = checkpass($password, $id_user);
                if ($password == "" || $newpassword == "" || $renewpassword == "") {
                    $thongbao = "Vui lòng nhập đủ thông tin!";
                } else if (!$testpass) {
                    $thongbao = "Mật khẩu cũ không chính xác!";
                } else if ($newpassword != $renewpassword) {
                    $thongbao = "Mật khẩu mới không trùng khớp!";
                } else {
                    if($password == $newpassword && $password == $renewpassword){
                        $thongbao = "Mật khẩu mới không được trùng với mật khẩu cũ!";
                    }else{
                        changepassword($newpassword, $id_user);
                        $success = "Đổi mật khẩu thành công!";
                    }
                }
            }
            include "view/taikhoan/changepass.php";
            break;
        case 'forget_mk':
            if (isset($_POST['capnhat'])) {
                $email = $_POST['email'];
                if ($email == $_SESSION['user']['email']) {
                    $khachhang = select_one_kh_forgettk($email);
                    setcookie("success", "Mật khẩu của bạn là : $khachhang[password]", time() + 1);
                    header("location:index.php?act=forget_mk");
                } else {
                    setcookie("message", "Email không chính xác", time() + 1);
                    header("location:index.php?act=forget_mk");
                }
            }
            include "view/taikhoan/forget_mk.php";
            break;
        case 'quanlybinhluan':

            include "view/binhluan/quanlibinhluan.php";
            break;
        case 'deletebl':
            if (isset($_GET['id_binhluan']) && ($_GET['id_binhluan']) > 0) {
                $id_binhluan = $_GET['id_binhluan'];
                delete_bl($id_binhluan);
                header('location:index.php?act=quanlybinhluan');
            }
            break;
        case "listcart":
            // Kiểm tra xem giỏ hàng có dữ liệu hay không
            if (!empty($_SESSION['cart'])) {
                $cart = $_SESSION['cart'];

                // Tạo mảng chứa id các sản phẩm trong giỏ hàng
                $productId = array_column($cart, 'id');

                // Chuyển đổi mảng id thành 1 chuỗi để thực hiện truy vấn
                $idList = implode(',', $productId);
                // Lấy sản phẩm trong bảng sản phẩm theo id 
                $dataDb = load_one_sanpham_cart($idList);
            }
            include "view/listcart.php";
            break;
        case 'tracuu':
            if (isset($_POST['tracuu']) && ($_POST['tracuu'])) {
                $id_bill = trim($_POST['id_bill']);
                $tel = trim($_POST['tel']);
                $testbill = checkbill($id_bill, $tel);
                if (empty($id_bill) || empty($tel)) {
                    setcookie("message", "Vui lòng nhập thêm thông tin.", time() + 1);
                    header("Location:index.php?act=tracuu");
                    exit;
                } else {
                    if ($testbill !== false) {
                        $mybill = tra_cuu_don_hang($id_bill);
                        include "view/inforbill.php";
                        break;
                    }
                    setcookie("message", "Thông tin không trùng khớp.", time() + 1);
                    header("Location:index.php?act=tracuu");
                    exit;
                };
            }
            include "view/tracuudonhang.php";
            break;
    }
} else {
    include "view/trangchu.php";
}

include "view/footer.php";
