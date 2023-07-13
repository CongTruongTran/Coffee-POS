<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    private $nguoidung;

    public function __construct(){
        $this->nguoidung = new User();
    }

     // lay all nguoi dung
     public function index()
     {
        session()->put('active','userListView');

        $users =  $this->nguoidung->getAllUser();
        // dd($users);
        $countUsers = $this->nguoidung->countUsers();
        // dd($countUsers);
        return view('pages.user.userList',compact('users','countUsers'));
     }

     // them nguoi dung
    public function create()
    {

        session()->put('active','userAdd');

        // $allCategories = $this->danhmucsp->getAllCategory();

        return view('pages.user.addUser');
    }

    public function store(UserRequest $request)
    {

        // dd($request);
        // dd($request->file('thumbnail')->getClientOriginalName());

        $nameImg = $request->file('thumbnail')->getClientOriginalName();

        if($request->position == 'QuanLi'){
            $name_position = "Quản lí";
        }else{
            $name_position = "Nhân viên";
        }

        $dataInfor = [
            'TenNV' => $request->name,
            'SĐTh' => $request->SĐTh,
            'DiaChi' => $request->addr,
            'GioiTinh' => $request->sex,
            'ChucVu' => $name_position,
            'created_at' => $request->created,
            'HinhAnh' => $nameImg,
        ];  


        $request->file('thumbnail')->storeAs('public/images', $nameImg);

        $request->file('thumbnail')->move(public_path('/images'), $nameImg);

        $this->nguoidung->addInforUser($dataInfor);
        

        if($request->position == 'QuanLi'){
            $position = 1;
        }else{
            $position = 2;
        }

        $idNewInforUser = DB::table('thongtinnv')
        ->select('IDThongTinNV')
        ->where('SĐTh', '=', $request->SĐTh)
        ->get();
        
        // dd($idNewInforUser[0]->IDThongTinNV);

        $dataInsert = [
            'IDThongTinNV' => $idNewInforUser[0]->IDThongTinNV,
            'email' => $request->email,
            'password' => bcrypt('1'),
            'IDQuyen' => $position
        ];    
        
        $this->nguoidung->addUser($dataInsert);

        // if($request->file('thumbnail')->getClientOriginalName()== null){
        //     return back()->with('msg', 'Vui long chon anh !!!');
        // }

        return redirect()->route('userList')->with('msgtrue', 'Thêm nhân viên thành công !!!');
    }



    // cap nhat thong tin nguoi dung
    public function edit($id=0 , Request $request){ 
        if(!empty($id)){

            session()->put('active','userListView');
            $user = DB::table('nhanvien')->where('IDNhanVien',$id)->leftJoin('thongtinnv', 'nhanvien.IDThongTinNV', '=', 'thongtinnv.IDThongTinNV');
            $user = $user->get();

            // dd($user);

            if(!empty($user[0])){
                $request->session()->put('id', $id);
                $request->session()->put('idTTNV', $user[0]->IDThongTinNV);
                // dd( $user[0]->IDThongTinNV);
                $user = $user[0];
            }else{
                return redirect()->route('userList')->with('msg', 'Người dùng này không tồn tại !!!');
            }
        }else{
            return redirect()->route('userList')->with('msg', 'Liên kết này không tồn lại !!!');
        }

        return view('pages.user.userProfile',compact('user'));
     }
     

    public function update(UserRequest $request)
    {
        // dd($request);

        $nameImg = $request->file('thumbnail')->getClientOriginalName();
        $id =  session('id');
        $idTTNV = session('idTTNV');

        if($request->position == 'QuanLi'){
            $name_position = "Quản lí";
        }else{
            $name_position = "Nhân viên";
        }

        $dataUpdate = [
            'TenNV' => $request->name,
            'SĐTh' => $request->SĐTh,
            'DiaChi' => $request->addr,
            'GioiTinh' => $request->sex,
            'ChucVu' => $name_position,
            'updated_at' => date('Y-m-d H:i:s'),
            'HinhAnh' => $nameImg,
        ];
        // dd($dataUpdate);

        $request->file('thumbnail')->storeAs('public/images', $nameImg);

        $request->file('thumbnail')->move(public_path('/images'), $nameImg);

        $this->nguoidung->updateInforUser($dataUpdate, $idTTNV);

        if($request->position == 'Quản lí'){
            $position = 1;
        }else{
            $position = 2;
        }

        $idInforUserUpdate = DB::table('thongtinnv')
        ->select('IDThongTinNV')
        ->where('SĐTh', '=', $request->SĐTh)
        ->get();


        // dd($idInforUserUpdate[0]->IDThongTinNV);

        $dataInsert = [
            'IDThongTinNV' => $idInforUserUpdate[0]->IDThongTinNV,
            'email' => $request->email,
            'password' => bcrypt($request->newPassword),
            'IDQuyen' => $position
        ];  

        $this->nguoidung->updateUser($dataInsert, $id);

        return redirect()->route('userList')->with('msgtrue', 'Cập nhật thông tin thành công !!!');
    }
    
}
