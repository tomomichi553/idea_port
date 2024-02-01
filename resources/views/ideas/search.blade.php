@extends('layouts.common')

@section('head')
    <link rel="stylesheet" href="{{secure_asset('assets/css/idea_search.css')}}">
     <link rel="stylesheet" href="{{secure_asset('assets/css/paginate.css')}}">
@endsection

@section('content')
    <section class="idea_search">
        <div class="idea_search_wrapper">
            <form action="/ideas/search" method="GET">
                    <div class="textbox_wrapper">
                        <input class="textbox" type="text" name="keyword" value="{{ $keyword }}">
                        <input class="search" type="submit" value="検索">
                    </div>
                <div class="tag_wrapper">
                    @foreach ($tags as $tag)
                        <label><input type="checkbox" name='tag[]' value='{{ $tag->name}}'/>{{$tag->name}}</label>
                    @endforeach 
                </div>
                
            </form>
        </div>
    </section>
    <section class="idea_view">
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
                            <div class="date_icon"></div>
                            <p class="date">{{$idea->created_at}}</p>
                            <div class="user_icon"></div>
                            <a class="user" href="/profile/{{$idea->user->id}}">{{$idea->user->name}}</a>
                            <p class="tag">#{{$idea->tag->name}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $ideas->links('layouts.paginate') }}
        </div>
        <div class="return">
            <a href="/">戻る</a>
        </div>
    </section>
@endsection