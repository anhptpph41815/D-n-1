<div class="content" >
<h1 style="color: rgb(90, 92, 105);">Thông tin Website</h1>
                            <a href="##" class="btn btn-success" style="margin-bottom:10px">Thêm mới</a>
                            <div class="row">
                               
                            <?php if (isset($_COOKIE['success'])):?>
                                        <span style="color:green"><?=$_COOKIE['success']?></span>
                                    
                                    <?php endif ?>
                               <h1>Cam kết:</h1>
                               
                                <?=$thongtinwebsite['id']?><br>
                                <?=$thongtinwebsite['camket']?><br>
                                <?=$thongtinwebsite['diachi']?><br>
                                <?=$thongtinwebsite['hotline']?><br>
                                <?=$thongtinwebsite['baohanh']?><br>
                                <?=$thongtinwebsite['vanchuyen']?><br>
                                <?=$thongtinwebsite['description']?><br>
                                <?=$thongtinwebsite['email']?><br>
                                <?=$thongtinwebsite['vanchuyen']?><br>
                               
                                   

                            
                            </div>
                            
                        
                      </div>

                      <style>
                        tbody tr{
                            height: 150px;
                        }
                        tbody tr td{
                            text-align: center;
                          
                        }
                      </style>