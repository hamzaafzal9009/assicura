<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title> @yield('title') | Assicura</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="Assicura" name="description" />
    <meta content="Hamza" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}">
    @include('layouts.head-css')
</head>

<div id="layout-wrapper">
    @include('layouts.site.navbar')
    <div class="main-content">
    @yield('body')
    </div>
</div>

@yield('content')

@include('layouts.vendor-scripts')
</body>

</html>
