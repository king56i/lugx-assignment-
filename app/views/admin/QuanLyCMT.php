<div class="container">
    <h2 class="py-2 text-center h2 mt-3">BÌNH LUẬN</h2>
    <table class="table table-hover table-bordered">
    <thead  style="color:white" >
        <tr>
            <th>Người Bình Luận:</th>
            <th>Nội Dung:</th>
            <th>Ngày Tạo:</th>           
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($data['Comments'] as $item) {
                echo "<tr>
                        <td>$item[Uid]</td>
                        <td>$item[NoiDung]</td>
                        <td>$item[NgayTao]</td>
                    </tr>";
            }
        ?>
    </tbody>
    </table>
</div>