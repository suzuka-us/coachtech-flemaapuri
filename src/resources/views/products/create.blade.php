@extends('layouts.app')

@section('content')
<div class="sell-container">
    <form action="{{ route('products.store') }}" method="POST" class="sell-form">

        <main>
            <h1 class="sell-title">商品の出品</h1>
            <form class="sell-form" action="/sell" method="POST" enctype="multipart/form-data">
                @csrf

                <label>商品の画像</label>
                <input type="file" name="image" accept="image/*">

                <label>商品の詳細</label>

                <label>カテゴリー</label>
                <div class="category-box">
                    @foreach($categories as $category)
                    <label class="category-tag">
                        <input type="checkbox" name="categories[]" value="{{ $category->id }}">
                        <span>{{ $category->name }}</span>
                    </label>
                    @endforeach
                </div>

                <label>商品の状態</label>
                <select name="condition">
                    <option value="新品">新品</option>
                    <option value="未使用に近い">未使用に近い</option>
                    <option value="目立った傷なし">目立った傷なし</option>
                </select>

                <label>商品名</label>
                <input type="text" name="name">

                <label>ブランド名
                </label>
                <input type="text" name="brand">

                <label>商品の説明</label>
                <textarea name="description"></textarea>

                <label>販売価格</label>
                <input type="number" name="price">


                <button type="submit">出品する</button>
            </form>
        </main>
</div>
@endsection