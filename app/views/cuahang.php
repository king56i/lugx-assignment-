<?php require('inc/header.php');?>
  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3>Sản phẩm</h3>
          <span class="breadcrumb"><a href="#">Trang chủ</a> > Sản phẩm</span>
        </div>
      </div>
    </div>
  </div>

  <div class="section trending">
    <div class="san-pham">
      <ul class="trending-filter">
        <li>
          <?php foreach ($data['typeProducts'] as $loaisp) {?>
            <li>
                <a href="<?=URLROOT?>/pages/danhmuc/<?=$loaisp['id_Loai']?>">
                    <div class="nv-c">
                        <img src="<?=URLROOT?>/images/<?=$loaisp['HinhAnh']?>" height="25px" alt="">
                        <p class="clamp-text"><?=$loaisp['TenLoai']?></p>
                    </div>
                </a>
            </li>
            <?php } ?>
        </li>
      </ul>
      <div class="grid-container2">
        <?php foreach ($data['productsBrandType'] as $sanpham) {?>
          <div class="grid-items">
            <div class="item">
              <div class="thumb">
                <a href="product-details.html"><img src="<?=URLROOT?>/images/<?=$sanpham['HinhAnh']?>" alt=""></a>
                <span class="price"><em class="Gia"><?=$sanpham['GiaGoc']?>đ</em><span class="Gia"><?=$sanpham['Gia']?>đ</span></span>
              </div>
              <div class="down-content">
                <span class="category"><?=$sanpham['TenLoai']?></span>
                <h4><?=$sanpham['TenSP']?></h4>
                <a href="product-details.html"><i class="fa fa-shopping-bag"></i></a>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
  <?php require('inc/footer.php');?>