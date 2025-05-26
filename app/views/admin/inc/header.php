<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title><?=$data['title']??''?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?=URLROOT?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="<?=URLROOT?>/css/fontawesome.css">
    <link rel="stylesheet" href="<?=URLROOT?>/css/templatemo-lugx-gaming.css">
    <link rel="stylesheet" href="<?=URLROOT?>/css/style.css">
    <link rel="stylesheet" href="<?=URLROOT?>/css/owl.css">
    <link rel="stylesheet" href="<?=URLROOT?>/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
<!--

TemplateMo 589 lugx gaming

https://templatemo.com/tm-589-lugx-gaming

-->
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky" style="background-image: url('<?=URLROOT?>/images/banner-bg.jpg');padding:20px 0;position:static">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="<?=URLROOT?>" class="logo">
                        <img src="<?=URLROOT?>/images/logo.png" alt="" style="width: 158px;">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                      <li><a href="<?=URLROOT?>" <?php if(isset($data['title']) ? $data['title']=='Trang chủ':'admin') echo "class='active'"?>>Trang Chủ</a></li>
                      <li><a href="<?=URLROOT?>/pages/cuaHang" <?php if(isset($data['title']) ? $data['title']=='Cửa Hàng':'admin') echo "class='active'"?>>Cửa hàng</a></li>
                      <li><a href="#" <?php if(isset($data['title']) ? $data['title']=='Thông Tin':'admin') echo "class='active'"?>>Thông tin</a></li>
                      <li><a href="contact.html" <?php if(isset($data['title']) ? $data['title']=='Liên Hệ':'admin') echo "class='active'"?>>Liên hệ</a></li>
                      <?php if ( isset($_SESSION['username']) || isset($_SESSION["Uid"]) ) { ?>
                      <li><a class='btn btn-dark py-1 px-2' style="background-color:transparent">Chào <?= $data['username'] ?? "" ?></a> &nbsp; <li>
                      <li><a class="btn btn-secondary ml-3 py-1 px-3" style="background-color:transparent" href="<?=URLROOT?>/pages/thoat">Thoát</a></li>
                    <?php } ?>   
                    <?php if ( !isset($_SESSION['username']) && !isset($_SESSION["Uid"]) ) { ?>
                      <li><a href="<?=URLROOT?>/pages/register" <?php if($data['title']=='Đăng ký') echo "class='active'"?>>Đăng Ký</a></li>
                    <?php } ?>
                  </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>