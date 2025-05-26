<?php require APPROOT.'/views/inc/header.php'?>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:wght@500&family=Open+Sans:wght@500&family=Poppins:wght@500;600;700;800;900&display=swap');
      </style>
<div class="login-">
    <div class="login-ppp">
    <div class="logo_login tt1-pp">
        <img src="../img\Logo_Login.svg" alt="">
    </div>
    <div class="tt1-pp tt-h">Nhập Email và Mật Khẩu để đăng Nhập</div>
    <form action="<?=URLROOT?>/Users/login" method="post">
        <div class="email tt1-pp">
            <label for="Email"><ion-icon name="mail"></ion-icon></label>
            <input type="email" class="" name="Email" placeholder="Nhập Email" required>
        </div>
        <div class="pass tt1-pp">
            <label for="MatKhau"><ion-icon name="lock-closed"></ion-icon></label>
            <input type="Password" name="MatKhau" placeholder="Nhập mật khẩu" required id="input_">
        <br>
        </div>
        <div id="submit" class="tt1-pp">
            <input type="submit" name="submit" value="Đăng nhập">
            <div class="box_r">
                <a href="<?=URLROOT?>/pages/register" id="register">Đăng Ký</a>
                <a href="<?=URLROOT?>/pages/quenMatKhau" id="forget">Quên Mật Khẩu</a>
            </div>
        </div>
    </form>
    </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script>
        document.querySelector('header').style.backgroundImage="url('http://localhost/assignment2/images/banner-bg.jpg')";
        document.querySelector('header').style.padding="20px 0";
        document.querySelector('header').style.position="static";
    </script>
<?php require APPROOT.'/views/inc/footer.php'?>
