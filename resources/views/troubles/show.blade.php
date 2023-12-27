<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
<x-app-layout>
    <x-slot name="header">
        <meta charset="utf-8">
        <title>Idea_port</title>
    </x-slot>

     <h1>Idea_port</h1>
    
        <div class='troubles'>
            <div class='trouble'>
                <br>
                <h2 class='body'>悩み：{{$trouble->body}}</h2>
                <p class='user'>ユーザー名：{{$trouble->user->name}}</p>
                <p class='tag'>タグ:{{$trouble->tag->name}}</p>
            </div>
        </div>
        <div class='comment'>
            <h2>コメント欄</h2>
            @foreach ($comments as $comment)
                <p class='body'>投稿日時:{{$comment->created_at}} コメント:{{$comment->comment}}</p>
                <p class='user'>投稿者:{{$comment->user->name}}</p>
            @endforeach
        </div>
        <div class='comment_post'>
            <form action="/troubles/comments" method="POST">
                @csrf
                <input type='hidden' name="comment[trouble_id]" value="{{$trouble->id}}">
                <input type="text" name="comment[comment]"> 
                <input type="submit" value="投稿する"/>
            </form>
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    
</x-app-layout>
