<?php
include('tfpdf/tfpdf.php');
include('connection.php');


$pdf = new tFPDF();
$pdf->AddPage("0");
// $pdf->SetFont('Arial','B',16);
// $pdf->Cell(40,10,'Hello World!');
$pdf->AddFont('DejaVu','','DejaVuSans.ttf',true);
$pdf->SetFont('DejaVu','',12);


$MaPKKH = $_GET['MaPhieuKKH']; 
$sql= mysqli_query($con,"SELECT *,a.SoLuongTon as sl FROM chitietphieukkh as a inner join hanghoa as b on a.MaHang=b.MaHang where a.MaPhieuKKH=$MaPKKH;");
class PDF extends tFPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('logo.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'Title',1,0,'C');
    // Line break
    $this->Ln(20);
}
}

$pdf->Cell(270,10,'CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM',5,100,'C');
$pdf->Ln(1);
$pdf->Cell(275,10,'Độc lập - tự do - hạnh phúc',5,100,'C');
$pdf->Ln(0);
$pdf->Cell(270,10,'_ _ _ _ _ _',5,100,'C');
$pdf->Ln(1);
$pdf->Cell(490,10,'Hà Nội, ngày    tháng    năm 2024',5,100,'C');
$pdf->Ln(1);
$pdf->Cell(270,10,'PHIEU KIEM KE HANG HOA',5,100,'C'); 

$pdf->Ln(6);
$pdf->Write(15,'Tên nhân viên: Ông.......................'); 
$pdf->Ln(6);
$pdf->Write(15,'ID Nhân viên:....................................'); 
$pdf->Ln(6);
$pdf->Write(15,'Email:....................................'); 
$pdf->Ln(6);
$pdf->Write(15,'Điện thoại:....................................'); 
$pdf->Ln(6);

$pdf->Write(15,'Địa chỉ................................................................'); 
$pdf->Ln(10);
$pdf->Write(15,'Mã hàng:........................');
$pdf->Ln(6);
$pdf->Write(15,'Tên hàng:....................................'); 
$pdf->Ln(6);
$pdf->Write(15,'Số lượng tồn:..........................................................'); 
$pdf->Ln(6);

$pdf->Write(15,'Kiểm tra số lượng tồn:.....ngày.....tháng.....năm.....để cập nhật thông tin hàng tồn kho'); 
$pdf->Ln(10);


$pdf->Write(15,'Địa chỉ kho: 12 Chùa Bộc, Đống Đa, Hà Nội');
$pdf->Ln(10);



$pdf->Write(15,'Phiếu được lập để theo dõi thông tin hàng từ ngày...tháng...năm đến ngày...tháng...năm... ');
$pdf->Ln(50);
$pdf->Write(15,'Thông tin chi tiết của phiếu kiểm kê: ');
$pdf->Ln(5);










    // $pdf->Ln(25);
    // $width_cell=array(270);
    // $pdf->SetFillColor(255,255,255); 
    // $pdf->Cell($width_cell[0],10,' CÔNG TY TNHH ĐẦU TƯ VÀ CÔNG NGHỆ TBHP',10,0,'C',true);
    // $pdf->Ln();
    $pdf->Ln(25);

// Define the width of each cell
$width_cell=array(20,20,80,20);

// Header colors and text alignment
$pdf->SetFillColor(192,192,192); 
$pdf->Cell($width_cell[0],10,'STT',1,0,'C',true);
$pdf->Cell($width_cell[1],10,'Mã sp',1,0,'C',true);
$pdf->Cell($width_cell[2],10,'Tên sản phẩm',1,0,'C',true);
$pdf->Cell($width_cell[3],10,'Số lượng',1,0,'C',true); 
$pdf->Ln();
// Set fill color for rows
$pdf->SetFillColor(235,236,236); 
$fill=false;
$i = 0;

// Fetch data from the database
while($row = mysqli_fetch_array($sql)){
    $i++;
    $pdf->Cell($width_cell[0],10,$i,1,0,'C',$fill); // Serial number
    $pdf->Cell($width_cell[1],10,$row['MaHang'],1,0,'C',$fill); // Product code
    $pdf->Cell($width_cell[2],10,$row['TenHang'],1,0,'C',$fill); // Product name

    //
    $pdf->Cell($width_cell[0],10,$row['SoLuongTon'],1,0,'C',$fill); // Quantity
// Move to the next line before adding 'Số lượng'
$pdf->Ln();
    // Reset fill for next row
    $fill = !$fill;
}


// Khởi tạo mảng $width_cell với hai phần tử



// Truy vấn dữ liệu
$sqlhh = "SELECT b.MaHang, b.TenHang, a.SoLuong 
          FROM chitietphieukkh as a JOIN hanghoa as b ON a.MaHang=b.MaHang 
          WHERE a.MaPhieuKKH = $MaPKKH";  
$san_pham = $con->query($sqlhh);

if ($san_pham !== false && $san_pham->num_rows > 0) {
    $i = 0;
    while ($row_phieu = $san_pham->fetch_assoc()) {
        $i++;
        // In dữ liệu của từng hàng
        $pdf->MultiCell($width_cell[0], 10, $i, 1, 'C', false);
        $pdf->MultiCell($width_cell[1], 10, $row_phieu['MaHang'], 1, 'C', false);
        $pdf->MultiCell($width_cell[2], 10, $row_phieu['TenHang'], 1, 'C', false);
        $pdf->MultiCell($width_cell[3], 10, $row_phieu['SoLuongTon'], 1, 'C', false);
        
    }
}
$pdf->Cell(100,10,'                                                                                                                                                     Nhân viên',5,100,'L');
    $pdf->Cell(100,10,'                                                                                                                                          Ký tên (Ký và ghi rõ họ tên)',5,100,'L');
// Output file PDF
$pdf->Output();

