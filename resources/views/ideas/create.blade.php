@extends('layouts.common')

@section('head')
    <link rel="stylesheet" href="{{secure_asset('assets/css/idea_create.css')}}">
@endsection

@section('content')
     <section class="idea_detail">
        <div class="idea_detail_wrapper">
            <div class="idea_create_message">
                <div class="idea_create_logo"></div>
                <h2>アイデアの作成</h2>
            </div>
            <form action='/ideas' method="POST" enctype="multipart/form-data">
                @csrf
                <div class="idea_content">
                    <div class='image'>
                        <h2>画像</h2>
                        <input class="img_box" accept='image/*' onchange="previewImage(this);" type="file" name="image" id="image">
                        <div class="idea_image">
                           <img id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" >
                        </div>
                    </div>
                    <div class='title'>
                        <div class="content_wrapper">
                            <h2>タイトル</h2>
                            <p class="error" style="color:red">{{ $errors->first('idea.idea_title') }}</p>
                        </div>
                        <input class="title_box" type="text" name="idea[idea_title]" placeholder="タイトル"/>
                    </div>
                    <div class='background'>
                        <div class="content_wrapper">
                            <h2>背景</h2>
                            <p class="error" style="color:red">{{ $errors->first('idea.idea_background') }}</p>
                        </div>
                        <textarea class="textbox" cols="50" rows="4" name="idea[idea_background]" placeholder="背景"/></textarea>
                    </div>
                    <div class='goal'>
                        <div class="content_wrapper">
                            <h2>目標</h2>
                            <p class="error" style="color:red">{{ $errors->first('idea.idea_goal') }}</p>
                        </div>
                        <textarea class="textbox" cols="50" rows="4" type="textarea" name="idea[idea_goal]" placeholder="目標"></textarea>
                    </div>
                    <div class='detail'>
                        <div class="content_wrapper">
                            <h2>詳細</h2>
                            <p class="error" style="color:red">{{ $errors->first('idea.idea_detail') }}</p>
                        </div>
                        <textarea class="textbox" cols="50" rows="4" type="textarea" name="idea[idea_detail]" placeholder="詳細"></textarea>
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
                </div>
            </form>
            <div class="return">
                <a href="/">戻る</a>
            </div>
        </div>
        
    </section>
@endsection
    

