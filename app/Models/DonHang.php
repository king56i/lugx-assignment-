<?php
class DonHang{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function getOrders(){
        $this->db->query("SELECT donhang.*,users.HoTen as TenKhachHang FROM donhang
                        INNER JOIN users on donhang.id_Customer = users.Uid
                        ");
        return $this->db->pdo_query();
    }
    public function getOrder($id_DonHang){
        $this->db->query("SELECT * FROM donhang WHERE id_DonHang='$id_DonHang'");
        return $this->db->pdo_query_one();
    }
    public function addOrder($id_Customer,$SoLuong,$status,$DiaChi){
        $this->db->query("INSERT INTO donhang(id_Customer,SoLuong,status,DiaChi) VALUES('$id_Customer','$SoLuong','$status','$DiaChi')");
        $this->db->execute();
        $id_DonHang = $this->db->InsertId();
        return $id_DonHang;
    }
    public function deleteOrder($id_DonHang){
        $this->deleteOrderDetails($id_DonHang);
        $this->db->query("DELETE FROM donhang WHERE id_DonHang='$id_DonHang'");
        $this->db->execute();
    }
    public function deleteOrderDetails($id_DonHang){
        $this->db->query("DELETE FROM chitietdonhang WHERE id_DonHang='$id_DonHang'");
        $this->db->execute();
    }
    public function duyetOrder($id_DonHang){
        $this->db->query("UPDATE donhang SET status = 1 WHERE id_DonHang='$id_DonHang'");
        $this->db->execute();
    }
    public function getOrderDetails($id_DonHang){
        $this->db->query("SELECT chitietdonhang.*,donhang.id_DonHang as MaDonHang,sanpham.TenSP,sanpham.HinhAnh FROM chitietdonhang
        INNER JOIN donhang on chitietdonhang.id_DonHang = donhang.id_DonHang
        INNER JOIN sanpham on chitietdonhang.id_SP = sanpham.id_SP WHERE chitietdonhang.id_DonHang='$id_DonHang'");
        return $this->db->pdo_query();   
    }
    public function updateTotalPrice($id_DonHang,$TongSoTien){
        $this->db->query("UPDATE donhang SET TongSoTien ='$TongSoTien' WHERE id_DonHang = '$id_DonHang'");
        $this->db->execute();
    }
    public function getOrderDetail($id_ChiTietDonHang){
        $this->db->query("SELECT * FROM chitietdonhang WHERE id_ChiTietDonHang='$id_ChiTietDonHang'");
        return $this->db->pdo_query_one();
    }
    public function addOrderDetail($id_DonHang,$id_SP,$SoLuong,$DonGia,$TongSoTien){
        $this->db->query("INSERT INTO chitietdonhang(id_DonHang,id_SP,SoLuong,DonGia,TongSoTien) VALUES('$id_DonHang','$id_SP','$SoLuong','$DonGia','$TongSoTien')");
        $this->db->execute();
    }
    public function deleteOrderDetail($id_ChiTietDonHang){
        $this->db->query("DELETE FROM chitietdonhang WHERE id_ChiTietDonHang='$id_ChiTietDonHang'");
        $this->db->execute();
    }
}