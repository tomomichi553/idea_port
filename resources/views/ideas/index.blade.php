@extends('layouts.common')

@section('head')
    <link rel="stylesheet" href="{{secure_asset('assets/css/idea_index.css')}}">
@endsection

@section('content')
    <section class="ideas">
        <div class="ideas_message">
            <div class="idea_logo"></div>
            <h2>最新のアイデア</h2>
            <a href="/ideas/search">もっと見る</a>
            <a href="#troubles" >最新の悩み</a>
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
                        </div>
                        <div class="idea_content_wrapper">
                            <i class="fa-regular fa-clock fa-2x"></i>
                            <p class="date">{{$idea->created_at}}</p>
                            <i class="fa-regular fa-circle-user fa-2x"></i>
                            <a class="user" href="/profile/{{$idea->user->id}}">{{$idea->user->name}}</a>
                            <p class="tag">#{{$idea->tag->name}}</p>
                            <i class="fa-regular fa-heart"></i>
                            <span>{{ optional($idea->idea_likes)->count() ?? 0 }}</span>
                            
                        </div>
                    </div>
                </div>
            @endforeach
           
        </div>
    </section>
    <section class="troubles" id="troubles">
        <div class="troubles_message">
            <div class="trouble_logo"></div>
            <h2>最新の悩み</h2>
            <a href="/troubles/search">もっと見る</a>
        </div>
        <div class="trouble_posts">
            @foreach ($troubles as $trouble)
                <div class="trouble_post_wrapper">
                    <div class="trouble_image">
                        @if ($idea->img_url)
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
                        </div>
                        <div class="trouble_content_wrapper">
                            <i class="fa-regular fa-clock fa-2x"></i>
                            <p class="date">{{$trouble->created_at}}</p>
                            <i class="fa-regular fa-circle-user fa-2x"></i>
                            <a class="user" href="/profile/{{$trouble->user->id}}">{{$trouble->user->name}}</a>
                            <p class="tag">#{{$trouble->tag->name}}</p>
                            <i class="fa-regular fa-heart"></i>
                            <span>{{ optional($trouble->trouble_likes)->count() ?? 0 }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
