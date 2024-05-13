
 <div id="layoutSidenav_nav" >
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Hệ thống</div>
                <a class="nav-link" href="index.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                   Trang chủ              </a>      
                   <a class="nav-link collapsed" href="sanpham.php" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <div class="sb-nav-link-icon"><i class="fas fa-archive"></i></div>
                        Quản trị sản phẩm
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                <div class="collapse" id="collapseTwo" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link" href="sanpham.php"> Sản phẩm</a>                                                            
                        <a class="nav-link" href="loaisanpham.php">Loại sản phẩm</a>
                        <a class="nav-link" href="phieukiemke_detail.php">Phiếu kiểm kê</a>

                </div>                     

                <a class="nav-link" href="nhacungcap.php">
                    <div class="sb-nav-link-icon"> <i class="fas fa-handshake"></i>
                    </div>
                       Quản trị Nhà cung cấp                                                           
                   </a> 
      
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    <div class="sb-nav-link-icon"><i class="fas fa-sign-in-alt"></i></div>
                    Quản trị nhập hàng
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseFive" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <!-- PHÂN QUYỀN -->

                        <a class="nav-link" href="z_pnh.php">Nhập hàng</a>  
                            

                        <a class="nav-link" href="z_pnh_detail.php">Phiếu nhập hàng</a>                    
                    </nav>
                </div>
                
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseThree">
                    <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                    Quản trị xuất hàng 
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseSix" aria-labelledby="headingSix" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                    <a class="nav-link" href="xuathang.php">Xác nhận xuất hàng</a>   
                    <a class="nav-link" href="doihang.php">Xác nhận đổi hàng</a>   
                        <a class="nav-link" href="xulydonhang.php">Phiếu xuất hàng</a>
                        <a class="nav-link" href="BBDH.php">Phiếu đổi hàng</a>
                     </nav>
                </div>
               
                <a class="nav-link" href="nhanvien.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-edit"></i></div>
                    Quản trị nhân viên
                </a> 
                <a class="nav-link" href="khachhang.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-portrait"></i></div>
                    Quản trị khách hàng
                </a>  
                <a class="nav-link" href="z_sanpham.php">
                    <div class="sb-nav-link-icon"> <i class="fas fa-pen-nib"></i>
                    </div>
                       Báo cáo Nhập Xuất tồn                                                        
                   </a> 
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Đã đăng nhập</div>
        </div>
    </nav>
</div>


