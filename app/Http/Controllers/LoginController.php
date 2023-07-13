<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    private $nguoidung;

    public function __construct(){
        $this->nguoidung = new User();
    }

    public function index(){
        return view('pages.login');
    }

    public function getLogin(LoginRequest $request){
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        // $userLog = User::where('email',$request->email)->first();
        $userLog = $this->nguoidung->getDetailUser($request->email) ;
        // dd($userLog);
        if(empty($userLog)){
            return back()->withErrors(['error'=>'Không tồn tại email này!']);
        }
        if (Auth::attempt($credentials)) {
            session()->put('inforUser',$userLog);
            // dd(session('inforUser'));
            if($userLog[0]->IDQuyen == 1){
                $request->session()->regenerate();
                $_SESSION['user_is_admin'] = true;
                return redirect()->route('dashboard');
            }else{
                return redirect()->route('Order');
            }
        }
        return back()->withErrors([
            'password' => 'Vui lòng kiểm tra lại thông tin đăng nhập.',
        ]);
        
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
