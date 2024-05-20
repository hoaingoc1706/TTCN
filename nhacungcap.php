<?php 
session_start();
if(!isset($_SESSION['dangnhap_home'])) {
    echo "
    <script type='text/javascript'>
    window.alert('Bạn không được phép truy cập');
    window.location.href='dangnhap.php';
    </script>
    ";
}
;?>
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
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Nhà Cung Cấp</h1>
                    <!-- <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                    </ol> -->
                    <div class="card mb-4">
                        <div class="card-header">      <i class="fas fa-home"> </i>  <a style="text-decoration: none;color:black" href="index.php"> <b>Trang chủ</b></a>
                            <i class="fas fa-table me-1"></i>
                            Danh sách nhà cung cấp
                            <a href="nhacungcapthem.php" class="btn btn-primary" style="margin-left:610px"><b> Thêm mới</b></a>
                        </div>
                        
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã Nhà Cung Cấp</th>
                                        <th>Tên Nhà Cung Cấp</th>
                                        <th>Địa chỉ</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>                                                                                
                                        <th>Xóa</th>
                                    </tr>
                                </thead>
                                <!-- <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã Nhà Cung Cấp</th>
                                        <th>Tên Nhà Cung Cấp</th>
                                        <th>Địa chỉ</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>                                                                                
                                        <th>Xóa</th>
                                    </tr>
                                </tfoot> -->
                                <tbody>
                                    <?php
                                        // 1. Load file cấu hình để kết nối đến máy chủ CSDL, CSDL
                                    include("config/connection.php");

                                        // 2. Viết câu lệnh truy vấn để lấy ra dữ liệu mong muốn (TIN TỨC đã lưu trong CSDL)
                                    $sql = " SELECT * FROM nhacungcap ORDER BY maNCC ASC 
                                    ";
                                        // 3. Thực thi câu lệnh lấy dữ liệu mong muốn
                                    $result=$con->query($sql);

                                    $i=0;
                                    while ($row = $result ->fetch_assoc()) {
                                        $i++;
                                        ;?>

                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $row["MaNCC"];?></td>
                                            <td><?php echo $row["TenNCC"];?></td>
                                            <td><?php echo $row["DiaChi"];?></td>
                                            <td><?php echo $row["Email"];?></td>
                                            <td><?php echo $row["SDT"];?></td>
                                            <td>
                                                                                  <!-- PHÂN QUYỀN -->

                                                 <a  style="color: white" class="btn btn-danger"  onclick=" return Del('<?php echo $row['Email']; ?>')" href="nhacungcapxoa.php?maNCC=<?php echo $row['MaNCC']; ?>">Xóa</a>
      

                                                </td>
                                        </tr>
                                        <?php
                                    }
                                    ;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <?php //include("layout/footer.php"); ?>
        </div>
    </div>
    <?php include("adminFooter.php"); ?>
    <script>
        function Del(name){
            return confirm('Bạn có chắc chắn muốn xóa nhà cung cấp: ' + name + "?");
        }
    </script>
</body>
</html>
