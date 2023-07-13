<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'nhanvien';
    
    protected $fillable = [
        // 'name',
        'Email',
        'MatKhau',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function getAllUser(){
        $users = DB::table($this->table)
        ->join('thongtinnv', 'nhanvien.IDThongTinNV', '=', 'thongtinnv.IDThongTinNV')
        ->join('quyen', 'nhanvien.IDQuyen', '=', 'quyen.IDQuyen')
        // ->select('nhanvien.*', 'thongtinnv.*','quyen.*')
        ->get();

        return $users;
    }

    public function countUsers(){
        $count = DB::table($this->table)->count();
        // dd($count);
        return $count;
    }

    public function getDetailUser($email){
        
        // return DB::select('SELECT * FROM '.$this->table.' WHERE id_user = ?', [$id]);

        $Detailuser = DB::table($this->table)
        ->join('thongtinnv', 'nhanvien.IDThongTinNV', '=', 'thongtinnv.IDThongTinNV')
        ->join('quyen', 'nhanvien.IDQuyen', '=', 'quyen.IDQuyen')
        ->select('nhanvien.*', 'thongtinnv.*','quyen.*')
        ->where('nhanvien.email', '=', $email)
        ->get();
        // ->first();

        return $Detailuser;
    }
    

    public function addUser($data){

        return DB::table($this->table)->insert($data);
    }

    public function addInforUser($data){

        return DB::table('thongtinnv')->insert($data);
    }

    public function updateUser($data, $id){

        return DB::table($this->table)->where('IDNhanVien', $id)->update($data);
    }
    public function updateInforUser($data, $id){

        return DB::table('thongtinnv')->where('IDThongTinNV', $id)->update($data);
    }
}
