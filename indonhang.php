<?php
include('tfpdf/tfpdf.php');
include("config/connection.php");


$pdf = new tFPDF();
$pdf->AddPage("0");
// $pdf->SetFont('Arial','B',16);
// $pdf->Cell(40,10,'Hello World!');
$pdf->AddFont('DejaVu','','DejaVuSans.ttf',true);
$pdf->SetFont('DejaVu','',16);


$maPXH = $_GET['maPXH']; //lấy lại mã hàng từ bên liệt kê đơn hàng muốn xem
		// $sql_chitiet = mysqli_query($con,"SELECT * FROM tbl_phieuxuathang as a,tbl_chitietpxh as b, tbl_nhanvien as c, tbl_khachhang as d, tbl_sanpham as e
		// WHERE a.maPXH=b.maPXH AND a.maKH=d.MaKH AND a.maNV=c.maNV AND b.maSP=e.maSP AND a.maPXH='$maPXH'"); 

		// $sql_chitiet = mysqli_query($con,"SELECT * FROM tbl_phieuxuathang as a , tbl_chitietpxh 
// 									as d, tbl_hoadonban as e join tbl_sanpham as b 
// 									WHERE  a.maPXH=d.maPXH and b.maSP=d.maSP and
// 									a.maHDB=e.maHDB and a.maPXH='$maPXH' GROUP BY 
// 									a.maPXH ORDER BY ngaylap DESC"); 

$sql_chitiet = mysqli_query($con,"SELECT * FROM phieuyeucauxuathang as a join chitietpycxh as d join hdb as e join hanghoa as b 
on  a.maPhieuycXH=d.maPhieuycXH and b.mahang=d.mahang and a.maHDB=e.maHDB WHERE a.maPhieuycXH=$maPXH");
$sql_total=mysqli_query($con, "SELECT sum(a.soluongxuat*b.dongiaban) as total FROM chitietpycxh as a join hanghoa as b on a.mahang=b.mahang WHERE a.maPhieuycXH=$maPXH");
$pdf->Write(15,'PHIẾU XUẤT HÀNG'); 

    $pdf->Ln(25);
    $width_cell=array(270);
    $pdf->SetFillColor(255,255,255); 
    $pdf->Cell($width_cell[0],10,'Tên công ty: CÔNG TY TNHH ĐẦU TƯ VÀ CÔNG NGHỆ TBHP',1,0,'L',true);
    $pdf->Ln();


    

    $pdf->Ln();

	$width_cell=array(15,35,80,30,40,30,40);
    $pdf->SetFillColor(193,229,252); 
	$pdf->Cell($width_cell[0],10,'STT',1,0,'C',true);
	$pdf->Cell($width_cell[1],10,'Mã hàng',1,0,'C',true);
	$pdf->Cell($width_cell[2],10,'Tên sản phẩm',1,0,'C',true);
	$pdf->Cell($width_cell[3],10,'Số lượng',1,0,'C',true); 
	$pdf->Cell($width_cell[4],10,'Giá',1,0,'C',true);
    $pdf->Cell($width_cell[5],10,'DVT',1,0,'C',true);
	$pdf->Cell($width_cell[6],10,'Thành tiền',1,1,'C',true); 
	$pdf->SetFillColor(235,236,236); 
	$fill=false;
	$i = 0;
	while($row_phieu = mysqli_fetch_array($sql_chitiet)){
		$i++;
	$pdf->Cell($width_cell[0],10,$i,1,0,'C',$fill);
	$pdf->Cell($width_cell[1],10,$row_phieu['MaHang'],1,0,'C',$fill);
	$pdf->Cell($width_cell[2],10,$row_phieu['TenHang'],1,0,'C',$fill);
    
	$pdf->Cell($width_cell[3],10,$row_phieu['SoLuongXuat'],1,0,'C',$fill);
    $pdf->Cell($width_cell[4],10,number_format($row_phieu['DonGiaBan']),1,0,'C',$fill);
    $pdf->Cell($width_cell[5],10,$row_phieu['DVT'],1,0,'C',$fill);
	
	$pdf->Cell($width_cell[6],10,number_format($row_phieu['SoLuongXuat']*$row_phieu['DonGiaBan']),1,1,'R',$fill);
    $fill=false;
	}
    $width_cell=array(230,40);
	
    $pdf->Cell($width_cell[0],10,'Tổng tiền',1,0,'L',true);
	$row_total=mysqli_fetch_array($sql_total);
	$pdf->Cell($width_cell[1],10,number_format($row_total['total']),1,1,'R',$fill);

	


    $pdf->Output();
?>