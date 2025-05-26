<?php require APPROOT.'/views/inc/header.php';
?>
<div class="flex-container">
        <div class="md2 tieu-de">
                <span style="flex:2;text-align:start">Sản Phẩm</span>       
                <span>Giá</span>       
                <span>Tổng Cộng</span>       
                <span>Số Lượng</span>  
                <span></span>       
        </div>
    <?php 
        if(isset($_SESSION['Cart'])){ 
            if(count($_SESSION['Cart'])>0){ 
        foreach ($data['products'] as $sanpham) { ?>
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
                <a href="<?=URLROOT?>/Pages/Cart?tru=<?=$sanpham->id_SP?>">-</a>
                <e><?=$sanpham->SoLuong?></e>
                <a href="<?=URLROOT?>/Pages/Cart?cong=<?=$sanpham->id_SP?>">+</a>
            </div>
            <div class="tietkiem" style="text-align:center">
                <a href="<?=URLROOT?>/Pages/Cart/<?=$sanpham->id_SP?>">Xóa</a>
            </div>
        </div>
        <?php }
        } else{
        echo "<div class='gio-hang-trong'><span>Giỏ Hàng Của Bạn Trống</span></div>";
        } }?> 
        <div class="md3">
            <p>Tổng Tiền: <span id="tong-tien" class="Gia"></span></p>       
            <a href="<?=URLROOT?>/pages/DatHang"><button>Thanh Toán</bbutton></a>
        </div>
</div>
<script>
    document.querySelector('#tong-tien').textContent = Array.from(document.querySelectorAll('.tong-cong')).reduce((tongTien,element)=>tongTien+parseFloat(element.textContent.slice(0,-1)),0)+'đ';
</script>
<script src="<?=URLROOT?>/js/background-image.js"></script>
<?php require APPROOT.'/views/inc/footer.php'?>
