<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\PDF;

class DashboardController extends Controller
{
    private $sanpham;
    public function __construct(){
        $this->sanpham = new Product();
    }

    public function index()
    {      
        session()->put('active','dashboard');
        
        // thống kê theoo nhân viên
        $countOrder = DB::table('hoadon')
        ->select( 'IDNhanVien',
            // DB::raw('count(if(month(curdate()) = month(created_at), IDHoaDon, 0)) as orderD'),
            DB::raw('count(case when date(curdate()) = date(created_at) then 1 end) as orderD'),
            DB::raw('sum(if(date(curdate()) = date(created_at), TongTien, 0)) as MoneyD'),
            DB::raw('sum(if(month(curdate()) = month(created_at), TongTien, 0)) as MoneyM'))
        ->groupBy('IDNhanVien')
        ->get();

        // select top 5 đơn hàng mới nhất
        $topNewOrder = DB::table('hoadon')
        ->select('hoadon.*', 'thongtinnv.TenNV')
        ->join('nhanvien', 'hoadon.IDNhanVien', '=' , 'nhanvien.IDNhanVien')
        ->join('thongtinnv', 'nhanvien.IDThongTinNV', '=' , 'thongtinnv.IDThongTinNV')
        ->orderByDesc('created_at')
        ->take(5)
        ->get();


        // thong ke theo san pham
        $countProduct = DB::table('chitiethoadon')
        ->select(
            DB::raw('sum(if(date(curdate()) = date(created_at), SoLuong, 0)) as CountD'),
            DB::raw('sum(if(date(curdate()) = date(created_at), (SoLuong * Gia), 0)) as MoneyD'),
            DB::raw('sum(if(month(curdate()) = month(created_at), (SoLuong * Gia), 0)) as MoneyM'))
        // ->groupBy('IDNhanVien')
        ->get();

        // dd($countProduct);

        // top san pham bam chay
        $topProduct = DB::table('chitiethoadon')
        ->select( 'IDSanPham' ,DB::raw('count(SoLuong) as soluong'))
        ->groupBy('IDSanPham')
        ->orderByDesc('soluong')
        ->take(5)
        ->get();

        // dd($topProduct);

        // all sản phẩm
        $products =  $this->sanpham->getAllProduct();

        // tỏng danh thu tháng này, số lượng tháng  này 
        // đếm số hóa dơnd

        return view('pages.dashboard.dashboard', compact('countOrder', 'topNewOrder', 'countProduct','topProduct','products'));
    }


    public function export_dashboard_user()
    {
        // thống kê theoo nhân viên
        $countOrder = DB::table('hoadon')
        ->select( 'IDNhanVien',
            // DB::raw('count(if(month(curdate()) = month(created_at), IDHoaDon, 0)) as orderD'),
            DB::raw('count(case when date(curdate()) = date(created_at) then 1 end) as orderD'),
            DB::raw('sum(if(date(curdate()) = date(created_at), TongTien, 0)) as MoneyD'),
            DB::raw('sum(if(month(curdate()) = month(created_at), TongTien, 0)) as MoneyM'))
        ->groupBy('IDNhanVien')
        ->get();

        // dd($countOrder);

        // select top 5 đơn hàng mới nhất
        $topNewOrder = DB::table('hoadon')
        ->select('hoadon.*', 'thongtinnv.TenNV')
        ->join('nhanvien', 'hoadon.IDNhanVien', '=' , 'nhanvien.IDNhanVien')
        ->join('thongtinnv', 'nhanvien.IDThongTinNV', '=' , 'thongtinnv.IDThongTinNV')
        ->orderByDesc('created_at')
        ->take(5)
        ->get();

        // dd($topProduct);


        $pdf = PDF::loadView('pages.dashboard.pdf.dbUser', compact('countOrder', 'topNewOrder'));
      // download PDF file with download method
        return $pdf->stream();
    //   return $pdf->download('pdf_dbUser.pdf');
    }



    public function export_dashboard_product()
    {
        // thong ke theo san pham
        $countProduct = DB::table('chitiethoadon')
        ->select(
            DB::raw('sum(if(date(curdate()) = date(created_at), SoLuong, 0)) as CountD'),
            DB::raw('sum(if(date(curdate()) = date(created_at), (SoLuong * Gia), 0)) as MoneyD'),
            DB::raw('sum(if(month(curdate()) = month(created_at), (SoLuong * Gia), 0)) as MoneyM'))
        ->get();

        // dd($countProduct);

        // top san pham bam chay
        $topProduct = DB::table('chitiethoadon')
        ->select( 'IDSanPham' ,DB::raw('count(SoLuong) as soluong'))
        ->groupBy('IDSanPham')
        ->orderByDesc('soluong')
        ->take(5)
        ->get();

        // all sản phẩm
        $products =  $this->sanpham->getAllProduct();

        $pdf = PDF::loadView('pages.dashboard.pdf.dbProduct', compact('countProduct', 'topProduct','products'));
        return $pdf->stream();
      //   return $pdf->download('pdf_dbUser.pdf');
    }
}
