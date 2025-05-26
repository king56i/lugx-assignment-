
   <!-- Nav tabs -->
   <div class="container">
   <!-- Tab panes -->
    <div class="tab-content">
      <div class="tab-pane active" id="">  
      &nbsp;       
      <div class="container col-8 m-auto">
      <h2 class="py-2 text-center h4 ">Form</h2>
      <form action="<?=URLROOT?>/admin/UsersForm" method="post">
         <div class="form-line active">
               <label for="name">Tên:</label>
               <input type="text" name="name" class="form-control">
         </div>
         <div class="form-line">
               <label for="Email">Email:</label>
               <input type="text" name="Email" class="form-control">
         </div>
         <div class="form-line">
               <label for="SoDienThoai">Số Điện Thoại:</label>
               <input type="text" name="SoDienThoai" class="form-control">
         </div>
         <div class="form-line">
               <label for="MatKhau">Mật Khẩu:</label>
               <input type="text" name="MatKhau" class="form-control">
         </div>
         <button class="btn btn-success px-3 mt-3" name="submit">Lưu</button>
      </form>
      </div>
      </div> <!-- tab-pane-->
    </div>
   </div>