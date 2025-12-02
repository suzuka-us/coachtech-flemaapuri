<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;

// =======================================
// トップページ（商品一覧） 未ログインでもOK
Route::get('/', [ProductController::class, 'index'])->name('products.index');

// =======================================
// ★ 商品詳細は未ログインでも見られるため auth 外にする
Route::get('/item/{item}', [ProductController::class, 'show'])->name('products.show');

// =======================================
// ログインが必要なページ
Route::middleware('auth')->group(function () {

    // マイページ関連
    Route::get('/mypage', [MypageController::class, 'show'])->name('mypage.show');
    Route::get('/mypage/profile', [MypageController::class, 'edit'])->name('mypage.edit');
    Route::post('/mypage/profile', [MypageController::class, 'update'])->name('mypage.update');

    // ログイン後のホーム
    Route::get('/home', [AuthController::class, 'index'])->name('home');

    // 購入画面
    Route::get('/purchase/{item}', [PurchaseController::class, 'show'])->name('purchase.show');

    // 送付先住所変更画面
    Route::get('/purchase/address/{item}', [PurchaseController::class, 'editAddress'])->name('purchase.editAddress');
    Route::post('/purchase/address/{item}', [PurchaseController::class, 'updateAddress'])->name('purchase.updateAddress');
});

