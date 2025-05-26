<?php require APPROOT.'/views/inc/header.php'?>
<div class="danhmuc" id="sidebar">
    <div class="customm">
        <img src="<?=URLROOT?>/img/ic_brands_horz_kfm.svg" alt="">
    </div>
    <div class="kfruit">
        <div class="mr-"><img src="<?=URLROOT?>/img/iconDanhMuc.svg" alt=""></div>
        <div class="contai nvc">
            <div class="account acc ee">
                Danh mục
            </div>
            <div class="login acc pp">
                KFruit
            </div>

        </div>
    </div>
    <div class="sidebar">

        <ul>
            <?php foreach ($data['typeProducts'] as $sanpham) {?>
            <li>
                <a href="<?=URLROOT?>/pages/danhmuc/<?=$sanpham['id_Loai']?>">
                    <div class="nv-c"><img src="<?=URLROOT?>/img/<?=$sanpham['HinhAnh']?>" alt="">
                        <p class="clamp-text"><?=$sanpham['TenLoai']?></p>
                    </div>
                </a>
            </li>
            <?php } ?>
            <!-- Thêm các mục danh sách khác nếu cần -->
        </ul>

    </div>

</div>
<div class="grid-container" style="height: 100vh;">
    <?php foreach( $data['products'] as $sanpham ){ ?>
        <div class="md2">
            <a href="<?=URLROOT?>/pages/Product/<?=$sanpham['id_SP']?>">
                <img src="<?=URLROOT?>/img/<?=$sanpham['HinhAnh']?>" alt="">
            </a>
            <div class="sale-tt">
                <p><?=$sanpham['Gia']?>₫</p>
                <button onclick="themGioHang(<?=$sanpham['id_SP']?>)">Thêm Giỏ Hàng</button></a>
            </div>
            <div class="tietkiem">
                <p>Tiết kiệm 3k</p>
                <e><?=$sanpham['MoTa']?></e>
            </div>
        </div>
    <?php } ?>
</div>

<?php require APPROOT.'/views/inc/footer.php'?>
