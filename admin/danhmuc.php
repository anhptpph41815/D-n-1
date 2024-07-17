<div class="content" >
<h1 style="color: rgb(90, 92, 105);">Danh mục sản phẩm</h1>
<a href="?act=add_dm" class="btn btn-success" style="margin-bottom:10px">Thêm mới</a>
                            <div class="row">
                               
                            <?php if (isset($_COOKIE['success'])):?>
                                        <span style="color:green"><?=$_COOKIE['success']?></span>
                                    
                                    <?php endif ?>
                                <table class="table table-striped" >
                                    <thead >
                                        <th>#</th>
                                        <th>Tên danh mục</th>
                                        <th>Logo</th>
                                        <!-- <th>Banner</th> -->
                                        <th>Chức năng</th>
                                    </thead>
                                    <tbody>
                                    <?php $count = 1; foreach($all_danhmuc as $all_dm): ?>
                                        <tr>
                                            <td style="line-height: 150px;"><?= $count ?></td>
                                            <td  style="line-height: 150px;"><?= $all_dm['ten_danhmuc'] ?></td>
                                            <td style="line-height: 150px;">
                                            <?php if(isset($all_dm['img_danhmuc']) && $all_dm['img_danhmuc'] != ""): ?>
                                                <img width="100px;" style="border-radius:5px" src="../images/<?= $all_dm['img_danhmuc'] ?>" alt=""></td>
                                            <?php else : ?>
                                                <p style="line-height: 150px;">Chưa có banner</p>
                                                                                            <?php endif ?>
                                           
                                            <!-- <td  ><?php if(isset($all_dm['video_danhmuc']) && $all_dm['video_danhmuc'] != ""): ?>
                                                <video style="margin-top:15px" width="400px" height="" src="../images/<?= $all_dm['video_danhmuc'] ?>" controls>
                                                
                                            </video>
                                            <?php else : ?>
                                                <p style="line-height: 150px;">Chưa có video</p>
                                                                                            <?php endif ?>
                                            </td> -->
                                            <td  style="padding-top:60px">
                                                <a href="?act=edit_dm&id_dm=<?=$all_dm['id_danhmuc']?>"  class="btn btn-outline-secondary">Sửa</a>
                                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa không')" href="?act=delete_dm&id_dm=<?=$all_dm['id_danhmuc']?>" class="btn btn-outline-danger">Xóa</a>
                                    </td>
                                        </tr>
                                        <?php $count++; endforeach ?>     
                                    </tbody>
                                   
                                  
                                  </table>
                                   

                            
                            </div>
           
                        
                      </div>

                      <style>
                        thead th{
                            text-align: center;
                        }
                        tbody tr{
                            height: 150px;
                        }
                        tbody tr td{
                            text-align: center;
                          
                        }
                      </style>