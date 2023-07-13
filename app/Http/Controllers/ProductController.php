<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\PDF;

class ProductController extends Controller
{
    private $sanpham;
    private $danhmucsp;

    public function __construct(){
        $this->sanpham = new Product();
        $this->danhmucsp = new Category();
    }

    // lay all san pham
    public function index()
    {

        session()->put('active','productListView');

        $products =  $this->sanpham->getAllProduct();
        $productOutOfStock =  $this->sanpham->getProductOutOfStock();
        $categories = $this->danhmucsp->getAllCategory();
        // dd($products);

        return view('pages.product.productList',compact('products','categories','productOutOfStock'));
    }

    // 
    public function export_product()
    {
        $products =  $this->sanpham->getAllProduct();
        // dd($products);
        $pdf = PDF::loadView('pages.product.pdf.product', compact('products'));
        return $pdf->stream();
      //   return $pdf->download('pdf_dbUser.pdf');
    }

    // them san pham
    public function create()
    {

        session()->put('active','productAdd');

        $allCategories = $this->danhmucsp->getAllCategory();

        return view('pages.product.addProduct',compact('allCategories'));
    }

    public function store(ProductRequest $request)
    {

        // dd($request);
        // dd($request->file('thumbnail')->getClientOriginalName());

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

        $this->sanpham->addProduct($dataInsert);

        return redirect()->route('productList')->with('msgtrue', 'Thêm món thành công !!!');
    }

    // cap nhat thong tin san pham
    public function edit($id=0 , Request $request){ 
        if(!empty($id)){
            $allCategories = $this->danhmucsp->getAllCategory();

            $data = DB::table('sanpham')
            ->select('sanpham.*', 'danhmucsp.TenDMSP')
            ->where('IDSanPham',$id)
            ->leftJoin('danhmucsp', 'danhmucsp.IDDanhMucSP', '=', 'sanpham.IDDanhMucSP');
            $data = $data->get();

            // dd($data);

            if(!empty($data[0])){
                $request->session()->put('id', $id);
                // $data = $data[0];
            }else{
                return redirect()->route('productList')->with('msg', 'Món này không tồn tại trong thực đơn !!!');
            }
        }else{
            return redirect()->route('productList')->with('msg', 'Liên kết này không tồn lại !!!');
        }

        return view('pages.product.editProduct',compact('data', 'allCategories'));
     }
     

    public function update(ProductRequest $request)
    {
        // dd($request);
        $nameImg = $request->file('thumbnail')->getClientOriginalName();
        $id =  session('id');

        $dataUpdate = [
            'TenSP' => $request->name_product,
            'Gia' => $request->price_product,
            'HinhAnh' => $nameImg,
            'DonViTinh' => $request->unit_product,
            'MoTa' => $request->des_product,
            'IDDanhMucSP' => $request->categories,
        ];
        // dd($dataUpdate);

        $request->file('thumbnail')->storeAs('public/images', $nameImg);

        $request->file('thumbnail')->move(public_path('/images'), $nameImg);

        $this->sanpham->updateProduct($dataUpdate, $id);

        return redirect()->route('productList')->with('msgtrue', 'Cập nhật sản phẩm thành công !!!');
    }


    // xoa san pham 
    public function delete($id)
    {
        $data =  DB::table('sanpham')->where('IDSanPham',$id);
        $data->delete();
        return redirect()->route('productList')->with('msgtrue', 'Đã xóa món ra khỏi thực đơn !!!');
    }

}
