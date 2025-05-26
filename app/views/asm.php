<?= require_once('inc/header.php');?>

  <!-- ***** Header Area End ***** -->

  <div class="main-banner">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="caption header-text">
            <h6>Shop game FPOLY</h6>
            <h2>Ưu đãi mùa winter sales !!!</h2>
            <p>Giảm giá những game hot tới 50%!!</p>
            <div class="search-input">
              <form id="search" action="#">
                <input type="text" placeholder="Type Something" id='searchText' name="searchKeyword" onkeypress="handle" />
                <button role="button">Tìm kiếm</button>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-4 offset-lg-2">
          <div class="right-image">
            <img src="<?=URLROOT?>/images/banner-image.jpg" alt="">
            <span class="price">$22</span>
            <span class="offer">-40%</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="features">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <a href="#">
            <div class="item">
              <div class="image">
                <img src="<?=URLROOT?>/images/featured-01.png" alt="" style="max-width: 44px;">
              </div>
              <h4>Tải tốc độ cao</h4>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6">
          <a href="#">
            <div class="item">
              <div class="image">
                <img src="<?=URLROOT?>/images/featured-02.png" alt="" style="max-width: 44px;">
              </div>
              <h4>Thông tin cá nhân</h4>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6">
          <a href="#">
            <div class="item">
              <div class="image">
                <img src="<?=URLROOT?>/images/featured-03.png" alt="" style="max-width: 44px;">
              </div>
              <h4>CSKH</h4>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6">
          <a href="#">
            <div class="item">
              <div class="image">
                <img src="<?=URLROOT?>/images/featured-04.png" alt="" style="max-width: 44px;">
              </div>
              <h4>Thanh toán dễ dàng</h4>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="section trending">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <h6>Phổ Biến</h6>
            <h2>Game phổ biến</h2>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="main-button">
            <a href="shop.html">Xem tất cả</a>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="item">
            <div class="thumb">
              <a href="product-details.html"><img src="<?=URLROOT?>/images/trending-01.jpg" alt=""></a>
              <span class="price"><em>$28</em>$20</span>
            </div>
            <div class="down-content">
              <span class="category">Game hành động</span>
              <h4>God Of War</h4>
              <a href="product-details.html"><i class="fa fa-shopping-bag"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="item">
            <div class="thumb">
              <a href="product-details.html"><img src="<?=URLROOT?>/images/trending-02.jpg" alt=""></a>
              <span class="price">$44</span>
            </div>
            <div class="down-content">
              <span class="category">Action</span>
              <h4>Alan Wake 2</h4>
              <a href="product-details.html"><i class="fa fa-shopping-bag"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="item">
            <div class="thumb">
              <a href="product-details.html"><img src="<?=URLROOT?>/images/trending-03.jpg" alt=""></a>
              <span class="price"><em>$64</em>$44</span>
            </div>
            <div class="down-content">
              <span class="category">Action</span>
              <h4>Call of Duty MW:II</h4>
              <a href="product-details.html"><i class="fa fa-shopping-bag"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="item">
            <div class="thumb">
              <a href="product-details.html"><img src="<?=URLROOT?>/images/trending-04.jpg" alt=""></a>
              <span class="price">$32</span>
            </div>
            <div class="down-content">
              <span class="category">Action</span>
              <h4>Call of Duty:MWIII</h4>
              <a href="product-details.html"><i class="fa fa-shopping-bag"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="section most-played">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <h6>TOP GAMES</h6>
            <h2>Most Played</h2>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="main-button">
            <a href="shop.html">View All</a>
          </div>
        </div>
        <?php foreach ($data['products'] as $item) {?>
          
          <div class="col-lg-2 col-md-6 col-sm-6">
            <div class="item">
              <div class="thumb">
                <a href="<?=URLROOT?>/pages/Product/<?=$item['id_SP']?>"><img src="<?=URLROOT?>/images/<?=$item['HinhAnh']?>" alt=""></a>
                </div>
                <div class="down-content">
                  <span class="category"><?=$item['TenLoai']?></span>
                  <h4><?=$item['TenSP']?></h4>
                  <div class="nut">
                    <a class="add-to-cart-btn" data-product-id="<?=$item['id_SP']?>">Cart</a>
                    <a href="<?=URLROOT?>/pages/Cart/<?=$item['id_SP']?>">Explore</a>
                  </div>
                </div>
            </div>
          </div>
                <?php } ?>
      </div>
    </div>
  </div>

  <div class="section categories">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="section-heading">
            <h6>Categories</h6>
            <h2>Top Categories</h2>
          </div>
        </div>
        <?php foreach ($data['typeProducts'] as $item) {?>
          
          <div class="col-lg col-sm-6 col-xs-12">
            <div class="item">
              <h4><?=$item['TenLoai']?></h4>
              <div class="thumb">
                <a href="<?=URLROOT?>/pages/danhmuc/<?=$item['id_Loai']?>"><img src="<?=URLROOT?>/images/<?=$item['HinhAnh']?>" alt=""></a>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
  
  <div class="section cta">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="shop">
            <div class="row">
              <div class="col-lg-12">
                <div class="section-heading">
                  <h6>Pre-order ngay!</h6>
                  <h2>Pre-order sớm để nhận quà <em>Và ưu đãi</em> Dành cho bạn!</h2>
                </div>
                <p>Lorem ipsum dolor consectetur adipiscing, sed do eiusmod tempor incididunt.</p>
                <div class="main-button">
                  <a href="shop.html">Mua Ngay</a>  
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5 offset-lg-2 align-self-end">
          <div class="subscribe">
            <div class="row">
              <div class="col-lg-12">
                <div class="section-heading">
                  <h6>Ưu đãi</h6>
                  <h2>Nhận ngay 1 coupon lên đến 100% <em>Cho lần đăng ký</em> Sớm!</h2>
                </div>
                <div class="search-input">
                  <form id="subscribe" action="#">
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your email...">
                    <button type="submit">Đăng Ký ngay!</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?= require_once('inc/footer.php');?>