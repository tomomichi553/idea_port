<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
<x-app-layout>
    <x-slot name="header">
        <meta charset="utf-8">
        <title>Idea_port</title>
    </x-slot>

    <h1>Idea_port</h1>
    <div>
        <form action="/troubles/search" method="GET">
            <input type="text" name="keyword" value="{{ $keyword }}">
            @foreach ($tags as $tag)
                <input type="checkbox" name='tag[]' value='{{ $tag->name}}'/>{{$tag->name}}
            @endforeach  
            <input type="submit" value="検索">
        </form>
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
    <div class='paginate'>
        {{ $troubles->links() }}
    </div>
    <div class="footer">
        <a href="/">戻る</a>
    </div>
    
</x-app-layout>
