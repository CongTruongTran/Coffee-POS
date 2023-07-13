<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    private $nhacungcap;

    public function __construct(){
        $this->nhacungcap = new Supplier();
    }

     // lay all nha cung cap
     public function index()
     {
        session()->put('active','supplierListView');

        $suppliers =  $this->nhacungcap->getAllSupplier();
 
        return view('pages.supplier.supplierList',compact('suppliers'));
     }

    // them nha cung cap

    public function create()
    {       
        session()->put('active','supplierAdd');

        return view('pages.supplier.addSupplier');
    }

    public function store(SupplierRequest $request)
    {

        // dd($request);

        $dataInsert = [
            'TenNhaCC' => $request->name_supplier,
            'DiaChi' => $request->addr_supplier,
            'SĐTh' => $request->phone_supplier,
            'Email' => $request->email_supplier,
        ];
        
        $this->nhacungcap->addSupplier($dataInsert);   
        return back()->with('msgtrue', 'Thêm nhà cung cấp thành công !!!');
    }

    // cập nhật nha cung cap

    public function edit($id=0, Request $request){

        if(!empty($id)){
            $supplierDetail = $this->nhacungcap->getDetail($id);
            // dd($supplierDetail);
            if(!empty($supplierDetail[0])){
                $request->session()->put('id', $id);
                $supplierDetail = $supplierDetail[0];
            }else{
                return redirect()->route('supplierList')->with('msg', 'Nhà cung cấp này không tồn tại !!!');
            }
        }else{
            return redirect()->route('supplierList')->with('msg', 'Liên kết này không tồn tại !!!');
        }

        return view('pages.supplier.editSupplier', compact('supplierDetail'));
    }

    public function update(SupplierRequest $request){
        
        // dd($request);

        $id =  session('id');
        if(empty($id)){
            return redirect()->route('supplierList')->with('msg', 'Liên kết này không tồn tại !!!');
        }

        $dataUpdate = [
            'TenNhaCC' => $request->name_supplier,
            'DiaChi' => $request->addr_supplier,
            'SĐTh' => $request->phone_supplier,
            'Email' => $request->email_supplier,
        ];
        $this->nhacungcap->updatesupplier($dataUpdate, $id);

        return redirect()->route('supplierList')->with('msgtrue', 'Cập nhật nhà cung cấp thành công !!!');
    }
    
    // xóa nha cung cap

    public function delete($id){
        if(!empty($id)){
            $supplierDetail = $this->nhacungcap->getDetail($id);
            if(!empty($supplierDetail[0])){
                $deleteStatus = $this->nhacungcap->deletesupplier($id);
                if($deleteStatus){
                    $msgtrue = 'Xóa nhà cung cấp thành công !!!';
                    return redirect()->route('supplierList')->with('msgtrue', $msgtrue);
                }else{
                    $msg = 'Bạn không thể xóa nhà cung cấp này . Hãy thử lại !!!';
            }
            }else{
                $msg = 'Nhà cung cấp này không tồn tại !!!';
            }
        }else{
            $msg = 'Liên kết này không tồn tại !!!';
        }
        return redirect()->route('supplierList')->with('msg', $msg);
    }
     
}
