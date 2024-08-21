<?php

namespace App\Http\Controllers;

use App\Models\Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenController extends Controller
{
    public function login(){
        return view('login');
    }
    
    public function postLogin(Request $request){
        $credentials = $request->validate([
            'email'=> ['required', 'email'],
            'password' =>['required']
        ], [
            'email.required' => 'Email Không được để trống',
            'email.email' => 'Email Không đúng định dạng',  
            'password.required' => 'Password Không được để trống',
        ]);

        

        if(Auth::attempt($credentials)) {
            Session::Where('user_id', Auth::id())->delete();
            // Tạo Phiên Đăng Nhập Mới
            session()->put('user_id', Auth::id());
            $request->session()->regenerate();
            return redirect()->route('admin.users.listUser');
        }else{
            return redirect()->back()->with([
                'messageError' => 'Email Hoặc Mật Khẩu Không Đúng',
            ]);
        }
    }


    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('homeUser');
    }

    public function register(){
        return view('register');
    } 

    public function postRegister(Request $request){
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];
        $check = User::where('email', $request->email)->exists();

        if(!$check){
            $newUser = User::create($data);
            return redirect()->route('login')->with([
                'messageError' => 'Đăng Ký Thành Công, Vui lòng Nhập lại',
            ]);
        }else{
            return redirect()->back()->with([
                'messageError' => 'Đăng Ký không thành công',
            ]);
        }
    }
}
