<?php 
    session_start();

    // Kiểm tra xem người dùng đã đăng nhập chưa
    if(!isset($_SESSION['dangnhap_home'])) {
        // Nếu chưa đăng nhập, hiển thị thông báo và chuyển hướng đến trang đăng nhập
        echo "
            <script type='text/javascript'>
                window.alert('Bạn không được phép truy cập');
                window.location.href='dangnhap.php';
            </script>
        ";
    }

    // Load file cấu hình để kết nối đến máy chủ CSDL
    include("config/connection.php");

    // Lấy mã nhân viên từ URL
    $maNV = $_GET["maNV"];

    // Xây dựng câu lệnh SQL để xóa nhân viên
    $sql = "DELETE FROM nhanvien WHERE IDNhanvien=$maNV";

    // Thực thi câu lệnh SQL

    try {
        if($con->query($sql)) {
            echo "
                <script type='text/javascript'>
                    window.alert('Xóa nhân viên thành công');
                    window.location.href='nhanvien.php';
                </script>
            ";
        } 
    } catch (mysqli_sql_exception $e) {
        echo "
            <script type='text/javascript'>
                window.alert(' Nhân viên đang xử lí đơn hàng, không thể xóa');
                window.location.href='nhanvien.php';
            </script>
        ";
    }
    
    
    
?>
