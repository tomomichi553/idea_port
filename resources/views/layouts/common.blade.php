<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <title>idea_port</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="{{secure_asset('assets/js/footerFixed.js')}}"></script>
    <script type="text/javascript" src="{{secure_asset('assets/js/opendialog.js')}}"></script>
    <script src="https://kit.fontawesome.com/6f73f8946d.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="{{secure_asset('assets/css/reset.css')}}">
    <link rel="stylesheet" href="{{secure_asset('assets/css/common.css')}}">
    @yield('head')
</head>

<script>
    $(function(){
        $('.menus > li > a').click(
        function(){
            $(this).next('ul').slideToggle('fast');
        });
    });
</script>

<body>
    <header class="header">
        <div class="header_wrap">
            <div class="logo" ><a href="/"></a></div>
            <ul class="menus">
                <li class="menu">
                    <a class="menu_drop">投稿</a>
                    <ul class="menu_sub">
                        <li class="menu_sub_item"><a href="/ideas/create">アイデア投稿</a></li>
                        <li class="menu_sub_item"><a href="/troubles/create">悩み投稿</a></li>
                    </ul>
                </li>
                <li class="menu"><a href="/ideas/search">アイデア検索</a></li>
                <li class="menu"><a href="/troubles/search">悩み検索</a></li>
                <li class="menu">
                    <a class="menu_drop">マイページ</a>
                    <ul class="menu_sub">
                        <li class="menu_sub_item"><a href="/profile/{{Auth::id()}}">プロフィール</a></li>
                        <li class="menu_sub_item"><a href="/profile/post/{{Auth::id()}}">投稿一覧</a></li>
                        <li class="menu_sub_item"><a href="/profile/like">いいね一覧</a></li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <li class="menu_sub_item"><a><input type="submit" value="ログアウト"></a></li>
                        </form>
                    </ul>
                </li>
                <li>
                    <i class="fa-regular fa-bell fa-lg modal-open" ></i>
                </li>
                
            </ul>
        </div>

        <!-- モーダル本体 -->
        <div class="modal-container">
        	<div class="modal-body">
        		<!-- 閉じるボタン -->
        		<div class="modal-close">×</div>
        		<!-- モーダル内のコンテンツ -->
        		<div class="modal-content">
        			<div class="notifications">
        			    <h1>通知一覧</h1>
                        @forelse(auth()->user()->notifications()->take(5)->get() as $notification)
                            <div class="notify {{ is_null($notification->read_at) ? 'un-read' : 'read' }}">
                                <a href="{{ $notification->data['url'] }}"><p>{{ Carbon\Carbon::parse($notification->data['date'])->format('Y/m/d') }}：{{ $notification->data['user_name'] }}さんがあなたのポストにコメントしました</p></a>
                            </div>
                        @empty
                            <p>まだ通知はありません</p>
                        @endforelse
                    </div>
        		</div>
        	</div>
        </div>
    </header>
    
    <main>
        @yield('content')
    </main>
    
     <footer class="footer" id=footer>
        <div class="footer_logo"><a href="/"></a></div>
        <p class="copy">copyright</p>
    </footer>
    <script>
        function previewImage(obj)
        {
        	var fileReader = new FileReader();
        	fileReader.onload = (function() {
        		document.getElementById('preview').src = fileReader.result;
        	});
        	fileReader.readAsDataURL(obj.files[0]);
        }
        
        function deleteIdea(id){
            'use strict'
            if (confirm('削除すると復元できません\n本当に削除しますか？')){
                document.getElementById(`form_${id}`).submit();
            }
        }
        
        $(function(){
            $(".clickable_icon").on("click", function(){
                $(".sample_dg").dialog({
                    title: "サンプル",
                });
            });
        });
        
    </script>
</body>
</html>
