<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
<x-app-layout>
    <x-slot name="header">
        <meta charset="utf-8">
        <title>Idea_port</title>
    </x-slot>

     <h1>Idea_port</h1>
        <div class='ideas'>
            <h2>投稿したアイデア</h2>
            @foreach ($ideas as $idea)
                <div class='idea'>
                    <br>
                    <h2 class='title'>
                        <a href="/ideas/{{$idea->id}}">タイトル：{{$idea->idea_title}}</a>
                    </h2>
                    <p class='background'>背景：{{$idea->idea_background}}</p>
                    <p class='user'>ユーザー名：{{$idea->user->name}}</p>
                    <p class='tag'>タグ：{{$idea->tag->name}}</p>
                    <a href ="/ideas/{{$idea->id}}/edit" class="edit_button">編集</a>
                    
                    <form action="/ideas/{{$idea->id}}" id="form_{{$idea->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type='button' onclick="deleteIdea({{$idea->id}})">削除</button>
                    </form>
                </div>
            @endforeach
        </div>
        <div class='troubles'>
            <h2>投稿した悩み</h2>
            @foreach ($troubles as $trouble)
                <div class='idea'>
                    <br>
                    <h2 class='title'>
                        <a href="/troubles/{{$trouble->id}}">悩み：{{$trouble->body}}</a>
                    </h2>
                    <p class='user'>ユーザー名：{{$trouble->user->name}}</p>
                    <p class='tag'>タグ：{{$trouble->tag->name}}</p>
                    <a href="/troubles/{{$trouble->id}}/edit" class="edit_button">編集</a>
                    
                    <form action="/troubles/{{$trouble->id}}" id="form_{{$trouble->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type='button' onclick="deleteTrouble({{$trouble->id}})">削除</button>
                    </form>
                </div>
            @endforeach
        </div>
        
        <script>
            function deleteIdea(id){
                'use strict'
                if (confirm('削除すると復元できません\n本当に削除しますか？')){
                    document.getElementById(`form_${id}`).submit();
                }
            }
            
            function deleteTrouble(id){
                'use strict'
                if (confirm('削除すると復元できません\n本当に削除しますか？')){
                    document.getElementById(`form_${id}`).submit();
                }
            }
            
            
        </script>
        
    
</x-app-layout>
