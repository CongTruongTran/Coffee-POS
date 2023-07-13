<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;

    protected $table = 'hoadon';

    public function getAllOrder()
    {
        $orders = DB::table($this->table)
        ->select('hoadon.*', 'thongtinnv.TenNV')
        ->join('nhanvien', 'hoadon.IDNhanVien', '=' , 'nhanvien.IDNhanVien')
        ->join('thongtinnv', 'nhanvien.IDThongTinNV', '=' , 'thongtinnv.IDThongTinNV')
        ->orderByDesc('created_at')
        // ->take(5)
        ->get();
        
        return $orders;
    }

    public function getDetailOrder($id)
    {
        $orderDetail = DB::table($this->table)
        // ->select('hoadon.IDHoaDon', 'hoadon.IDNhanVien', 'hoadon.created_at')
        ->select('hoadon.created_at','hoadon.*', 'chitiethoadon.*','sanpham.*')
        ->join('chitiethoadon', 'hoadon.IDHoaDon', '=' , 'chitiethoadon.IDHoaDon')
        ->join('sanpham', 'sanpham.IDSanPham', '=' , 'chitiethoadon.IDSanPham')
        // ->join('nhanvien', 'nhanvien.IDNhanVien', '=' , 'hoadon.IDNhanVien')
        ->where('hoadon.IDHoaDon' ,  '=' , $id)
        ->get();

        // dd($orderDetail);

        // return DB::select('SELECT * FROM'.$this->table.'WHERE IDHoaDon = ?',[$id]);
        return $orderDetail;
    }

    


}
