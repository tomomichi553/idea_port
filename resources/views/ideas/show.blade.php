@extends('layouts.common')

@section('head')
    <link rel="stylesheet" href="{{secure_asset('assets/css/idea_show.css')}}">
@endsection

@section('content')
    <section class="idea_detail">
        <div class="idea_detail_wrapper">
            <div class="idea_image">
                @if ($idea->img_url)
                    <img src="{{ $idea->img_url}}">
                @else
                    <img src="https://res.cloudinary.com/dv5ph5jpi/image/upload/v1705112775/zce5gahhndl6cuoegpwp.jpg" >
                @endif
            </div>
            <div class="idea_wrapper">
                <div class="idea_title">
                    <div class="idea_title_wrapper">
                        <h2 class='idea_title'>
                            <a href="/ideas/{{$idea->id}}">{{$idea->idea_title}}</a>
                        </h2>
                    </div>
                    <div class="idea_content_wrapper">
                        <div class="date_icon"></div>
                        <p class="date">{{$idea->created_at}}</p>
                        <div class="user_icon"></div>
                        <p class="user">{{$idea->user->name}}</p>
                        <p class="tag">#{{$idea->tag->name}}</p>
                    </div>
                </div>
                <div class="idea_content">
                    <h3 class="content_title">背景</h3>
                    <p class="content_textarea">{{$idea->idea_background}}</p>
                    <h3 class="content_title">目標</h3>
                    <p class="content_textarea">{{$idea->idea_goal}}</p>
                    <h3 class="content_title">詳細</h3>
                    <p class="content_textarea">{{$idea->idea_detail}}</p>
                </div>
            </div>
        </div>
    </section>
    
    <section class="idea_comments">
        <h2>コメント欄</h2>
        <div class="idea_comment_wrapper">
            
            @foreach ($comments as $comment)
                <p>名前 : {{$comment->user->name}} : {{$comment->created_at}} </p>
                <div class="comment_wrapper">
                    <p>{{$comment->comment}}</p>
                    <form action="/ideas/comments/{{$comment->id}}" id="form_{{$comment->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        @if($comment->user_id==Auth::user()->id)
                            <button class="del_button" type='button' onclick="deleteIdea({{$comment->id}})">削除</button>
                        @endif
                    </form>
                </div>
            @endforeach
        </div>
    </section>
    
    <section class="idea_comment_post">
        <p>コメント投稿</p>
        <form action="/ideas/comments" method="POST">
            @csrf
            <input type='hidden' name="comment[idea_id]" value="{{$idea->id}}">
            <textarea class="comment_box" cols="50" rows="4" wrap="hard" type="textarea" name="comment[comment]"></textarea> 
            <input class="idea_comment_post_button" type="submit" value="投稿する"/>
        </form>
    </section>
    
    <div class="return">
        <a href="/">戻る</a>
    </div>
@endsection
