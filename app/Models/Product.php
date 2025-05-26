<?php
class Product{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function typeProducts(){
        $this->db->query("SELECT * FROM loaisp");
        return $this->db->pdo_query();
    }
    public function typeProduct($idLoai){
        $this->db->query("SELECT * FROM loaisp WHERE id_Loai = $idLoai");
        return $this->db->pdo_query_one ();
    }
    public function brandProducts(){
        $this->db->query("SELECT * FROM hang");
        return $this->db->pdo_query();
    }
    public function brandProduct($idHang){
        $this->db->query("SELECT * FROM hang WHERE id_Hang = $idHang");
        return $this->db->pdo_query_one ();
    }
    public function getProducts(){
        $this->db->query("SELECT * FROM sanpham");
        return $this->db->pdo_query();
    }
    public function getProduct($id){
        $this->db->query("SELECT * FROM sanpham WHERE id_SP = $id");
        return $this->db->pdo_query_one();
    }
    
    public function addProduct($TenSP,$HinhAnh,$LoaiSP,$HangSP,$Gia,$GiaGoc,$MoTa,$Uid){
        $this->db->query("INSERT INTO sanpham(TenSP,HinhAnh,LoaiSP,HangSP,Gia,GiaGoc,MoTa,Uid) VALUES('$TenSP','$HinhAnh','$LoaiSP','$HangSP','$Gia','$GiaGoc','$MoTa','$Uid')");
        $this->db->execute();
    }
    public function addTypeProduct($TenLoai,$HinhAnh,$AnHien,$MoTa,$Urlloai,$Uid){
        $this->db->query("INSERT INTO loaisp(TenLoai,HinhAnh,AnHien,MoTa,Urlloai,Uid) VALUES('$TenLoai','$HinhAnh','$AnHien','$MoTa','$Urlloai','$Uid')");
        $this->db->execute();
    }
    public function addBrandProduct($TenHang,$HinhAnh,$AnHien,$MoTa,$Urlhang,$Uid){
        $this->db->query("INSERT INTO hang(TenHang,HinhAnh,AnHien,MoTa,Urlhang,Uid) VALUES('$TenHang','$HinhAnh','$AnHien','$MoTa','$Urlhang','$Uid')");
        $this->db->execute();
    }
    public function updateProduct($id_SP,$TenSP,$HinhAnh,$LoaiSP,$HangSP,$Gia,$GiaGoc,$MoTa){
        $this->db->query("UPDATE sanpham set TenSP='$TenSP',HinhAnh='$HinhAnh',LoaiSP='$LoaiSP',HangSP='$HangSP',Gia='$Gia',GiaGoc='$GiaGoc',MoTa='$MoTa' WHERE id_SP = $id_SP");
        $this->db->execute();
    }
    public function updateTypeProduct($id_Loai,$TenLoai,$HinhAnh,$AnHien,$MoTa,$Urlloai){
        $this->db->query("UPDATE loaisp set TenLoai='$TenLoai',HinhAnh='$HinhAnh',AnHien='$AnHien',MoTa='$MoTa',Urlloai='$Urlloai' WHERE id_Loai = $id_Loai");
        $this->db->execute();
    }
    public function updateBrandProduct($id_Hang,$TenHang,$HinhAnh,$AnHien,$MoTa,$Urlhang){
        $this->db->query("UPDATE hang set TenHang='$TenHang',HinhAnh='$HinhAnh',AnHien='$AnHien',MoTa='$MoTa',Urlhang='$Urlhang' WHERE id_Hang = $id_Hang");
        $this->db->execute();
    }
    public function deleteProduct($id_SP){
        $this->db->query("DELETE FROM sanpham WHERE id_SP =$id_SP");
        $this->db->execute();
    }
    public function deleteTypeProduct($id_Loai){
        $this->db->query("DELETE FROM loaisp WHERE id_Loai = $id_Loai");
        $this->db->execute();
    }
    public function deleteBrandProduct($id_Hang){
        $this->db->query("DELETE FROM hang WHERE id_Hang = $id_Hang");
        $this->db->execute();
    }
    public function productsBrandType(){
        $this->db->query("SELECT sanpham.*,loaisp.TenLoai,hang.TenHang FROM sanpham 
        INNER JOIN loaisp on sanpham.LoaiSP=loaisp.id_Loai
        INNER JOIN hang on sanpham.HangSP=hang.id_Hang");
        return $this->db->pdo_query();
    }
    public function productBrandType($id_SP){
        $this->db->query("SELECT sanpham.*,loaisp.TenLoai,hang.TenHang FROM sanpham 
        INNER JOIN loaisp on sanpham.LoaiSP=loaisp.id_Loai
        INNER JOIN hang on sanpham.HangSP=hang.id_Hang WHERE id_SP = $id_SP");
        return $this->db->pdo_query_one();
    }
    public function typesBrandProduct($id_Loai){
        $this->db->query("SELECT sanpham.*,loaisp.TenLoai,hang.TenHang FROM loaisp 
        INNER JOIN sanpham on loaisp.id_Loai=sanpham.LoaiSP
        INNER JOIN hang on sanpham.HangSP=hang.id_Hang WHERE id_Loai = $id_Loai");
        return $this->db->pdo_query();
    }
}
?>
