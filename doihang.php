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
                        <!-- <h2 class="mt-4">Xác nhận yêu cầu đổi hàng</h2> -->
                       
                        <BR/>
                        <div class="card mb-4">
                            <br/> <h1 style="text-align:center">YÊU CẦU ĐỔI HÀNG </h1>
</br>
                            <div class="card-header">

                            <i class="fas fa-home"></i><a style="text-decoration:none; color:black"href="index.php"><b>Trang chủ</b></a>
                                || Danh sách yêu cầu xác nhận
                            <i class="fas fa-table me-1"></i>
                               
                            </div>
                            <div class="card-body" >
                             
                        
 <!-- đổi hàng -->

                                <table  id="datatablesSimple" >
                                    <thead>
                                        <tr >
                                            <th>ID</th>
                                            <th>Mã phiếu</th>
                                            <th >Nhân viên lập phiếu</th>
                                            <th >Ngày lập phiếu</th>
                                            <th>Xem chi tiết</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>

                                        <?php
                                            include("config/connection.php");
                                        
                                        
                                            $sql_select2 = mysqli_query($con,"SELECT * FROM phieudoihang as a ,nhanvien as b, chitietpdoih as d
                                            WHERE a.maNV = b.idnhanvien AND a.maphieudoih=d.maphieudoih and a.tinhtrang = 'Từ chối' or a.tinhtrang='Đã xử lý' or a.tinhtrang='Chưa xử lý' GROUP BY a.maphieudoih ORDER BY ngaylapphieu DESC"); 
                            
                                            $sql2 = "
                                            SELECT * from phieudoihang as a join nhanvien as b on a.maNV=b.idnhanvien where a.tinhtrang= ' ' or a.tinhtrang='Chưa xử lý';";
                                            $tintuc2 = $con -> query($sql2);
                                            $i=0;
                                            while ($row2 = $tintuc2 ->fetch_assoc()) {
                                            $i++;
                                        ;?>

                                          <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $row2["MaPhieuDoiH"];?></td>
                                            <td><?php echo $row2["TenNV"];?></td>
                                            <td><?php echo $row2["NgayLapPhieu"];?></td>
 <!-- PHÂN QUYỀN -->
<?php
    include("config/connection.php");
        $sql = "SELECT * From nhanvien";
        $kq = mysqli_query($con, $sql);
        $rowql = mysqli_fetch_array($kq);
    if ($rowql['chucvu']= 'Nhân viên kinh doanh') 
    {
        $check=1;
    }
    else
        $check=0;
;?>
<!--  -->
<?php
    if($check==1)
    {
;?>
     
                                       
                                            <td><a class="btn btn-danger" style="color:white" href="xemchitietBBDH_xacnhan.php?maBBDH=<?php echo $row2["MaPhieuDoiH"];?>">Xác nhận</a></td>
                                            <?php 
}
else
{
;?>             
                                            <td><a class="btn btn-danger" style="color:white" href="" onclick="alert('Bạn không có quyền dùng chức năng này')">Xác nhận</a></td>
                                            <?php
}
;?>
<?php
;?>

                                        </tr>
                                        <?php
                                    }
                                    ;?>


                                </tbody>
                                </table>                              

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