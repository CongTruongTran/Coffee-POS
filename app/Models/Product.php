<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    protected $table = 'sanpham';


    public function getAllProduct(){
        $products = DB::table($this->table)
        ->select('sanpham.*', 'danhmucsp.TenDMSP')
        ->join('danhmucsp', 'sanpham.IDDanhMucSP', '=', 'danhmucsp.IDDanhMucSP')
        ->where('TrangThai', '=', 1)
        ->get();

        return $products;
    }

    public function getProductOutOfStock(){
        $products = DB::table($this->table)
        ->select('sanpham.*', 'danhmucsp.TenDMSP')
        ->join('danhmucsp', 'sanpham.IDDanhMucSP', '=', 'danhmucsp.IDDanhMucSP')
        ->where('TrangThai', '=', 0)
        ->get();

        return $products;
    }
    
    public function getDetailProduct($id){
        
        return DB::select('SELECT * FROM '.$this->table.' WHERE id_product = ?', [$id]);
    }
    

    public function addProduct($data){

        return DB::table($this->table)->insert($data);
    }

    public function updateProduct($data, $id){

        return DB::table($this->table)->where('IDSanPham', $id)->update($data);
    }

}
