<?php
class Pages extends Controller{
    private $userModel;
    private $productModel;
    private $cartModel;
    private $orderModel;

    public function __construct(){
        $this->userModel = $this->model('User');
        $this->productModel = $this->model('Product');
        $this->orderModel = $this->model('DonHang');
        $this->cartModel = $this->model('Cart');
    }
    public function index(){
        $typeProducts = $this->productModel->typeProducts();
        $productsBrandType = $this->productModel->productsBrandType();
        if(isset($_SESSION['Uid'])){
            $user = $this->userModel->getUser($_SESSION['Uid']);
        }
        $data = [
            'username'=>$user->HoTen??'',
            'products'=>$productsBrandType,
            'typeProducts'=>$typeProducts,
            'title'=> 'Trang chủ',
        ];
        $this->view('asm',$data);
    }
    public function cuaHang($id_Loai=9){
        $typeProducts = $this->productModel->typeProducts();
        $Types = $this->productModel->typesBrandProduct($id_Loai);
        $Type = $this->productModel->typeProduct($id_Loai);
        $productsBrandType = $this->productModel->productsBrandType();
        $data =[
            'title'=>'Cửa Hàng',
            'tendanhmuc'=>'Danh mục '.$Type->TenLoai??'',
            'typeProducts'=>$typeProducts??'',
            'danhmuc'=>$Types??'',
            'productsBrandType'=>$productsBrandType??''
        ];
        $this->view('cuahang',$data);
    }
    public function login(){
        if(isset($_POST['submit'])){
            $Email = $_POST['Email']??"";
            $MatKhau = $_POST['MatKhau']??"";
            $user = $this->userModel->getUserByEmail($Email);
            if($user && $MatKhau == $user->MatKhau){
                if($user->group_id===1){
                    $_SESSION['username']=$user->HoTen;
                }
                $_SESSION['Uid'] = $user->Uid;
                header("Location: ".URLROOT);
            }    
        }
        $data=[         
            'title'=>'Đăng Nhập'
        ];
        $this->view('formdangnhap',$data);
    }
    public function register(){
        if(isset($_POST['submit'])){
            $HoTen = $_POST['HoTen']??"";
            $Email = $_POST['Email']??"";
            $SoDienThoai = $_POST['SoDienThoai']??"";
            $MatKhau = $_POST['MatKhau']??"";
            $confirm_password = $_POST['confirm_password']??"";
            // var_dump($HoTen);
            if($MatKhau==$confirm_password){
                $this->userModel->addUser($HoTen,$Email,$SoDienThoai,$MatKhau);
                header("Location: ".URLROOT."/pages/login");
            }
        }
        $data = [
            'title'=>'Đăng Ký'
        ];
        $this->view('formdangky',$data);
    }
    public function Product($id_SP=null){
        $product = $this->productModel->productBrandType($id_SP);
        $data = [
            'title'=>'Sản Phẩm',
            'id_SP'=>$product->id_SP,
            'anh'=>$product->HinhAnh,
            'TenSP'=>$product->TenSP??'',
            'LoaiSP'=>$product->TenLoai??'',
            'HangSP'=>$product->TenHang??'',
            'Gia'=>$product->Gia??'',
            'MoTa'=>$product->MoTa??''
        ];
        $this->view('pages/thongtinsp',$data);
    }
    public function GioHang(){
        $this->view('pages/GioHang');
    }
    public function TapChi(){
        $this->view('pages/TapChi');
    }
    public function thoat(){
        session_destroy();
        unset($_SESSION);
        header('Location: ' . URLROOT); 
    }
    public function danhmuc($id_Loai=null){
        $typeProducts = $this->productModel->typeProducts();
        $Types = $this->productModel->typesBrandProduct($id_Loai);
        $Type = $this->productModel->typeProduct($id_Loai);
        $data = [
            'tendanhmuc'=>'Danh mục '.$Type->TenLoai,
            'typeProducts'=>$typeProducts,
            'title'=>'Danh mục',
            'danhmuc'=>$Types??'',
        ];
        $this->view('pages/danhmuc',$data);
    }
    public function Cart($xoa=null){
        $products=[];
        if(isset($_SESSION['Uid'])) $user = $this->userModel->getUser($_SESSION['Uid']);
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $_SESSION['id_SP']=$_POST['id_SP'];
            if (isset($_SESSION['id_SP'])) $this->cartModel->addToCart($_SESSION['id_SP'],1);
        }
        if(isset($_SESSION['Cart'])){
            if(isset($_GET['cong'])){
                $this->cartModel->tangSoLuong($_GET['cong']);
            }else if(isset($_GET['tru'])){
                $this->cartModel->giamSoLuong($_GET['tru']);
                if($_SESSION['Cart'][$_GET['tru']] == 0){
                    $this->cartModel->removeFromCart($_GET['tru']);
                    unset($_SESSION['Cart']);
                } 
            }else if(isset($xoa)){
                $this->cartModel->removeFromCart($xoa);                
            }   
            foreach ($_SESSION['Cart'] as $id_SP => $SoLuong) {
                $product=$this->productModel->getProduct($id_SP);
                $product->SoLuong = $SoLuong??0;
                array_push($products, $product);
            }
        }
        $data=[
            'title'=>'Giỏ Hàng',
            'group_id'=>$user->group_id??'',
            'username'=>$user->HoTen??'',
            'products'=>$products
        ];
            unset($_SESSION['id_SP']);
        $this->view('pages/Cart',$data);
    }
    public function DatHang(){
        $products=[];
        if(isset($_SESSION['Uid'])) $user = $this->userModel->getUser($_SESSION['Uid']);
        if(isset($_SESSION['Cart'])){
            foreach ($_SESSION['Cart'] as $id_SP => $SoLuong) {
                $product=$this->productModel->getProduct($id_SP);
                $product->SoLuong = $SoLuong??0;
                array_push($products, $product);
            }
        }
        
        if(isset($_POST['btn-dat-hang'])){
            $DiaChi = $_POST['DiaChi']??'';
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $status=0;        
                if(isset($_SESSION['Uid'])){
                    if(isset($_SESSION['Cart'])) $id_DonHang = $this->orderModel->addOrder($_SESSION['Uid'],count($_SESSION['Cart']),$status,$DiaChi);
                    foreach ($_SESSION['Cart'] as $id_SP => $SoLuong) {
                        $product=$this->productModel->getProduct($id_SP);
                        $this->orderModel->addOrderDetail($id_DonHang,$id_SP,$SoLuong,$product->Gia,$product->Gia * $SoLuong);
                    }
                    $orderDetails = $this->orderModel->getOrderDetails($id_DonHang);
                    $totalPrice = 0;
                    foreach ($orderDetails as $detail) {
                        $totalPrice += $detail['TongSoTien'];
                    }
                    $this->orderModel->updateTotalPrice($id_DonHang, $totalPrice);
                    $datHangThanhCong = "Đặt Hàng Thành Công";
                    unset($_SESSION['Cart']);
                }else header('Location:'.URLROOT.'/users/login');
            }
        }
        $data=[
            'title'=>'Đặt Hàng',
            'group_id'=>$user->group_id??'',
            'username'=>$user->HoTen??'',
            'SoDienThoai'=>$user->SoDienThoai??'',
            'Email'=>$user->Email??'',
            'products'=>$products,
            'datHangThanhCong'=>$datHangThanhCong??null
        ];
        $this->view('pages/DatHang',$data);
    }
    public function quenMatKhau(){
        $users = $this->userModel->getUsers();
        if(isset($_POST['quenMatKhau'])){
            $Email = $_POST['Email']??'';
            foreach($users as $user){
                if($Email == $user['Email']){
                    $Uid = $user['Uid'];
                    $token = $this->userModel->generateToken();
                    $this->userModel->uidToken($Uid,$token);
                    $this->userModel->xacNhanEmail($Email,$token);
                }else{
                    $error_email = 'Bạn Chưa Đăng Ký Bằng Tài Khoản Này!';
                }
            }
        }
        $data=[
            'title'=>"Quên Mật Khẩu",
            'error_email' => $error_email??null
        ];
        $this->view('quenMatKhau',$data);
    }
    public function doiMatKhau($token = null){
        if(isset($_POST['xacNhan-btn'])){
            $matKhauMoi = $_POST['matKhauMoi']??'';
            $xacNhanMatKhauMoi = $_POST['xacNhanMatKhauMoi']??'';
            if($matKhauMoi == $xacNhanMatKhauMoi){
                $this->userModel->doiMatKhau($matKhauMoi,$token);
                header('Location:'.URLROOT.'/pages/login');
            }
        }
        $data=[
            'title'=>"Xác Nhận Email",
            'token'=> $token,
        ];
        $this->view('doiMatKhau',$data);
    }
}