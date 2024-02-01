@extends('layouts.common')

@section('head')
    <link rel="stylesheet" href="{{secure_asset('assets/css/trouble_search.css')}}">
    <link rel="stylesheet" href="{{secure_asset('assets/css/paginate.css')}}">
@endsection

@section('content')
    <section class="trouble_search"> 
        <div class="trouble_search_wrapper">
            <form action="/ideas/search" method="GET">
                <div class="textbox_wrapper">
                    <input class="textbox" type="text" name="keyword" value="{{ $keyword }}">
                    <input class="search" type="submit" value="検索">
                </div>
                <div class="tag_wrapper">
                    @foreach ($tags as $tag)
                        <label><input class="checkbox" type="checkbox" name='tag[]' value='{{ $tag->name}}'/>{{$tag->name}}</label>
                    @endforeach  
                </div>
            </form>
        </div>
    </section>
    <section class="troubles">
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
                        </div>
                        <div class="trouble_content_wrapper">
                            <div class="date_icon"></div>
                            <p class="date">{{$trouble->created_at}}</p>
                            <div class="user_icon"></div>
                            <a class="user" href="/profile/{{$trouble->user->id}}">{{$trouble->user->name}}</a>
                            <p class="tag">#{{$trouble->tag->name}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="paginate">
            {{ $troubles->links('layouts.paginate') }}
        </div>
        <div class="return">
            <a href="/">戻る</a>
        </div>
    </section>
@endsection
