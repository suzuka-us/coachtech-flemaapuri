<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $userId = Auth::id(); // ログインしていれば自分のID、未認証なら null

        $products = Product::query()
            ->when($userId, fn($query, $userId) => $query->where('user_id', '!=', $userId))
            ->get();

        return view('products.index', compact('products'));
    }
}
