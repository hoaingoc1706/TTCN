<style>
table, th, td {
  border: 1px solid black;
}
</style>
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
<html lang="en">
<?php include("adminHeader.php"); ?>
<body class="sb-nav-fixed">
    <!-- nav-->
    <?php include("layout/nav.php"); ?>
    <div id="layoutSidenav">
        <!-- layoutSidenav_nav-->
        <?php   include("layout/aside.php"); ?>

        <div id="layoutSidenav_content">

            <footer class="container-fluid px-4">
                <main>
                    <div class="container-fluid px-4">
                        <!-- <h2 class="mt-4">Xác nhận yêu cầu xuất hàng</h2> -->
                       <br/> 
                        <div class="card mb-4">
                            <br/><h1 style="text-align:center">  YÊU CẦU XUẤT HÀNG </h1>
                            <br/><div class="card-header">  
                                <i class="fas fa-home"> </i> <a href="index.php" style="text-decoration:none; color:black"><b>Trang chủ</b></a>
                                || <i class="fas fa-table me-1"></i> Danh sách yêu cầu xác nhận
                            </div> 
                            <div class="card-body" >
                                
                                <table  id="datatablesSimple" >
                                    <thead>
                                        <tr >
                                            <th>ID</th>
                                            <th>Mã phiếu</th>
                                            <th>Nhân viên lập phiếu</th>
                                            <th >Ngày lập phiếu</th>
                                            <th>Xem chi tiết</th>
                                          
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                            include("config/connection.php");
                                        
                                            $sql_select1 = mysqli_query($con,"SELECT * FROM phieuyeucauxuathang as a , nhanvien as b, chitietpycxh as d
                                            WHERE a.MaNV=b.IDnhanvien AND a.maPhieuYCXH=d.maPhieuYCXH GROUP BY a.maPhieuYCXH ORDER BY ngaylapphieu DESC"); 
                            
                                            $sql = "
                                            SELECT * from phieuyeucauxuathang as a join nhanvien as b on a.maNV=b.IDnhanvien";
                                            $tintuc = $con -> query($sql);
                                            $i=0;
                                            while ($row = $tintuc ->fetch_assoc()) {
                                            $i++;
                                        ;?>
                                        
               
                                
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $row["MaPhieuYCXH"];?></td>
                                            
                                            <td><?php echo $row["TenNV"];?></td>
                                            
                                            <td><?php echo $row["NgayLapPhieu"];?></td>
                               
                                            <td><a class="btn btn-danger" style="color:white" href="xemchitietdonhang_xacnhan.php?maPXH=<?php echo $row["MaPhieuYCXH"];?>">Xác nhận</a></td>
                                           
                                           
                                        </tr>
                                      
                                        <?php
                                        }
                                        ?>
                                </tbody>  
                                    </table>

                               
                                
                        
                        
 <!-- đổi hàng -->
 
</div>
                    </div>
                </div>
            </main>
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">


                </div>
            </div>
        </footer>
    </div>
</div>
<script>
    function Del(name){
        return confirm('Bạn muốn từ chối xuất hàng cho phiếu mã số: ' + name + "?");
    }
</script>
<?php include("adminFooter.php"); ?>
</body>
</html>