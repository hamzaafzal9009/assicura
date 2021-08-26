@yield('css')

<link href="{{ URL::asset('/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
@livewireStyles
<style>
    .bg-wave {
        background-image: url("{{ asset('/assets/images/wave.svg') }}");
        background-repeat: no-repeat;
        background-position: bottom
    }
    .height-100{
        min-height:100vh
    }
    .main-content{
        margin-top: 70px !important
    }
</style>
@yield('style')