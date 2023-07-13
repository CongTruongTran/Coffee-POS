<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Warehouse extends Model
{
    use HasFactory;

    protected $table = 'khohang';

    public function getAllWarehouse()
    {
        $allWarehouse = DB::table($this->table)
        ->join('nhacungcap','nhacungcap.IDNhaCC', '=', 'khohang.IDNhaCC')
        ->get();

        return $allWarehouse;
    }    

    public function getDetail($id)
    {
        return DB::table($this->table)
                ->join('nhacungcap', 'khohang.IDNhaCC', '=' ,'nhacungcap.IDNhaCC')
                ->where('IDKhoHang', '=', $id)
                ->get();
    }

    public function updateWarehouse($data, $id){

        return DB::table($this->table)->where('IDKhoHang', $id)->update($data);
    }

    public function addWarehouse($data)
    {
        return DB::table($this->table)->insert($data);
    }

    public function addHistoryWarehouse($data)
    {
        return DB::table('lichsunhaphang')->insert($data);
    }


    // lich su nhap hang
    public function getAllHistory()
    {
        $AllHistory = DB::table($this->table)
        ->join('lichsunhaphang','khohang.IDKhoHang', '=', 'lichsunhaphang.IDKhoHang')
        ->join('nhanvien','nhanvien.IDNhanVien', '=', 'lichsunhaphang.IDNhanVien')
        ->join('thongtinnv','nhanvien.IDThongTinNV', '=', 'thongtinnv.IDThongTinNV')
        ->select('lichsunhaphang.*','khohang.TenHang','khohang.DonViTinh','khohang.SoLuongCon','thongtinnv.TenNV')
        ->get();

        return $AllHistory;
    }

}
