<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Caterogy;
use App\Utilities\Common;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function listCategory(){
        $listCategory = Caterogy::select('id', 'name_cate', 'img', 'status' ,'created_at')->get();
        return view('admin.category.listCategory', compact('listCategory'));
    }

    public function addCategory(Request $request){
        $request->validate([
            'name_cate' => 'required',
            'img' => 'required',
            'status' => 'required'
        ], [
            'name.required' => 'Name không được để trống',
            'img.required' => 'Ảnh không được để trống',
            'status.required' => 'Status không được để trống'
        ]);

        $data = $request->all();

        if($request->hasFile('img')){
            $data['img'] = Common::uploadFile($request->file('img'), 'assetss/img/category');
        }

        $category = Caterogy::create($data);     
        if($category){
            return redirect()->back()->with([
                'message' => 'Thêm Mới Thành Công'
            ]);
        }else{
            return redirect()->back()->with([
                'message' => 'Thêm Mới không Thành Công'
            ]);
        }
        
    }


    public function deleteCate($cateID){
        $category = Caterogy::find($cateID);

        if($category->img != null){
            File::delete(public_path($category->img));
        }

        $category->delete();
        return redirect()->route('admin.category.listCategory')->with([
            'message' => 'Xóa Thành Công Danh Mục'
        ]);
    }

    public function updateCate($cateID){
        $category = Caterogy::find($cateID);
        return view('admin.category.update', compact('category'));
    }

    public function updatePostCate(Request $request){
        $data = $request->all();
    
        if($request->hasFile('img')){
            $data['img'] = Common::uploadFile($request->file('img'), 'assetss/img/category'); 
    
            $file_old_name = $request->get('image_old');
            if($file_old_name != "" && file_exists('assetss/img/category/' . $file_old_name)){ 
                unlink('assets/img/category/' . $file_old_name);
            }
        }
    
        
        $category = Caterogy::find($request->id);
        
        if ($category) {
            
            $category->update($data);
    
            return redirect()->route('admin.category.listCategory')->with([
                'message' => 'Sửa Thành Công Danh Mục'
            ]);
        } else {
            return redirect()->back()->with([
                'message' => 'Sửa Không Thành Công Danh Mục'
            ]);
        }
    }
    

}
