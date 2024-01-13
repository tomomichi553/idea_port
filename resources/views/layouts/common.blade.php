<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>idea_port</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
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
                <li class="menu"><a href="/ideas/search">アイデア一覧</a></li>
                <li class="menu"><a href="/troubles/search">悩み一覧</a></li>
                <li class="menu">
                    <a class="menu_drop">マイページ</a>
                    <ul class="menu_sub">
                        <li class="menu_sub_item"><a href="/profile">プロフィール</a></li>
                        <li class="menu_sub_item"><a href="/profile/post">投稿一覧</a></li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <li class="menu_sub_item"><a><input type="submit" value="ログアウト"></a></li>
                        </form>
                    </ul>
                </li>
                
            </ul>
        </div>
    </header>
    
    <main>
        @yield('content')
    </main>
    
     <footer class="footer">
        <div class="footer_logo"><a href="/"></a></div>
        <p class="copy">copyright</p>
    </footer>
</body>
</html>