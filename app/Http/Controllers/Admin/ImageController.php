<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use App\Utilities\Common;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    public function imageListPro($proID){
        $product = Product::find($proID);
        $image = ProductImage::select('id', 'product_id', 'image')->get();
        return view('admin.imageProduct.listImage', compact('product', 'image'));
    }

    public function imagePostListPro(Request $request){
        $data = $request->all();
        if($request->hasFile('image')){
            foreach($request->file('image') as $image){
                if($image->isValid()){
                    $data['image'] = Common::uploadFile($image, 'assetss/img/imageProducts');
                    ProductImage::create($data);
                }
            }
            return redirect()->back()->with([
                'message' => 'Thêm Thành Công Ảnh Sản Phẩm',
            ]);
        } else {
            return redirect()->back()->with([
                'message' => 'Thêm Không Thành Công Ảnh',
            ]);
        }
    }
    

    public function imageDeleteListPro(Request $request, $proID, $imgID){
        $product = Product::find($proID);
        $file_name = ProductImage::find($imgID)->image;

        if($file_name != ''){
            File::delete(public_path('assetss/img/imageProducts/'. $file_name));
        }

        ProductImage::find($imgID)->delete();
        return redirect()->back()->with([
            'message' => 'Xóa Thành Công Ảnh Sản Phẩm',
        ]);
    }


}
