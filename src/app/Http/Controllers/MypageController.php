<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;

class MypageController extends Controller
{
    // プロフィール表示画面
    public function show()
    {
        $user = auth()->user();
        return view('mypage.show', compact('user'));
    }

    // プロフィール編集画面
    public function edit()
    {
        $user = auth()->user();
        return view('mypage.profile', compact('user'));
    }

    // プロフィール更新処理
    public function update(ProfileRequest $request)
    {
        $user = auth()->user();

        // 画像アップロード
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('profile', 'public');
            $user->image = $path;
        }

        $user->name    = $request->name;
        $user->zip     = $request->zip;
        $user->address = $request->address;
        $user->building = $request->building;
        $user->save();

        return redirect()->route('mypage.show')->with('success', '更新しました');
    }
}
