<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\PDF;

class OrderController extends Controller
{
    private $hoadon;
    // private $chitiethoadon;
    private $sanpham;
    private $danhmuc;

    public function __construct()
    {
        $this->hoadon = new Order();
        $this->sanpham = new Product();
        $this->danhmuc = new Category();
    } 

    // lay all hoa don
    public function index()
    {
        session()->put('active','orderListView');

        $orders =  $this->hoadon->getAllOrder();

        // dd($orders);

        return view('pages.order.orderList', compact('orders'));
    }

    public function showDetail($id, Request $request)
    {
        // dd($id);
        if(!empty($id)){
            $data = $this->hoadon->getDetailOrder($id);
            $tongtien = 0;         
            // dd($data);
            if(!empty($data[0])){
                $request->session()->put('id', $id);
                // $data = $data[0];
            }else{
                return redirect()->route('orderList')->with('msg', 'Hóa đơn không tồn tại !!!');
            }
        }else{
            return redirect()->route('orderList')->with('msg', 'Liên kết này không tồn lại !!!');
        }

        return view('pages.order.orderDetail',compact('data', 'tongtien'));
    }

    public function export_orderdetail($id,Request $request)
    {
        $data = $this->hoadon->getDetailOrder($id);
        $tongtien = 0;
        $request->session()->put('id', $id);

        // dd($data);

        $pdf = PDF::loadView('pages.order.pdf.epOrderDetail', compact('data', 'tongtien'));
        return $pdf->stream();
      //   return $pdf->download('pdf_dbUser.pdf');
    }


    // them san pham
    public function create()
    {

        // dd(request()->key);

        $productOutOfStock =  $this->sanpham->getProductOutOfStock();
        $products = $this->sanpham->getAllProduct();
        $cates = $this->danhmuc->getAllCategory();

        if($key = request()->key){
            $products = DB::table('sanpham')
            ->join('danhmucsp', 'sanpham.IDDanhMucSP', '=', 'danhmucsp.IDDanhMucSP')
            ->where('sanpham.TenSP', 'like', '%'.$key.'%')
            ->get();
        }

        $data = DB::table('chitiethoadon')
        // ->select('hoadon.*', 'chitiethoadon.*', 'sanpham.*')
        ->join('hoadon', 'hoadon.IDHoaDon', '=' , 'chitiethoadon.IDHoaDon')
        ->join('sanpham', 'sanpham.IDSanPham', '=' , 'chitiethoadon.IDSanPham')
        // ->orderByDesc('hoadon.created_at')
        ->get();
        // $data = $data->get();

        // dd($data);
        return view('pages.order.order',compact('products', 'cates', 'data','productOutOfStock'));
    }

    public function store(Request $request)
    {
        $nameImg = $request->file('thumbnail')->getClientOriginalName();
        
        $dataInsert = [
            'TenSp' => $request->name_product,
            'Gia' => $request->price_product,
            'HinhAnh' => $nameImg,
            'DonViTinh' => $request->unit_product,
            'MoTa' => $request->des_product,
            'IDDanhMucSP' => $request->categories,
        ];
        
        $request->file('thumbnail')->storeAs('public/images', $nameImg);

        $request->file('thumbnail')->move(public_path('/images'), $nameImg);

        // $this->sanpham->addProduct($dataInsert);

        return redirect()->route('productList')->with('msgtrue', 'Thêm món thành công !!!');
    }

}
