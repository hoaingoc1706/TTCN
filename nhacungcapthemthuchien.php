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
include ("config/connection.php");
// if(isset($_POST['sbm'])){ 
  $tennhacc=$_POST["tennhacc"];
  //$matheloai=$_POST['manhacc'];
  $diachi=$_POST['diachinhacc'];
  $email=$_POST['email'];
  $sdt=$_POST['sdtnhacc'];
  $sql_select = "SELECT tenncc FROM nhacungcap where tenncc='".$tennhacc."' ";
  
    $result_select = $con -> query($sql_select);
    if($result_select->num_rows>0){
      echo "
                <script type='text/javascript'>
                    window.alert('Trùng tên nhà cung cấp khi thêm');
                    window.location.href='nhacungcap.php';
                </script>
            ";
    }
    else{

  $sql = "INSERT INTO nhacungcap (tenncc, diachi, sdt, email) VALUES ('$tennhacc','$diachi','$sdt','$email')";
  
  if($con -> query($sql)===True){
         echo "
                <script type='text/javascript'>
                    window.alert('Bạn đã thêm mới nhà cung cấp thành công');
                    window.location.href='nhacungcap.php';
                </script>
            ";
     }
    else
    {
         echo "
                <script type='text/javascript'>
                    window.alert('Lỗi khi thêm');
                    window.location.href='nhacungcap.php';
                </script>
            ";
    }

    }
 

?>