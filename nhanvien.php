<?php 
session_start();
if (!isset($_SESSION['dangnhap_home'])) {
    echo "<script type='text/javascript'>alert('Bạn không được phép truy cập'); window.location.href='dangnhap.php';</script>";
    exit;
}
include("adminHeader.php"); 
include("layout/nav.php"); 
include("config/connection.php"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="path_to_css_file.css"> <!-- Link to your CSS file -->
    <title>Quản Trị Nhân Viên</title>
</head>
<body class="sb-nav-fixed">
    <div id="layoutSidenav">
        <?php include("layout/aside.php"); ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4 text-center">QUẢN TRỊ NHÂN VIÊN</h1>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-home"></i> <a href="index.php" style="text-decoration:none; color:black"><b>Trang chủ</b></a>
                            <i class="fas fa-table me-1"></i> Danh sách nhân viên
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã Nhân Viên</th>
                                        <th>Tên Nhân Viên</th>
                                        <th>Ngày Sinh</th>
                                        <th>Giới Tính</th>
                                        <th>Địa chỉ</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>  
                                        <th>Ngày vào làm</th>                                                                              
                                        <th>Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM nhanvien ORDER BY IDNhanvien DESC";
                                    $result = $con->query($sql);
                                    $i = 0;
                                    while ($row = $result->fetch_assoc()) {
                                        $i++;
                                        echo "<tr>
                                            <td>{$i}</td>
                                            <td>{$row['IDNhanvien']}</td>
                                            <td>{$row['TenNV']}</td>
                                            <td>{$row['NgaySinh']}</td>
                                            <td>{$row['GioiTinh']}</td>
                                            <td>{$row['DiaChi']}</td>
                                            <td>{$row['Email']}</td>
                                            <td>{$row['SDT']}</td>
                                            <td>{$row['NgayVaoLam']}</td>
                                            <td>" . getDeleteButton($row['IDNhanvien'], $row['Email']) . "</td>
                                        </tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <?php include("adminFooter.php"); ?>
        </div>
    </div>
    <script>
        function Del(name) {
            return confirm('Bạn có chắc chắn muốn xóa người dùng: ' + name + "?");
        }
    </script>
</body>
</html>

<?php
function getDeleteButton($id, $email) {
    $sql = "SELECT Chucvu FROM nhanvien WHERE IDnhanvien='".$_SESSION['ten_admin']."'";
    $result = mysqli_query($GLOBALS['con'], $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row['Chucvu'] == "Quản lí kho") {
        return "<a onclick='return Del(\"$email\")' class='btn btn-danger' style='color:white' href='nhanvienxoa.php?maNV=$id'>Xóa</a>";
    } else {
        return "<a class='btn btn-danger' style='color:white' href='' onclick='alert(\"Bạn không có quyền dùng chức năng này\")'>Xóa</a>";
    }
}
?>
