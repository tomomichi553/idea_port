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
    
</x-app-layout>
