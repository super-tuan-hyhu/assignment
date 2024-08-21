<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Caterogy;
use App\Models\Product;
use App\Models\ProductComment;
use App\Models\ProductImage;
use Illuminate\Http\Request;

use function Laravel\Prompts\alert;
use function Laravel\Prompts\select;

class HomeController extends Controller
{
    public function homeUser(){
        $category = Caterogy::orderBy('id', 'asc')->get();
        $products = Product::paginate(8);
        $productsView = Product::orderBy('view', 'desc')->limit(4)->get();
        return view('front.index' , compact('category', 'products', 'productsView'));
    }

    public function detailPro($proID){
        $product = Product::find($proID);
        $category = Caterogy::select('id', 'name_cate')->get();
        $categoryy = Caterogy::where('id', $product->category_id)->first();
        $image = ProductImage::select('id', 'image')->where('product_id', $product->id)->limit(5)->get();

        $productRelated = Product::orderBy('id', 'desc')
                                    ->where('category_id', $product->category_id)
                                    ->where('id', '!=', $product->id) // không lấy sản phẩm hiện tại 
                                    ->limit(4)
                                    ->get();

        $retingComment = ProductComment::with('user' )->select('id', 'vote_star', 'comment', 'users_id', 'created_at')
                                        ->where('product_id', $product->id)
                                        ->get();
        return view('front.detail.productDetail', compact('category','product', 'image', 'productRelated', 'retingComment', 'categoryy'));
    }
    
    public function detailComment(Request $request){
        $data = $request->all();

        ProductComment::create($data);

        return redirect()->back()->with([
            alert("Cảm Ơn Bạn Vì Đánh Giá Này")
        ]);
    }

    public function shopDetail(Request $request){
        
        $category = Caterogy::select('id', 'name_cate')->get();
        $search = $request->search;

        $products = Product::with('cate')
            ->join('category', 'product.category_id', '=', 'category.id')
            ->select('product.*', 'category.name_cate')
            ->where('product.id', 'like', '%'. $search . '%')
            ->orWhere('product.name', 'like', '%' . $search . '%')
            ->orWhere('category.name_cate', 'like', '%' . $search . '%')
            ->orWhere('product.price_new', 'like', '%' . $search . '%')
            ->orWhere('product.price_old', 'like', '%' . $search . '%')
            ->orderBy('product.id', 'asc')
            ->paginate(5);
        return view('front.shop.shopDetail' , compact('category', 'products'));
    }

    public function shopCategory(Request $request, $category_id){
        $category = Caterogy::select('id', 'name_cate')->get();
        $products = Product::select('product.*')
                            ->where('category_id', $category_id)
                            ->orderBy('product.id', 'asc')
                            ->paginate(5);
        return view('front.shop.shopDetail' , compact('category', 'products'));
    }

    public function shopSortPrice(Request $request){
        $category = Caterogy::select('id', 'name_cate')->get();

        $sortPrice = $request->input('sort', 'asc');
        $products = Product::select('product.*')
                            ->orderBy('product.price_new', $sortPrice)
                            ->paginate(5);
        return view('front.shop.shopDetail' , compact('category', 'products'));
    }

    public function shopSortView(Request $request){
        // Lấy thông tin tất cả các danh mục
        $category = Caterogy::select('id', 'name_cate')->get();
        $sortView = $request->input('view', 'asc');
        $products = Product::select('product.*')
                            ->orderBy('product.view', $sortView)
                            ->paginate(5);
        return view('front.shop.shopDetail', compact('category', 'products'));
    }
    
}
