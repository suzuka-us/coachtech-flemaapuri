<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::id();
        $tab = $request->query('tab');

        if ($tab === 'mylist' && $userId) {
            // 自分の商品だけ
            $products = Product::where('user_id', $userId)->get();
        } else {
            // 自分の商品を除いた商品
            $products = Product::query();

            if ($userId) {
                $products->where('user_id', '!=', $userId);
            }

            $products = $products->get();
        }

        return view('products.index', compact('products'));
    }

    // ←←← ここから追加050607

    public function show(Product $item)
    {
        // 商品詳細に必要なリレーションを読み込む
        $item->load([
            'category',
            'comments.user',
            'likes'
        ]);


        $item->load(['category', 'comments.user']);

        return view('products.show', compact('item'));
    }
}
