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

<?php
include("config/connection.php");
// if(isset($_POST['sbm'])){ 
    $tensanpham=$_GET["TenHang"];
    // $sanpham_chitiet=$_POST["sanpham_chitiet"];
    $mota=$_GET["MoTa"];
    $dongianhap=$_GET["DonGiaNhap"];
    $dongiaban=$_GET["DonGiaBan"];
    $soluong=$_GET["SoLuong"];
    $DVT=$_GET["DVT"];
    $idtheloai=$_GET["MaLoaiHang"];
    $idnhacungcap=$_GET["MaNCC"];
    $ghichu=$_GET["GhiChu"];
    $Ngaysx=$_GET["NgaySanXuat"];
    $Hansd=$_GET["HanSuDung"];

    // $noi_luu_anh = "../../luckyshoes/images/".basename($_FILES["hinhanh"]['name']);
    // $luu_file_anh = $_FILES['hinhanh']['tmp_name'];

    // $up_anh = move_uploaded_file($luu_file_anh, $noi_luu_anh);

    // if (!$up_anh) {
    //         $hinhanh = NULL;
    // } else {
    //         $hinhanh = basename($_FILES['sanpham_image']['name']);
    // }


    $sql_select = "SELECT MaHang FROM hanghoa where TenHang='$tensanpham'";
    $result_select = $con -> query($sql_select);
    if($result_select->num_rows>0){
      echo "
                <script type='text/javascript'>
                    window.alert('Trùng tên sản phẩm khi thêm');
                    window.location.href='sanpham.php';
                </script>
            ";
    }
    else{

    // $sql = "INSERT INTO tbl_sanpham (sanpham_name,sanpham_chitiet,sanpham_mota,sanpham_gia,sanpham_giakhuyenmai,sanpham_active,sanpham_hot,sanpham_soluong,category_id, sanpham_image) VALUES ('$sanpham_name','$sanpham_chitiet','$sanpham_mota',$sanpham_gia,$sanpham_giakhuyenmai,$sanpham_active,$sanpham_hot,$sanpham_soluong,$category_id,'$sanpham_image')";

    $sql= "INSERT INTO `hanghoa`(`TenHang`,`SoLuong`, `DonGiaNhap`, `DonGiaBan`, `DVT`, `NgaySanXuat`, `HanSuDung`, `MoTa`, `GhiChu`, `MaLoaiHang`,`MaNCC`)
           VALUES ('$tensanpham','$soluong','$dongianhap','$dongiaban','$DVT','$Ngaysx','$Hansd','$mota','$ghichu','$idtheloai','$idnhacungcap')";
    if($con -> query($sql)===True){
         echo "
                <script type='text/javascript'>
                    window.alert('Bạn đã thêm mới sản phẩm thành công');
                     window.location.href='z_pnh.php';
                </script>
            ";
     }
    else
    {
        echo "$sql";
    }

    }
//  }

?>

