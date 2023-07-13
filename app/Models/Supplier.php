<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'nhacungcap';


    public function getAllSupplier(){
        $suppliers = DB::table($this->table)->get();

        return $suppliers;
    }

    public function addSupplier($data){

        return DB::table($this->table)->insert($data);
    }

    public function getDetail($id){
        
        return DB::select('SELECT * FROM '.$this->table.' WHERE IDNhaCC = ?', [$id]);
    }

    public function updateSupplier($data, $id){

        return DB::table($this->table)->where('IDNhaCC', $id)->update($data);
    }

    public function deleteSupplier($id){

        return DB::table($this->table)->where('IDNhaCC', $id)->delete();
    }

    
}
