<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class NotPassWordController extends Controller
{
    public function getViewPass()
    {
        return view('front.notpassword.notPass');
    }

    public function postViewPass(Request $request)
    {
        
        $request->validate([
            'email' => 'required|exists:users'
        ], [
            'email.required' => 'Không Được Để trống',
            'email.exists' => 'Email Không Tồn Tại Trong Hệ thống',
        ]);

        
        $emailPass = User::where('email', $request->email)->first();

        
        $token = strtoupper(Str::random(10));

        
        Mail::send('front.notpassword.emailPass', ['token' => $token, 'emailPass' => $emailPass], function ($mail) use ($emailPass) {
            $mail->subject('MyShopping - Lấy lại mật khẩu');
            $mail->to($emailPass->email, $emailPass->name);
        });

        
        return redirect()->back()->with([
            'messageSuccess' => 'Vui Lòng Check Mail Để lấy lại Mật Khẩu'
        ]);
    }
}
