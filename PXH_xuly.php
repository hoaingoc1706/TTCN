<?php 
session_start();
include("config/connection.php"); 
$maPXH=$_GET["maPXH"];

$sql = "  SELECT *, (a.soluong-b.soluongxuat) as update_sl FROM hanghoa AS a INNER JOIN chitietpycxh AS b 
              on a.mahang=b.mahang where b.maPhieuycXH=$maPXH";

$sql1 = $con ->query($sql);

      while($row=$sql1 ->fetch_assoc()){
    $id=$row['MaHang'];
    $sl=$row['update_sl'];
    mysqli_query($con,"UPDATE hanghoa SET `soluong`= $sl WHERE mahang= '".$id."' ");
    mysqli_query($con, "UPDATE `phieuyeucauxuathang` SET `tinhtrang`='Đã xử lý' WHERE maPhieuycXH= '".$maPXH."' ");
}

echo "
<script type='text/javascript'>
window.alert('Phiếu xuất hàng được tạo thành công!');
window.location.href='xemchitietdonhang.php?maPXH=$maPXH';
                </script>;"
?>





















 <!-- <?php

// $sql_count=" SELECT a.maSP, a.tenSP, a.soluong, sum(b.soluongxuat) as tongxuat from tbl_sanpham a JOIN tbl_chitietpxh b on a.maSP=b.maSP JOIN tbl_phieuxuathang c on b.maPXH=c.maPXH WHERE (a.soluong<20) AND (CURRENT_DATE()-c.ngaylap<30) GROUP BY a.maSP HAVING sum(b.soluongxuat)>20";
//  $sql2 = $con ->query($sql_count);
//  $i=0;
//  while($row2=$sql2 ->fetch_assoc()){
//   $i++;
//   $id=$row2['maSP'];
//   $ten=$row2['tenSP'];
//   $sl=$row2['soluong'];
//   $tx=$row2['tongxuat'];

// ?>
// <tr>
// <?php $_SESSION['email1']=$mail1;
// if ($i>=1)
//  {require('../mail1/send1.php');
//   $tieude = "GOI Y NHAP HANG";
//   $noidung =" <h3>Hệ thống gợi ý nhập hàng với các sản phẩm sau </h3>
//   <table>
//   <tr>
//   <th> -STT-||</th>
//   <th> -Mã SP-||</th>
//   <th>-Tên SP-|| </th>
//   <th>-Số lượng tồn-||</th>
//   <th>-Số lượng đã xuất-</th>
//  </tr>
//   <tr>
//   <th> $i</th>
//   <td> $id</td>
//   <td> $ten </td>
//   <td> $sl</td>
//   <td> $tx</td>
//  </tr>
//  </tr>
//   </table>";
//   $maildathang=$_SESSION['email1'];
//   $mail1= new mailer();
//   $mail1->dathangmail($tieude, $noidung);
// }

?>
 </tr> 
<?php
//  echo $i?>
   <?php
 //}?> -->
