<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
<x-app-layout>
    <x-slot name="header">
        <meta charset="utf-8">
        <title>Idea_port</title>
    </x-slot>

     <h1>Idea_port</h1>
    
        <div class='troubles'>
            <h2>悩みの編集</h2>
            <div class='idea'>
                <form action="/troubles/{{$trouble->id}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class='body'>
                        <h2>悩み</h2>
                        <input type="textarea" name="trouble[body]" value="{{$trouble->body}}">
                        <p class="body__error" style="color:red">{{ $errors->first('trouble.body') }}</p>
                    </div>
                    <div class='tag'>
                        <h2>タグ</h2>
                        <select name="tag"/>
                            @foreach ($tags as $tag)
                                @if ($tag->id === $trouble->tag_id)
                                    <option value = "{{$tag->id}}" selected>{{$tag->name}}</option>
                                @else
                                    <option value = "{{$tag->id}}">{{$tag->name}}</option>
                                @endif
                            @endforeach
                        </select>
                        <p class="tag__error" style="color:red">{{ $errors->first('tag') }}</p>
                    </div>
                    <input type="submit" value="保存"/>
                </form>
                <div class="footer">
                    <a href="/">戻る</a>
                </div>

            </div>
           
        </div>
    
</x-app-layout>
