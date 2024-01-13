@extends('layouts.common')

@section('head')
    <link rel="stylesheet" href="{{secure_asset('assets/css/trouble_create.css')}}">
@endsection

@section('content')
    <section class="idea_detail">
        <div class="idea_detail_wrapper">
            <h2>悩みの投稿</h2>
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