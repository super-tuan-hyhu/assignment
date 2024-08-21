<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductComment;
use Illuminate\Http\Request;

class CommentProduct extends Controller
{
    public function listComment(){
        $listComments = ProductComment::with('user')->with('pro')->paginate(5);
        return view('admin.comment.listComment', compact('listComments'));
    }

    public function deleteComment($idComment){
        $commentID = ProductComment::find($idComment);

        $commentID->delete();
        return redirect()->route('admin.comment.listComment')->with([
            'message' => 'Xóa Thành Công Danh Mục'
        ]);
    }
}
