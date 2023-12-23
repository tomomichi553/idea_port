<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
<x-app-layout>
    <x-slot name="header">
        <meta charset="utf-8">
        <title>Idea_port</title>
    </x-slot>

     <h1>Idea_port</h1>
     <a href="/ideas/create">アイデア作成</a>
     <a href="/troubles/create">悩み投稿</a>
    
        <div class='ideas'>
            <h2>いいねが多いアイデア</h2>
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
        <div class='troubles'>
            <h2>共感の多い悩み</h2>
            @foreach ($troubles as $trouble)
                <div class='idea'>
                    <br>
                    <h2 class='title'>
                        <a href="/troubles/{{$trouble->id}}">悩み：{{$trouble->body}}</a>
                    </h2>
                    <p class='user'>ユーザー名：{{$trouble->user->name}}</p>
                    <p class='tag'>タグ：{{$trouble->tag->name}}</p>
                </div>
            @endforeach
        </div>
        
    
</x-app-layout>
