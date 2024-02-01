@extends('layouts.common')
    <link rel="stylesheet" href="{{secure_asset('assets/css/profile_show.css')}}">
@section('head')

@endsection

@section('content')
    <div class="profile_header_wrapper">
        <div class="icon_wrapper">
            @if ($user->icon)
                <img src="{{$user->icon}}" alt="画像が読み込めません">
            @else
                <img src="{{secure_asset('assets/img/user.png')}}">
            @endif
            <a href="/profile/post/{{$user->id}}" class="show_button">投稿一覧</a>
            @if ($user->id == Auth::id())
                <a href="/profile" class="edit_button">プロフィールの編集</a>
            @endif
        </div>
        <div class="profile_wrapper">
            <p class="profile_title">名前</p>
            <p class="profile_content">{{$user->name}}</p>
            <p class="profile_title">メールアドレス</p>
            <p class="profile_content">{{$user->email}}</p>
            <p class="profile_title">自己紹介</p>
            <p class="profile_content" id="content_textarea">{{$user->profile}}</p>
        </div>
    </div>
@endsection
