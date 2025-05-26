<?php 

class User{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function getUsers(){
        $this->db->query("SELECT * FROM users");
        return $this->db->pdo_query();
    }
    public function getUser($id){
        $this->db->query("SELECT * FROM users WHERE Uid = '$id'");
        return $this->db->pdo_query_one();
    }
    public function getUserByEmail($Email){
        $this->db->query("SELECT * FROM users WHERE Email = '$Email'");
        return $this->db->pdo_query_one();
    }
    public function addUser($HoTen,$Email,$SoDienThoai,$MatKhau){
        $this->db->query("INSERT INTO users(HoTen, Email,SoDienThoai,MatKhau) VALUES ('$HoTen', '$Email','$SoDienThoai', '$MatKhau')");
        $this->db->execute();
    }
    public function deleteUser($Uid){
        $this->db->query("DELETE FROM users WHERE Uid = $Uid");
        $this->db->execute();
    }
    public function login($username, $password){
        $this->db->query("SELECT * FROM users WHERE username = :username AND password = :password");
        $this->db->bind(':username', $username);
        $this->db->bind(':password', $password);
        $this->db->execute();
    }
    public function xacNhanEmail($email,$token){
        $to = $email;
        $subject = "Yêu cầu đặt lại mật khẩu";
        $message = "Xin chào,\n\nBạn đã yêu cầu đặt lại mật khẩu. Nhấp vào liên kết sau để tiếp tục:\n\n ".URLROOT."/pages/doiMatKhau/".urlencode($token);
        $headers = "From: khoaledn56@gmail.com";
        if (mail($to, $subject, $message, $headers)) {
        } else {
        }
    }
    function generateToken($length = 32) {
        return bin2hex(random_bytes($length));
    }
    
    public function uidToken($Uid, $token) {
        $this->db->query("UPDATE users SET reset_token = '$token' WHERE Uid = '$Uid'");
        $this->db->execute();
    }
    public function doiMatKhau($matKhauMoi,$token){
        $this->db->query("UPDATE users SET MatKhau = '$matKhauMoi' WHERE reset_token = '$token'");
        $this->db->execute();
    }
    public function deleteOrder($id_DonHang){
        $this->db->query("DELETE FROM donhang WHERE id_DonHang = '$id_DonHang'");
        $this->db->execute();
    }
}
?>
