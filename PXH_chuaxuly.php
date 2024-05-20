<?php
  include("config/connection.php");
  $maphieu=$_GET['maPXH'];
  $sql_tuchoi = "  UPDATE `phieuyeucauxuathang` SET `tinhtrang`='Chưa xử lý' WHERE maPhieuYCXH=$maphieu";
   if($con -> query($sql_tuchoi)===True){
     echo "
                <script type='text/javascript'>
                    window.alert('Kho chưa sẵn sàng để xuất hàng');
                    window.location.href='xuathang.php';
                </script>
            ";
        
      }
      else{
        echo "
                <script type='text/javascript'>
                    window.alert('Lỗi thực hiện');
                    window.location.href='xuathang.php';
                </script>
            ";
      }
  
?>