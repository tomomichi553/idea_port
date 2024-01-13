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
            <div class="idea_title">
                <h2>{{$idea->idea_title}}</h2>
                <a href="#">{{$idea->user->name}}</a>
            </div>
            <div idea_content>
                <h3>背景</h3>
                <p>{{$idea->idea_background}}</p>
                <h3>目標</h3>
                <p>{{$idea->idea_goal}}</p>
                <h3>詳細</h3>
                <p>{{$idea->idea_detail}}</p>
                <h3>タグ</h3>
                <p>{{$idea->tag->name}}</p>
            </div>
        </div>
    </section>
    
    <section class="idea_comments">
        <h2>コメント欄</h2>
        <div class="idea_comment_wrapper">
            
            @foreach ($comments as $comment)
                <p>{{$comment->created_at}}   {{$comment->user->name}}</p>
                <p>{{$comment->comment}}</p>
                
                <form action="/ideas/comments/{{$comment->id}}" id="form_{{$comment->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    @if($comment->user_id==Auth::user()->id)
                        <button type='button' onclick="deleteIdea({{$comment->id}})">削除</button>
                    @endif
                </form>
            @endforeach
        </div>
    </section>
    
    <section class="idea_comment_post">
        <form action="/ideas/comments" method="POST">
            @csrf
            <input type='hidden' name="comment[idea_id]" value="{{$idea->id}}">
            <input class="idea_comment_post_body" type="text" name="comment[comment]"> 
            <input class="idea_comment_post_button" type="submit" value="投稿する"/>
        </form>
    </section>
    
    <div class="return">
        <a href="/">戻る</a>
    </div>
        
   <script>
        function deleteIdea(id){
            'use strict'
            if (confirm('削除すると復元できません\n本当に削除しますか？')){
                document.getElementById(`form_${id}`).submit();
            }
        }
    </script>
@endsection
