@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">

<style>
    /* 画像が login.css に負けないようにデザイン固定 */
    .profile-image-wrapper {
        text-align: center !important;
        margin-bottom: 20px !important;
    }

    /* 丸いプロフィール画像（小さめに） */
    .profile-image {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #ddd;
    }

    /* ファイル選択エリア */
    .profile-file-area {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .profile-image-wrapper input[type="file"] {
        display: block;
        margin: 0 auto;
    }
</style>
@endsection

@section('content')
<div class="login-form__content">
    <div class="login-form__heading">
        <h2>プロフィール設定</h2>
    </div>

    <form class="form" action="{{ route('mypage.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- プロフィール画像 --}}
        <div class="form__group">
            <div class="profile-row">

                <!-- 左：丸画像 -->
                <img src="{{ asset('storage/'.$user->image) }}"
                    class="profile-image">

                <!-- 右：ファイル選択 -->
                <div class="profile-file-area">
                    <label class="profile-file-label">画像を選択する</label>
                    <input type="file" name="image" accept=".jpg,.jpeg,.png">
                    @error('image')
                    <div class="form__error">{{ $message }}</div>
                    @enderror
                </div>

            </div>
        </div>


        {{-- ユーザー名 --}}
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">ユーザー名</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="name" value="{{ old('name', $user->name) }}">
                </div>
                <div class="form__error">@error('name') {{ $message }} @enderror</div>
            </div>
        </div>

        {{-- 郵便番号 --}}
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">郵便番号</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="zip" value="{{ old('zip', $user->zip) }}">
                </div>
                <div class="form__error">@error('zip') {{ $message }} @enderror</div>
            </div>
        </div>

        {{-- 住所 --}}
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">住所</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="address" value="{{ old('address', $user->address) }}">
                </div>
                <div class="form__error">@error('address') {{ $message }} @enderror</div>
            </div>
        </div>

        {{-- 建物名 --}}
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">建物名</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="building" value="{{ old('building', $user->building) }}">
                </div>
                <div class="form__error">@error('building') {{ $message }} @enderror</div>
            </div>
        </div>

        {{-- ボタン --}}
        <div class="form__button">
            <button class="form__button-submit" type="submit">更新する</button>
            <a href="{{ route('mypage.show') }}" class="form__button-submit" style="background-color:#6c757d; margin-left:10px;">
                戻る
            </a>
        </div>

    </form>
</div>
@endsection