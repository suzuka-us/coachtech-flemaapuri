<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class CommentController extends Controller
{
    public function store(CommentRequest $request, Product $item)
    {
        Comment::create([
            'product_id' => $item->id,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
        ]);

        return back();
    }
}
