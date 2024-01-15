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
    @vite(['resources/css/app.css', 'resources/scss/app.scss', 'resources/js/app.js'])
    <title>idea_port</title>
    <link rel="stylesheet" href="{{secure_asset('assets/css/paginate.scss')}}">
</head>

<p>Click on the items / arrows</p>
<nav class="pagination">
  <a href="" class="pagination__arrow pagination__prev">
    <span class="visuallyhidden">Previous Page</span>
  </a>
  <ul class="pagination__items">
    <li class="is-active"><a href=""></a></li>
    <li><a href=""></a></li>
    <li><a href=""></a></li>
    <li><a href=""></a></li>
    <li><a href=""></a></li>
    <li><a href=""></a></li>
    <li><a href=""></a></li>
    <li><a href=""></a></li>
    <li><a href=""></a></li>
    <li><a href=""></a></li>
  </ul>
  <a href="" class="pagination__arrow pagination__next">
    <span class="visuallyhidden">Next Page</span>
  </a>
</nav>