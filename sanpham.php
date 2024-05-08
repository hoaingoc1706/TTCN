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
                        <h2 class="mt-4" STYLE="text-align:center">QUẢN TRỊ SẢN PHẨM</h2></br>
                        <!-- <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                        </ol> -->
                        <div class="card mb-4">
                            <div class="card-header">      <i class="fas fa-home"> </i>  <a style="text-decoration: none;color:black"href="index.php"><b>Trang chủ</b></a>
                                <i class="fas fa-table me-1"></i><a href="loaisanpham.php" style="text-decoration: none; color:black"> <b>Loại Sản Phẩm</b> </a>
                               || Danh sách sản phẩm 
                                <a class="btn btn-primary" href="sanphamthemmoi.php" style="color: white; margin-left: 550px"><b>Thêm mới</b></a> 
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead >
                                        <tr >
                                            <th style="text-align: center;">STT</th>
                                            <th style="text-align: center;">Mã sản phẩm</th>  
                                            <th style="text-align: center;">Tên sản phẩm</th>
                                            <th style="text-align: center; width: 50px">Mô tả</th>
                                            <th style="text-align: center;">Đơn giá nhập</th>
                                            <th style="text-align: center;">Đơn giá bán</th> 
                                            <th style="text-align: center;">DVT</th> 
                                            <th style="text-align: center;">Số lượng</th>
                                            <th style="text-align: center;">Loại sản phẩm</th>
                                            <th style="text-align: center;">Nhà cung cấp</th>
                                            <!-- <th style="text-align: center;">Thương hiệu</th>   -->        
                                            <th style="text-align: center;">Sửa</th>
                                            <th style="text-align: center;">Xóa</th>
                                        </tr>
                                    </thead>
                                    <!-- <tfoot >
                                        <tr >
                                        <th style="text-align: center;">STT</th>
                                            <th style="text-align: center;">Mã sản phẩm</th>  
                                            <th style="text-align: center;">Tên sản phẩm</th>
                                            <th style="text-align: center; width: 50px">Mô tả</th>
                                            <th style="text-align: center;">Đơn giá</th> 
                                            <th style="text-align: center;">DVT</th> 
                                            <th style="text-align: center;">Số lượng</th>
                                            <th style="text-align: center;">Loại sản phẩm</th>
                                            <th style="text-align: center;">Nhà cung cấp</th>
                                            <th style="text-align: center;">Thương hiệu</th>           
                                            <th style="text-align: center;">Sửa</th>
                                            <th style="text-align: center;">Xóa</th>
                                        </tr>
                                    </tfoot> -->
                                    <tbody>
                                    <?php
                                    // Load file cấu hình để kết nối đến máy chủ CSDL, CSDL
                                    include("config/connection.php");

    // Viết câu lệnh truy vấn để lấy ra dữ liệu mong muốn (TIN TỨC đã lưu trong CSDL)
    $sql = "SELECT a.*, b.tenNCC, c.tenloaihang FROM hanghoa a 
            JOIN nhacungcap b ON a.maNCC = b.maNCC 
            JOIN loaihang c ON a.maloaihang = c.maloaihang 
            ORDER BY a.mahang ASC";

    // Thực thi câu lệnh truy vấn
    $result = $con->query($sql);

    // Kiểm tra kết quả trả về
    if ($result->num_rows > 0) {
        $i = 0;
        while ($row = $result->fetch_assoc()) {
            $i++;
?>
            <tr>
                <td><?php echo $i; ?></td>
                <td style="text-align: center;"><?php echo $row['MaHang']; ?></td>
                <td><?php echo $row['TenHang']; ?></td>
                <td style="width: 300px"><?php echo $row['MoTa']; ?></td>
                <td style="text-align: center;"><?php echo $row['DonGiaNhap']; ?></td>
                <td style="text-align: center;"><?php echo $row['DonGiaBan']; ?></td>
                <td style="text-align: center;"><?php echo $row['DVT']; ?></td>
                <td style="text-align: center;"><?php echo $row['SoLuong']; ?></td>
                <td style="text-align: center;"><?php echo $row['tenloaihang']; ?></td>
                <td style="text-align: center;"><?php echo $row['tenNCC']; ?></td>
                <td><a class="btn btn-success" style="color: white" href="sanphamsua.php?mahang=<?php echo $row['MaHang']; ?>">Sửa</a></td>
                <td>
                    <a class="btn btn-danger" style="color: white" onclick="return Del ('<?php echo $row['TenHang'] ?>')" href="sanphamxoa.php?mahang=<?php echo $row['MaHang']; ?>">Xóa</a>
                </td>
            </tr>
<?php
        }
    } else {
        echo "Không có dữ liệu để hiển thị.";
    }
?>

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
                return confirm('Bạn có chắc chắn muốn xóa sản phẩm: ' + name + "?");
            }
        </script>
    </body>
</html>

