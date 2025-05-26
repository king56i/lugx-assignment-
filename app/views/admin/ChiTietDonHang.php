<div class="container">
    <h2 class="py-2 text-center h2 mt-3">CHI TIẾT ĐƠN HÀNG</h2>
    <table class="table table-hover table-bordered">
    <thead  style="background-color: #43dd8b;color:white" >
        <tr>
            <th>Mã Đơn Hàng</th>
            <th>Tên Sản Phẩm</th>
            <th>Ảnh Sản Phẩm</th>
            <th>Số Lượng</th>
            <th>Đơn Giá</th>
            <th>Tổng Số Tiền</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($data['OrderDetails'] as $item) {
                echo "<tr>
                        <td>$item[MaDonHang]</td>
                        <td>$item[TenSP]</td>
                        <td><img src='".URLROOT."/images/$item[HinhAnh]' style='width:150px;margin:0 auto'/></td>
                        <td>$item[SoLuong]</td>
                        <td>$item[DonGia]</td>
                        <td>$item[TongSoTien]</td>
                    </tr>";
            }
        ?>
    </tbody>
</table>
</div>