<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MypageController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::middleware('auth')->group(function () {
    Route::get('/', [AuthController::class, 'index']);
 });

 Route::get('/mypage', [MypageController::class, 'show'])->name('mypage.show');           // プロフィール表示
Route::get('/mypage/profile', [MypageController::class, 'edit'])->name('mypage.edit');   // プロフィール編集画面
Route::post('/mypage/profile', [MypageController::class, 'update'])->name('mypage.update'); // 更新処理

