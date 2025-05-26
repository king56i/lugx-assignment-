<?php require_once __DIR__.'/inc/header.php';?>
   <!-- Nav tabs -->
   <div class="container" style="margin-top:150px;height:100vh">
      <?php require_once __DIR__."/inc/menu.php";?>
      <!-- Tab panes -->
      <div class="tab-content">
         <div class="tab-pane active" id="">
            <?php require_once $data['page'].'.php' ?>
         </div>
      </div>
   </div>
<?php require_once __DIR__.'/inc/footer.php';?>
