<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\ProductController;

// =======================================
// 修正ポイント1: トップページ / を ProductController@index に変更
// 未認証ユーザーも見れるようにここで商品一覧を表示
Route::get('/', [ProductController::class, 'index'])->name('products.index'); // ← 追加・変更

// =======================================
// 修正ポイント2: AuthController@index ルートは /home に変更
Route::middleware('auth')->group(function () {

    // マイページ関連
    Route::get('/mypage', [MypageController::class, 'show'])->name('mypage.show');
    Route::get('/mypage/profile', [MypageController::class, 'edit'])->name('mypage.edit');
    Route::post('/mypage/profile', [MypageController::class, 'update'])->name('mypage.update');

    // ログイン後のホーム
    Route::get('/home', [AuthController::class, 'index'])->name('home');
});
