<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#CB1A38">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- This is iOS mpbile app header data --}}
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <link rel="apple-touch-icon" sizes="200x200" href="/tile.png">
    <link rel="apple-touch-startup-image" href="/apple-launch.png">
    <meta name="apple-mobile-web-app-title" content="Processoft traqc">

    <link rel="manifest" href="/manifest.json">
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />

    <title>@yield('title', app_name())</title>

    <!-- Meta -->
    <meta name="description" content="@yield('meta_description', 'traqc mobile application')">
    <meta name="author" content="@yield('meta_author', 'Processoft')">
@yield('meta')

<!-- Styles -->
@yield('before-styles')

<!-- Check if the language is set to RTL, so apply the RTL layouts -->
    <!-- Otherwise apply the normal LTR layouts -->
@langRTL
    {{ Html::style(getRtlCss(mix('css/frontend.css'))) }}
@else
    {{ Html::style(mix('css/frontend.css')) }}
@endif
{{Html::style('css/myFrontend.css')}}
@yield('after-styles')
<!-- Scripts -->
    <!--script src="/myapp.js"></script FFLLAAPP maybe it shoud be here   -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>

        @if(true)
        // PWA service worker support - taken from https://justmegareth.com/2017-07-15-progressive-web-app-in-laravel/
        if ('serviceWorker' in navigator && 'PushManager' in window) {
            window.addEventListener('load', function() {
                //navigator.serviceWorker.register('/service-worker.js').then(function(registration) {
                //FFLLAAPP migrating to workbox
                navigator.serviceWorker.register('/sw.js').then(function(registration) {
                    // Registration was successful
                    console.log('ServiceWorker registration successful with scope: ', registration.scope);
                }, function(err) {
                    // registration failed :(
                    console.log('ServiceWorker registration failed: ', err);
                });
            });
        }
        @endif
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>

    {!! Html::script('/js/biblio/script.js') !!}

    <div id="id01"></div>
        xmlhttp.onreadystatechange = function() {
</head>
<body id="app-layout">
<div id="app">
    @include('includes.partials.logged-in-as')
    @include('frontend.includes.nav')
    <div class="container">
        @include('includes.partials.messages')
        {{--@include('includes.partials.swh')--}}
        @yield('content')
        <footer class="main-footer text-center ">
            <a href="https://processoft.com/"><img src="/img/frontend/processoftgris.jpg"></a>
            <p>{{date('Y')}} {{trans('strings.copyrights.all_rights_reserved')}}</p>
            <p><a href="https://processoft.com/">{{trans('strings.copyrights.powered_by')}}</a></p>
        </footer>
    </div><!--container-->
</div><!--app-->
<!-- Scripts -->
@yield('before-scripts')
{!! Html::script(mix('js/frontend.js')) !!}
@yield('after-scripts')
@include('includes.partials.ga')
</body>
</html>