@extends('layouts.common')

@section('head')
    <link rel="stylesheet" href="{{secure_asset('assets/css/profile_index.css')}}">
    <link rel="stylesheet" href="{{secure_asset('assets/css/paginate.css')}}">
@endsection

@section('content')
     <section class="ideas">
        <div class="ideas_message">
            <div class="idea_logo"></div>
            <h2>いいねしたアイデア</h2>
        </div>
        <div class="idea_posts">
            @foreach ($ideas as $idea)
                   <div class="idea_post_wrapper">
                    <div class="idea_image">
                        @if ($idea->idea->img_url)
                            <img src="{{ $idea->idea->img_url}}">
                        @else
                            <img src="https://res.cloudinary.com/dv5ph5jpi/image/upload/v1705112775/zce5gahhndl6cuoegpwp.jpg" >
                        @endif
                    </div>
                    <div class="idea_content">
                        <div class="idea_title_wrapper">
                            <h2 class='idea_title'>
                                <a href="/ideas/{{$idea->idea->id}}">{{$idea->idea->idea_title}}</a>
                            </h2>
                        </div>
                        <div class="idea_content_wrapper">
                            <i class="fa-regular fa-clock fa-2x"></i>
                            <p class="date">{{$idea->idea->created_at}}</p>
                            <i class="fa-regular fa-circle-user fa-2x"></i>
                            <p class="user">{{$idea->idea->user->name}}</p>
                            <p class="tag">#{{$idea->idea->tag->name}}</p>
                            
                        </div>
                    </div>
                </div>
            @endforeach
           <div class='paginate'>
                {{ $ideas->links('layouts.paginate') }}
            </div>
        </div>
        
    </section>
    <section class="troubles">
        <div class="troubles_message">
            <div class="trouble_logo"></div>
            <h2>いいねした悩み</h2>
        </div>
        <div class="trouble_posts">
            @foreach ($troubles as $trouble)
                <div class="trouble_post_wrapper">
                    <div class="trouble_image">
                        @if ($trouble->trouble->img_url)
                            <img src="{{ $trouble->trouble->img_url}}">
                        @else
                            <img src="https://res.cloudinary.com/dv5ph5jpi/image/upload/v1705112775/zce5gahhndl6cuoegpwp.jpg" >
                        @endif
                    </div>
                    <div class="trouble_content">
                        <div class="trouble_title_wrapper">
                            <h2 class='trouble_title'>
                                <a href="/troubles/{{$trouble->trouble->id}}">{{$trouble->trouble->body}}</a>
                            </h2>
                        </div>
                        <div class="trouble_content_wrapper">
                            <i class="fa-regular fa-clock fa-2x"></i>
                            <p class="date">{{$trouble->trouble->created_at}}</p>
                            <i class="fa-regular fa-circle-user fa-2x"></i>
                            <p class="user">{{$trouble->trouble->user->name}}</p>
                            <p class="tag">#{{$trouble->trouble->tag->name}}</p>
                            
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