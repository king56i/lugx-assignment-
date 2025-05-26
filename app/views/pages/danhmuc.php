<?php require APPROOT.'/views/inc/header.php'?>
<h1 style="text-align:center"><?=$data['tendanhmuc']?></h1>
<div class="danhmuc" id="sidebar">
    <div class="lugx">
        <div class="mr-"><img src="<?=URLROOT?>/images/logo.png" alt=""></div>
    </div>
    <div class="sidebar">

        <ul>
            <?php foreach ($data['typeProducts'] as $sanpham) {?>
            <li>
                <a href="<?=URLROOT?>/pages/danhmuc/<?=$sanpham['id_Loai']?>">
                    <div class="nv-c">
                        <img src="<?=URLROOT?>/images/<?=$sanpham['HinhAnh']?>" height="25px" alt="">
                        <p class="clamp-text"><?=$sanpham['TenLoai']?></p>
                    </div>
                </a>
            </li>
            <?php } ?>
            <!-- Thêm các mục danh sách khác nếu cần -->
        </ul>

    </div>

</div>  
    <?php if(!sizeof($data['danhmuc']) > 0 ){
        echo '<span id="danhmuc-sp" style="font-size:50px;opacity:0.3;display:block;margin:25% auto 0 auto;text-align:center">Không có sản phẩm ở đây !!</span>';
   }?>
<div class="grid-container" style="height: 100vh;width:80%">
    <?php  
    forEach($data['danhmuc'] as $sanpham){ ?>
    <div class="md2">
            <a href="<?=URLROOT?>/pages/Product/<?=$sanpham['id_SP']?>">
                <img src="<?=URLROOT?>/images/<?=$sanpham['HinhAnh']?>" alt="">
            </a>
            <div class="sale-tt">
                <p><?=$sanpham['Gia']?>₫</p>
                <button class='add-to-cart-btn' data-product-id="<?=$sanpham['id_SP']?>">Thêm Giỏ Hàng</button></a>
            </div>
            <div class="tietkiem">
                <p>Tiết kiệm 3k</p>
                <e><?=$sanpham['MoTa']?></e>
            </div>
        </div>
    <?php } ?>

</div>
<script>
        document.querySelector('header').style.backgroundImage="url('http://localhost/assignment2/images/banner-bg.jpg')";
        document.querySelector('header').style.padding="20px 0";
        document.querySelector('header').style.position="static";
        Array.from(document.querySelectorAll('.sidebar a'),(element) => element.addEventListener('click',(e)=> e.target.classList.toggle('dm-active')));
    </script>
<?php require APPROOT.'/views/inc/footer.php'?>
