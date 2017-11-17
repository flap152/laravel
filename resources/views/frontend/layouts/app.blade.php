<!doctype html>
    <html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="theme-color" content="#717075">

        {{-- This is iOS mpbile app header data --}}
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <link rel="apple-touch-icon" sizes="200x200" href="/tile.png">
        <link rel="apple-touch-startup-image" href="/apple-launch.png">
        <meta name="apple-mobile-web-app-title" content="Processoft traqc">

        <link rel="manifest" href="/manifest.json">
        <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
        <title>@yield('title', app_name())</title>
        <meta name="description" content="@yield('meta_description', 'Laravel 5 Boilerplate')">
        <meta name="author" content="@yield('meta_author', 'Processoft')">
        @yield('meta')

        {{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}
        @stack('before-styles')

        {{ style(mix('css/frontend.css')) }}
        {{-- TODO:reviewALL myFrontend.css uses --}}
        {{style('css/myFrontend.css')}}
        @stack('after-styles')

        <script src="/myapp.js"></script>
        <!-- Scripts @TODO: Review this CSRF insertion  -->
        @if(false)
            <script>
            window.Laravel = @json(['csrfToken'=> csrf_token()])
            </script>
        @endif
        @if(false)
        <!--  @TODO: enable again for SW PWA -->
            <script>
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
        </script>
       @endif
	   @if (true)
        {{-- For libcharts apparently TODO:Review jquery insertion postion --}}
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"
                integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
                crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>

        {!! script('/js/biblio/script.js') !!}
@endif

    </head>
    <!-- body id="app-layout" -->
	<body style="background-color: #717075; ">
        <div id="app">
            @include('includes.partials.logged-in-as')
            @include('frontend.includes.nav')
            <div class="container doit mt-sm-3">
                @include('includes.partials.messages')
                {{--@include('includes.partials.swh')--}}
                @yield('content')
            <footer class="main-footer text-center ">
                <a href="https://processoft.com/"><img src="/img/frontend/processoftgris.jpg"></a>
                <p>{{date('Y')}} {{trans('strings.copyrights.all_rights_reserved')}}</p>
                <p><a href="https://processoft.com/">{{trans('strings.copyrights.powered_by')}}</a></p>
            </footer>
            </div><!-- container -->
        </div><!--#app-->

        <!-- Scripts -->
        @stack('before-scripts')
        {!! script(mix('js/frontend.js')) !!}
        @stack('after-scripts')

        @include('includes.partials.ga')
    </body>
</html>