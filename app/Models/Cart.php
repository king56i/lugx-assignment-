<?php
class Cart{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function addToCart($id_SP,$SoLuong){
        isset($_SESSION['Cart'][$id_SP]) ? $_SESSION['Cart'][$id_SP] += $SoLuong : $_SESSION['Cart'][$id_SP]=$SoLuong;
    }
    function updateCart($id_SP, $SoLuong) {
        if (isset($_SESSION['Cart'][$id_SP])) {
            $_SESSION['Cart'][$id_SP] = $SoLuong;
        }
    }
    public function removeFromCart($id_SP){
        if(isset($_SESSION['Cart'][$id_SP])){
            unset($_SESSION['Cart'][$id_SP]);
        }
    }
    public function tangSoLuong($id_SP) {
        if (isset($_SESSION['Cart'][$id_SP])) {
            $_SESSION['Cart'][$id_SP]++;
        }
    }

    public function giamSoLuong($id_SP) {
        if (isset($_SESSION['Cart'][$id_SP])) {
            $_SESSION['Cart'][$id_SP]--;
        }
    }
}
?>
