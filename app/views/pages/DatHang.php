<?php require APPROOT.'/views/inc/header.php'?>
<?php if(isset($data['datHangThanhCong'])) { echo '<div class="dat-hang-thanh-cong">'.$data["datHangThanhCong"].'</div>';} else{ ?>

<div class="dat-hang-container">
    <div class="flex-container">
        <?php if(isset($_SESSION['Cart'])){ 
            echo'<div class="md2 tieu-de">
                    <span style="flex:2;text-align:start">Sản Phẩm</span>       
                    <span>Giá</span>       
                    <span>Tổng Cộng</span>       
                    <span>Số Lượng</span>  
                </div>';
          ?>
        <?php foreach ($data['products'] as $sanpham) { ?>
            <div class="md2"   style="text-align:center">
                <div class="sale-tt" style="flex:2;gap:10px">
                    <img src="<?=URLROOT?>/images/<?=$sanpham->HinhAnh?>" alt="">
                    <p style="color: #717171;font-size:20px;line-height:20px"><?=$sanpham->TenSP?></p>
                </div>
                <div class="sale-tt" wid="100%" style="text-align:center">
                    <p style="color:#717171;display:block;text-align:center;margin:0 auto" class="Gia"><?=$sanpham->Gia?>₫</p>
                </div>
                <div class="sale-tt" wid="100%" style="text-align:center">
                    <p style="color:#717171;display:block;text-align:center;margin:0 auto" class="Gia tong-cong"><?=$sanpham->Gia * $sanpham->SoLuong?>₫</p>
                </div>
                <div class="tietkiem" style="text-align:center">
                    <e><?=$sanpham->SoLuong?></e>
                </div>
            </div>
        <?php }
        } else{
            echo "<div class='gio-hang-trong'><span>Giỏ Hàng Của Bạn Trống</span></div>";
        } ?>
    </div>
    <div class="dat-hang">
        <form action="<?=URLROOT?>/pages/DatHang" id="form-dat-hang" method="POST">
            <div class="tieu-de">Thông Tin Khách Hàng</div>
            <label for="HoTen">Họ Tên:</label>
            <input type="text" disabled name="HoTen" value="<?=$data['username']?>"/>
            <label for="SoDienThoai">Số Điện Thoại:</label>
            <input type="text" disabled name="SoDienThoai" value="<?=$data['SoDienThoai']?>">
            <label for="Email">Email:</label>
            <input type="text" disabled name="Email" value="<?=$data['Email']?>">
            <label for="DiaChi">Địa Chỉ:</label>
            <input type="textarea" name="DiaChi">
            <input type="submit" value="Đặt Hàng" style="background-color: #43dd8b;" name="btn-dat-hang">
        </form>
    </div>
</div>
<?php }?>
<script>
    document.querySelector('#tong-tien').textContent = Array.from(document.querySelectorAll('.tong-cong')).reduce((tongTien,element)=>tongTien+parseFloat(element.textContent.slice(0,-1)),0)+'đ';
</script>
<script src="<?=URLROOT?>/js/background-image.js"></script>
<?php require APPROOT.'/views/inc/footer.php'?>
