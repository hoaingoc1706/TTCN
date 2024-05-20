<?php
  include("config/connection.php");
  $maBBDH=$_GET['maBBDH'];
  $sql_chuaxyly = "  UPDATE `phieudoihang` SET `tinhtrang`='Chưa xử lý' WHERE maphieudoih=$maBBDH";
   if($con -> query($sql_chuaxyly)===True){
     echo "
                <script type='text/javascript'>
                    window.alert('Kho chưa sẵn sàng để xuất hàng');
                    window.location.href='doihang.php';
                </script>
            ";
        
      }
      else{
        echo "
                <script type='text/javascript'>
                    window.alert('Lỗi thực hiện');
                    window.location.href='doihang.php';
                </script>
            ";
      }
  
?>