<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
<x-app-layout>
    <x-slot name="header">
        <meta charset="utf-8">
        <title>Idea_port</title>
    </x-slot>

     <h1>Idea_port</h1>
    
        <div class='ideas'>
            <h2>アイデアの編集</h2>
            <div class='idea'>
                <form action='/ideas/{{$idea->id}}' method="POST">
                    @csrf
                    @method('PUT')
                    <div class='title'>
                        <h2>タイトル</h2>
                        <input type="text" name="idea[idea_title]" value="{{$idea->idea_title}}"/>
                        <p class="title__error" style="color:red">{{ $errors->first('idea.idea_title') }}</p>
                    </div>
                    <div class='background'>
                        <h2>背景</h2>
                        <input type="textarea" name="idea[idea_background]" value="{{$idea->idea_background}}"/>
                        <p class="background__error" style="color:red">{{ $errors->first('idea.idea_background') }}</p>
                    </div>
                    <div class='goal'>
                        <h2>目標</h2>
                        <input type="textarea" name="idea[idea_goal]" value="{{$idea->idea_goal}}"/>
                        <p class="goal__error" style="color:red">{{ $errors->first('idea.idea_goal') }}</p>
                    </div>
                    <div class='detail'>
                        <h2>詳細</h2>
                        <input type="textarea" name="idea[idea_detail]" value="{{$idea->idea_detail}}"/>
                        <p class="detail__error" style="color:red">{{ $errors->first('idea.idea_detail') }}</p>
                    </div>
                    <div class='tag'>
                        <h2>タグ</h2>
                        <select name="tag"/>
                            @foreach ($tags as $tag)
                                @if ($tag->id === $idea->tag_id)
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
