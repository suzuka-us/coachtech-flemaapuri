<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class PurchaseController extends Controller
{
    public function show(Product $item)
    {
        return view('purchase.show', compact('item'));
    }

    public function editAddress(Product $item)
    {
        return view('purchase.address', compact('item'));
    }

    public function updateAddress(Request $request, Product $item)
    {
        
        $request->validate([
            'address' => 'required|string|max:255',
        ]);

        Auth::user()->update(['address' => $request->address]);


        return redirect()->route('purchase.show', $item);
    }
}
