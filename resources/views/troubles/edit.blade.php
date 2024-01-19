@extends('layouts.common')

@section('head')
    <link rel="stylesheet" href="{{secure_asset('assets/css/trouble_edit.css')}}">
@endsection

@section('content')
    <section class="idea_detail">
        <div class="idea_detail_wrapper">
            <div class="idea_create_message">
                <div class="idea_create_logo"></div>
                <h2>悩みの投稿</h2>
            </div>
            <form action="/troubles/{{$trouble->id}}" method="POST">
                @csrf
                @method('PUT')
                <div class="idea_content">
                    <div class='image'>
                        <h2>画像</h2>
                        <div class="idea_image">
                           <img src="{{$trouble->img_url}}" alt="No Image"/>
                        </div>
                        <input class="img_box" accept='image/*' onchange="previewImage(this);" type="file" name="image" id="image">
                        <div class="idea_image">
                           <img id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" >
                        </div>
                    </div>
                    <div class='body'>
                         <div class="content_wrapper">
                            <h2>悩み</h2>
                            <p class="body__error" style="color:red">{{ $errors->first('trouble.body') }}</p>
                        </div>
                        <textarea class="textbox" name="trouble[body]">{{$trouble->body}}</textarea>
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
                    </div>
                    <div class="submit_button">
                        <input type="submit" value="保存"/>
                    </div>
                </div>
            </form>
            <div class="return">
                <a href="/profile/post">戻る</a>
            </div>
        </div>
    </section> 
@endsection