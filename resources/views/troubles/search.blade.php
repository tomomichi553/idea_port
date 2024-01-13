@extends('layouts.common')

@section('head')
    <link rel="stylesheet" href="{{secure_asset('assets/css/trouble_search.css')}}">
@endsection

@section('content')
    <section class="trouble_search"> 
        <div class="trouble_search_wrapper">
            <form action="/ideas/search" method="GET">
                <div class="textbox_wrapper">
                    <input class="textbox" type="text" name="keyword" value="{{ $keyword }}">
                </div>
                <div class="tag_wrapper">
                    @foreach ($tags as $tag)
                        <label><input class="checkbox" type="checkbox" name='tag[]' value='{{ $tag->name}}'/>{{$tag->name}}</label>
                    @endforeach  
                </div>
                <div class="submit_button">
                    <input type="submit" value="検索">
                </div>
            </form>
        </div>
    </section>
    <section class="troubles">
        <div class="troubles_message">
            <h2>共感の多い悩み</h2>
        </div>
        <div class="trouble_posts">
            <div class="trouble_post_wrapper">
                @foreach ($troubles as $trouble)
                    <div class='idea'>
                        <h2 class='title'>
                            <a href="/troubles/{{$trouble->id}}">悩み：{{$trouble->body}}</a>
                        </h2>
                        <p class='user'>ユーザー名：{{$trouble->user->name}}</p>
                        <p class='tag'>タグ：{{$trouble->tag->name}}</p>
                    </div>
                @endforeach
            </div>
            <div class="paginate">
                {{ $troubles->links() }}
            </div>
            <div class="return">
                <a href="/">戻る</a>
            </div>
        </div>
    </section>
@endsection
