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
	include('connection.php');
    $maPNH= $_GET['MaPhieuNhapH'];
?>

<div class="row">
            <div class="container-fluid px-4" >
                <h1 class="mt-4"style="text-align:center">Chi tiết phiếu nhập hàng</h1>
                <ol class="breadcrumb mb-4">
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header" >
                            <div class="row">
    <div class="col-8">
   
    </div>
    <div class="col-sm">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Liên hệ NCC</button>
    
    </div>
    <div class="col-sm">
    <a class="btn btn-primary" style="color: white" href="z_contract.php?MaPhieuNhapH=<?php echo $maPNH; ?>">Tạo hợp đồng</a>
    </div>
  </div>
                            
                            </div>
        <div class="col-md-12">
		<div class="card-body" >
					
                        <?php
                                
                    $sql_nv = mysqli_query($con,"SELECT * FROM pnh as a INNER join nhanvien as b on a.MaNV=b.IDNhanvien WHERE a.MaPhieuNhapH=$maPNH;"); 
                    $row = mysqli_fetch_assoc($sql_nv);
                                    ?>
                  
                    <table style="width:100%" border="1" >
						<tr>
							<td style="font-size: 18px;"><b> Nhân viên:</b> <?php echo $row['TenNV']; ?> </td>
							<td ><p style="color:white">......................................................</p><td>	
							<td style="padding-right:0; font-size: 18px;"> <b>Ngày lập phiếu: </b> <?php echo $row['NgayLapPhieu']; ?>  </td>
						</tr>
						<tr>
							<td style="font-size: 18px;"><b>Mã phiếu nhập hàng:</b>  <?php echo $maPNH ?> <td>	
							
						</tr>
					</table >
				<table class="table table-bordered "  style="margin-top: 10px;border: 2px solid black;">
                                                <tr style="background-color: lightgray;">
                                                    <th style="text-align: center">Thứ tự</th>
                                                    <th style="text-align: center">Mã Hàng</th>
                                                    <th style="text-align: center">Tên Hàng</th>
                                                    <th style="text-align: center">Số lượng nhập</th>
                                                    <th style="text-align: center">Đơn giá nhập</th>
                                                    <th style="text-align: center">Thành tiền</th>
                                                    <th style="text-align: center">Tác vụ</th>
                                                </tr>
					
                            <?php
                                        include('connection.php');
                                        $i=0;
                                        $sqlhh = "SELECT b.MaHang,b.TenHang,a.SoLuongNhap,b.DonGiaNhap 
                                        FROM chitietpnh as a JOIN hanghoa as b ON a.MaHang=b.MaHang 
                                        Where a.MaPhieuNhapH = $maPNH;";  
                                        $san_pham = $con -> query($sqlhh);
                                       
                                        while ($row_phieu = $san_pham ->fetch_assoc()) {
                                        $i++;
                                        
                            ?> 
                                                <tr>
                                                    <td colspan="1" style="'text-align: center"><?php echo $i; ?></td>
                                                    <td style="text-align: center"><?php echo $row_phieu['MaHang']; ?></td>
                                                    
                                                    <td style="text-align: center"><?php echo $row_phieu['TenHang']; ?></td>
                                                    <td style="text-align: center"><?php echo $row_phieu['SoLuongNhap']; ?></td>
                                                    <td style="text-align: center"><?php echo number_format($row_phieu['DonGiaNhap']); ?></td>
                                                    <td style="text-align: center"><?php echo number_format($row_phieu['DonGiaNhap']*$row_phieu['SoLuongNhap']); ?></td>		
                                                    <td style="text-align: center"><a style="color: white" class="btn btn-primary" href="z_pnh_view_detail_update.php?maSP=<?php echo $row_phieu['MaHang']; ?>">Sửa</a></td>
                                                </tr>
                            <?php
                            
                            } 

                           
                            ?> 
                            <tr style="background-color: lightgray;">
                              <td style="text-align: center"><b>Tổng tiền</b></td>
                              <td colspan="4"></td>  <td style="text-align: center"><b><?php
                                  $sql_tt = mysqli_query($con, "SELECT SUM(a.SoLuongNhap * b.DonGiaNhap) AS tt 
                                 FROM chitietpnh AS a JOIN hanghoa AS b 
                                 ON a.MaHang = b.MaHang 
                                 WHERE a.MaPhieuNhapH = $maPNH;");
                                 $row_tt = mysqli_fetch_assoc($sql_tt);
                                echo number_format($row_tt['tt']);
                                ?></b></td>
                                   <td></td>
                                </tr>

                            
                                                    <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Liên hệ nhà cung cấp</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            <div class="container">

                                            <form method="POST" action="../mail/send_ncc.php" enctype="multipart/form-data">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="title" placeholder="Tiêu đề" />
                                                <label for="title">Tiêu đề</label>
                                            </div>
                                         
                                            <div class="form-floating mb-3">
                                                <textarea class="form-control" id="sanpham_mota" name="ghichu" placeholder="Ghi chú"></textarea>
                                                <label for="ghichu">ghichu</label>
                                            </div> 
                                            <div class="form-floating mb-3">
                                                <input type="file" class="form-control" name="file" placeholder="Nhập file đính kèm" />
                                                <label for="file">File</label>
                                            </div> 
                                            <?php
                                                    include("config/connection.php");
                                                    $sql_category="SELECT * FROM nhacungcap";
                                                    $result_category=$con->query($sql_category);
                                                            
                                            ?> 

                                             <div class="form-floating mb-3">
                                                <b style="margin-right: 70px">Nhà cung cấp:  </b>
                                               <select name="id">
                                                    <?php while ($row_category=$result_category->fetch_assoc()) {?>
                                                        <option value="<?php echo $row_category['MaNCC'];?>">

                                                            <?php echo $row_category['TenNCC']; ?>
                                                        
                                                        </option>
                                                        
                                                    <?php } 
                                                    
                                                    ?>
                                                </select>                            
                                            </div>             
                                           
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Gửi</button>
      </div>
      </form>
    </div>
  </div>
</div>
				</table>
</div>

</div>
</div>

</div>
</div>
</main>
</div>
</div>
<?php include("adminFooter.php"); ?>
</body>
</html> 