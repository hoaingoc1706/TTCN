<?php 
    // Mục đích: kiểm tra xem bạn có quyền truy cập trang này hay không thông qua biến $_SESSION['da_dang_nhap'] = 1 --> được phép truy cập; và ngược lại.
    session_start();

    if(!isset($_SESSION['dangnhap_home'])) {
        echo "
            <script type='text/javascript'>
                window.alert('Bạn không được phép truy cập');
                window.location.href='dangnhap.php';
            </script>
        ";
    }
?>
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
<?php
    include('config/connection.php');
?>

<div class="row">
            <div class="container-fluid px-4" >
                <h3 class="mt-4">Chi tiết phiếu đổi hàng</h3>
                <ol class="breadcrumb mb-4">
                            <!-- <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li> -->
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header" >
                           
                            <i class="fas fa-home"></i><a href="index.php">Trang chủ</a> ||  <i class="fas fa-table me-1"></i> Biên bản đôi hàng
                            <a href="BBDH.php" class="btn btn-primary" style="margin-left:500px"><b> Danh sách phiếu đổi hàng </b></a>
                            <a href="doihang.php" class="btn btn-primary" style="margin-left:20px"><b> Phiếu đổi hàng </b></a>
                            </div>
        <div class="col-md-12">
<?php
//tồn tại khi ấn xem đơn hàng
$maBBDH = $_GET['maBBDH']; //lấy lại mã hàng từ bên liệt kê đơn hàng muốn xem
$sql_chitiet = mysqli_query($con,"SELECT * FROM phieudoihang as a,chitietpdoih as b, nhanvien as c, hdb as d, hanghoa as e
 WHERE a.MaPhieuDoiH=b.MaPhieuDoiH AND a.maHDB=d.maHDB AND a.MaNV=c.idnhanvien AND b.mahang=e.mahang AND a.MaPhieuDoiH='$maBBDH'"); //select theo cùng mã hàng// SELECT tbl_donhang.maBBDH, tensanpham, tbl_donhang.soluong, giasale, ngaythang FROM tbl_donhang,hanghoa 

$sql_chitiet = mysqli_query($con,"SELECT * from phieudoihang as a join chitietpdoih as b join hanghoa as c on a.MaPhieuDoiH=b.MaPhieuDoiH and b.mahang=c.MaHang WHERE a.MaPhieuDoiH=$maBBDH");

$sql_chitiet1 = mysqli_query($con,"SELECT * FROM phieudoihang as a, chitietpdoih as b, hdb as c, chitiethdb as d 
 WHERE a.MaPhieuDoiH=b.MaPhieuDoiH and a.maHDB=c.maHDB and a.maHDB=d.maHDB AND a.MaPhieuDoiH='$maBBDH'");

// //sql tính tổng
$sql_total=mysqli_query($con, "SELECT sum(a.soluongdoi*b.dongiaban) as total FROM chitietpdoih as a join hanghoa as b on a.MaHang = b.mahang WHERE a.MaPhieuDoiH=$maBBDH");      

// //lấy ra mã MV, tenNV, kh cho phiếu
$sql_NV_KH=mysqli_query($con, "SELECT a.MaNV as nvxuat, d.maNV as nvban, d.maKH  
                                FROM phieudoihang as a join nhanvien as b join khachhang as c join hdb as d 
                                WHERE a.MaNV=b.idnhanvien and d.maKH=c.maKH and b.idnhanvien=d.maNV
                                and a.MaPhieuDoiH=$maBBDH");
// $sql11= "SELECT * from phieudoihang as a join hdb as b on a.maHDB=b.maHDB join tbl_khachhang as c on b.maKH=c.maKH join nhanvien as d on a.MaNV=d.maNV where a.MaPhieuDoiH=$maBBDH";


?>
                <?php 
                    $row_NV_KH = mysqli_fetch_array($sql_NV_KH);
                    $row_phieu1= mysqli_fetch_array($sql_chitiet1);  
                    // $row_sql11 = mysqli_fetch_array($sql11);
                ?> 
            
        <div class="card-body" >
                    <h4 style="text-align:center"><b>BIÊN BẢN ĐỔI HÀNG</b></h4>
                
                    <!-- <table style="width:100%">
                        <tr>
                            <td><b> Nhân viên lập phiếu:</b> <?php// echo $row_NV_KH['tenNV'] ?> </td>
                            <td ><p style="color:white">......................................................</p><td>  
                            <td style="padding-right:0"> <b>Ngày lập phiếu: </b> <?php //echo $row_phieu1['ngaylap'] ?>  </td>
                        </tr>
                        <tr>
                            <td><b>Khách hàng:</b>  <?php //echo $row_sql11['tenKH'] ?> <td>  
                            
                        </tr>
                    </table > -->
                    <!-- <b> Nhân viên lập phiếu:</b> <?php echo $row_sql11['TenNV'] ?> 
                    <b>Ngày lập phiếu: </b> <?php echo $row_phieu1['NgayLapPhieu'] ?>   -->
<br>
            <form action="" method="POST">
                <table class="table table-bordered " >
                    <tr>
                        <th style="text-align: center">Thứ tự</th>
                        <th style="text-align: center">Mã hàng</th>
                        <th style="text-align: center">Tên sản phẩm</th>
                        <th style="text-align: center">Số lượng đổi</th>
                        <th style="text-align: center">DVT</th>
                    </tr>
                    
<?php
    $i = 0;
    while($row_phieu = mysqli_fetch_array($sql_chitiet)){ //chuyển thành mảng, lần lượt i
        $i++;
?> 
                    <tr>
                        <td colspan="" style="text-align: center"><?php echo $i; ?></td>
                        <td style="text-align: center"><?php echo $row_phieu['MaHang']; ?></td>
                        <td style="text-align: center"><?php echo $row_phieu['TenHang']; ?></td>
                        <td style="text-align: center"><?php echo $row_phieu['SoLuongDoi']; ?></td>
                        <!-- <td style="text-align: center"><?php echo $row_phieu['DonGiaBan']; ?></td> -->
                        <td style="text-align: center"><?php echo $row_phieu['DVT']; ?></td>
                        <!-- <td style="text-align: right"><?php echo number_format($row_phieu['SoLuongDoi']*$row_phieu['DonGiaBan']).'VND'; ?></td> -->
                    </tr>
<?php
} 
?> 

<?php $row_total=mysqli_fetch_array($sql_total) ?>
                    <!-- <tr>
                        <td colspan="4" style="padding-left: 30px"> <b>Tổng tiền </b></td>
                        <td style="text-align: right"><?php echo $row_total['total']  ?>VND</td>
                    </tr> -->
                    
                </table>
                <br>
                <a class="btn btn-danger"  style="margin-left:100px;color:white" onclick="return tuchoi ('<?php echo $row_phieu1['MaPhieuDoiH'] ?>')" href="BBDH_tuchoi.php?maBBDH=<?php echo $row_phieu1['MaPhieuDoiH']; ?>"><b>Từ chối </b></a>
                <a class="btn btn-warning" style="margin-left:180px;color:white" onclick="return chuaxuly ('<?php echo $row_phieu1['MaPhieuDoiH'] ?>')" href="BBDH_chuaxuly.php?maBBDH=<?php echo $row_phieu1['MaPhieuDoiH']; ?>"> <b>Chưa xử lý </b></a>
                <a class="btn btn-success" style="margin-left:180px;color:white" onclick="return xuly ('<?php echo $row_phieu1['MaPhieuDoiH'] ?>')" href="BBDH_xuly.php?maBBDH=<?php echo $row_phieu1['MaPhieuDoiH']; ?>"> <b>Lập phiếu đổi hàng  </b> </a>
				<a class="btn btn-success" style="margin-left:120px;color:white" onclick="return tbao ('<?php echo $row_phieu1['MaPhieuDoiH'] ?>')" href="BBDH_tbaokhach.php?maBBDH=<?php echo $row_phieu1['MaPhieuDoiH']; ?>"> <b>Thông báo KH </b></a>
                
            
</p><br>
</div>
</form>
</div>
</div>

</div>
</div>
</main>
</div>
</div>
<?php include("adminFooter.php"); ?>
        <script>
        function tuchoi(name){
        return confirm('Bạn muốn từ chối xuất kho với mã phiếu ' + name + "?");
        }</script>
        <script>
        function chuaxuly (name){
        return confirm('Kho chưa sẵn sàng xử lý mã phiếu ' + name + "?");
        }</script>
        <script>
        function xuly(name){
         return confirm('Bạn muốn lập phiếu xuất hàng cho phiếu mã ' + name + "?" );
        }
        </script> 
</body>
</html> 
