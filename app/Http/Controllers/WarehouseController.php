<?php

namespace App\Http\Controllers;

use App\Http\Requests\WarehouseRequest;
use App\Models\Supplier;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\PDF;

class WarehouseController extends Controller
{
    private $khohang;
    private $nhacc;

    public function __construct(){
        $this->khohang = new Warehouse();
        $this->nhacc = new Supplier();
    }

    // kho hàng

    public function index()
    {
        session()->put('active','wareHouseListView');
        // session()->put('active','productListView');

        $allWarehouse = $this->khohang->getAllWarehouse();
        $allSupplier = $this->nhacc->getAllSupplier();

        // dd($allWarehouse);

        return view('pages.warehouse.warehouseList',compact('allWarehouse','allSupplier'));
    }

    public function export_historywarehouse()
    {
        $allWarehouse = $this->khohang->getAllWarehouse();
        $pdf = PDF::loadView('pages.warehouse.pdf.epWarehouse', compact('allWarehouse'));
        return $pdf->stream();
      //   return $pdf->download('pdf_dbUser.pdf');
    }

    public function add(Request $request)
    {
        // dd($request);
         
         $dataInsert = [
             'TenHang' => $request->name,
             'SoLuongCon' => 0,
             'DonViTinh' => $request->unit,
             'IDNhaCC' => $request->supp,
             'created_at' => date('Y-m-d H:i:s'),
         ];
 
         $this->khohang->addWarehouse($dataInsert);
 
         return redirect()->route('warehouseList')->with('msgtrue', 'Thêm hàng hóa mới thành công !!!');
        
    }

    // cập nhật nguyên liệu trong kho
    public function edit($id=0 , Request $request)
    { 
        if(!empty($id)){
            $allSupplier = $this->nhacc->getAllSupplier();

            $data = $this->khohang->getDetail($id);
            // dd($data);

            if(!empty($data[0])){
                $request->session()->put('id', $id);
                // $data = $data[0];
            }else{
                return redirect()->route('warehouseList')->with('msg', 'Nguyên liệu không tồn tại trong thực đơn !!!');
            }
        }else{
            return redirect()->route('warehouseList')->with('msg', 'Liên kết này không tồn lại !!!');
        }

        return view('pages.warehouse.editWarehouse',compact('data', 'allSupplier'));
    }
     
    public function update(Request $request)
    {
        // dd($request);
        $id =  session('id');

        $dataUpdate = [
            'TenHang' => $request->name_warehouse,
            'SoLuongCon' => $request->quantity,
            'DonViTinh' => $request->unit_warehouse,
            'IDNhaCC' => $request->supplier,
            // 'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        // dd($dataUpdate);

        $this->khohang->updateWarehouse($dataUpdate, $id);

        return redirect()->route('warehouseList')->with('msgtrue', 'Cập nhật thành công !!!');
    }



    // lich su nhap hang

    //  show lich su nhap hang
    public function showHistory()
    {
        session()->put('active','wareHouseHistoryListView');

        $allHistoryWarehouse = $this->khohang->getAllHistory();

        // dd($allHistoryWarehouse);

        return view('pages.warehouse.historyWarehouse',compact('allHistoryWarehouse'));        
    }


    // nhập thêm số lượng ng liệu
    public function create()
    {

        session()->put('active','warehouseInput');

        $allWarehouse = $this->khohang->getAllWarehouse();

        return view('pages.warehouse.inputWarehouse',compact('allWarehouse'));
    }

    public function store(WarehouseRequest $request)
    {

        $idNV =  session()->get('inforUser')[0]->IDNhanVien;
        $total = $request->quantity * $request->price;

        // dd($request);
        
        $dataInsert = [
            'IDKhoHang' => $request->name,
            'IDNhanVien' => $idNV,
            'SoLuongNhap' => $request->quantity,
            'Gia' => $request->price,
            // 'ThanhTien' => $total,
            'TinhTrang' => $request->status,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $SoLuongCon = DB::table('khohang')
        ->select('SoLuongCon')
        ->where('IDKhoHang', '=', $request->name)
        ->get();

        // dd($SoLuongCon);

        $slc = $request->quantity + $SoLuongCon[0]->SoLuongCon;

        $dataUpdate = [
            'SoLuongCon' => $slc,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->khohang->updateWarehouse($dataUpdate, $request->name);

        $this->khohang->addHistoryWarehouse($dataInsert);

        return redirect()->route('warehouseHistory')->with('msgtrue', 'Nhập hàng thành công !!!');
    }


     // cập nhật nguyên liệu trong kho
     public function editHistory($id=0 , Request $request){ 
        if(!empty($id)){
            $allSupplier = $this->nhacc->getAllSupplier();

            $data = $this->khohang->getDetail($id);
            // dd($data);

            if(!empty($data[0])){
                $request->session()->put('id', $id);
                // $data = $data[0];
            }else{
                return redirect()->route('warehouseList')->with('msg', 'Nguyên liệu không tồn tại trong thực đơn !!!');
            }
        }else{
            return redirect()->route('warehouseList')->with('msg', 'Liên kết này không tồn lại !!!');
        }

        return view('pages.warehouse.editWarehouse',compact('data', 'allSupplier'));
     }
     

    public function updateHistory(Request $request)
    {
        // dd($request);
        $id =  session('id');

        $dataUpdate = [
            'TenHang' => $request->name_warehouse,
            'SoLuongCon' => $request->quantity,
            'DonViTinh' => $request->unit_warehouse,
            'IDNhaCC' => $request->supplier,
            // 'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        // dd($dataUpdate);

        $this->khohang->updateProduct($dataUpdate, $id);

        return redirect()->route('warehouseList')->with('msgtrue', 'Cập nhật thành công !!!');
    }
}
