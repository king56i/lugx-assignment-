<?php require APPROOT.'/views/inc/header.php'?>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:wght@500&family=Open+Sans:wght@500&family=Poppins:wght@500;600;700;800;900&display=swap');
      </style>
    <div class="register login-">
        <div class="login-ppp">
            <div class="logo_register">
                <img src="../img\Logo_Login.svg" alt="">
            </div>
            <div class="tt1-pp tt-hh">Nhập đầy đủ thông tin đăng ký</div>
            <form action="<?=URLROOT?>/Users/register" method="post">
                <div class="hoten_register tt1-pp">
                    <label for="HoTen"><ion-icon name="person"></ion-icon></label>
                    <input type="text" name="HoTen" id="" placeholder="Họ và Tên">
                </div>
                <div class="email_register tt1-pp">
                    <label for="Emai"><ion-icon name="mail"></ion-icon></label>
                    <input type="email" name="Email" id="" placeholder="Nhập Email">
                </div>
                <div class="tel_register tt1-pp">
                    <label for="SoDienThoai"><ion-icon name="call"></ion-icon></label>
                    <input type="tel" id="" name="SoDienThoai" pattern="[0-9]{10}" required title="Số Điện Thoại Không Tồn Tại" placeholder="Số Điện Thoại">
                </div>
                <div class="pass_register tt1-pp">
                    <label for="matKhau"><ion-icon name="lock-closed"></ion-icon></label>
                    <input type="password" name="MatKhau" placeholder="Nhập mật khẩu" required>
                </div>
                <div class="pass_register tt1-pp">
                    <label for="confirm_password"><ion-icon name="lock-closed"></ion-icon></label>
                    <input type="password" name="confirm_password" placeholder="Nhập lại mật khẩu" required>
                </div>
                <!-- <label for="HinhAnh">HinhAnh</label>
                <input type="file" name="HinhAnh" id=""> -->
                <div id="submit_register" class="tt1-pp">
                    <input type="submit" name="submit" value="Đăng ký" id="button_re">
                    <a href="<?=URLROOT?>/Pages/login" id="login_regi">Đăng nhập</a>
                
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
