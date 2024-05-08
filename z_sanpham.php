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
    <?php include("adminHeader.php"); ?>
    <body class="sb-nav-fixed">
        <!-- nav-->
        <?php include("layout/nav.php"); ?>
        <div id="layoutSidenav">
            <!-- layoutSidenav_nav-->
            <?php   include("layout/aside.php"); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4"><br>
                        <h1 class="mt-4" style="text-align:center">BÁO CÁO NHẬP XUẤT TỒN HÀNG HÓA</h1>
                        <?php
                                        if(isset($_GET['action']))
                                        {
                                            ?>
                                            <h4 style="text-align:center">Ngày <?php echo $_GET['ngaybd']; ?> đến <?php echo $_GET['ngaykt']; ?>
                                            </h4>
                                            <?php
                                        }
                                ?>
                        <div class="card mb-4" style="margin-top: 70px;">
                            <div class="card-header">
                                <!-- <a href="z_sanpham.php" style="color: green; margin-left: 1000px"><button type="button" class="btn btn-primary">Tạo mới</button></a>  -->
                                <form action="z_sanpham.php" method="">
                                    <label><b style="padding-left:30px"><i>Nhập ngày bắt đầu </i></b></label>
                                    <label><b style="padding-left:230px"><i>Nhập ngày kết thúc</i> </b></label>
                                                <div class="input-group" style="width: 1000px;">
                                            <input type="date" name="ngaybd" class="form-control" style="width: 50px;margin-right:30px; margin-left: 30px" >
                                            <input type="date" name="ngaykt" class="form-control" style="width: 50px;margin-right:30px;margin-left: 10px" >
                                            <input name="action" value="update" type="hidden" >
                                             
                                            <button type="submit" class="btn btn-primary">Xác nhận</button>
                                            <a href="z_sanpham.php" style="color: green; margin-left: 50px"><button type="button" class="btn btn-success">Tạo mới</button></a>
                                                </div>
                                </form>
                            </div>
                            <div class="card-body" >
                                <table id="datatablesSimple">
                                    <?php
                                    
                                    ?>
                                    <thead >
                                        <tr >
                                            <th style="text-align: center;">STT</th>
                                            <th style="text-align: center;">ID</th>  
                                            <th style="text-align: center;">Tên hàng</th>
                                            <th style="text-align: center;">Tồn đầu kì</th> 
                                            <th style="text-align: center;">Số lượng nhập</th> 
                                            <th style="text-align: center;">Số lượng xuất</th>
                                            <th style="text-align: center;">Tồn cuối kì</th>
                                            <!-- <th style="text-align: center;"></th>
                                            <th style="text-align: center;"></th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php    
                                    include("config/connection.php");
                                    if(isset($_GET['action']))
                                    {
                                            $a=strtotime($_GET['ngaybd']);
                                            $ngaybd=date("Y/m/d",$a);
                                            $b=strtotime($_GET['ngaykt']);
                                            $ngaykt=date("Y/m/d",$b);
                                        $sql = "SELECT c.TenHang,b.MaHang, sum(b.SoLuongNhap) as sl_nhap 
                                        FROM pnh as a 
                                        INNER join chitietpnh as b
                                         on a.MaPhieuNhapH=b.MaPhieuNhapH 
                                         INNER join hanghoa as c 
                                         on b.MaHang=c.MaHang 
                                         WHERE NgayLapPhieu BETWEEN '$ngaybd' and '$ngaykt'
                                          GROUP by b.MaHang
                                          order by b.MaHang ASC
                                          ;";
                                         $sql1 = "SELECT c.MaHang,b.TenHang, sum(b.SoLuongXuat) as sl_xuat FROM phieuxuathang as a INNER join chitietpxh as b on a.MaPhieuXuatH=b.MaPhieuXuatH INNER join hanghoa as c on b.MaHang=c.MaHang WHERE a.NgayLapPhieu BETWEEN '$ngaybd' and '$ngaykt' GROUP by b.MaHang order by b.MaHang ASC;";
                            
                                         $nxt = $con -> query($sql);
                                         $nxt1 = $con -> query($sql1);
                                         $i=0;
                                         while ($row = $nxt ->fetch_assoc()) {
                                         $i++;
                                         $a=$row['MaHang'];
                                     ?>
                                         <tr>
                                             <td><?php echo $i;?></td>                                           
                                             <td style="text-align: center;"><?php echo $row['MaHang']; ?></td>
                                             <td><?php echo $row['TenHang']; ?></td>
                                             <td style="text-align: center;"><?php echo ton_dauki($a,$ngaybd); ?></td>
                                             <td style="text-align: center;"><?php if($row['sl_nhap']==''){ echo 0;} else echo $row['sl_nhap']; ?></td>
                                             <td style="text-align: center;"><?php echo sl_xuat($a,$ngaybd,$ngaykt); ?></td>
                                             <td style="text-align: center;"><?php echo ton_dauki($a,$ngaybd)+$row['sl_nhap']-sl_xuat($a,$ngaybd,$ngaykt); ?></td> 
                                             <!-- <td><a href=""></a></td>
                                             <td>
                                                 
                                                 <a onclick="return Del ('<?php //echo $row['tensanpham'] ?>')" href=""></a>
                                             </td> -->
                                         </tr>
                                     <?php
                                         }
                                        }
                                   
                                ;?>
                                <?php
                                    function sl_xuat($a,$ngaybd,$ngaykt)
                                     {
                                       include("config/connection.php"); 
                                       $sql1 = "SELECT c.TenHang,b.MaHang, sum(b.SoLuongXuat) as sl_xuat FROM phieuxuathang as a INNER join chitietpxh as b on a.MaPhieuXuatH=b.MaPhieuXuatH INNER join hanghoa as c on b.MaHang=c.MaHang WHERE a.NgayLapPhieu BETWEEN '$ngaybd' and '$ngaykt' and b.MaHang='$a';;";
                                       $nxt1 = $con -> query($sql1);
                                      $row1 = $nxt1 ->fetch_assoc();
                                      $a=$row1['sl_xuat'];
                                      if($a!='')
                                      {
                                    return $a; 
                                    }
                                     else
                                     {
                                       return 0;
                                     }
                                     }
                                     ?>
                                <?php
                                                function ton_dauki($a,$ngaybd)
                                                {
                                                include("config/connection.php"); 
                                                $sql2 = "SELECT sum(b.SoLuongNhap) as sl_dauki FROM pnh as a inner join chitietpnh as b on a.MaPhieuNhapH=b.MaPhieuNhapH WHERE NgayLapPhieu BETWEEN '2023/01/01' and '$ngaybd' and b.MaHang='$a';";
                                                $nxt2 = $con->query($sql2);
                                                $row2 = $nxt2->fetch_assoc();
                                                $a=$row2['sl_dauki'];
                                                $sql3 = "SELECT sum(b.SoLuongXuat) as sl_dauki FROM phieuxuathang as a inner join chitietpxh as b WHERE NgayLapPhieu BETWEEN '2023/01/01' and '$ngaybd' and b.MaHang='$a';";
                                                  $nxt3 = $con->query($sql3);
                                                 $row3 = $nxt3->fetch_assoc();
                                                 $b=$row3['sl_dauki'];
                                                if($b!='')
                                                return $a-$b;
                                                else
                                                return $a;
                                                }
                                ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <?php //include("layout/footer.php"); ?>
            </div>
        </div>

        
       <?php include("adminFooter.php"); ?>
        <script>
            function Del(name){
                return confirm('Bạn có chắc chắn muốn xóa sản phẩm: ' + name + "?");
            }
        </script>
    </body>
</html>

