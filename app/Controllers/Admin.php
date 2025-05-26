<?php 
class Admin extends Controller{
    private $productModel;
    private $commentModel;
    private $userModel;
    private $orderModel;
    public function __construct(){
        $this->productModel = $this->model('Product');
        $this->commentModel = $this->model('Comment');
        $this->userModel = $this->model('User');
        $this->orderModel = $this->model('DonHang');
    }
    public function index($page='QuanLySP'){
        $id_DonHang= $_GET['id_DonHang']??'';
        $productsBrandType = $this->productModel->productsBrandType();
        $typeProducts = $this->productModel->typeProducts();
        $brandProducts = $this->productModel->brandProducts();
        $Comments=$this->commentModel->getComments();
        $Users=$this->userModel->getUsers();
        $Orders=$this->orderModel->getOrders();
        if(isset($_SESSION['Uid'])){
            $user = $this->userModel->getUser($_SESSION['Uid']);
        }
        $OrderDetails = $this->orderModel->getOrderDetails($id_DonHang);
        $data =[
            'username'=>$user->HoTen??'',
            'title'=>'',
            'products'=>$productsBrandType,
            'typeProducts'=>$typeProducts,
            'page'=>$page,
            'Comments'=>$Comments,
            'brandProducts'=>$brandProducts,
            'Users'=>$Users,
            'Orders'=>$Orders,
            'OrderDetails'=>$OrderDetails??''
        ];
        $this->view('admin/index',$data);
    }
    public function QuanLySPForm($id_SP=null){
        $typeProducts = $this->productModel->typeProducts();
        $brandProducts = $this->productModel->brandProducts();
        if(isset($_POST['submit'])){
            $name = $_POST['name']??'';
            $HinhAnh=basename($_FILES['HinhAnh']['name']);
            $id_Loai = $_POST['id_Loai']??'';
            $id_Hang = $_POST['id_Hang']??'';
            $Gia = $_POST['Gia']??'';
            $GiaGoc = $_POST['GiaGoc']??'';
            $MoTa = $_POST['MoTa']??'';
            if($id_SP!=""){
                $this->productModel->updateProduct($id_SP,$name,$HinhAnh,$id_Loai,$id_Hang,$Gia,$GiaGoc,$MoTa,$_SESSION['Uid']);
            }else{
                $this->productModel->addProduct($name,$HinhAnh,$id_Loai,$id_Hang,$Gia,$GiaGoc,$MoTa,$_SESSION['Uid']);
            } 
            header('Location: '.URLROOT.'/admin/QuanLySP');
        }
        else if(isset($id_SP)){
            $product = $this->productModel->getProduct($id_SP);
        }
        $data = [
            "listLSP"=>$typeProducts,
            "listHSP"=>$brandProducts,
            "id_SP" => $id_SP,
            "TenSP" => isset($product->TenSP) ? $product->TenSP : '',
            "HinhAnh" => isset($product->HinhAnh) ? $product->HinhAnh : '',
            "LoaiSP" => isset($product->LoaiSP) ? $product->LoaiSP : '',
            "HangSP" => isset($product->HangSP) ? $product->HangSP : '',
            "Gia" => isset($product->Gia) ? $product->Gia : '',
            "GiaGoc" => isset($product->GiaGoc) ? $product->GiaGoc : '',
            "MoTa" => isset($product->MoTa) ? $product->MoTa : ''
        ];
        $this->view('admin/QuanLySPForm',$data);
    }
    public function xoaSP(){
        $id_SP=$_POST['id_SP']??"";
        if($id_SP!=""){
            $this->productModel->deleteProduct($id_SP);
            echo 0;
        }
        else {echo $id_SP;}
    }
    public function LoaiSPForm($id_Loai=null){
        if(isset($_POST['submit'])){
            $TenLoai = $_POST['TenLoai']??'';
            $AnHien = $_POST['AnHien']??0;
            $HinhAnh=basename($_FILES['HinhAnh']['name']);
            $MoTa = $_POST['MoTa']??'';
            $Urlloai = $_POST['Urlloai']??'';
            if($id_Loai!=""){
                $this->productModel->updateTypeProduct($id_Loai,$TenLoai,$HinhAnh,$AnHien,$MoTa,$Urlloai,$_SESSION['Uid']);
            }else{
                $this->productModel->addTypeProduct($TenLoai,$HinhAnh,$AnHien,$MoTa,$Urlloai,$_SESSION['Uid']);
            } 
            header('Location: '.URLROOT.'/admin/LoaiSP');
        }
        else if(isset($id_Loai)){
            $typeProduct = $this->productModel->typeProduct($id_Loai);
        }
        $data = [
            "id_Loai" => $id_Loai, 
            "TenLoai" => isset($typeProduct->TenLoai) ? $typeProduct->TenLoai : '',
            "HinhAnh" => isset($typeProduct->HinhAnh) ? $typeProduct->HinhAnh : '',
            "AnHien" => isset($typeProduct->AnHien) ? $typeProduct->AnHien : '',
            "MoTa" => isset($typeProduct->MoTa) ? $typeProduct->MoTa : '',
            "Urlloai" => isset($typeProduct->Urlloai) ? $typeProduct->Urlloai : ''
        ];
        $this->view('admin/LoaiSPForm',$data);
    }
    public function xoaLSP(){
        $id_Loai=$_POST['id_Loai']??"";
        if($id_Loai!=""){
            $this->productModel->deleteTypeProduct($id_Loai);
            echo 0;
        }
        else {echo $id_Loai;}
    }
    public function HangForm($id_Hang=null){
        if(isset($_POST['submit'])){
            $TenHang = $_POST['TenHang']??'';
            $AnHien = $_POST['AnHien']??0;
            $HinhAnh=basename($_FILES['HinhAnh']['name']);
            $MoTa = $_POST['MoTa']??'';
            $Urlhang = $_POST['Urlhang']??'';
            if($id_Hang!=""){
                $this->productModel->updateBrandProduct($id_Hang,$TenHang,$HinhAnh,$AnHien,$MoTa,$Urlhang,$_SESSION['Uid']);
            }else{
                $this->productModel->addBrandProduct($TenHang,$HinhAnh,$AnHien,$MoTa,$Urlhang,$_SESSION['Uid']);
            } 
            header('Location: '.URLROOT.'/admin/Hang');
        }
        else if(isset($id_Hang)){
            $brandProduct = $this->productModel->brandProduct($id_Hang);
        }
        $data = [
            "id_Hang" => $id_Hang, 
            "TenHang" => isset($brandProduct->TenHang) ? $brandProduct->TenHang : '',
            "HinhAnh" => isset($brandProduct->HinhAnh) ? $brandProduct->HinhAnh : '',
            "AnHien" => isset($brandProduct->AnHien) ? $brandProduct->AnHien : '',
            "MoTa" => isset($brandProduct->MoTa) ? $brandProduct->MoTa : '',
            "Urlhang" => isset($brandProduct->Urlhang) ? $brandProduct->Urlhang : ''
        ];
        $this->view('admin/HangForm',$data);
    }
    public function xoaHSP(){
        $id_Hang=$_POST['id_Hang']??"";
        if($id_Hang!=""){
            $this->productModel->deleteBrandProduct($id_Hang);
            echo 0;
        }
        else {echo $id_Hang;}
    }
    public function xoaDH(){
        $id_DonHang=$_POST['id_DonHang']??"";
        if($id_DonHang!=""){
            $this->orderModel->deleteOrder($id_DonHang);
            echo 0;
        }
        else {echo $id_DonHang;}
    }
    public function DuyetDH(){
        $id_DonHang=$_POST['id_DonHang']??"";
        if($id_DonHang!=""){
            $this->orderModel->duyetOrder($id_DonHang);
            echo 0;
        }
        else {echo $id_DonHang;}
    }
}
?>