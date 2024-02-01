@extends('layouts.common')

@section('head')
    <link rel="stylesheet" href="{{secure_asset('assets/css/trouble_show.css')}}">
@endsection

@section('content')
    <section class="trouble_detail">
        <div class="trouble_detail_wrapper">
            <div class="trouble_image">
                @if ($trouble->img_url)
                    <img src="{{ $trouble->img_url}}">
                @else
                    <img src="https://res.cloudinary.com/dv5ph5jpi/image/upload/v1705112775/zce5gahhndl6cuoegpwp.jpg" >
                @endif
            </div>
            <div class="trouble_wrapper">
                <h2 class='trouble_title'>{{$trouble->body}}</h2>
                <div class="trouble_content_wrapper">
                    <div class="date_icon"></div>
                    <p class="date">{{$trouble->created_at}}</p>
                    <div class="user_icon"></div>
                    <a class="user" href="/profile/{{$trouble->user->id}}">{{$trouble->user->name}}</a>
                    <p class="tag">#{{$trouble->tag->name}}</p>
                </div>
            </div>
        </div>
    </section>
    <section class="trouble_comments">
        <h2>コメント欄</h2>
        <div class="trouble_comment_wrapper">
            @foreach ($comments as $comment)
                <p>名前 : {{$comment->user->name}} : {{$comment->created_at}} </p>
                <div class="comment_wrapper">
                    <p>{{$comment->comment}}</p>
                
                     <form action="/troubles/comments/{{$comment->id}}" id="form_{{$comment->id}}" method="POST">
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
    
    <section class="trouble_comment_post">
        <p>コメント投稿</p>
        <form action="/troubles/comments" method="POST">
            @csrf
            <input type='hidden' name="comment[trouble_id]" value="{{$trouble->id}}">
            <textarea class="comment_box" cols="50" rows="4" wrap="hard" type="textarea" name="comment[comment]"></textarea> 
            <input class="trouble_comment_post_button" type="submit" value="投稿する"/>
        </form>
    </section>
    
    <div class="return">
        <a href="/">戻る</a>
    </div>
@endsection
