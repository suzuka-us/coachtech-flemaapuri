@extends('layouts.app')

@section('content')
<h1>送付先住所変更</h1>

<form action="{{ route('purchase.updateAddress', $item) }}" method="POST">
    @csrf
    <div>
        <label for="address">住所</label>
        <input type="text" id="address" name="address" value="{{ old('address', Auth::user()->address ?? '') }}">
        @error('address')
        <p style="color:red;">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit">更新</button>
</form>
@endsection
