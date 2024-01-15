@extends('layouts.common')

@section('head')
    <link rel="stylesheet" href="{{secure_asset('assets/css/trouble_create.css')}}">
@endsection

@section('content')
    <section class="idea_detail">
        <div class="idea_detail_wrapper">
            <div class="idea_create_message">
                <div class="idea_create_logo"></div>
                <h2>悩みの投稿</h2>
            </div>
            <form action="/troubles" method="POST" enctype="multipart/form-data">
                @csrf
                <div class='image'>
                    <h2>画像</h2>
                    <input class="img_box"　accept='image/*' onchange="previewImage(this);" type="file" name="image" id="image">
                    <div class="idea_image">
                       <img id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" >
                    </div>
                </div>
                <div class='body'>
                    <div class="content_wrapper">
                        <h2>悩み</h2>
                        <p class="body__error" style="color:red">{{ $errors->first('trouble.body') }}</p>
                    </div>
                    <textarea class="textbox" cols="50" rows="4" wrap="hard" name="trouble[body]" placeholder="悩み"></textarea>
                </div>
                <div class='tag'>
                    <h2>タグ</h2>
                    <select class="tag_box" name="tag", placeholder="タグ"/>
                        @foreach ($tags as $tag)
                            <option value = "{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="submit_button">
                    <input type="submit" value="作成する"/>
                </div>
            </form>
            <div class="return">
                <a href="/">戻る</a>
            </div>
        </div>
    </section> 
@endsection