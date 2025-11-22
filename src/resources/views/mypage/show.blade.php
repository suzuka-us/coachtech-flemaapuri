@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
<div class="mypage-container">
    <h2>マイページ</h2>

    {{-- ユーザー名 --}}
    <div class="form__group">
        <div class="form__group-title"><span>ユーザー名</span></div>
        <div class="form__group-content">
            <div class="form__input--text readonly">
                <input type="text" value="{{ $user->name ?? '' }}" readonly>
            </div>
        </div>
    </div>

    {{-- 郵便番号 --}}
    <div class="form__group">
        <div class="form__group-title"><span>郵便番号</span></div>
        <div class="form__group-content">
            <div class="form__input--text readonly">
                <input type="text" value="{{ $user->zip ?? '' }}" readonly>
            </div>
        </div>
    </div>

    {{-- 住所 --}}
    <div class="form__group">
        <div class="form__group-title"><span>住所</span></div>
        <div class="form__group-content">
            <div class="form__input--text readonly">
                <input type="text" value="{{ $user->address ?? '' }}" readonly>
            </div>
        </div>
    </div>

    {{-- 建物名 --}}
    <div class="form__group">
        <div class="form__group-title"><span>建物名</span></div>
        <div class="form__group-content">
            <div class="form__input--text readonly">
                <input type="text" value="{{ $user->building ?? '' }}" readonly>
            </div>
        </div>
    </div>

    <div class="form__button">
        <a href="{{ route('mypage.edit') }}" class="form__button-submit">プロフィール編集</a>
    </div>
</div>
@endsection