<?php
session_start();
include "../../pdo/connection.php";
include "../../pdo/binhluan.php";
$id_sanpham = $_REQUEST['id_sanpham'];
$dsbl = loadall_bl($id_sanpham);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BINH LUAN</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>

<body>

</body>

</html>
<div class="row mb">
    <div class="boxcontent2 binhluan">
        <table>
            <?php
            echo '<tr><td style="width:50%"><strong>Email</strong></td>';
            echo '<td style="width:50%"><strong>Nội dung</strong></td>';
            echo '</tr>';
            foreach ($dsbl as $bl) {
                extract($bl);
                echo '<tr><td style="width:50%">' . $email . '</td>';
                echo '<td style="width:50%">' . $noidung . '</td>';
            }
            ?>
        </table>
    </div>
    <?php if (isset($_SESSION['user'])) : ?>
        <div>
            <form  action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                <input type="hidden" name="id_sanpham" value="<?= $id_sanpham ?>">
                <input style="max-width: 100%;
        margin: 20px auto;
        padding: 15px;
        background-color: #f4f4f4;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);" type="text" name="noidung" placeholder="Bình luận" id="">
                <input style="background-color:#fdb866;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-decoration:none;
    font-size:20px;" type="submit" name="guibinhluan" value="Gửi">
            </form>
        </div>
        <?php else: ?>
            <a style="font-size:20px;color:purple" href="?act=login">Bạn phải đăng nhập mới có thể bình luận</a>
    <?php endif ?>
    <?php
    if (isset($_POST['guibinhluan']) && ($_POST['guibinhluan'])) {
        $noidung = $_POST['noidung'];
        $id_user = $_SESSION['user']['id_user'];
        $id_sanpham = $_POST['id_sanpham'];
        add_bl($noidung, $id_user, $id_sanpham);
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }

    ?>
</div>

</body>

</html>