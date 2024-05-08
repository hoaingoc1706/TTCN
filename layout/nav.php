<?php
session_start();
include("config/connection.php");

// Lấy ID của nhân viên đăng nhập từ session
$id_nhanvien = $_SESSION['ten_admin'];

// Truy vấn thông tin của nhân viên từ cơ sở dữ liệu
$sql = "SELECT * FROM nhanvien WHERE IDNhanvien = '$id_nhanvien'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
?>

<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="index.php">
        <img src="logo.png" style="margin-top:15px" width="80px">
    </a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
            <i class="fas fa-search"></i>
        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user fa-fw"></i>
                XIN CHÀO <?php echo $row["TenNV"];?>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="dangxuat.php">Đăng xuất</a></li>
            </ul>
        </li>
    </ul>
</nav>
