<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProFileController extends Controller
{
    public function myProfile(){
        return view('front.profile.myProfile');
    }

    public function update(Request $request){
        $id = $request->id;
        $user = User::where('id', $id);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password)
        ];
        $user->update($data);
        return redirect()->back()->with([
            'messageError' => 'Cập Nhật Thành Công'
        ]);
    }
}
