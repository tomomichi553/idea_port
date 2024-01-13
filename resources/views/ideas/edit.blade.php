@extends('layouts.common')

@section('head')
    <link rel="stylesheet" href="{{secure_asset('assets/css/idea_edit.css')}}">
@endsection

@section('content')
    <section class="idea_detail">
        <div class="idea_detail_wrapper">
            <h2>アイデアの編集</h2>
            <form action='/ideas/{{$idea->id}}' method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="idea_content">
                    <div class="image">
                        <h2>画像</h2>
                        <div class="idea_image">
                           <img src="{{$idea->img_url}}" alt="No Image"/>
                        </div>
                        <input type="file" name="image" id="image" value="{{$idea->image}}">
                    </div>
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
                    <div class="submit_button">
                        <input type="submit" value="保存"/>
                    </div>
                </div>
            </form>
            <div class="return">
                <a href="/">戻る</a>
            </div>
        </div>
    </section>
@endsection
