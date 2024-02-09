@extends('layouts.common')

@section('head')
    <link rel="stylesheet" href="{{secure_asset('assets/css/profile_index.css')}}">
    <link rel="stylesheet" href="{{secure_asset('assets/css/paginate.css')}}">
@endsection

@section('content')
     <section class="ideas">
        <div class="ideas_message">
            <div class="idea_logo"></div>
            <h2>投稿したアイデア</h2>
        </div>
        <div class="idea_posts">
            @foreach ($ideas as $idea)
                   <div class="idea_post_wrapper">
                    <div class="idea_image">
                        @if ($idea->img_url)
                            <img src="{{ $idea->img_url}}">
                        @else
                            <img src="https://res.cloudinary.com/dv5ph5jpi/image/upload/v1705112775/zce5gahhndl6cuoegpwp.jpg" >
                        @endif
                    </div>
                    <div class="idea_content">
                        <div class="idea_title_wrapper">
                            <h2 class='idea_title'>
                                <a href="/ideas/{{$idea->id}}">{{$idea->idea_title}}</a>
                            </h2>
                            @if ($idea->user->id == Auth::id())
                                <a href ="/ideas/{{$idea->id}}/edit" class="edit_button">編集</a>
                                <form action="/ideas/{{$idea->id}}" id="form_{{$idea->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="del_button" type='button' onclick="deleteIdea({{$idea->id}})">削除</button>
                                </form>
                            @endif
                        </div>
                        <div class="idea_content_wrapper">
                            <i class="fa-regular fa-clock fa-2x"></i>
                            <p class="date">{{$idea->created_at}}</p>
                            <i class="fa-regular fa-circle-user fa-2x"></i>
                            <p class="user">{{$idea->user->name}}</p>
                            <p class="tag">#{{$idea->tag->name}}</p>
                            
                        </div>
                    </div>
                </div>
            @endforeach
           
        </div>
        <div class='paginate'>
            {{ $ideas->links('layouts.paginate') }}
        </div>
    </section>
    <section class="troubles">
        <div class="troubles_message">
            <div class="trouble_logo"></div>
            <h2>投稿した悩み</h2>
        </div>
        <div class="trouble_posts">
            @foreach ($troubles as $trouble)
                <div class="trouble_post_wrapper">
                    <div class="trouble_image">
                        @if ($trouble->img_url)
                            <img src="{{ $trouble->img_url}}">
                        @else
                            <img src="https://res.cloudinary.com/dv5ph5jpi/image/upload/v1705112775/zce5gahhndl6cuoegpwp.jpg" >
                        @endif
                    </div>
                    <div class="trouble_content">
                        <div class="trouble_title_wrapper">
                            <h2 class='trouble_title'>
                                <a href="/troubles/{{$trouble->id}}">{{$trouble->body}}</a>
                            </h2>
                            @if ($trouble->user->id == Auth::id())
                                <a href="/troubles/{{$trouble->id}}/edit" class="edit_button">編集</a>
                                    <form action="/troubles/{{$trouble->id}}" id="form_{{$trouble->id}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="del_button" type='button' onclick="deleteTrouble({{$trouble->id}})">削除</button>
                                    </form>
                            @endif
                        </div>
                        <div class="trouble_content_wrapper">
                            <i class="fa-regular fa-clock fa-2x"></i>
                            <p class="date">{{$trouble->created_at}}</p>
                            <i class="fa-regular fa-circle-user fa-2x"></i>
                            <p class="user">{{$trouble->user->name}}</p>
                            <p class="tag">#{{$trouble->tag->name}}</p>
                            
                        </div>
                    </div>
                </div>
            @endforeach
            <div class='paginate'>
                {{ $troubles->links('layouts.paginate') }}
            </div>
        </div>
    </section>
        
        <script>
            function deleteIdea(id){
                'use strict'
                if (confirm('削除すると復元できません\n本当に削除しますか？')){
                    document.getElementById(`form_${id}`).submit();
                }
            }
            
            function deleteTrouble(id){
                'use strict'
                if (confirm('削除すると復元できません\n本当に削除しますか？')){
                    document.getElementById(`form_${id}`).submit();
                }
            }
            
            
        </script>
        
@endsection