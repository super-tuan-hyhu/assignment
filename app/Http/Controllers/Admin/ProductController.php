<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Caterogy;
use App\Utilities\Common;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function listProduct(Request $request){
        $listCategory = Caterogy::select('id', 'name_cate')->get();
        $search = $request->search;

        $listProduct = Product::with('cate')
            ->join('category', 'product.category_id', '=', 'category.id')
            ->select('product.*', 'category.name_cate')
            ->where('product.id', 'like', '%'. $search . '%')
            ->orWhere('product.name', 'like', '%' . $search . '%')
            ->orWhere('category.name_cate', 'like', '%' . $search . '%')
            ->orWhere('product.price_new', 'like', '%' . $search . '%')
            ->orWhere('product.price_old', 'like', '%' . $search . '%')
            ->orderBy('product.id', 'asc')
            ->paginate(5);
            
        return view('admin.product.listProduct', compact('listProduct', 'search' ,'listCategory'));
    }


    public function addProduct(Request $request){
        $request->validate([
            'name' => 'required',
            'price_old' => 'required',
            'price_new' => 'required',
            'description' => 'required',
            'category_id' => 'required'
        ], [
            'name.required' => 'Name Không Được Để Trống',
            'price_old.required' => 'Price Old Không được để trống',
            'price_new.required' => 'Price New Không đúng định dạng',  
            'description.required' => 'description Không được để trống',
            'category_id.required' => 'category_id Không được để trống',
        ]);
        
        $data = $request->all();

        if($request->hasFile('image')){
            $data['image'] = Common::uploadFile($request->file('image'), 'assetss/img/product');
        }

        Product::create($data);
        return redirect()->route('admin.product.listProduct')->with([
            'message' => 'Thêm Thành Công Danh Mục'
        ]);
    }

    public function updateProduct($proID){
        $listCategory = Caterogy::select('id', 'name_cate')->get();
        $listProduct = Product::find($proID);
        return view('admin.product.add', compact('listProduct', 'listCategory'));
    }

    public function updatePostProduct(Request $request){
        $data = $request->all();

        if($request->hasFile('image')){
            $data['image'] = Common::uploadFile($request->file('image'), 'assetss/img/product');

            $file_old = $request->get('image_old');

            if($file_old != "" && file_exists('assetss/img/product/'. $file_old)){
                unlink('assetss/img/product/'. $file_old);
            }

        }
        $product = Product::find($request->id);
        $product->update($data);
        return redirect()->route('admin.product.listProduct')->with([
                'message' => 'Sửa Thành Công sản phẩm'
            ]);
        
    }

    public function deleteProduct($proID){
        $product = Product::find($proID);
        if($product->image != null){
            File::delete(public_path($product->image));
        }

        $product->delete();
        return redirect()->route('admin.product.listProduct')->with([
            'message' => 'Xóa Thành Công Danh Mục'
        ]);
    }

    
}
