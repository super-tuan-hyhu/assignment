<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CommentProduct;
use App\Http\Controllers\Admin\orderDeltailController;
use App\Http\Controllers\AuthenController;
use App\Http\Controllers\Users\CartController;
use App\Http\Controllers\Users\HomeController;
use App\Http\Controllers\Users\myOrderController;
use App\Http\Controllers\Users\NotPassWordController;
use App\Http\Controllers\Users\ProFileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [HomeController::class, 'homeUser'])->name('homeUser');
//Luồng đăng Nhập đăng ký


Route::get('login', [AuthenController::class, 'login'])->name('login');
Route::post('login', [AuthenController::class, 'postLogin'])->name('postLogin');
Route::get('logout', [AuthenController::class, 'logout'])->name('logout');
Route::get('register', [AuthenController::class, 'register'])->name('register');
Route::post('register', [AuthenController::class, 'postRegister'])->name('postRegister');

//trang người dùng
Route::group([
    'prefix' => 'home',
    'as' => 'home.'
], function(){

    Route::group([
        'prefix' => 'detail',
        'as' => 'detail.'
    ], function(){
        Route::get('product-detail/{proID}', [HomeController::class, 'detailPro'])->name('detailPro');
        Route::post('product-detail/{proID}', [HomeController::class, 'detailComment'])->name('detailComment');
    });

    Route::group([
        'prefix' => 'shop',
        'as' => 'shop.',
    ], function(){
        Route::get('shop', [HomeController::class, 'shopDetail'])->name('shopDetail');
        Route::get('shopCategory/{id_cate}', [HomeController::class, 'shopCategory'])->name('shopCategory');
        Route::get('sort', [HomeController::class, 'shopSortPrice'])->name('shopSortPrice');
        Route::get('view', [HomeController::class, 'shopSortView'])->name('shopSortView');
    });

    Route::group([
        'prefix' => 'cart',
        'as' => 'cart.',
    ], function (){
        Route::get('list-cart', [CartController::class, 'listCart'])->name('listCart');
        Route::get('confirm', [CartController::class, 'confirm'])->name('confirm');
        Route::get('add/{cartID}', [CartController::class, 'cartProduct'])->name('cartProduct');
        Route::get('check-out', [CartController::class, 'checkOut'])->name('checkOut');
        Route::post('check-out', [CartController::class, 'order'])->name('order');
        Route::get('delete/{rowId}', [CartController::class, 'delete'])->name('delete');
    });

    Route::group([
        'prefix' => 'order',
        'as' => 'order.',
    ], function(){
        Route::get('list-order', [myOrderController::class, 'listOrder'])->name('listOrder');
        Route::get('order-detail/{orderID}', [myOrderController::class, 'orderDetail'])->name('orderDetail');
        Route::post('update/{orderID}', [myOrderController::class, 'updateOrder'])->name('updateOrder');
    });

    Route::group([
        'prefix' => 'profile',
        'as' => 'profile.'
    ], function(){
        Route::get('myProFile', [ProFileController::class, 'myProfile'])->name('myProfile');
        Route::post('updatePro', [ProFileController::class, 'update'])->name('update');
    });

    Route::group([
        'prefix' => 'notPass',
        'as' => 'notPass.',
    ], function (){
        Route::get('notPassWord', [NotPassWordController::class, 'getViewPass'])->name('getViewPass');
        Route::post('notPassWord', [NotPassWordController::class, 'postViewPass'])->name('postViewPass');
    });
});


//admin
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => 'checkAdmin'
], function(){
    //Quản lý người dùng
    Route::group([
       'prefix' => 'users',
        'as' => 'users.' 
    ], function(){
        Route::get('list-user', [UserController::class, 'listUser'])->name('listUser');
        // add new user
        Route::post('add-user', [UserController::class, 'addUser'])->name('addUser');
        // update 
        Route::get('update-user/{idUser}', [UserController::class, 'updateUser'])->name('updateUser');
        Route::post('update-user', [UserController::class, 'updatePostUser'])->name('updatePostUser');
        // delete
        Route::get('delete-user/{idUser}', [UserController::class, 'deleteUser'])->name('deleteUser');
    });

    Route::group([
        'prefix' =>'category',
        'as' => 'category.'
    ], function(){
        Route::get('list_cate', [CategoryController::class, 'listCategory'])->name('listCategory');
        Route::post('add_cate', [CategoryController::class, 'addCategory'])->name('addCategory');
        Route::get('delete_cate/{cateID}', [CategoryController::class, 'deleteCate'])->name('deleteCate');
        Route::get('update_cate/{cateID}', [CategoryController::class, 'updateCate'])->name('updateCate');
        Route::post('update_cate', [CategoryController::class, 'updatePostCate'])->name('updatePostCate');
    });

    Route::group([
        'prefix' => 'product',
        'as' => 'product.',
    ], function(){
        Route::get('list-product', [ProductController::class, 'listProduct'])->name('listProduct');
        Route::post('add-product', [ProductController::class, 'addProduct'])->name('addProduct');
        Route::get('update-product/{proID}', [ProductController::class, 'updateProduct'])->name('updateProduct');
        Route::post('update-product', [ProductController::class, 'updatePostProduct'])->name('updatePostProduct');
        Route::get('delete-product/{proID}', [ProductController::class, 'deleteProduct'])->name('deleteProduct');

        // Image Products
        Route::get('product/{proId}/image', [ImageController::class, 'imageListPro'])->name('imageListPro');
        Route::post('product/{proId}/image', [ImageController::class, 'imagePostListPro'])->name('imagePostListPro');
        //delete
        Route::get('product/{proId}/image{imgID}', [ImageController::class, 'imageDeleteListPro'])->name('imageDeleteListPro');
    });
    
    Route::group([
        'prefix' => 'comment',
        'as' => 'comment.'
    ], function(){
        Route::get('list-comment', [CommentProduct::class, 'listComment'])->name('listComment');
        Route::get('list-comment/{idComment}', [CommentProduct::class, 'deleteComment'])->name('deleteComment');
    });

    Route::group([
        'prefix' => 'order',
        'as' => 'order.'
    ], function(){
        Route::get('listOrder', [orderDeltailController::class, 'order'])->name('order');
        Route::get('listOrder/{idOrder}', [orderDeltailController::class, 'orderDetail'])->name('orderDetail');
        Route::post('update/{idOrder}', [orderDeltailController::class, 'updateOrder'])->name('updateOrder');
    });

    
});
