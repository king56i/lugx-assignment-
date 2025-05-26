<footer style="margin-top:100vh">
    <div class="container">
      <div class="col-lg-12">
        <p>Copyright © 2048 LUGX Gaming Company. All rights reserved. &nbsp;&nbsp; <a rel="nofollow" href="https://templatemo.com" target="_blank">Design: TemplateMo</a></p>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <script>
  Array.from(document.querySelectorAll('.Gia'), element =>{ 
      element.textContent = parseFloat(element.textContent.slice(0, -1)).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' })
  });
      Array.from(document.querySelectorAll('.add-to-cart-btn'), element => element.addEventListener('click',function(event){
          event.preventDefault();
          let id_SP = this.getAttribute('data-product-id');
          let xhr = new XMLHttpRequest();
          xhr.open('POST', '<?=URLROOT?>/Pages/Cart', true);
          xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
          xhr.onload = function() {
              if (xhr.status >= 200 && xhr.status < 300) {
                  alert('Sản phẩm đã được thêm vào giỏ hàng thành công!');
              } else {
                  alert('Đã xảy ra lỗi khi thêm sản phẩm vào giỏ hàng.');
              }
          };
          xhr.onerror = function() {
              alert('Đã xảy ra lỗi khi thực hiện yêu cầu.');
          };
          xhr.send('id_SP='+id_SP);
      }))
  </script>
  <!-- Bootstrap core JavaScript -->
  <script src="<?=URLROOT?>/vendor/jquery/jquery.min.js"></script>
  <script src="<?=URLROOT?>/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?=URLROOT?>/js/isotope.min.js"></script>
  <script src="<?=URLROOT?>/js/owl-carousel.js"></script>
  <script src="<?=URLROOT?>/js/counter.js"></script>
  <script src="<?=URLROOT?>/js/custom.js"></script>

  </body>
</html>