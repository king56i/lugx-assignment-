<div class="container">
    <h2 class="py-2 text-center h2 mt-3">QUẢN LÝ LOẠI</h2>
    <table class="table table-hover table-bordered">
    <thead  style="background-color: #43dd8b;color:white" >
        <tr>
            <th>Tên Thể Loại</th>
            <th>Hình Ảnh</th>
            <th>Ẩn Hiện</th>
            <th>Mô Tả</th>
            <th>Người Tạo</th>
            <th colspan="2">
            <a class="btn btn-success" href="<?=URLROOT?>/admin/LoaiSPForm">Thêm Mới</a>
            </th>            
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($data['typeProducts'] as $item) {
                echo "<tr>
                        <td>$item[TenLoai]</td>
                        <td><img src='".URLROOT."/images/$item[HinhAnh]' style='width:150px;margin:0 auto'/></td>
                        <td>$item[AnHien]</td>
                        <td>$item[MoTa]</td>
                        <td>$item[Uid]</td>
                        <td style=\"width:60px\"><a href='".URLROOT."/admin/LoaiSPForm/".$item['id_Loai']."'><button class=\"btn btn-success\">Sửa</button></a></td>
                        <td style=\"width:60px\"><button class=\"btn btn-success\" onclick='deleteLSP($item[id_Loai])'>Xóa</button></td>
                    </tr>";
            }
        ?>
    </tbody>
</table>
</div>
<script>
     deleteLSP=(id)=>{
         let check=confirm("Bạn có chắc chắn xóa không ??")
         console.log(id);
       if(check){
         $.post("<?=URLROOT?>/admin/xoaLSP", {'id_Loai':id}, (data)=>{
            if(data== 0) location.reload();          
            else console.log(data);    
         })
       }
     }
 </script>