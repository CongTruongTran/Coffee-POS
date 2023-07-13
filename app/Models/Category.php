<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    protected $table = 'danhmucsp';

    public function getAllCategory(){
        $categories = DB::table($this->table)
        ->get();

        return $categories;
    }

    public function addCategory($data){

        return DB::table($this->table)->insert($data);
    }

    public function getDetail($id){
        
        return DB::select('SELECT * FROM '.$this->table.' WHERE IDDanhMucSP = ?', [$id]);
    }

    public function updateCategory($data, $id){

        return DB::table($this->table)->where('IDDanhMucSP', $id)->update($data);
    }

    public function deleteCategory($id){

        return DB::table($this->table)->where('IDDanhMucSP', $id)->delete();
    }
}
