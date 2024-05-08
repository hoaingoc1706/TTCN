<?php 
    // Mục đích: kiểm tra xem bạn có quyền truy cập trang này hay không thông qua biến $_SESSION['da_dang_nhap'] = 1 --> được phép truy cập; và ngược lại.
    session_start();
    ob_start();
    if(!isset($_SESSION['dangnhap_home'])) {
        echo "
            <script type='text/javascript'>
                window.alert('Bạn không được phép truy cập');
                window.location.href='dangnhap.php';
            </script>
        ";
    }
;?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>TBHP | Quản trị sản phẩm</title>
        <!-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" /> -->
        <link href="css/styles.css" rel="stylesheet" />
      <!--     <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
         -->
      <!--   <script>
        tinymce.init({
        selector: '#sanpham_chitiet'
        });

        tinymce.init({
        selector: '#sanpham_mota'
        });
        </script> -->
    </head>
    <body class="sb-nav-fixed">
         <!-- nav-->
        <?php include("layout/nav.php"); ?>
        <div id="layoutSidenav">
            <!-- layoutSidenav_nav-->
            <?php   include("layout/aside.php"); ?>
            <div id="layoutSidenav_content">

                <?php
                    include("config/connection.php");
                    $sanpham_id=$_GET['mahang'];
                    $sql = "SELECT * 
                          from hanghoa
                          where MaHang = '".$sanpham_id."'
                          ";
                 
                  $san_pham = $con -> query($sql);
                  
                  $row = $san_pham->fetch_assoc();
                 ;?> 
             
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Sửa sản phẩm</h3></div>
                                        <div class="card-body">
                                            <form method="get" action="sanphamsuathuchien.php" enctype="multipart/form-data">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="tensp" value="<?php echo $row['TenHang'] ?>" />
                                                <label for="tensp">Tên sản phẩm</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <textarea class="form-control" id="mota" name="mota" style="height: 200px" placeholder="Mô tả sản phẩm"><?php echo  $row['MoTa'];?></textarea>
                                                <label for="mota">Mô tả sản phẩm</label>
                                            </div> 
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" name="dongianhap" value="<?php echo $row['DonGiaNhap'] ?>" />
                                                <label for="dongianhap">Đơn giá nhập</label>
                                            </div> 
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" name="dongiaban" value="<?php echo $row['DonGiaBan'] ?>" />
                                                <label for="dongiaban">Đơn giá bán</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" name="soluong" value="<?php echo $row['SoLuong'] ?>" />
                                                <label for="soluong">Số lượng</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <textarea class="form-control" id="DVT" name="DVT" style="height: 200px" placeholder="Đơn vị tính"><?php echo  $row['DVT'];?></textarea>
                                                <label for="DVT">DVT</label>
                                            </div> 
                                            
                                            <?php
                                                    include("config/connection.php");
                                                    $sql_category="SELECT * FROM loaihang";
                                                    $result_category=$con->query($sql_category);
                                                            
                                            ?> 

                                             <div class="form-floating mb-3">
                                                <b style="margin-right: 70px">Loại sản phẩm:  </b>
                                               <select name="idtheloai">
                                                    <?php while ($row_category=$result_category->fetch_assoc()) {?>
                                                        <option value="<?php echo $row_category['MaLoaiHang'];?>" <?php if($row_category['MaLoaiHang']==$row['MaLoaiHang']) echo ' selected' ?>>

                                                            <?php echo $row_category['TenLoaiHang']; ?>
                                                            
                                                        </option>
                                                    <?php } ?>
                                                </select>  
                                            
                                            </div>   
                                            
                                            <?php
                                                    include("config/connection.php");
                                                    $sql_category="SELECT * FROM nhacungcap";
                                                    $result_category=$con->query($sql_category);
                                                            
                                            ?> 
                                            
                                            <div class="form-floating mb-3">
                                                <b style="margin-right: 70px">Nhà cung cấp:  </b>
                                               <select name="idnhacungcap">
                                                    <?php while ($row_category=$result_category->fetch_assoc()) {?>
                                                        <option value="<?php echo $row_category['MaNCC'];?>" <?php if($row_category['MaNCC']==$row['MaNCC']) echo ' selected' ?>>

                                                            <?php echo $row_category['TenNCC']; ?>
                                                            
                                                        </option>
                                                    <?php } ?>
                                                </select>  
                                            
                                            </div>

                                            
                                             <!-- <?php
                                                    // include("config/connection.php");
                                                    // $sql_thuonghieu="SELECT * FROM tbl_thuonghieu";
                                                    // $result_thuonghieu=$con->query($sql_thuonghieu);
                                                            
                                            ?> 

                                             <div class="form-floating mb-3">
                                                <b>Thương hiệu sản phẩm:  </b><br>
                                               <select name="maTH">
                                                    <?php// while ($row_thuonghieu=$result_thuonghieu->fetch_assoc()) {?>
                                                        <option value="<?php //echo $row_thuonghieu['maTH'];?>" <?php if($row_thuonghieu['maTH']==$row['maTH']) echo ' selected' ?>>

                                                            <?php //echo $row_thuonghieu['tenthuonghieu']; ?>
                                                            
                                                        </option>
                                                    <?php //} ?>
                                                </select>  
                                            
                                            </div>                                 -->
                                            
                                           

                                            <div class="mt-4 mb-0">
                                                <input type="hidden" name="idsanpham" value="<?php echo $row["MaHang"];?>">
                                                <button class="btn btn-primary" type="submit" name="sbm">Cập nhật
                                                </button>
                                                
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </main>
                <?php //include("layout/footer.php"); ?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>

