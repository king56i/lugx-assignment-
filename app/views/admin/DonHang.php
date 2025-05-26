<div class="container">
    <h2 class="py-2 text-center h2 mt-3">QUẢN LÝ ĐƠN HÀNG</h2>
    <table class="table table-hover table-bordered">
    <thead  style="background-color: #43dd8b;color:white" >
        <tr>
            <th>Mã Đơn Hàng</th>
            <th>Tên Khách Hàng</th>
            <th>Số Lượng</th>
            <th>Ngày Đặt Hàng</th>
            <th>Trạng Thái</th>
            <th>Địa Chỉ</th>
            <th>Tổng Số Tiền</th>
            <th>Chi Tiết</th>
            <th colspan="2">Tác Vụ</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($data['Orders'] as $item) {
                echo "<tr>
                        <td>$item[id_DonHang]</td>
                        <td>$item[TenKhachHang]</td>
                        <td>$item[SoLuong]</td>
                        <td>$item[ngayDatHang]</td>
                        <td>".($item["status"] == 0 ? 'Chờ xử lý': 'Đã Duyệt') ."</td>
                        <td>$item[DiaChi]</td>
                        <td>$item[TongSoTien]</td>
                        <td style=\"width:60px\"><a href='".URLROOT."/admin/ChiTietDonHang?id_DonHang=".$item['id_DonHang']."'><button class=\"btn btn-success\">Xem Chi Tiết</button></a></td>
                        <td style=\"width:60px\"><button class=\"btn btn-success\" onclick='DuyetDH($item[id_DonHang])'>Duyệt</button></td>
                        <td style=\"width:60px\"><button class=\"btn btn-success\" onclick='deleteDH($item[id_DonHang])'>Xóa</button></td>
                    </tr>";
            }
        ?>
    </tbody>
</table>
</div>
<script>
     DuyetDH=(id)=>{
         let check=confirm("Duyệt Đơn Hàng Này?")
         console.log(id);
       if(check){
         $.post("<?=URLROOT?>/admin/DuyetDH", {'id_DonHang':id}, (data)=>{
            if(data== 0) location.reload();          
            else console.log(data);    
         })
       }
     }
     deleteDH=(id)=>{
         let check=confirm("Bạn có chắc chắn xóa không ??")
         console.log(id);
       if(check){
         $.post("<?=URLROOT?>/admin/xoaDH", {'id_DonHang':id}, (data)=>{
            if(data== 0) location.reload();          
            else console.log(data);    
         })
       }
     }
 </script>