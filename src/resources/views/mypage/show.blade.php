@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="login-form__content">
    <div class="login-form__heading">
        <h2>マイページ</h2>
    </div>

    <div class="form__group">
        <div class="form__group-title">
            <span class="form__label--item">ユーザー名</span>
        </div>
        <div class="form__group-content">
            <p>{{ $user->name ?? '' }}</p>
        </div>
    </div>

    <div class="form__group">
        <div class="form__group-title">
            <span class="form__label--item">郵便番号</span>
        </div>
        <div class="form__group-content">
            <p>{{ $user->zip ?? '' }}</p>
        </div>
    </div>

    <div class="form__group">
        <div class="form__group-title">
            <span class="form__label--item">住所</span>
        </div>
        <div class="form__group-content">
            <p>{{ $user->address ?? '' }}</p>
        </div>
    </div>

    <div class="form__group">
        <div class="form__group-title">
            <span class="form__label--item">建物名</span>
        </div>
        <div class="form__group-content">
            <p>{{ $user->building ?? '' }}</p>
        </div>
    </div>

    <div class="form__button">
        <a href="{{ route('mypage.edit') }}" class="form__button-submit">プロフィール編集</a>
    </div>
</div>
@endsection