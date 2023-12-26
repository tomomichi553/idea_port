<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
<x-app-layout>
    <x-slot name="header">
        <meta charset="utf-8">
        <title>Idea_port</title>
    </x-slot>

     <h1>Idea_port</h1>
        <div>
            <form action="/ideas/search" method="GET">
                @csrf
                <input type="text" name="keyword" value="{{ $keyword }}">
                <input type="submit" value="検索">
            </form>
        </div>
        <div class='ideas'>
            <h2>アイデア一覧</h2>
            @foreach ($ideas as $idea)
                <div class='idea'>
                    <br>
                    <h2 class='title'>
                        <a href="/ideas/{{$idea->id}}">タイトル：{{$idea->idea_title}}</a>
                    </h2>
                    <p class='background'>背景：{{$idea->idea_background}}</p>
                    <p class='user'>ユーザー名：{{$idea->user->name}}</p>
                    <p class='tag'>タグ：{{$idea->tag->name}}</p>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $ideas->links() }}
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
</x-app-layout>
