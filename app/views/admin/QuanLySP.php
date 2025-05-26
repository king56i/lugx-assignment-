<div class="container">
    <h2 class="py-2 text-center h2 mt-3">QUẢN LÝ SẢN PHẨM</h2>
    <table class="table table-hover table-bordered">
    <thead style="background-color: #43dd8b;color:white" >
        <tr>
            <th>Tên Sản Phẩm</th>
            <th>Hình Ảnh</th>
            <th>Tên Loại</th>
            <th>Tên Hãng</th>
            <th>Giá</th>
            <th>Giá Gốc</th>
            <th>Mô Tả</th>
            <th>Người Tạo</th>
            <th colspan="2">
            <a class="btn btn-success" href="<?=URLROOT?>/admin/QuanLySPForm">Thêm Mới</a>
            </th>            
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($data['products'] as $item) {
                echo "<tr>
                        <td>$item[TenSP]</td>
                        <td><img src='".URLROOT."/images/$item[HinhAnh]' style='width:150px;margin:0 auto'/></td>
                        <td>$item[TenLoai]</td>
                        <td>$item[TenHang]</td>
                        <td class='Gia'>$item[Gia]₫</td>
                        <td class='Gia'>$item[GiaGoc]₫</td>
                        <td>$item[MoTa]</td>
                        <td>$item[Uid]</td>
                        <td style=\"width:60px\"><a href='".URLROOT."/admin/QuanLySPForm/".$item['id_SP']."'><button class=\"btn btn-success\">Sửa</button></a></td>
                        <td style=\"width:60px\"><button class=\"btn btn-success\" onclick='deletePD($item[id_SP])'>Xóa</button></td>
                    </tr>";
            }
        ?>
    </tbody>
</table>
</div>
<script>
     deletePD=(id)=>{
         let check=confirm("Bạn có chắc chắn xóa không ??")
         console.log(id);
       if(check){
         $.post("<?=URLROOT?>/admin/xoaSP", {'id_SP':id}, (data)=>{
            if(data== 0) location.reload();          
            else console.log(data);    
         })
       }
     }
 </script>