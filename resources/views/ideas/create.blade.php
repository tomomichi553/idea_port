@extends('layouts.common')

@section('head')
    <link rel="stylesheet" href="{{secure_asset('assets/css/idea_create.css')}}">
@endsection

@section('content')
     <section class="idea_detail">
        <div class="idea_detail_wrapper">
            <h2>アイデアの作成</h2>
            <form action='/ideas' method="POST" enctype="multipart/form-data">
                @csrf
                <div class="idea_content">
                    <div class='image'>
                        <h2>画像</h2>
                        <input type="file" name="image" id="image">
                    </div>
                    <div class='title'>
                        <h2>タイトル</h2>
                        <input type="text" name="idea[idea_title]" placeholder="タイトル"/>
                        <p class="title__error" style="color:red">{{ $errors->first('idea.idea_title') }}</p>
                    </div>
                    <div class='background'>
                        <h2>背景</h2>
                        <input type="textarea" name="idea[idea_background]" placeholder="背景"/>
                        <p class="background__error" style="color:red">{{ $errors->first('idea.idea_background') }}</p>
                    </div>
                    <div class='goal'>
                        <h2>目標</h2>
                        <input type="textarea" name="idea[idea_goal]" placeholder="目標"/>
                        <p class="goal__error" style="color:red">{{ $errors->first('idea.idea_goal') }}</p>
                    </div>
                    <div class='detail'>
                        <h2>詳細</h2>
                        <input type="textarea" name="idea[idea_detail]" placeholder="詳細"/>
                        <p class="detail__error" style="color:red">{{ $errors->first('idea.idea_detail') }}</p>
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
                </div>
            </form>
            <div class="return">
                <a href="/">戻る</a>
            </div>
        </div>
    </section>
@endsection
    

