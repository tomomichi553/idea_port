@extends('layouts.common')

@section('head')
    <link rel="stylesheet" href="{{secure_asset('assets/css/trouble_edit.css')}}">
@endsection

@section('content')
    <section class="idea_detail">
        <div class="idea_detail_wrapper">
            <h2>悩みの編集</h2>
            <form action="/troubles/{{$trouble->id}}" method="POST">
                @csrf
                @method('PUT')
                <div class='image'>
                    <h2>画像</h2>
                    <div class="idea_image">
                       <img src="{{$trouble->img_url}}" alt="No Image"/>
                    </div>
                    <input type="file" name="image" id="image">
                </div>
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
                <div class="submit_button">
                    <input type="submit" value="保存"/>
                </div>
            </form>
            <div class="return">
                <a href="/">戻る</a>
            </div>
        </div>
    </section> 
@endsection