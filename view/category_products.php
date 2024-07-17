<div class="banner">
    <div class="hr"></div>
            <?php if($one_danhmuc['video_danhmuc'] != "") : ?>
    <video src="images/<?= $one_danhmuc['video_danhmuc'] ?>" autoplay="autoplay" muted loop></video>
    <?php else :?>
      <img src="images/BANNER_DONG_HO_CHUAN_PC.jpg" alt="">
    <?php endif ?>
    <div class="hr"></div>
        </div>
<main>
        <div class="bc_home">
            <div class="nav_detail breadcrumbs">
                <div class="h2"><a href="?act=trangchu">Trang chủ</a></div><span
                    style="float: left;margin-top: 2px;margin-right: 10px;width: 10px;">—</span>
                
                <div class="h3" style="text-transform:uppercase;width:200px"><?= $one_danhmuc['ten_danhmuc'] ?></div>
            </div>
        </div>
        <!-- <div class="name_category">
            <h2><?=$one_danhmuc['ten_danhmuc'] ?></h2>
            <div class="child_cat">
                <ul>

                    <li><a title="Day Date" href="##">Day Date</a></li>
                    <li><a title="Sky Dweller" href="/##">Sky Dweller</a></li>
                    <li><a title="Datejust" href="##">Datejust</a></li>
                    <li><a title="Lady Datejust" href="##">Lady Datejust</a></li>
                    <li><a title="Oyster Perpetual" href="##">Oyster Perpetual</a></li>
                    <li><a title="Cellini" href="##">Cellini</a></li>
                    <li><a title="Submariner" href="##">Submariner</a></li>
                    <li style="border-radius: 0px 20px 20px 0px;"><a title="Gmt Master" href="##">Gmt Master</a></li>
                </ul>
            </div>
        </div> -->

        <div class="name_category">
            <h2><?=$one_danhmuc['ten_danhmuc'] ?></h2>
            <form action="" method="post">
        <select name="price" style="width: 300px; border:none; background-color:#fdb866; height:29px; outline:none">
        <option value="">Tất cả giá</option>
            <option value="low_to_high">Thấp đến cao</option>
            <option value="high_to_low">Cao đến thấp</option>
            <option value="100_to_500">100tr đến 500tr</option>
            <option value="500_to_700">500tr đến 700tr</option>
            <option value="above_700">Trên 700tr</option>
         </select>
         <input type="submit" value="Tìm kiếm" name="listok" style="width:200px;background-color:#fdb866; height:29px;border:none;margin-left: 12px;
          border-top-right-radius:15px;border-bottom-right-radius:15px;
         "> 
        </form>
        </div>


           <!-- <div class="regtangle">
               <div class="box1">
                <a href=""><?= $one_danhmuc['ten_danhmuc'] ?></a>
            </div>
           </div> -->
        <div class="brand">
           
          
            <div class="list">
                <?php if(empty($all_sanpham)) :  ?>
                    <h1>Không có sản phẩm nào</h1>
                    <?php else : ?>
                <?php foreach($all_sanpham as $all_sp): ?>
                    <div class="product">
                        <a href="?act=chitietsanpham&id_sp=<?= $all_sp['id_sanpham'] ?>">
                        <img src="images/<?= $all_sp['img_sanpham']?>" alt="">
                            <h3><?= $all_sp['ten_sanpham']?></h3>
                            <p><?=number_format( $all_sp['price'] )?>đ</p>
                        </a>
    
                    </div>
                    <?php endforeach; ?>
               <?php endif ?>
            </div>
         
        
         
         
        </div>
       </main>