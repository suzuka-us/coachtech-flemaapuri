@extends('layouts.app')

@section('content')
<h1>商品一覧</h1>
<div class="product-list">
  @foreach($products as $product)
  <div class="product-item">
    <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="product-image">
    <p class="product-name">{{ $product->name }}</p>

    @if($product->buyer_id)
    <span class="sold-label">Sold</span>
    @endif
  </div>
  @endforeach
</div>
@endsection

@section('css')
<style>
  .product-list {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
  }

  .product-item {
    width: 200px;
    text-align: center;
    border: 1px solid #ccc;
    padding: 10px;
    border-radius: 8px;
  }

  .product-image {
    width: 100%;
    height: 150px;
    object-fit: cover;
    border-radius: 8px;
  }

  .sold-label {
    display: inline-block;
    background-color: #ccc;
    color: #fff;
    padding: 2px 6px;
    margin-top: 5px;
    border-radius: 4px;
  }
</style>
@endsection