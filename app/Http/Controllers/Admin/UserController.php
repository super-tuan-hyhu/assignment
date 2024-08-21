<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function listUser(){
        $listUser = User::paginate(5);
        return view('admin.user.listUser', compact('listUser'));
    }

    public function addUser(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'password' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'role' => 'required'
        ], [
            'name.required' => 'Name Không Được Để Trống',
            'email.required' => 'Email Không được để trống',
            'email.email' => 'Email Không đúng định dạng',  
            'password.required' => 'Password Không được để trống',
            'phone.required' => 'Phone Không được để trống',
            'address.required' => 'Address Không được để trống',
            'role.required' => 'Role Không được để trống',
        ]);

        $check = User::where('email', $request->email)->exists();
        if(!$check){
            $newUser = new User();
            $newUser->name = $request->name;
            $newUser->email = $request->email;
            $newUser->password = Hash::make($request->password);
            $newUser->phone = $request->phone;
            $newUser->address = $request->address;
            $newUser->role = $request->role;
            $newUser->save();
        }else{
            return redirect()->back()->with([
                'message' => 'Email Đã Tồn Tại Vui Lòng Nhập Email Khác'
            ]);
        }
        
        return redirect()->back()->with([
            'message' => 'Thêm Mới Thành Công'
        ]);
    }

    public function updateUser($idUser){
        $listIdUser = User::where('id', $idUser)->first();
        return view('admin.user.update', compact('listIdUser'));
    }

    public function updatePostUser(Request $request){
        $id = $request->id;
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'phone' => 'required',
            'address' => 'required',
            'role' => 'required'
        ], [
            'name.required' => 'Name Không Được Để Trống',
            'email.required' => 'Email Không được để trống',
            'email.email' => 'Email Không đúng định dạng',
            'phone.required' => 'Phone Không Được Để Trống',
            'address.required' => 'Email Không Được Để Trống',
            'role.required' => 'Role Không được để trống',
        ]);

        $user = User::where('id', $id);
        if($user->exists()){
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'role' => $request->role,
            ];
            $user->update($data);
        }
        return redirect()->route('admin.users.listUser')->with([
            'message' => 'Chỉnh sửa người dùng Thành Công'
        ]);
    }

    public function deleteUser($idUser){

        $user = User::find($idUser);

        $user->delete();
        return redirect()->back()->with([
            'message' => 'Xóa người dùng Thành Công'
        ]);
    }
}
