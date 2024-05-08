<?php 
    include('config/connection.php');
    $ten_dang_nhap=$_POST["txttendangnhap"];
    $matkhau=$_POST["matkhau"];
    $ten_nhan_vien = 
    $sql = "SELECT *
    FROM nhanvien where idnhanvien ='".$ten_dang_nhap."' and matkhau='".$matkhau."'
";
    $kq = mysqli_query($con, $sql);
    $so_luong = mysqli_num_rows($kq);
    $tbl_taikhoan= mysqli_fetch_array($kq);
    if ($so_luong==1) {
        session_start();
        $_SESSION['dangnhap_home']=1;
        $_SESSION['ten_admin']=$ten_dang_nhap;
        //$_SESSION['mat_khau']=$mat_khau;
       // $_SESSION['ten']=$tbl_taikhoan['tenNV'];

       // $_SESSION['maTK']=$tbl_nhanvien["maTK"];
        $_SESSION['maCV']=$tbl_taikhoan["maCV"];
        echo "
                <script type='text/javascript'>
                    window.alert('Đăng nhập thành công');
                    window.location.href='sanpham.php';
                </script>
            ";
    }
    else{
        echo "
                <script type='text/javascript'>
                    window.alert('Đăng nhập thất bại');
                    window.location.href='dangnhap.php';
                </script>
            ";
        }
;?>

