<?php require_once __DIR__.'/inc/header.php';?>

<div class="container position-static" style="height:80vh;margin-top:20%">
      <!-- Tab panes -->
      <div class="tab-content">
            <div class="tab-pane active" id="">  
                  &nbsp;       
                  <div class="container col-8 m-auto">
                  <h2 class="py-2 text-center h4 ">Hãng</h2>
                  <form action="<?=URLROOT?>/admin/HangForm/<?=$data['id_Hang']??""?>" method="post" enctype="multipart/form-data">
                        <div class="form-line active">
                              <label for="TenHang">Tên Hãng:</label>
                              <input type="text" name="TenHang" value="<?=$data['TenHang']??""?>" class="form-control">
                        </div>
                        <div class="form-line">
                              <label style="min-width:10px" for="HinhAnh">Hình Ảnh:</label>
                              <input type="file" name="HinhAnh" value="<?=$data['HinhAnh']??""?>"> 
                        </div>
                        <div class="form-line mt-2">
                              <label style="min-width:10px">Ẩn Hiện:</label>
                              <input type="radio" name="AnHien" value="0" checked> Ẩn
                              <input type="radio" name="AnHien" value="1"> hiện&nbsp; &nbsp;        
                        </div>
                        <div class="form-line">
                              <label for="MoTa">Mô tả:</label>
                              <input type="text" name="MoTa" value="<?=$data['MoTa']??""?>" class="form-control">
                        </div>
                        <div class="form-line">
                              <label for="Urlhang">Url:</label>
                              <input type="text" name="Urlhang" value="<?=$data['Urlhang']??""?>" class="form-control">
                        </div>
                        <button class="btn btn-success px-3 mt-3" name="submit">Lưu</button>
                  </form>
                  </div>
            </div> <!-- tab-pane-->
      </div>
</div>
<?php require_once __DIR__.'/inc/footer.php';?>
