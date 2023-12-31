<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
<x-app-layout>
    <x-slot name="header">
        <meta charset="utf-8">
        <title>Idea_port</title>
    </x-slot>

     <h1>Idea_port</h1>
    
        <div class='troubles'>
            <h2>悩みの投稿</h2>
            <div class='idea'>
                <form action="/troubles" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class='image'>
                        <h2>画像</h2>
                        <input type="file" name="image" id="image">
                    </div>
                    <div class='body'>
                        <h2>悩み</h2>
                        <input type="textarea" name="trouble[body]" placeholder="悩み">
                        <p class="body__error" style="color:red">{{ $errors->first('trouble.body') }}</p>
                    </div>
                    <div class='tag'>
                        <h2>タグ</h2>
                        <select name="tag", placeholder="タグ"/>
                            @foreach ($tags as $tag)
                                <option value = "{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select>
                        <p class="tag__error" style="color:red">{{ $errors->first('tag') }}</p>
                    </div>
                    <input type="submit" value="投稿する"/>
                </form>
                <div class="footer">
                    <a href="/">戻る</a>
                </div>

            </div>
           
        </div>
    
</x-app-layout>
