@extends('layouts.app')

@section('content')
<h1 class="mypage-title">購入した商品一覧</h1>

<div class="product-list">
    @forelse($products as $item)
    <div class="product-card">
        <img src="{{ asset('storage/' . $item->product->image) }}" alt="">
        <p>{{ $item->product->name }}</p>
        <p>¥{{ number_format($item->product->price) }}</p>
    </div>
    @empty
    <p>購入履歴はありません。</p>
    @endforelse
</div>
@endsection
