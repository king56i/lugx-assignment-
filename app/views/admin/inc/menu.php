<div class="container position-absolute" style="left:0;top:10">
    <div class="row">
        <div class="col-md-3">
            <ul class="nav flex-column nav-pills">
                <li class="nav-item">
                    <a class="nav-link <?php if($data['page']=='QuanLySP'??'') echo 'custom-active'  ?>" data-toggle="pill" href="<?=URLROOT?>/Admin/QuanLySP">Quản lý Sản Phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($data['page']=='LoaiSP'??'') echo 'custom-active'  ?>" data-toggle="pill" href="<?=URLROOT?>/Admin/LoaiSP">Danh mục thể loại</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($data['page']=='Hang'??'') echo 'custom-active'  ?>" data-toggle="pill" href="<?=URLROOT?>/Admin/Hang">Hãng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($data['page']=='Users'??'') echo 'custom-active'  ?>" data-toggle="pill" href="<?=URLROOT?>/Admin/Users">Danh sách người dùng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($data['page']=='DonHang'??'') echo 'custom-active'  ?>" data-toggle="pill" href="<?=URLROOT?>/Admin/DonHang">Đơn Hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($data['page']=='QuanLyCMT'??'') echo 'custom-active'  ?>" data-toggle="pill" href="<?=URLROOT?>/Admin/QuanLyCMT">Bình Luận</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger" href="#">Chào <?=$_SESSION['un']??''?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../" target="public">Public</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="thoat.php">Thoát</a>
                </li>
            </ul>
        </div>
    </div>
</div>