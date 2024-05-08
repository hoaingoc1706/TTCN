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
    $masanpham=$_GET["masanpham"];
    $tensanpham=$_GET["tensanpham"];
    // $sanpham_chitiet=$_POST["sanpham_chitiet"];
    $mota=$_GET["mota"];
    $dongianhap=$_GET["dongianhap"];
    $dongiaban=$_GET["dongiaban"];
    $soluong=$_GET["soluong"];
    $DVT=$_GET["DVT"];
    $idtheloai=$_GET["idtheloai"];
    $idnhacungcap=$_GET["idnhacungcap"];

    // $noi_luu_anh = "../../luckyshoes/images/".basename($_FILES["hinhanh"]['name']);
    // $luu_file_anh = $_FILES['hinhanh']['tmp_name'];

    // $up_anh = move_uploaded_file($luu_file_anh, $noi_luu_anh);

    // if (!$up_anh) {
    //         $hinhanh = NULL;
    // } else {
    //         $hinhanh = basename($_FILES['sanpham_image']['name']);
    // }s


    $sql_select = "SELECT mahang FROM hanghoa where tenhang = '".$tensanpham."' ";
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

    $sql= "INSERT INTO hanghoa (mahang,tenhang, maloaihang, maNCC, soluong, dongianhap, dongiaban, DVT, mota)
           VALUES ('$masanpham','$tensanpham','$idtheloai','$idnhacungcap','$soluong','$dongianhap','$dongiaban','$DVT','$mota')";
    if($con -> query($sql)===True){
         echo "
                <script type='text/javascript'>
                    window.alert('Bạn đã thêm mới sản phẩm thành công');
                     window.location.href='sanpham.php';
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

