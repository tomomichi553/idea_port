<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
<x-app-layout>
    <x-slot name="header">
        <meta charset="utf-8">
        <title>Idea_port</title>
    </x-slot>

     <h1>Idea_port</h1>
    
        <div class='ideas'>
            
            <div class='idea'>
                <br>
                <h2 class='title'>タイトル：{{$idea->idea_title}}</h2>
                <p class='background'>背景：{{$idea->idea_background}}</p>
                <p class='goal'>目標：{{$idea->idea_goal}}</p>
                <p class='detail'>詳細：{{$idea->idea_detail}}</p>
                <p class='user'>ユーザー名：{{$idea->user->name}}</p>
                <p class='tag'>タグ:{{$idea->tag->name}}</p>
            </div>
            <div class='comment'>
                <h2>コメント欄</h2>
                @foreach ($comments as $comment)
                    <p class='body'>投稿日時:{{$comment->created_at}} コメント:{{$comment->comment}}</p>
                    <p class='user'>投稿者:{{$comment->user->name}}</p>
                @endforeach
            </div>
            <div class='comment_post'>
                <form action="/ideas/comments" method="POST">
                    @csrf
                    <input type='hidden' name="comment[idea_id]" value="{{$idea->id}}">
                    <input type="text" name="comment[comment]"> 
                    <input type="submit" value="投稿する"/>
                </form>
            </div>
            <div class="footer">
                <a href="/">戻る</a>
            </div>
           
        </div>
    
</x-app-layout>
