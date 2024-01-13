@extends('layouts.common')

@section('head')
    <link rel="stylesheet" href="{{secure_asset('assets/css/idea_search.css')}}">
@endsection

@section('content')
    <section class="idea_search">
        <div class="idea_search_wrapper">
            <form action="/ideas/search" method="GET">
                <div class="textbox_wrapper">
                    <input class="textbox" type="text" name="keyword" value="{{ $keyword }}">
                </div>
                <div class="tag_wrapper">
                    @foreach ($tags as $tag)
                        <label><input type="checkbox" name='tag[]' value='{{ $tag->name}}'/>{{$tag->name}}</label>
                    @endforeach 
                </div>
                <div class="submit_button">
                    <input type="submit" value="検索">
                </div>
            </form>
        </div>
    </section>
    <section class="idea_view">
        <div class="idea_posts">
            
            @foreach ($ideas as $idea)
                <div class='idea_post_wrapper'>
                    <div class="idea_image">
                       <img src="{{$idea->img_url}}" alt="No Image"/>
                    </div>
                    <h2 class='idea_title'>
                        <a href="/ideas/{{$idea->id}}">タイトル：{{$idea->idea_title}}</a>
                    </h2>
                    <p class='user'>ユーザー名：{{$idea->user->name}}</p>
                    <p class='tag'>タグ：{{$idea->tag->name}}</p>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $ideas->links() }}
        </div>
        <div class="return">
            <a href="/">戻る</a>
        </div>
    </section>
@endsection