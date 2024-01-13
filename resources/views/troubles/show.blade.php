@extends('layouts.common')

@section('head')
    <link rel="stylesheet" href="{{secure_asset('assets/css/trouble_show.css')}}">
@endsection

@section('content')
    <section class="trouble_detail">
        <div class="trouble_detail_wrapper">
            <p>{{$trouble->body}}</p>
            <a href="#">{{$trouble->user->name}}</a>
        </div>
        <div trouble_content>
            <p>タグ:<a>{{$trouble->tag->name}}</a></p>
        </div>
    </section>
    <section class="trouble_comments">
        <h2>コメント欄</h2>
        <div class="trouble_comment_wrapper">
            @foreach ($comments as $comment)
                <p>{{$comment->created_at}}    {{$comment->user->name}}</p>
                <p>{{$comment->comment}}</p>
                
                 <form action="/troubles/comments/{{$comment->id}}" id="form_{{$comment->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    @if($comment->user_id==Auth::user()->id)
                        <button type='button' onclick="deleteIdea({{$comment->id}})">削除</button>
                    @endif
                </form>
            @endforeach
        </div>
    </section>
    
    <section class="trouble_comment_post">
        <form action="/troubles/comments" method="POST">
            @csrf
            <input type='hidden' name="comment[trouble_id]" value="{{$trouble->id}}">
            <input type="text" name="comment[comment]"> 
            <input type="submit" value="投稿する"/>
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
